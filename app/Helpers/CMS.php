<?php

namespace App\Helpers;

use App\Models\CMS\Menu;
use Auth;
use Carbon\Carbon;
use Carbon\CarbonInterval;

class CMS
{
	public static function settings($name)
	{
		return \App\Models\CMS\Settings::where('key', $name)->pluck('value')->first();
	}
	public static function online()
	{
		return \App\Models\User\User::where('online', '1')->count();
	}
	public static function getMenu()
	{
		if (Auth::user()) {
			return Menu::orderBy('order', 'asc')->where('group', null)->get();
		} else {
			return Menu::orderBy('order', 'asc')->where('group', null)->where('id', '<>', 1)->get();
		}
	}
	public static function fuseRights($right)
	{
		$query = \App\Models\CMS\FuseRight::where('right', $right)->pluck('min_rank')->first();
		if (auth()->user()->rank >= $query && !empty($query)) {
			return true;
		} else {
			return false;
		}
	}
	public static function userData($id, $key = '')
	{
		if (!empty($key)) {
			if (is_int($id)) {
				return \App\Models\User\User::where('id', $id)->pluck($key)->first();
			} else {
				return \App\Models\User\User::where('username', $id)->pluck($key)->first();
			}
		}
		if (is_int($id)) {
			return \App\Models\User\User::where('id', $id)->first();
		} else {
			return \App\Models\User\User::where('username', $id)->first();
		}
	}
	public static function secondsToTime($value)
	{
		$dt      = Carbon::now();
		$days    = $dt->diffInDays($dt->copy()->addSeconds($value));
		$hours   = $dt->diffInHours($dt->copy()->addSeconds($value)->subDays($days));
		$minutes = $dt->diffInMinutes($dt->copy()->addSeconds($value)->subDays($days)->subHours($hours));
		return CarbonInterval::days($days)->hours($hours)->minutes($minutes)->forHumans();
	}
	public static function stripScript($unfiltered) {
		$open = str_replace('<script>',"&#60;script&#62;",$unfiltered);
		$close = str_replace('</script>',"&#60;/script&#62;",$open);
		return $close;
	}
	public static function bbCode($texto) {
		$texto = htmlentities($texto);
        $a     = array(
            "/\[i\](.*?)\[\/i\]/is",
            "/\[b\](.*?)\[\/b\]/is",
            "/\[u\](.*?)\[\/u\]/is",
            "/\[quote\](.*?)\[\/quote\]/is",
            "/\[url=(.*?)\](.*?)\[\/url\]/is",
			"/\[color=red\](.*?)\[\/color\]/is",
			"/\[color=orange\](.*?)\[\/color\]/is",
			"/\[color=yellow\](.*?)\[\/color\]/is",
			"/\[color=green\](.*?)\[\/color\]/is",
			"/\[color=white\](.*?)\[\/color\]/is",
			"/\[color=cyan\](.*?)\[\/color\]/is",
			"/\[color=blue\](.*?)\[\/color\]/is",
			"/\[color=gray\](.*?)\[\/color\]/is",
			"/\[color=black\](.*?)\[\/color\]/is",
			"/\[size=large\](.*?)\[\/size\]/is",
			"/\[size=small\](.*?)\[\/size\]/is",
			"/\[color=teal\](.*?)\[\/color\]/is",
			"/\[color=purple\](.*?)\[\/color\]/is"
        );
        $b     = array(
            "<i>$1</i>",
            "<b>$1</b>",
            "<u>$1</u>",
            "<div class=\"bbcode-quote\">$1</div>",
            "<a href=\"$1\" target=\"_blank\">$2</a>",
			"<span style=\"color: #d80000\">$1</span>",
			"<span style=\"color: #fe6301\">$1</span>",
			"<span style=\"color: #ffce00\">$1</span>",
			"<span style=\"color: #6cc800\">$1</span>",
			"<span style=\"color: white\">$1</span>",
			"<span style=\"color: #00c6c4\">$1</span>",
			"<span style=\"color: #0070d7\">$1</span>",
			"<span style=\"color: #828282\">$1</span>",
			"<span style=\"color: #000000\">$1</span>",
			"<span style=\"font-size: 14px\">$1</span>",
			"<span style=\"font-size: 9px\">$1</span>",
			"<span style=\"color:teal;\">$1</span>",
			"<span style=\"color:purple;\">$1</span>"
        );
        $texto = preg_replace($a, $b, $texto);
        $texto = nl2br($texto);
        return $texto;
	}
}
