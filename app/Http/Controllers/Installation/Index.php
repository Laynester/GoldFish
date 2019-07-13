<?php
namespace App\Http\Controllers\Installation;

use App\Http\Controllers\Controller;
use Request;

class Index extends Controller
{
  public function __construct()
  {
    $this->middleware('installer');
  }
  public function render()
  {
    return view('index');
  }
  public static function steps($id = '')
  {
    if($id == 2) {
      if (Request::isMethod('post'))
      {
        $envPath = base_path('.env');
        $env = file_get_contents($envPath);
        $host = request()->get('host');
        $port = request()->get('port');
        $db = request()->get('dbname');
        $username = request()->get('username');
        $password = request()->get('password');
        $databaseSetting = 'DB_HOST=' . $host . '
DB_PORT=' . $port . '
DB_DATABASE=' . $db . '
DB_USERNAME=' . $username . '
DB_PASSWORD=' . $password . '
';
        // @ignoreCodingStandard
        $rows       = explode("\n", $env);
        $unwanted   = "DB_HOST|DB_PORT|DB_DATABASE|DB_USERNAME|DB_PASSWORD";
        $cleanArray = preg_grep("/$unwanted/i", $rows, PREG_GREP_INVERT);
        $cleanString = implode("\n", $cleanArray);
        $env = $cleanString.$databaseSetting;
        try {
          $conn = new \PDO('mysql:host='.$host, $username, $password);
          $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
          file_put_contents($envPath, $env);

          return redirect('/installer/step/3');
          }
        catch (\PDOException $e) {
          return redirect()->back()->withErrors('Database connection failed..'. $e->getMessage());
        }
      }
      return view('step2');
    }
    if($id == 3) {
      return view('step3');
    }
  }
}
