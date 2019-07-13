<?php
namespace App\Helpers;
use Auth;
use App\Helpers\CMS;

class Housekeeping
{
  public static function getCount(string $stat)
  {
    $thing = $stat::get();
    $count = $thing->count();
    return $count;
  }
  public static function emuSettings($name)
  {
    return \App\Models\Hotel\EmuSettings::where('key', $name)->pluck('value')->first();
  }
}
