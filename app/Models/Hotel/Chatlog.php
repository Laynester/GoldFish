<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Model;

class Chatlog extends Model
{
  public $timestamps = false;
  protected $table = 'chatlogs_room';
  protected $fillable = [];
  public function room()
  {
      return $this->belongsTo('App\Models\Hotel\Room', 'room_id');
  }
  public function habbo()
  {
        return $this->belongsTo('App\Models\User\User', 'user_from_id');
  }
}
