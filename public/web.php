<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SerTaController;
use App\Http\Controllers\SertifikatTanahController;
use App\Http\Controllers\PeriController;
use App\Http\Controllers\PerijinanController;
use App\Http\Controllers\PDFController;

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

Route::get('/in', function () {
    return view('pPeriode');
});
Route::resource('/serta', SerTaController::class);
Route::resource('/ijin', PeriController::class);
Route::resource('/perijinan', PerijinanController::class);

Route::resource('/sertadetail', SertifikatTanahController::class);
Route::get('/', 'App\Http\Controllers\AuthController@index')->name('login');
Route::post('proses_login', 'App\Http\Controllers\AuthController@proses_login')->name('proses_login');
Route::get('logout', 'App\Http\Controllers\AuthController@logout')->name('logout');
Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['Cek_login:adm']], function () {
        Route::resource('adm', AdminController::class);
    });
    Route::group(['middleware' => ['Cek_login:user']], function () {
        Route::resource('user', AdminController::class);
    });
    Route::get('/generate-pdf/{id}', [PDFController::class, 'generatePDF'])->name('generate_pdf');
});
