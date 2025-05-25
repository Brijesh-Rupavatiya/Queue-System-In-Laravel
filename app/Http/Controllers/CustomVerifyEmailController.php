<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Verified;
use App\Models\User;

class CustomVerifyEmailController extends Controller
{
    public function verify(Request $request, $id, $hash)
    {
        $user = User::findOrFail($id);

        // Check if the hash matches
        if (!hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
            abort(403, 'Invalid verification link.');
        }

        // If already verified
        if ($user->hasVerifiedEmail()) {
            return redirect('/login')->with('status', 'Email already verified.');
        }

        // Mark email as verified
        $user->markEmailAsVerified();

        // You can fire Verified event if you want (optional)
        event(new Verified($user));

        return redirect('/login')->with('status', 'Email verified successfully.');
    }
}
