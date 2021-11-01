<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
  protected $fillable = [
    'idkategori',
    'nama',
  ];

  protected $table = 'kategori';
  protected $primaryKey = 'idkategori';
  public $timestamps = false;
  use HasFactory;
}
