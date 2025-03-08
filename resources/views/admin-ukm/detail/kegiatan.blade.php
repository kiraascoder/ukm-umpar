@extends('component.admin-layout')

@section('title', 'Edit Kegiatan UKM')

@section('content')
    <div class="bg-gray-100 min-h-screen py-10">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold mb-6">Detail Kegiatan</h2>

            <div class="mb-4">
                <p class="text-lg font-semibold">{{ $kegiatan->nama }}</p>
                <p class="text-gray-700">{{ $kegiatan->tanggal }}</p>
                <p class="text-gray-700">{{ $kegiatan->deskripsi }}</p>
            </div>

            @if ($kegiatan->dokumentasi)
                <div class="mt-4">
                    <img src="{{ asset('storage/' . $kegiatan->dokumentasi) }}" class="w-full max-w-3xl rounded-lg shadow-md"
                        alt="Dokumentasi Kegiatan">
                </div>
            @endif


            <div class="mt-6 bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4">Upload Foto Dokumentasi</h3>
                <form action="{{ route('kegiatan.uploadDokumentasi', $kegiatan->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium">Pilih Foto (Maksimal 5 Foto)</label>
                        <input type="file" name="photos[]" multiple accept="image/*"
                            class="mt-2 p-2 w-full border rounded-md">
                    </div>

                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                        Upload
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
