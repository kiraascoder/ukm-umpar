@extends('component.admin-layout')

@section('title', 'Edit Profil UKM')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <div class="min-h-screen flex items-center justify-center bg-gray-100 animate__animated animate__fadeIn px-4">
        <div class="w-full max-w-6xl bg-white rounded-lg shadow-lg p-8">
            <h2 class="text-3xl mb-8 text-center text-[#07074D] font-semibold">Edit Profil UKM</h2>
            @if ($errors->any())
                <div class="mb-6">
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <form action="{{ route('adminUkm.store', $ukm->id) }}" method="POST" enctype="multipart/form-data"
                class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @csrf
                @method('PUT')

                <div class="space-y-4">

                    <div>
                        <label class="block text-sm font-medium text-[#07074D]">Logo UKM</label>
                        <input type="file" name="logo"
                            class="mt-1 w-full p-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#6A64F1]">
                        @error('logo')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-[#07074D]">Nama UKM</label>
                        <input type="text" name="nama"
                            class="mt-1 w-full p-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#6A64F1]"
                            value="{{ old('nama', $ukm->nama) }}">
                        @error('nama')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>


                    <div>
                        <label class="block text-sm font-medium text-[#07074D]">Struktur Organisasi</label>
                        <input type="file" name="struktur_organisasi"
                            class="mt-1 w-full p-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#6A64F1]">
                        @error('struktur_organisasi')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>


                    <div>
                        <label class="block text-sm font-medium text-[#07074D]">Foto Pengurus</label>
                        <input type="file" name="foto_pengurus"
                            class="mt-1 w-full p-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#6A64F1]">
                        @error('foto_pengurus')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>


                    <div>
                        <label class="block text-sm font-medium text-[#07074D]">Deskripsi</label>
                        <textarea name="deskripsi"
                            class="mt-1 p-2 w-full border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#6A64F1]">{{ old('deskripsi', $ukm->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>


                    <div>
                        <label class="block text-sm font-medium text-[#07074D]">Visi</label>
                        <textarea name="visi"
                            class="mt-1 p-2 w-full border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#6A64F1]">{{ old('visi', $ukm->visi) }}</textarea>
                        @error('visi')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="space-y-4">

                    <div>
                        <label class="block text-sm font-medium text-[#07074D]">Sejarah</label>
                        <textarea name="sejarah"
                            class="mt-1 p-2 w-full border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#6A64F1]">{{ old('sejarah', $ukm->sejarah) }}</textarea>
                        @error('sejarah')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>


                    <div>
                        <label class="block text-sm font-medium text-[#07074D]">Misi</label>
                        <textarea name="misi" rows="6"
                            class="mt-1 p-2 w-full border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#6A64F1]">{{ old('misi', $ukm->misi) }}</textarea>
                        <p class="mt-1 text-sm text-gray-500">
                            *Tuliskan misi secara berurutan menggunakan format angka. Contoh:<br>
                            1. Mencerdaskan UKM<br>
                            2. Mencerdaskan Fisik dan Mental<br>
                            3. Menjadi UKM yang Hebat
                        </p>
                        @error('misi')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-[#07074D]">Facebook</label>
                            <input type="text" name="media_sosial[facebook]"
                                value="{{ old('media_sosial.facebook', $ukm->media_sosial['facebook'] ?? '') }}"
                                class="mt-1 w-full p-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#6A64F1]">
                            @error('media_sosial.facebook')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-[#07074D]">Instagram</label>
                            <input type="text" name="media_sosial[instagram]"
                                value="{{ old('media_sosial.instagram', $ukm->media_sosial['instagram'] ?? '') }}"
                                class="mt-1 w-full p-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#6A64F1]">
                            @error('media_sosial.instagram')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-[#07074D]">YouTube</label>
                            <input type="text" name="media_sosial[youtube]"
                                value="{{ old('media_sosial.youtube', $ukm->media_sosial['youtube'] ?? '') }}"
                                class="mt-1 w-full p-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#6A64F1]">
                            @error('media_sosial.youtube')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-[#07074D]">TikTok</label>
                            <input type="text" name="media_sosial[tiktok]"
                                value="{{ old('media_sosial.tiktok', $ukm->media_sosial['tiktok'] ?? '') }}"
                                class="mt-1 w-full p-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#6A64F1]">
                            @error('media_sosial.tiktok')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-span-2 text-center mt-8">
                    <button type="submit"
                        class="bg-[#6A64F1] hover:bg-[#5a54e0] text-white font-semibold py-2 px-8 rounded-md transition duration-300">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
