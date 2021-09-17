<?php

use App\Http\Controllers\auth\AdminAuthController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\HeadlineController;
use App\Http\Controllers\magang\FormMagangController;
use App\Http\Controllers\magang\PendaftaranController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PrestasiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Auth Route
Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('me', [AuthController::class, 'me']);
    Route::get('siswa', [AuthController::class, 'siswa']);

    Route::post('admin/login', [AdminAuthController::class, 'login']);
    Route::post('admin/logout', [AdminAuthController::class, 'logout']);
    Route::get('admin/me', [AdminAuthController::class, 'me']);
});

// Authenticated Administrator Route
Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {
    Route::resource('news', NewsController::class)->only(['store', 'update', 'destroy']);
    Route::resource('prestasi', PrestasiController::class)->only(['store', 'update', 'destroy']);
    Route::resource('headline', HeadlineController::class)->only(['store', 'update', 'destroy']);
    Route::resource('banner', BannerController::class)->only(['store', 'update', 'destroy']);

    Route::get('banners', [BannerController::class, 'adminView']);
    Route::put('toggle/{id}', [BannerController::class, 'toggle']);

    Route::resource('magang', FormMagangController::class)->except(['store']);
    Route::post('magang', [FormMagangController::class, 'storeAdmin']);
    Route::resource('pendaftaran', PendaftaranController::class);
});

// Authenticated Student Route
Route::group(['middleware' => 'siswa'], function () {
    Route::get('magang/my-list', [FormMagangController::class, 'getByUsername']);
    Route::get('magang/my-list/{list}', [FormMagangController::class, 'getFormData']);
    Route::resource('magang', FormMagangController::class)->except(['destroy']);
    Route::resource('pendaftaran', PendaftaranController::class)->only(['index', 'show', 'store']);
});


// Public Route
Route::get('news', [NewsController::class, 'index']);
Route::get('news/{id}', [NewsController::class, 'show']);

Route::get('prestasi', [PrestasiController::class, 'index']);
Route::get('prestasi/{id}', [PrestasiController::class, 'show']);

Route::get('headline', [HeadlineController::class, 'index']);
Route::get('headline/{id}', [HeadlineController::class, 'show']);

Route::get('banner', [BannerController::class, 'index']);
Route::get('banner/{id}', [BannerController::class, 'show']);