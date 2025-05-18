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
            'photos' => 'required|array|max:10',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'photos.required' => 'Minimal satu gambar harus diunggah.',
            'photos.max' => 'Maksimal 10 gambar yang dapat diunggah sekaligus.',
            'photos.*.max' => 'Setiap gambar maksimal berukuran 2MB.',
        ]);

        $user = Auth::user();
        $ukm = Ukm::where('admin_ukm_id', $user->id)->first();

        if (!$ukm) {
            return redirect()->back()->with('error', 'UKM tidak ditemukan.');
        }


        $existingCount = Gallery::where('ukm_id', $ukm->id)->count();
        $newPhotosCount = count($request->file('photos'));
        if (($existingCount + $newPhotosCount) > 10) {
            return redirect()->back()->with('error', 'Maksimal 10 foto dapat diunggah untuk satu UKM. Anda sudah mengunggah ' . $existingCount . ' foto.');
        }


        foreach ($request->file('photos') as $photo) {
            $path = $photo->store('galleries', 'public');

            Gallery::create([
                'ukm_id' => $ukm->id,
                'photo_path' => $path,
            ]);
        }

        return redirect()->back()->with('success', 'Foto berhasil diunggah.');
    }


    public function deleteGaleri($id)
    {
        $galeri = Gallery::findOrFail($id);
        $galeri->delete();
        return redirect()->back()->with('success', 'Foto berhasil dihapus.');
    }
}
