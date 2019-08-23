<?php

namespace App\Models\CMS;

use Illuminate\Database\Eloquent\Model;

class Homes_Cats extends Model
{
    public $timestamps = false;
    protected $table = 'cms_homes_catalogue_cats';
    protected $fillable = ['type','name'];
}
