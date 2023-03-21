<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SerTaController;
use App\Http\Controllers\SertifikatTanahController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/ijin', function () {
    return view('ijin');
});
Route::resource('/serta', SerTaController::class);
Route::resource('/sertadetail', SertifikatTanahController::class);
Route::get('pstd', 'App\Http\Controllers\AuthController@index')->name('login');
Route::post('proses_login', 'App\Http\Controllers\AuthController@proses_login')->name('proses_login');
Route::get('logout', 'App\Http\Controllers\AuthController@logout')->name('logout');
Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['Cek_login:adm']], function () {
        Route::resource('adm', AdminController::class);
    });
    Route::group(['middleware' => ['Cek_login:user']], function () {
        Route::resource('user', AdminController::class);
    });
});
