<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Bans extends Model
{
  public $timestamps = false;
  protected $table = 'bans';
  protected $fillable = [];
}
