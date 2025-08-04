<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function formulir($id)
    {
        $data = \App\Models\Pendaftaran::findOrFail($id); // Ganti sesuai model
        $path = $data->formulir;

        if (!Storage::disk('public')->exists($path)) {
            abort(404, 'File tidak ditemukan');
        }

        return Storage::disk('public')->download($path);
    }
    public function formulirAdmin($id)
    {
        $pendaftaran = \App\Models\Pendaftaran::findOrFail($id); // Sesuaikan nama model jika perlu

        if (!$pendaftaran->formulir || !Storage::disk('public')->exists($pendaftaran->formulir)) {
            abort(404, 'File formulir tidak ditemukan.');
        }

        return Storage::disk('public')->download($pendaftaran->formulir);
    }
}
