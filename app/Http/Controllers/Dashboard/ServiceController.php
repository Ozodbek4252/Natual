<?php

namespace App\Http\Controllers\Dashboard;

use App\DataObjects\DataObjectCollection;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Lang;
use App\Models\Service;
use App\ViewModels\Service\IndexServiceViewModel;
use App\ViewModels\Service\ServiceViewModel;
use App\ViewModels\PaginationViewModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Exception;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param int $page
     * @param int $limit
     * @return \Illuminate\Http\Response
     */
    public function index(int $page = 1, int $limit = 15)
    {
        $query = Service::with('translations.lang')->orderBy('id', 'desc');

        $totalCount = $query->count();
        $skip       = $limit * ($page - 1);
        $items      = $query->skip($skip)->take($limit)->get();

        $services = new DataObjectCollection($items, $totalCount, $limit, $page);

        return (new PaginationViewModel($services, IndexServiceViewModel::class))->toView('dashboard.services.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $langs = Lang::where('is_published', true)->get();
        return view('dashboard.services.create', compact('langs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ServiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        try {
            DB::beginTransaction();

            // Store the icon in a directory: 'public/services/'
            $iconPath = $request->file('icon')->store('services', 'public');
            $service = Service::create(['icon' => $iconPath]);

            $langs = Lang::where('is_published', true)->get();

            foreach ($langs as $lang) {
                $service->translations()->create([
                    'lang_id' => $lang->id,
                    'column_name' => 'title',
                    'content' => $request->input('title_' . $lang->code),
                ]);

                $service->translations()->create([
                    'lang_id' => $lang->id,
                    'column_name' => 'description',
                    'content' => $request->input('description_' . $lang->code),
                ]);
            }

            toastr('Created successfully');

            DB::commit();
            return redirect()->route('services.index');
        } catch (Exception $e) {
            DB::rollBack();
            return back()->withErrors([
                'error' => 'Error. Can\'t store',
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        $langs = Lang::where('is_published', true)->get();

        $service =  Service::with('translations.lang')->find($service->id);
        $service = new ServiceViewModel($service);
        return view('dashboard.services.edit', compact('langs', 'service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceRequest $request, Service $service)
    {
        try {
            DB::beginTransaction();

            $iconPath = $service->icon;

            if ($request->hasFile('icon')) {
                if (Storage::exists('/public/' . $service->icon)) {
                    Storage::delete('/public/' . $service->icon);
                }
                // Store the icon in a directory: 'public/services/'
                $iconPath = $request->file('icon')->store('services', 'public');
            }

            $service->update([
                'icon' => $iconPath
            ]);
            $service->refresh();

            $langs = Lang::where('is_published', true)->get();

            foreach ($langs as $lang) {
                $service->translations()->updateOrCreate(
                    [
                        'lang_id' => $lang->id,
                        'column_name' => 'title',
                    ],
                    [
                        'content' => $request->input('title_' . $lang->code),
                    ]
                );
                $service->translations()->updateOrCreate(
                    [
                        'lang_id' => $lang->id,
                        'column_name' => 'description',
                    ],
                    [
                        'content' => $request->input('description_' . $lang->code),
                    ]
                );
            }

            toastr('Updated successfully');

            DB::commit();
            return redirect()->route('services.index');
        } catch (Exception $e) {
            DB::rollBack();
            return back()->withErrors([
                'error' => 'Error. Can\'t update',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        try {
            DB::beginTransaction();

            if (Storage::exists('/public/' . $service->icon)) {
                Storage::delete('/public/' . $service->icon);
            }

            // delete service's translations
            $service->translations()->delete();
            $service->delete();

            toastr('Deleted successfully');

            DB::commit();
            return redirect()->back();
        } catch (Exception $e) {
            DB::rollBack();
            return back()->withErrors([
                'error' => 'Error. Can\'t delete',
            ]);
        }
    }
}
