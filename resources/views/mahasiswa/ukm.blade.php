@extends('component.app')

@section('title', 'UKM UMPAR')

@section('content')
    <div class="py-20 bg-gradient-to-b from-sky-50 to-white" id="featured">
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
                                <span>View Details</span>
                                <i class="fas fa-arrow-right ml-2 text-sm"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
