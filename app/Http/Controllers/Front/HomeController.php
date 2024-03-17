<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Section;
use Illuminate\Support\Collection;

class HomeController extends Controller
{
    public function index()
    {
        $banner = Banner::with('translations')->where('is_published', true)->first();
        $bannerTranslations = $this->getTranslations($banner->translations);
        $section = Section::with('translations')->first();
        $sectionTranslations = $this->getTranslations($section->translations);

        return view('home', compact(
            'banner',
            'bannerTranslations',
            'section',
            'sectionTranslations'
        ));
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
