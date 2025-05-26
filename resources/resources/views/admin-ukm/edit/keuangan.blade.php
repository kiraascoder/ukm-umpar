@extends('component.admin-layout')

@section('title', 'Edit Transaksi Keuangan')

@section('content')
    <div class="min-h-screen py-10 bg-gray-100">
        <div class="container mx-auto">
            <div
                class="max-w-3xl mx-auto bg-white p-8 rounded-xl shadow-md transition duration-300 ease-in-out transform hover:shadow-xl">
                <h2 class="text-3xl font-semibold text-center text-gray-800 mb-8">Edit Transaksi Keuangan</h2>
                <form action="{{ route('adminUkmKeuangan.edit', $keuangan->id) }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Keterangan</label>
                        <input type="text" name="keterangan"
                            class="w-full px-4 py-2 border rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none transition duration-300 ease-in-out"
                            value="{{ old('keterangan', $keuangan->keterangan) }}">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Jenis Transaksi</label>
                        <select name="jenis" id="jenis"
                            class="w-full px-4 py-2 border rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none transition duration-300 ease-in-out"
                            required>
                            <option value="" disabled
                                {{ old('jenis', $keuangan->jenis ?? '') == '' ? 'selected' : '' }}>Pilih Jenis Transaksi
                            </option>
                            <option value="pemasukan" {{ old('jenis', $keuangan->jenis) == 'pemasukan' ? 'selected' : '' }}>
                                Pemasukan</option>
                            <option value="pengeluaran"
                                {{ old('jenis', $keuangan->jenis) == 'pengeluaran' ? 'selected' : '' }}>Pengeluaran</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Tanggal</label>
                        <input type="date" name="tanggal"
                            class="w-full px-4 py-2 border rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none transition duration-300 ease-in-out"
                            value="{{ $keuangan->tanggal }}">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Bukti Transaksi</label>
                        <input type="file" name="bukti_transaksi"
                            class="w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none transition duration-300 ease-in-out">
                        @if (!empty($keuangan->bukti_transaksi))
                            <p class="text-sm text-gray-600 mt-2">
                                File saat ini:
                                <a href="{{ asset('storage/' . $keuangan->bukti_transaksi) }}" target="_blank"
                                    class="text-blue-500 hover:underline transition">Lihat Transaksi</a>
                            </p>
                        @endif
                        @error('bukti_transaksi')
                            <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Jumlah</label>
                        <input type="number" name="jumlah"
                            class="w-full px-4 py-2 border rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none transition duration-300 ease-in-out"
                            value="{{ $keuangan->jumlah }}">
                    </div>

                    <div class="flex justify-center gap-4 pt-6">
                        <a href="{{ route('adminUkmKeuangan') }}"
                            class="bg-gray-400 hover:bg-gray-500 text-white font-medium px-5 py-2 rounded-lg transition-all duration-300 ease-in-out transform hover:scale-105">
                            Kembali
                        </a>
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg shadow transition-all duration-300 ease-in-out transform hover:scale-105">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
