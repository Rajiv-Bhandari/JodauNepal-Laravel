<?php

//Technician

use App\Http\Controllers\TechnicianController;
use Illuminate\Support\Facades\Route;

Route::get('/technician-dashboard', [TechnicianController::class, 'dashboard'])->name('technician.dashboard');
Route::get('/technician/timeslot', [TechnicianController::class, 'timeslotindex'])->name('timeslot.technician');
Route::get('/technician/timeslot/create', [TechnicianController::class, 'timeslotcreate'])->name('timeslot.create');
Route::post('/technician/timeslot/store', [TechnicianController::class, 'timeslotstore'])->name('timeslot.store');
Route::get('/technician/timeslot/{id}/edit', [TechnicianController::class, 'timeslotedit'])->name('timeslot.edit');
Route::put('/technician/timeslot/{id}/update', [TechnicianController::class, 'timeslotupdate'])->name('timeslot.update');
Route::delete('/technician/timeslot/{id}', [TechnicianController::class, 'timeslotdestroy'])->name('timeslot.destroy');

