<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// crud

Route::get('/', [UserController::class, 'home'])->name('home');
Route::get('/create', [UserController::class, 'create'])->name('create');
Route::post('/store', [UserController::class, 'store'])->name('store');
Route::get('/edit/{user_id}', [UserController::class, 'edit'])->name('edit');
Route::put('/update/{user_id}', [UserController::class, 'update'])->name('update');
Route::delete('/delete/{user_id}', [UserController::class, 'destroy'])->name('destroy');
Route::get('/listUsers', [UserController::class, 'list'])->name('list');

// login

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login_do', [UserController::class, 'login_do'])->name('login_do');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');


