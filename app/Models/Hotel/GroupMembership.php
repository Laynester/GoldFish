<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Model;
use App\Models\Hotel\Group;

class GroupMembership extends Model
{
  public $timestamps = false;
  protected $table = 'guilds_members';
  protected $fillable = [];
  public function guild()
    {
        return $this->belongsTo(Group::class, 'guild_id');
    }
}
