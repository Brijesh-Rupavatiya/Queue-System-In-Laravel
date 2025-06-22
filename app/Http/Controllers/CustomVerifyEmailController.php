<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Jobs\SendWelcomeEmailJob;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        //Fire Verified event
        event(new Verified($user));

        // Queue Welcome Email after 2 mins
        SendWelcomeEmailJob::dispatch($user)->delay(now()->addMinutes(2));

        return redirect('/login')->with('status', 'Email verified successfully.');
    }
}
