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
        $kegiatan = $ukm ? $ukm->kegiatan()->get() : collect();
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
                'deskripsi' => 'required|string|min:10|max:700',
                'tanggal' => 'required|date',
                'foto_sampul' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'link_dokumentasi' => 'string|max:255'
            ],
            [
                'nama.required' => 'Nama kegiatan harus diisi.',
                'deskripsi.required' => 'Deskripsi kegiatan harus diisi.',
                'tanggal.required' => 'Tanggal kegiatan harus diisi.',
                'deskripsi.min' => 'Deskripsi kegiatan minimal harus 10 karakter.',
                'foto_sampul.max' => "Foto Tidak Boleh Lebih Dari 2MB"
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
                'link_dokumentasi' => $validateData['link_dokumentasi'],
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
            'deskripsi' => 'required|string|min:10|max:700',
            'tanggal' => 'required|date',
            'link_dokumentasi' => 'string|max:255'
        ]);

        $kegiatan = Kegiatan::findOrFail($id);

        $kegiatan->update([
            'nama' => $validateData['nama'],
            'deskripsi' => $validateData['deskripsi'],
            'tanggal' => $validateData['tanggal'],
            'link_dokumentasi' => $validateData['link_dokumentasi']
        ]);

        return redirect()->route('adminUkmDetailKegiatan', $id)
            ->with('success', 'Kegiatan berhasil diperbarui.');
    }

    public function deleteKegiatan($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->delete();
        return redirect('/admin/ukm/kegiatan')->with('success', 'Kegiatan Berhasil berhasil dihapus.');
    }
    
}
