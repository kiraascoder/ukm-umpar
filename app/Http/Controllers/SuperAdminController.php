<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Kegiatan;
use App\Models\Proker;
use App\Models\Ukm;
use App\Models\User;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function superAdminDashboardUkm()
    {

        $jumlahUkm = Ukm::all()->count();
        $jumlahProker = Proker::all()->count();
        $jumlahKegiatan = Proker::all()->count();
        $jumlahAnggota = Anggota::all()->count();
        $kegiatanTerkini = Kegiatan::latest()->take(5)->get();
        $anggota = Anggota::with('ukm')
            ->where('jabatan', 'Ketua Umum')
            ->get();
        return view('superadmin.dashboard', compact('anggota', 'jumlahProker', 'jumlahUkm', 'jumlahKegiatan', 'jumlahAnggota', 'kegiatanTerkini'));
    }
    public function daftarProkerUkm()
    {
        $proker = Proker::with('ukm')->get();
        return view('superadmin.daftar-proker', compact('proker'));
    }
    public function daftarUkm()
    {
        $anggota = Anggota::with('ukm')
            ->where('jabatan', 'Ketua Umum')
            ->get();
        return view('superadmin.daftar-ukm', compact('anggota'));
    }
    public function detailProkerUkm($id)
    {
        $proker = Proker::findOrFail($id);
        return view('superadmin.detail.proker', compact('proker'));
    }
    public function detailUkm($id)
    {
        $ukm = Ukm::findOrFail($id);
        return view('superadmin.detail.ukm', compact('ukm'));
    }
    public function detailKegiatan($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $dokumentasi = $kegiatan->dokumentasi()->get();

        $gambar1 = $dokumentasi->get(0);
        $gambar2 = $dokumentasi->get(1);
        $gambar3 = $dokumentasi->get(2);
        $gambar4 = $dokumentasi->get(3);
        $gambar5 = $dokumentasi->get(4);

        return view('superadmin.detail.kegiatan', compact(
            'kegiatan',
            'gambar1',
            'gambar2',
            'gambar3',
            'gambar4',
            'gambar5'
        ));
    }

    public function viewVerifikasiUkm()
    {
        $adminUKM = User::where('role', 'admin_ukm')->with('ukm')->get();
        return view('superadmin.verifikasi', compact('adminUKM'));
    }

    public function verifikasiUkm(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->status = $user->status === 'active' ? 'inactive' : 'active';
        $user->save();
        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }
}
