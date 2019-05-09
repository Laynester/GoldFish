<?php

namespace App\Models\CMS;

use Illuminate\Database\Eloquent\Model;
use App\Models\User\User;

class News extends Model
{
  public $timestamps = false;
  protected $table = 'cms_news';
  protected $fillable = [];
  public function habbo()
    {
        return $this->belongsTo(User::class, 'author');
    }
}
