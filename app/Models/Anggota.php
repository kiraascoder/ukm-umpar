<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggota_ukm';
    protected $fillable = [
        'nama',
        'jabatan',
        'tempat_lahir',
        'tanggal_lahir',
        'jurusan',
        'fakultas',
        'angkatan',
        'ukm_id',
    ];

    public function ukm()
    {
        return $this->belongsTo(Ukm::class);
    }
}
