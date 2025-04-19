@extends('component.app')

@section('title', 'UKM UMPAR')

@section('content')
    <div class="py-20 bg-gradient-to-b from-sky-50 to-white" id="featured">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Daftar Kegiatan UKM UMPAR</h2>
                <p class="text-gray-600 max-w-4xl text-center mx-auto mb-4">UKM di Universitas Muhammadiyah Parepare secara
                    rutin mengadakan
                    berbagai kegiatan yang mendukung pengembangan diri mahasiswa. Mulai dari pelatihan, seminar, perlombaan,
                    hingga kegiatan sosial kemasyarakatan — semua dirancang untuk membentuk karakter, meningkatkan soft
                    skill, dan memperluas jaringan pertemanan antar mahasiswa lintas jurusan</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300"
                    x-data="{ hover: false }">
                    <div class="relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1605276277265-84f97da7d47a?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                            alt="Adventure Playset" class="w-full h-64 object-cover transition-all duration-500"
                            :class="{ 'transform scale-105': hover }">
                        <div
                            class="absolute top-4 right-4 bg-[#608BC1] text-white text-sm font-bold px-3 py-1 rounded-full">
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
                        <div
                            class="absolute top-4 right-4 bg-green-500 text-white text-sm font-bold px-3 py-1 rounded-full">
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
        </div>
    </div>
@endsection
