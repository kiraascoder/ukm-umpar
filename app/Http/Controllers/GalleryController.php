<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Ukm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $ukm = Ukm::where('admin_ukm_id', $user->id)->first();
        $gallery = $ukm ? $ukm->gallery()->get() : collect();
        return view('admin-ukm.galeri', compact('gallery'));
    }

    public function tambahGaleriView()
    {
        return view('admin-ukm.tambah.galeri');
    }
    public function store(Request $request)
    {
        $request->validate([
            'photos' => 'required|array|min:1|max:30',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:10048',
        ], [
            'photos.required' => 'Minimal satu gambar harus diunggah.',
            'photos.min' => 'Minimal satu gambar harus diunggah.',
            'photos.max' => 'Maksimal 10 gambar yang dapat diunggah sekaligus.',
            'photos.*.max' => 'Setiap gambar maksimal berukuran 10MB.',
            'photos.*.image' => 'File harus berupa gambar.',
            'photos.*.mimes' => 'Format gambar harus jpeg, png, jpg, gif, atau webp.',
        ]);

        $user = Auth::user();
        $ukm = Ukm::where('admin_ukm_id', $user->id)->first();

        if (!$ukm) {
            return back()->with('error', 'UKM tidak ditemukan.');
        }

        // Cek jumlah maksimal total foto untuk UKM ini
        $existingCount = Gallery::where('ukm_id', $ukm->id)->count();
        $newPhotosCount = count($request->file('photos'));

        if (($existingCount + $newPhotosCount) > 30) {
            return back()->with('error', "Maksimal 30 foto. Anda sudah mengunggah {$existingCount} foto.");
        }

        foreach ($request->file('photos') as $photo) {
            $path = $photo->store('galleries', 'public');

            Gallery::create([
                'ukm_id' => $ukm->id,
                'photo_path' => $path,
            ]);
        }

        return back()->with('success', 'Foto berhasil diunggah.');
    }


    public function deleteGaleri($id)
    {
        $galeri = Gallery::findOrFail($id);
        $galeri->delete();
        return redirect()->back()->with('success', 'Foto berhasil dihapus.');
    }
}
