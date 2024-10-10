<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('user/create', [UserController::class, 'create'])->name('user.create');

Route::post('/user/store', [UserController::class, 'store'])->name('user.store');

Route::get('user/list_user', [UserController::class, 'index'])->name('list_user');

Route::get('user/{id}', [UserController::class, 'show'])->name('users.show');

Route::put('user/{id}', [UserController::class, 'update'])->name('user.update');

Route::get('user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');

Route::delete('user/{id}', [UserController::class, 'destroy'])->name('user.destroy');