<?php

namespace App\Http\Controllers\Dashboard;

use App\DataObjects\DataObjectCollection;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Models\Category;
use App\Models\Facility;
use App\Models\Lang;
use App\Models\Project;
use App\Models\ProjectFacility;
use App\ViewModels\PaginationViewModel;
use App\ViewModels\Project\IndexProjectViewModel;
use App\ViewModels\Project\ProjectViewModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Exception;

class ProjectController extends Controller
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
        $query = Project::with('translations.lang')->orderBy('updated_at', 'desc');

        $totalCount = $query->count();
        $skip       = $limit * ($page - 1);
        $items      = $query->skip($skip)->take($limit)->get();

        $projects = new DataObjectCollection($items, $totalCount, $limit, $page);

        return (new PaginationViewModel($projects, IndexProjectViewModel::class))->toView('dashboard.projects.index');
    }

    /**
     * Show the form for creating a new project.
     *
     * This method retrieves necessary data from the database to populate
     * the form for creating a new project. It retrieves languages, categories,
     * and facilities with their translations in Russian language for better
     * user experience.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieve published languages
        $langs = Lang::where('is_published', true)->get();

        // Retrieve categories with translations in Russian language
        $categories = Category::with('translations.lang')
            ->get()
            ->map(function ($category) {
                // Filter translations for Russian language
                $name = $category->translations->filter(function ($item) {
                    return $item->lang->code == 'ru';
                })->first();

                return [
                    'id' => $category->id,
                    'image' => $category->image,
                    'name' => $name ? $name->content : null,
                ];
            });

        // Retrieve facilities with translations in Russian language
        $facilities = Facility::with('translations.lang')
            ->get()
            ->map(function ($facility) {
                // Filter translations for Russian language
                $name = $facility->translations->filter(function ($item) {
                    return $item->lang->code == 'ru';
                })->first();

                return [
                    'id' => $facility->id,
                    'image' => $facility->image,
                    'name' => $name ? $name->content : null,
                ];
            });

        return view('dashboard.projects.create', compact('langs', 'categories', 'facilities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ServiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        try {
            DB::beginTransaction();

            // Store the image in a directory: 'public/projects/'
            $imagePath = $request->file('image')->store('projects', 'public');
            $project = Project::create([
                'image' => $imagePath,
                'name' => $request->input('name'),
                'date' => $request->input('date'),
                'country' => $request->input('country') ?? 'Uzbekistan',
                'category_id' => $request->input('category_id'),
                'is_finished' => $request->input('is_finished') == 'on' ? true : false,
            ]);

            $langs = Lang::where('is_published', true)->get();

            foreach ($langs as $lang) {
                $project->translations()->create([
                    'lang_id' => $lang->id,
                    'column_name' => 'address',
                    'content' => $request->input('address_' . $lang->code),
                ]);
            }

            if ($request->has('facilities')) {
                $uniqueFacilities = [];

                foreach ($request->input('facilities') as $facility) {
                    // Use the 'facility_id' as the key to ensure uniqueness
                    $uniqueFacilities[$facility['facility_id']] = $facility;
                }

                // Reset keys to start from 0
                $uniqueFacilities = array_values($uniqueFacilities);

                foreach ($uniqueFacilities as $facility) {
                    ProjectFacility::create([
                        'project_id' => $project->id,
                        'facility_id' => $facility['facility_id'],
                        'value' => $facility['value'],
                    ]);
                }
            }

            toastr('Created successfully');

            DB::commit();
            return redirect()->route('projects.index');
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
    public function edit(Project $project)
    {
        $project =  Project::with('translations.lang', 'facilities')->find($project->id);
        $project = new ProjectViewModel($project);

        // Retrieve published languages
        $langs = Lang::where('is_published', true)->get();

        // Retrieve categories with translations in Russian language
        $categories = Category::with('translations.lang')
            ->get()
            ->map(function ($category) {
                // Filter translations for Russian language
                $name = $category->translations->filter(function ($item) {
                    return $item->lang->code == 'ru';
                })->first();

                return [
                    'id' => $category->id,
                    'image' => $category->image,
                    'name' => $name ? $name->content : null,
                ];
            });

        // Retrieve facilities with translations in Russian language
        $facilities = Facility::with('translations.lang')
            ->get()
            ->map(function ($facility) {
                // Filter translations for Russian language
                $name = $facility->translations->filter(function ($item) {
                    return $item->lang->code == 'ru';
                })->first();

                return [
                    'id' => $facility->id,
                    'image' => $facility->image,
                    'name' => $name ? $name->content : null,
                ];
            });

        return view('dashboard.projects.edit', compact('langs', 'project', 'categories', 'facilities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, Project $project)
    {
        try {
            DB::beginTransaction();

            $imagePath = $project->image;

            if ($request->hasFile('image')) {
                if (Storage::exists('/public/' . $project->image)) {
                    Storage::delete('/public/' . $project->image);
                }
                // Store the image in a directory: 'public/projects/'
                $imagePath = $request->file('image')->store('projects', 'public');
            }

            $project->update([
                'image' => $imagePath,
                'name' => $request->input('name'),
                'date' => $request->input('date'),
                'country' => $request->input('country') ?? 'Uzbekistan',
                'category_id' => $request->input('category_id'),
                'is_finished' => $request->input('is_finished') == 'on' ? true : false,
            ]);
            $project->refresh();

            $langs = Lang::where('is_published', true)->get();

            foreach ($langs as $lang) {
                $project->translations()->updateOrCreate(
                    [
                        'lang_id' => $lang->id,
                        'column_name' => 'address',
                    ],
                    [
                        'content' => $request->input('address_' . $lang->code),
                    ]
                );
            }

            $project->syncFacilities($request->input('facilities'));

            toastr('Updated successfully');

            DB::commit();
            return redirect()->route('projects.index');
        } catch (Exception $e) {
            DB::rollBack();
            return back()->withErrors([
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        try {
            DB::beginTransaction();

            if (Storage::exists('/public/' . $project->image)) {
                Storage::delete('/public/' . $project->image);
            }

            // delete project's translations
            $project->translations()->delete();

            ProjectFacility::where('project_id', $project->id)->delete();
            $project->delete();

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
