<?php

namespace App\Http\Controllers;

use App\Models\Ukm;
use Auth;
use Illuminate\Http\Request;

class AdminUKMController extends Controller
{
    public function adminDashboard()
    {
        return view('superadmin.dashboard');
    }
    public function adminDashboardUkm()
    {
        return view('admin-ukm.dashboard');
    }

    public function storeDataUkm(Request $request)
    {
        $validatedData = $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi' => 'nullable|string',
            'sejarah' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'struktur_organisasi' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
            'media_sosial' => 'nullable|array',
            'media_sosial.instagram' => 'nullable|string',
            'media_sosial.facebook' => 'nullable|string',
            'media_sosial.twitter' => 'nullable|string',
            'media_sosial.tiktok' => 'nullable|string'
        ], [
            'logo.image' => 'File harus berupa gambar.',
            'logo.mimes' => 'Format gambar yang diperbolehkan: jpeg, png, jpg, gif, svg.',
            'logo.max' => 'Ukuran gambar maksimal 2MB.',
            'struktur_organisasi.image' => 'File harus berupa gambar.',
            'struktur_organisasi.mimes' => 'Format gambar yang diperbolehkan: jpeg, png, jpg, gif, svg.',
            'struktur_organisasi.max' => 'Ukuran gambar maksimal 10MB.',
        ]);
    
        $user = Auth::user();
        $ukm = Ukm::where('admin_ukm_id', $user->id)->first();
    
        if ($request->hasFile('logo')) {
            $validatedData['logo'] = $request->file('logo')->store('ukm_logos', 'public');
        } else {
            $validatedData['logo'] = $ukm->logo; 
        }
        
        if ($request->hasFile('struktur_organisasi')) {
            $validatedData['struktur_organisasi'] = $request->file('struktur_organisasi')->store('ukm_structures', 'public');
        } else {
            $validatedData['struktur_organisasi'] = $ukm->struktur_organisasi; 
        }

        $media_sosial = $validatedData['media_sosial'] ?? json_decode($ukm->media_sosial, true);
        $media_sosial = json_encode([
            'instagram' => $media_sosial['instagram'] ?? 'Testing',
            'facebook' => $media_sosial['facebook'] ?? 'Testing',
            'twitter' => $media_sosial['twitter'] ?? 'Testing',
            'tiktok' => $media_sosial['tiktok'] ?? 'Testing'
        ]);
    
        
        $ukm->update([
            'logo' => $validatedData['logo'],
            'deskripsi' => $validatedData['deskripsi'] ?? 'Testing',
            'sejarah' => $validatedData['sejarah'] ?? 'Testing',
            'visi' => $validatedData['visi'] ?? 'Testing',
            'misi' => $validatedData['misi'] ?? 'Testing',
            'struktur_organisasi' => $validatedData['struktur_organisasi'],
            'media_sosial' => $media_sosial
        ]);
    
        return redirect('/admin/ukm/dashboard')->with('success', 'Data Berhasil Diperbarui');
    }    
}
