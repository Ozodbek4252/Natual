<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\Lang;
use App\Models\Logo;
use App\Models\Partner;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $langsForHeader = Lang::where('is_published', true)->get();
            $currenctLang = Lang::where('code', session('locale'))->first();
            $logo = Logo::first();

            $contacts = Contact::all();
            $contacts = collect($contacts)->groupBy('title')->map(function ($item, $key) {
                return $item[0];
            })->toArray();

            $footerPartners = Partner::all();

            $view->with([
                'langsForHeader' => $langsForHeader,
                'currenctLang' => $currenctLang,
                'logo' => $logo,
                'global_contacts' => $contacts,
                'footerPartners' => $footerPartners,
            ]);
        });
    }
}
