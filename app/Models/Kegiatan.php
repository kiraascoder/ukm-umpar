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
        'foto_sampul',
        'link_dokumentasi',
        'font_deskripsi'
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
