<?php

namespace App\Http\Controllers;

use App\Models\Slave1;
use App\Models\Slave2;
use Illuminate\Http\Request;

class TabelMonitoringController extends Controller
{
    public function index()
    {
        $title = 'Tabel Monitoring';
        $slave1 = Slave1::orderBy('created_at','DESC')->get();
        $slave2 = Slave2::orderBy('created_at','DESC')->get();

        return view('tabel-monitoring', compact('title', 'slave1', 'slave2'));
    }
}
