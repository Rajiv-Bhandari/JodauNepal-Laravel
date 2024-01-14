<?php

//Category

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;


Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::patch('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::get('/category/status/{id}', [CategoryController::class, 'toggle'])->name('category.toggle');
