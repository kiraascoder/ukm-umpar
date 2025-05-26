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
        'foto_pengurus',
        'media_sosial',
        'admin_ukm_id',
        'saldo'
    ];
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_ukm_id');
    }

    public function gallery()
    {
        return $this->hasMany(Gallery::class);
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

    public function ketuaUmum()
    {
        return $this->hasOne(Anggota::class)->where('jabatan', 'Ketua Umum');
    }
}
