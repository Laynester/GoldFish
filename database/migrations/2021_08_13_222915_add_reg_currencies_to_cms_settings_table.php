<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRegCurrenciesToCmsSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('cms_settings')->insertOrIgnore([
            ['key' => 'reg_credits', 'value' => '10000'],
            ['key' => 'reg_duckets', 'value' => '10000'],
            ['key' => 'reg_diamonds', 'value' => '20'],
            ['key' => 'reg_points', 'value' => '0'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cms_settings', function (Blueprint $table) {
            //
        });
    }
}
