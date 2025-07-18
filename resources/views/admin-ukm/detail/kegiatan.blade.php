@extends('component.admin-layout')

@section('title', 'Detail Kegiatan')

@section('content')
    <div class="bg-gray-100 min-h-screen p-6" x-data="{ 
        openModal: false, 
        selectedNama: '', 
        deleteUrl: '',
        openDeleteModal(url, nama = 'Dokumentasi') {
            this.openModal = true;
            this.selectedNama = nama;
            this.deleteUrl = url;
            console.log('Modal opened:', url, nama); // Debug log
        },
        closeModal() {
            this.openModal = false;
            this.selectedNama = '';
            this.deleteUrl = '';
        }
    }" @keydown.window.escape="closeModal()">
        
        <!-- Header Section -->
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl text-gray-800">Detail Kegiatan UKM</h1>
            <a href="{{ route('adminUkmKegiatan') }}"
                class="inline-block px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md shadow-sm transition duration-200">
                Kembali
            </a>
        </div>
                @if (session('success'))
                <div 
                    x-data="{ show: true }" 
                    x-init="setTimeout(() => show = false, 4000)" 
                    x-show="show"
                    x-transition
                    class="mb-4 px-4 py-3 rounded-lg bg-green-100 border border-green-300 text-green-800 shadow-md"
                    role="alert"
                >
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span><strong>Sukses!</strong> {{ session('success') }}</span>
                    </div>
                </div>
            @endif

        <!-- Activity Details Section -->
        <div class="w-full bg-white p-6 rounded-2xl shadow mb-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-semibold text-gray-700">{{ $kegiatan->nama }}</h2>
                <a href="{{ route('adminUkmEditKegiatan', $kegiatan->id) }}"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md shadow">
                    Edit Kegiatan
                </a>
            </div>
            <p class="text-gray-600 mb-2">
                <span class="font-medium">Tanggal Pelaksanaan:</span> {{ $kegiatan->tanggal }}
            </p>
        </div>

        <!-- Activity Image and Description Section -->
        <div class="w-full bg-white p-6 rounded-2xl shadow mb-6 flex flex-col lg:flex-row gap-6">
            <div class="lg:w-1/3 w-full">
                <img src="{{ asset('storage/' . $kegiatan->foto_sampul) }}" alt="Gambar Kegiatan"
                    class="w-full h-auto rounded-md object-cover shadow-md hover:shadow-xl transition-all duration-300">
            </div>
            <div class="lg:w-2/3 w-full">
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Deskripsi Kegiatan</h3>
                <p class="text-gray-600 leading-relaxed whitespace-pre-line">
                    {!! $kegiatan->deskripsi !!}
                </p>
            </div>
        </div>

        <!-- Documentation Section -->
        <div class="w-full bg-white p-6 rounded-2xl shadow mb-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Dokumentasi Kegiatan</h3>
            <div class="flex flex-wrap justify-start gap-4">
                @forelse ($kegiatanDokumentasi as $dokumentasi)
                    <div class="relative bg-gray-100 rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-all duration-300">
                        <img src="{{ asset('storage/' . $dokumentasi->photo_path) }}" alt="Dokumentasi"
                            class="w-full h-40 object-cover">

                        <!-- Action Buttons -->
                        <div class="absolute top-2 right-2 flex gap-2 z-10">
                            <button type="button"
                                @click="$dispatch('open-edit-modal-{{ $dokumentasi->id }}')"
                                class="bg-yellow-400 hover:bg-yellow-500 text-white px-2 py-1 text-xs rounded shadow transition-colors duration-200 cursor-pointer">
                                Edit
                            </button>
                            <button type="button"
                                @click="openDeleteModal('{{ route('adminUkmDokumentasi.delete', $dokumentasi->id) }}')"
                                class="bg-red-600 hover:bg-red-700 text-white text-xs px-2 py-1 rounded shadow transition-colors duration-200 cursor-pointer">
                                Hapus
                            </button>
                        </div>
                    </div>

                    <!-- Edit Modal for each documentation -->
                    <div x-data="{ open: false }" 
                         @open-edit-modal-{{ $dokumentasi->id }}.window="open = true"
                         @keydown.window.escape="open = false">
                        <div x-show="open" x-cloak
                             class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
                             x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0"
                             x-transition:enter-end="opacity-100"
                             x-transition:leave="transition ease-in duration-200"
                             x-transition:leave-start="opacity-100"
                             x-transition:leave-end="opacity-0">
                            <div class="bg-white p-6 rounded-xl shadow-xl w-96 relative max-w-[90vw] mx-4"
                                 @click.away="open = false">
                                <button type="button"
                                    @click="open = false"
                                    class="absolute top-2 right-2 text-gray-500 hover:text-gray-800 text-xl cursor-pointer">
                                    &times;
                                </button>
                                <h4 class="text-lg font-semibold mb-4">Update Dokumentasi</h4>
                                <form action="{{ route('adminUkmDokumentasi.update', $dokumentasi->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="kegiatan_id" value="{{ $kegiatan->id }}">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Gambar Baru</label>
                                        <input type="file" name="photo_path" accept="image/*"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                    <button type="submit"
                                        class="mt-4 w-full px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md shadow cursor-pointer">
                                        Simpan Perubahan
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-8">
                        <div class="text-6xl text-gray-300 mb-4">📸</div>
                        <p class="text-gray-500 text-lg">Belum ada dokumentasi yang tersedia</p>
                        <p class="text-gray-400 text-sm">Mulai tambahkan dokumentasi kegiatan Anda</p>
                    </div>
                @endforelse
            </div>

            <!-- Upload Form -->
            @if ($kegiatanDokumentasi->count() < 5)
                <form action="{{ route('adminUkmTambahDokumentasi.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-4 mt-6" @submit="return validateFileSize()">
                    @csrf
                    <input type="hidden" name="kegiatan_id" value="{{ $kegiatan->id }}">
                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700">Upload Gambar</label>
                        <input type="file" name="photo_path" id="image" accept="image/*"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <span id="error-message" class="text-sm text-red-500 hidden">File terlalu besar. Maksimal 2MB.</span>
                    </div>
                    <button type="submit"
                        class="inline-flex items-center gap-2 px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-md shadow cursor-pointer">
                        Tambah Dokumentasi
                    </button>
                </form>
            @else
                <p class="mt-4 text-sm text-red-500">Maksimal 5 dokumentasi telah diunggah.</p>
            @endif
        </div>

        <!-- Video Documentation Section -->
        <div class="w-full bg-white p-6 rounded-2xl shadow">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Video Dokumentasi</h3>

            @php
                use Illuminate\Support\Str;
                $link = $kegiatan->link_dokumentasi;
            @endphp

            @if ($link)
                @if (Str::contains($link, 'youtube.com') || Str::contains($link, 'youtu.be'))
                    <div class="flex justify-center">
                        <iframe width="800" height="450" class="rounded shadow"
                            src="https://www.youtube.com/embed/{{ Str::contains($link, 'youtu.be') ? Str::after($link, 'youtu.be/') : Str::after($link, 'v=') }}"
                            frameborder="0" allowfullscreen></iframe>
                    </div>
                @elseif (Str::contains($link, 'tiktok.com'))
                    <div class="flex justify-center">
                        <blockquote class="tiktok-embed" cite="{{ $link }}"
                            data-video-id="{{ Str::afterLast($link, '/') }}" style="max-width: 605px;min-width: 325px;">
                            <section>Loading...</section>
                        </blockquote>
                        <script async src="https://www.tiktok.com/embed.js"></script>
                    </div>
                @else
                    <div class="flex justify-center">
                        <video controls class="w-[800px] h-auto rounded shadow">
                            <source src="{{ asset('storage/' . $link) }}">
                            Browser tidak mendukung video ini.
                        </video>
                    </div>
                @endif
            @else
                <p class="text-center text-gray-500">Belum ada Video Dokumentasi.</p>
            @endif
        </div>

        <!-- Delete Confirmation Modal -->
        <div x-show="openModal" x-cloak 
             class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
             x-transition:enter="transition ease-out duration-300" 
             x-transition:enter-start="opacity-0" 
             x-transition:enter-end="opacity-100" 
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100" 
             x-transition:leave-end="opacity-0">
            <div class="bg-white rounded-xl shadow-lg w-96 p-6 relative" @click.away="closeModal()">
                <button @click="closeModal()"
                    class="absolute top-2 right-2 text-gray-500 hover:text-gray-800 text-xl cursor-pointer">&times;</button>
                <h2 class="text-lg font-semibold mb-4 text-gray-800">Konfirmasi Hapus</h2>
                <p class="text-gray-600">Apakah Anda yakin ingin menghapus <strong x-text="selectedNama"></strong> ini?</p>
                <div class="mt-6 flex justify-end gap-2">
                    <button @click="closeModal()"
                        class="px-4 py-2 text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-md cursor-pointer">
                        Batal
                    </button>
                     <form :action="deleteUrl" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-4 py-2 text-sm bg-red-600 hover:bg-red-700 text-white rounded-md cursor-pointer">
                            Ya, Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        function validateFileSize() {
            const fileInput = document.getElementById('image');
            const errorMessage = document.getElementById('error-message');
            const file = fileInput.files[0];

            if (file && file.size > 2 * 1024 * 1024) {
                errorMessage.classList.remove('hidden');
                return false;
            } else {
                errorMessage.classList.add('hidden');
                return true;
            }
        }
    </script>
@endsection