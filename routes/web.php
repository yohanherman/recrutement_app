<?php

use App\Http\Controllers\v1\AuthController;
use App\Http\Controllers\v1\offersController;
use Illuminate\Support\Facades\Route;


Route::get('/login', [AuthController::class, 'getLogin']);

Route::get('/', [offersController::class, 'getOffers']);