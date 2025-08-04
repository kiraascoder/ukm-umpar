@extends('component.admin-layout')

@section('title', 'Profil UKM')

@section('content')
    <div class=" bg-gray-100 p-6 space-y-6">
        <div class="flex items-center justify-between gap-2">
            <h1 class="text-2xl text-gray-800">Profil</h1>
            <div class="flex gap-2">
                <a href="{{ route('adminUkmEditProfile', $ukm->id) }}"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md shadow">
                    Edit UKM
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
                <p class="text-sm text-gray-500 mt-1">No Hp : {{ $user->phone }}</p>
                <p class="text-sm text-gray-500 mt-1">Email : {{ $user->email }}</p>
                <div class="flex gap-2 mt-3">
                    <button onclick="toggleModal('modalNoHP')"
                        class="px-3 py-1 text-sm bg-yellow-400 hover:bg-yellow-500 text-white rounded shadow">
                        Ubah No HP
                    </button>
                    <button onclick="toggleModal('modalEmail')"
                        class="px-3 py-1 text-sm bg-blue-500 hover:bg-blue-600 text-white rounded shadow">
                        Ubah Email
                    </button>
                </div>
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
                    <div class="mt-2">
                        {{ $ukm->visi }}
                    </div>
                </div>
                <div>
                    <span class="font-medium">Misi:</span>
                    <div class="mt-2">
                        {!! nl2br(e($ukm->misi)) !!}
                    </div>
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
                    <div>{{ $ukm->media_sosial['instagram'] ?? '-' }}</div>
                </div>
                <div>
                    <span class="font-medium">Facebook:</span>
                    <div>{{ $ukm->media_sosial['facebook'] ?? '-' }}</div>
                </div>
                <div>
                    <span class="font-medium">Youtube:</span>
                    <div>{{ $ukm->media_sosial['youtube'] ?? '-' }}</div>
                </div>
                <div>
                    <span class="font-medium">TikTok:</span>
                    <div>{{ $ukm->media_sosial['tiktok'] ?? '-' }}</div>
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

    <div id="modalNoHP" class="fixed inset-0 hidden items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white p-6 rounded-lg shadow-md max-w-md w-full relative">
            <button onclick="toggleModal('modalNoHP')"
                class="absolute top-2 right-4 text-gray-500 hover:text-gray-800 text-xl">&times;</button>
            <h2 class="text-lg font-semibold mb-4">Ubah Nomor HP</h2>
            <form action="{{ route('adminUkmEditPhone', $ukm->id) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="text" name="phone" class="w-full border-gray-300 rounded-md shadow-sm p-2 mb-4"
                    placeholder="Masukkan No HP baru" value="{{ $user->phone }}" required>
                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <div id="modalEmail" class="fixed inset-0 hidden items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white p-6 rounded-lg shadow-md max-w-md w-full relative">
            <button onclick="toggleModal('modalEmail')"
                class="absolute top-2 right-4 text-gray-500 hover:text-gray-800 text-xl">&times;</button>
            <h2 class="text-lg font-semibold mb-4">Ubah Email</h2>
            <form action="{{ route('adminUkmEditEmail', $ukm->id) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="email" name="email" class="w-full border-gray-300 rounded-md shadow-sm p-2 mb-4"
                    placeholder="Masukkan email baru" value="{{ $user->email }}" required>
                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
                </div>
            </form>
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

        function toggleModal(id) {
            const modal = document.getElementById(id);
            modal.classList.toggle('hidden');
            modal.classList.toggle('flex');
        }
    </script>
@endsection
