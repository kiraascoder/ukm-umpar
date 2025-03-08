<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Ukm;
use Auth;
use Illuminate\Http\Request;
use Storage;

class AdminUKMController extends Controller
{
    public function adminDashboard()
    {
        return view('superadmin.dashboard');
    }

    public function ukmProfile()
    {

        $user = Auth::user();
        $ukm = Ukm::where('admin_ukm_id', $user->id)->first();
        $ukm->media_sosial = json_decode($ukm->media_sosial, true);
        return view('admin-ukm.profil-ukm', compact('ukm'));
    }

    public function ukmAnggota()
    {
        $ukm = Ukm::where('admin_ukm_id', Auth::user()->id)->first();
        $anggota = $ukm ? $ukm->anggota()->get() : collect();
        return view('admin-ukm.anggota', compact('anggota'));
    }


    public function ukmProker()
    {
        return view('admin-ukm.proker');
    }
    public function ukmAlbum()
    {
        return view('admin-ukm.album');
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

        if ($user->role === 'admin_ukm') {
            $nama_ukm = $user->ukm ? $user->ukm->nama : 'Belum terdaftar di UKM';
            return view('admin-ukm.dashboard', compact('nama_ukm'));
        }
        return abort(403, 'Akses ditolak');
    }

    public function storeDataUkm(Request $request)
    {
        $validatedData = $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi' => 'nullable|string',
            'sejarah' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'struktur_organisasi' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
            'media_sosial' => 'nullable|array',
            'media_sosial.instagram' => 'nullable|string',
            'media_sosial.facebook' => 'nullable|string',
            'media_sosial.twitter' => 'nullable|string',
            'media_sosial.tiktok' => 'nullable|string'
        ], [
            'logo.image' => 'File harus berupa gambar.',
            'logo.mimes' => 'Format gambar yang diperbolehkan: jpeg, png, jpg, gif, svg.',
            'logo.max' => 'Ukuran gambar maksimal 2MB.',
            'struktur_organisasi.image' => 'File harus berupa gambar.',
            'struktur_organisasi.mimes' => 'Format gambar yang diperbolehkan: jpeg, png, jpg, gif, svg.',
            'struktur_organisasi.max' => 'Ukuran gambar maksimal 10MB.',
        ]);


        $user = Auth::user();
        $ukm = Ukm::where('admin_ukm_id', $user->id)->first();


        if (!$ukm) {
            return redirect()->back()->with('error', 'UKM tidak ditemukan.');
        }


        if ($request->hasFile('logo')) {

            if ($ukm->logo) {
                Storage::disk('public')->delete($ukm->logo);
            }
            $validatedData['logo'] = $request->file('logo')->store('ukm_logos', 'public');
        } else {
            $validatedData['logo'] = $ukm->logo;
        }


        if ($request->hasFile('struktur_organisasi')) {

            if ($ukm->struktur_organisasi) {
                Storage::disk('public')->delete($ukm->struktur_organisasi);
            }
            $validatedData['struktur_organisasi'] = $request->file('struktur_organisasi')->store('ukm_structures', 'public');
        } else {
            $validatedData['struktur_organisasi'] = $ukm->struktur_organisasi;
        }


        $media_sosial = json_decode($ukm->media_sosial, true) ?? [];

        $media_sosial = json_encode([
            'instagram' => $validatedData['media_sosial']['instagram'] ?? $media_sosial['instagram'] ?? null,
            'facebook' => $validatedData['media_sosial']['facebook'] ?? $media_sosial['facebook'] ?? null,
            'twitter' => $validatedData['media_sosial']['twitter'] ?? $media_sosial['twitter'] ?? null,
            'tiktok' => $validatedData['media_sosial']['tiktok'] ?? $media_sosial['tiktok'] ?? null,
        ]);


        $ukm->update([
            'logo' => $validatedData['logo'],
            'deskripsi' => $validatedData['deskripsi'] ?? $ukm->deskripsi,
            'sejarah' => $validatedData['sejarah'] ?? $ukm->sejarah,
            'visi' => $validatedData['visi'] ?? $ukm->visi,
            'misi' => $validatedData['misi'] ?? $ukm->misi,
            'struktur_organisasi' => $validatedData['struktur_organisasi'],
            'media_sosial' => $media_sosial
        ]);

        return redirect('/admin/ukm/dashboard')->with('success', 'Data Berhasil Diperbarui');
    }

    public function viewTambahAnggota()
    {
        return view('admin-ukm.tambah.anggota');
    }

    public function viewEditAnggota($id)
    {
        $anggota = Anggota::findOrFail($id);
        return view('admin-ukm.edit.anggota', compact('anggota'));
    }

    public function storeAnggota(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jurusan' => 'required|string|max:255',
            'fakultas' => 'required|string|in:fkip,feb,faktek,fapetrik,fikes,fai,hukum',
            'angkatan' => 'required|string|max:255',
        ]);

        $user = Auth::user();
        $ukm = Ukm::where('admin_ukm_id', $user->id)->first();

        $ukm->anggota()->create([
            'nama' => $validatedData['nama'],
            'jabatan' => $validatedData['jabatan'],
            'tempat_lahir' => $validatedData['tempat_lahir'],
            'tanggal_lahir' => $validatedData['tanggal_lahir'],
            'jurusan' => $validatedData['jurusan'],
            'fakultas' => $validatedData['fakultas'],
            'angkatan' => $validatedData['angkatan'],
        ]);
        return redirect('/admin/ukm/anggota')->with('success', 'Anggota berhasil ditambahkan.');
    }

    public function deleteAnggota($id)
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->delete();
        return redirect('/admin/ukm/anggota')->with('success', 'Anggota berhasil dihapus.');
    }

    public function editAnggota(Request $request, $id)
    {
        $user = Auth::user();
        $ukm = Ukm::where('admin_ukm_id', $user->id)->first();

        if (!$ukm) {
            return redirect()->back()->with('error', 'UKM tidak ditemukan.');
        }

        $anggota = Anggota::where('id', $id)->where('ukm_id', $ukm->id)->first();

        if (!$anggota) {
            return redirect()->back()->with('error', 'Anggota tidak ditemukan.');
        }

        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:100',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jurusan' => 'required|string|max:255',
            'fakultas' => 'required|string|max:100',
            'angkatan' => 'required|string|max:10',
        ]);

        // Update data anggota
        $anggota->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jurusan' => $request->jurusan,
            'fakultas' => $request->fakultas,
            'angkatan' => $request->angkatan,
        ]);

        return redirect()->route('adminUkmAnggota')->with('success', 'Data anggota berhasil diperbarui.');
    }
}
