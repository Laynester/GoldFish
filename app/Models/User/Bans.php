<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use App\Models\User\User;

class Bans extends Model
{
  public $timestamps = false;
  protected $table = 'bans';
  protected $fillable = ['user_id','ip','machine_id','user_staff_id','timestamp','ban_expire','ban_reason','type'];
  public function habbo()
  {
      return $this->belongsTo(User::class, 'user_id');
  }
  public function moderator()
  {
      return $this->belongsTo(User::class, 'user_staff_id');
  }
}
