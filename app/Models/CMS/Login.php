<?php

namespace App\Models\CMS;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    public $timestamps = false;
    protected $table = 'cms_logins';
    protected $fillable = ['user_id','ip','timestamp','successful'];
}
