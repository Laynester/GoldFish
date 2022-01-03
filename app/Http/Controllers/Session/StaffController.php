<?php

namespace App\Http\Controllers\Session;

use App\Helpers\CMS;
use App\Models\User\User;
use App\Models\User\Permission;
use App\Http\Controllers\Controller;

class StaffController extends Controller
{
    public function __invoke()
    {
        $ranks = Permission::query()
            ->where('id', '>=', CMS::settings('min_staff_rank'))
            ->orderByDesc('id')
            ->get();

        $employees = User::query()
            ->where('rank', '>=', CMS::settings('min_staff_rank'))
            ->where('hidden_staff', '=', '0')
            ->get();

        return view('community.staff', [
            'group' => 'community',
            'employees' => $employees,
            'ranks' => $ranks
        ]);
    }
}
