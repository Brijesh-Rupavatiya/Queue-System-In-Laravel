<?php

// use App\Models\User;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\ProfileController;
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
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });


// // // Routes for registration without queue
// // Route::get('/register-without-queue', [WithoutQueueRegisterController::class, 'showRegistrationForm'])->name('register.without.queue');
// // Route::post('/register-without-queue', [WithoutQueueRegisterController::class, 'register']);

// // // Routes for registration with queue
// // Route::get('/register-with-queue', [WithQueueRegisterController::class, 'showRegistrationForm'])->name('register.with.queue');
// // Route::post('/register-with-queue', [WithQueueRegisterController::class, 'register']);.


// Route::get('/register-choice', function () {
//     return view('auth.register');
// })->name('register.choice');

// // Form handle karne ke liye (POST request)
// Route::post('/register-choice', function (Request $request) {
//     if ($request->input('action') === 'with_queue') {
//         return app(WithQueueController::class)->store($request);
//     } elseif ($request->input('action') === 'without_queue') {
//         return app(WithoutQueueController::class)->store($request);
//     } else {
//         return back()->with('error', 'Invalid action selected');
//     }
// });

// Route::get('/email/verified', function () {
//     return redirect('/login')->with('message', 'Your email has been verified. Please login.');
// })->middleware(['auth', 'verified'])->name('verification.redirect');


// // Built-in email verification route
// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill(); // sets email_verified_at

//     return redirect()->route('login')->with('message', 'Email verified successfully. You can now login.');
// })->middleware(['auth', 'signed'])->name('verification.verify');


// // Route::get('/custom-verify/{id}/{hash}', function ($id, $hash, Request $request) {
// //     $user = User::findOrFail($id);

// //     if (! hash_equals((string) $hash, sha1($user->email))) {
// //         abort(403); // Invalid hash
// //     }

// //     if (! $user->hasVerifiedEmail()) {
// //         $user->markEmailAsVerified();
// //     }

// //     return redirect()->route('login')->with('message', 'Email verified successfully. You can now login.');
// // })->name('custom.verify');

// Route::get('/custom-verify/{id}/{hash}', function ($id, $hash, Request $request) {
//     $user = User::findOrFail($id);

//     if (! hash_equals((string) $hash, sha1($user->email))) {
//         abort(403); // Invalid hash
//     }

//     if (! $user->hasVerifiedEmail()) {
//         $user->markEmailAsVerified();
//     }

//     return redirect()->route('login')->with('message', 'Email verified successfully. You can now login.');
// })->name('custom.verify');


// require __DIR__.'/auth.php';
















use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\WithQueue\RegisterController as WithQueueController;
use App\Http\Controllers\WithoutQueue\RegisterController as WithoutQueueController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [App\Http\Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Registration Choice Page
Route::get('/register-choice', function () {
    return view('auth.register');
})->name('register.choice');



Route::post('/register-choice', [App\Http\Controllers\Auth\RegisterChoiceController::class, 'handle'])->name('register.choice.submit');

Route::get('/register-with-queue', [App\Http\Controllers\WithQueue\RegisterController::class, 'showRegistrationForm'])->name('register.withQueue');
Route::post('/register-with-queue', [App\Http\Controllers\WithQueue\RegisterController::class, 'store'])->name('register.withQueue.submit');

Route::get('/register-without-queue', [App\Http\Controllers\WithoutQueue\RegisterController::class, 'showRegistrationForm'])->name('register.withoutQueue');
Route::post('/register-without-queue', [App\Http\Controllers\WithoutQueue\RegisterController::class, 'store'])->name('register.withoutQueue.submit');



Route::get('verify-email/{id}/{hash}',  [VerifyEmailController::class, 'verify'])->name('verification.verify');


// Route::get('register-with-queue', [App\Http\Controllers\WithQueue\RegisterController::class, 'showRegistrationForm'])->name('register.withQueue');
// Route::post('register-with-queue', [App\Http\Controllers\WithQueue\RegisterController::class, 'store'])->name('register.withQueue.submit');
// Form Submission of Registration Choice
// Route::post('/register-choice', function (Request $request) {
//     if ($request->input('action') === 'with_queue') {
//         return redirect()->route('register.with.queue');
//     } elseif ($request->input('action') === 'without_queue') {
//         return redirect()->route('register.without.queue');
//     }
//     return back()->with('error', 'Invalid option selected');
// })->name('register.choice.submit');


// // Registration Routes
// Route::get('/register-with-queue', [WithQueueController::class, 'showRegistrationForm'])->name('register.with.queue');
// Route::post('/register-with-queue', [WithQueueController::class, 'store']);

// Route::get('/register-without-queue', [WithoutQueueController::class, 'showRegistrationForm'])->name('register.without.queue');
// Route::post('/register-without-queue', [WithoutQueueController::class, 'store']);

// Laravel Built-in Email Verification
// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill(); // Updates email_verified_at
//     return redirect()->route('login')->with('message', 'Email verified successfully. You can now login.');
// })->middleware(['auth', 'signed'])->name('verification.verify');

// // Custom Email Verification Route
// Route::get('/custom-verify/{id}/{hash}', function ($id, $hash) {
//     $user = User::findOrFail($id);

//     if (! hash_equals((string) $hash, sha1($user->email))) {
//         abort(403);
//     }

//     if (! $user->hasVerifiedEmail()) {
//         $user->markEmailAsVerified();
//     }

//     return redirect()->route('login')->with('message', 'Email verified successfully. You can now login.');
// })->name('custom.verify');

require __DIR__ . '/auth.php';
