<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DocumentRequestController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ResidentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Auth\LoginController;

Route::get('/document-request', [DocumentRequestController::class, 'index'])->name('document-request');

Route::get('/barangay-clearance', [DocumentRequestController::class, 'barangayClearance'])->name('barangay-clearance');
Route::get('/certificate-of-residency', [DocumentRequestController::class, 'certificateOfResidency'])->name('certificate-of-residency');
Route::get('/indigency-certificate', [DocumentRequestController::class, 'indigencyCertificate'])->name('indigency-certificate');
Route::get('/barangay-id', [DocumentRequestController::class, 'barangayID'])->name('barangay-id');
Route::get('/business-permit', [DocumentRequestController::class, 'businessPermit'])->name('business-permit');
Route::get('/cedula', [DocumentRequestController::class, 'cedula'])->name('cedula'); // ✅ Added Cedula Route

$url = config('app.url');
URL::forceRootUrl($url);

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

Route::get('/news-page', function () {
    return view('news.news-page');
})->name('news-page');

Route::get('/document-request', function () {
    return view('document-request');
})->name('document-request');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/submit-barangay-clearance', [DocumentController::class, 'submitBarangayClearance'])->name('submit-barangay-clearance');
Route::post('/submit-certificate-of-residency', [DocumentController::class, 'submitCertificateOfResidency'])->name('submit-certificate-of-residency');
Route::post('/submit-indigency-certificate', [DocumentController::class, 'submitIndigencyCertificate'])->name('submit-indigency-certificate');
Route::post('/submit-barangay-id', [DocumentController::class, 'submitBarangayId'])->name('submit-barangay-id');
Route::post('/submit-business-permits', [DocumentController::class, 'submitBusinessPermits'])->name('submit-business-permits');
Route::post('/submit-cedula', [DocumentController::class, 'submitCedula'])->name('submit-cedula'); // ✅ Added Cedula Submission Route

Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('register', [RegisteredUserController::class, 'store']);

Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store']);
Route::post('logout', [LoginController::class, 'destroy'])->name('logout');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Resident Management Routes
    Route::get('/residents', [ResidentController::class, 'index'])->name('residents.index');
    Route::get('/residents/create', [ResidentController::class, 'create'])->name('residents.create');
    Route::post('/residents', [ResidentController::class, 'store'])->name('residents.store');
    Route::get('/residents/{resident}', [ResidentController::class, 'show'])->name('residents.show');
    Route::get('/residents/{resident}/edit', [ResidentController::class, 'edit'])->name('residents.edit');
    Route::patch('/residents/{resident}', [ResidentController::class, 'update'])->name('residents.update');
    Route::delete('/residents/{resident}', [ResidentController::class, 'destroy'])->name('residents.destroy');
});

require __DIR__.'/auth.php';