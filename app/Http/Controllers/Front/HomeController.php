<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Models\RequestModel;
use App\Models\Category;
use App\Models\Project;
use App\Models\Service;
use App\Models\Section;
use App\Models\Banner;
use App\Models\Staff;

class HomeController extends Controller
{

    /**
     * Display the home page with data.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $banner = Banner::with('translations')->where('is_published', true)->firstOrFail();
        $bannerTranslations = $this->getTranslations($banner->translations);

        $section = Section::with('translations')->firstOrFail();
        $sectionTranslations = $this->getTranslations($section->translations);

        $services = Service::with('translations')->get();
        $service = $this->getTranslationsWithModel($services);

        $staff = Staff::with('translations')->firstOrFail();
        $staffTranslations = $this->getTranslations($staff->translations);

        $categories = Category::with('translations')->get();
        $categories = $this->getTranslationsWithModel($categories);


        return view('home', compact(
            'banner',
            'bannerTranslations',
            'section',
            'sectionTranslations',
            'services',
            'staff',
            'staffTranslations',
            'categories'
        ));
    }

    /**
     * Display the category page with data.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\View\View
     */
    public function category(Category $category)
    {
        $category = $category->load('translations', 'projects.translations');
        $categoryTranslations = $this->getTranslations($category->translations);

        $projects = $category->projects->groupBy('country')->map(function ($projects) {
            return $projects->groupBy('is_finished')->map(function ($projects) {
                return $projects->map(function ($project) {
                    $project->translations = $this->getTranslations($project->translations);
                    return $project;
                });
            });
        });

        return view('front.category', compact('category', 'categoryTranslations', 'projects'));
    }

    /**
     * Display the project page with data.
     *
     * @param \App\Models\Project $project
     * @return \Illuminate\View\View
     */
    public function showProject(Project $project)
    {
        $project = $project->load('translations', 'facilities.translations');
        $projectTranslations = $this->getTranslations($project->translations);

        $project->facilities->transform(function ($facility) {
            $facility->translations = $this->getTranslations($facility->translations);
            return $facility;
        });

        return view('front.project', compact('project', 'projectTranslations'));
    }

    /**
     * Display the about page with data.
     *
     * @return \Illuminate\View\View
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function about()
    {
        $about = About::with('translations', 'files')->firstOrFail();
        $aboutTranslations = $this->getTranslations($about->translations);

        $files = $this->getImageAndCertificate($about->files);

        return view('front.about', compact('about', 'aboutTranslations', 'files'));
    }

    /**
     * Group files by type and separate images and certificates.
     *
     * @param \Illuminate\Database\Eloquent\Collection $files
     * @return array
     */
    private function getImageAndCertificate($files)
    {
        $files = collect($files)->groupBy('type');

        $images = $files['image']->toArray();
        $certificates = $files['certificate']->toArray();

        return compact('images', 'certificates');
    }

    /**
     * Store a new request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function storeRequest(Request $request)
    {
        // Validate the request
        $this->validate(request(), [
            'name' => 'required|string|max:255',
            'number' => 'required|string|size:19',
        ]);

        // Store the request
        RequestModel::create(['name' => $request->name, 'number' => $request->number]);

        toastr(trans('front.request.success'));

        return redirect()->back();
    }

    /**
     * Get translations for each model in the collection.
     *
     * @param array|Collection $models The collection of models with translations.
     * @return array|Collection The collection of models with translations updated.
     */
    private function getTranslationsWithModel($models)
    {
        // Check if $models is an array or a Collection
        if (!($models instanceof Collection)) {
            $models = collect($models);
        }

        // Iterate through each model and update translations
        $models->transform(function ($model) {
            $translations = $this->getTranslations($model->translations);
            $model->translations = $translations;
            return $model;
        });

        return $models;
    }


    /**
     * Get translations for a collection based on the current locale.
     *
     * @param Collection $collection The collection of translations.
     * @return array An array of translations grouped by language code.
     */
    private function getTranslations(Collection $collection): array
    {
        // Group the collection by language code
        $groupedByLang = $collection->groupBy('column_name');

        // Initialize an array to store translations
        $translations = [];

        foreach ($groupedByLang as $key => $translationsForLang) {
            // Filter translations for the current locale
            $translationForLocale = $translationsForLang
                ->filter(function ($translation) {
                    return $translation->lang->code == app()->getLocale();
                })
                ->first();

            // Store the translation for the language code
            $translations[$key] = $translationForLocale;
        }

        return $translations;
    }
}
