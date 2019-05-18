<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Model;
use App\Models\User\User;

class Friendship extends Model
{
  public $timestamps = false;
  protected $table = 'messenger_friendships';
  protected $fillable = [];
  public function habbo()
    {
        return $this->belongsTo(User::class, 'user_two_id');
    }
}
