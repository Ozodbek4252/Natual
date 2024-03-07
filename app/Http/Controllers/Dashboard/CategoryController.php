<?php

namespace App\Http\Controllers\Dashboard;

use App\DataObjects\DataObjectCollection;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Lang;
use App\ViewModels\Category\CategoryViewModel;
use App\ViewModels\Category\IndexCategoryViewModel;
use App\ViewModels\PaginationViewModel;
use Exception;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(int $page = 1, int $limit = 15)
    {
        $query = Category::with('translations.lang')->orderBy('updated_at', 'desc');

        $totalCount = $query->count();
        $skip       = $limit * ($page - 1);
        $items      = $query->skip($skip)->take($limit)->get();

        $categories = new DataObjectCollection($items, $totalCount, $limit, $page);

        return (new PaginationViewModel($categories, IndexCategoryViewModel::class))->toView('dashboard.categories.index');
    }

    public function create()
    {
        $langs = Lang::where('is_published', true)->get();
        return view('dashboard.categories.create', compact('langs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        try {
            DB::beginTransaction();

            // Store the image in a directory: 'public/categories/'
            $imagePath = $request->file('image')->store('categories', 'public');
            $category = Category::create([
                'image' => $imagePath
            ]);

            $langs = Lang::where('is_published', true)->get();

            foreach ($langs as $lang) {
                $category->translations()->create([
                    'lang_id' => $lang->id,
                    'column_name' => 'name',
                    'content' => $request->input('name_' . $lang->code),
                ]);
            }

            toastr('Created successfully');

            DB::commit();
            return redirect()->route('categories.index');
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
    public function edit(Category $category)
    {
        $langs = Lang::where('is_published', true)->get();

        $category =  Category::with('translations.lang')->find($category->id);
        $category = new CategoryViewModel($category);
        return view('dashboard.categories.edit', compact('langs', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        try {
            DB::beginTransaction();

            $imagePath = $category->image;

            if ($request->hasFile('image')) {
                if (Storage::exists('/public/' . $category->image)) {
                    Storage::delete('/public/' . $category->image);
                }
                // Store the image in a directory: 'public/categories/'
                $imagePath = $request->file('image')->store('categories', 'public');
            }

            $category->update([
                'image' => $imagePath
            ]);
            $category->refresh();

            $langs = Lang::where('is_published', true)->get();

            foreach ($langs as $lang) {
                $category->translations()->updateOrCreate(
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
            return redirect()->route('categories.index');
        } catch (Exception $e) {
            DB::rollBack();
            return back()->withErrors(['Error' => 'Error. Can\'t update']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            DB::beginTransaction();

            if (Storage::exists('/public/' . $category->image)) {
                Storage::delete('/public/' . $category->image);
            }

            // delete category's translations
            $category->translations()->delete();
            $category->delete();

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
