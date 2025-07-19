@extends('component.app')

@section('title', 'UKM UMPAR')

@section('content')
    <div class="py-20 " id="featured">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Daftar Kegiatan UKM UMPAR</h2>
                <p class="text-gray-600 max-w-4xl text-center mx-auto mb-4">
                    UKM di Universitas Muhammadiyah Parepare secara rutin mengadakan berbagai kegiatan yang mendukung
                    pengembangan diri mahasiswa.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="kegiatan-container">
                @foreach ($kegiatans as $kegiatan)
                    <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300"
                        x-data="{ hover: false }">
                        <div class="relative overflow-hidden">
                            <img src="{{ asset('storage/' . $kegiatan->foto_sampul) }}" alt="{{ $kegiatan->nama }}"
                                class="w-full h-64 object-cover transition-all duration-500"
                                :class="{ 'transform scale-105': hover }">
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2">{{ $kegiatan->nama }}</h3>
                            <p class="text-gray-600 mb-4">{!! Str::limit(strip_tags($kegiatan->deskripsi), 100, '...') !!}</p>
                            <a href="{{ route('detailKegiatan', $kegiatan->id) }}"
                                class="text-[#608BC1] font-medium hover:text-yellow-600 transition inline-flex items-center">
                                <span>Lihat Selengkapnya</span>
                                <i class="fas fa-arrow-right ml-2 text-sm"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
