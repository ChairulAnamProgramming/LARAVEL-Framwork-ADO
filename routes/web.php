<?php

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
Auth::routes();


// User
Route::group(['middleware' => ['auth']], function () {
    // Pages
    Route::get('/', 'PagesController@dashboard');

    // Karyawan
    Route::get('karyawan', 'KaryawanController@index');

    // Roster

    Route::get('roster', 'RosterController@index');
    Route::get('roster/{roster}/jadwal', 'RosterController@list_jadwal');
    Route::get('roster/bagian/{roster}', 'RosterController@bagian');


    // APD
    Route::get('apd', 'ApdController@index');
    Route::get('apd/list_data', 'ApdController@list_data');

    // Merge
    Route::get('merge', 'MergeController@index');
    Route::get('merge/rek-absen/{merge}', 'MergeController@rek_absen');
    Route::get('merge/rek-jenis/{merge}', 'MergeController@rek_jenis');

    // User
    Route::get('user/ubah_password', 'UserController@ubah_password');
    Route::post('user/ubah_password', 'UserController@update_password');
    Route::resource('user', 'UserController');
});


// Admin
Route::group(['middleware' => ['auth', 'roles']], function () {



    Route::get('karyawan/print', 'KaryawanController@print');
    Route::post('karyawan', 'KaryawanController@store');
    Route::get('karyawan/create', 'KaryawanController@create');
    Route::get('karyawan/{karyawan}', 'KaryawanController@show');
    Route::delete('karyawan/{karyawan}', 'KaryawanController@destroy');
    Route::patch('karyawan/{karyawan}', 'KaryawanController@update');
    Route::get('karyawan/{karyawan}/edit', 'KaryawanController@edit');


    Route::resource('bagian', 'BagianController');


    // Roster
    Route::post('roster', 'RosterController@store');
    Route::get('roster/create', 'RosterController@create');
    Route::get('roster/{roster}', 'RosterController@show');
    Route::delete('roster/{roster}', 'RosterController@destroy');
    Route::patch('roster/{roster}', 'RosterController@update');
    Route::get('roster/{roster}/edit', 'RosterController@edit');
    Route::get('roster/status/{roster}', 'RosterController@update_status');
    Route::get('roster/search/{roster}', 'RosterController@search');
    Route::get('roster/print_bagian/{roster}', 'RosterController@print_bagian');
    Route::get('roster/jadwal/{roster}', 'RosterController@print_jadwal');

    // APD

    Route::get('apd/print_list_data', 'ApdController@print_list_data');
    Route::get('apd/print', 'ApdController@print_apd');

    Route::post('apd', 'ApdController@store');
    Route::get('apd/create', 'ApdController@create');
    Route::get('apd/{apd}', 'ApdController@show');
    Route::delete('apd/{apd}', 'ApdController@destroy');
    Route::patch('apd/{apd}', 'ApdController@update');
    Route::get('apd/{apd}/edit', 'ApdController@edit');

    Route::resource('barang', 'BarangController');
    Route::resource('terima_apd', 'TerimaApdController');


    // Rekap Merge

    Route::get('merge/print/print_invoice/{merge}', 'MergeController@rek_gajih');
    Route::get('merge/print-absen/{merge}', 'MergeController@print_absen');
    Route::get('merge/print-invoice/{merge}', 'MergeController@print_invoice');

    Route::get('merge/rek-invoice/{merge}', 'MergeController@rek_invoice');
    Route::get('merge/detail/{merge}', 'MergeController@detail');

    Route::get('merge/carinik', 'MergeController@cari_nik');
    // Route::resource('merge', 'MergeController');

    Route::post('merge', 'MergeController@store');
    Route::get('merge/create', 'MergeController@create');
    Route::get('merge/{merge}', 'MergeController@show');
    Route::delete('merge/{merge}', 'MergeController@destroy');
    Route::patch('merge/{merge}', 'MergeController@update');
    Route::get('merge/{merge}/edit', 'MergeController@edit');







    // Perpanang Kontrak
    Route::resource('perpanjang_kontrak', 'KontrakController');
    Route::get('perpanjang_kontrak/{perpanjang_kontrak}', 'KontrakController@perpanjang_kontrak');

    // Laporan
    Route::get('/laporan/perpanjang_kontrak', 'LaporanController@perpanjang_kontrak');
    Route::get('/laporan/print', 'LaporanController@print');
});
