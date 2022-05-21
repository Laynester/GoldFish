<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Model;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MessengerFriendship extends Model
{
    public $timestamps = false;

    protected $fillable = [];

    public function friend(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_two_id');
    }
}
