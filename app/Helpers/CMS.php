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
  public static function hotelstatus() {
    $host = CMS::settings('emuhost');
    $port = CMS::settings('emuport');
    $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
$connection =  @socket_connect($socket, $host, $port);

if( $connection ){
    return '0';
}
else {
    return '1';
}
  }
}
