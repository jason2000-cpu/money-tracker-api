<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/hello', function () {
    return response()->json([
        'message' => 'Hello Jackson 👋'
    ]);
});

Route::get('/user/{id}', [UserController::class, 'show']);
