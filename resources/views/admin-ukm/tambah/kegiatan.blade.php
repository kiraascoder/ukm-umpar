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
                        <input type="text" name="nama" value="{{ old('nama') }}"
                            class="mt-1 p-2 w-full border rounded-md @error('nama') border-red-500 @enderror">
                        @error('nama')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700">Deskripsi Kegiatan</label>
                        <textarea name="deskripsi" rows="4" id="myeditorinstance"
                            class="mt-1 p-2 w-full border rounded-md @error('deskripsi') border-red-500 @enderror">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <select name="font_deskripsi"
                        class="mt-1 p-2 w-full border rounded-md @error('font_deskripsi') border-red-500 @enderror">
                        <option value="sans" {{ old('font_deskripsi') == 'sans' ? 'selected' : '' }}>Sans Serif (Figtree)
                        </option>
                        <option value="serif" {{ old('font_deskripsi') == 'serif' ? 'selected' : '' }}>Serif (Merriweather)
                        </option>
                        <option value="mono" {{ old('font_deskripsi') == 'mono' ? 'selected' : '' }}>Monospace (Fira Code)
                        </option>
                        <option value="cursive" {{ old('font_deskripsi') == 'cursive' ? 'selected' : '' }}>Cursive (Comic
                            Sans MS)</option>
                        <option value="display" {{ old('font_deskripsi') == 'display' ? 'selected' : '' }}>Display (Oswald)
                        </option>
                        <option value="body" {{ old('font_deskripsi') == 'body' ? 'selected' : '' }}>Body (Open Sans)
                        </option>
                    </select>
                    <div>
                        <label class="block font-medium text-gray-700">Tanggal Kegiatan</label>
                        <input type="date" name="tanggal" value="{{ old('tanggal') }}"
                            class="mt-1 p-2 w-full border rounded-md @error('tanggal') border-red-500 @enderror">
                        @error('tanggal')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700">Upload Foto Sampul Kegiatan</label>
                        <input type="file" name="foto_sampul"
                            class="mt-1 p-2 w-full border rounded-md @error('foto_sampul') border-red-500 @enderror">
                        @error('foto_sampul')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700">Link Dokumentasi YouTube/Tiktok</label>
                        <input type="text" name="link_dokumentasi" value="{{ old('link_dokumentasi') }}"
                            class="mt-1 p-2 w-full border rounded-md @error('nama') border-red-500 @enderror">
                        @error('link_dokumentasi')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
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
