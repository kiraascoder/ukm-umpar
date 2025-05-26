@extends('component.admin-layout')

@section('title', 'Detail UKM')

@section('content')
    <div class="max-w-5xl mx-auto mt-10 p-6 bg-white shadow-lg rounded-xl">
        <div class="flex items-center space-x-6 mb-6">
            <img src="{{ asset('storage/' . $ukm->logo) }}" alt="Logo UKM"
                class="w-24 h-24 rounded-full object-cover border border-gray-300">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">{{ $ukm->nama }}</h2>
                <p class="text-gray-500">Saldo: <span class="font-semibold text-green-600">Rp
                        {{ number_format($ukm->saldo, 0, ',', '.') }}</span></p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h3 class="text-lg font-semibold text-gray-700 mb-1">Deskripsi</h3>
                <p class="text-gray-600">{{ $ukm->deskripsi }}</p>
            </div>

            <div>
                <h3 class="text-lg font-semibold text-gray-700 mb-1">Sejarah</h3>
                <p class="text-gray-600">{{ $ukm->sejarah }}</p>
            </div>

            <div>
                <h3 class="text-lg font-semibold text-gray-700 mb-1">Visi</h3>
                <p class="text-gray-600">{{ $ukm->visi }}</p>
            </div>

            <div>
                <h3 class="text-lg font-semibold text-gray-700 mb-1">Misi</h3>

                <div class="mt-2">
                    {!! nl2br(e($ukm->misi)) !!}
                </div>

            </div>
        </div>

        <div class="mt-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-1">Struktur Organisasi</h3>
            <img src="{{ asset('storage/' . $ukm->struktur_organisasi) }}" alt="Struktur Organisasi"
                class="w-full rounded shadow">
        </div>

        <div class="mt-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-1">Foto Pengurus</h3>
            <img src="{{ asset('storage/' . $ukm->foto_pengurus) }}" alt="Foto Pengurus" class="w-full rounded shadow">
        </div>

        <div class="mt-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-1">Media Sosial</h3>
            @if ($ukm->media_sosial && is_array(json_decode($ukm->media_sosial, true)))
                <ul class="text-gray-600 space-y-1">
                    @foreach (json_decode($ukm->media_sosial, true) as $platform => $link)
                        <li><span class="font-semibold">{{ ucfirst($platform) }}:</span> {{ $link }}</li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-500">Belum ada media sosial yang ditambahkan.</p>
            @endif

        </div>

        <div>
            <a href="/admin/dashboard"
                class="inline-flex items-center gap-2  mt-6 px-5 py-2.5 bg-indigo-600 text-white text-sm font-medium rounded-full shadow hover:bg-indigo-700 transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
                Kembali ke Dashboard
            </a>
        </div>
    </div>
@endsection
