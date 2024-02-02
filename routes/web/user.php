<?php

//User

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/user-home', [UserController::class, 'home'])->name('user.home');
Route::get('/user/category/{category}', [UserController::class, 'category'])->name('user.category');
Route::get('/user/category/technician/{technician}', [UserController::class, 'showTechnicianDetail'])->name('user.technician.detail');