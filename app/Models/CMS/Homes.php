<?php

namespace App\Models\CMS;

use Illuminate\Database\Eloquent\Model;

class Homes extends Model
{
    public $timestamps = false;
    protected $table = 'cms_homes';
    protected $fillable = ['user_id','type','name','z','x','y','data'];
}
