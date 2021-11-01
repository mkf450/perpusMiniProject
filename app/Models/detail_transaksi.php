<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_transaksi extends Model
{
  protected $fillable = [
    'idtransaksi',
    'idbuku',
    'tgl_kembali',
    'denda',
  ];

  protected $table = 'detail_transaksi';
  public $timestamps = false;
  use HasFactory;
}
