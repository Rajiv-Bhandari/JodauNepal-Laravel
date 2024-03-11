<?php

use Illuminate\Support\Facades\Route;
use App\Enums\UserType;
use App\Http\Controllers\TechnicianController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [AdminController::class, 'welcome']);

Route::get('/register-technician-form', [TechnicianController::class, 'showRegistrationForm'])->name('register-technician-form');
Route::post('/register-technician', [TechnicianController::class, 'register'])->name('register-technician');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    require __DIR__ . '/web/profile.php';
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'userType:' . UserType::User])->group(function () {
    require __DIR__ . '/web/user.php';
    require __DIR__ . '/web/booking.php';
    require __DIR__ . '/web/comment.php';
});

Route::middleware(['auth', 'userType:' . UserType::Admin])->group(function () {
    require __DIR__ . '/web/admin.php';
    require __DIR__ . '/web/category.php';
    require __DIR__ . '/web/adminuser.php';
    require __DIR__ . '/web/report.php';
});

Route::middleware(['auth', 'userType:' . UserType::Technician])->group(function () {
    require __DIR__ . '/web/technician.php';

});
