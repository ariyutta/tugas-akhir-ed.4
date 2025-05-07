<?php

namespace App\Http\Controllers;

use App\Models\Slave1;
use App\Models\Slave2;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';
        $slave1 = Slave1::latest()->first();
        $slave2 = Slave2::latest()->first();
        return view('home', compact('title', 'slave1', 'slave2'));
    }

    public function ajaxDashboard()
    {
        $slave1 = Slave1::latest()->first();
        $slave2 = Slave2::latest()->first();
        return view('partials.dashboard-data', compact('slave1', 'slave2'));
    }
}
