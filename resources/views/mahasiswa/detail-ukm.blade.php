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
                Profile UKM {{ $ukm->nama }}
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
                    <p class="text-gray-600 leading-relaxed text-justify">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti odit expedita quibusdam nemo
                        maiores aspernatur sunt itaque suscipit deserunt modi minima veniam totam reprehenderit dolorum
                        ullam commodi aliquid iusto beatae iste, vel omnis? Doloribus, illo dolorem quas praesentium eum
                        minima sequi deserunt ad explicabo quaerat autem eius animi saepe incidunt quos distinctio quod,
                        facere quisquam necessitatibus nihil soluta rem corporis labore? Assumenda quisquam modi perferendis
                        atque itaque enim. Perspiciatis iusto omnis quas ipsum saepe dolores tenetur voluptates excepturi,
                        hic quidem unde laudantium sequi iste eligendi reiciendis ullam sint. Consectetur harum nam odio
                        delectus beatae provident eum suscipit earum similique officiis!
                    </p>
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
                        <p class="text-gray-600 leading-relaxed text-center">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti odit expedita quibusdam nemo
                            maiores aspernatur sunt itaque suscipit deserunt modi minima veniam totam reprehenderit dolorum
                            ullam commodi aliquid iusto beatae iste, vel omnis? Doloribus, illo dolorem quas praesentium eum
                            minima sequi deserunt ad explicabo quaerat autem eius animi saepe incidunt quos distinctio quod,
                            facere quisquam necessitatibus nihil soluta rem corporis labore? Assumenda quisquam modi
                            perferendis
                            atque itaque enim. Perspiciatis iusto omnis quas ipsum saepe dolores tenetur voluptates
                            excepturi,
                            hic quidem unde laudantium sequi iste eligendi reiciendis ullam sint. Consectetur harum nam odio
                            delectus beatae provident eum suscipit earum similique officiis!
                        </p>
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

                @if (isset($sosmed['twitter']))
                    <a href="{{ $sosmed['twitter'] }}" class="text-blue-400 hover:text-blue-600" target="_blank">
                        <i class="fab fa-twitter fa-2x"></i>
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

    <section class="py-20  container mx-auto px-6">
        <div class="text-center mb-8">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Kegiatan</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                UKM UMPAR rutin mengadakan berbagai kegiatan seperti pelatihan, seminar, kompetisi, dan acara sosial
                yang melibatkan mahasiswa dari berbagai latar belakang.
            </p>
        </div>
        <div class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($kegiatans as $kegiatan)
                    <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="relative overflow-hidden">
                            <img src="{{ $kegiatan->foto_sampul ? asset('storage/' . $kegiatan->foto_sampul) : asset('img/activity.png') }}"
                                class="w-full h-64 object-cover transition-all duration-500 hover:scale-105">
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2">{{ $kegiatan->nama }}</h3>
                            <p class="text-gray-600 mb-4">{{ $kegiatan->deskripsi }}</p>
                            <a href="{{ route('detail-kegiatan', $kegiatan->id) }}"
                                class="text-[#608BC1] font-medium hover:text-yellow-600 transition inline-flex items-center">
                                <span>Lihat Selengkapnya</span>
                                <i class="fas fa-arrow-right ml-2 text-sm"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="container mx-auto px-6">
        <div class="text-center mb-8">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Informasi</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                UKM UMPAR juga menyediakan informasi terbaru tentang kegiatan, acara, dan event yang akan datang.
            </p>
        </div>
        <div class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($pendaftarans as $pendaftaran)
                    <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="relative overflow-hidden">
                            <img src="{{ $pendaftaran->brosur ? asset('storage/' . $pendaftaran->brosur) : asset('img/activity.png') }}"
                                class="w-full h-64 object-cover transition-all duration-500 hover:scale-105">
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2">{{ $pendaftaran->pendaftaran }}</h3>
                            <p class="text-gray-600 mb-4">Batas Pendaftaran : {{ $pendaftaran->batas_pendaftaran }}</p>
                            <a href="{{ route('detailInformasi', $pendaftaran->id) }}"
                                class="text-[#608BC1] font-medium hover:text-yellow-600 transition inline-flex items-center">
                                <span>Lihat Selengkapnya</span>
                                <i class="fas fa-arrow-right ml-2 text-sm"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="container mx-auto px-6 py-8" x-data="{ selectedImage: '{{ asset('storage/' . $galeri[0]->photo_path) }}', fade: false }" x-init="$nextTick(() => fade = true)">
        <div class="text-center mb-8">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Galeri</h2>
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


            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-4">
                @foreach ($galeri as $index => $item)
                    <div>
                        <img @click.prevent="fade = false; setTimeout(() => { selectedImage = '{{ asset('storage/' . $item->photo_path) }}'; fade = true }, 100)"
                            src="{{ asset('storage/' . $item->photo_path) }}"
                            class="object-cover object-center h-24 md:h-32 w-full rounded-lg cursor-pointer border-2 hover:border-blue-500"
                            alt="gallery-thumbnail-{{ $index }}" />
                    </div>
                @endforeach
            </div>
        </div>
    </section>


@endsection
