<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Model;

class EmuSettings extends Model
{
  public $timestamps = false;
  protected $table = 'emulator_settings';
  protected $fillable = [];
}
