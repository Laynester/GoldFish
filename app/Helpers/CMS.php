<?php
namespace App\Helpers;
use App\Models\CMS\Settings;
use App\Models\CMS\Menu;
use Auth;
use Carbon\Carbon;
use Carbon\CarbonInterval;

class CMS
{
  public static function settings($name) {
    return \App\Models\CMS\Settings::where('key', $name)->pluck('value')->first();
  }
  public static function online() {
    return \App\Models\User\User::where('online', '1')->count();
  }
  public static function getMenu() {
    if (Auth::user()) {
      return Menu::orderBy('order', 'asc')->where('group', null)->get();
    } else {
      return Menu::orderBy('order', 'asc')->where('group', null)->where('id', '<>', 1)->get();
    }
  }
  public static function fuseRights($right) {
    $query = \App\Models\CMS\FuseRight::where('right', $right)->pluck('min_rank')->first();;
    if(auth()->user()->rank >= $query && !empty($query)) {
      return true;
    }
    else {
      return false;
    }
  }
  public static function userData($id, $key = '') {
    if(!empty($key)) {
      if(is_int($id)) {
        return \App\Models\User\User::where('id',$id)->pluck($key)->first();
      } else {
        return \App\Models\User\User::where('username',$id)->pluck($key)->first();
      }
    }
    if(is_int($id)) {
      return \App\Models\User\User::where('id',$id)->first();
    } else {
      return \App\Models\User\User::where('username',$id)->first();
    }
  }
  public static function secondsToTime($value) {
      $dt = Carbon::now();
      $days = $dt->diffInDays($dt->copy()->addSeconds($value));
      $hours = $dt->diffInHours($dt->copy()->addSeconds($value)->subDays($days));
      $minutes = $dt->diffInMinutes($dt->copy()->addSeconds($value)->subDays($days)->subHours($hours));
      return CarbonInterval::days($days)->hours($hours)->minutes($minutes)->forHumans();
  }
}
