<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Slave2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = ['hidup', 'mati'];

        for ($i = 0; $i < 15; $i++) {
            DB::table('slave2s')->insert([
                'waktu' => Carbon::now()->subHours($i),
                'value' => rand(1000, 10000) / 100,
                'status' => $statuses[array_rand($statuses)],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
