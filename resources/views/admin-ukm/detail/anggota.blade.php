@extends('component.admin-layout')

@section('title', 'Edit anggota UKM')

@section('content')
    <div class="p-6 space-y-6">
        <div class="flex items-center justify-between gap-2">
            <h1 class="text-2xl text-gray-800">Profil Anggota</h1>
            <div class="flex gap-2">
                <a href="{{route('adminUkmAnggota')}}"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md shadow">
                    Kembali
                </a>
            </div>
        </div>
        @if (session('success'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" x-transition
                class="mb-4 px-4 py-3 rounded-lg bg-green-100 border border-green-300 text-green-800 shadow-md"
                role="alert">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span><strong>Sukses!</strong> {{ session('success') }}</span>
                </div>
            </div>
        @endif
        <div class="bg-white rounded-2xl shadow p-6 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <div>
                    <img src="{{ $anggota->foto ? asset('storage/' . $anggota->foto) : asset('img/person.jpg') }}"
                        class="w-20 h-20 rounded-full object-cover" alt="Profile Photo" id="profileImage" />
                    <p class="text-xs text-gray-500 mt-2 text-center cursor-pointer" id="previewButton">Preview</p>
                </div>
                <div>
                    <h2 class="text-xl font-semibold text-gray-800">{{ $anggota->nama }}</h2>
                    <p class="text-sm text-gray-500">{{ $anggota->jabatan }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-2xl shadow p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-700">Informasi Pribadi</h3>
                <a href="{{ route('adminUkmEditAnggota', ['id' => $anggota->id]) }}"
                    class="px-4 py-1 border rounded-full text-sm text-gray-600 hover:bg-gray-100 inline-flex items-center">
                    <i class="fas fa-pen mr-1"></i>Edit
                </a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-700">
                <div><strong>First Name</strong>
                    <div>{{ $anggota->nama }}</div>
                </div>
                <div><strong>Tempat, Tanggal Lahir</strong>
                    <div>{{ $anggota->tempat_lahir }}, {{ $anggota->tanggal_lahir }}</div>
                </div>
                <div><strong>Jenis Kelamin</strong>
                    <div>{{ $anggota->jenis_kelamin }}</div>
                </div>
                <div><strong>Jurusan</strong>
                    <div class="capitalize">{{ $anggota->jurusan }}</div>
                </div>
                <div><strong>Fakultas</strong>
                    <div class="capitalize">{{ $anggota->fakultas }}</div>
                </div>
                <div><strong>Angkatan</strong>
                    <div class="capitalize">{{ $anggota->angkatan }}</div>
                </div>
            </div>
        </div>
    </div>

    <div id="imagePreviewModal"
        class="hidden fixed inset-0 mx-auto flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white p-4 rounded w-96">
            <div class="relative">
                <button id="closePreviewButton" class="absolute top-0 right-0 text-xl text-gray-500 hover:text-gray-700">
                    &times;
                </button>
                <img id="fullSizeImage" class="w-full h-auto rounded" src="" alt="Full-size Profile Image" />
            </div>
        </div>
    </div>

    <script>
        const previewButton = document.getElementById('previewButton');
        const imagePreviewModal = document.getElementById('imagePreviewModal');
        const fullSizeImage = document.getElementById('fullSizeImage');
        const closePreviewButton = document.getElementById('closePreviewButton');
        previewButton.addEventListener('click', function() {

            const profileImageSrc = document.getElementById('profileImage').src;
            fullSizeImage.src = profileImageSrc;
            imagePreviewModal.classList.remove('hidden');
        });
        closePreviewButton.addEventListener('click', function() {
            imagePreviewModal.classList.add('hidden');
        });
    </script>
@endsection
