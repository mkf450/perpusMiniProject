<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class petugas extends Model
{
  protected $primaryKey = 'idpetugas';
  public $timestamps = false;
  use HasFactory;
}
