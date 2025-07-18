@extends('component.admin-layout')

@section('title', 'Tambah Surat')

@section('content')
    <div class="bg-gray-100 min-h-screen py-10">
        <div class="container mx-auto">
            <div class="max-w-3xl mx-auto bg-white p-8 shadow-lg rounded-lg">
                <h2 class="text-2xl mb-6 text-center">Tambah Surat</h2>
                <form action="{{ route('adminUkmArsipSurat.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-4">
                    @csrf
                    <div>
                        <label class="block font-medium text-gray-700">Judul</label>
                        <input type="text" name="judul" value="{{ old('judul') }}"
                            class="mt-1 p-2 w-full border rounded-md @error('judul') border-red-500 @enderror">
                        @error('judul')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700">Jenis Surat</label>
                        <select name="jenis_surat" id="jenis_surat"
                            class="mt-2 w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('jenis_surat') border-red-500 @enderror"
                            required>
                            <option value="" disabled {{ old('jenis_surat') ? '' : 'selected' }}>Pilih Jenis Surat
                            </option>
                            <option value="masuk" {{ old('jenis_surat') == 'masuk' ? 'selected' : '' }}>Surat Masuk
                            </option>
                            <option value="keluar" {{ old('jenis_surat') == 'keluar' ? 'selected' : '' }}>Surat Keluar
                            </option>
                        </select>
                        @error('jenis_surat')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700">Upload Surat</label>
                        <input type="file" name="file_path"
                            class="mt-1 p-2 w-full border rounded-md @error('file_path') border-red-500 @enderror">
                        @error('file_path')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="text-center">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded transition duration-300">
                            Tambah Surat
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
