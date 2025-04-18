<?php

namespace App\Http\Controllers;

use App\Models\Ukm;
use Illuminate\Http\Request;

class PublicController extends Controller
{

    public function index()
    {
        $ukms = Ukm::take(3)->get();        
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
    public function viewTentang()
    {
        return view('mahasiswa.tentang');
    }
    public function viewUkm()
    {
        return view('mahasiswa.ukm');
    }
}
