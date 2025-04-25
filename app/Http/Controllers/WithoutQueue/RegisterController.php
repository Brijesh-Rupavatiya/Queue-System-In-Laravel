<?php

// namespace App\Http\Controllers\WithoutQueue;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use App\Models\User;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Mail;

// class RegisterController extends Controller
// {
//     public function showRegistrationForm()
//     {
//         // return view('auth.register-without-queue');
//         return view('auth.register');

//     }

//     public function store(Request $request)
//     {
//         // Validate
//         $request->validate([
//             'name' => 'required',
//             'email' => 'required|email|unique:users',
//             'password' => 'required|confirmed'
//         ]);

//         // Create user
//         $user = User::create([
//             'name'     => $request->name,
//             'email'    => $request->email,
//             'password' => Hash::make($request->password),
//         ]);

//         // Send email immediately (no queue)
//         Mail::to($user->email)->send(new \App\Mail\VerifyEmail($user));

//         return redirect()->route('register.choice')->with('message', 'Registration successful. Please check your email to verify before login.');

//     }
// }



namespace App\Http\Controllers\WithoutQueue;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyEmail;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register_without_queue');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Send Verification Mail without Queue
        Mail::to($user->email)->send(new VerifyEmail($user));

        return redirect()->route('login')->with('message', 'Please check your email for verification.');
    }
}
