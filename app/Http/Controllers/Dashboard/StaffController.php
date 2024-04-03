<?php

namespace App\Http\Controllers\Dashboard;

use App\DataObjects\DataObjectCollection;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StaffRequest;
use App\Models\Lang;
use App\Models\Staff;
use App\ViewModels\PaginationViewModel;
use App\ViewModels\Staff\IndexStaffViewModel;
use App\ViewModels\Staff\StaffViewModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $page = $request->query('page', 1);
        $limit = $request->query('limit', 10);

        $query = Staff::with('translations.lang')->orderBy('updated_at', 'desc');

        $totalCount = $query->count();
        $skip       = $limit * ($page - 1);
        $items      = $query->skip($skip)->take($limit)->get();

        $staffs = new DataObjectCollection($items, $totalCount, $limit, $page);

        return (new PaginationViewModel($staffs, IndexStaffViewModel::class))->toView('dashboard.staffs.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $langs = Lang::where('is_published', true)->get();
        return view('dashboard.staffs.create', compact('langs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StaffRequest $request)
    {
        try {
            DB::beginTransaction();

            $imagePath = null;
            if ($request->hasFile('image')) {
                // Store the image in a directory: 'public/staffs/'
                $generatedName = 'staff-image_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
                $imagePath = $request->file('image')->storeAs('staffs', $generatedName, 'public');
            }

            $staff = Staff::create([
                'name' => $request->name,
                'image' => $imagePath,
                'number' => $request->number,
                'email' => $request->email,
                'website' => $request->website,
            ]);

            $langs = Lang::where('is_published', true)->get();

            foreach ($langs as $lang) {
                $staff->translations()->create([
                    'lang_id' => $lang->id,
                    'column_name' => 'position',
                    'content' => $request->input('position_' . $lang->code),
                ]);
            }

            toastr('Created successfully');

            DB::commit();
            return redirect()->route('staffs.index');
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
    public function edit(Staff $staff)
    {
        $langs = Lang::where('is_published', true)->get();

        $staff =  Staff::with('translations.lang')->find($staff->id);
        $staff = new StaffViewModel($staff);
        return view('dashboard.staffs.edit', compact('langs', 'staff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StaffRequest $request, Staff $staff)
    {
        try {
            DB::beginTransaction();

            $imagePath = $staff->image;

            if ($request->hasFile('image')) {
                if (Storage::exists('/public/' . $staff->image)) {
                    Storage::delete('/public/' . $staff->image);
                    $imagePath = null;
                }
                // Store the image in a directory: 'public/staffs/'
                $generatedName = 'staff-image_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
                $imagePath = $request->file('image')->storeAs('staffs', $generatedName, 'public');
            }

            $staff->update([
                'name' => $request->name,
                'image' => $imagePath,
                'number' => $request->number,
                'email' => $request->email,
                'website' => $request->website,
            ]);

            $staff->refresh();

            $langs = Lang::where('is_published', true)->get();

            foreach ($langs as $lang) {
                $staff->translations()->updateOrCreate(
                    [
                        'lang_id' => $lang->id,
                        'column_name' => 'position',
                    ],
                    [
                        'content' => $request->input('position_' . $lang->code),
                    ]
                );
            }

            toastr('Updated successfully');

            DB::commit();
            return redirect()->route('staffs.index');
        } catch (Exception $e) {
            DB::rollBack();
            return back()->withErrors(['Error' => 'Error. Can\'t update']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staff $staff)
    {
        try {
            DB::beginTransaction();

            if (Storage::exists('/public/' . $staff->image)) {
                Storage::delete('/public/' . $staff->image);
            }

            // delete staff's translations
            $staff->translations()->delete();
            $staff->delete();

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
