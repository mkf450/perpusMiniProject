<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
  protected $fillable = [
       'isbn',
       'judul',
       'idkategori',
       'pengarang',
       'penerbit',
       'kota_penerbit',
       'file_gambar',
       'editor',
       'tgl_insert',
       'tgl_update',
       'stok',
       'stok_tersedia',
   ];
   
   protected $table = 'buku';
  protected $primaryKey = 'idbuku';
  // protected $fillable = ['_token'];
  public $timestamps = false;
  use HasFactory;
}
