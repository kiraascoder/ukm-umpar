@extends('component.admin-layout')

@section('title', 'Edit anggota UKM')

@section('content')
    <div class="bg-gray-100 min-h-screen py-10">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold mb-6">Detail anggota</h2>

            <div class="mb-4">
                <p class="text-lg font-semibold">{{ $anggota->nama }}</p>
                <p class="text-gray-700">{{ $anggota->jabatan }}</p>
                <p class="text-gray-700">{{ $anggota->tempat_lahir }} , {{ $anggota->tanggal_lahir }}</p>
                <p class="text-gray-700">{{ $anggota->jurusan }}</p>
                <p class="text-gray-700">{{ $anggota->fakultas }}</p>
                <p class="text-gray-700">{{ $anggota->angkatan }}</p>
            </div>

            @if ($anggota->foto)
                <div class="mt-4">
                    <img src="{{ asset('storage/' . $anggota->foto) }}" class="w-full max-w-3xl rounded-lg shadow-md"
                        alt="Foto Anggota">
                </div>
            @else
                <p class="text-gray-700">Foto anggota tidak tersedia.</p>
            @endif
            <div class="mt-6 flex gap-4">
                <a href="{{ route('adminUkmAnggota') }}"
                    class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-700">
                    Back
                </a>
                <a href="{{ route('adminUkmEditAnggota', $anggota->id) }}"
                    class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                    Edit
                </a>
            </div>
        </div>
    </div>
@endsection
