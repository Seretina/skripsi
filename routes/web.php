<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'Auth\LoginController@showLoginForm');
Auth::routes();

Route::prefix('administrasi')->namespace('Admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Karyawan
    Route::get('karyawan', 'KaryawanController@index')->name('karyawan.index');
    Route::get('karyawan/create', 'KaryawanController@create')->name('karyawan.create');
    Route::post('karyawan/store', 'KaryawanController@store')->name('karyawan.store');
    Route::get('karyawan/{karyawanId}', 'KaryawanController@show')->name('karyawan.show');
    Route::put('karyawan/update/{karayawanId}', 'KaryawanController@update')->name('karyawan.update');
    Route::delete('karyawan/delete', 'KaryawanController@destroy')->name('karyawan.delete');

    // Kriteria
    // Route::resource('kriteria', 'KriteriaController')->except('show', 'update', 'delete');

    Route::get('kriteria', 'KriteriaController@index')->name('kriteria.index');
    Route::get('kriteria/create', 'KriteriaController@create')->name('kriteria.create');
    Route::post('kriteria/store', 'KriteriaController@store')->name('kriteria.store');
    Route::get('kriteria/{kriteriaId}', 'KriteriaController@show')->name('kriteria.show');
    Route::put('kriteria/update/{kriteriaId}', 'KriteriaController@update')->name('kriteria.update');
    Route::delete('kriteria/delete', 'KriteriaController@destroy')->name('kriteria.delete');

    // Penilaian Karyawan
    Route::resource('penilaian', 'PenilaianController')->except('show', 'update', 'store', 'destroy');
    Route::post('penilaian/store', 'PenilaianController@store')->name('penilaian.store');
    Route::get('penilaian/{penilaianId}', 'PenilaianController@show')->name('penilaian.show');
    Route::put('penilaian/update/{penilaianId}', 'penilaianController@update')->name('penilaian.update');
    Route::delete('penilaian/delete', 'PenilaianController@destroy')->name('penilaian.delete');

    Route::prefix('perhitungan-topsis')->name('topsis.')->group(function () {
        Route::get('hasil', 'PerhitunganTopsisController@perhitungan')->name('index');
        Route::post('hasil/matrix-normalisasi', 'PerhitunganTopsisController@matrixNormalisasi')->name('matrix.normalisasi');
        Route::post('hasil/matrix-normalisasi-bobot', 'PerhitunganTopsisController@matrixNormalisasiBobot')->name('matrix.normalisasi.bobot');
        Route::post('hasil/matrix-solusi_ideal', 'PerhitunganTopsisController@matrixSolusiIdeal')->name('matrix.solusi.ideal');
        Route::post('hasil/matrix-jarak-ideal', 'PerhitunganTopsisController@matrixJarakIdeal')->name('matrix.jarak.ideal');
        Route::post('hasil/matrix-preferensi', 'PerhitunganTopsisController@matrixPrefrensi')->name('matrix.preferensi');
    });
});
