<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\User\Permission;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'username', 'mail', 'password', 'last_login', 'ip_register', 'ip_current', 'account_created', 'credits', 'motto', 'rank', 'auth_ticket'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'mail_verified' => 'datetime',
    ];
    public function diamonds()
    {
        return $this->hasOne(UserCurrency::class, 'user_id', 'id')->where('type', '5');
    }
    public function duckets()
    {
        return $this->hasOne(UserCurrency::class, 'user_id', 'id')->where('type', '0');
    }

    public function points()
    {
        return $this->hasOne(UserCurrency::class, 'user_id', 'id')->where('type', '101');
    }
    public function getRouteKeyName()
    {
        return 'username';
    }
    public function rank_name()
    {
        return $this->belongsTo(Permission::class, 'rank');
    }

    public function ssoTicket()
    {
        $sso = 'goldfish-' . Str::uuid();

        if (User::where('auth_ticket', $sso)->exists()) {
            return $this->ssoTicket();
        }

        $this->update([
           'auth_ticket' => $sso
        ]);

        return $sso;
    }

    public function currencies(): HasMany
    {
        return $this->hasMany(UserCurrency::class);
    }
}
