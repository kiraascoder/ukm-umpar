@extends('component.admin-layout')

@section('title', 'Galeri UKM')

@section('content')
    <div x-data="{ openModal: null, selectedNama: '', deleteUrl: '' }" class="bg-gray-100 min-h-screen p-6">
        <h1 class="text-2xl text-gray-800 mb-6">Galeri UKM</h1>
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif
        <div class="lg:col-span-3 w-full bg-white p-6 rounded-2xl shadow overflow-auto">
            <div class="flex items-center justify-between mb-4">
                @if ($gallery->count() < 30)
                    <form action="{{ route('adminUkmTambahGaleri.store') }}" method="POST" enctype="multipart/form-data"
                        class="space-y-4 w-full" onsubmit="return validateFileSize()">
                        @csrf
                        <div>
                            <label for="image" class="block text-sm font-medium text-gray-700">Upload Gambar</label>
                            <input type="file" name="photos[]" id="image" accept="image/*" multiple
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">

                            @error('photo_path')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                            <span id="error-message" class="text-sm text-red-500 hidden">File terlalu besar. Maksimal
                                2MB.</span>
                        </div>
                        <button type="submit"
                            class="inline-flex items-center gap-2 px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-md shadow">
                            Tambah Dokumentasi
                        </button>
                    </form>
                @else
                    <p class="mt-4 text-sm text-red-500">Maksimal 10 dokumentasi telah diunggah.</p>
                @endif
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-6">

                @forelse ($gallery as $galeri)
                    <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="relative overflow-hidden group">
                            <img src="{{ asset('storage/' . $galeri->photo_path) }}"
                                class="w-full h-64 object-cover transition-all duration-500 group-hover:scale-105">
                            <div class="absolute top-2 right-2">
                                <button
                                    @click="openModal = true; selectedNama = '{{ $galeri->nama ?? 'Foto' }}'; deleteUrl = '{{ route('adminUkmDeleteGaleri.delete', $galeri->id) }}';"
                                    class="bg-red-500 text-white rounded-full p-1 hover:bg-red-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 text-sm col-span-3">Belum ada dokumentasi.</p>
                @endforelse
            </div>
        </div>


        <div x-cloak x-show="openModal" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90"
            class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
            <div class="bg-white p-6 rounded-xl shadow-xl w-96">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Konfirmasi Hapus</h2>
                <p class="text-sm text-gray-600 mb-6">
                    Yakin ingin menghapus dokumentasi <strong x-text="selectedNama"></strong>?
                </p>
                <div class="flex justify-end gap-4">
                    <button @click="openModal = null" class="px-4 py-2 text-sm bg-gray-200 hover:bg-gray-300 rounded">
                        Batal
                    </button>
                    <form :action="deleteUrl" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm rounded">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function validateFileSize() {
            const fileInput = document.getElementById('image');
            const errorMessage = document.getElementById('error-message');

            if (fileInput.files.length > 0) {
                const fileSize = fileInput.files[0].size / 1024 / 1024; // in MB
                if (fileSize > 10) {
                    errorMessage.classList.remove('hidden');
                    return false;
                }
            }
            errorMessage.classList.add('hidden');
            return true;
        }
    </script>
@endsection
