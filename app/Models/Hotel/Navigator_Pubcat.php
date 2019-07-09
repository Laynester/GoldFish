<?php
namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Model;

class Navigator_Pubcat extends Model
{
  public $timestamps = false;
  protected $table = 'navigator_publiccats';
  protected $fillable = ['name','image','visible','order_num'];
}
