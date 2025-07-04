<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DashboardController;

// Public homepage
Route::get('/', function () {
    return view('welcome');
});

// Dashboard with task list (for authenticated + verified users)
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Routes that require authentication
Route::middleware(['auth'])->group(function () {

    // Task CRUD routes
    Route::resource('tasks', TaskController::class);

    // User profile management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth routes (login, register, password reset, etc.)
require __DIR__.'/auth.php';
