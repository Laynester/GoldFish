<?php

namespace App\Models\CMS;

use Illuminate\Database\Eloquent\Model;
use App\Models\User\User;

class Camera_web extends Model
{
  public $timestamps = false;
  protected $table = 'camera_web';
  protected $fillable = ['id','user_id','room_id','timestamp','url'];
  public function habbo()
  {
        return $this->belongsTo(User::class, 'user_id');
  }
}
