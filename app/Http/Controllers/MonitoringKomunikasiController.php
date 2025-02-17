<?php

namespace App\Http\Controllers;

use App\Models\Slave1;
use Illuminate\Http\Request;

class MonitoringKomunikasiController extends Controller
{
    public function index()
    {
        $title = 'Monitoring Komunikasi';

        return view('monitoring-komunikasi', compact('title'));
    }
}
