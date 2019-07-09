<?php
namespace App\Helpers;
use App\Helpers\CMS;
class Rcon
{
  public static function sendRconMessage($message) {
    // Connect to the Rcon port.
    $socket = @socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    if ($socket !== false) {
      if (@socket_connect($socket, CMS::settings('rconip'), CMS::settings('rconport'))) {
          @socket_write($socket, $message);
          @socket_close($socket);
      }
    }
  }
  public static function disconnect($userId){
    $message = json_encode([
        'key' => 'disconnect',
        'data' => [
            'user_id' => $userId,
        ],
    ]);
    return self::sendRconMessage($message);
  }
  public static function points($userId,$amount,$type){
    $message = json_encode([
        'key' => 'givepoints',
        'data' => [
            'user_id' => $userId,
            'points' => $amount,
            'type' => $type,
        ],
    ]);
    return self::sendRconMessage($message);
  }
  public static function credits($userId,$amount){
    $message = json_encode([
        'key' => 'givecredits',
        'data' => [
            'user_id' => $userId,
            'credits' => $amount,
        ],
    ]);
    return self::sendRconMessage($message);
  }
  public static function alertUser($userId,$message){
    $message = json_encode([
        'key' => 'alertuser',
        'data' => [
            'user_id' => $userId,
            'message' => $message,
        ],
    ]);
    return self::sendRconMessage($message);
  }
  public static function muteUser($userId,$duration){
    $message = json_encode([
        'key' => 'muteuser',
        'data' => [
            'user_id' => $userId,
            'duration' => $duration,
        ],
    ]);
    return self::sendRconMessage($message);
  }
  public static function execCommand($userId,$command){
    $message = json_encode([
        'key' => 'executecommand',
        'data' => [
            'user_id' => $userId,
            'command' => $command,
        ],
    ]);
    return self::sendRconMessage($message);
  }
  public static function hotelAlert($alert, $url=''){
    if(empty($url)) {
      $message = json_encode([
          'key' => 'hotelalert',
          'data' => [
              'message' => $alert
          ],
      ]);
    }
    else{
      $message = json_encode([
          'key' => 'hotelalert',
          'data' => [
              'message' => $alert,
              'url' => $url,
          ],
      ]);
    }
    return self::sendRconMessage($message);
  }
  public static function giveBadge($userId,$badgeName){
    $message = json_encode([
        'key' => 'givebadge',
        'data' => [
            'user_id' => $userId,
            'badge' => $badgeName,
        ],
    ]);
    return self::sendRconMessage($message);
  }
  public static function forwardUser($userId,$room){
    $message = json_encode([
        'key' => 'forwarduser',
        'data' => [
            'user_id' => $userId,
            'room_id' => $room,
        ],
    ]);
    return self::sendRconMessage($message);
  }
}
