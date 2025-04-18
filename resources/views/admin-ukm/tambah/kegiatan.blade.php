@extends('component.admin-layout')

@section('title', 'Tambah Kegiatan UKM')

@section('content')
    <div class="bg-gray-100 min-h-screen py-10">
        <div class="container mx-auto">
            <div class="max-w-3xl mx-auto bg-white p-8 shadow-lg rounded-lg">
                <h2 class="text-2xl font-bold mb-6 text-center">Tambah Kegiatan</h2>
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <strong>Terjadi kesalahan!</strong> Periksa kembali inputan Anda.
                    </div>
                @endif
                <form action="{{ route('adminUkmTambahKegiatan.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-4">
                    @csrf
                    <div>
                        <label class="block font-medium text-gray-700">Nama Kegiatan</label>
                        <input type="text" name="nama" class="mt-1 p-2 w-full border rounded-md">
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700">Deskripsi Kegiatan</label>
                        <textarea name="deskripsi" rows="4" class="mt-1 p-2 w-full border rounded-md">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700">Tanggal Kegiatan</label>
                        <input type="date" name="tanggal" class="mt-1 p-2 w-full border rounded-md">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Tambah
                            Kegiatan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
