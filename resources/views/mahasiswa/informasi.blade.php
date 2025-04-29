@extends('component.app')

@section('title', 'Pendaftaran UKM')

@section('content')
    <div class="p-4 min-h-screen">
        <div class="max-w-7xl mx-auto px-6 md:px-12 xl:px-6">
            <div class="md:w-2/3 lg:w-1/2">
                <h2 class="my-6 text-2xl font-bold text-dark md:text-4xl">Pendaftaran UKM</h2>
                <p class="text-dark text-justify">Daftar UKM yang sedang membuka pendaftaran untuk mahasiswa UMPAR.</p>
            </div>

            <div class="grid gap-8 mt-10 md:grid-cols-2 lg:grid-cols-3">

                <!-- Card UKM Basket -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300"
                    x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false">
                    <div class="relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1599058917212-9622ef540766?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                            alt="UKM Basket" class="w-full h-64 object-cover transition-all duration-500"
                            :class="{ 'transform scale-105': hover }">
                        <div
                            class="absolute top-4 right-4 bg-[#608BC1] text-white text-sm font-bold px-3 py-1 rounded-full">
                            Terbaru
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">UKM Basket</h3>
                        <p class="text-gray-600 mb-4">Buka pendaftaran untuk mahasiswa aktif yang ingin bergabung di tim
                            basket kampus.</p>
                        <a href="#"
                            class="text-[#608BC1] font-medium hover:text-yellow-600 transition inline-flex items-center">
                            <span>Daftar Sekarang</span>
                            <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>

                <!-- Card UKM Musik -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300"
                    x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false">
                    <div class="relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1526498460520-4c246339dccb?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                            alt="UKM Musik" class="w-full h-64 object-cover transition-all duration-500"
                            :class="{ 'transform scale-105': hover }">
                        <div
                            class="absolute top-4 right-4 bg-[#608BC1] text-white text-sm font-bold px-3 py-1 rounded-full">
                            Favorit
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">UKM Musik</h3>
                        <p class="text-gray-600 mb-4">Untuk kamu yang berbakat di bidang musik, ayo kembangkan potensi
                            bersama UKM Musik!</p>
                        <a href="#"
                            class="text-[#608BC1] font-medium hover:text-yellow-600 transition inline-flex items-center">
                            <span>Daftar Sekarang</span>
                            <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>

                <!-- Card UKM Pramuka -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300"
                    x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false">
                    <div class="relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1607746882042-944635dfe10e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                            alt="UKM Pramuka" class="w-full h-64 object-cover transition-all duration-500"
                            :class="{ 'transform scale-105': hover }">
                        <div
                            class="absolute top-4 right-4 bg-[#608BC1] text-white text-sm font-bold px-3 py-1 rounded-full">
                            Populer
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">UKM Pramuka</h3>
                        <p class="text-gray-600 mb-4">Kembangkan jiwa kepemimpinan, kerja sama, dan petualangan di UKM
                            Pramuka UMPAR.</p>
                        <a href="#"
                            class="text-[#608BC1] font-medium hover:text-yellow-600 transition inline-flex items-center">
                            <span>Daftar Sekarang</span>
                            <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
