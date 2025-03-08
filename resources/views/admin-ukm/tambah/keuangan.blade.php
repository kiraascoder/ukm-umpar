@extends('component.admin-layout')

@section('title', 'Tambah Anggota UKM')

@section('content')
    <div class="bg-gray-100 min-h-screen py-10">
        <div class="container mx-auto">
            <div class="max-w-3xl mx-auto bg-white p-8 shadow-lg rounded-lg">
                <h2 class="text-2xl font-bold mb-6 text-center">Tambah Transaksi</h2>
                <form action="{{ route('adminUkmTambahKeuangan.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-4">
                    @csrf
                    <div>
                        <label class="block font-medium text-gray-700">Keterangan</label>
                        <input type="text" name="keterangan" class="mt-1 p-2 w-full border rounded-md">
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700">Jenis Transaksi</label>
                        <select name="jenis" id="jenis"
                            class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                            <option value="" selected>Jenis Transaksi</option>
                            <option value="pemasukan">Pemasukan</option>
                            <option value="pengeluaran">Pengeluaran</option>
                        </select>
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700">Tanggal</label>
                        <input type="date" name="tanggal" class="mt-1 p-2 w-full border rounded-md">
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700">Bukti Transaksi</label>
                        <input type="file" name="bukti_transaksi" class="mt-1 p-2 w-full border rounded-md">
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700">Jumlah</label>
                        <input type="number" name="jumlah" class="mt-1 p-2 w-full border rounded-md">
                    </div>

                    <div class="text-center">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Tambah
                            Transaksi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
