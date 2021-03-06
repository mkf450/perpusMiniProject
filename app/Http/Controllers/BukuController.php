<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\buku;
use App\Models\kategori;
use Validator;

class BukuController extends Controller
{
  // SHOW BOOKS
  public function index()
  {
    $buku = DB::table('buku')
    ->join('kategori', 'buku.idkategori', '=', 'kategori.idkategori')
    ->get();
    return view('lihatBuku', ['buku' => $buku]);

  }

  // ADD BOOKS
  public function showFormAdd(){
    $kategori = DB::table('kategori')->get();
    return view('tambahBuku', ['kategori' => $kategori]);
  }

  public function tambah(Request $request)
  {
      $rules = [
        'isbn'                  => 'min:13|max:13',
        'pengarang'             => 'string',
        'gambar'                => 'image|mimes:jpg,png,jpeg,gif,svg',
      ];

      $messages = [
        'isbn.min'              => 'ISBN buku minimal 13 karakter',
        'isbn.max'              => 'ISBN buku maksimal 13 karakter',
        'author.string'         => 'Nama pengarang tidak valid',
      ];

      $validator = Validator::make($request->all(), $rules, $messages);

      if($validator->fails()){
          return redirect()->back()->withErrors($validator)->withInput($request->all);
      }

      $book = new buku ;
      $book->idbuku         =  $request->id;
      $book->isbn           =  $request->isbn;
      $book->judul          =  $request->judul;
      $book->idkategori     =  $request->kategori;
      $book->pengarang      =  $request->pengarang;
      $book->penerbit       =  $request->penerbit;
      $book->kota_penerbit  =  $request->kota;
      $book->editor         =  $request->editor;
      $book->file_gambar    =  $request->file('gambar')->store('public/images');
      $book->tgl_insert     =  now();
      $book->tgl_update     =  now();
      $book->stok           =  $request->stok;
      $book->stok_tersedia  =  $request->tersedia;
      $book->save();

      return redirect()->route('add_books')->with('success',' Data buku berhasil ditambahkan!');
  }


  public function cat(Request $request)
  {
      $rules = [
        'nama'                    => 'max:255',
      ];

      $messages = [
        'nama.max'              => 'Nama kategori maksimal 255 karakter',
      ];

      $validator = Validator::make($request->all(), $rules, $messages);

      if($validator->fails()){
          return redirect()->back()->withErrors($validator)->withInput($request->all);
      }

      $cat = new kategori ;
      $cat->nama         =  $request->nama;
      $cat->save();

      return redirect()->route('add_category')->with('success',' Kategori buku berhasil ditambahkan!');
  }

  // SEARCH BOOKS
  public function cari(Request $request)
  {
    $search = $request->input('search');

    $buku = DB::table('buku')
        ->join('kategori', 'buku.idkategori', '=', 'kategori.idkategori')
        ->where('judul', 'LIKE', "%{$search}%")
        ->get(['buku.*', 'kategori.*']);

    // return view('cariDataBuku', ['buku' => $buku]);
    return view('cariBuku', compact('buku'));
  }

  public function search(Request $request)
  {
    $search = $request->input('search');

    $buku = DB::table('buku')
        ->join('kategori', 'buku.idkategori', '=', 'kategori.idkategori')
        ->where('judul', 'LIKE', "%{$search}%")
        ->get(['buku.*', 'kategori.*']);

    //return view('cariDataBuku', ['buku' => $buku]);
    return view('cariDataBuku', compact('buku'));
  }

  public function cariBuku(Request $request)
  {
    $cari = $request->input('cariBuku');

    $buku = DB::table('buku')
    ->join('kategori', 'buku.idkategori', '=', 'kategori.idkategori')
    ->where('judul', 'LIKE', "%{$cari}%")
    ->get(['buku.*', 'kategori.*']);

    //return view('cariDataBukuPetugas', ['buku' => $buku]);
    return view('cariDataBukuPetugas', compact('buku'));
  }

  // EDIT BOOK
  public function showFormEdit($id)
  {
    $buku = buku::findOrFail($id);
    return view('editBuku', ['buku' => $buku]);
  }

  public function update(Request $request, $id)
  {
      $rules = [
        'isbn'                    => 'min:13|max:13',
        'author'                  => 'string|min:3|max:50',
      ];

      $messages = [
        'isbn.min'              => 'ISBN buku minimal 13 karakter',
        'isbn.max'              => 'ISBN buku maksimal 13 karakter',
        'author.min'            => 'Nama pengarang minimal 3 karakter',
        'author.max'            => 'Nama pengarang maksimal 50 karakter',
      ];

      $validator = Validator::make($request->all(), $rules, $messages);

      if($validator->fails()){
          return redirect()->back()->withErrors($validator)->withInput($request->all);
      }

      $book = buku::find($id)->update($request->all());
      return redirect()->route('view_books')->with('success',' Data buku telah diperbaharui!');
  }

  // DLETE BOOK
  public function showFormDelete($id)
  {
    $buku = buku::findOrFail($id);
    return view('hapusBuku', ['buku' => $buku]);
  }

  public function hapus($id)
  {
      $book = buku::findOrFail($id);
      $book->delete();

      if ($book) {
        // redirect dengan pesan sukses
        return redirect()->route('view_books')->with(['success' => 'Data Berhasil Dihapus!']);
      } else {
        // redirect dengan pesan error
        return redirect()->route('view_books')->with(['error' => 'Data Gagal Dihapus!']);
      }
  }

  // SHOW CATEGORY
  public function viewcat()
  {
    $kategori = DB::table('kategori')->get();
    return view('lihatKategori', ['kategori' => $kategori]);
  }

  // ADD CATEGORY
  public function addCat(){
    $kategori = DB::table('kategori')->get();
    return view('tambahKategori', ['kategori' => $kategori]);
  }

  // EDIT CATEGORY
  public function formEditCat($id)
  {
    $kategori = kategori::findOrFail($id);
    return view('editKategori', ['kategori' => $kategori]);
  }

  public function editcat(Request $request, $id)
  {
    $kategori = kategori::find($id)->update($request->all());
    return redirect()->route('view_category')->withSuccess('Data kategori telah diperbaharui');
  }

  // DELETE CATEGORY
  public function formDeleteCat($id)
  {
    $kategori = kategori::findOrFail($id);
    return view('hapusKategori', ['kategori' => $kategori]);
  }

  public function deletcat($id)
  {
      $kategori = kategori::findOrFail($id);
      $kategori->delete();

      if ($kategori) {
        return redirect()->route('view_category')->withSuccess('Kategori berhasil dihapus');
      } else {
        return redirect()->route('view_category')->withErrors('Kategori gagal dihapus');
      }
  }
}
