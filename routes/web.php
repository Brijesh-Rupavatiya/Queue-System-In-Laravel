<?php

// use App\Models\User;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\CustomVerifyEmailController;
// use Illuminate\Foundation\Auth\EmailVerificationRequest;
// use App\Http\Controllers\WithQueue\RegisterController as WithQueueController;
// use App\Http\Controllers\WithoutQueue\RegisterController as WithoutQueueController;
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [App\Http\Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// // Registration Choice Page
// Route::get('/register-choice', function () {
//     return view('auth.register');
// })->name('register.choice');



// Route::post('/register-choice', [App\Http\Controllers\Auth\RegisterChoiceController::class, 'handle'])->name('register.choice.submit');

// Route::get('/register-with-queue', [App\Http\Controllers\WithQueue\RegisterController::class, 'showRegistrationForm'])->name('register.withQueue');
// Route::post('/register-with-queue', [App\Http\Controllers\WithQueue\RegisterController::class, 'store'])->name('register.withQueue.submit');

// Route::get('/register-without-queue', [App\Http\Controllers\WithoutQueue\RegisterController::class, 'showRegistrationForm'])->name('register.withoutQueue');
// Route::post('/register-without-queue', [App\Http\Controllers\WithoutQueue\RegisterController::class, 'store'])->name('register.withoutQueue.submit');






// Route::get('/custom-verify/{id}/{hash}', [CustomVerifyEmailController::class, 'verify'])
//     ->middleware(['signed'])
//     ->name('custom.verification.verify');


// require __DIR__ . '/auth.php';


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomVerifyEmailController;
use App\Http\Controllers\WithQueue\RegisterController as WithQueueController;
use App\Http\Controllers\WithoutQueue\RegisterController as WithoutQueueController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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

// ✅ Important: Custom verification route
// ✅ Custom Email Verification Route for "Register With Queue"
Route::get('/custom-verify/{id}/{hash}', [CustomVerifyEmailController::class, 'verify'])
    ->middleware(['signed'])
    ->name('custom.verification.verify');

// ✅ Finally: Load Laravel Breeze's auth routes
require __DIR__.'/auth.php';
