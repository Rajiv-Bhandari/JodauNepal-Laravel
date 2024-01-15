<?php

//User

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/user-home', [UserController::class, 'home'])->name('user.home');