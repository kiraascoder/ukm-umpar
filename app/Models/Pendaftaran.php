<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $table = 'pendaftaran_anggota';

    protected $fillable = [
        'ukm_id',
        'pendaftaran',
        'batas_pendaftaran',
        'brosur',
        'link_pendaftaran',
        'persyaratan',
        'wa',
        'formulir',
    ];

    public function ukm()
    {
        return $this->belongsTo(Ukm::class);
    }
}
