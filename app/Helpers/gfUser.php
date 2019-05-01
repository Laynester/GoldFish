<?php
namespace App\Helpers;
use App\Models\User\User_Badges;
class gfUser{
  public static function badges($name)
  {
       return \App\Models\User\User_Badges::where('user_id',$name)->pluck('badge_code')->first();
  }
}
