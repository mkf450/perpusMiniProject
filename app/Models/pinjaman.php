<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pinjaman extends Model
{
  protected $primaryKey = 'idtransaksi';
  public $timestamps = false;
  use HasFactory;
}
