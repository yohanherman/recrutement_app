<?php

use App\Http\Controllers\v1\UnauthorizedController;
use App\Http\Controllers\v1\ApplyController;
use App\Http\Controllers\v1\AjaxController;
use App\Http\Controllers\v1\AuthController;
use App\Http\Controllers\v1\LanguageController;
use App\Http\Controllers\v1\offersController;
use App\Http\Controllers\v1\ProfileController;
use App\Http\Controllers\v1\recrutorApplicationController;
use App\Http\Middleware\DisplayByRole;
use App\Http\Middleware\JobSeekerOnly;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

use App\Http\Middleware\Language;
use App\Http\Middleware\RecrutorOnly;

// Translation route
Route::middleware(Language::class)->get('/change-language/{lang}', [LanguageController::class, 'selectLanguage'])->name('switch.language');

// App::setLocale('fr');

Route::get('/', [offersController::class, 'getOffers'])->name('home.offers');
// AJAX route
Route::get('/offer-by-id/{id}', [AjaxController::class, 'modifysidebarContentByOfferId']);

Route::middleware(RecrutorOnly::class)->group(function () {
    Route::get('/add-offer', [offersController::class, 'offerForm'])->name('get.offerForm');
    Route::post('/add-offer', [offersController::class, 'postOffers'])->name('post.offers');
    Route::get('/add-more-offer-details/{id}', [offersController::class, 'moreOfferInfoForm'])->name('addMoreOfferDetailsForm');
    Route::post('/add-more-offer-details', [offersController::class, 'postMoreOfferDetails'])->name('post.addMoreOfferDetails');
    Route::get('/application', [recrutorApplicationController::class, 'displayApplication'])->name('recrutor.application');
    Route::get('/application/{id}', [recrutorApplicationController::class, 'displayApplicationDetails'])->name('application.details');
});



Route::middleware(DisplayByRole::class)->post('/login', [AuthController::class, 'postLogin'])->name('post.login');

Route::get('/login', [AuthController::class, 'getLogin'])->name('login');
Route::get('/register', [AuthController::class, 'getRegister'])->name('get.register');
Route::post('/register', [AuthController::class, 'postRegister'])->name('post.register');

route::get('/nonauth', [UnauthorizedController::class, 'unauthorized'])->name('unauthorized.error');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');




// profile routes
Route::get('/user/profile', [ProfileController::class, 'getUserProfile'])->name('get.profile');
Route::get('/edit-profile/{id}', [ProfileController::class, 'editProfileForm'])->name('profile.edit');
Route::put('/edit-profile', [ProfileController::class, 'editProfileFormPost'])->name('post.profile.edit');



// application route
Route::middleware(JobSeekerOnly::class)->group(function () {
    Route::get('/apply/{id}', [ApplyController::class, 'appytoOfferForm'])->name('apply.now');
    Route::post('/apply', [ApplyController::class, 'applyToOffer'])->name('application.post');
});
