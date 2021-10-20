<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class anggota extends Model
{
  protected $fillable = [
      'nim',
      'nama',
      'password',
      'alamat',
      'kota',
      'email',
      'no_telp',
  ];
  
  protected $table = 'anggota';
  protected $primaryKey = 'nim';
  public $timestamps = false;
  use HasFactory;
}
