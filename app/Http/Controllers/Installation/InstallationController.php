<?php

namespace App\Http\Controllers\Installation;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request as Req;
use App\Models\CMS\Settings;
use App\Models\User\User;
use Illuminate\Support\Facades\Hash;
use App\Helpers\CMS;
use App\Models\User\Permission;
use DB;
use Illuminate\Validation\Rule;

class InstallationController extends Controller
{
    public function index()
    {
        $hasConnection = false;

        if (DB::connection()->getPDO() && env('DB_DATABASE')) {
            $hasConnection = true;
        }

        if (Request::isMethod('post')) {
            DB::unprepared(file_get_contents(public_path('/assets/install/sql.sql')));

            return redirect()->route('installation.step', 2);
        }

        return view('index', [
            'connection' => $hasConnection,
            'hasDatabase' => Schema::hasTable('users') && Schema::hasTable( 'emulator_settings')
        ]);
    }

    public static function stepHandler($step = null)
    {
        switch ($step) {
            case 2:
                return self::stepTwo();

            case 3:
                return self::stepThree();

            case 4:
                return self::stepFour();

            case 5:
                return self::stepFive();

            case 6:
                return self::stepSix();

            default:
                return redirect()->back()->withErrors(__('You tried to jump to a setup step that does not exists'));
        }
    }

    // TODO: Add validation to necessary form fields
    public function updateStepHandler(Req $request, $step = null)
    {
        switch ($step) {
            case 2:
                return self::updateStepTwo($request);

            case 3:
                return self::updateStepThree($request);

            case 4:
                return self::updateStepFour($request);

            case 5:
                return self::updateStepFive($request);

            case 6:
                return self::updateStepSix();

            default:
                return redirect()->back()->withErrors(__('You tried to jump to a setup step that does not exists'));
        }
    }

    private static function stepTwo()
    {
        return view('installation.step-two');
    }

    private static function updateStepTwo($request)
    {
        Settings::where('key', 'hotelname')->update(['value' => $request->input('hotelname')]);
        Settings::where('key', 'site_logo')->update(['value' => $request->input('logo')]);
        Settings::where('key', 'habbo_imager')->update(['value' => $request->input('imager')]);
        Settings::where('key', 'default_motto')->update(['value' => $request->input('motto')]);
        Settings::where('key', 'group_badges')->update(['value' => $request->input('groupbadges')]);
        Settings::where('key', 'theme')->update(['value' => $request->input('theme')]);

        return redirect()->route('installation.step', 3);
    }

    private static function stepThree()
    {
        return view('installation.step-three');
    }

    private static function updateStepThree($request)
    {
        Settings::where('key', 'discord_id')->update(['value' => $request->input('discord_id')]);
        Settings::where('key', 'twitter_handle')->update(['value' => $request->input('twitter_handle')]);

        return redirect()->route('installation.step', 4);
    }

    private static function stepFour()
    {
        return view('installation.step-four');
    }

    private static function updateStepFour($request)
    {
        Settings::where('key', 'swfdir')->update(['value' => $request->input('swfdir')]);
        Settings::where('key', 'swf')->update(['value' => $request->input('swf')]);
        Settings::where('key', 'variables')->update(['value' => $request->input('variables')]);
        Settings::where('key', 'override_variables')->update(['value' => $request->input('override_variables')]);
        Settings::where('key', 'texts')->update(['value' => $request->input('texts')]);
        Settings::where('key', 'override_texts')->update(['value' => $request->input('override_texts')]);
        Settings::where('key', 'productdata')->update(['value' => $request->input('productdata')]);
        Settings::where('key', 'furnidata')->update(['value' => $request->input('furnidata')]);
        Settings::where('key', 'figuremap')->update(['value' => $request->input('figuremap')]);
        Settings::where('key', 'figuredata')->update(['value' => $request->input('figuredata')]);
        Settings::where('key', 'emuhost')->update(['value' => $request->input('emuhost')]);
        Settings::where('key', 'emuport')->update(['value' => $request->input('emuport')]);
        Settings::where('key', 'rconip')->update(['value' => $request->input('rconip')]);
        Settings::where('key', 'rconport')->update(['value' => $request->input('rconport')]);

        return redirect()->route('installation.step', 5);
    }

    private static function stepFive()
    {
        return view('installation.step-five');
    }

    private static function updateStepFive($request)
    {
        $request->validate([
            'username' => ['required', 'max:255', Rule::unique('users')],
            'mail' => ['required', 'email', 'max:255', Rule::unique('users')],
            'password' => ['required', 'min:6', 'confirmed']
        ]);

        $rank = Permission::orderBy('id', 'DESC')->pluck('id')->first();

        $user = User::create([
            'username' => $request->input('username'),
            'mail' => $request->input('mail'),
            'password' => Hash::make($request->input('password')),
            'ip_register' => request()->ip(),
            'ip_current' => request()->ip(),
            'last_login' => time(),
            'account_created' => time(),
            'motto' => CMS::settings('default_motto'),
            'rank' => $rank
        ]);

        $regCurrency = [
            ['type' => 0, 'amount' => CMS::settings('reg_duckets')],
            ['type' => 5, 'amount' => CMS::settings('reg_diamonds')],
            ['type' => 101, 'amount' => CMS::settings('reg_points')],
        ];

        foreach ($regCurrency as $currency) {
            $user->currencies()->create($currency);
        }

        return redirect()->route('installation.step', 6);
    }

    private static function stepSix()
    {
        return view('installation.step-six');
    }

    private static function updateStepSix()
    {
        Settings::where('key', 'installed')->update(['value' => '1']);

        return redirect()->route('index');
    }
}
