@extends('component.app')

@section('title', 'UKM UMPAR')

@section('content')
    <div class="mb-6">
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-4xl font-bold text-center mb-4">Galeri Kegiatan UKM UMPAR</h1>
            <p class="text-gray-600 max-w-4xl text-center mx-auto mb-4">Potret semangat, kreativitas, dan kebersamaan
                mahasiswa
                dalam berbagai kegiatan Unit Kegiatan Mahasiswa (UKM). Dari ajang perlombaan, latihan rutin, hingga
                pengabdian masyarakat — setiap momen mencerminkan dedikasi mahasiswa dalam mengembangkan minat dan bakat di
                luar perkuliahan.</p>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                @foreach ($gallery->take(20) as $index => $dok)
                    <div
                        class="@if ($index === 0) md:col-span-2 md:row-span-2 @endif relative overflow-hidden rounded-2xl shadow-lg group">
                        <img src="{{ asset('storage/' . $dok->photo_path) }}"
                            alt="{{ $dok->kegiatan->nama_kegiatan ?? 'Dokumentasi' }}"
                            class="w-full {{ $index === 0 ? 'h-full' : 'h-48' }} object-cover">
                        <div
                            class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="absolute bottom-0 left-0 right-0 p-4">
                                <h4 class="text-xl font-bold text-white">{{ $dok->kegiatan->nama ?? 'Kegiatan' }}</h4>
                                <p class="text-white">{{ $dok->kegiatan->ukm->nama ?? 'UKM Tidak Dikenal' }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
