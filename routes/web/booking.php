<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;

Route::post('/book', [BookingController::class, 'store'])->name('booking.store');
Route::get('/user/booking', [BookingController::class, 'index'])->name('user.booking');
Route::get('/user/booking/{id}/details', [BookingController::class, 'details'])->name('user.bookings.details');
Route::get('/user/booking/success/{bookingCode}', [BookingController::class, 'bookingsuccessful'])->name('user.bookingsuccessful');
Route::get('/user/booking/cancel/{id}', [BookingController::class, 'cancelBooking'])->name('user.booking.cancel');
