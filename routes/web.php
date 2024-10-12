<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AffiliateController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DonationsController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SubCategoriesController;
use App\Http\Controllers\WebController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Melindungi route admin
Route::middleware([RoleMiddleware::class . ':admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index']);
});

// Melindungi route organizer
Route::middleware([RoleMiddleware::class . ':organizer'])->group(function () {
    Route::get('/organizer/dashboard', [OrganizerController::class, 'index']);
});

// Melindungi route donor
Route::middleware([RoleMiddleware::class . ':donor'])->group(function () {
    Route::get('/donor/dashboard', [DonorController::class, 'index']);
});

// Melindungi route affiliate
Route::middleware([RoleMiddleware::class . ':affiliate'])->group(function () {
    Route::get('/affiliate/dashboard', [AffiliateController::class, 'index']);
});
Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('news', NewsController::class);
    Route::resource('campaigns', CampaignController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('subcategories', SubCategoriesController::class);
    Route::resource('donations', DonationsController::class);
    Route::get('show-subcategory/{category_id}', [SubCategoriesController::class, 'getSubCategories']);
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingController::class, 'storeOrUpdate'])->name('settings.storeOrUpdate');
});

Auth::routes();

// WEB
Route::get('/', [WebController::class,'index']);
Route::get('/tentang-kami', [WebController::class,'tentang']);
Route::get('/berita', [WebController::class,'berita']);
Route::get('/kontak', [WebController::class,'kontak']);
Route::get('/program/{id}', [WebController::class,'program']);
Route::get('/detail-program/{id}', [WebController::class,'detail_program']);
Route::get('/detail-donations', [WebController::class,'detail_donations']);
Route::get('/detail-berita/{id}', [WebController::class,'detail_berita']);
// donations
Route::post('/pembayaran/{id}', [WebController::class,'pembayaran']);
Route::post('/detail-donations', [WebController::class,'store']);
