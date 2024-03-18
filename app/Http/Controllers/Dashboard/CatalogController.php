<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Catalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CatalogController extends Controller
{
    public function index()
    {
        $catalog = Catalog::first();
        return view('dashboard.catalog.index', compact('catalog'));
    }

    public function edit(Catalog $catalog)
    {
        return view('dashboard.catalog.edit', compact('catalog'));
    }

    public function update(Request $request, Catalog $catalog)
    {
        $filePath = $catalog->file;
        if ($request->hasFile('file')) {
            if (Storage::exists('/public/' . $catalog->file)) {
                Storage::delete('/public/' . $catalog->file);
            }
            // Store the file in a directory: 'public/catalog/'
            $generatedName = 'catalog-file_' . time() . '.' . $request->file('file')->getClientOriginalExtension();
            $filePath = $request->file('file')->storeAs('catalog', $generatedName, 'public');
        }

        $catalog->update([
            'file' => $filePath,
        ]);

        toastr('Catalog updated successfully!');

        return redirect()->route('catalog.index');
    }
}
