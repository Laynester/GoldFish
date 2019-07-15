<?php
namespace App\Helpers;
use Auth;
use App\Helpers\CMS;

class Installation
{
  public static function stepOne()
  {
    $host = env('DB_HOST');
    $username = env('DB_USERNAME');
    $password = env('DB_PASSWORD');
    $db = env('DB_DATABASE');
    try {
      $conn = new \PDO('mysql:host='.$host.';dbname='.$db, $username, $password);
      $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
      $sql = file_get_contents(public_path('/install/sql.sql'));
      $conn->query($sql);
      }
    catch (\PDOException $e) {
      return redirect()->back()->withErrors('Database connection failed..'. $e->getMessage());
    }
  }
}
