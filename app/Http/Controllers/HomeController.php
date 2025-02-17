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
        $slave1 = Slave1::orderBy('created_at', 'DESC')->first();
        $slave2 = Slave2::orderBy('created_at', 'DESC')->first();

        return view('home', compact('title', 'slave1', 'slave2'));
    }
}
