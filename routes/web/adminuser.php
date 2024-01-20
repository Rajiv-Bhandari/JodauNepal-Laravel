<?php
//Admin-user

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;


Route::get('/admin-user', [AdminController::class, 'userindex'])->name('user.index');