<?php

namespace App\Http\Controllers\Session;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class UserSettingsController extends Controller
{
    public function edit()
    {
        $profileBackgrounds = File::allFiles(public_path('assets/images/profile_backgrounds'));
        $hotelViews = File::allFiles(public_path('assets/goldfish/images/me/views'));

        return view(
            'me.settings.hotel',
            [
                'group' => 'home',
                'profileBackgrounds' => $profileBackgrounds,
                'hotelViews' => $hotelViews,
            ]
        );
    }

    public function update(Request $request)
    {
        if (!$request->input('hotel_view') && !$request->input('profile_background')) {
            return redirect()->back()->withErrors(__('Please select a background before saving.'));
        }

        return $this->updateSetting($request->all());
    }

    private function updateSetting(array $data)
    {
        if (array_key_exists('hotel_view', $data) && !is_null($data['hotel_view'])) {
            $hotelViewImage = file_exists(public_path('/assets/goldfish/images/me/views/' . $data['hotel_view']));
            if (!$hotelViewImage) {
                return redirect()->back()->withErrors(__('The selected hotel view does not exist.'));
            }

            auth()->user()->update([
                'hotelview' => $data['hotel_view'],
            ]);

            return redirect()->back()->withSuccess(__('The hotel view has been changed!'));
        }

        $profileBgImage = file_exists(public_path('/assets/images/profile_backgrounds/' . $data['profile_background']));
        if (!$profileBgImage) {
            return redirect()->back()->withErrors(__('The selected profile background does not exist.'));
        }

        auth()->user()->update([
            'profile_background' => $data['profile_background']
        ]);

        return redirect()->back()->withSuccess(__('The profile background has been changed!'));
    }
}
