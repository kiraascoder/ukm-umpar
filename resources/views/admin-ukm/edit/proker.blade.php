@extends('component.admin-layout')

@section('title', 'Edit Program Kerja UKM')

@section('content')
    <div class="bg-gray-100 min-h-screen py-10">
        <div class="container mx-auto">
            <div class="max-w-3xl mx-auto bg-white p-8 shadow-lg rounded-lg">
                <h2 class="text-2xl font-bold mb-6 text-center">Tambah proker</h2>
                <form action="{{ route('adminUkmEditProker.edit', $proker->id) }}" method="POST" enctype="multipart/form-data"
                    class="space-y-4">
                    @csrf
                    @method('PUT')
                    <div>
                        <label class="block font-medium text-gray-700">Judul Program Kerja</label>
                        <input type="text" name="nama" class="mt-1 p-2 w-full border rounded-md"
                            value="{{ $proker->nama }}">
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700">Bidang Program Kerja</label>
                        <input type="text" name="bidang" class="mt-1 p-2 w-full border rounded-md"
                            value="{{ $proker->bidang }}">
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700">Deskripsi</label>
                        <textarea name="deskripsi" rows="4" class="mt-1 p-2 w-full border rounded-md">{{ $proker->deskripsi }}</textarea>
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700">Status</label>
                        <select name="status" id="status"
                            class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                            <option value="selesai" {{ $proker->status == 'selesai' ? 'selected' : '' }}>
                                Selesai</option>
                            <option value="belum selesai" {{ $proker->status == 'belum selesai' ? 'selected' : '' }}>
                                Belum Selesai</option>
                        </select>
                    </div>


                    <div class="text-center flex justify-center space-x-4 mt-4">
                        <a href="{{ route('adminUkmDetailProker', $proker->id) }}"
                            class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-700">
                            Back
                        </a>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">
                            Edit proker
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
