<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDetailController;

Route::get('/users', [UserDetailController::class, 'index']);

Route::post('/users', [UserDetailController::class, 'store']);

Route::get('/users/{id}', [UserDetailController::class, 'show']);

Route::put('/users/{id}', [UserDetailController::class, 'update']);

Route::delete('/users/{id}', [UserDetailController::class, 'destroy']);