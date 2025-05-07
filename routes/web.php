<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// AJAX routes
Route::get('/ajax/dashboard', [HomeController::class, 'ajaxDashboard']);
Route::get('/ajax/tabel-monitoring', [TabelMonitoringController::class, 'ajaxTabelMonitoring']);


