<?php
// namespace App\Http\Controllers;

// use App\Models\User;
// use Illuminate\Http\Request;
// use Illuminate\Auth\Events\Verified;
// use Illuminate\Http\RedirectResponse;

// class CustomVerifyEmailController extends Controller
// {
//     // public function verify(Request $request): RedirectResponse
//     // {
//     //     $user = User::findOrFail($request->route('id'));

//     //     if (! hash_equals((string) $request->route('hash'),
//     //                       sha1($user->getEmailForVerification()))) {
//     //         abort(403);
//     //     }

//     //     if (! $user->hasVerifiedEmail()) {
//     //         $user->markEmailAsVerified();
//     //         event(new Verified($user));
//     //     }

//     //     return redirect()->route('login')->with('message', 'Email verified successfully. Please login.');
//     // }


//     // public function verify(Request $request, $id, $hash)
//     // {
//     //     $user = User::findOrFail($id);

//     //     if (!hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
//     //         abort(403, 'Invalid verification link.');
//     //     }

//     //     if (!$user->hasVerifiedEmail()) {
//     //         $user->markEmailAsVerified();
//     //     }

//     //     return redirect()->route('login')->with('verified', true);
//     // }


//     public function verify(Request $request, $id, $hash)
//     {
//         $user = User::findOrFail($id);

//         if (!hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
//             abort(403, 'Invalid verification link');
//         }

//         if (!$user->hasVerifiedEmail()) {
//             $user->markEmailAsVerified();
//         }

//         return redirect('/login')->with('message', 'Email verified! You can now login.');
//     }
// }



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
