@extends('component.admin-layout')

@section('title', 'Tambah Program Kerja UKM')

@section('content')
    <div class="bg-gray-100 min-h-screen py-10">
        <div class="container mx-auto">
            <div class="max-w-3xl mx-auto bg-white p-8 shadow-lg rounded-lg">
                <h2 class="text-2xl font-bold mb-6 text-center">Tambah Program Kerja UKM</h2>


                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <strong>Terjadi kesalahan!</strong> Periksa kembali inputan Anda.
                    </div>
                @endif

                <form action="{{ route('adminUkmTambahProker.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-4">
                    @csrf
                    <div>
                        <label class="block font-medium text-gray-700">Judul Program Kerja</label>
                        <input type="text" name="nama" value="{{ old('nama') }}"
                            class="mt-1 p-2 w-full border rounded-md @error('nama') border-red-500 @enderror">
                        @error('nama')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700">Bidang Program Kerja</label>
                        <input type="text" name="bidang" value="{{ old('bidang') }}"
                            class="mt-1 p-2 w-full border rounded-md @error('bidang') border-red-500 @enderror">
                        @error('bidang')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700">Deskripsi Program Kerja</label>
                        <textarea name="deskripsi" rows="4"
                            class="mt-1 p-2 w-full border rounded-md @error('deskripsi') border-red-500 @enderror">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700">Status</label>
                        <select name="status" id="status"
                            class="mt-2 w-full px-4 py-2 border  rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('status') border-red-500 @enderror">
                            <option value="" selected>-- Pilih Status --</option>
                            <option value="selesai" {{ old('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            <option value="belum selesai" {{ old('status') == 'belum selesai' ? 'selected' : '' }}>Belum
                                Selesai</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Tambah
                            Program Kerja</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
