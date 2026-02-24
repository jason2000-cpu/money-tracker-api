<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Route;


Route::get('/user/{id}', [UserController::class, 'userProfile']);
Route::get('/users', [UserController::class, 'users']);
Route::post('/user', [UserController::class,'createAccount']);
Route::post('/wallet', [WalletController::class,'createWallet']);
Route::get('/wallet', [WalletController::class,'viewWallet']);
