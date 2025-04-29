@extends('component.app')

@section('title', 'UKM UMPAR')

@section('content')
    <section class="relative py-20 overflow-hidden">
        <div class="absolute inset-0">
            <img src="{{ asset('storage/' . $ukm->foto_pengurus) }}" alt="Background Pengurus"
                class="w-full h-full object-cover blur-sm brightness-75">
        </div>
        <div class="relative container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="md:w-1/2 mb-8 md:mb-0">
                    <h1 class="text-white font-bold text-5xl leading-tight mb-6">UKM {{ $ukm->nama }}</h1>
                </div>
                <div class="md:w-1/2">
                    <img src="{{ asset('storage/' . $ukm->foto_pengurus) }}" alt="Foto Pengurus"
                        class="w-full rounded-lg shadow-lg">
                </div>
            </div>
        </div>

        <div class="absolute bottom-2 left-16">
            <img src="{{ asset('storage/' . $ukm->logo) }}" alt="Profile Picture"
                class="w-64 h-64 rounded-full object-cover aspect-square border-4 border-white shadow-lg">
        </div>
    </section>
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row gap-10">

                <div class="w-full md:w-1/2">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4 text-center md:text-left">Deskripsi</h2>
                    <p class="text-gray-600">
                        {{ $ukm->deskripsi }}
                    </p>
                </div>
                <div class="w-full md:w-1/2">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4 text-center md:text-left">Sejarah</h2>
                    <p class="text-gray-600">
                        {{ $ukm->sejarah }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20">
        <div class="text-center mb-8">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Visi & Misi</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                <strong>Visi:</strong> {{ $ukm->visi }}
            </p>
            <p class="text-gray-600 max-w-2xl mx-auto mt-4">
                <strong>Misi:</strong>
            <ul class="list-disc text-left mx-auto max-w-xl">
                
            </ul>
            </p>
        </div>
    </section>
    <section class="py-20 bg-gray-100">
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

    <section class="py-20">
        <div class="text-center mb-8">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Struktur Organisasi</h2>
            <p class="text-gray-600 mb-8">
                Berikut adalah struktur organisasi UKM {{ $ukm->nama }} yang memudahkan koordinasi antar anggota.
            </p>

            @if ($anggota->count() === 1)
                <div class="flex justify-center">
                    @foreach ($anggota as $item)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden p-6 text-center w-64">
                            <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}"
                                class="w-32 h-32 rounded-full border-4 border-white shadow-lg mx-auto mb-4">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $item->jabatan }}</h3>
                            <p class="text-gray-700 text-base">{{ $item->nama }}</p>
                        </div>
                    @endforeach
                </div>
            @elseif ($anggota->count() === 2)
                <div class="flex justify-center space-x-8">
                    @foreach ($anggota as $item)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden p-6 text-center w-64">
                            <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}"
                                class="w-32 h-32 rounded-full border-4 border-white shadow-lg mx-auto mb-4">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $item->jabatan }}</h3>
                            <p class="text-gray-700 text-base">{{ $item->nama }}</p>
                        </div>
                    @endforeach
                </div>
            @elseif ($anggota->count() === 3)
                <div class="flex flex-col items-center space-y-10">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden p-6 text-center w-64">
                        <img src="{{ asset('storage/' . $anggota[0]->foto) }}" alt="{{ $anggota[0]->nama }}"
                            class="w-32 h-32 rounded-full border-4 border-white shadow-lg mx-auto mb-4">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $anggota[0]->jabatan }}</h3>
                        <p class="text-gray-700 text-base">{{ $anggota[0]->nama }}</p>
                    </div>

                    <div class="flex space-x-8">
                        @foreach ($anggota->slice(1) as $item)
                            <div class="bg-white rounded-lg shadow-md overflow-hidden p-6 text-center w-64">
                                <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}"
                                    class="w-32 h-32 rounded-full border-4 border-white shadow-lg mx-auto mb-4">
                                <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $item->jabatan }}</h3>
                                <p class="text-gray-700 text-base">{{ $item->nama }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>



    <!-- Kegiatan Section -->
    <section class="py-20  container mx-auto px-6">
        <div class="text-center mb-8">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Kegiatan</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                UKM UMPAR rutin mengadakan berbagai kegiatan seperti pelatihan, seminar, kompetisi, dan acara sosial
                yang melibatkan mahasiswa dari berbagai latar belakang.
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300"
                x-data="{ hover: false }">
                <div class="relative overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1605276277265-84f97da7d47a?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                        alt="Adventure Playset" class="w-full h-64 object-cover transition-all duration-500"
                        :class="{ 'transform scale-105': hover }">
                    <div class="absolute top-4 right-4 bg-[#608BC1] text-white text-sm font-bold px-3 py-1 rounded-full">
                        Popular
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2">Adventure World</h3>
                    <p class="text-gray-600 mb-4">Packed with fun: slides, swings, climbing wall, and monkey bars in a
                        compact design.</p>
                    <a href="#"
                        class="text-[#608BC1] font-medium hover:text-yellow-600 transition inline-flex items-center">
                        <span>View Details</span>
                        <i class="fas fa-arrow-right ml-2 text-sm"></i>
                    </a>
                </div>
            </div>
            <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300"
                x-data="{ hover: false }">
                <div class="relative overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1575783970733-1aaedde1db74?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                        alt="Castle Kingdom Playset" class="w-full h-64 object-cover transition-all duration-500"
                        :class="{ 'transform scale-105': hover }">
                    <div class="absolute top-4 right-4 bg-blue-500 text-white text-sm font-bold px-3 py-1 rounded-full">
                        New
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2">Castle Kingdom</h3>
                    <p class="text-gray-600 mb-4">A royal playground with turrets, wave slides, and a spacious playhouse
                        for imaginative play.</p>
                    <a href="#"
                        class="text-[#608BC1] font-medium hover:text-yellow-600 transition inline-flex items-center">
                        <span>View Details</span>
                        <i class="fas fa-arrow-right ml-2 text-sm"></i>
                    </a>
                </div>
            </div>
            <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300"
                x-data="{ hover: false }">
                <div class="relative overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1596461110761-b4e5d5ad49f8?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                        alt="Backyard Explorer Playset" class="w-full h-64 object-cover transition-all duration-500"
                        :class="{ 'transform scale-105': hover }">
                    <div class="absolute top-4 right-4 bg-green-500 text-white text-sm font-bold px-3 py-1 rounded-full">
                        Best Value
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2">Backyard Explorer</h3>
                    <p class="text-gray-600 mb-4">Perfect for smaller yards with swing beam, slide, and climbing options
                        at an affordable price.</p>
                    <a href="#"
                        class="text-[#608BC1] font-medium hover:text-yellow-600 transition inline-flex items-center">
                        <span>View Details</span>
                        <i class="fas fa-arrow-right ml-2 text-sm"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Galeri Section -->
    <section class="py-20">
        <div class="text-center mb-8">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Galeri</h2>
            <p class="text-gray-600 max-w-2xl mx-auto mb-8">
                Berikut adalah beberapa dokumentasi kegiatan yang telah kami lakukan di UKM UMPAR.
            </p>
            <div class="container mx-auto px-4 py-8">


                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <!-- Large item -->
                    <div class="md:col-span-2 md:row-span-2 relative overflow-hidden rounded-2xl shadow-lg group">
                        <img src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHwxfHxuYXR1cmV8ZW58MHwwfHx8MTcyMTA0MjYwMXww&ixlib=rb-4.0.3&q=80&w=1080"
                            alt="Nature" class="w-full h-full object-cover">
                        <div
                            class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="absolute bottom-0 left-0 right-0 p-4">
                                <h3 class="text-2xl font-bold text-white">Explore Nature</h3>
                                <p class="text-white">Discover the beauty of the natural world</p>
                            </div>
                        </div>
                    </div>

                    <!-- Two small items -->
                    <div class="relative overflow-hidden rounded-2xl shadow-lg group">
                        <img src="https://images.unsplash.com/photo-1493770348161-369560ae357d?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHw2fHxmb29kfGVufDB8MHx8fDE3MjEwNDI2MTR8MA&ixlib=rb-4.0.3&q=80&w=1080"
                            alt="Food" class="w-full h-48 object-cover">
                        <div
                            class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="absolute bottom-0 left-0 right-0 p-4">
                                <h4 class="text-xl font-bold text-white">Culinary Delights</h4>
                            </div>
                        </div>
                    </div>
                    <div class="relative overflow-hidden rounded-2xl shadow-lg group">
                        <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHw1fHx0ZWNobm9sb2d5fGVufDB8MHx8fDE3MjEwNDI2Mjh8MA&ixlib=rb-4.0.3&q=80&w=1080"
                            alt="Technology" class="w-full h-48 object-cover">
                        <div
                            class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="absolute bottom-0 left-0 right-0 p-4">
                                <h4 class="text-xl font-bold text-white">Tech Innovations</h4>
                            </div>
                        </div>
                    </div>

                    <!-- Three medium items -->
                    <div class="relative overflow-hidden rounded-2xl shadow-lg group">
                        <img src="https://images.unsplash.com/photo-1503220317375-aaad61436b1b?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHw1fHx0cmF2ZWx8ZW58MHwwfHx8MTcyMTA0MjY0MXww&ixlib=rb-4.0.3&q=80&w=1080"
                            alt="Travel" class="w-full h-48 object-cover">
                        <div
                            class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="absolute bottom-0 left-0 right-0 p-4">
                                <h4 class="text-xl font-bold text-white">Travel Adventures</h4>
                            </div>
                        </div>
                    </div>
                    <div class="relative overflow-hidden rounded-2xl shadow-lg group">
                        <img src="https://images.unsplash.com/photo-1513364776144-60967b0f800f?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHwxfHxhcnR8ZW58MHwwfHx8MTcyMTA0MjY5Nnww&ixlib=rb-4.0.3&q=80&w=1080"
                            alt="Art" class="w-full h-48 object-cover">
                        <div
                            class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="absolute bottom-0 left-0 right-0 p-4">
                                <h4 class="text-xl font-bold text-white">Artistic Expressions</h4>
                            </div>
                        </div>
                    </div>

                    <!-- bottom cards -->
                    <div class="relative overflow-hidden rounded-2xl shadow-lg group">
                        <img src="https://images.unsplash.com/photo-1530549387789-4c1017266635?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHwyfHxzd2ltbWluZ3xlbnwwfDB8fHwxNzIxMDQzMjkxfDA&ixlib=rb-4.0.3&q=80&w=1080"
                            alt="Sport" class="w-full h-48 object-cover">
                        <div
                            class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="absolute bottom-0 left-0 right-0 p-4">
                                <h4 class="text-xl font-bold text-white">Swimming</h4>
                            </div>
                        </div>
                    </div>
                    <div class="relative overflow-hidden rounded-2xl shadow-lg group">
                        <img src="https://images.unsplash.com/photo-1611195974226-a6a9be9dd763?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHwxMnx8Y2hlc3N8ZW58MHwwfHx8MTcyMTA0MzI0Nnww&ixlib=rb-4.0.3&q=80&w=1080"
                            alt="Sport" class="w-full h-48 object-cover">
                        <div
                            class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="absolute bottom-0 left-0 right-0 p-4">
                                <h4 class="text-xl font-bold text-white">Chess</h4>
                            </div>
                        </div>
                    </div>
                    <div class="relative overflow-hidden rounded-2xl shadow-lg group">
                        <img src="https://images.unsplash.com/photo-1553778263-73a83bab9b0c?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHw1fHxmb290YmFsbHxlbnwwfDB8fHwxNzIxMDQzMjExfDA&ixlib=rb-4.0.3&q=80&w=1080"
                            alt="Sport" class="w-full h-48 object-cover">
                        <div
                            class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="absolute bottom-0 left-0 right-0 p-4">
                                <h4 class="text-xl font-bold text-white">Football</h4>
                            </div>
                        </div>
                    </div>
                    <div class="relative overflow-hidden rounded-2xl shadow-lg group">
                        <img src="https://images.unsplash.com/photo-1624526267942-ab0ff8a3e972?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHw3fHxjcmlja2V0fGVufDB8MHx8fDE3MjEwNDMxNTh8MA&ixlib=rb-4.0.3&q=80&w=1080"
                            alt="Sport" class="w-full h-48 object-cover">
                        <div
                            class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="absolute bottom-0 left-0 right-0 p-4">
                                <h4 class="text-xl font-bold text-white">Cricket</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
