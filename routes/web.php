<?php

use App\Http\Controllers\v1\AuthController;
use App\Http\Controllers\v1\offersController;
use Illuminate\Support\Facades\Route;


Route::get('/login', [AuthController::class, 'getLogin'])->name('get.login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('post.login');
Route::get('/register', [AuthController::class, 'getRegister'])->name('get.register');
Route::post('/register', [AuthController::class, 'postRegister'])->name('post.register');

Route::get('/', [offersController::class, 'getOffers']);