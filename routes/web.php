<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\BukuController;

// Route::get('/', 'BukuController@index')->name('view_books');
Route::get('lihatBuku', 'BukuController@index')->name('view_books');
Route::get('cariBuku', 'BukuController@search')->name('search');;
Route::get('tambahBuku', 'BukuController@showFormAdd')->name('add_books');
Route::post('tambahBuku', 'BukuController@tambah');
Route::get('tambahKategori', 'BukuController@addCat')->name('add_category');
Route::post('tambahKategori', 'BukuController@Cat');
Route::get('editBuku/{id}', 'BukuController@showFormEdit')->name('edit_books');
Route::post('editBuku/{id}', 'BukuController@update');
Route::get('hapusBuku/{id}', 'BukuController@showFormDelete')->name('delete_books');
Route::post('hapusBuku/{id}', 'BukuController@hapus');

use App\Http\Controllers\AuthController;

// PETUGAS
Route::get('petugasDashboard', 'AuthController@petugasDashboard')->name('petugasDashboard');

Route::get('petugas_registration', 'AuthController@petugas_registration')->name('petugas_regis');
Route::post('petugas_daftar', 'AuthController@petugas_daftar')->name('petugas_daftar');

// ANGGOTA
Route::get('anggotaDashboard', 'AuthController@anggotaDashboard')->name('anggotaDashboard');

Route::get('anggota_registration', 'AuthController@anggota_registration')->name('anggota_regis');
Route::post('anggota_daftar', 'AuthController@anggota_daftar')->name('anggota_daftar');

// SEMUA
Route::get('/', 'AuthController@login')->name('login');
Route::get('login', 'AuthController@login')->name('login');
Route::post('masuk', 'AuthController@masuk')->name('masuk');

Route::get('signout', 'AuthController@signout')->name('signout');

// use App\Http\Controllers\AnggotaController;
//
// Route::get('daftar', 'AnggotaController@add')->name('add');;
// Route::post('daftar', 'AnggotaController@tambah');

// Route::get('/', function () {
//     return view('welcome');
// });
