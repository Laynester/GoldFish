<?php 
namespace App\Listeners;

use Illuminate\Auth\Events\Failed;
use Request;

class LogFailedAuthenticationAttempt {

    public function handle(Failed $event)
    {
        \App\Models\CMS\Login::create([
            'user_id'    => $event->user->id,
            'ip'         => Request::ip(),
            'timestamp'  => time(),
            'successful' => '0'
        ]);
    }
}