<?php

namespace App\Models\CMS;

use Illuminate\Database\Eloquent\Model;

class Homes_Catalogue extends Model
{
    public $timestamps = false;
    protected $table = 'cms_homes_catalogue';
    protected $fillable = ['type','data','name','category'];
}
