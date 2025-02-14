@extends('component.admin-layout')

@section('title', 'Edit Profil UKM')

@section('content')
    <div class="bg-gray-100 min-h-screen py-10">
        <div class="container mx-auto">
            <div class="max-w-3xl mx-auto bg-white p-8 shadow-lg rounded-lg">
                <h2 class="text-2xl font-bold mb-6 text-center">Edit Profil UKM</h2>
                <form action="{{ route('adminUkm.store', $ukm->id) }}" method="POST" enctype="multipart/form-data"
                    class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block font-medium text-gray-700">Logo UKM</label>
                        <input type="file" name="logo" class="mt-1 p-2 w-full border rounded-md">
                        @if ($ukm->logo)
                            <img src="{{ asset('storage/' . $ukm->logo) }}" class="mt-2 w-20 h-20 rounded">
                        @endif
                    </div>


                    <div>
                        <label class="block font-medium text-gray-700">Deskripsi</label>
                        <textarea name="deskripsi" class="mt-1 p-2 w-full border rounded-md">{{ old('deskripsi', $ukm->deskripsi) }}</textarea>
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700">Sejarah</label>
                        <textarea name="sejarah" class="mt-1 p-2 w-full border rounded-md">{{ old('sejarah', $ukm->sejarah) }}</textarea>
                    </div>


                    <div>
                        <label class="block font-medium text-gray-700">Visi</label>
                        <textarea name="visi" class="mt-1 p-2 w-full border rounded-md">{{ old('visi', $ukm->visi) }}</textarea>
                    </div>


                    <div>
                        <label class="block font-medium text-gray-700">Misi</label>
                        <textarea name="misi" class="mt-1 p-2 w-full border rounded-md">{{ old('misi', $ukm->misi) }}</textarea>
                    </div>


                    <div>
                        <label class="block font-medium text-gray-700">Struktur Organisasi</label>
                        <input type="file" name="struktur_organisasi" class="mt-1 p-2 w-full border rounded-md">
                        @if ($ukm->struktur_organisasi)
                            <img src="{{ asset('storage/' . $ukm->struktur_organisasi) }}" class="mt-2 w-32 h-32 rounded">
                        @endif
                    </div>


                    <div>
                        <label class="block font-medium text-gray-700">Media Sosial</label>
                        <input type="text" name="media_sosial[facebook]" placeholder="Facebook"
                            value="{{ old('media_sosial.facebook', $ukm->media_sosial['facebook'] ?? '') }}"
                            class="mt-1 p-2 w-full border rounded-md">
                        <input type="text" name="media_sosial[instagram]" placeholder="Instagram"
                            value="{{ old('media_sosial.instagram', $ukm->media_sosial['instagram'] ?? '') }}"
                            class="mt-1 p-2 w-full border rounded-md">
                        <input type="text" name="media_sosial[twitter]" placeholder="Twitter"
                            value="{{ old('media_sosial.twitter', $ukm->media_sosial['twitter'] ?? '') }}"
                            class="mt-1 p-2 w-full border rounded-md">
                        <input type="text" name="media_sosial[tiktok]" placeholder="Tiktok"
                            value="{{ old('media_sosial.tiktok', $ukm->media_sosial['tiktok'] ?? '') }}"
                            class="mt-1 p-2 w-full border rounded-md">
                    </div>


                    <div class="text-center">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Simpan
                            Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
