<?php

namespace App\Http\Controllers;

use App\Models\Slave1;
use App\Models\Slave2;

class TabelMonitoringController extends Controller
{
    public function index()
    {
        $title = 'Tabel Monitoring';
        $slave1 = Slave1::orderBy('waktu', 'desc')->get();
        $slave2 = Slave2::orderBy('waktu', 'desc')->get();
        return view('tabel-monitoring', compact('title', 'slave1', 'slave2'));
    }

    public function ajaxTabelMonitoring()
    {
        $slave1 = Slave1::orderBy('waktu', 'desc')->get();
        $slave2 = Slave2::orderBy('waktu', 'desc')->get();

        return view('partials.tabel-monitoring-data', compact('slave1', 'slave2'));
    }
}
