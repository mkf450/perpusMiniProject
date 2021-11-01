<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\detail_transaksi;
use App\Models\pinjaman;
use App\Models\petugas;
use App\Models\anggota;
use App\Models\buku;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PinjamanController extends Controller
{
  public function pinjamBuku($id)
  {
    $users = DB::table('anggota')->select('anggota.*')->get();
    $books = DB::table('buku')->select('buku.*')->get();

    $petugas = petugas::findOrFail($id);
    return view('pinjamBuku', ['petugas' => $petugas, 'users' => $users, 'books' => $books]);
  }

  public function borrow(Request $request)
  {
    $pinjem = DB::table('pinjaman')->join('detail_transaksi', 'pinjaman.idtransaksi', '=', 'detail_transaksi.idtransaksi')->where('tgl_kembali', null)->where('nim', $request->nim)->count();
    if ($pinjem >= 2) {
      return redirect()->route('petugasDashboard')->with('error', "Anggota belum mengembalikan buku!");
    }

    // $pinjaman = new pinjaman();
    $data = $request->all();
    $bikin = $this->createPinjaman($data);

    $transaksiID = $bikin->idtransaksi;

    $buku = $data['buku'];
    $bikin2 = $this->createTransaksi($buku, $transaksiID);
    // $buku2 = $data['buku2'];

   // if ($data['buku2'] === '') {
   // } else {
   //   $bikin2 = $this->createTransaksi($buku1, $transaksiID);
   //   $bikin3 = $this->createTransaksi2($buku2, $transaksiID);
   // }

    return redirect()->route('petugasDashboard')->withSuccess('Buku berhasil dipinjam');
    // return view('pinjamBuku', ['petugas' => $petugas, 'users' => $users, 'books' => $books]);
  }

  // public function borrow(Request $request)
  // {
  //   $data = $request->all();
  //   $bikin = $this->createPinjaman($data);
  //
  //   // $transaksiID = DB::table('pinjaman')->select('pinjaman.idtransaksi')->last();
  //   $transaksiID = $bikin->idtransaksi;
  //   // $transaksiID = pinjaman::orderBy('idtransaksi', 'DESC')->first();
  //   // $transaksiID = DB::table('pinjaman')->select('pinjaman.idtransaksi')->where(['tgl_pinjam' => now()])->get();
  //   // $transaksiID = DB::table('pinjaman')->latest('idtransaksi')->first();
  //   // dd($transaksiID);
  //   // $id = (int)$transaksiID;
  //   $buku1 = $data['buku1'];
  //   $buku2 = $data['buku2'];
  //
  //   if ($data['buku2'] === '') {
  //     $bikin2 = $this->createTransaksi($buku1, $transaksiID);
  //   } else {
  //     $bikin2 = $this->createTransaksi($buku1, $transaksiID);
  //     $bikin3 = $this->createTransaksi2($buku2, $transaksiID);
  //   }
  //
  //   return redirect("petugasDashboard");
  //   // return view('pinjamBuku', ['petugas' => $petugas, 'users' => $users, 'books' => $books]);
  // }
  //
  // public function createPinjaman(array $data)
  // {
  //   return pinjaman::create([
  //   'nim' => $data['nim'],
  //   'tgl_pinjam' => now(),
  //   'total_denda' => 0,
  //   'idpetugas' => $data['petugas'],
  //   ]);
  // }
  //
  public function createTransaksi($buku, $transaksiID)
  {
    // dd($data['buku2']);
    return detail_transaksi::create([
      'idbuku' => $buku,
      // 'idbuku' => $data['buku1'],
      'idtransaksi' => $transaksiID,
      'denda' => 0,
    ]);
  }

  // public function createTransaksi2($buku2, $transaksiID)
  // {
  //   return detail_transaksi::create([
  //   'idtransaksi' => $transaksiID,
  //   'idbuku' => $buku2,
  //   // 'idbuku' => $data['buku2'],
  //   'denda' => 0,
  //   ]);
  // }


  public function createPinjaman(array $data)
  {
    return pinjaman::create([
    'nim' => $data['nim'],
    'tgl_pinjam' => now(),
    'total_denda' => 0,
    'idpetugas' => $data['petugas'],
    ]);
  }

  public function daftar_peminjam()
  {
    $pinjaman = DB::table('pinjaman')
    ->join('petugas', 'pinjaman.idpetugas', '=', 'petugas.idpetugas')
    ->get(['pinjaman.*', 'petugas.nama AS namaPetugas']);
    return view('daftarPeminjamBuku', ['pinjaman' => $pinjaman]);
  }

  public function daftar_buku()
  {
    $query = DB::table('detail_transaksi')
    ->join('pinjaman', 'detail_transaksi.idtransaksi', '=', 'pinjaman.idtransaksi')
    ->join('buku', 'detail_transaksi.idbuku', '=', 'buku.idbuku')
    ->join('kategori', 'buku.idkategori', '=', 'kategori.idkategori')
    ->join('petugas', 'pinjaman.idpetugas', '=', 'petugas.idpetugas')
    ->whereNull('detail_transaksi.tgl_kembali')
    //->get(['buku.*', 'pinjaman.*']);
    ->get(['buku.*', 'pinjaman.*', 'kategori.nama AS Kategori', 'petugas.nama AS namaPetugas']);


    return view('DaftarBukuDipinjamPetugas', compact('query'));
    // $pinjaman = DB::table('pinjaman')->get();
    // return view('daftarPeminjamBuku', ['pinjaman' => $pinjaman]);
  }

  public function buku_anggota($id)
  {
    $query = DB::table('detail_transaksi')
    ->join('pinjaman', 'detail_transaksi.idtransaksi', '=', 'pinjaman.idtransaksi')
    ->join('buku', 'detail_transaksi.idbuku', '=', 'buku.idbuku')
    ->join('kategori', 'buku.idkategori', '=', 'kategori.idkategori')
    ->join('petugas', 'pinjaman.idpetugas', '=', 'petugas.idpetugas')
    ->whereNull('detail_transaksi.tgl_kembali')
    ->where('pinjaman.nim', $id)
    //->get(['buku.*', 'pinjaman.*']);
    ->get(['buku.*', 'pinjaman.*', 'kategori.nama AS Kategori', 'petugas.nama AS namaPetugas']);


    return view('DaftarBukuDipinjamAnggota', compact('query'));
    // $pinjaman = DB::table('pinjaman')->get();
    // return view('daftarPeminjamBuku', ['pinjaman' => $pinjaman]);
  }
  
  public function form_kembali()
  {
    $query = DB::table('detail_transaksi')
    ->join('pinjaman', 'detail_transaksi.idtransaksi', '=', 'pinjaman.idtransaksi')
    ->join('buku', 'detail_transaksi.idbuku', '=', 'buku.idbuku')
    ->join('anggota', 'pinjaman.nim', '=', 'anggota.nim')
    // ->join('petugas', 'pinjaman.idpetugas', '=', 'petugas.idpetugas')
    // ->whereNull('detail_transaksi.tgl_kembali')

    // ->where('pinjaman.nim', $id)

    // ->get(['buku.*', 'pinjaman.*']);
    ->get(['buku.*', 'pinjaman.*', 'detail_transaksi.*']);

    return view('pengembalianBuku', compact('query'));
    // $pinjaman = DB::table('pinjaman')->get();
    // return view('daftarPeminjamBuku', ['pinjaman' => $pinjaman]);
  }

  public function pengembalian_buku(Request $request)
  {
    $transaksi = pinjaman::join('detail_transaksi', 'pinjaman.idtransaksi', '=', 'detail_transaksi.idtransaksi')
    ->join('buku', 'detail_transaksi.idbuku', '=', 'buku.idbuku')
    ->join('anggota', 'pinjaman.nim', '=', 'anggota.nim')
    ->where('pinjaman.nim', $request->nim)
    ->where('detail_transaksi.idtransaksi', $request->idtransaksi)
    ->first();

    if ($transaksi->tgl_kembali != null) {
      return redirect()->route('form_kembali')->withErrors('Buku sudah dikembalikan!');
    }

    $tgl_pinjam = Carbon::parse($transaksi->tgl_pinjam);
    $tgl_kembali = now();
    $tgl_selisih = $tgl_pinjam->diffInDays($tgl_kembali);

    $denda = 0;
    if ($tgl_selisih > 14) {
      $denda = ($tgl_selisih - 14) * 1000;
    }

    $cari_idtransaksi = pinjaman::where('idtransaksi', $request->idtransaksi)->first();
    $cari_idtransaksi->total_denda = $denda;

    detail_transaksi::where('idtransaksi', $request->idtransaksi)->update(array('denda' => $denda, 'tgl_kembali' => $tgl_kembali));
    $cari_idtransaksi->update();
    return redirect()->route('form_kembali')->withSuccess('Berhasil mengembalikan buku');
    
    // try {
    //   detail_transaksi::where('idtransaksi', $request->idtransaksi)->update(array('denda' => $denda, 'tgl_kembali' => $tgl_kembali));
    //   $cari_idtransaksi->update();
    //   return redirect()->route('form_kembali')->withSuccess('Berhasil mengembalikan buku');
    // } catch (\Throwable $th) {
    //   return redirect()->route('form_kembali')->withErrors('Gagal mengembalikan buku');
    // }
    // return view('DaftarBukuDipinjamAnggota', compact('query'));
  }

}
