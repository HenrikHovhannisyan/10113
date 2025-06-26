<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $plansCount = Plan::count();
        $usersCount = User::count();

        return view('admin.dashboard', compact('plansCount', 'usersCount'));
    }

    public function users()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.users.index', compact('users'));
    }
}
