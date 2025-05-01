@extends('component.admin-layout')

@section('title', 'Edit Profil UKM')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-100 animate__animated animate__fadeIn">
        <div class="w-full max-w-4xl bg-white rounded-lg shadow-lg p-8">
            <h2 class="text-2xl mb-6 text-center text-[#07074D] animate__animated animate__fadeInDown">Edit Profil
                UKM</h2>
            <form action="{{ route('adminUkm.store', $ukm->id) }}" method="POST" enctype="multipart/form-data"
                class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @csrf
                @method('PUT')
                <div class="col-span-2">
                    <label class="block text-sm font-medium text-[#07074D]">Logo UKM</label>
                    <input type="file" name="logo"
                        class="mt-1 p-2 w-full border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#6A64F1] focus:border-transparent">
                </div>
                <div class="col-span-2">
                    <label class="block text-sm font-medium text-[#07074D]">Deskripsi</label>
                    <textarea name="deskripsi"
                        class="mt-1 p-2 w-full border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#6A64F1] focus:border-transparent">{{ old('deskripsi', $ukm->deskripsi) }}</textarea>
                </div>
                <div class="col-span-2">
                    <label class="block text-sm font-medium text-[#07074D]">Sejarah</label>
                    <textarea name="sejarah"
                        class="mt-1 p-2 w-full border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#6A64F1] focus:border-transparent">{{ old('sejarah', $ukm->sejarah) }}</textarea>
                </div>
                <div class="col-span-2">
                    <label class="block text-sm font-medium text-[#07074D]">Visi</label>
                    <textarea name="visi"
                        class="mt-1 p-2 w-full border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#6A64F1] focus:border-transparent">{{ old('visi', $ukm->visi) }}</textarea>
                </div>
                <div class="col-span-2">
                    <label class="block text-sm font-medium text-[#07074D]">Misi</label>
                    <textarea name="misi[]"
                        class="mt-1 p-2 w-full border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#6A64F1] focus:border-transparent">{{ old('misi', $ukm->misi) }}</textarea>
                </div>
                <div class="col-span-2">
                    <label class="block text-sm font-medium text-[#07074D]">Struktur Organisasi</label>
                    <input type="file" name="struktur_organisasi"
                        class="mt-1 p-2 w-full border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#6A64F1] focus:border-transparent">
                </div>
                <div class="col-span-2">
                    <label class="block text-sm font-medium text-[#07074D]">Foto Pengurus</label>
                    <input type="file" name="foto_pengurus"
                        class="mt-1 p-2 w-full border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#6A64F1] focus:border-transparent">
                </div>
                <div class="col-span-2 grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-[#07074D]">Facebook</label>
                        <input type="text" name="media_sosial[facebook]"
                            value="{{ old('media_sosial.facebook', $ukm->media_sosial['facebook'] ?? '') }}"
                            class="mt-1 p-2 w-full border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#6A64F1] focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-[#07074D]">Instagram</label>
                        <input type="text" name="media_sosial[instagram]"
                            value="{{ old('media_sosial.instagram', $ukm->media_sosial['instagram'] ?? '') }}"
                            class="mt-1 p-2 w-full border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#6A64F1] focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-[#07074D]">Twitter</label>
                        <input type="text" name="media_sosial[twitter]"
                            value="{{ old('media_sosial.twitter', $ukm->media_sosial['twitter'] ?? '') }}"
                            class="mt-1 p-2 w-full border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#6A64F1] focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-[#07074D]">TikTok</label>
                        <input type="text" name="media_sosial[tiktok]"
                            value="{{ old('media_sosial.tiktok', $ukm->media_sosial['tiktok'] ?? '') }}"
                            class="mt-1 p-2 w-full border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#6A64F1] focus:border-transparent">
                    </div>
                </div>
                <div class="col-span-2 text-center mt-6">
                    <button type="submit"
                        class="bg-[#6A64F1] hover:bg-[#5a54e0] text-white font-semibold py-2 px-6 rounded-md transition duration-300">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
