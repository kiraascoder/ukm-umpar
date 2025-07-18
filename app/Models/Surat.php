<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{

    use HasFactory;
    protected $table = 'arsip_surat';

    protected $fillable = [
        'ukm_id', 'judul', 'jenis_surat', 'file_path',
    ];

    public function ukm()
    {
        return $this->belongsTo(Ukm::class);
    }
}
