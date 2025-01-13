<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DocumentRequestController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

Route::get('/document-request', [DocumentRequestController::class, 'index'])->name('document-request');

Route::get('/barangay-clearance', [DocumentRequestController::class, 'barangayClearance'])->name('barangay-clearance');
Route::get('/certificate-of-residency', [DocumentRequestController::class, 'certificateOfResidency'])->name('certificate-of-residency');
Route::get('/indigency-certificate', [DocumentRequestController::class, 'indigencyCertificate'])->name('indigency-certificate');
Route::get('/barangay-id', [DocumentRequestController::class, 'barangayID'])->name('barangay-id');
Route::get('/business-permit', [DocumentRequestController::class, 'businessPermit'])->name('business-permit');

Route::post('/submit-barangay-clearance', [DocumentController::class, 'submitBarangayClearance'])->name('submit-barangay-clearance');
Route::post('/submit-certificate-of-residency', [DocumentController::class, 'submitCertificateOfResidency'])->name('submit-certificate-of-residency');
Route::post('/submit-indigency-certificate', [DocumentController::class, 'submitIndigencyCertificate'])->name('submit-indigency-certificate');
Route::post('/submit-barangay-id', [DocumentController::class, 'submitBarangayId'])->name('submit-barangay-id');
Route::post('/submit-business-permits', [DocumentController::class, 'submitBusinessPermits'])->name('submit-business-permits');

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

Route::get('/document-request-page', function () {
    return view('document-request.document-request-page');
})->name('document-request-page');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';