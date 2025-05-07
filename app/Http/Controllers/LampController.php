<?php

namespace App\Http\Controllers;

use App\Models\Slave1;
use App\Models\Slave2;
use Illuminate\Http\Request;

class LampController extends Controller
{
    public function getLampStatus()
    {
        // Ambil data terbaru dari slave1s dan slave2s
        $slave1 = Slave1::latest()->first();
        $slave2 = Slave2::latest()->first();

        // Format data untuk dikirim ke frontend
        $data = [
            'lux1' => $slave1 ? $slave1->value : 0,
            'status1' => $slave1 ? $slave1->status : 'OFF',
            'lux2' => $slave2 ? $slave2->value : 0,
            'status2' => $slave2 ? $slave2->status : 'OFF',
        ];

        return response()->json($data);
    }
}
