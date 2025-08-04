@extends('component.admin-layout')

@section('title', 'Tambah Pendaftaran UKM')

@section('content')
    <div class="bg-gray-100 min-h-screen py-10">
        <div class="container mx-auto">
            <div class="max-w-3xl mx-auto bg-white p-8 shadow-lg rounded-lg">
                <h2 class="text-2xl font-bold mb-6 text-center">Tambah Pendaftaran</h2>

                <form action="{{ route('adminUkmTambahPendaftaran.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-4">
                    @csrf

                    <div>
                        <label class="block font-medium text-gray-700">Nama Pendaftaran</label>
                        <input type="text" name="pendaftaran"
                            class="mt-1 p-2 w-full border rounded-md @error('pendaftaran') border-red-500 @enderror"
                            value="{{ old('pendaftaran') }}">
                        @error('pendaftaran')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700">Batas Pendaftaran</label>
                        <input type="date" name="batas_pendaftaran"
                            class="mt-1 p-2 w-full border rounded-md @error('batas_pendaftaran') border-red-500 @enderror"
                            value="{{ old('batas_pendaftaran') }}">
                        @error('batas_pendaftaran')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700">Foto Brosur</label>
                        <input type="file" name="brosur"
                            class="mt-1 p-2 w-full border rounded-md @error('brosur') border-red-500 @enderror">
                        @error('brosur')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700">Link Pendaftaran</label>
                        <input type="text" name="link_pendaftaran"
                            class="mt-1 p-2 w-full border rounded-md @error('link_pendaftaran') border-red-500 @enderror"
                            value="{{ old('link_pendaftaran') }}">
                        @error('link_pendaftaran')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700">Deskripsi Persyaratan</label>
                        <textarea name="persyaratan" rows="4"
                            class="mt-1 p-2 w-full border rounded-md @error('persyaratan') border-red-500 @enderror">{{ old('persyaratan') }}</textarea>
                        @error('persyaratan')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700">Nomor WhatsApp</label>
                        <input type="text" name="wa" id="wa"
                            class="mt-1 p-2 w-full border rounded-md @error('wa') border-red-500 @enderror"
                            value="{{ old('wa') }}">
                        @error('wa')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700">Formulir Pendaftaran</label>
                        <input type="file" name="formulir"
                            class="mt-1 p-2 w-full border rounded-md @error('formulir') border-red-500 @enderror"
                            value="{{ old('formulir') }}">
                        @error('formulir')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="text-center">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Tambah
                            Pendaftaran
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        const waInput = document.getElementById('wa');
        waInput.addEventListener('blur', () => {
            let val = waInput.value.trim();

            if (val.startsWith('08')) {
                waInput.value = '+62' + val.substring(1);
            }
        });
    </script>
@endsection
