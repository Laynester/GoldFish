<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
  public $timestamps = false;
  protected $table = 'permissions';
  protected $fillable = [];
}
