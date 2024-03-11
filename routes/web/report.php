<?php

//Admin Report

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;


Route::get('/filter/report', [ReportController::class, 'filterbooking'])->name('admin.filterreport');
