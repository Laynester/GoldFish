<?php

namespace App\Http\Controllers\Installation;

use App\Http\Controllers\Controller;
use Request;
use Illuminate\Http\Request as Req;
use App\Models\CMS\Settings;
use App\Models\User\User;
use Illuminate\Support\Facades\Hash;
use App\Helpers\CMS;
use App\Models\User\Permissions;
use DB;

class IndexController extends Controller
{
  public function __construct()
  {
    $this->middleware('installer');
  }
  public function index()
  {
    if (Request::isMethod('post')) {
      $host = env('DB_HOST');
      $username = env('DB_USERNAME');
      $password = env('DB_PASSWORD');
      $db = env('DB_DATABASE');
      try {
        $conn = new \PDO('mysql:host=' . $host . ';dbname=' . $db, $username, $password);
        $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $sql = file_get_contents(public_path('/install/sql.sql'));
        $conn->query($sql);
      } catch (\PDOException $e) {
        return redirect()->back()->withErrors('Database connection failed..' . $e->getMessage());
      }
      return redirect('/installer/step/2');
    }
    try {
      DB::connection()->getPdo();
      $connection = true;
      $user = User::get();
    } catch (\Exception $e) {
      $connection = false;
      $user = false;
    }
    return view('index', [
      'connection' => $connection,
      'user'       => $user
    ]);
  }
  public static function steps($id = '', Req $request)
  {
    if ($id == 2) {
      if (Request::isMethod('post')) {
        Settings::where('key', 'hotelname')->update(['value' => request()->get('hotelname')]);
        Settings::where('key', 'site_logo')->update(['value' => request()->get('logo')]);
        Settings::where('key', 'habbo_imager')->update(['value' => request()->get('imager')]);
        Settings::where('key', 'default_motto')->update(['value' => request()->get('motto')]);
        Settings::where('key', 'group_badges')->update(['value' => request()->get('groupbadges')]);
        Settings::where('key', 'theme')->update(['value' => request()->get('theme')]);
        return redirect('/installer/step/3');
      }
      return view('step2');
    }
    if ($id == 3) {
      if (Request::isMethod('post')) {
        Settings::where('key', 'discord_id')->update(['value' => request()->get('discord_id')]);
        Settings::where('key', 'twitter_handle')->update(['value' => request()->get('twitter_handle')]);
        return redirect('/installer/step/4');
      }
      return view('step3');
    }
    if ($id == 4) {
      if (Request::isMethod('post')) {
        Settings::where('key', 'swfdir')->update(['value' => request()->get('swfdir')]);
        Settings::where('key', 'swf')->update(['value' => request()->get('swf')]);
        Settings::where('key', 'variables')->update(['value' => request()->get('variables')]);
        Settings::where('key', 'override_variables')->update(['value' => request()->get('override_variables')]);
        Settings::where('key', 'texts')->update(['value' => request()->get('texts')]);
        Settings::where('key', 'override_texts')->update(['value' => request()->get('override_texts')]);
        Settings::where('key', 'productdata')->update(['value' => request()->get('productdata')]);
        Settings::where('key', 'furnidata')->update(['value' => request()->get('furnidata')]);
        Settings::where('key', 'figuremap')->update(['value' => request()->get('figuremap')]);
        Settings::where('key', 'figuredata')->update(['value' => request()->get('figuredata')]);
        Settings::where('key', 'emuhost')->update(['value' => request()->get('emuhost')]);
        Settings::where('key', 'emuport')->update(['value' => request()->get('emuport')]);
        Settings::where('key', 'rconip')->update(['value' => request()->get('rconip')]);
        Settings::where('key', 'rconport')->update(['value' => request()->get('rconport')]);
        return redirect('/installer/step/5');
      }
      return view('step4');
    }
    if ($id == 5) {
      if (Request::isMethod('post')) {
        $validatedData = $request->validate([
          'username' => 'required|max:255|unique:users',
          'mail'     => 'required|email|max:255|unique:users',
          'password' => 'required|min:6|confirmed'
        ]);
        $rank = Permissions::orderBy('id', 'DESC')->pluck('id')->first();
        User::create([
          'username'        => request()->get('username'),
          'mail'            => request()->get('mail'),
          'password'        => Hash::make(request()->get('password')),
          'ip_register'     => request()->ip(),
          'ip_current'      => request()->ip(),
          'last_login'      => time(),
          'account_created' => time(),
          'motto'           => CMS::settings('default_motto'),
          'rank'            => $rank
        ]);
        return redirect('/installer/step/6');
      }
      return view('step5');
    }
    if ($id == 6) {
      if (Request::isMethod('post')) {
        Settings::where('key', 'installed')->update(['value' => '0']);
        return redirect('/installer/index');
      }
      if (isset($_GET['success'])) {
        Settings::where('key', 'installed')->update(['value' => '1']);
        return redirect('/index');
      }
      return view('step6');
    }
  }
}
