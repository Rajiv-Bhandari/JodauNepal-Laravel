<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;


Route::post('/user/booking/add-comment/{technicianId}', [CommentController::class, 'addComment'])->name('user.booking.addComment');
Route::post('/user/booking/add-reply/{id}', [CommentController::class, 'addReply'])->name('user.booking.addReply');



