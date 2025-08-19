<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Ukm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PendaftaranController extends Controller
{
    public function ukmPendaftaran()
    {
        $user = Auth::user();
        $ukm = Ukm::where('admin_ukm_id', $user->id)->first();
        $pendaftaran = $ukm ? $ukm->pendaftaran()->get() : collect();
        return view('admin-ukm.pendaftaran', compact('pendaftaran'));
    }
    public function tambahPendaftaranView()
    {
        return view('admin-ukm.tambah.pendaftaran');
    }
    public function detailpendaftaranView($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        return view('admin-ukm.detail.pendaftaran', compact('pendaftaran'));
    }

    public function editPendaftaranView($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        return view('admin-ukm.edit.pendaftaran', compact('pendaftaran'));
    }

    public function storePendaftaran(Request $request)
    {
        $validated = $request->validate([
            'pendaftaran'       => 'required|string|max:255',
            'batas_pendaftaran' => 'required|date',
            'brosur'            => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
            'link_pendaftaran'  => 'nullable|url|max:255', // pakai url, bukan string
            'persyaratan'       => 'required|string',
            // contoh validasi WA: angka, +, spasi, tanda kurung, strip
            'wa'                => ['required', 'max:20', 'regex:/^[0-9+\s()\-]+$/'],
            'formulir'          => 'required|file|mimes:pdf,doc,docx|max:10048',
        ], [
            'link_pendaftaran.url' => 'Link pendaftaran harus berupa URL yang valid.',
            'wa.regex'             => 'Nomor WhatsApp hanya boleh berisi angka, spasi, +, (), dan -.',
            'formulir.required'    => 'Formulir pendaftaran harus diunggah.',
            'formulir.mimes'       => 'Format file yang diperbolehkan: pdf, doc, docx.',
        ]);

        $user = Auth::user();
        $ukm  = \App\Models\Ukm::where('admin_ukm_id', $user->id)->first();

        if (!$ukm) {
            return back()->with('error', 'Anda tidak memiliki UKM yang terdaftar.');
        }

        try {
            // Simpan brosur (opsional) ke disk 'public' -> menghasilkan path relatif seperti "brosur/xxx.png"
            $brosurPath = null;
            if ($request->hasFile('brosur')) {
                $brosurFile = $request->file('brosur');
                $brosurPath = $brosurFile->storeAs(
                    'brosur',
                    time() . '_' . Str::slug(pathinfo($brosurFile->getClientOriginalName(), PATHINFO_FILENAME))
                        . '.' . $brosurFile->getClientOriginalExtension(),
                    'public'
                );
            }

            // Simpan formulir (wajib) -> path relatif "formulir/xxx.pdf"
            $formulirFile = $request->file('formulir');
            $formulirPath = $formulirFile->storeAs(
                'formulir',
                time() . '_' . Str::slug(pathinfo($formulirFile->getClientOriginalName(), PATHINFO_FILENAME))
                    . '.' . $formulirFile->getClientOriginalExtension(),
                'public'
            );

            // Buat data pendaftaran via relasi UKM
            $ukm->pendaftaran()->create([
                'pendaftaran'       => $validated['pendaftaran'],
                'batas_pendaftaran' => $validated['batas_pendaftaran'],
                'brosur'            => $brosurPath,                     // bisa null
                'link_pendaftaran'  => $validated['link_pendaftaran'] ?? null,
                'persyaratan'       => $validated['persyaratan'],
                'wa'                => $validated['wa'],
                'formulir'          => $formulirPath,                   // path relatif: "formulir/xxx.ext"
            ]);

            return redirect('/admin/ukm/pendaftaran')->with('success', 'Pendaftaran berhasil ditambahkan.');
        } catch (\Throwable $e) {
            // Opsional: hapus file kalau sudah terlanjur upload saat error
            if (!empty($brosurPath)) {
                Storage::disk('public')->delete($brosurPath);
            }
            if (!empty($formulirPath)) {
                Storage::disk('public')->delete($formulirPath);
            }
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function deletePendaftaran($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->delete();
        return redirect('/admin/ukm/pendaftaran')->with('success', 'Pendaftaran Berhasil berhasil dihapus.');
    }


    public function editPendaftaran(Request $request, $id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);

        $validated = $request->validate([
            'pendaftaran'       => 'required|string|max:255',
            'batas_pendaftaran' => 'required|date',
            'brosur'            => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
            'link_pendaftaran'  => 'nullable|url|max:255', // sama seperti store
            'persyaratan'       => 'required|string',
            'wa'                => ['required', 'max:20', 'regex:/^[0-9+\s()\-]+$/'], // sama seperti store
            'formulir'          => 'required|file|mimes:pdf,doc,docx|max:10048', // sama seperti store (wajib)
        ], [
            'link_pendaftaran.url' => 'Link pendaftaran harus berupa URL yang valid.',
            'wa.regex'             => 'Nomor WhatsApp hanya boleh berisi angka, spasi, +, (), dan -.',
            'formulir.required'    => 'Formulir pendaftaran harus diunggah.',
            'formulir.mimes'       => 'Format file yang diperbolehkan: pdf, doc, docx.',
        ]);

        try {
            // Siapkan nilai default (pakai yang lama dulu)
            $brosurPath   = $pendaftaran->brosur;
            $formulirPath = $pendaftaran->formulir;

            // 1) Tangani brosur (opsional)
            if ($request->hasFile('brosur')) {
                $brosurFile = $request->file('brosur');
                $newBrosurPath = $brosurFile->storeAs(
                    'brosur',
                    time() . '_' . Str::slug(pathinfo($brosurFile->getClientOriginalName(), PATHINFO_FILENAME))
                        . '.' . $brosurFile->getClientOriginalExtension(),
                    'public'
                );

                // Hapus brosur lama hanya setelah file baru sukses
                if ($brosurPath && Storage::disk('public')->exists($brosurPath)) {
                    Storage::disk('public')->delete($brosurPath);
                }
                $brosurPath = $newBrosurPath;
            }

            // 2) Tangani formulir (WAJIB saat edit agar konsisten dg store)
            $formulirFile = $request->file('formulir');
            $newFormulirPath = $formulirFile->storeAs(
                'formulir',
                time() . '_' . Str::slug(pathinfo($formulirFile->getClientOriginalName(), PATHINFO_FILENAME))
                    . '.' . $formulirFile->getClientOriginalExtension(),
                'public'
            );

            // Hapus formulir lama setelah file baru sukses
            if ($formulirPath && Storage::disk('public')->exists($formulirPath)) {
                Storage::disk('public')->delete($formulirPath);
            }
            $formulirPath = $newFormulirPath;

            // 3) Update data
            $pendaftaran->update([
                'pendaftaran'       => $validated['pendaftaran'],
                'batas_pendaftaran' => $validated['batas_pendaftaran'],
                'brosur'            => $brosurPath, // bisa null
                'link_pendaftaran'  => $validated['link_pendaftaran'] ?? null,
                'persyaratan'       => $validated['persyaratan'],
                'wa'                => $validated['wa'],
                'formulir'          => $formulirPath, // path relatif public disk
            ]);

            return redirect('/admin/ukm/pendaftaran')->with('success', 'Pendaftaran berhasil diperbarui.');
        } catch (\Throwable $e) {
            // Jika ingin, bisa hapus file baru yang gagal dipakai (best-effort)
            if (isset($newBrosurPath)) {
                Storage::disk('public')->delete($newBrosurPath);
            }
            if (isset($newFormulirPath)) {
                Storage::disk('public')->delete($newFormulirPath);
            }
            return back()->with('error', 'Terjadi kesalahan saat mengupdate pendaftaran: ' . $e->getMessage());
        }
    }
    public function downloadFormulir($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);

        if (!$pendaftaran->formulir) {
            abort(404, 'Formulir tidak tersedia.');
        }

        $relativePath = ltrim($pendaftaran->formulir, '/'); // contoh: "formulir/xxx.pdf"
        $disk = Storage::disk('public');

        if (!$disk->exists($relativePath)) {
            abort(404, 'File formulir tidak ditemukan di server.');
        }

        // Nama file unduhan yang rapi
        $ext = pathinfo($relativePath, PATHINFO_EXTENSION);
        $base = 'Formulir_Pendaftaran_' . $pendaftaran->id;
        $downloadName = $base . ($ext ? ".{$ext}" : '');

        return $disk->download($relativePath, $downloadName);
    }
}
