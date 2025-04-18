<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ukm;
use Illuminate\Support\Facades\Auth;
use App\Models\Anggota;
use Illuminate\Support\Facades\Storage;

class AnggotaController extends Controller
{

    public function ukmAnggota()
    {
        $ukm = Ukm::where('admin_ukm_id', Auth::user()->id)->first();
        $anggota = $ukm ? $ukm->anggota()->get() : collect();
        return view('admin-ukm.anggota', compact('anggota'));
    }
    public function viewTambahAnggota()
    {
        return view('admin-ukm.tambah.anggota');
    }

    public function viewDetailAnggota($id)
    {
        $anggota = Anggota::findOrFail($id);
        return view('admin-ukm.detail.anggota', compact('anggota'));
    }

    public function viewEditAnggota($id)
    {
        $anggota = Anggota::findOrFail($id);
        return view('admin-ukm.edit.anggota', compact('anggota'));
    }

    public function storeAnggota(Request $request)
    {
        $validatedData = $request->validate(
            [
                'nama' => 'required|string|max:255',
                'jabatan' => 'required|string|max:255',
                'tempat_lahir' => 'required|string|max:255',
                'tanggal_lahir' => 'required|date',
                'jenis_kelamin' => 'required|string|in:Laki-laki,Perempuan',
                'jurusan' => 'required|string|max:255',
                'fakultas' => 'required|string|in:fkip,feb,faktek,fapetrik,fikes,fai,hukum',
                'angkatan' => 'required|string|max:255',
                'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ],
            [
                'foto.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
            ]
        );

        $user = Auth::user();
        $ukm = Ukm::where('admin_ukm_id', $user->id)->first();
        $jabatan = $validatedData['jabatan'];
        if ($jabatan === 'lainnya' && $request->has('jabatan_custom')) {
            $jabatan = $request->jabatan_custom;
        }
        $ukm->anggota()->create([
            'nama' => $validatedData['nama'],
            'jabatan' => $jabatan,
            'tempat_lahir' => $validatedData['tempat_lahir'],
            'tanggal_lahir' => $validatedData['tanggal_lahir'],
            'jenis_kelamin' => $validatedData['jenis_kelamin'],
            'jurusan' => $validatedData['jurusan'],
            'fakultas' => $validatedData['fakultas'],
            'angkatan' => $validatedData['angkatan'],
            'foto' => $request->hasFile('foto') ? $request->file('foto')->store('anggota', 'public') : null,
        ]);
        return redirect()->route('adminUkmAnggota')->with('success', 'Anggota berhasil ditambahkan!');
    }


    public function deleteAnggota($id)
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->delete();
        return redirect('/admin/ukm/anggota')->with('success', 'Anggota berhasil dihapus.');
    }

    public function editAnggota(Request $request, $id)
    {
        $anggota = Anggota::findOrFail($id);
        $validatedData = $request->validate(
            [
                'nama' => 'required|string|max:255',
                'jabatan' => 'required|string|max:255',
                'tempat_lahir' => 'required|string|max:255',
                'tanggal_lahir' => 'required|date',
                'jenis_kelamin' => 'required|string|in:Laki-laki,Perempuan',
                'jurusan' => 'required|string|max:255',
                'fakultas' => 'required|string|in:fkip,feb,faktek,fapetrik,fikes,fai,hukum',
                'angkatan' => 'required|string|max:255',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ],
            [
                'foto.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
                'foto.image' => 'File foto harus berupa gambar.',
            ]
        );
        if ($request->hasFile('foto')) {
            if ($request->file('foto')->isValid()) {
                if ($anggota->foto) {
                    Storage::delete('public/' . $anggota->foto);
                }

                $path = $request->file('foto')->store('anggota_foto', 'public');
                $validatedData['foto'] = $path;
            } else {
                return back()->withErrors(['foto' => 'The uploaded photo is invalid. Please try again.']);
            }
        }
        $anggota->update($validatedData);
        return redirect()->route('adminUkmDetailAnggota', ['id' => $anggota->id])
            ->with('success', 'Data anggota berhasil diperbarui.');
    }
}
