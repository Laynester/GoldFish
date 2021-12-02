<?php
namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
class Achievements extends Model
{
    public $timestamps = false;
    protected $table = 'users_achievements';
    protected $fillable = [];

    public function habbo()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}