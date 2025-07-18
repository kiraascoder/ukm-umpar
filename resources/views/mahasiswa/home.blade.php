@extends('component.app')

@section('title', 'UKM UMPAR')

@section('content')
    <div class="relative h-[85vh]">
        <div class="absolute inset-0 bg-cover bg-center z-0" style="background-image: url({{ asset('img/bg-umpar.png') }});">
            <div class="absolute inset-0 bg-black opacity-20"></div>
        </div>
        <nav class="container mx-auto px-6 py-4 relative z-10" x-data="{ open: false }">
            <div class="flex justify-between items-center">
                <div class="text-white font-bold text-2xl">
                    <img src="{{ asset('img/umpar.png') }}" alt="Logo UMPAR" class="w-16">
                </div>
                <div class="md:hidden">
                    <button class="text-white focus:outline-none" @click="open = !open">
                        <i class="fa fa-bars text-2xl"></i>
                    </button>
                </div>
                <div
                    class="hidden md:flex space-x-10 font-medium 
            {{ Request::is('/') ? 'text-white' : 'text-gray-900' }}">
                    <a href="/" class="hover:text-yellow-300 transition">Home</a>
                    <a href="{{ route('daftar-ukm') }}" class="hover:text-yellow-300 transition">UKM</a>
                    <a href="{{ route('galeri') }}" class="hover:text-yellow-300 transition">Galeri</a>
                    <a href="{{ route('kegiatan') }}" class="hover:text-yellow-300 transition">Kegiatan</a>
                    <a href="{{ route('informasi') }}" class="hover:text-yellow-300 transition">Informasi</a>
                </div>
            </div>


            <div x-show="open" class="md:hidden mt-4 bg-white rounded-lg shadow-lg px-4 py-4 space-y-3">
                <a href="/" class="block text-gray-800 hover:text-blue-600">Home</a>
                <a href="{{ route('daftar-ukm') }}" class="block text-gray-800 hover:text-blue-600">UKM</a>
                <a href="{{ route('galeri') }}" class="block text-gray-800 hover:text-blue-600">Galeri</a>
                <a href="{{ route('kegiatan') }}" class="block text-gray-800 hover:text-blue-600">Kegiatan</a>
                <a href="{{ route('informasi') }}" class="block text-gray-800 hover:text-blue-600">Informasi</a>
            </div>
        </nav>

        <div class="container mx-auto px-6 pt-32 pb-48 relative z-10" x-data="{ fadeIn: false }" x-init="setTimeout(() => fadeIn = true, 500)">
            <div class="max-w-3xl transition-all duration-1000"
                :class="fadeIn ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'">
                <h1 class="text-4xl md:text-6xl font-bold text-white leading-tight mb-6">
                    Selamat<br>Datang Mahasiswa!
                </h1>
                <p class="text-xl text-white mb-8 md:pr-12">
                    Sistem informasi UKM yang dirancang untuk memudahkan pengelolaan dan pengembangan UKM di kampus,
                    memfasilitasi berbagai kegiatan dan informasi yang dibutuhkan.
                </p>

                <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="/informasi"
                        class="bg-[#608BC1] hover:bg-[#133E87] text-white font-bold py-3 px-8 rounded-lg transition transform hover:-translate-y-1 inline-flex items-center justify-center">
                        <span>Lihat Informasi</span>
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                    <a href="/contact"
                        class="bg-transparent border-2 border-white text-white hover:bg-white hover:text-gray-900 font-bold py-3 px-8 rounded-lg transition transform hover:-translate-y-1 inline-flex items-center justify-center">
                        <span>Hubungi Kami</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="py-20 bg-white" id="info">
        <div class="container mx-auto px-6">
            <div class="text-center">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">UNIT KEGIATAN MAHASISWA</h2>
                <p class="text-gray-600 max-w-6xl mx-auto">Wadah bagi mahasiswa yang memiliki minat, bakat, dan kreativitas
                    yang sama untuk mengembangkan diri serta menyalurkan aktivitas ekstrakurikuler di lingkungan kampus.
                    Jika di bangku sekolah dikenal sebagai ekstrakurikuler (ekskul), di perguruan tinggi UKM menjadi ruang
                    bagi mahasiswa untuk berorganisasi, berkarya, dan berkontribusi.</p>
            </div>
        </div>
    </div>
    <div class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Tentang UKM</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Unit Kegiatan Mahasiswa (UKM) merupakan wadah pengembangan minat dan bakat mahasiswa. Berikut alur umum
                    kegiatan dalam UKM.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">

                <div class="text-center">
                    <div class="w-16 h-16 mx-auto mb-4 flex items-center justify-center bg-[#608BC1] text-white rounded-full transition-all duration-700"
                        :class="{ 'opacity-100 transform scale-100': visible, 'opacity-0 transform scale-50': !visible }">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Pendaftaran Anggota</h3>
                    <p class="text-gray-600">Mahasiswa dapat mendaftar sebagai anggota UKM sesuai dengan minat dan bakat
                        mereka secara online.</p>
                </div>

                <!-- Step 2: Pelatihan -->
                <div class="text-center">
                    <div class="w-16 h-16 mx-auto mb-4 flex items-center justify-center bg-[#608BC1] text-white rounded-full transition-all duration-700 delay-300"
                        :class="{ 'opacity-100 transform scale-100': visible, 'opacity-0 transform scale-50': !visible }">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M12 14l9-5-9-5-9 5 9 5zm0 7v-6m0-5v.01" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Pelatihan & Pembinaan</h3>
                    <p class="text-gray-600">Anggota mengikuti pelatihan, pembinaan, dan kegiatan rutin yang
                        diselenggarakan
                        oleh pengurus.</p>
                </div>

                <!-- Step 3: Pelaksanaan -->
                <div class="text-center">
                    <div class="w-16 h-16 mx-auto mb-4 flex items-center justify-center bg-[#608BC1] text-white rounded-full transition-all duration-700 delay-600"
                        :class="{ 'opacity-100 transform scale-100': visible, 'opacity-0 transform scale-50': !visible }">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M8 7V3m8 4V3M3 11h18M5 19h14a2 2 0 002-2v-5H3v5a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Pelaksanaan Program</h3>
                    <p class="text-gray-600">UKM melaksanakan program kerja seperti lomba, seminar, pengabdian masyarakat,
                        dan kegiatan kampus lainnya.</p>
                </div>

                <!-- Step 4: Informasi -->
                <div class="text-center">
                    <div class="w-16 h-16 mx-auto mb-4 flex items-center justify-center bg-[#608BC1] text-white rounded-full transition-all duration-700 delay-900"
                        :class="{ 'opacity-100 transform scale-100': visible, 'opacity-0 transform scale-50': !visible }">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M21 10V6a2 2 0 00-2-2H7l-4 4v10a2 2 0 002 2h9M15 19l3 3 3-3" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Informasi & Komunikasi</h3>
                    <p class="text-gray-600">UKM menyampaikan informasi dan laporan kegiatan melalui media sosial atau
                        forum
                        kampus kepada seluruh mahasiswa.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="py-20 bg-gray-50" id="featured">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Daftar UKM UMPAR</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Berikut adalah UKM yang ada di Universitas Muhammadiyah Parepare
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($ukms as $ukm)
                    <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="relative overflow-hidden">
                            <img src="{{ $ukm->foto_pengurus ? asset('storage/' . $ukm->foto_pengurus) : asset('img/default/ukm.png') }}"
                                alt="Foto pengurus {{ $ukm->nama }}"
                                class="w-full h-64 object-cover transition-all duration-500 hover:scale-105" />
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2">{{ $ukm->nama }}</h3>
                            <p class="text-gray-600 mb-4">
                                {{ $ukm->deskripsi ? substr($ukm->deskripsi, 0, 100) . '...' : 'Tidak ada deskripsi' }}</p>
                            <a href="{{ route('detail-ukm', $ukm->id) }}"
                                class="text-[#608BC1] font-medium hover:text-yellow-600 transition inline-flex items-center">
                                <span>Lihat Selengkapnya</span>
                                <i class="fas fa-arrow-right ml-2 text-sm"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
                @if ($totalUkm > 3)
                    <div class="text-center mt-12 col-span-full">
                        <a href="{{ route('daftar-ukm') }}"
                            class="inline-block bg-[#608BC1] hover:bg-[#133E87] text-gray-900 font-bold py-3 px-8 rounded-lg transition transform hover:-translate-y-1">
                            Lihat Semua UKM
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    </div>

    <div class="py-20 bg-white" id="gallery">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Galeri Kegiatan UKM</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Lihat keseruan kegiatan UKM kami melalui dokumentasi berikut.
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                @foreach ($gallery->take(9) as $index => $dok)
                    <div
                        class="@if ($index === 0) md:col-span-2 md:row-span-2 @endif relative overflow-hidden rounded-2xl shadow-lg group">
                        <img src="{{ asset('storage/' . $dok->photo_path) }}"
                            alt="{{ $dok->kegiatan->nama_kegiatan ?? 'Dokumentasi' }}"
                            class="w-full {{ $index === 0 ? 'h-full' : 'h-48' }} object-cover">
                        <div
                            class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="absolute bottom-0 left-0 right-0 p-4">
                                <h4 class="text-xl font-bold text-white">{{ $dok->kegiatan->nama ?? 'Kegiatan' }}</h4>
                                <p class="text-white">{{ $dok->kegiatan->ukm->nama ?? 'UKM Tidak Dikenal' }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-12">
                <a href="/galeri"
                    class="inline-block bg-[#608BC1] hover:bg-[#133E87] text-white font-bold py-3 px-8 rounded-lg transition transform hover:-translate-y-1">
                    Lihat Selengkapnya
                </a>
            </div>
        </div>
    </div>

    <script>
        function gallery() {
            return {
                current: 0,
                photos: @json(
                    $gallery->map(function ($item) {
                        return asset('storage/' . $item->photo_path);
                    })),
                next() {
                    this.current = (this.current + 1) % this.photos.length;
                },
                prev() {
                    this.current = (this.current - 1 + this.photos.length) % this.photos.length;
                }
            }
        }
    </script>

@endsection
