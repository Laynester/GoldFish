<?php

namespace App\Models\User;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;

class UserCurrency extends Model
{
  public $timestamps = false;
  protected $table = 'users_currency';
  protected $guarded = [];
  public function habbo()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
