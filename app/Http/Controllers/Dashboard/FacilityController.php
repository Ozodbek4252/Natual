<?php

namespace App\Http\Controllers\Dashboard;

use App\DataObjects\DataObjectCollection;
use App\Http\Controllers\Controller;
use App\Http\Requests\FacilityRequest;
use App\Models\Facility;
use App\Models\Lang;
use App\ViewModels\Facility\FacilityViewModel;
use App\ViewModels\Facility\IndexFacilityViewModel;
use App\ViewModels\PaginationViewModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Exception;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(int $page = 1, int $limit = 15)
    {
        $query = Facility::with('translations.lang')->orderBy('updated_at', 'desc');

        $totalCount = $query->count();
        $skip       = $limit * ($page - 1);
        $items      = $query->skip($skip)->take($limit)->get();

        $facilities = new DataObjectCollection($items, $totalCount, $limit, $page);

        return (new PaginationViewModel($facilities, IndexFacilityViewModel::class))->toView('dashboard.facilities.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $langs = Lang::where('is_published', true)->get();
        return view('dashboard.facilities.create', compact('langs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ServiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FacilityRequest $request)
    {
        try {
            DB::beginTransaction();

            // Store the image in a directory: 'public/facilities/'
            $imagePath = $request->file('image')->store('facilities', 'public');
            $service = Facility::create([
                'image' => $imagePath,
            ]);

            $langs = Lang::where('is_published', true)->get();

            foreach ($langs as $lang) {
                $service->translations()->create([
                    'lang_id' => $lang->id,
                    'column_name' => 'name',
                    'content' => $request->input('name_' . $lang->code),
                ]);
            }

            toastr('Created successfully');

            DB::commit();
            return redirect()->route('facilities.index');
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
    public function edit(Facility $facility)
    {
        $langs = Lang::where('is_published', true)->get();

        $facility =  Facility::with('translations.lang')->find($facility->id);
        $facility = new FacilityViewModel($facility);
        return view('dashboard.facilities.edit', compact('langs', 'facility'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FacilityRequest $request, Facility $facility)
    {
        try {
            DB::beginTransaction();

            $imagePath = $facility->image;

            if ($request->hasFile('image')) {
                if (Storage::exists('/public/' . $facility->image)) {
                    Storage::delete('/public/' . $facility->image);
                }
                // Store the image in a directory: 'public/facilities/'
                $imagePath = $request->file('image')->store('facilities', 'public');
            }

            $facility->update([
                'image' => $imagePath,
            ]);
            $facility->refresh();

            $langs = Lang::where('is_published', true)->get();

            foreach ($langs as $lang) {
                $facility->translations()->updateOrCreate(
                    [
                        'lang_id' => $lang->id,
                        'column_name' => 'name',
                    ],
                    [
                        'content' => $request->input('name_' . $lang->code),
                    ]
                );
            }

            toastr('Updated successfully');

            DB::commit();
            return redirect()->route('facilities.index');
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
    public function destroy(Facility $facility)
    {
        try {
            DB::beginTransaction();

            if (Storage::exists('/public/' . $facility->image)) {
                Storage::delete('/public/' . $facility->image);
            }

            // delete facility's translations
            $facility->translations()->delete();
            $facility->delete();

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
