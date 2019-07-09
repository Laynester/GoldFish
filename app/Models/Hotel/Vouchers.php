<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Model;

class Vouchers extends Model
{
  public $timestamps = false;
  protected $table = 'vouchers';
  protected $fillable = ['code','credits','points','points_type','catalog_item_id'];
}
