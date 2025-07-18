<?php

namespace App\Http\Controllers;

use App\Models\Ukm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class AdminUKMController extends Controller
{
    public function ukmProfile()
    {

        $user = Auth::user();
        $ukm = Ukm::where('admin_ukm_id', $user->id)->first();
        $ukm->media_sosial = json_decode($ukm->media_sosial, true);
        $ukm->admin = $user;
        return view('admin-ukm.profil-ukm', compact('ukm', 'user'));
    }

    public function ukmEditProfile()
    {
        $user = Auth::user();
        $ukm = Ukm::where('admin_ukm_id', $user->id)->first();
        return view('admin-ukm.edit.profile', compact('ukm'));
    }



    public function adminDashboardUkm()
    {
        $user = Auth::user();
        $ukm = Ukm::where('admin_ukm_id', $user->id)->first();
        $keuangan = $ukm ? $ukm->keuangan()->get() : collect();
        $semuaSurat = $ukm ? $ukm->surat : collect();
        $jumlahSuratMasuk = $semuaSurat->where('jenis_surat', 'masuk')->count();
        $jumlahSuratKeluar = $semuaSurat->where('jenis_surat', 'keluar')->count();
        $proker = $ukm ? $ukm->proker()->get() : collect();
        $prokerSelesai = $proker->where('status', 'selesai')->count();
        $prokerBelumSelesai = $proker->where('status', 'belum selesai')->count();
        $kegiatanTerbaru = $ukm ? $ukm->kegiatan()->orderBy('created_at', 'desc')->first() : null;
        $ukmSaldo = $ukm ? $ukm->saldo : 0;
        if ($user->role === 'admin_ukm') {
            $nama_ukm = $user->ukm ? $user->ukm->nama : 'Belum terdaftar di UKM';
            return view('admin-ukm.dashboard', compact('nama_ukm', 'keuangan', 'ukmSaldo', 'semuaSurat', 'jumlahSuratMasuk', 'jumlahSuratKeluar', 'proker', 'prokerSelesai', 'prokerBelumSelesai', 'kegiatanTerbaru'));
        }
        return abort(403, 'Akses ditolak');
    }

    public function updateDataUkm(Request $request)
    {
        $validatedData = $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'sejarah' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'struktur_organisasi' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
            'foto_pengurus' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
            'media_sosial' => 'nullable|array',
            'media_sosial.instagram' => 'nullable|string',
            'media_sosial.facebook' => 'nullable|string',
            'media_sosial.youtube' => 'nullable|string',
            'media_sosial.tiktok' => 'nullable|string'
        ], [
            'logo.image' => 'File harus berupa gambar.',
            'logo.mimes' => 'Format gambar yang diperbolehkan: jpeg, png, jpg, gif, svg.',
            'logo.max' => 'Ukuran gambar maksimal 2MB.',
            'struktur_organisasi.image' => 'File harus berupa gambar.',
            'struktur_organisasi.mimes' => 'Format gambar yang diperbolehkan: jpeg, png, jpg, gif, svg.',
            'struktur_organisasi.max' => 'Ukuran gambar maksimal 10MB.',
            'foto_pengurus.image' => 'File harus berupa gambar.',
            'foto_pengurus.mimes' => 'Format gambar yang diperbolehkan: jpeg, png, jpg, gif, svg.',
            'foto_pengurus.max' => 'Ukuran gambar maksimal 10MB.',
        ]);

        $user = Auth::user();
        $ukm = Ukm::where('admin_ukm_id', $user->id)->first();

        if (!$ukm) {
            return redirect()->back()->with('error', 'UKM tidak ditemukan.');
        }

        $updateData = [];

        // Update teks jika ada
        foreach (['nama', 'deskripsi', 'sejarah', 'visi', 'misi'] as $field) {
            if ($request->filled($field)) {
                $updateData[$field] = $validatedData[$field];
            }
        }

        // Update gambar jika dikirim
        if ($request->hasFile('logo')) {
            if ($ukm->logo) {
                Storage::disk('public')->delete($ukm->logo);
            }
            $updateData['logo'] = $request->file('logo')->store('ukm_logos', 'public');
        }

        if ($request->hasFile('foto_pengurus')) {
            if ($ukm->foto_pengurus) {
                Storage::disk('public')->delete($ukm->foto_pengurus);
            }
            $updateData['foto_pengurus'] = $request->file('foto_pengurus')->store('ukm_foto_pengurus', 'public');
        }

        if ($request->hasFile('struktur_organisasi')) {
            if ($ukm->struktur_organisasi) {
                Storage::disk('public')->delete($ukm->struktur_organisasi);
            }
            $updateData['struktur_organisasi'] = $request->file('struktur_organisasi')->store('ukm_structures', 'public');
        }

        // Media sosial: ambil data lama dan gabungkan dengan yang baru
        $existingMediaSosial = json_decode($ukm->media_sosial, true) ?? [];
        $newMediaSosial = [];

        $platforms = ['instagram', 'facebook', 'youtube', 'tiktok'];
        foreach ($platforms as $platform) {
            if (isset($validatedData['media_sosial'][$platform])) {
                $newMediaSosial[$platform] = $validatedData['media_sosial'][$platform];
            } elseif (isset($existingMediaSosial[$platform])) {
                $newMediaSosial[$platform] = $existingMediaSosial[$platform];
            } else {
                $newMediaSosial[$platform] = null;
            }
        }

        // Hanya update media_sosial jika ada yang berubah
        if (!empty($request->input('media_sosial'))) {
            $updateData['media_sosial'] = json_encode($newMediaSosial);
        }

        $ukm->update($updateData);

        return redirect('/admin/ukm/profile')->with('success', 'Data berhasil diperbarui');
    }


    public function ukmEditEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
        ]);

        $user = Auth::user();
        $user->update([
            'email' => $request->email
        ]);

        return redirect('/admin/ukm/profile')->with('success', 'Email Berhasil Diperbarui');
    }

    public function ukmEditPhone(Request $request)
    {
        $request->validate([
            'phone' => 'required|numeric',
        ]);

        $user = Auth::user();
        $user->update([
            'phone' => $request->phone
        ]);

        return redirect('/admin/ukm/profile')->with('success', 'Email Berhasil Diperbarui');
    }
}
