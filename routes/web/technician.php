<?php

//Technician

use App\Http\Controllers\TechnicianController;
use Illuminate\Support\Facades\Route;

Route::get('/technician-dashboard', [TechnicianController::class, 'dashboard'])->name('technician.dashboard');
Route::get('/technician/timeslot', [TechnicianController::class, 'timeslotindex'])->name('technician.timeslot');
Route::get('/technician/timeslot/create', [TechnicianController::class, 'timeslotcreate'])->name('timeslot.create');
Route::post('/technician/timeslot/store', [TechnicianController::class, 'timeslotstore'])->name('timeslot.store');