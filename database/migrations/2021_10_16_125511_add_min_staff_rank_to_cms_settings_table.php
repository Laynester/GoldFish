<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMinStaffRankToCmsSettingsTable extends Migration
{
    public function up()
    {
        Schema::table('cms_settings', function (Blueprint $table) {
            DB::table('cms_settings')->insertOrIgnore([
                ['key' => 'min_staff_rank', 'value' => '5'],
            ]);
        });
    }

    public function down()
    {
        Schema::table('cms_settings', function (Blueprint $table) {
            //
        });
    }
}