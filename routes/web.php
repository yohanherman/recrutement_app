<?php

use App\Http\Controllers\v1\ApplyController;
use App\Http\Controllers\v1\AjaxController;
use App\Http\Controllers\v1\AuthController;
use App\Http\Controllers\v1\LanguageController;
use App\Http\Controllers\v1\offersController;
use App\Http\Controllers\v1\ProfileController;
use App\Http\Controllers\v1\recrutorApplicationController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

use App\Http\Middleware\Language;


// Translation route
Route::middleware(Language::class)->get('/change-language/{lang}', [LanguageController::class, 'selectLanguage'])->name('switch.language');

// App::setLocale('fr');



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



// profile routes

Route::get('/user/profile', [ProfileController::class, 'getUserProfile'])->name('get.profile');
Route::get('/edit-profile/{id}', [ProfileController::class, 'editProfileForm'])->name('profile.edit');
Route::put('/edit-profile', [ProfileController::class, 'editProfileFormPost'])->name('post.profile.edit');


// application route

Route::get('/apply/{id}', [ApplyController::class, 'appytoOfferForm'])->name('apply.now');
Route::post('/apply', [ApplyController::class, 'applyToOffer'])->name('application.post');


// recrutor routes
Route::get('/application', [recrutorApplicationController::class, 'displayApplication'])->name('recrutor.application');
Route::get('/application/{id}', [recrutorApplicationController::class, 'displayApplicationDetails'])->name('application.details');


