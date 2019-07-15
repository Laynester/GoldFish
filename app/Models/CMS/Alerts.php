<?php

namespace App\Models\CMS;

use Illuminate\Database\Eloquent\Model;
use App\Models\User\User;

class Alerts extends Model
{
  public $timestamps = false;
  protected $table = 'cms_alerts';
  protected $fillable = ['message','icon','userid'];
  public function habbo()
  {
    return $this->belongsTo(User::class, 'userid');
  }
}
