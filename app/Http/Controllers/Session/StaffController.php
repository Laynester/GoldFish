<?php

namespace App\Http\Controllers\Session;

use App\Helpers\CMS;
use App\Http\Controllers\Controller;
use App\Models\User\Permission;
use App\Models\User\User;

class StaffController extends Controller
{
    public function __invoke()
    {
        $employees = User::query()
            ->where('rank', '>=', CMS::settings('min_staff_rank'))
            ->where('hidden_staff', '=', '0')
            ->get();

        $ranks = Permission::query()
            ->where('id', '>=', CMS::settings('min_staff_rank'))
            ->orderByDesc('id')
            ->get();

        return view('community.staff', [
            'group' => 'community',
            'employees' => $employees,
            'ranks' => $ranks
        ]);
    }
}
