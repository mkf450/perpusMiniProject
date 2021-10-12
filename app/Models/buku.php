<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
  protected $table = 'buku';
  protected $primaryKey = 'idbuku';
  // protected $fillable = ['_token'];
  public $timestamps = false;
  use HasFactory;
}
