<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Ukm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UploadDokumentasi extends Controller
{
    public function storeDokumentasi(Request $request)
    {
        $validatedData = $request->validate([
            'photo_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kegiatan_id' => 'required|exists:kegiatan,id'
        ]);

        $user = Auth::user();
        $ukm = Ukm::where('admin_ukm_id', $user->id)->first();

        if (!$ukm) {
            return redirect()->back()->with('error', 'Anda tidak memiliki UKM.');
        }

        $kegiatan = Kegiatan::where('id', $request->kegiatan_id)
            ->where('ukm_id', $ukm->id)
            ->first();

        if (!$kegiatan) {
            return redirect()->back()->with('error', 'Kegiatan tidak ditemukan.');
        }
        $jumlahDokumentasi = $kegiatan->dokumentasi()->count();
        if ($jumlahDokumentasi >= 5) {
            return redirect()->back()->with('error', 'Maksimal 5 dokumentasi diperbolehkan.');
        }

        if ($request->hasFile('photo_path')) {
            try {
                $path = $request->file('photo_path')->store('dokumentasi_kegiatan', 'public');
                $kegiatan->dokumentasi()->create([
                    'photo_path' => $path
                ]);

                return redirect()->back()->with('success', 'Dokumentasi berhasil ditambahkan.');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan dokumentasi: ' . $e->getMessage());
            }
        }

        return redirect()->back()->with('error', 'File dokumentasi tidak ditemukan.');
    }
}
