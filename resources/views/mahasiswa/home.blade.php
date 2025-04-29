@extends('component.app')

@section('title', 'UKM UMPAR')

@section('content')
    <div class="relative h-[85vh]">
        <div class="absolute inset-0 bg-cover bg-center z-0" style="background-image: url({{ asset('img/bg-umpar.png') }});">
            <div class="absolute inset-0 bg-black opacity-20"></div>
        </div>

        <!-- Navbar -->
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center relative z-10">
            <div class="text-white font-bold text-2xl">
                <img src="{{ asset('img/umpar.png') }}" alt="Logo UMPAR" class="w-16">
            </div>
            <div class="hidden md:flex space-x-10 font-medium text-white">
                <a href="/" class="hover:text-yellow-300 transition">Home</a>
                <a href="{{ route('daftar-ukm') }}" class="hover:text-yellow-300 transition">UKM</a>
                <a href="{{ route('galeri') }}" class="hover:text-yellow-300 transition">Galeri</a>
                <a href="{{ route('kegiatan') }}" class="hover:text-yellow-300 transition">Kegiatan</a>
                <a href="{{ route('informasi') }}" class="hover:text-yellow-300 transition">Informasi</a>
            </div>
            <div class="md:hidden" x-data="{ open: false }">
                <button class="text-white focus:outline-none" @click="open = !open">
                    <i class="fa fa-bars text-2xl"></i>
                </button>
                <div x-show="open" @click.away="open = false"
                    class="absolute top-20 right-6 bg-white text-gray-800 shadow-lg rounded-lg p-6 w-48 z-50">
                    <div class="flex flex-col space-y-4">
                        <a href="/" class="hover:text-blue-600">Home</a>
                        <a href="{{ route('daftar-ukm') }}" class="hover:text-blue-600">UKM</a>
                        <a href="{{ route('galeri') }}" class="hover:text-blue-600">Galeri</a>
                        <a href="{{ route('kegiatan') }}" class="hover:text-blue-600">Kegiatan</a>
                        <a href="{{ route('informasi') }}" class="hover:text-blue-600">Informasi</a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero -->
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

                <div class="text-center" x-data="{ visible: false }" x-intersect="visible = true">
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
                <div class="text-center" x-data="{ visible: false }" x-intersect="visible = true">
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
                <div class="text-center" x-data="{ visible: false }" x-intersect="visible = true">
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
                <div class="text-center" x-data="{ visible: false }" x-intersect="visible = true">
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
                <p class="text-gray-600 max-w-2xl mx-auto">Endless adventures start with a SwingIt playset.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($ukms as $ukm)
                    <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="relative overflow-hidden">
                            <img src="{{ asset('storage/' . $ukm->foto_pengurus) }}"
                                class="w-full h-64 object-cover transition-all duration-500 hover:scale-105">
                            <div
                                class="absolute top-4 right-4 bg-[#608BC1] text-white text-sm font-bold px-3 py-1 rounded-full">
                                Popular
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2">{{ $ukm->nama }}</h3>
                            <p class="text-gray-600 mb-4">{{ $ukm->deskripsi }}</p>
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


    <!-- Gallery Section -->
    <!-- Galeri Section -->
    <div class="py-20 bg-white" id="gallery">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Galeri Kegiatan UKM</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Lihat keseruan kegiatan UKM kami melalui dokumentasi berikut.
                </p>
            </div>

            <div class="relative" x-data="gallery()">
                <!-- Main Image -->
                <div class="rounded-xl overflow-hidden shadow-xl mb-4">
                    <template x-for="(photo, index) in photos" :key="index">
                        <div x-show="current === index" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform scale-95"
                            x-transition:enter-end="opacity-100 transform scale-100"
                            x-transition:leave="transition ease-in duration-200"
                            x-transition:leave-start="opacity-100 transform scale-100"
                            x-transition:leave-end="opacity-0 transform scale-95">
                            <img :src="photo" class="w-full h-96 md:h-[500px] object-cover"
                                :alt="'Gallery image ' + (index + 1)">
                        </div>
                    </template>
                </div>

                <!-- Thumbnails -->
                <div class="grid grid-cols-4 gap-4 mt-4">
                    <template x-for="(photo, index) in photos" :key="index">
                        <div @click="current = index" class="rounded-lg overflow-hidden cursor-pointer transition-all"
                            :class="{ 'ring-2 ring-[#608BC1] ring-offset-2': current === index }">
                            <img :src="photo" class="w-full h-24 object-cover"
                                :alt="'Thumbnail ' + (index + 1)">
                        </div>
                    </template>
                </div>

                <!-- Navigation Buttons -->
                <button @click="prev"
                    class="absolute top-1/2 left-4 transform -translate-y-1/2 w-12 h-12 rounded-full bg-white/80 shadow-lg flex items-center justify-center text-gray-800 hover:text-[#608BC1] focus:outline-none transition">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button @click="next"
                    class="absolute top-1/2 right-4 transform -translate-y-1/2 w-12 h-12 rounded-full bg-white/80 shadow-lg flex items-center justify-center text-gray-800 hover:text-[#608BC1] focus:outline-none transition">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>

            <div class="text-center mt-12">
                <a href="#"
                    class="inline-block bg-[#608BC1] hover:bg-[#133E87] text-white font-bold py-3 px-8 rounded-lg transition transform hover:-translate-y-1">
                    Lihat Selengkapnya
                </a>
            </div>
        </div>
    </div>

    <!-- Tambahkan di akhir body -->
    <script>
        function gallery() {
            return {
                current: 0,
                photos: [
                    'https://images.unsplash.com/photo-1605276374104-dee2a0ed3cd6?auto=format&fit=crop&w=800&q=80',
                    'https://images.unsplash.com/photo-1615484477651-e2c3bde0fd63?auto=format&fit=crop&w=800&q=80',
                    'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=800&q=80',
                    'https://images.unsplash.com/photo-1475721027785-f74eccf877e2?auto=format&fit=crop&w=800&q=80',
                ],
                prev() {
                    this.current = (this.current === 0) ? this.photos.length - 1 : this.current - 1;
                },
                next() {
                    this.current = (this.current === this.photos.length - 1) ? 0 : this.current + 1;
                }
            };
        }
    </script>
@endsection
