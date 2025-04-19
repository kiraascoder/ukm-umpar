<?php

namespace App\Http\Controllers;

use App\Models\Ukm;
use Illuminate\Http\Request;

class PublicController extends Controller
{

    public function index()
    {
        $ukms = Ukm::with('ketuaUmum')->take(3)->get();
        $totalUkm = Ukm::count();
        return view('mahasiswa.home', compact('ukms', 'totalUkm'));
    }

    public function viewGallery()
    {
        return view('mahasiswa.galeri');
    }
    public function viewKegiatan()
    {
        return view('mahasiswa.kegiatan');
    }
    public function viewInformasi()
    {
        return view('mahasiswa.informasi');
    }
    public function viewUkm()
    {
        $ukms = Ukm::all();
        return view('mahasiswa.ukm', compact('ukms'));
    }
    public function detailUkm($id)
    {
        $ukm = Ukm::findOrFail($id);
        return view('mahasiswa.detail-ukm', compact('ukm'));
    }
}
