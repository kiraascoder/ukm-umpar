<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    protected $table = 'keuangan';

    protected $fillable = [
        'ukm_id',
        'saldo',
        'jenis',
        'jumlah',
        'tanggal',
        'keterangan',
        'ukm_id',
    ];
}
