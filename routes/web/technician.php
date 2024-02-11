<?php

//Technician

use App\Http\Controllers\TechnicianController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

Route::get('/technician-dashboard', [TechnicianController::class, 'dashboard'])->name('dashboard.technician');
Route::get('/technician/timeslot', [TechnicianController::class, 'timeslotindex'])->name('timeslot.technician');
Route::get('/technician/timeslot/create', [TechnicianController::class, 'timeslotcreate'])->name('timeslot.create');
Route::post('/technician/timeslot/store', [TechnicianController::class, 'timeslotstore'])->name('timeslot.store');
Route::get('/technician/timeslot/{id}/edit', [TechnicianController::class, 'timeslotedit'])->name('timeslot.edit');
Route::put('/technician/timeslot/{id}/update', [TechnicianController::class, 'timeslotupdate'])->name('timeslot.update');
Route::delete('/technician/timeslot/{id}', [TechnicianController::class, 'timeslotdestroy'])->name('timeslot.destroy');

// technician booking
Route::get('/technician/booking', [BookingController::class, 'bookingindex'])->name('technician.booking');
Route::get('/technician/booking/{id}/details', [BookingController::class, 'technicianbookingdetails'])->name('technician.bookings.details');
Route::get('/technician/booking/cancel/{id}', [BookingController::class, 'cancelBookingTechnician'])->name('technician.booking.cancel');
Route::get('/technician/booking/confirm/{id}', [BookingController::class, 'confirmBookingTechnician'])->name('technician.booking.confirm');
Route::post('/technician/booking/{id}/complete', [BookingController::class, 'completeBooking'])->name('technician.booking.complete');
