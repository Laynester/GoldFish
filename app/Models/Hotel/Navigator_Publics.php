<?php
namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Model;

class Navigator_Publics extends Model
{
  public $timestamps = false;
  protected $table = 'navigator_publics';
  protected $fillable = ['public_cat_id','room_id','visible'];
  public function room()
  {
    return $this->belongsTo('App\Models\Hotel\Room', 'room_id');
  }
  public function category()
  {
    return $this->belongsTo('App\Models\Hotel\Navigator_Pubcat', 'public_cat_id');
  }
}
