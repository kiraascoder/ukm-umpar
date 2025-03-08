<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Keuangan;
use App\Models\Ukm;
use Illuminate\Support\Facades\Storage;

class KeuanganController extends Controller
{
    public function viewKeuangan()
    {
        $user = Auth::user();
        $ukm = Ukm::where('admin_ukm_id', $user->id)->first();
        $keuangan = $ukm ? $ukm->keuangan()->get() : collect();
        $ukmSaldo = $ukm ? $ukm->saldo : 0;
        return view('admin-ukm.keuangan', compact('keuangan', 'ukmSaldo'));
    }

    public function viewEditKeuangan($id)
    {
        $keuangan = Keuangan::findOrFail($id);
        return view('admin-ukm.edit.keuangan', compact('keuangan'));
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

    public function storeKeuangan(Request $request)
    {
        $validateData = $request->validate([
            'keterangan' => 'required|string|max:255',
            'jenis' => 'required|string|in:pemasukan,pengeluaran',
            'bukti_transaksi' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
            'jumlah' => 'required|numeric',
            'tanggal' => 'required|date',
        ]);

        $user = Auth::user();
        $ukm = Ukm::where('admin_ukm_id', $user->id)->first();

        if (!$ukm) {
            return redirect()->back()->with('error', 'Anda tidak memiliki UKM yang terdaftar.');
        }

        try {

            $filePath = $request->hasFile('bukti_transaksi')
                ? $request->file('bukti_transaksi')->store('bukti_transaksi', 'public')
                : null;
            if ($validateData['jenis'] == 'pemasukan') {
                $ukm->saldo += $validateData['jumlah'];
            } else {
                if ($ukm->saldo < $validateData['jumlah']) {
                    return redirect()->back()->with('error', 'Saldo tidak mencukupi untuk pengeluaran ini.');
                }
                $ukm->saldo -= $validateData['jumlah'];
            }
            $ukm->save();
            $ukm->keuangan()->create([
                'keterangan' => $validateData['keterangan'],
                'jenis' => $validateData['jenis'],
                'bukti_transaksi' => $filePath,
                'jumlah' => $validateData['jumlah'],
                'tanggal' => $validateData['tanggal'],
            ]);

            return redirect('/admin/ukm/keuangan')->with('success', 'Transaksi berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function hapusKeuangan($id)
    {
        $keuangan = Keuangan::findOrFail($id);
        $ukm = Ukm::where('id', $keuangan->ukm_id)->first();

        if (!$ukm) {
            return redirect()->back()->with('error', 'UKM tidak ditemukan.');
        }
        if ($keuangan->jenis == 'pemasukan') {
            $ukm->saldo -= $keuangan->jumlah;
        } else {
            $ukm->saldo += $keuangan->jumlah;
        }

        $ukm->save();
        if ($keuangan->bukti_transaksi) {
            Storage::disk('public')->delete($keuangan->bukti_transaksi);
        }
        $keuangan->delete();

        return redirect('/admin/ukm/keuangan')->with('success', 'Transaksi berhasil dihapus dan saldo dikembalikan.');
    }


    public function editKeuangan(Request $request, $id)
    {
        $validateData = $request->validate([
            'keterangan' => 'required|string|max:255',
            'jenis' => 'required|string|in:pemasukan,pengeluaran',
            'jumlah' => 'required|numeric',
            'tanggal' => 'required|date',
            'bukti_transaksi' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
        ]);

        $keuangan = Keuangan::findOrFail($id);
        $ukm = Ukm::where('id', $keuangan->ukm_id)->first();

        if (!$ukm) {
            return redirect()->back()->with('error', 'UKM tidak ditemukan.');
        }

        if ($keuangan->jenis == 'pemasukan') {
            $ukm->saldo -= $keuangan->jumlah;
        } else {
            $ukm->saldo += $keuangan->jumlah;
        }
        if ($validateData['jenis'] == 'pemasukan') {
            $ukm->saldo += $validateData['jumlah'];
        } else {
            if ($ukm->saldo < $validateData['jumlah']) {
                return redirect()->back()->with('error', 'Saldo tidak mencukupi untuk pengeluaran ini.');
            }
            $ukm->saldo -= $validateData['jumlah'];
        }


        if ($request->hasFile('bukti_transaksi')) {

            $filePath = $request->file('bukti_transaksi')->store('bukti_transaksi', 'public');


            if ($keuangan->bukti_transaksi) {
                Storage::disk('public')->delete($keuangan->bukti_transaksi);
            }
            $validateData['bukti_transaksi'] = $filePath;
        }
        $ukm->save();
        $keuangan->update($validateData);

        return redirect('/admin/ukm/keuangan')->with('success', 'Transaksi berhasil diperbarui.');
    }
}
