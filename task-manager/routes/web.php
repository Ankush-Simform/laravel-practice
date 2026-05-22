<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/tasks-page', function () {

    return view('tasks');

});

Route::post('/login', [AuthController::class, 'login']);    