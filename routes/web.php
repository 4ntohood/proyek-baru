<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SerTaController;
use App\Http\Controllers\SertifikatTanahController;
use App\Http\Controllers\PeriController;
use App\Http\Controllers\PerijinanController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\KelompokController;
use App\Http\Controllers\GolonganController;
use FontLib\Table\Type\name;

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

Route::get('/ftk', 'App\Http\Controllers\AuthController@index')->name('login');
Route::post('proses_login', 'App\Http\Controllers\AuthController@proses_login')->name('proses_login');
Route::get('logout', 'App\Http\Controllers\AuthController@logout')->name('logout');
Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['Cek_login:adm']], function () {
        Route::get('adm', function () {
            return view('pPeriode');
        });

        Route::resource('adm/index', AdminController::class);
        Route::resource('/kelompok', KelompokController::class);
        Route::resource('/golongan', GolonganController::class);
        route::get('index', 'App\Http\Controllers\AdminController@index')->name('home');

        Route::resource('/ijin', PeriController::class);
        Route::get('readijin', 'App\Http\Controllers\PeriController@readijin')->name('readijin');

        Route::resource('/perijinan', PerijinanController::class);
        Route::get('ijin_det', 'App\Http\Controllers\PerijinanController@ijin_det')->name('ijin_det');
        Route::get('readijin_detail', 'App\Http\Controllers\PerijinanController@readijin_detail')->name('readijin_detail');
        Route::get('cetak2/{id}', 'App\Http\Controllers\PerijinanController@cetak')->name('cetak2');
        Route::get('filterijin', 'App\Http\Controllers\PerijinanController@filterijin')->name('filterijin');

        Route::resource('/serta', SerTaController::class);
        Route::get('readserta', 'App\Http\Controllers\SerTaController@readserta')->name('readserta');

        Route::resource('/sertadetail', SertifikatTanahController::class);
        Route::get('serta_det', 'App\Http\Controllers\SertifikatTanahController@serta_det')->name('serta_det');
        Route::get('readserta_detail', 'App\Http\Controllers\SertifikatTanahController@readserta_detail')->name('readserta_detail');
        Route::get('cetak/{id}', 'App\Http\Controllers\SertifikatTanahController@cetak')->name('cetak');
        Route::get('filterserta', 'App\Http\Controllers\SertifikatTanahController@filterserta')->name('filterserta');

        Route::get('generate_pdf/{id}', 'App\Http\Controllers\PDFController@generatePDF')->name('generate_pdf');
        Route::get('watermark_express', 'App\Http\Controllers\PDFController@watermarkPDF')->name('watermark_express');
        Route::post('generate_pdf_plus', 'App\Http\Controllers\PDFController@generatePDF_plus')->name('generate_pdf_plus');

        Route::get('readuploadfoto', 'App\Http\Controllers\AdminController@readuploadfoto')->name('readuploadfoto');

        Route::get('lihat_pdf/{id}', 'App\Http\Controllers\PDFController@lihat_pdf')->name('lihat_pdf');
        Route::get('open_pdf/{id}', 'App\Http\Controllers\PDFController@open_pdf')->name('open_pdf');
        Route::get('tanah_lihat_pdf/{id}', 'App\Http\Controllers\PDFController@tanah_lihat_pdf')->name('tanah_lihat_pdf');
        Route::get('hapus_temp_pdf', 'App\Http\Controllers\PDFController@hapus_temp_pdf')->name('hapus_temp_pdf');

        Route::get('session/get', 'App\Http\Controllers\SessionController@accessSessionData')->name('getsession');
        Route::get('session/set', 'App\Http\Controllers\SessionController@storeSessionData')->name('setsession');
        Route::get('session/remove', 'App\Http\Controllers\SessionController@deleteSessionData')->name('removesession');
    });
    Route::group(['middleware' => ['Cek_login:user']], function () {
        Route::resource('user', AdminController::class);
    });
});
