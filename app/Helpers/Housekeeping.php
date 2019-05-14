<?php
namespace App\Helpers;

class Housekeeping
{
    public static function getCount(string $stat)
    {
        $thing = $stat::get();
        $count = $thing->count();
        return $count;
    }
}
