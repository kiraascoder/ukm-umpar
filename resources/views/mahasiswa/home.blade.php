@extends('component.app')

@section('title', 'UKM UMPAR')

@section('content')
    <!-- Features Section -->
    <div class="py-20 bg-white" id="features">
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
                            <img src="{{ $ukm->image_url ?? 'https://via.placeholder.com/800x400' }}"
                                alt="{{ $ukm->nama }}" class="w-full h-64 object-cover transition-all duration-500">
                            <div
                                class="absolute top-4 right-4 bg-[#608BC1] text-white text-sm font-bold px-3 py-1 rounded-full">
                                Popular
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2">{{ $ukm->nama }}</h3>
                            <p class="text-gray-600 mb-4">{{ $ukm->deskripsi }}</p>
                            <a href=""
                                class="text-[#608BC1] font-medium hover:text-yellow-600 transition inline-flex items-center">
                                <span>View Details</span>
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

    <!-- Testimonials -->
    <div class="py-20 bg-white" id="testimonials">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Visi dan Misi</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Berikut adalah Visi dan Misi setiap UKM yang ada</p>
            </div>

            <div class="max-w-4xl mx-auto" x-data="{ current: 0, testimonials: [0, 1, 2] }">
                <div class="relative">
                    <div class="overflow-hidden relative h-80">
                        <div class="absolute inset-0 transition-all duration-500 ease-in-out p-8 bg-gray-50 rounded-xl flex flex-col justify-center"
                            :class="{
                                'opacity-100 transform translate-x-0': current ===
                                    0,
                                'opacity-0 transform translate-x-full': current !== 0
                            }">
                            <div class="text-[#608BC1] mb-4">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="text-gray-600 italic mb-6 text-lg">"I love my swing set! SwingIt helped me with
                                the
                                design and planning and was so pleasant to work with. They helped me stay within my
                                budget
                                and time frame, and the delivery and installation was hassle-free. Such nice people to
                                work
                                with!"</p>
                            <div class="flex items-center">
                                <div class="w-12 h-12 rounded-full bg-gray-300 flex-shrink-0"></div>
                                <div class="ml-4">
                                    <h4 class="font-bold">Ruthy J.</h4>
                                    <p class="text-gray-500 text-sm">Happy Parent</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button @click="current = (current - 1 + testimonials.length) % testimonials.length"
                        class="absolute top-1/2 left-0 -translate-y-1/2 -translate-x-6 w-12 h-12 rounded-full bg-white shadow-lg flex items-center justify-center text-gray-800 hover:text-[#608BC1] focus:outline-none transition">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button @click="current = (current + 1) % testimonials.length"
                        class="absolute top-1/2 right-0 -translate-y-1/2 translate-x-6 w-12 h-12 rounded-full bg-white shadow-lg flex items-center justify-center text-gray-800 hover:text-[#608BC1] focus:outline-none transition">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
                <div class="flex justify-center mt-8 space-x-2">
                    <template x-for="(_, index) in testimonials" :key="index">
                        <button @click="current = index"
                            class="w-3 h-3 rounded-full focus:outline-none transition-all duration-300"
                            :class="{ 'bg-[#608BC1] scale-110': current === index, 'bg-gray-300': current !== index }"></button>
                    </template>
                </div>
            </div>
        </div>
    </div>

    <!-- Gallery Section -->
    <div class="py-20 bg-white" id="gallery">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Galeri Kegiatan UKM</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">See how our playsets bring joy to families across the region.
                </p>
            </div>

            <div class="relative" x-data="gallery">
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
                        <div class="rounded-lg overflow-hidden cursor-pointer transition-all"
                            :class="{ 'ring-2 ring-[#608BC1] ring-offset-2': current === index }">
                            <img :src="photo" class="w-full h-24 object-cover" :alt="'Thumbnail ' + (index + 1)">
                        </div>
                    </template>
                </div>

                <!-- Navigation Buttons -->
                <button
                    class="absolute top-1/2 left-4 transform -translate-y-1/2 w-12 h-12 rounded-full bg-white/80 shadow-lg flex items-center justify-center text-gray-800 hover:text-[#608BC1] focus:outline-none transition">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button
                    class="absolute top-1/2 right-4 transform -translate-y-1/2 w-12 h-12 rounded-full bg-white/80 shadow-lg flex items-center justify-center text-gray-800 hover:text-[#608BC1] focus:outline-none transition">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>

            <div class="text-center mt-12">
                <a href="#"
                    class="inline-block bg-[#608BC1] hover:bg-[#133E87] text-gray-900 font-bold py-3 px-8 rounded-lg transition transform hover:-translate-y-1">
                    Lihat Selengkapnya
                </a>
            </div>
        </div>
    </div>

    {{-- <!-- How It Works -->
    <div class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">How It Works</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">From design to installation, we make the process simple and
                    enjoyable.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Step 1 -->
                <div class="text-center" x-data="{ visible: false }" x-intersect="visible = true">
                    <div class="w-16 h-16 mx-auto mb-6 flex items-center justify-center bg-[#608BC1] text-white rounded-full text-2xl font-bold transition-all duration-700"
                        :class="{ 'opacity-100 transform scale-100': visible, 'opacity-0 transform scale-50': !visible }">
                        1
                    </div>
                    <h3 class="text-xl font-bold mb-3">Consultation</h3>
                    <p class="text-gray-600">Discuss your vision, space requirements, and budget with our playset experts.
                    </p>
                </div>

                <!-- Step 2 -->
                <div class="text-center" x-data="{ visible: false }" x-intersect="visible = true">
                    <div class="w-16 h-16 mx-auto mb-6 flex items-center justify-center bg-[#608BC1] text-white rounded-full text-2xl font-bold transition-all duration-700 delay-300"
                        :class="{ 'opacity-100 transform scale-100': visible, 'opacity-0 transform scale-50': !visible }">
                        2
                    </div>
                    <h3 class="text-xl font-bold mb-3">Design</h3>
                    <p class="text-gray-600">Customize your perfect playset with the features your children will love.</p>
                </div>

                <!-- Step 3 -->
                <div class="text-center" x-data="{ visible: false }" x-intersect="visible = true">
                    <div class="w-16 h-16 mx-auto mb-6 flex items-center justify-center bg-[#608BC1] text-white rounded-full text-2xl font-bold transition-all duration-700 delay-600"
                        :class="{ 'opacity-100 transform scale-100': visible, 'opacity-0 transform scale-50': !visible }">
                        3
                    </div>
                    <h3 class="text-xl font-bold mb-3">Production</h3>
                    <p class="text-gray-600">Your playset is carefully crafted using premium materials and expert
                        craftsmanship.</p>
                </div>

                <!-- Step 4 -->
                <div class="text-center" x-data="{ visible: false }" x-intersect="visible = true">
                    <div class="w-16 h-16 mx-auto mb-6 flex items-center justify-center bg-[#608BC1] text-white rounded-full text-2xl font-bold transition-all duration-700 delay-900"
                        :class="{ 'opacity-100 transform scale-100': visible, 'opacity-0 transform scale-50': !visible }">
                        4
                    </div>
                    <h3 class="text-xl font-bold mb-3">Installation</h3>
                    <p class="text-gray-600">Professional setup in your yard, ensuring safety and stability for years of
                        play.</p>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
