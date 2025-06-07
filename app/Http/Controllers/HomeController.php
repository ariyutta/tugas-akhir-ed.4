<?php

namespace App\Http\Controllers;

use App\Models\Slave1;  // Mengimpor model Slave1
use App\Models\Slave2;  // Mengimpor model Slave2
use App\Models\SlaveDelay;  // Mengimpor model SlaveDelay
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';

        // Ambil data slave 1 dan slave 2
        $slave1 = Slave1::latest()->first();  // Mengambil data slave 1 terakhir
        $slave2 = Slave2::latest()->first();  // Mengambil data slave 2 terakhir

        // Ambil data delay terbaru untuk slave1 dan slave2 berdasarkan slave_type
        $slave1Delay = SlaveDelay::where('slave_type', 'slave1')->latest()->first(); // Ambil delay terbaru untuk slave1
        $slave2Delay = SlaveDelay::where('slave_type', 'slave2')->latest()->first(); // Ambil delay terbaru untuk slave2

        // Jika delay tidak ditemukan, beri nilai default
        $slave1Delay = $slave1Delay ? $slave1Delay->delay : 'Data tidak tersedia';
        $slave2Delay = $slave2Delay ? $slave2Delay->delay : 'Data tidak tersedia';

        return view('home', compact('title', 'slave1', 'slave2', 'slave1Delay', 'slave2Delay'));
    }

    public function ajaxDashboard()
    {
        // Ambil data slave 1 dan slave 2
        $slave1 = Slave1::latest()->first();  // Mengambil data slave 1 terakhir
        $slave2 = Slave2::latest()->first();  // Mengambil data slave 2 terakhir

        // Ambil data delay terbaru untuk slave1 dan slave2 berdasarkan slave_type
        $slave1Delay = SlaveDelay::where('slave_type', 'slave1')->latest()->first(); // Ambil delay terbaru untuk slave1
        $slave2Delay = SlaveDelay::where('slave_type', 'slave2')->latest()->first(); // Ambil delay terbaru untuk slave2

        // Jika delay tidak ditemukan, beri nilai default
        $slave1Delay = $slave1Delay ? $slave1Delay->delay : 'Data tidak tersedia';
        $slave2Delay = $slave2Delay ? $slave2Delay->delay : 'Data tidak tersedia';

        return view('partials.dashboard-data', compact('slave1', 'slave2', 'slave1Delay', 'slave2Delay'));
    }
}
