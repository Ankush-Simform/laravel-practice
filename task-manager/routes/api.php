<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDetailController;

Route:: apiResource('tasks',TaskController::class);
Route::post('/login', [AuthController::class, 'login']);