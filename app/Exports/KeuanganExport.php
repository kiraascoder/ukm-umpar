<?php

namespace App\Exports;

use App\Models\Keuangan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithFormatting;

class KeuanganExport implements FromCollection, WithHeadings
{
    /**
     * Menentukan data yang akan diekspor.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Ambil semua data dari model Keuangan
        return Keuangan::all([
            'keterangan', 'jumlah', 'jenis', 'tanggal', 'bukti_transaksi'
        ]);
    }

    /**
     * Menentukan judul kolom CSV.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'Keterangan',
            'Jumlah',
            'Jenis',
            'Tanggal',
            'Dokumen'
        ];
    }
}
