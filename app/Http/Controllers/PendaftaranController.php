<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Ukm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

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
        $validateData = $request->validate([
            'pendaftaran' => 'required|string|max:255',
            'batas_pendaftaran' => 'required|date',
            'brosur' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
            'link_pendaftaran' => 'nullable|string|max:255',
            'persyaratan' => 'required|string',
            'wa' => 'required|string|max:20',

        ], [
            'brosur.image' => 'File harus berupa gambar.',
            'brosur.mimes' => 'Format gambar yang diperbolehkan: jpeg, png, jpg, gif, svg.',
            'brosur.max' => 'Ukuran gambar maksimal 10MB.',
            'link_pendaftaran.string' => 'Link pendaftaran harus berupa URL.',
            'persyaratan.string' => 'Persyaratan harus berupa teks.',
        ]);

        $user = Auth::user();
        $ukm = Ukm::where('admin_ukm_id', $user->id)->first();

        if (!$ukm) {
            return redirect()->back()->with('error', 'Anda tidak memiliki UKM yang terdaftar.');
        }

        try {
            $filePath = $request->hasFile('brosur')
                ? $request->file('brosur')->store('brosur', 'public')
                : null;

            $ukm->pendaftaran()->create([
                'pendaftaran' => $validateData['pendaftaran'],
                'batas_pendaftaran' => $validateData['batas_pendaftaran'],
                'brosur' => $filePath,
                'link_pendaftaran' => $validateData['link_pendaftaran'],
                'persyaratan' => $validateData['persyaratan'],
                'wa' => $validateData['wa'],
            ]);


            return redirect('/admin/ukm/pendaftaran')->with('success', 'Pendaftaran berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
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
    
        $validatedData = $request->validate([
            'pendaftaran' => 'required|string|max:255',
            'batas_pendaftaran' => 'required|date',
            'brosur' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
            'link_pendaftaran' => 'required|string|max:255',
            'persyaratan' => 'required|string',
            'wa' => 'required|string|max:20',
        ]);
    
        try {
            if ($request->hasFile('brosur')) {
                
                if ($pendaftaran->brosur && Storage::disk('public')->exists($pendaftaran->brosur)) {
                    Storage::disk('public')->delete($pendaftaran->brosur);
                }
    
                
                $filePath = $request->file('brosur')->store('brosur', 'public');
                $validatedData['brosur'] = $filePath;
            }
    
            $pendaftaran->update($validatedData);
    
            return redirect('/admin/ukm/pendaftaran')->with('success', 'Pendaftaran berhasil diperbarui.');
        } catch (\Exception $e) {
            Log::error('Gagal mengedit pendaftaran: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengupdate pendaftaran: ' . $e->getMessage());
        }
    }
}
