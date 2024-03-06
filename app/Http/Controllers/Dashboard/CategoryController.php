<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Exception;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('updated_at', 'desc')->paginate(20);
        return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        try {
            // Store the image in a directory: 'public/categories/'
            $imagePath = $request->file('image')->store('categories', 'public');
            Category::create([
                'name' => $request->name,
                'image' => $imagePath
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
    public function update(CategoryRequest $request, Category $category)
    {
        try {
            $imagePath = $category->image;

            if ($request->hasFile('image')) {
                if (Storage::exists('/public/' . $category->image)) {
                    Storage::delete('/public/' . $category->image);
                }
                // Store the image in a directory: 'public/categories/'
                $imagePath = $request->file('image')->store('categories', 'public');
            }

            $category->update([
                'name' => $request->name,
                'image' => $imagePath
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
    public function destroy(Category $category)
    {
        try {
            if (Storage::exists('/public/' . $category->image)) {
                Storage::delete('/public/' . $category->image);
            }

            $category->delete();

            toastr('Deleted successfully');

            return redirect()->back();
        } catch (Exception $e) {
            return back()->withErrors(['Error' => 'Error. Can\'t delete']);
        }
    }
}
