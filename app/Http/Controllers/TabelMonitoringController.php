<?php

namespace App\Http\Controllers;

use App\Models\Slave1;
use App\Models\Slave2;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class TabelMonitoringController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Tabel Monitoring';
         // Ambil tanggal dari input atau default ke hari ini
        $tanggal = $request->input('tanggal', Carbon::now()->toDateString());
        $slave1 = Slave1::whereDate('waktu', $tanggal)->orderBy('waktu','DESC')->get();
        $slave2 = Slave2::whereDate('waktu', $tanggal)->orderBy('waktu','DESC')->get();
        return view('tabel-monitoring', compact('title', 'slave1', 'slave2', 'tanggal'));
    }

    public function ajaxTabelMonitoring(Request $request)
    {
        $tanggal = $request->input('tanggal', Carbon::now()->toDateString());
        $slave1 = Slave1::whereDate('waktu', 'desc', $tanggal)->get();
        $slave2 = Slave2::whereDate('waktu', 'desc', $tanggal)->get();

        return view('partials.tabel-monitoring-data', compact('slave1', 'slave2', 'tanggal'));
    }
}
