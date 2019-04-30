<?php

namespace App\Models\CMS;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
  public $timestamps = false;
  protected $table = 'cms_news';
  protected $fillable = [];
}
