<?php

namespace App\Http\Controllers;

use App\Models\KegiatanDokumentasi;
use App\Models\Pendaftaran;
use App\Models\Ukm;
use Illuminate\Http\Request;
use App\Models\Kegiatan;

class PublicController extends Controller
{

    public function index()
    {
        $ukms = Ukm::with('ketuaUmum')->take(3)->get();
        $gallery = KegiatanDokumentasi::with('kegiatan.ukm')->whereHas('kegiatan.ukm')->get();
        $totalUkm = Ukm::count();
        return view('mahasiswa.home', compact('ukms', 'totalUkm', 'gallery'));
    }

    public function viewGallery()
    {
        $gallery = KegiatanDokumentasi::with('kegiatan.ukm')->whereHas('kegiatan.ukm')->get();
        return view('mahasiswa.galeri', compact('gallery'));
    }
    public function viewKegiatan()
    {
        $kegiatans = Kegiatan::latest()->take(3)->get();
        $totalKegiatan = Kegiatan::count();
        return view('mahasiswa.kegiatan', compact('kegiatans', 'totalKegiatan'));
    }
    public function loadMore(Request $request)
    {
        if ($request->ajax()) {
            $kegiatans = Kegiatan::latest()->skip($request->offset)->take(3)->get();
            return view('mahasiswa.partials.kegiatan-card', compact('kegiatans'))->render();
        }
    }
    public function viewInformasi()
    {
        $pendaftaran = Pendaftaran::with('ukm')->latest()->take(3)->get();
        $totalPendaftaran = Pendaftaran::count();
        return view('mahasiswa.informasi', compact('pendaftaran', 'totalPendaftaran'));
    }
    public function viewContact()
    {
        return view('mahasiswa.contact');
    }
    public function viewUkm()
    {
        $ukms = Ukm::all();
        return view('mahasiswa.ukm', compact('ukms'));
    }

    public function detailUkm($id)
    {
        $ukm = Ukm::with('kegiatan.dokumentasi')->findOrFail($id);
        $anggota = $ukm->anggota()
            ->whereIn('jabatan', ['Ketua Umum', 'Sekretaris', 'Bendahara'])
            ->whereNotNull('foto')
            ->where('foto', '!=', '')
            ->get();

        $kegiatans = $ukm->kegiatan;
        $totalKegiatan = $kegiatans->count();

        return view('mahasiswa.detail-ukm', compact('ukm', 'anggota', 'kegiatans', 'totalKegiatan'));
    }

    public function viewDetailKegiatan($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $dokumentasi = $kegiatan->dokumentasi()->get();

        $gambar1 = $dokumentasi->get(0);
        $gambar2 = $dokumentasi->get(1);
        $gambar3 = $dokumentasi->get(2);
        $gambar4 = $dokumentasi->get(3);
        $gambar5 = $dokumentasi->get(4);

        return view('mahasiswa.detail-kegiatan', compact(
            'kegiatan',
            'gambar1',
            'gambar2',
            'gambar3',
            'gambar4',
            'gambar5'
        ));
    }
}
