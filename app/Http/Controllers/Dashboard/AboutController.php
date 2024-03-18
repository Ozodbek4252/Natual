<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\File;
use App\Models\Lang;
use App\ViewModels\AboutCompany\IndexAboutCompanyViewModel;
use App\ViewModels\AboutCompany\AboutCompanyViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::query()->first();
        $about = new IndexAboutCompanyViewModel($about);
        return view('dashboard.about_company.index', compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        $langs = Lang::where('is_published', true)->get();
        $about = new AboutCompanyViewModel($about);
        return view('dashboard.about_company.edit', compact('about', 'langs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about)
    {
        try {
            $imagePath = $about->image;
            if ($request->hasFile('image')) {
                if (Storage::exists('/public/' . $about->image)) {
                    Storage::delete('/public/' . $about->image);
                }
                // Store the image in a directory: 'public/about/'
                $generatedName = 'about-image_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
                $imagePath = $request->file('image')->storeAs('about', $generatedName, 'public');
            }

            $about->update([
                'image' => $imagePath,
            ]);
            $about->refresh();

            if ($request->hasFile('additional_images')) {
                foreach ($request->file('additional_images') as $file) {
                    $generatedName = 'about-additional_images_' . time() . '.' . $request->file('additional_images')->getClientOriginalExtension();
                    $additionalImagePath = $request->file('additional_images')->storeAs('about', $generatedName, 'public');

                    $about->files()->create([
                        'name' => $additionalImagePath,
                        'type' => 'image',
                        'extension' => $file->getClientOriginalExtension(),
                    ]);
                }
            }

            if ($request->hasFile('certificates')) {
                foreach ($request->file('certificates') as $file) {
                    $generatedName = 'about-certificates_' . time() . '.' . $request->file('certificates')->getClientOriginalExtension();
                    $certificatePath = $request->file('certificates')->storeAs('about/certificates', $generatedName, 'public');

                    $about->files()->create([
                        'name' => $certificatePath,
                        'type' => 'certificate',
                        'extension' => $file->getClientOriginalExtension(),
                    ]);
                }
            }

            toastr('Updated successfully');

            return redirect()->back();
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function destroyAdditionalImage(File $additionalImage)
    {
        try {
            if (Storage::exists('/public/' . $additionalImage->name)) {
                Storage::delete('/public/' . $additionalImage->name);
            }

            $additionalImage->delete();

            toastr('Image deleted successfully');

            return back();
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function destroyCertificate(File $certificate)
    {
        try {
            if (Storage::exists('/public/' . $certificate->name)) {
                Storage::delete('/public/' . $certificate->name);
            }

            $certificate->delete();

            toastr('Certificate deleted successfully');

            return back();
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong');
        }
    }
}
