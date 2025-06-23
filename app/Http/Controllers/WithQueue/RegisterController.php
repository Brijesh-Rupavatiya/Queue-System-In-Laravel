<?php

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
        // $user->sendEmailVerificationNotification();


        return redirect()->route('login')->with('message', 'Please check your email for verification.');
    }
}
