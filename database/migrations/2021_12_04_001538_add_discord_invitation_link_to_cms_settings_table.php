<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDiscordInvitationLinkToCmsSettingsTable extends Migration
{
    public function up()
    {
        Schema::table('cms_settings', function (Blueprint $table) {
            DB::table('cms_settings')->insertOrIgnore([
                ['key' => 'discord_invitation_link', 'value' => 'https://discord.gg/BAxAtaYVR3'],
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