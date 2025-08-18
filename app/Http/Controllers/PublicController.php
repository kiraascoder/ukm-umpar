<?php

namespace App\Http\Controllers;

use App\Models\KegiatanDokumentasi;
use App\Models\Pendaftaran;
use App\Models\Ukm;
use Illuminate\Http\Request;
use App\Models\Kegiatan;
use Illuminate\Support\Facades\Storage;

class PublicController extends Controller
{
    public function index()
    {

        $ukms = Ukm::with('ketuaUmum')
            ->whereHas('admin', function ($query) {
                $query->where('status', 'active');
            })
            ->take(3)
            ->get();


        $gallery = KegiatanDokumentasi::with('kegiatan.ukm')
            ->whereHas('kegiatan.ukm.admin', function ($query) {
                $query->where('status', 'active');
            })
            ->inRandomOrder()
            ->limit(9)
            ->get();



        $totalGallery = $gallery->count();


        $totalUkm = Ukm::whereHas('admin', function ($query) {
            $query->where('status', 'active');
        })->count();

        return view('mahasiswa.home', compact('ukms', 'totalUkm', 'gallery', 'totalGallery'));
    }


    public function viewGallery()
    {

        $latestGallery = KegiatanDokumentasi::with('kegiatan.ukm')
            ->whereHas('kegiatan.ukm.admin', function ($query) {
                $query->where('status', 'active');
            })
            ->latest()
            ->take(1)
            ->get();

        $excludedIds = $latestGallery->pluck('id');

        $randomGallery = KegiatanDokumentasi::with('kegiatan.ukm')
            ->whereHas('kegiatan.ukm.admin', function ($query) {
                $query->where('status', 'active');
            })
            ->whereNotIn('id', $excludedIds)
            ->inRandomOrder()
            ->take(7)
            ->get();

        $gallery = $latestGallery->concat($randomGallery);


        $videos = Kegiatan::whereHas('ukm.admin', function ($query) {
            $query->where('status', 'active');
        })
            ->whereNotNull('link_dokumentasi')
            ->where('link_dokumentasi', '!=', '')
            ->latest()
            ->get();

        return view('mahasiswa.galeri', compact('gallery', 'videos'));
    }



    public function viewKegiatan()
    {
        $kegiatans = Kegiatan::whereHas('ukm.admin', function ($query) {
            $query->where('status', 'active');
        })
            ->latest()
            ->take(9)
            ->get();

        return view('mahasiswa.kegiatan', compact('kegiatans'));
    }

    public function viewInformasi()
    {
        $pendaftaran = Pendaftaran::with('ukm')
            ->whereHas('ukm.admin', function ($query) {
                $query->where('status', 'active');
            })
            ->latest()
            ->take(9)
            ->get();

        $totalPendaftaran = Pendaftaran::whereHas('ukm.admin', function ($query) {
            $query->where('status', 'active');
        })->count();

        return view('mahasiswa.informasi', compact('pendaftaran', 'totalPendaftaran'));
    }

    public function viewContact()
    {
        return view('mahasiswa.contact');
    }

    public function viewUkm()
    {
        $ukms = Ukm::whereHas('admin', function ($query) {
            $query->where('status', 'active');
        })
            ->get();

        return view('mahasiswa.ukm', compact('ukms'));
    }

    public function detailUkm($id)
    {
        $ukm = Ukm::with('kegiatan.dokumentasi')
            ->whereHas('admin', function ($query) {
                $query->where('status', 'active');
            })
            ->findOrFail($id);

        $anggota = $ukm->anggota()
            ->whereIn('jabatan', ['Ketua Umum', 'Sekretaris', 'Bendahara'])
            ->whereNotNull('foto')
            ->where('foto', '!=', '')
            ->get();

        $galeri = $ukm->gallery()->get();

        $kegiatans = $ukm->kegiatan;
        $totalKegiatan = $kegiatans->count();

        $pendaftaran = Pendaftaran::where('ukm_id', $id)->get();

        return view('mahasiswa.detail-ukm', compact('ukm', 'anggota', 'kegiatans', 'totalKegiatan', 'pendaftaran', 'galeri'));
    }

    public function viewDetailKegiatan($id)
    {
        $kegiatan = Kegiatan::whereHas('ukm.admin', function ($query) {
            $query->where('status', 'active');
        })
            ->findOrFail($id);

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

    public function detailInformasi($id)
    {
        $informasi = Pendaftaran::whereHas('ukm.admin', function ($query) {
            $query->where('status', 'active');
        })
            ->findOrFail($id);

        $ukmTerkait = $informasi->ukm;

        return view('mahasiswa.detail-informasi', compact('informasi', 'ukmTerkait'));
    }

    public function detailKegiatan($id)
    {
        $kegiatan = Kegiatan::whereHas('ukm.admin', function ($query) {
            $query->where('status', 'active');
        })
            ->findOrFail($id);

        $dokumentasi = $kegiatan->dokumentasi()->get();

        $gambar1 = $dokumentasi->get(0);
        $gambar2 = $dokumentasi->get(1);
        $gambar3 = $dokumentasi->get(2);
        $gambar4 = $dokumentasi->get(3);
        $gambar5 = $dokumentasi->get(4);

        return view('mahasiswa.detailKegiatan', compact(
            'kegiatan',
            'gambar1',
            'gambar2',
            'gambar3',
            'gambar4',
            'gambar5'
        ));
    }

    public function downloadFormulir($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        if (!$pendaftaran->formulir) {
            abort(404, "Formulir tidak tersedia.");
        }

        // Path file di storage
        $path = 'formulir/' . $pendaftaran->formulir;

        // Cek kalau file memang ada
        if (!Storage::exists($path)) {
            abort(404, "File tidak ditemukan di server.");
        }

        // Download file
        return Storage::download($path, 'Formulir_Pendaftaran_' . $pendaftaran->id . '.' . pathinfo($informasi->formulir, PATHINFO_EXTENSION));
    }
}
