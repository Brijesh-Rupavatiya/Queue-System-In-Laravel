<?php


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

        // $user->sendEmailVerificationNotification();


        return redirect()->route('login')->with('message', 'Please check your email for verification.');
    }
}
