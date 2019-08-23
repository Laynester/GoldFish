<?php

namespace App\Models\CMS;

use Illuminate\Database\Eloquent\Model;

class Hk extends Model
{
    public $timestamps = false;
    protected $table = 'cms_hk_logs';
    protected $fillable = ['user_id','ip','action','timestamp'];
    public function habbo()
    {
        return $this->belongsTo(\App\Models\User\User::class, 'user_id');
    }
}
