<?php

namespace App\Http\Controllers;

use App\Models\Proker;
use App\Models\Ukm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProkerController extends Controller
{
    public function ukmProker()
    {
        $user = Auth::user();
        $ukm = Ukm::where('admin_ukm_id', $user->id)->first();
        $proker = $ukm ? $ukm->proker()->get() : collect();
        return view('admin-ukm.proker', compact('proker'));
    }

    public function tambahProkerView()
    {
        return view('admin-ukm.tambah.proker');
    }

    public function detailProkerView($id)
    {
        $proker = Proker::findOrFail($id);
        return view('admin-ukm.detail.proker', compact('proker'));
    }

    public function storeProker(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|string|max:255',
            'bidang' => 'required|string|max:255',
            'deskripsi' => 'required|string|min:10|max:700',
            'status' => 'required|string|in:selesai,belum selesai', // Perbaikan di sini
        ]);

        $user = Auth::user();
        $ukm = Ukm::where('admin_ukm_id', $user->id)->first();

        if (!$ukm) {
            return redirect()->back()->with('error', 'Anda tidak memiliki UKM yang terdaftar.');
        }

        try {
            $ukm->proker()->create($validateData);

            return redirect('/admin/ukm/proker')->with('success', 'Proker berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    public function editProkerView($id)
    {
        $proker = Proker::findOrFail($id);
        return view('admin-ukm.edit.proker', compact('proker'));
    }

    public function editProker(Request $request, $id)
    {
        $proker = Proker::findOrFail($id);
        $proker->update($request->all());
        return redirect('/admin/ukm/proker')->with('success', 'Proker berhasil diedit.');
    }

    public function deleteProker($id)
    {
        $proker = Proker::findOrFail($id);
        $proker->delete();
        return redirect('/admin/ukm/proker')->with('success', 'proker Berhasil berhasil dihapus.');
    }
}
