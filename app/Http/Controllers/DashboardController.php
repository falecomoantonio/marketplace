<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->activeMenu(0);
    }


    public function init(Request $request)
    {
        return view('dashboard.init')->with('menu', $this->menuDashboard);
    }
}
