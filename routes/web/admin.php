<?php

//Admin

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TechnicianController;
use Illuminate\Support\Facades\Route;


Route::get('/admin-technicians', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/technician/approve/{id}', [TechnicianController::class, 'approve'])->name('technician.approve');
Route::get('/technician/reject/{id}', [TechnicianController::class, 'reject'])->name('technician.reject');
Route::get('/admin/category', [AdminController::class, 'category'])->name('admin.category');
Route::get('/admin-dashboard', [AdminController::class, 'home'])->name('admin.home');
Route::get('/admin/payment', [AdminController::class, 'Payments'])->name('payment.admin');