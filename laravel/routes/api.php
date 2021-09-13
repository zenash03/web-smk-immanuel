<?php

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

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('me', [AuthController::class, 'me']);
    Route::get('siswa', [AuthController::class, 'siswa']);
});

Route::group(['middleware' => 'admin'], function () {
    Route::resource('news', NewsController::class)->only(['store', 'update', 'destroy']);
    Route::resource('prestasi', PrestasiController::class)->only(['store', 'update', 'destroy']);
    Route::resource('headline', HeadlineController::class)->only(['store', 'update', 'destroy']);
    Route::resource('banner', BannerController::class)->only(['store', 'update', 'destroy']);
    Route::get('banners', [BannerController::class, 'adminView']);
    Route::put('toggle/{id}', [BannerController::class, 'toggle']);
});

Route::group(['middleware' => 'siswa'], function () {
    Route::resource('magang', FormMagangController::class);
    Route::resource('pendaftaran', PendaftaranController::class);
});

Route::get('news', [NewsController::class, 'index']);
Route::get('news/{id}', [NewsController::class, 'show']);

Route::get('prestasi', [PrestasiController::class, 'index']);
Route::get('prestasi/{id}', [PrestasiController::class, 'show']);

Route::get('headline', [HeadlineController::class, 'index']);
Route::get('headline/{id}', [HeadlineController::class, 'show']);

Route::get('banner', [BannerController::class, 'index']);
Route::get('banner/{id}', [BannerController::class, 'show']);