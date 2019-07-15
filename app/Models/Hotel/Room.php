<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
  public $timestamps = false;
  protected $table = 'rooms';
  protected $fillable = ['is_public'];
}
