<?php

namespace App\Http\Controllers\Housekeeping;

use App\Http\Controllers\Controller;
use App\Helpers\CMS;
use App\Models\CMS\Settings;

class Updater extends Controller
{
  public function check()
  {
    if (CMS::fuseRights('updater')) {
      $url = "http://layne.cf/goldfish/updates/laraupdater.json";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_URL, $url);
      $result = curl_exec($ch);
      curl_close($ch);
      $json = json_decode($result, true);
      if (version_compare(config('app.version_number'), $json['version'], '<')) {
        if (version_compare(config('app.version_number'), $json['last'], '==')) {
          $arr = array(
            "message" => null,
            "version" => $json['version'],
          );
        } else {
          $arr = array(
            "message" => "You are a couple versions behind, visit <a href=\"http://layne.cf/goldfish/updates/index.php\"><b>here</b></a> to get caught up..."
          );
        }
        $myJSON = json_encode($arr);
        return response($myJSON, 200)->header('Content-Type', 'application/json');
      }
      return null;
    } else {
      return null;
    }
  }
  public function update()
  {
    if (CMS::fuseRights('updater')) {
      $url = "http://layne.cf/goldfish/updates/laraupdater.json";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_URL, $url);
      $result = curl_exec($ch);
      curl_close($ch);
      $json = json_decode($result, true);
      if (version_compare(config('app.version_number'), $json['version'], '!=')) {
        $sqlLink = null;
        if ($json['sql'] == 1) {
          $sqlLink = $json['sqlLink'];
        }
        $arr = array(
          "version" => $json['version'],
          "message" => "Updated!",
          "link"    => $sqlLink,
          "zip"     => $json['zipName']
        );
        $myJSON = json_encode($arr);
        $url = 'http://layne.cf/goldfish/updates/' . $json['zipName'];
        $zipFile = public_path() . "\install\update.zip"; // Local Zip File Path
        $zipResource = fopen($zipFile, "w");
        // Get The Zip File From Server
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_AUTOREFERER, true);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_FILE, $zipResource);
        $page = curl_exec($ch);
        curl_close($ch);
        $zip = new \ZipArchive;
        if ($zip->open($zipFile) == "true") {
          $zip->extractTo(base_path());
          $zip->close();
        } else {
          $arr = array(
            "error"       => true,
            "message"     => "Could not update, manually install updates, and fix your folder permissions to prevent this in the future!",
            "releaseLink" => $url,
            "link"        => $sqlLink,
            "zip"         => $json['zipName']
          );
        }
        $myJSON = json_encode($arr);
        Settings::where('key', 'cacheVar')->update(['value' => sha1(time())]);
        return response($myJSON, 200)->header('Content-Type', 'application/json');
      }
    } else {
      return null;
    }
  }
}
