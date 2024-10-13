<?php

use App\Http\Controllers\v1\offersController;
use Illuminate\Support\Facades\Route;

Route::get('/', [offersController::class, 'getOffers']);
