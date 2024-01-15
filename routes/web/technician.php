<?php

//Technician

use App\Http\Controllers\TechnicianController;
use Illuminate\Support\Facades\Route;

Route::get('/technician-dashboard', [TechnicianController::class, 'dashboard'])->name('technician.dashboard');