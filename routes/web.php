<?php

use App\Http\Controllers\v1\AjaxController;
use App\Http\Controllers\v1\AuthController;
use App\Http\Controllers\v1\offersController;
use Illuminate\Support\Facades\Route;


Route::get('/login', [AuthController::class, 'getLogin'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('post.login');
Route::get('/register', [AuthController::class, 'getRegister'])->name('get.register');
Route::post('/register', [AuthController::class, 'postRegister'])->name('post.register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [offersController::class, 'getOffers'])->name('home.offers');
Route::get('/add-offer', [offersController::class, 'offerForm'])->name('get.offerForm');
Route::post('/add-offer', [offersController::class, 'postOffers'])->name('post.offers');
Route::get('/add-more-offer-details/{id}', [offersController::class, 'moreOfferInfoForm'])->name('addMoreOfferDetailsForm');
Route::post('/add-more-offer-details', [offersController::class, 'postMoreOfferDetails'])->name('post.addMoreOfferDetails');


// AJAX route
Route::get('/offer-by-id/{id}', [AjaxController::class, 'modifysidebarContentByOfferId']);

