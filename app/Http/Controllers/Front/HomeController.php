<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Project;
use App\Models\Section;
use App\Models\Service;
use App\Models\Staff;
use Illuminate\Support\Collection;

class HomeController extends Controller
{
    public function index()
    {
        $banner = Banner::with('translations')->where('is_published', true)->first();
        $bannerTranslations = $this->getTranslations($banner->translations);

        $section = Section::with('translations')->first();
        $sectionTranslations = $this->getTranslations($section->translations);

        $services = Service::with('translations')->get();
        $service = $this->getTranslationsWithModel($services);

        $staff = Staff::with('translations')->first();
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

    public function category(Category $category)
    {
        $category = Category::with('translations')->where('id', $category->id)->first();
        $categoryTranslations = $this->getTranslations($category->translations);

        $projects = $category->projects()->with('translations')->get();
        $projects = $projects->groupBy('country')->map(function ($project, $country) {
            return $project->groupBy('is_finished')->map(function ($project) {
                return $project->map(function ($project) {
                    $project->translations = $this->getTranslations($project->translations);
                    return $project;
                });
            });
        });

        return view('front.category', compact('category', 'categoryTranslations', 'projects'));
    }

    public function showProject(Project $project)
    {
        $project = Project::with('translations', 'facilities')->where('id', $project->id)->first();
        $projectTranslations = $this->getTranslations($project->translations);
        $project->facilities->transform(function ($facility) {
            $facility->translations = $this->getTranslations($facility->translations);
            return $facility;
        });

        return view('front.project', compact('project', 'projectTranslations'));
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
