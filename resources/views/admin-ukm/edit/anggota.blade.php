@extends('component.admin-layout')

@section('title', 'Edit Anggota UKM')

@section('content')
    <div class="bg-gray-100 min-h-screen py-10">
        <div class="container mx-auto">
            <div class="max-w-3xl mx-auto bg-white p-8 shadow-lg rounded-lg">
                <h2 class="text-2xl font-bold mb-6 text-center">Edit Anggota UKM</h2>
                <form action="{{ route('adminUkmEditAnggota.edit', $anggota->id) }}" method="POST"
                    enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    @method('PUT')
                    <div>
                        <label class="block font-medium text-gray-700">Nama</label>
                        <input type="text" name="nama" value="{{ $anggota->nama }}"
                            class="mt-1 p-2 w-full border rounded-md">
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700">Jabatan</label>
                        <input type="text" name="jabatan" value="{{ $anggota->jabatan }}"
                            class="mt-1 p-2 w-full border rounded-md">
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" value="{{ $anggota->tempat_lahir }}"
                            class="mt-1 p-2 w-full border rounded-md">
                    </div>


                    <div>
                        <label class="block font-medium text-gray-700">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" value="{{ $anggota->tanggal_lahir }}"
                            class="mt-1 p-2 w-full border rounded-md">
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin"
                            class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                            <option value="Laki-laki" {{ $anggota->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                                Laki-laki</option>
                            <option value="Perempuan" {{ $anggota->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                Perempuan</option>
                        </select>
                    </div>


                    <div>
                        <label class="block font-medium text-gray-700">Fakultas</label>
                        <select name="fakultas" id="fakultas"
                            class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                            <option value="fkip" {{ $anggota->fakultas == 'fkip' ? 'selected' : '' }}>FKIP</option>
                            <option value="feb" {{ $anggota->fakultas == 'feb' ? 'selected' : '' }}>FEB</option>
                            <option value="faktek" {{ $anggota->fakultas == 'faktek' ? 'selected' : '' }}>FAKTEK</option>
                            <option value="fapetrik" {{ $anggota->fakultas == 'fapetrik' ? 'selected' : '' }}>FAPETRIK
                            </option>
                            <option value="fikes" {{ $anggota->fakultas == 'fikes' ? 'selected' : '' }}>FIKES</option>
                            <option value="fai" {{ $anggota->fakultas == 'fai' ? 'selected' : '' }}>FAI</option>
                            <option value="hukum" {{ $anggota->fakultas == 'hukum' ? 'selected' : '' }}>HUKUM</option>
                        </select>
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700">Jurusan</label>
                        <input type="text" name="jurusan" value="{{ $anggota->jurusan }}"
                            class="mt-1 p-2 w-full border rounded-md">
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700">Angkatan</label>
                        <input type="text" name="angkatan" value="{{ $anggota->angkatan }}"
                            class="mt-1 p-2 w-full border rounded-md">
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700">Foto Anggota</label>
                        <input type="file" name="foto" class="mt-1 p-2 w-full border rounded-md">
                    </div>

                    <div class="text-center flex justify-center space-x-4 mt-4">
                        <a href="{{ route('adminUkmDetailAnggota', $anggota->id) }}"
                            class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-700">
                            Back
                        </a>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">
                            Edit Anggota
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
