<?php
namespace App\Helpers;
use App\Models\CMS\Settings;
class CMS{
  public static function settings($name)
  {
       return \App\Models\CMS\Settings::where('key',$name)->pluck('value')->first();
  }
  public static function online()
  {
       return \App\Models\User\User::where('online', '1')->count();
  }
}
