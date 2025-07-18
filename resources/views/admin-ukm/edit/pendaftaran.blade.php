@extends('component.admin-layout')

@section('title', 'Edit Kegiatan UKM')

@section('content')
    <div class="bg-gray-100 min-h-screen py-10">
        <div class="container mx-auto">
            <div class="max-w-3xl mx-auto bg-white p-8 shadow-lg rounded-lg">

                <h2 class="text-2xl font-bold mb-6 text-center">Edit Pendaftaran</h2>

                {{-- Error Flash Message --}}
                @if (session('error'))
                    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                {{-- Validasi --}}
                @if ($errors->any())
                    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('adminUkmEditPendaftaran.edit', $pendaftaran->id) }}" method="POST"
                    enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block font-medium text-gray-700">Nama Pendaftaran</label>
                        <input type="text" name="pendaftaran" class="mt-1 p-2 w-full border rounded-md"
                            value="{{ old('pendaftaran', $pendaftaran->pendaftaran) }}">
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700">Batas Pendaftaran</label>
                        <input type="date" name="batas_pendaftaran" class="mt-1 p-2 w-full border rounded-md"
                            value="{{ old('batas_pendaftaran', $pendaftaran->batas_pendaftaran) }}">
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700">Foto Brosur</label>
                        @if ($pendaftaran->brosur)
                            <img src="{{ asset('storage/' . $pendaftaran->brosur) }}"
                                class="w-40 h-auto mb-2 border rounded">
                        @endif
                        <input type="file" name="brosur" class="mt-1 p-2 w-full border rounded-md">
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700">Link Pendaftaran</label>
                        <input type="text" name="link_pendaftaran" class="mt-1 p-2 w-full border rounded-md"
                            value="{{ old('link_pendaftaran', $pendaftaran->link_pendaftaran) }}">
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700">Deskripsi Persyaratan</label>
                        <textarea name="persyaratan" rows="4" class="mt-1 p-2 w-full border rounded-md">{{ old('persyaratan', $pendaftaran->persyaratan) }}</textarea>
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700">Nomor WhatsApp</label>
                        <input type="text" name="wa" class="mt-1 p-2 w-full border rounded-md"
                            value="{{ old('wa', $pendaftaran->wa) }}">
                    </div>

                    <div class="text-center flex justify-center space-x-4 mt-4">
                        <a href="{{ route('adminUkmDetailPendaftaran', $pendaftaran->id) }}"
                            class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-700">
                            Back
                        </a>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">
                            Edit Pendaftaran
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
