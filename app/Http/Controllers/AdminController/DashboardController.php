<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardConTroller extends Controller
{
    public function showDashboard()
    {
        return view('Admin.dashboard');
    }
}
