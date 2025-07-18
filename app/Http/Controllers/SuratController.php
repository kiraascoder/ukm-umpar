<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Surat;
use App\Models\Ukm;

class SuratController extends Controller
{
    public function ukmArsipSurat()
    {
        $ukm = Ukm::where('admin_ukm_id', Auth::user()->id)->first();
        $surats = $ukm ? $ukm->surat()->get() : collect();
        return view('admin-ukm.arsip', compact('surats'));
    }

    public function editSuratView($id)
    {
        $surat = Surat::findOrFail($id);
        return view('admin-ukm.edit.surat', compact('surat'));
    }
    public function tambahSuratView()
    {
        return view('admin-ukm.tambah.surat');
    }

    public function deleteSurat($id)
    {
        $surat = Surat::findOrFail($id);
        $surat->delete();
        return redirect('/admin/ukm/arsip-surat')->with('success', 'Surat Berhasil berhasil dihapus.');
    }

    public function storeSurat(Request $request)
    {

        $validateData = $request->validate([
            'judul' => 'required|string|max:255',
            'jenis_surat' => 'required|string|in:masuk,keluar',
            'file_path' => 'required|file|mimes:pdf,doc,docx|max:10048',
        ]);

        $user = Auth::user();
        $ukm = Ukm::where('admin_ukm_id', $user->id)->first();
        if (!$ukm) {
            return redirect()->back()->with('error', 'Anda tidak memiliki UKM yang terdaftar.');
        }
        try {
            $filePath = $request->file('file_path')->store('surat', 'public');
            $ukm->surat()->create([
                'judul' => $validateData['judul'],
                'jenis_surat' => $validateData['jenis_surat'],
                'file_path' => $filePath,
            ]);
            return redirect('/admin/ukm/arsip-surat')->with('success', 'Surat berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
    public function editSurat(Request $request, $id)
    {
        $surat = Surat::findOrFail($id);

        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'jenis_surat' => 'required|string|in:masuk,keluar',
            'file_path' => 'nullable|file|mimes:pdf,doc,docx|max:10048',
        ]);

        try {

            if ($request->hasFile('file_path')) {

                if ($surat->file_path && \Storage::disk('public')->exists($surat->file_path)) {
                    \Storage::disk('public')->delete($surat->file_path);
                }


                $filePath = $request->file('file_path')->store('surat', 'public');
                $validatedData['file_path'] = $filePath;
            }
            $surat->update($validatedData);

            return redirect('/admin/ukm/arsip-surat')->with('success', 'Surat berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
