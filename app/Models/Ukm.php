<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ukm extends Model
{
    use HasFactory;
    protected $table = 'ukm';

    protected $fillable = [
        'nama',
        'logo',
        'deskripsi',
        'sejarah',
        'visi',
        'misi',
        'struktur_organisasi',
        'media_sosial',
        'admin_ukm_id',
        'saldo'
    ];
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_ukm_id');
    }
    public function anggota()
    {
        return $this->hasMany(Anggota::class);
    }
    public function surat()
    {
        return $this->hasMany(Surat::class);
    }
    public function keuangan()
    {
        return $this->hasMany(Keuangan::class);
    }

    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class);
    }

    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class);
    }
    public function proker()
    {
        return $this->hasMany(Proker::class);
    }
}
