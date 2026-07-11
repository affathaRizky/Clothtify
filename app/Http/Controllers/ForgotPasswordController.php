<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Models\Pembeli;
use App\Models\PasswordResetOtp;

class ForgotPasswordController extends Controller
{
    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $pembeli = Pembeli::where('email', $request->email)->first();

        if (!$pembeli) {
            return back()->with('error', 'Email not found.');
        }

        $otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

        PasswordResetOtp::where('email', $request->email)->delete();

        PasswordResetOtp::create([
            'email'      => $request->email,
            'otp'        => Hash::make($otp),
            'expires_at' => now()->addMinutes(10),
        ]);

        Mail::raw("Your CLOTHIFY password reset OTP code:\n\n{$otp}\n\nValid for 10 minutes.\nDo not share this code with anyone.", function ($message) use ($request) {
            $message->to($request->email)
                ->subject('CLOTHIFY - Password Reset OTP')
                ->priority(1)
                ->getHeaders()
                ->addTextHeader('X-Priority', '1')
                ->addTextHeader('X-Mailer', 'ClothifyApp');
        });

        return redirect()->route('forgotPassword')
            ->with('otp_email', $request->email)
            ->with('success', 'OTP has been sent to your email.');
    }

    public function showVerifyForm()
    {
        if (!session('otp_email')) {
            return redirect()->route('forgotPassword')
                ->with('error', 'Please enter your email first.');
        }

        return redirect()->route('forgotPassword');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email'                 => 'required|email',
            'otp'                   => 'required|string|size:6',
            'password'              => 'required|string|min:8|confirmed',
        ]);

        $otpRecord = PasswordResetOtp::where('email', $request->email)
            ->where('used', false)
            ->where('expires_at', '>', now())
            ->latest()
            ->first();

        if (!$otpRecord || !Hash::check($request->otp, $otpRecord->otp)) {
            return back()->with('error', 'Invalid or expired OTP code.');
        }

        $pembeli = Pembeli::where('email', $request->email)->first();

        if (!$pembeli) {
            return back()->with('error', 'Email not found.');
        }

        $pembeli->password = bcrypt($request->password);
        $pembeli->save();

        $otpRecord->used = true;
        $otpRecord->save();

        session()->forget('otp_email');

        return redirect()->route('login')
            ->with('success', 'Password has been reset successfully! Please login with your new password.');
    }
}
