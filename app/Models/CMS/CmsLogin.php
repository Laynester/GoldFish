<?php

namespace App\Models\CMS;

use Illuminate\Database\Eloquent\Model;

class CmsLogin extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'ip',
        'timestamp',
        'successful'
    ];
}
