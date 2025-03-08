<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function ukmPendaftaran()
    {
        return view('admin-ukm.pendaftaran');
    }
    public function tambahPendaftaranView()
    {
        return view('admin-ukm.tambah.pendaftaran');
    }

    public function editPendaftaranView($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        return view('admin-ukm.edit.pendaftaran', compact('kegiatan'));
    }
    public function detailKegiatanView($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        return view('admin-ukm.detail.kegiatan', compact('kegiatan'));
    }

    public function storeKegiatan(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string|min:10|max:700',
            'tanggal' => 'required|date',
            'dokumentasi' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10048'
        ]);

        $user = Auth::user();
        $ukm = Ukm::where('admin_ukm_id', $user->id)->first();

        if (!$ukm) {
            return redirect()->back()->with('error', 'Anda tidak memiliki UKM yang terdaftar.');
        }

        try {
            $filePath = $request->hasFile('dokumentasi')
                ? $request->file('dokumentasi')->store('dokumentasi', 'public')
                : null;

            $ukm->kegiatan()->create([
                'nama' => $validateData['nama'],
                'deskripsi' => $validateData['deskripsi'],
                'tanggal' => $validateData['tanggal'],
                'dokumentasi' => $filePath,


            ]);

            return redirect('/admin/ukm/kegiatan')->with('success', 'Kegiatan berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
    public function deleteKegiatan($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->delete();
        return redirect('/admin/ukm/kegiatan')->with('success', 'Kegiatan Berhasil berhasil dihapus.');
    }
}
