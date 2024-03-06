<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StaffRequest;
use App\Models\Staff;
use Exception;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staffs = Staff::orderBy('updated_at', 'desc')->paginate(10);
        return view('dashboard.staffs.index', compact('staffs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StaffRequest $request)
    {
        try {
            $imagePath = null;
            if ($request->hasFile('image')) {
                // Store the image in a directory: 'public/staffs/'
                $imagePath = $request->file('image')->store('staffs', 'public');
            }

            Staff::create([
                'name' => $request->name,
                'position' => $request->position,
                'image' => $imagePath,
                'number' => $request->position,
                'email' => $request->email,
                'website' => $request->website,
            ]);

            toastr('Created successfully');

            return redirect()->back();
        } catch (Exception $e) {
            return back()->withErrors([
                'error' => 'Error. Can\'t store',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StaffRequest $request, Staff $staff)
    {
        try {
            $imagePath = $staff->image;

            if ($request->hasFile('image')) {
                if (Storage::exists('/public/' . $staff->image)) {
                    Storage::delete('/public/' . $staff->image);
                    $imagePath = null;
                }
                // Store the image in a directory: 'public/staffs/'
                $imagePath = $request->file('image')->store('staffs', 'public');
            }

            $staff->update([
                'name' => $request->name,
                'position' => $request->position,
                'image' => $imagePath,
                'number' => $request->position,
                'email' => $request->email,
                'website' => $request->website,
            ]);

            toastr('Updated successfully');

            return redirect()->back();
        } catch (Exception $e) {
            return back()->withErrors(['Error' => 'Error. Can\'t update']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staff $staff)
    {
        try {
            if (Storage::exists('/public/' . $staff->image)) {
                Storage::delete('/public/' . $staff->image);
            }

            $staff->delete();

            toastr('Deleted successfully');

            return redirect()->back();
        } catch (Exception $e) {
            return back()->withErrors(['Error' => 'Error. Can\'t delete']);
        }
    }
}
