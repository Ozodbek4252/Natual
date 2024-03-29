<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard\AboutController;
use App\Http\Controllers\Dashboard\BannerController;
use App\Http\Controllers\Dashboard\CatalogController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ContactController;
use App\Http\Controllers\Dashboard\FacilityController;
use App\Http\Controllers\Dashboard\LangController;
use App\Http\Controllers\Dashboard\LogoController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\PartnerController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\ProjectController;
use App\Http\Controllers\Dashboard\RequestController;
use App\Http\Controllers\Dashboard\SectionController;
use App\Http\Controllers\Dashboard\ServiceController;
use App\Http\Controllers\Dashboard\StaffController;
use App\Http\Controllers\Front\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Front routes
Route::get('/', [HomeController::class, 'index'])->name('front.home');
Route::get('/category/{category}', [HomeController::class, 'category'])->name('front.category');
Route::get('/project/{project}', [HomeController::class, 'showProject'])->name('front.project.show');
Route::post('/request', [HomeController::class, 'storeRequest'])->name('front.request.send');
Route::get('/about', [HomeController::class, 'about'])->name('front.about');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'doLogin'])->name('login.post');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'doRegister'])->name('register.post');

Route::get('change-lang/{lang}', [LangController::class, 'changeLang'])->name('lang.change');

Route::middleware([
    'auth:sanctum',
    'revalidate',
    // 'isAdmin',
    // 'language',
])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile routes
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('profile/updatePassword', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');

    Route::resource('langs', LangController::class);
    Route::resource('partners', PartnerController::class);
    Route::resource('contacts', ContactController::class);
    Route::resource('staffs', StaffController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('banners', BannerController::class);
    Route::resource('sections', SectionController::class);
    Route::resource('facilities', FacilityController::class);
    Route::resource('projects', ProjectController::class);

    Route::get('request', [RequestController::class, 'store'])->name('requests.index');
    Route::get('requests', [RequestController::class, 'index'])->name('requests.index');
    Route::post('requests', [RequestController::class, 'store'])->name('requests.store');

    Route::get('abouts', [AboutController::class, 'index'])->name('abouts.index');
    Route::get('abouts/{about}/edit', [AboutController::class, 'edit'])->name('abouts.edit');
    Route::put('abouts/{about}', [AboutController::class, 'update'])->name('abouts.update');
    Route::delete('abouts/certificate/{certificate}', [AboutController::class, 'destroyCertificate'])->name('abouts.destroy.certificate');
    Route::delete('abouts/additionalImage/{additionalImage}', [AboutController::class, 'destroyAdditionalImage'])
        ->name('abouts.destroy.additionalImage');

    Route::get('logos', [LogoController::class, 'index'])->name('logos.index');
    Route::put('logos/{logo}', [LogoController::class, 'update'])->name('logos.update');

    Route::get('catalog', [CatalogController::class, 'index'])->name('catalog.index');
    Route::get('catalog/edit/{catalog}', [CatalogController::class, 'edit'])->name('catalog.edit');
    Route::put('catalog/{catalog}', [CatalogController::class, 'update'])->name('catalog.update');
});
