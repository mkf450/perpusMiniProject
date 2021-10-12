<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\anggota;
use Validator;
use Hash;

class AnggotaController extends Controller
{
  public function add()
  {
    return view('daftarAnggotaBaru');
  }

  public function tambah(Request $request)
  {
    $rules = [
      'email'                  => 'email',
      'password'               => 'string',
    ];

    $messages = [
      'email.email'            => 'Email tidak valid',
      'password.string'        => 'Password harus berupa string',
    ];

    $validator = Validator::make($request->all(), $rules, $messages);

    if($validator->fails()){
        return redirect()->back()->withErrors($validator)->withInput($request->all);
    }

    $anggota = new anggota;
    $anggota->nim       =  $request->nim;
    $anggota->nama      =  $request->nama;
    $anggota->password  =  Hash::make($request->password);
    $anggota->alamat    =  $request->alamat;
    $anggota->kota      =  $request->kota;
    $anggota->email     =  $request->email;
    $anggota->no_telp   =  strval($request->telp);
    $anggota->save();

    return redirect()->route('add')->with('success',' Data buku berhasil ditambahkan!');
  }
}
