<?php

namespace App\Http\Controllers\Auth;

use App\Jobs\SendOtpJob;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    // public function store(LoginRequest $request): RedirectResponse
    // {
    //     $request->authenticate();

    //     $request->session()->regenerate();

    //     return redirect()->intended(route('dashboard', absolute: false));
    // }


    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $user = Auth::user();

        // Generate OTP
        $otp = rand(100000, 999999);
        $expiresAt = now()->addMinutes(10);

        // Store OTP in DB
        DB::table('user_otps')->updateOrInsert(
            ['user_id' => $user->id],
            ['otp' => $otp, 'expires_at' => $expiresAt, 'created_at' => now(), 'updated_at' => now()]
        );

        // Dispatch OTP job
        SendOtpJob::dispatch($user, $otp);

        // Logout user for now, redirect to OTP page
        Auth::logout();
        session(['otp_user_id' => $user->id]);

        return redirect()->route('otp.verify.form')->with('message', 'OTP sent to your email.');
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
