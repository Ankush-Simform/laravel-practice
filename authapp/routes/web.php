<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DemoController;
use App\Helpers\Calculator;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;

Route::get('/register',[AuthController::class,'showRegister']);
Route::post('/register',[AuthController::class,'register']);

Route::get('/login',[AuthController::class,'showLogin']);
Route::post('/login',[AuthController::class,'Login']);

Route::get('/dashboard',[AuthController::class,'showDashboard']);


Route::post('/logout',[AuthController::class,'logout']);

Route::get('/demo',[DemoController::class,'index']);



Route::get('/calc', function (Calculator $calc) {
    return $calc->add(5, 10);
});

Route::get('/test',[TestController::class,'index']);


Route::get('/test', [UserController::class, 'index']);


Route::get('/payment', [UserController::class, 'index']);