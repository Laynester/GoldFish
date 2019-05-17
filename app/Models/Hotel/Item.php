<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
  public $timestamps = false;
  protected $table = 'items';
  protected $fillable = [];
}
