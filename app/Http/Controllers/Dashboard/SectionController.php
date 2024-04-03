<?php

namespace App\Http\Controllers\Dashboard;

use App\DataObjects\DataObjectCollection;
use App\Http\Controllers\Controller;
use App\Http\Requests\SectionRequest;
use App\Models\Lang;
use App\Models\Section;
use App\ViewModels\PaginationViewModel;
use App\ViewModels\Section\IndexSectionViewModel;
use App\ViewModels\Section\SectionViewModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $page = $request->query('page', 1);
        $limit = $request->query('limit', 10);

        $query = Section::with('translations.lang')->orderBy('updated_at', 'desc');

        $totalCount = $query->count();
        $skip       = $limit * ($page - 1);
        $items      = $query->skip($skip)->take($limit)->get();

        $sections = new DataObjectCollection($items, $totalCount, $limit, $page);

        return (new PaginationViewModel($sections, IndexSectionViewModel::class))->toView('dashboard.sections.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $langs = Lang::where('is_published', true)->get();
        return view('dashboard.sections.create', compact('langs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\SectionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SectionRequest $request)
    {
        try {
            DB::beginTransaction();

            // Store the image in a directory: 'public/sections/'
            $generatedName = 'section-image_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $imagePath = $request->file('image')->storeAs('sections', $generatedName, 'public');

            $section = Section::create([
                'image' => $imagePath,
                'link' => $request->input('link'),
            ]);

            $langs = Lang::where('is_published', true)->get();

            foreach ($langs as $lang) {
                $section->translations()->create([
                    'lang_id' => $lang->id,
                    'column_name' => 'title',
                    'content' => $request->input('title_' . $lang->code),
                ]);

                $section->translations()->create([
                    'lang_id' => $lang->id,
                    'column_name' => 'description',
                    'content' => $request->input('description_' . $lang->code),
                ]);
            }

            toastr('Created successfully');

            DB::commit();
            return redirect()->route('sections.index');
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
    public function edit(Section $section)
    {
        $langs = Lang::where('is_published', true)->get();

        $section =  Section::with('translations.lang')->find($section->id);
        $section = new SectionViewModel($section);
        return view('dashboard.sections.edit', compact('langs', 'section'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SectionRequest $request, Section $section)
    {
        try {
            DB::beginTransaction();

            $imagePath = $section->image;

            if ($request->hasFile('image')) {
                if (Storage::exists('/public/' . $section->image)) {
                    Storage::delete('/public/' . $section->image);
                }
                // Store the image in a directory: 'public/sections/'
                $generatedName = 'section-image_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
                $imagePath = $request->file('image')->storeAs('sections', $generatedName, 'public');
            }

            $section->update([
                'image' => $imagePath,
                'link' => $request->input('link')
            ]);
            $section->refresh();

            $langs = Lang::where('is_published', true)->get();

            foreach ($langs as $lang) {
                $section->translations()->updateOrCreate(
                    [
                        'lang_id' => $lang->id,
                        'column_name' => 'title',
                    ],
                    [
                        'content' => $request->input('title_' . $lang->code),
                    ]
                );
                $section->translations()->updateOrCreate(
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
            return redirect()->route('sections.index');
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
    public function destroy(Section $section)
    {
        try {
            DB::beginTransaction();

            if (Storage::exists('/public/' . $section->image)) {
                Storage::delete('/public/' . $section->image);
            }

            // delete section's translations
            $section->translations()->delete();
            $section->delete();

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
