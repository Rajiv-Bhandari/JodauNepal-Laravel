<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;

Route::post('/book', [BookingController::class, 'store'])->name('booking.store');
Route::get('/user/booking', [BookingController::class, 'index'])->name('user.booking');