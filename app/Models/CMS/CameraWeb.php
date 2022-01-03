<?php

namespace App\Models\CMS;

use App\Models\User\User;
use App\Models\Hotel\Room;
use Illuminate\Database\Eloquent\Model;

class CameraWeb extends Model
{
    protected $table = 'camera_web';

    protected $fillable = ['id','user_id','room_id','timestamp','url'];

    public $timestamps = false;

    public function habbo()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
}
