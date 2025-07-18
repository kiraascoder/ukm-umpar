@extends('component.app')

@section('title', 'UKM UMPAR')

@section('content')

    <div class="relative h-[80vh]">
        <div class="absolute inset-0 bg-cover bg-center z-0"
            style="background-image: url('{{ $ukm->foto_pengurus ? asset('storage/' . $ukm->foto_pengurus) : asset('img/default/sampul.jpg') }}');">
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
                <div class="hidden md:flex space-x-10 font-medium text-white ">
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
        <div class="absolute bottom-2 left-1/2 transform -translate-x-1/2 z-10 text-center">
            <img src="{{ $ukm->logo ? asset('storage/' . $ukm->logo) : asset('img/umpar.png') }}"
                class="w-64 h-64 rounded-full object-cover aspect-square mx-auto">
            <h1 class="mt-4 text-2xl md:text-3xl font-bold text-white drop-shadow-lg">
            </h1>
        </div>

    </div>

    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center gap-12">
                <div class="w-full md:w-1/2">
                    <h2 class="text-4xl font-extrabold text-gray-800 mb-6 text-center md:text-left">
                        Deskripsi
                    </h2>
                    {{ $ukm->deskripsi }}
                </div>
                <div class="w-full md:w-1/2 flex justify-center">
                    <div class="w-full max-w-lg">
                        <img src="{{ $ukm->foto_pengurus ? asset('storage/' . $ukm->foto_pengurus) : asset('img/default/sampul.jpg') }}"
                            class="w-full rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-extrabold text-gray-800 mb-6">Sejarah</h2>
                <div class="max-w-3xl mx-auto text-gray-700">
                    <div>
                        {{ $ukm->sejarah }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class=" bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-extrabold text-gray-800 mb-8">Visi & Misi</h2>
                <div class="max-w-3xl mx-auto text-gray-700">

                    <div class="mb-12">
                        <h3
                            class="text-3xl font-semibold mb-4 text-indigo-600 border-b-2 border-indigo-600 inline-block pb-1">
                            Visi</h3>
                        <p class="text-lg leading-relaxed tracking-wide">
                            {{ $ukm->visi }}
                        </p>
                    </div>
                    <div>
                        <h3
                            class="text-3xl font-semibold mb-4 text-indigo-600 border-b-2 border-indigo-600 inline-block pb-1">
                            Misi</h3>
                        <div class="mt-3 text-left text-lg leading-relaxed tracking-wide space-y-4">
                            {!! nl2br(e($ukm->misi)) !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="py-20 bg-gray-50">
        <div class="text-center max-w-5xl mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold mb-4 text-gray-800">Pengurus Inti</h2>
            <p class="text-gray-600 mb-12 max-w-xl mx-auto">
                Berikut adalah Pengurus Inti UKM {{ $ukm->nama }} yang memudahkan koordinasi antar anggota.
            </p>

            @if ($anggota->count() === 1)
                <div class="flex justify-center">
                    @foreach ($anggota as $item)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden p-6 text-center w-64">
                            <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}"
                                class="w-32 h-32 object-cover rounded-full border-4 border-white shadow-lg mx-auto mb-4" />
                            <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $item->jabatan }}</h3>
                            <p class="text-gray-700 text-base">{{ $item->nama }}</p>
                        </div>
                    @endforeach
                </div>
            @elseif ($anggota->count() === 2)
                <div class="flex justify-center space-x-8 flex-wrap gap-8">
                    @foreach ($anggota as $item)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden p-6 text-center w-64">
                            <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}"
                                class="w-32 h-32 object-cover rounded-full border-4 border-white shadow-lg mx-auto mb-4" />
                            <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $item->jabatan }}</h3>
                            <p class="text-gray-700 text-base">{{ $item->nama }}</p>
                        </div>
                    @endforeach
                </div>
            @elseif ($anggota->count() === 3)
                <div class="flex flex-col items-center space-y-10">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden p-6 text-center w-64">
                        <img src="{{ asset('storage/' . $anggota[0]->foto) }}" alt="{{ $anggota[0]->nama }}"
                            class="w-32 h-32 object-cover rounded-full border-4 border-white shadow-lg mx-auto mb-4" />
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $anggota[0]->jabatan }}</h3>
                        <p class="text-gray-700 text-base">{{ $anggota[0]->nama }}</p>
                    </div>

                    <div class="flex space-x-8 flex-wrap justify-center gap-8">
                        @foreach ($anggota->slice(1) as $item)
                            <div class="bg-white rounded-lg shadow-md overflow-hidden p-6 text-center w-64">
                                <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}"
                                    class="w-32 h-32 object-cover rounded-full border-4 border-white shadow-lg mx-auto mb-4" />
                                <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $item->jabatan }}</h3>
                                <p class="text-gray-700 text-base">{{ $item->nama }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
    <section class="py-20 bg-gray-50">
        <div class="text-center max-w-5xl mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold mb-4 text-gray-800">Struktur Organisasi</h2>
            <p class="text-gray-600 mb-12 max-w-xl mx-auto">
                Berikut adalah Struktur Organisasi UKM {{ $ukm->nama }}.
            </p>
            <div class="flex justify-center">
                <img src="{{ asset('storage/' . $ukm->struktur_organisasi) }}" class="w-[800px] h-auto rounded shadow">
            </div>
        </div>
    </section>
    <section class="py-20 bg-gray-50">
        <div class="text-center mb-8">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Sosial Media</h2>
            <p class="text-gray-600 mb-8">
                Ikuti kami di sosial media untuk mendapatkan informasi terbaru tentang kegiatan
                dan program yang kami tawarkan.
            </p>

            <div class="flex justify-center space-x-6">
                @php
                    $sosmed = json_decode($ukm->media_sosial, true);
                @endphp

                @if (isset($sosmed['facebook']))
                    <a href="{{ $sosmed['facebook'] }}" class="text-blue-600 hover:text-blue-800" target="_blank">
                        <i class="fab fa-facebook fa-2x"></i>
                    </a>
                @endif

                @if (isset($sosmed['youtube']))
                    <a href="{{ $sosmed['youtube'] }}" class="text-blue-400 hover:text-blue-600" target="_blank">
                        <i class="fab fa-youtube fa-2x"></i>
                    </a>
                @endif

                @if (isset($sosmed['tiktok']))
                    <a href="{{ $sosmed['tiktok'] }}" class="text-black hover:text-gray-800" target="_blank">
                        <i class="fab fa-tiktok fa-2x"></i>
                    </a>
                @endif

                @if (isset($sosmed['instagram']))
                    <a href="{{ $sosmed['instagram'] }}" class="text-pink-600 hover:text-pink-800" target="_blank">
                        <i class="fab fa-instagram fa-2x"></i>
                    </a>
                @endif
            </div>
        </div>
    </section>
    <section x-data="{
        currentSlide: 0,
        itemsPerPage: 6,
        kegiatan: {{ Js::from($kegiatans) }},
        get totalSlides() {
            return Math.ceil(this.kegiatan.length / this.itemsPerPage);
        },
        get translateX() {
            return `translateX(-${this.currentSlide * 100}%)`;
        },
        paginatedGroups() {
            const result = [];
            for (let i = 0; i < this.kegiatan.length; i += this.itemsPerPage) {
                result.push(this.kegiatan.slice(i, i + this.itemsPerPage));
            }
            return result;
        },
        scrollLeft() {
            if (this.currentSlide > 0) this.currentSlide--;
        },
        scrollRight() {
            if (this.currentSlide < this.totalSlides - 1) this.currentSlide++;
        }
    }" class="py-20 bg-gray-50" id="featured">
        <div class="container mx-auto px-6">
            <div class="text-center mb-10">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Kegiatan {{ $ukm->nama }}</h2>
                <p class="text-gray-600 max-w-4xl text-center mx-auto mb-4">
                    UKM di Universitas Muhammadiyah Parepare secara rutin mengadakan berbagai kegiatan.
                </p>
            </div>


            <div class="overflow-hidden relative">
                <div class="flex transition-transform duration-500 ease-in-out" :style="{ transform: translateX }"
                    style="width: 100%">

                    <template x-for="group in paginatedGroups()" :key="group[0].id">
                        <div class="w-full flex-shrink-0 grid grid-cols-1 md:grid-cols-3 gap-6 px-1">
                            <template x-for="kegiatan in group" :key="kegiatan.id">
                                <div
                                    class="bg-white rounded-xl overflow-hidden shadow hover:shadow-lg transition-all duration-300 flex flex-col min-h-[350px]">
                                    <div class="relative overflow-hidden">
                                        <img :src="'/storage/' + kegiatan.foto_sampul" :alt="kegiatan.nama"
                                            class="w-full h-[200px] object-cover object-center">
                                    </div>
                                    <div class="p-4 flex-1 flex flex-col">
                                        <h3 class="text-lg font-bold mb-1" x-text="kegiatan.nama"></h3>
                                        <div class="text-gray-600 mb-3 text-sm" x-html="kegiatan.deskripsi">
                                        </div>

                                        <a :href="'/kegiatan/' + kegiatan.id + '/detail'"
                                            class="text-[#608BC1] font-medium hover:text-yellow-600 transition inline-flex items-center text-sm mt-auto">
                                            <span>Lihat Selengkapnya</span>
                                            <i class="fas fa-arrow-right ml-2 text-xs"></i>
                                        </a>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </template>
                </div>
            </div>


            <div class="flex justify-center mt-6 gap-4">
                <button @click="scrollLeft"
                    class="bg-white shadow p-3 rounded-full hover:bg-gray-100 transition disabled:opacity-50"
                    :disabled="currentSlide === 0">
                    <i class="fas fa-chevron-left text-[#608BC1]"></i>
                </button>
                <button @click="scrollRight"
                    class="bg-white shadow p-3 rounded-full hover:bg-gray-100 transition disabled:opacity-50"
                    :disabled="currentSlide >= totalSlides - 1">
                    <i class="fas fa-chevron-right text-[#608BC1]"></i>
                </button>
            </div>
        </div>
    </section>




    <section>
        <div class="py-20 bg-gray-50" id="featured">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4">Informasi {{ $ukm->nama }}</h2>

                </div>
                <div class="grid gap-8 mt-10 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($pendaftaran as $item)
                        <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300"
                            x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false">
                            <div class="relative overflow-hidden">
                                <img src="{{ asset('storage/' . $item->brosur) }}" alt="{{ $item->ukm->nama }}"
                                    class="w-full h-64 object-cover transition-all duration-500"
                                    :class="{ 'transform scale-105': hover }">
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-bold mb-2"> UKM {{ $item->ukm->nama }}</h3>
                                <p class="text-gray-600 mb-2">{{ $item->pendaftaran }}</p>
                                <p class="text-gray-600 mb-4">Batas Pendaftaran : {{ $item->batas_pendaftaran }}</p>
                                <a href="{{ route('detailInformasi', $item->id) }}"
                                    class="text-[#608BC1] font-medium hover:text-yellow-600 transition inline-flex items-center">
                                    <span>Lihat Detail</span>
                                    <i class="fas fa-arrow-right ml-2 text-sm"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <div class="container mx-auto px-4 py-8">
        @php
            $defaultImage = asset('img/activity.jpg');
            $firstImage = isset($galeri[0]) ? asset('storage/' . $galeri[0]->photo_path) : $defaultImage;
            $totalImages = count($galeri);
        @endphp

        <section class="container mx-auto px-6 py-8" x-data="{
            selectedImage: '{{ $firstImage }}',
            fade: false,
            currentPage: 1,
            perPage: 4,
            totalImages: {{ $totalImages }},
            get pagedThumbnails() {
                return {{ json_encode($galeri) }}.slice((this.currentPage - 1) * this.perPage, this.currentPage * this.perPage);
            },
            changeImage(src) {
                this.fade = false;
                setTimeout(() => {
                    this.selectedImage = src;
                    this.fade = true;
                }, 200);
            },
            nextPage() {
                if (this.currentPage < Math.ceil(this.totalImages / this.perPage)) {
                    this.currentPage++;
                }
            },
            prevPage() {
                if (this.currentPage > 1) {
                    this.currentPage--;
                }
            }
        }" x-init="$nextTick(() => fade = true)">

            <div class="text-center mb-8">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Galeri UKM {{ $ukm->name }}</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Galeri UKM {{ $ukm->name }} berisi foto-foto kegiatan, acara, dan event yang telah dilakukan.
                </p>
            </div>

            <div class="grid gap-6">

                <div id="main-image" class="scroll-mt-24">
                    <img x-show="fade" x-transition:enter="transition-opacity duration-500"
                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" :src="selectedImage"
                        class="h-auto max-h-[600px] w-full rounded-lg object-cover object-center" alt="gallery-main" />
                </div>


                <div>
                    <div class="grid grid-cols-4 gap-4 mb-4">
                        <template x-for="(item, index) in pagedThumbnails" :key="index">
                            <div>
                                <img @click.prevent="changeImage(item.photo_path ? '{{ asset('storage') }}/' + item.photo_path : '{{ $defaultImage }}')"
                                    :src="item.photo_path ? '{{ asset('storage') }}/' + item.photo_path :
                                        '{{ $defaultImage }}'"
                                    class="object-cover object-center h-24 md:h-32 w-full rounded-lg cursor-pointer border-2 hover:border-blue-500"
                                    :class="selectedImage === (item.photo_path ? '{{ asset('storage') }}/' + item.photo_path :
                                        '{{ $defaultImage }}') ? 'border-blue-600' : ''"
                                    alt="gallery-thumbnail" />
                            </div>
                        </template>
                    </div>


                    <div class="flex justify-center items-center space-x-6 mt-6">

                        <button @click="prevPage()" :disabled="currentPage === 1"
                            class="flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm text-gray-700 hover:bg-gray-100 disabled:opacity-50 disabled:cursor-not-allowed transition">

                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                            </svg>
                            Prev
                        </button>


                        <span class="text-gray-700 font-semibold">
                            Halaman <span x-text="currentPage"></span> dari <span
                                x-text="Math.ceil(totalImages / perPage)"></span>
                        </span>


                        <button @click="nextPage()" :disabled="currentPage === Math.ceil(totalImages / perPage)"
                            class="flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm text-gray-700 hover:bg-gray-100 disabled:opacity-50 disabled:cursor-not-allowed transition">
                            Next

                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>

                </div>

            </div>
        </section>
    </div>

@endsection
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('carousel', () => ({
            scrollLeft() {
                this.$refs.scrollContainer.scrollBy({
                    left: -320,
                    behavior: 'smooth'
                });
            },
            scrollRight() {
                this.$refs.scrollContainer.scrollBy({
                    left: 320,
                    behavior: 'smooth'
                });
            },
        }))
    })
</script>
