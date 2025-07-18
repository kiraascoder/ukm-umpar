<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Ukm;
use App\Models\Kegiatan;
use Illuminate\Support\Facades\Storage;

class KegiatanController extends Controller
{
    public function ukmKegiatan()
    {
        $user = Auth::user();
        $ukm = Ukm::where('admin_ukm_id', $user->id)->first();
        $kegiatan = $ukm ? $ukm->kegiatan()->orderBy('created_at', 'desc')->get() : collect();
        return view('admin-ukm.kegiatan', compact('kegiatan'));
    }


    public function editKegiatanView($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        return view('admin-ukm.edit.kegiatan', compact('kegiatan'));
    }

    public function tambahKegiatanView()
    {
        return view('admin-ukm.tambah.kegiatan');
    }

    public function detailKegiatanView($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatanDokumentasi = $kegiatan->dokumentasi()->get();
        return view('admin-ukm.detail.kegiatan', compact('kegiatan', 'kegiatanDokumentasi'));
    }

    public function storeKegiatan(Request $request)
    {
        $validateData = $request->validate(
            [
                'nama' => 'required|string|max:255',
                'deskripsi' => 'required|string',
                'tanggal' => 'required|date',
                'foto_sampul' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'link_dokumentasi' => 'nullable|string|max:255',
                'font_deskripsi' => 'required|string|in:sans,serif,mono,cursive,display,body',
            ],
            [
                'nama.required' => 'Nama kegiatan harus diisi.',
                'deskripsi.required' => 'Deskripsi kegiatan harus diisi.',
                'tanggal.required' => 'Tanggal kegiatan harus diisi.',
                'deskripsi.min' => 'Deskripsi kegiatan minimal harus 10 karakter.',
                'foto_sampul.max' => "Foto Tidak Boleh Lebih Dari 2MB",
                'font_deskripsi.required' => 'Pilih font untuk deskripsi.',
                'font_deskripsi.in' => 'Font yang dipilih tidak valid.',
            ]
        );

        $user = Auth::user();
        $ukm = Ukm::where('admin_ukm_id', $user->id)->first();

        if (!$ukm) {
            return redirect()->back()->with('error', 'Anda tidak memiliki UKM yang terdaftar.');
        }

        if ($request->hasFile('foto_sampul')) {
            if (!empty($ukm->foto_sampul) && is_string($ukm->foto_sampul)) {
                Storage::disk('public')->delete($ukm->foto_sampul);
            }
            $validateData['foto_sampul'] = $request->file('foto_sampul')->store('foto_sampuls', 'public');
        } else {
            $validateData['foto_sampul'] = $ukm->foto_sampul;
        }

        try {
            $kegiatan = $ukm->kegiatan()->create([
                'nama' => $validateData['nama'],
                'deskripsi' => $validateData['deskripsi'],
                'tanggal' => $validateData['tanggal'],
                'foto_sampul' => $validateData['foto_sampul'],
                'link_dokumentasi' => $validateData['link_dokumentasi'] ?? null,
                'font_deskripsi' => $validateData['font_deskripsi'],
            ]);

            return redirect('/admin/ukm/kegiatan')->with('success', 'Kegiatan berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    public function updateKegiatan(Request $request, $id)
    {
        $validateData = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string|min:10|max:700',
            'tanggal' => 'required|date',
            'link_dokumentasi' => 'nullable|string|max:255',
            'font_deskripsi' => 'nullable|string|in:font-sans,font-serif,font-mono,font-display,font-cursive,font-mono'
        ]);

        $kegiatan = Kegiatan::findOrFail($id);

        // Update secara eksplisit agar field bisa dikosongkan
        $kegiatan->nama = $validateData['nama'];
        $kegiatan->tanggal = $validateData['tanggal'];
        $kegiatan->deskripsi = $validateData['deskripsi'] ?? '';
        $kegiatan->link_dokumentasi = $validateData['link_dokumentasi'] ?? '';
        $kegiatan->font_deskripsi = $validateData['font_deskripsi'] ?? '';
        $kegiatan->save();

        return redirect()->route('adminUkmDetailKegiatan', $id)
            ->with('success', 'Kegiatan berhasil diperbarui.');
    }
    public function deleteKegiatan($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);

        if ($kegiatan->foto_sampul && Storage::disk('public')->exists($kegiatan->foto_sampul)) {
            Storage::disk('public')->delete($kegiatan->foto_sampul);
        }
        try {
            $kegiatan->delete();
            return redirect()->back()->with('success', 'Kegiatan berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus kegiatan: ' . $e->getMessage());
        }
    }
}
