@extends('component.admin-layout')

@section('title', 'Edit Surat UKM')

@section('content')
    <div class="bg-gray-50 min-h-screen py-12">
        <div class="container mx-auto px-4">
            <div
                class="max-w-3xl mx-auto bg-white shadow-xl rounded-xl p-10 transform transition-all duration-500 ease-in-out hover:scale-[1.005]">
                <h2
                    class="text-3xl font-semibold text-center text-gray-800 mb-8 transition-opacity duration-500 ease-in-out">
                    Edit Surat UKM</h2>
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6">
                        <strong class="font-bold">Oops!</strong> Ada kesalahan pada input:
                        <ul class="mt-2 list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6">
                        {{ session('error') }}
                    </div>
                @endif

                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('adminUkmArsipSurat.edit', $surat->id) }}" method="POST"
                    enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    {{-- Judul --}}
                    <div class="transition duration-300 ease-in-out">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Judul Surat</label>
                        <input value="{{ old('judul', $surat->judul ?? '') }}" type="text" name="judul"
                            class="block w-full border border-gray-300 rounded-lg shadow-sm p-3 transition duration-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            required>
                    </div>

                    {{-- Jenis Surat --}}
                    <div class="transition duration-300 ease-in-out">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Surat</label>
                        <select name="jenis_surat" id="jenis_surat"
                            class="block w-full border border-gray-300 rounded-lg shadow-sm p-3 transition duration-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            required>
                            <option value="" disabled
                                {{ old('jenis_surat', $surat->jenis_surat ?? '') == '' ? 'selected' : '' }}>Pilih Jenis
                                Surat</option>
                            <option value="masuk"
                                {{ old('jenis_surat', $surat->jenis_surat ?? '') == 'masuk' ? 'selected' : '' }}>Surat Masuk
                            </option>
                            <option value="keluar"
                                {{ old('jenis_surat', $surat->jenis_surat ?? '') == 'keluar' ? 'selected' : '' }}>Surat
                                Keluar</option>
                        </select>
                    </div>

                    {{-- Upload Surat --}}
                    <div class="transition duration-300 ease-in-out">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Upload File Surat</label>
                        <input type="file" name="file_path"
                            class="block w-full border border-gray-300 rounded-lg shadow-sm p-3 transition duration-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        @if (!empty($surat->file_path))
                            <p class="text-sm text-gray-500 mt-2 transition-opacity duration-300">
                                File saat ini:
                                <a href="{{ asset('storage/' . $surat->file_path) }}" target="_blank"
                                    class="text-blue-600 hover:underline transition duration-200">Lihat Surat</a>
                            </p>
                        @endif
                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="flex justify-center gap-4 pt-6">
                        <a href="{{ route('adminUkmArsipSurat') }}"
                            class="bg-gray-400 hover:bg-gray-500 text-white font-medium px-5 py-2 rounded-lg transition-all duration-300 ease-in-out transform hover:scale-105">
                            Kembali
                        </a>
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg shadow transition-all duration-300 ease-in-out transform hover:scale-105">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
