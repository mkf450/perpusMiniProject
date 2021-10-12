<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;

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

Route::get('/', 'BukuController@index')->name('view_books');
Route::get('lihatBuku', 'BukuController@index')->name('view_books');
Route::get('cariBuku', 'BukuController@search')->name('search');;
Route::get('tambahBuku', 'BukuController@showFormAdd')->name('add_books');
Route::post('tambahBuku', 'BukuController@add');
Route::get('tambahKategori', 'BukuController@addCat')->name('add_category');
Route::post('tambahKategori', 'BukuController@Cat');
Route::get('editBuku/{id}', 'BukuController@showFormEdit')->name('edit_books');
Route::post('editBuku/{id}', 'BukuController@update');
Route::get('hapusBuku/{id}', 'BukuController@showFormDelete')->name('delete_books');
Route::post('hapusBuku/{id}', 'BukuController@hapus');

Route::get('daftar', 'AnggotaController@add')->name('add');;
Route::post('daftar', 'AnggotaController@tambah');

// Route::get('/', function () {
//     return view('welcome');
// });
