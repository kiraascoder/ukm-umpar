<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordLinkMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => ['required', 'email']]);

        // Cari user, tapi tetap balas "status terkirim" agar tidak bocorkan akun
        $user = User::where('email', $request->email)->first();

        if ($user) {
            // Buat token & simpan ke password_reset_tokens
            $token = Password::broker('users')->createToken($user);

            // Buat URL reset
            $url = url(route('password.reset', [
                'token' => $token,
                'email' => $user->email,
            ], false));

            // Kirim email via Mailable
            Mail::to($user->email)->send(new ResetPasswordLinkMail(
                $user->name ?? $user->email,
                $url,
                config('auth.passwords.users.expire')
            ));
        }

        return back()->with('status', 'Jika email terdaftar, link reset sudah dikirim.');
    }
}
