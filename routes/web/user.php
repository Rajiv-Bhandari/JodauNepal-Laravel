<?php

//User

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/user-home', [UserController::class, 'home'])->name('user.home');
Route::get('/user/category/{category}', [UserController::class, 'category'])->name('user.category');
Route::get('/user/category/technician/{technician}', [UserController::class, 'showTechnicianDetail'])->name('user.technician.detail');
Route::get('/user/profile', [UserController::class, 'profile'])->name('profile.user');
Route::put('/user/profile/update', [UserController::class, 'profileupdate'])->name('profile.userupdate');
Route::post('/user/profile/address/store',  [UserController::class, 'storeAddress'])->name('profile.address.store');
Route::delete('/user/profile/address/delete/{id}',  [UserController::class, 'deleteAddress'])->name('profile.address.delete');
