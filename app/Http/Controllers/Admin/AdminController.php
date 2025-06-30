<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\User;
use App\Models\SiteInfo;

class AdminController extends Controller
{
    public function index()
    {
        $plansCount = Plan::count();
        $usersCount = User::count();
        $info = SiteInfo::first();

        return view('admin.dashboard', compact('plansCount', 'usersCount', 'info'));
    }

    public function users()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.users.index', compact('users'));
    }
}
