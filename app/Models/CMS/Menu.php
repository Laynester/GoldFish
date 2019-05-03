<?php

namespace App\Models\CMS;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{

  public $timestamps = false;

  protected $table = 'cms_menu';

  protected $fillable = array('parent_id','title','url','order');

  public function parent()
  {
    return $this->belongsTo('App\Models\CMS\Menu', 'parent_id');
  }

  /*public function children()
  {
    return $this->hasMany('App\Models\CMS\Menu', 'parent_id');
  }*/

  public function scopeChildren($query, $item)
  {
    $query->where('group', $item);
  }
}
