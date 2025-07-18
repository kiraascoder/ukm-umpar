@extends('component.admin-layout')

@section('title', 'Edit Kegiatan UKM')

@section('content')
    <div class="bg-gray-100 min-h-screen py-10">
        <div class="container mx-auto">
            <div class="max-w-3xl mx-auto bg-white p-8 shadow-lg rounded-lg">
                <h2 class="text-2xl font-bold mb-6 text-center">Edit Kegiatan</h2>

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <strong>Terjadi kesalahan!</strong> Periksa kembali inputan Anda.
                    </div>
                @endif

                <form action="{{ route('adminUkmEditKegiatan.update', $kegiatan->id) }}" method="POST"
                    enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block font-medium text-gray-700">Nama Kegiatan</label>
                        <input type="text" name="nama" value="{{ old('nama', $kegiatan->nama) }}"
                            class="mt-1 p-2 w-full border rounded-md @error('nama') border-red-500 @enderror">
                        @error('nama')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700">Deskripsi Kegiatan</label>
                        <textarea name="deskripsi" rows="4" id="myeditorinstance"
                            class="mt-1 p-2 w-full border rounded-md @error('deskripsi') border-red-500 @enderror">{{ old('deskripsi', $kegiatan->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700">Font untuk Deskripsi</label>
                        <select name="font_deskripsi"
                            class="mt-1 p-2 w-full border rounded-md @error('font_deskripsi') border-red-500 @enderror">
                            <option value="font-sans"
                                {{ old('font_deskripsi', $kegiatan->font_deskripsi) == 'font-sans' ? 'selected' : '' }}>Sans
                                Serif</option>
                            <option value="font-serif"
                                {{ old('font_deskripsi', $kegiatan->font_deskripsi) == 'font-serif' ? 'selected' : '' }}>
                                Serif</option>
                            <option value="font-mono"
                                {{ old('font_deskripsi', $kegiatan->font_deskripsi) == 'font-mono' ? 'selected' : '' }}>
                                Monospace</option>
                            <option value="font-display"
                                {{ old('font_deskripsi', $kegiatan->font_deskripsi) == 'font-display' ? 'selected' : '' }}>
                                Display</option>
                            <option value="font-cursive"
                                {{ old('font_deskripsi', $kegiatan->font_deskripsi) == 'font-cursive' ? 'selected' : '' }}>
                                Cursive</option>
                        </select>
                        @error('font_deskripsi')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700">Tanggal Kegiatan</label>
                        <input type="date" name="tanggal"
                            value="{{ old('tanggal', \Carbon\Carbon::parse($kegiatan->tanggal)->format('Y-m-d')) }}"
                            class="mt-1 p-2 w-full border rounded-md @error('tanggal') border-red-500 @enderror">
                        @error('tanggal')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700">Link Dokumentasi YouTube/Tiktok</label>
                        <input type="text" name="link_dokumentasi"
                            value="{{ old('link_dokumentasi', $kegiatan->link_dokumentasi) }}"
                            class="mt-1 p-2 w-full border rounded-md @error('link_dokumentasi') border-red-500 @enderror">
                        @error('link_dokumentasi')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
