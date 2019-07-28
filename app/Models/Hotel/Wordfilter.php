<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Model;

class Wordfilter extends Model
{
  public $timestamps = false;
  protected $table = 'wordfilter';
  protected $fillable = ['key','replacement','hide','report','mute'];
}
