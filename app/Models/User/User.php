<?php

namespace App\Models\User;

use App\Models\CMS\CameraWeb;
use App\Models\CMS\CmsHome;
use App\Models\CMS\CmsLogin;
use App\Models\Hotel\GroupMembership;
use App\Models\Hotel\Room;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;

    const REDIRECT_HOME = "/user/me";

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'username', 'mail',
        'password', 'last_login', 'ip_register',
        'ip_current', 'account_created', 'credits',
        'motto', 'rank', 'auth_ticket',
        'hotelview', 'profile_background'
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

    public function logins(): HasMany
    {
        return $this->hasMany(CmsLogin::class);
    }

    public function homes(): HasMany
    {
        return $this->hasMany(CmsHome::class, 'user_id');
    }

    public function badges(): HasMany
    {
        return $this->hasMany(UserBadge::class, 'user_id');
    }

    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class, 'owner_id');
    }

    public function photos(): HasMany
    {
        return $this->hasMany(CameraWeb::class, 'user_id');
    }

    public function groupMemberships(): HasMany
    {
        return $this->hasMany(GroupMembership::class, 'user_id');
    }
}
