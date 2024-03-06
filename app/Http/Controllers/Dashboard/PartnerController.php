<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PartnerRequest;
use App\Models\Partner;
use Exception;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partners = Partner::orderBy('updated_at', 'desc')->paginate(10);
        return view('dashboard.partners.index', ['partners' => $partners]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PartnerRequest $request)
    {
        try {
            // Store the image in a directory: 'public/partners/'
            $imagePath = $request->file('logo')->store('partners', 'public');
            Partner::create([
                'logo' => $imagePath,
                'name' => $request->name
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
    public function update(PartnerRequest $request, Partner $partner)
    {
        try {
            if (Storage::exists('/public/' . $partner->logo)) {
                Storage::delete('/public/' . $partner->logo);
            }

            // Store the image in a directory: 'public/partners/'
            $imagePath = $request->file('logo')->store('partners', 'public');
            $partner->update([
                'logo' => $imagePath,
                'name' => $request->name
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
    public function destroy(Partner $partner)
    {
        try {
            if (Storage::exists('/public/' . $partner->logo)) {
                Storage::delete('/public/' . $partner->logo);
            }

            $partner->delete();

            toastr('Deleted successfully');

            return redirect()->back();
        } catch (Exception $e) {
            return back()->withErrors(['Error' => 'Error. Can\'t delete']);
        }
    }
}
