@extends('component.admin-layout')

@section('title', 'Profil UKM')

@section('content')
    <div class=" bg-gray-100 p-6 space-y-6">
        <div class="flex items-center justify-between gap-2">
            <h1 class="text-2xl text-gray-800">Profil UKM</h1>
            <div class="flex gap-2">
                <a href="{{ route('adminUkmEditProfile', $ukm->id) }}"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md shadow">
                    Edit UKM
                </a>
            </div>
        </div>
        <div class="bg-white rounded-2xl shadow p-6 flex items-center gap-6">
            <div class="relative text-center">
                <img src="{{ $ukm->logo ? asset('storage/' . $ukm->logo) : asset('img/person.jpg') }}"
                    class="w-24 h-24 rounded-full object-cover border border-gray-300 shadow-sm" alt="Profile Photo"
                    id="profileImage" />
                <p class="text-xs text-blue-500 hover:underline mt-2 cursor-pointer" id="previewButton">
                    Lihat Logo
                </p>
            </div>
            <div>
                <h2 class="text-xl font-semibold text-gray-800">UKM {{ $ukm->nama }}</h2>
                <p class="text-sm text-gray-500 mt-1">Informasi lengkap organisasi UKM Anda</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white rounded-2xl shadow p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-800">Deskripsi</h3>

                </div>
                <div>
                    <div class="text-sm text-gray-700">{{ $ukm->deskripsi }}</div>
                </div>
            </div>
            <div class="bg-white rounded-2xl shadow p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-800">Sejarah</h3>
                </div>
                <div>
                    <div class="text-sm text-gray-700">{{ $ukm->sejarah }}</div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-2xl shadow p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Visi & Misi</h3>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm text-gray-700">
                <div>
                    <span class="font-medium">Visi:</span>
                    <div>{{ $ukm->visi }}</div>
                </div>
                <div>
                    <span class="font-medium">Misi:</span>
                    {{-- <div>{{ $ukm->misi }}</div> --}}
                </div>
            </div>
        </div>
        <div class="bg-white rounded-2xl shadow p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Media Sosial</h3>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-700">
                <div>
                    <span class="font-medium">Instagram:</span>
                    <div>{{ $ukm->media_sosial['instagram'] }}</div>
                </div>
                <div>
                    <span class="font-medium">Facebook:</span>
                    <div>{{ $ukm->media_sosial['facebook'] }}</div>
                </div>
                <div>
                    <span class="font-medium">X:</span>
                    <div>{{ $ukm->media_sosial['twitter'] }}</div>
                </div>
                <div>
                    <span class="font-medium">TikTok:</span>
                    <div>{{ $ukm->media_sosial['tiktok'] }}</div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-2xl shadow p-6">
            <div class="flex items-center mb-4 justify-center">
                <h3 class="text-lg font-semibold text-gray-800">Struktur Organisasi</h3>
            </div>

            @if ($ukm->struktur_organisasi)
                <div class="flex justify-center">
                    <img src="{{ asset('storage/' . $ukm->struktur_organisasi) }}" class="w-[800px] h-auto rounded shadow">
                </div>
            @else
                <p class="text-center text-gray-500">Belum ada gambar struktur organisasi.</p>
            @endif
        </div>
        <div class="bg-white rounded-2xl shadow p-6">
            <div class="flex items-center mb-4 justify-center">
                <h3 class="text-lg font-semibold text-gray-800">Foto Pengurus</h3>
            </div>

            @if ($ukm->foto_pengurus)
                <div class="flex justify-center">
                    <img src="{{ asset('storage/' . $ukm->foto_pengurus) }}" class="w-[800px] h-auto rounded shadow">
                </div>
            @else
                <p class="text-center text-gray-500">Belum ada gambar struktur organisasi.</p>
            @endif
        </div>
    </div>
    <div id="imagePreviewModal"
        class="fixed inset-0 hidden items-center justify-center bg-black bg-opacity-60 z-50 transition duration-200">
        <div class="bg-white rounded-lg shadow-lg p-6 max-w-md w-full relative">
            <button id="closePreviewButton"
                class="absolute top-2 right-3 text-2xl font-bold text-gray-500 hover:text-gray-800">
                &times;
            </button>
            <img id="fullSizeImage" class="w-full h-auto rounded" src="" alt="Preview Gambar Profil" />
        </div>
    </div>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <script>
        const previewButton = document.getElementById('previewButton');
        const imagePreviewModal = document.getElementById('imagePreviewModal');
        const fullSizeImage = document.getElementById('fullSizeImage');
        const closePreviewButton = document.getElementById('closePreviewButton');

        previewButton.addEventListener('click', () => {
            const profileImageSrc = document.getElementById('profileImage').src;
            fullSizeImage.src = profileImageSrc;
            imagePreviewModal.classList.remove('hidden');
            imagePreviewModal.classList.add('flex');
        });

        closePreviewButton.addEventListener('click', () => {
            imagePreviewModal.classList.add('hidden');
            imagePreviewModal.classList.remove('flex');
        });
    </script>
@endsection
