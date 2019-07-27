<?php
namespace App\Helpers;
use App\Models\CMS\Settings;
use App\Models\CMS\Menu;
use Auth;
class CMS
{
  public static function settings($name) {
    return \App\Models\CMS\Settings::where('key', $name)->pluck('value')->first();
  }
  public static function online() {
    return \App\Models\User\User::where('online', '1')->count();
  }
  public static function hotelstatus() {
    $host       = CMS::settings('emuhost');
    $port       = CMS::settings('emuport');
    $connection = @fsockopen($host, $port, $errno, $errstr, 1);
    if ($connection) {
      fclose($connection);
      return '0';
    } else {
      fclose($connection);
      return '1';
    }
    fclose($connection);
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
}
