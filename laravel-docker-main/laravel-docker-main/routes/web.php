<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController; // Add AuthenticatedSessionController

$url = config('app.url');
URL::forceRootUrl($url);

// Registration routes (no middleware, accessible to guests)
Route::get('register', [RegisteredUserController::class, 'create'])->name('register'); // Show registration form
Route::post('register', [RegisteredUserController::class, 'store']); // Handle registration form submission

// Login routes (no middleware, accessible to guests)
Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login'); // Show login form
Route::post('login', [AuthenticatedSessionController::class, 'store']); // Handle login form submission

// Logout route (auth middleware to ensure only authenticated users can log out)
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout'); // Handle logout

// Existing routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/sample-news-1', function () {
    return view('news.sample-news-1');
})->name('sample-news-1');

Route::get('/sample-news-2', function () {
    return view('news.sample-news-2');
})->name('sample-news-2');

Route::get('/sample-news-3', function () {
    return view('news.sample-news-3');
})->name('sample-news-3');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
