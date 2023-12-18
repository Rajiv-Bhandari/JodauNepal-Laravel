<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TechnicianController;

use App\Enums\UserType;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/register-technician-form', [TechnicianController::class, 'showRegistrationForm'])->name('register-technician-form');
Route::post('/register-technician', [TechnicianController::class, 'register'])->name('register-technician');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'userType:' . UserType::User])->group(function () {
    Route::get('/user-home', [UserController::class, 'home'])->name('user.home');
});

Route::middleware(['auth', 'userType:' . UserType::Admin])->group(function () {
    Route::get('/admin-dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

Route::middleware(['auth', 'userType:' . UserType::Technician])->group(function () {
    Route::get('/technician-dashboard', [TechnicianController::class, 'dashboard'])->name('technician.dashboard');
});
