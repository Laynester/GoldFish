<?php

namespace App\Models\CMS;

use Illuminate\Database\Eloquent\Model;
use App\Models\User\User;

class ProfileBackgrounds extends Model
{
  public $timestamps = false;
  protected $table = 'cms_profile_backgrounds';
  protected $fillable = [];
}
