<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cookie;

class LocaleController extends Controller
{
    public function __invoke($locale): RedirectResponse
    {
        if (!in_array($locale, config('goldfish.site.locales'))) {
            return redirect()->back()->withErrors(__('The language provided does not seem to exists'));
        }

        app()->setLocale($locale);

        Cookie::queue('locale', $locale, 43830);

        return redirect()->back();
    }
}