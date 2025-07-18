@extends('component.admin-layout')

@section('title', 'proker UKM')

@section('content')
    <div class="bg-gray-100 min-h-screen py-10">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold mb-6">Detail proker</h2>

            <div class="mb-4">
                <p class="text-lg font-semibold">{{ $proker->nama }}</p>
                <p class="text-gray-700">{{ $proker->bidang }}</p>
                <p class="text-gray-700">{{ $proker->deskripsi }}</p>
                <p class="text-gray-700">{{ $proker->status }}</p>
            </div>

            <div class="mt-6 flex gap-4">
                <a href="{{ route('adminUkmProker') }}"
                    class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-700">
                    Back
                </a>
                <a href="{{ route('adminUkmEditProker', $proker->id) }}"
                    class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                    Edit
                </a>
            </div>
        </div>
    </div>
@endsection
