<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard\AboutController;
use App\Http\Controllers\Dashboard\BannerController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ContactController;
use App\Http\Controllers\Dashboard\FacilityController;
use App\Http\Controllers\Dashboard\LangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\Dashboard\PartnerController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\ProjectController;
use App\Http\Controllers\Dashboard\RequestController;
use App\Http\Controllers\Dashboard\SectionController;
use App\Http\Controllers\Dashboard\ServiceController;
use App\Http\Controllers\Dashboard\StaffController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'doLogin'])->name('login.post');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'doRegister'])->name('register.post');

Route::resource('locales', LocaleController::class);

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
    Route::resource('abouts', AboutController::class);
    Route::resource('facilities', FacilityController::class);
    Route::resource('projects', ProjectController::class);

    Route::get('request', [RequestController::class, 'store'])->name('requests.index');
    Route::get('requests', [RequestController::class, 'index'])->name('requests.index');
    Route::post('requests', [RequestController::class, 'store'])->name('requests.store');
});
