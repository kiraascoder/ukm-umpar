<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Ukm;

class AdminSesiController extends Controller
{
    public function adminLoginView()
    {
        return view('auth.login');
    }


    public function registerView()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'Silahkan Masukkan Email Anda',
            'email.email' => 'Format email yang Anda masukkan tidak valid',
            'password.required' => 'Silahkan Masukkan Password Anda',
            'password.min' => 'Password minimal terdiri dari 6 karakter',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin, $request->has('remember'))) {
            $user = Auth::user();

            if ($user->status !== 'active') {
                Auth::logout();
                return redirect('/admin/login')->withErrors(['login' => 'Akun Anda belum diaktifkan oleh Super Admin.'])->withInput();
            }
            if ($user->role == "admin") {
                return redirect('/admin/dashboard');
            } elseif ($user->role == "admin_ukm") {
                return redirect('/admin/ukm/dashboard');
            }
        }
        return redirect('/admin/login')->withErrors(['login' => 'Login Gagal, Email atau Password tidak sesuai!'])->withInput();
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nama_ukm' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'required|numeric',
        ], [
            'name.required' => 'Nama UKM Wajib Diisi',
            'email.required' => 'Silahkan Masukkan Email Anda',
            'email.email' => 'Format email yang Anda masukkan tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Silahkan Masukkan Password Anda',
            'password.min' => 'Password minimal terdiri dari 6 karakter',
            'password.confirmed' => 'Konfirmasi password tidak sesuai',
            'phone.required' => 'Nomor telepon wajib diisi',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
        ]);
        $ukm = Ukm::create([
            'nama' => $request->nama_ukm,
            'admin_ukm_id' => $user->id,
        ]);
        return redirect()->route('admin.login')->with('success', 'Registrasi berhasil! Silahkan tunggu verifikasi dari admin.');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/admin/login')->with('success', 'Logout berhasil!');
    }
}
