<?php

namespace App\Http\Controllers\Session;

use App\Http\Controllers\Controller;
use App\Helpers\CMS;
use App\Models\CMS\News;

class MaintenanceController extends Controller
{
    public function __invoke()
    {
        return view('maintenance', [
            'group' => 'home'
        ]);
    }
}
