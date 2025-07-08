<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class OtpController extends Controller
{
    public function showForm()
    {
        return view('auth.verify_otp');
    }

    public function verify(Request $request)
    {
        $request->validate(['otp' => 'required|digits:6']);
        $userId = session('otp_user_id');
        $otpRow = DB::table('user_otps')->where('user_id', $userId)->first();

        if ($otpRow && $otpRow->otp == $request->otp && now()->lt($otpRow->expires_at)) {
            Auth::loginUsingId($userId);
            //Delete OTP after use
            DB::table('user_otps')->where('user_id', $userId)->delete();
            session()->forget('otp_user_id');
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['otp' => 'Invalid or expired OTP.']);
    }
}
