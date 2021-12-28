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
Route::get('search', 'BukuController@search')->name('search');
Route::get('cariBuku', 'BukuController@cariBuku')->name('cariBuku');
Route::get('tambahBuku', 'BukuController@showFormAdd')->name('add_books');
Route::post('tambahBuku', 'BukuController@tambah');
// Route::post('tambahKategori', 'BukuController@Cat');
Route::get('editBuku/{id}', 'BukuController@showFormEdit')->name('edit_books');
Route::post('editBuku/{id}', 'BukuController@update');
Route::get('hapusBuku/{id}', 'BukuController@showFormDelete')->name('delete_books');
Route::post('hapusBuku/{id}', 'BukuController@hapus');

Route::get('lihatKategori', 'BukuController@viewcat')->name('view_category');
Route::get('tambahKategori', 'BukuController@addCat')->name('add_category');
Route::post('tambahKategori', 'BukuController@Cat');
Route::get('editKategori/{id}', 'BukuController@formEditCat')->name('edit_category');
Route::post('editKategori/{id}', 'BukuController@editcat');
Route::get('hapusKategori/{id}', 'BukuController@formDeleteCat')->name('delete_category');
Route::post('hapusKategori/{id}', 'BukuController@deletcat');

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
Route::get('/', 'AuthController@guest')->name('guest');
Route::get('cari', 'BukuController@cari')->name('cari');

Route::get('login', 'AuthController@login')->name('login');
Route::post('masuk', 'AuthController@masuk')->name('masuk');

Route::get('signout', 'AuthController@signout')->name('signout');

use App\Http\Controllers\PinjamanController;

Route::get('pinjamBuku/{id}', 'PinjamanController@pinjamBuku')->name('pinjam');
Route::post('pinjamBuku/{id}', 'PinjamanController@borrow');

Route::get('daftar_peminjam', 'PinjamanController@daftar_peminjam')->name('daftar_peminjam');
Route::get('daftar_buku', 'PinjamanController@daftar_buku')->name('daftar_buku');
Route::get('buku_anggota/{id}', 'PinjamanController@buku_anggota')->name('buku_anggota');
// Route::post('daftar', 'AnggotaController@tambah');

Route::get('pengembalian_buku', 'PinjamanController@form_kembali')->name('form_kembali');
Route::post('pengembalian_buku', 'PinjamanController@pengembalian_buku');

Route::get('showAnggota', 'AuthController@showAnggota');

// Route::get('/', function () {
//     return view('welcome');
// });
