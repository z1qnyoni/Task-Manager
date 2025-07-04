<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TaskApiController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// API endpoint for getting tasks of authenticated user
Route::middleware('auth:sanctum')->get('/tasks', [TaskApiController::class, 'index']);