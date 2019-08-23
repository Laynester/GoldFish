<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Model;

class Commands extends Model
{
  public $timestamps = false;
  protected $table = 'commandlogs';
  protected $fillable = [];
  public function habbo()
  {
    return $this->belongsTo('App\Models\User\User', 'user_id');
  }
}
