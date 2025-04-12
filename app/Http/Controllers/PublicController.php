<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
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
    public function vieInformasi()
    {
        return view('mahasiswa.informasi');
    }
}
