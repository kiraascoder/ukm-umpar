@extends('component.admin-layout')

@section('title', 'Edit Anggota UKM')

@section('content')
    <div class="bg-gray-100 min-h-screen py-10">
        <div class="container mx-auto">
            <div class="max-w-3xl mx-auto bg-white p-8 shadow-lg rounded-lg">
                <h2 class="text-2xl font-bold mb-6 text-center">Edit Transaksi</h2>
                <form action="{{ route('adminUkmKeuangan.edit', $keuangan->id) }}" method="POST" enctype="multipart/form-data"
                    class="space-y-4">
                    @csrf
                    @method('PUT')
                    <div>
                        <label class="block font-medium text-gray-700">Keterangan</label>
                        <input type="text" name="keterangan" class="mt-1 p-2 w-full border rounded-md"
                            value="{{ old('keterangan', $keuangan->keterangan) }}">
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700">Jenis Transaksi</label>
                        <select name="jenis" id="jenis"
                            class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                            <option value="" disabled
                                {{ old('jenis', $keuangan->jenis ?? '') == '' ? 'selected' : '' }}>
                                Jenis Transaksi
                            </option>
                            <option value="" selected>Jenis Transaksi</option>
                            <option value="pemasukan">Pemasukan</option>
                            <option value="pengeluaran">Pengeluaran</option>
                        </select>
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700">Tanggal</label>
                        <input type="date" name="tanggal" class="mt-1 p-2 w-full border rounded-md"
                            value="{{ $keuangan->tanggal }}">
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700">Bukti Transaksi</label>
                        <input type="file" name="bukti_transaksi" class="mt-1 p-2 w-full border rounded-md">
                        @if (!empty($keuangan->bukti_transaksi))
                            <p class="text-sm text-gray-500 mt-1">
                                File saat ini: <a href="{{ asset('storage/' . $keuangan->bukti_transaksi) }}"
                                    target="_blank" class="text-blue-500 underline">Lihat Transaksi</a>
                            </p>
                        @endif
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700">Jumlah</label>
                        <input type="number" name="jumlah" class="mt-1 p-2 w-full border rounded-md"
                            value="{{ $keuangan->jumlah }}">
                    </div>

                    <div class="text-center">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Edit
                            Transaksi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
