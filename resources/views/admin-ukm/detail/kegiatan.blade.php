@extends('component.admin-layout')

@section('title', 'Detail Kegiatan')

@section('content')
    <div class="bg-gray-100 min-h-screen py-10">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold mb-6">Detail Kegiatan</h2>

            <div class="mb-4">
                <p class="text-lg font-semibold">{{ $kegiatan->nama }}</p>
                <p class="text-gray-700">{{ $kegiatan->tanggal }}</p>
                <p class="text-gray-700">{{ $kegiatan->deskripsi }}</p>
            </div>

            @if ($kegiatanDokumentasi->count() > 0)
                @foreach ($kegiatanDokumentasi as $dokumentasi)
                    <div class="mt-4">
                        <img src="{{ asset('storage/' . $dokumentasi->photo_path) }}"
                            class="w-full max-w-3xl rounded-lg shadow-md" alt="Dokumentasi kegiatan">
                    </div>
                @endforeach
            @else
                <p class="text-gray-500 mt-4">Belum ada dokumentasi.</p>
            @endif


            <div class="bg-white p-8 shadow-lg rounded-lg">
                <h2 class="text-2xl font-bold mb-6">Tambah Dokumentasi</h2>

                @if (session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <strong>{{ session('error') }}</strong>
                    </div>
                @endif

                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        <strong>{{ session('success') }}</strong>
                    </div>
                @endif

                <form action="{{ route('adminUkmTambahDokumentasi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="kegiatan_id" value="{{ $kegiatan->id }}">

                    <div class="mb-4">
                        <label class="block font-medium text-gray-700">Upload Dokumentasi</label>
                        <input type="file" name="photo_path" class="mt-1 p-2 w-full border rounded-md">
                    </div>

                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">
                        Tambah Dokumentasi
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
