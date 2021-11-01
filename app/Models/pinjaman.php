<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pinjaman extends Model
{
  protected $fillable = [
    'nim',
    'tgl_pinjam',
    'total_denda',
    'idpetugas',
  ];

  protected $table = 'pinjaman';
  protected $primaryKey = 'idtransaksi';
  public $timestamps = false;
  use HasFactory;
}

// jika anggota sudah pernah meminjam buku dan belum dikembalikan, maka ia tidak dapat melakukan peminjaman lagi hingga ia telah mengembalikan buku yang dipinjamnya
