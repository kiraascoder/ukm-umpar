<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proker extends Model
{
    protected $table = 'program_kerja';

    protected $fillable = [
        'ukm_id',
        'nama',
        'bidang',
        'deskripsi',
        'status',
    ];

    public function ukm()
    {
        return $this->belongsTo(Ukm::class);
    }
}
