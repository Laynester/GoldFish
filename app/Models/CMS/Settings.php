<?php

namespace App\Models\CMS;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
  public $timestamps = false;
  protected $table = 'cms_settings';
  protected $fillable = [];
}
