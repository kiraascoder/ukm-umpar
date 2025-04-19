@extends('component.admin-layout')

@section('title', 'Edit Kegiatan UKM')

@section('content')
    <div class="bg-gray-100 min-h-screen py-10">
        <div class="container mx-auto">
            <div class="max-w-3xl mx-auto bg-white p-8 shadow-lg rounded-lg">
                <h2 class="text-2xl font-bold mb-6 text-center">Edit Kegiatan</h2>
                <form action="{{ route('adminUkmEditKegiatan.update', $kegiatan->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div>
                        <label class="block font-medium text-gray-700">Nama Kegiatan</label>
                        <input type="text" name="nama" class="mt-1 p-2 w-full border rounded-md"
                            value="{{ $kegiatan->nama }}">
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700">Deskripsi Kegiatan</label>
                        <textarea name="deskripsi" rows="4" class="mt-1 p-2 w-full border rounded-md">{{ $kegiatan->deskripsi }}</textarea>
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700">Tanggal Kegiatan</label>
                        <input type="date" name="tanggal" class="mt-1 p-2 w-full border rounded-md"
                            value="{{ $kegiatan->tanggal }}">
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700">Link Dokumentasi YouTube/Tiktok</label>
                        <input type="text" name="link_dokumentasi"
                            class="mt-1 p-2 w-full border rounded-md @error('link_dokumentasi') border-red-500 @enderror mb-4"
                            value="{{ old('link_dokumentasi', $kegiatan->link_dokumentasi) }}">
                        @error('link_dokumentasi')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="text-center">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Edit
                            Kegiatan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
