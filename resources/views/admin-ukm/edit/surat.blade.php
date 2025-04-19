@extends('component.admin-layout')

@section('title', 'Edit Surat UKM')

@section('content')
    <div class="bg-gray-100 min-h-screen py-10">
        <div class="container mx-auto">
            <div class="max-w-3xl mx-auto bg-white p-8 shadow-lg rounded-lg">
                <h2 class="text-2xl mb-6 text-center">Edit Surat</h2>
                <form action="{{ route('adminUkmArsipSurat.edit', $surat->id) }}" method="POST" enctype="multipart/form-data"
                    class="space-y-4">
                    @csrf
                    @method('PUT')
                    <div>
                        <label class="block font-medium text-gray-700">Judul</label>
                        <input value="{{ old('judul', $surat->judul ?? '') }}" type="text" name="judul"
                            class="mt-1 p-2 w-full border rounded-md">
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700">Jenis Surat</label>
                        <select name="jenis_surat" id="jenis_surat"
                            class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                            <option value="" disabled
                                {{ old('jenis_surat', $surat->jenis_surat ?? '') == '' ? 'selected' : '' }}>
                                Pilih Jenis Surat
                            </option>
                            <option value="masuk"
                                {{ old('jenis_surat', $surat->jenis_surat ?? '') == 'masuk' ? 'selected' : '' }}>
                                Surat Masuk
                            </option>
                            <option value="keluar"
                                {{ old('jenis_surat', $surat->jenis_surat ?? '') == 'keluar' ? 'selected' : '' }}>
                                Surat Keluar
                            </option>
                        </select>
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700">Upload Surat</label>
                        <input type="file" name="file_path" class="mt-1 p-2 w-full border rounded-md">
                        @if (!empty($surat->file_path))
                            <p class="text-sm text-gray-500 mt-1">
                                File saat ini: <a href="{{ asset('storage/' . $surat->file_path) }}" target="_blank"
                                    class="text-blue-500 underline">Lihat Surat</a>
                            </p>
                        @endif
                    </div>


                    <div class="text-center flex justify-center space-x-4 mt-4">
                        <a href="{{ route('adminUkmArsipSurat') }}"
                            class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-700">
                            Back
                        </a>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">
                            Edit Surat
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
