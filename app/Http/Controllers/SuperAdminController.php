<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Proker;
use App\Models\Ukm;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function superAdminDashboardUkm()
    {
        $proker = Proker::with('ukm')->get()->count();
        $jumlahUkm = Ukm::all()->count();
        $anggota = Anggota::with('ukm')
            ->where('jabatan', 'Ketua Umum')
            ->get();
        return view('superadmin.dashboard', compact('anggota', 'proker', 'jumlahUkm'));
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
}
