<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keuangan;

class KeuanganController extends Controller
{
    public function viewKeuangan()
    {
        return view('admin-ukm.keuangan');
    }

    public function tambahKeuanganView()
    {
        return view('admin-ukm.tambah.keuangan');
    }

    public function editKeuanganView($id)
    {
        $keuangan = Keuangan::findOrFail($id);
        return view('admin-ukm.edit.keuangan', compact('keuangan'));
    }

    public function totalSaldo()
    { }
}
