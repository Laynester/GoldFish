<?php
namespace App\Helpers;
use Auth;
use App\Helpers\CMS;

class Housekeeping
{
  public static function getCount(string $stat)
  {
    $count = $stat::count();
    return $count;
  }
  public static function emuSettings($name)
  {
    return \App\Models\Hotel\EmuSettings::where('key', $name)->pluck('value')->first();
  }
}
