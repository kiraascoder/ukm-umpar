<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $table = "kegiatan";

    protected $fillable = [
        'ukm_id',
        'nama',
        'deskripsi',
        'tanggal',
    ];

    public function dokumentasi()
    {
        return $this->hasMany(KegiatanDokumentasi::class);
    }
    public function ukm()
    {
        return $this->belongsTo(Ukm::class);
    }
}
