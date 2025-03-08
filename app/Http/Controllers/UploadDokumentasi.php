<?php

namespace App\Http\Controllers;

use App\Models\KegiatanDokumentasi;
use Illuminate\Http\Request;
use App\Models\Kegiatan;
use Illuminate\Support\Facades\Storage;

class UploadDokumentasi extends Controller
{
    public function store(Request $request, Kegiatan $id)
    {
        $request->validate([
            'photos.*' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('dokumentasi', 'public');

                KegiatanDokumentasi::create([
                    'kegiatan_id' => $id,
                    'photo_path' => $path
                ]);
            }
        }

        return back()->with('success', 'Dokumentasi berhasil diupload.');
    }

    public function destroy(KegiatanDokumentasi $dokumentasi)
    {
        Storage::disk('public')->delete($dokumentasi->photo_path);
        $dokumentasi->delete();

        return back()->with('success', 'Foto dokumentasi berhasil dihapus.');
    }
}
