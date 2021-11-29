<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cookie;

class LocaleController extends Controller
{
    public function __invoke($locale): RedirectResponse
    {
        app()->setLocale($locale);

        Cookie::queue('locale', $locale, 43830);

        return redirect()->back();
    }
}