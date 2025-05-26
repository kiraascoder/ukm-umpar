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
        'jenis_kelamin',
        'jurusan',
        'fakultas',
        'angkatan',
        'ukm_id',
        'foto',
    ];

    public function ukm()
    {
        return $this->belongsTo(Ukm::class);
    }
}
