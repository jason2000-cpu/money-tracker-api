<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/user/{id}', [UserController::class, 'userProfile']);
Route::get('/users', [UserController::class, 'users']);
Route::post('/user', [UserController::class,'createAccount']);
