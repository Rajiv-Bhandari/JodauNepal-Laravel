<?php

//Admin Report

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;


Route::get('/filter/report', [ReportController::class, 'filterbooking'])->name('report.booking');
Route::get('/filtered-bookings', [ReportController::class, 'filteredBookings'])->name('report.filtered-bookings');
