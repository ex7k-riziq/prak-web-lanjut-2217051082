<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile/{nama}/{kelas}/{npm}', [UserController::class, 'profile']);

Route::get('user/create', [UserController::class, 'create']);

Route::post('/user/store', [UserController::class, 'store'])->name('user.store');

Route::get('user/list_user', [UserController::class, 'index']);