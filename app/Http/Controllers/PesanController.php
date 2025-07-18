<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'pesan' => 'required',
        ], [
            'nama.required' => 'Nama harus diisi.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'pesan.required' => 'Pesan harus diisi.',
        ]);

        $pesan = new Pesan();
        $pesan->nama = $request->nama;
        $pesan->email = $request->email;
        $pesan->pesan = $request->pesan;
        $pesan->save();

        return redirect()->back()->with('success', 'Pesan berhasil dikirim.');
    }
}
