@extends('component.admin-layout')

@section('title', 'Edit Kegiatan UKM')

@section('content')
    <div class="bg-gray-100 min-h-screen py-10">
        <div class="container mx-auto">
            <div class="max-w-3xl mx-auto bg-white p-8 shadow-lg rounded-lg">
                <h2 class="text-2xl font-bold mb-6 text-center">Edit Kegiatan</h2>
                <form action="{{ route('adminUkmEditKegiatan.edit', $kegiatan->id) }}" method="POST"
                    enctype="multipart/form-data" class="space-y-4">
                    @csrf
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
