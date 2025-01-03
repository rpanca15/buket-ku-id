<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationCodeMail;

class LoginController extends Controller
{
    /**
     * Menampilkan form login.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Generate random numeric verification code
     */
    private function generateNumericCode($length = 6)
    {
        return str_pad(random_int(0, pow(10, $length) - 1), $length, '0', STR_PAD_LEFT);
    }

    /**
     * Melakukan proses login.
     */
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {

            if (!$user->hasVerifiedEmail()) {
                $user->verification_code = $this->generateNumericCode();
                $user->verification_code_expires_at = now()->addHours(1);
                $user->save();
                Mail::to($user->email)->send(new VerificationCodeMail($user, $user->verification_code));
                
                Cache::put('error', 'Email belum diverifikasi!', now()->addSeconds(5));
                return redirect()->route('verification.notice', ['email' => $user->email]);
            }

            Auth::login($user);

            $request->session()->regenerate();
            Cache::put('success', 'Login berhasil! Selamat datang!', now()->addSeconds(5));

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput();
    }
}
