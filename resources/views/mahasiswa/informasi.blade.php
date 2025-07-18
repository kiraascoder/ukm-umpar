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
@endsection
