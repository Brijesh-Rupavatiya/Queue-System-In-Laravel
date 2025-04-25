<?php

// namespace App\Http\Controllers\WithQueue;

// use App\Models\User;
// use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
// use App\Mail\VerifyEmail;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Mail;

// class RegisterController extends Controller
// {
//     public function showRegistrationForm()
//     {
//         return view('auth.register-with-queue');
//     }

//     public function store(Request $request)
//     {
//         // 1. Validate Input
//         $request->validate([
//             'name' => 'required',
//             'email' => 'required|email|unique:users,email',
//             'password' => 'required|min:6|confirmed'
//         ]);

//         // 2. Create User
//         $user = User::create([
//             'name' => $request->name,
//             'email' => $request->email,
//             'password' => Hash::make($request->password),
//         ]);

//         // 3. Send email via Queue
//         Mail::to($user->email)->queue(new VerifyEmail($user));

//         // 4. Show success
//         return redirect()->route('register.choice')->with('message', 'Registration successful with Queue. Please verify your email.');
//     }

// }



// namespace App\Http\Controllers\WithQueue;

// use App\Models\User;
// use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
// use App\Mail\VerifyEmail;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Mail;

// class RegisterController extends Controller
// {
//     public function showRegistrationForm()
//     {
//         // return view('auth.register-with-queue');
//         return view('auth.register');
//     }

//     public function store(Request $request)
//     {
//         // 1. Validate input
//         $request->validate([
//             'name' => 'required',
//             'email' => 'required|email|unique:users,email',
//             'password' => 'required|min:6|confirmed'
//         ]);
//         // 2. Create user
//         $user = User::create([
//             'name' => $request->name,
//             'email' => $request->email,
//             'password' => Hash::make($request->password),
//         ]);
//         // 3. Send email via Queue
//         Mail::to($user->email)->queue(new VerifyEmail($user));

//         // 4. Show success
//         return redirect()->route('login')->with('status', 'Registration successful. Please verify your email.');
//     }
// }





namespace App\Http\Controllers\WithQueue;

use App\Http\Controllers\Controller;
use App\Mail\VerifyEmail;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register_with_queue');

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

        // Send Verification Mail with Queue
        Mail::to($user->email)->queue(new VerifyEmail($user));

        return redirect()->route('login')->with('message', 'Please check your email for verification.');
    }
}
