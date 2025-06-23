<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BulkEmailController;
use App\Http\Controllers\CustomVerifyEmailController;
use App\Http\Controllers\WithQueue\RegisterController as WithQueueController;
use App\Http\Controllers\WithoutQueue\RegisterController as WithoutQueueController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Bulk Email Routes
Route::post('/send-bulk-email-without-queue', [BulkEmailController::class, 'sendWithoutQueue'])->name('bulk.email.send.without.queue');
// Route::post('/send-bulk-email-with-queue', [BulkEmailController::class, 'sendWithQueue'])->name('bulk.email.send.with.queue');
Route::post('/send-bulk-email-with-queue', [BulkEmailController::class, 'sendWithQueue'])->name('bulk.send.with.queue');
// Show bulk email form for both options
Route::get('/bulk-email-form/{type}', [BulkEmailController::class, 'showForm'])->name('bulk.email.form');


// Profile related routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [App\Http\Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Registration choice page
Route::get('/register-choice', function () {
    return view('auth.register');
})->name('register.choice');

Route::post('/register-choice', [App\Http\Controllers\Auth\RegisterChoiceController::class, 'handle'])->name('register.choice.submit');

// With Queue Registration
Route::get('/register-with-queue', [WithQueueController::class, 'showRegistrationForm'])->name('register.withQueue');
Route::post('/register-with-queue', [WithQueueController::class, 'store'])->name('register.withQueue.submit');

// Without Queue Registration
Route::get('/register-without-queue', [WithoutQueueController::class, 'showRegistrationForm'])->name('register.withoutQueue');
Route::post('/register-without-queue', [WithoutQueueController::class, 'store'])->name('register.withoutQueue.submit');

// Important: Custom verification route
// Custom Email Verification Route for "Register With Queue"
Route::get('/custom-verify/{id}/{hash}', [CustomVerifyEmailController::class, 'verify'])
    ->middleware(['signed'])
    ->name('custom.verification.verify');

// Finally: Load Laravel Breeze's auth routes
require __DIR__.'/auth.php';
