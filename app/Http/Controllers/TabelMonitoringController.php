<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TabelMonitoringController extends Controller
{
    public function index()
    {
        $title = 'Tabel Monitoring';

        return view('tabel-monitoring', compact('title'));
    }
}
