@extends('component.admin-layout')

@section('title', 'Pendaftaran UKM')

@section('content')
    <div class="bg-gray-100 min-h-screen py-10">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold mb-6">Detail Pendaftaran</h2>

            <div class="mb-4">
                <p class="text-lg font-semibold">{{ $pendaftaran->pendaftaran }}</p>
                <p class="text-gray-700">{{ $pendaftaran->batas_pendaftaran }}</p>
                <p class="text-gray-700">{{ $pendaftaran->link_pendaftaran }}</p>
                <p class="text-gray-700">{{ $pendaftaran->persyaratan }}</p>
            </div>

            @if ($pendaftaran->brosur)
                <div class="mt-4">
                    <img src="{{ asset('storage/' . $pendaftaran->brosur) }}" class="w-full max-w-3xl rounded-lg shadow-md"
                        alt="Dokumentasi pendaftaran">
                </div>
            @endif

            <div class="mt-6 flex gap-4">
                <a href="{{ route('adminUkmPendaftaran') }}"
                    class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-700">
                    Back
                </a>
                <a href="{{ route('adminUkmEditPendaftaran', $pendaftaran->id) }}"
                    class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                    Edit
                </a>
            </div>
        </div>
    </div>
@endsection
