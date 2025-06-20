@extends('component.admin-layout')

@section('title', 'Detail Pendaftaran')

@section('content')
    <div x-data="{ openModal: null, selectedNama: '', deleteUrl: '' }" class="bg-gray-100 min-h-screen p-6">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl text-gray-800">Detail Pendaftaran UKM</h1>
            <a href="{{ route('adminUkmPendaftaran') }}"
                class="inline-block px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md shadow-sm transition duration-200">
                Kembali
            </a>
        </div>
        <div class="lg:col-span-3 w-full bg-white p-6 rounded-2xl shadow overflow-auto">
            <div class="flex items-center justify-between ">
                <h2 class="text-lg font-semibold text-gray-700">{{ $pendaftaran->pendaftaran }}</h2>
                <a href="{{ route('adminUkmEditPendaftaran', $pendaftaran->id) }}"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md shadow">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                    </svg>
                    Edit Pendaftaran
                </a>
            </div>
            <p class="text-gray-600 mb-4">
                Batas Pendaftaran : {{ Str::limit($pendaftaran->batas_pendaftaran, 100, '...') }}
            </p>
        </div>
        <div class="w-full bg-white p-6 rounded-2xl shadow mt-4">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Informasi</h3>
            <p class="text-gray-600 mb-4">
                Link Pendaftaran : {{ Str::limit($pendaftaran->link_pendaftaran, 100, '...') }}
            </p>
            <p class="text-gray-600 mb-4">
                Persyaratan : {{ Str::limit($pendaftaran->persyaratan, 100, '...') }}
            </p>
            <p class="text-gray-600 mb-4">
                Kontak WA : {{ $pendaftaran->wa }}
            </p>
        </div>
        <div class="w-full bg-white p-6 rounded-2xl shadow mt-4">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Brosur</h3>
            @if ($pendaftaran->brosur)
                <div class="flex justify-center">
                    <img src="{{ asset('storage/' . $pendaftaran->brosur) }}" class="w-[800px] h-auto rounded shadow">
                </div>
            @else
                <p class="text-center text-gray-500">Belum ada gambar brosur.</p>
            @endif

        </div>
    </div>
@endsection
