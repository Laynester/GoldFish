<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class User_Badges extends Model
{
  public $timestamps = false;
  protected $table = 'users_badges';
  protected $fillable = [];
}
