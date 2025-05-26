<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    protected $table = 'keuangan';

    protected $fillable = [
        'ukm_id',
        'jenis',
        'jumlah',
        'tanggal',
        'keterangan',
        'bukti_transaksi',
        'ukm_id',
    ];

    public function ukm()
    {
        return $this->belongsTo(Ukm::class);
    }
}
