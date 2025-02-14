<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $table = 'arsip_surat';

    protected $fillable = [
        'ukm_id', 'judul', 'jenis_surat', 'file_path',
    ];
}
