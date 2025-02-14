@extends('component.admin-layout')

@section('title', 'Profil UKM')

@section('content')
    <div class="bg-gray-100 min-h-screen py-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 sm:grid-cols-12 gap-6">
                <!-- Sidebar Profile -->
                <div class="col-span-1 sm:col-span-3">
                    <div class="bg-white shadow rounded-lg p-6 text-center">
                        <img src="{{ asset('storage/' . $ukm->logo) }}"
                            class="w-32 h-32 bg-gray-300 rounded-full mx-auto mb-4" alt="Logo UKM">
                        <h1 class="text-xl font-bold">{{ $ukm->nama }}</h1>
                        <a href="{{ route('adminUkmEditProfile', $ukm->id) }}"
                            class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded mt-4 inline-block">
                            Edit Detail
                        </a>
                        <hr class="my-6 border-t border-gray-300">
                        <div>
                            <h3 class="text-gray-700 uppercase font-bold text-sm">Media Sosial</h3>
                            <ul class="mt-2 text-gray-600">
                                <li>📘 Facebook: {{ $ukm->media_sosial['facebook'] }}</li>
                                <li>📷 Instagram: {{ $ukm->media_sosial['instagram'] }}</li>
                                <li>🐦 Twitter: {{ $ukm->media_sosial['twitter'] }}</li>
                                <li>🎵 TikTok: {{ $ukm->media_sosial['tiktok'] }}</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="col-span-1 sm:col-span-9">
                    <div class="bg-white shadow rounded-lg p-6">
                        <h2 class="text-xl font-bold mb-4">Sejarah</h2>
                        <p class="text-gray-700">{{ $ukm->sejarah }}</p>

                        <h2 class="text-xl font-bold mt-6 mb-4">Visi & Misi</h2>
                        <div class="mb-4">
                            <h3 class="text-gray-700 font-bold">Visi</h3>
                            <p class="mt-2 text-gray-700">{{ $ukm->visi }}</p>
                        </div>
                        <div class="mb-4">
                            <h3 class="text-gray-700 font-bold">Misi</h3>
                            <p class="mt-2 text-gray-700">{{ $ukm->misi }}</p>
                        </div>
                        <div class="mb-6">
                            <h3 class="text-gray-700 font-bold">Deskripsi</h3>
                            <p class="mt-2 text-gray-700">{{ $ukm->deskripsi }}</p>
                        </div>

                        <h2 class="text-xl font-bold mt-6 mb-4">Struktur Organisasi</h2>
                        <div class="flex justify-center">
                            <img src="{{ asset('storage/' . $ukm->struktur_organisasi) }}"
                                class="w-full max-w-3xl rounded-lg shadow-md" alt="Struktur Organisasi">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
