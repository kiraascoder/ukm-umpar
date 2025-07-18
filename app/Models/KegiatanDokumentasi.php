<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanDokumentasi extends Model
{
    use HasFactory;

    protected $table = 'kegiatan_dokumentasi';

    protected $fillable = [
        'kegiatan_id',
        'photo_path',
    ];

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }
}
