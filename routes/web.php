<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MonitoringKomunikasiController;
use App\Http\Controllers\TabelMonitoringController;

Route::get('/', function () {
    return redirect('home');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/tabel-monitoring', [TabelMonitoringController::class, 'index'])->name('tabel-monitoring');
Route::get('/monitoring-komunikasi', [MonitoringKomunikasiController::class, 'index'])->name('monitoring-komunikasi');
