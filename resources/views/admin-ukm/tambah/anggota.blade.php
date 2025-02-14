@extends('component.admin-layout')

@section('title', 'Tambah Anggota UKM')

@section('content')
    <div class="bg-gray-100 min-h-screen py-10">
        <div class="container mx-auto">
            <div class="max-w-3xl mx-auto bg-white p-8 shadow-lg rounded-lg">
                <h2 class="text-2xl font-bold mb-6 text-center">Tambah Anggota Profil UKM</h2>
                <form action="{{ route('adminUkmAnggota.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-4">
                    @csrf
                    <div>
                        <label class="block font-medium text-gray-700">Nama</label>
                        <input type="text" name="nama" class="mt-1 p-2 w-full border rounded-md">
                    </div>
                    <div>
                        <label class="block font-medium text-gray-700">Jabatan</label>
                        <input type="text" name="jabatan" class="mt-1 p-2 w-full border rounded-md">
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="mt-1 p-2 w-full border rounded-md">
                    </div>


                    <div>
                        <label class="block font-medium text-gray-700">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="mt-1 p-2 w-full border rounded-md">
                    </div>


                    <div>
                        <label class="block font-medium text-gray-700">Jurusan</label>
                        <input type="text" name="jurusan" class="mt-1 p-2 w-full border rounded-md">
                    </div>

                    <div>
                        <label class="block text-sm text-[#EFE3C2]">Jenis Kelamin</label>
                        <select name="fakultas" id="fakultas"
                            class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                            <option value="" selected>-- Pilih Fakultas --</option>
                            <option value="fkip">FKIP</option>
                            <option value="feb">FEB</option>
                            <option value="faktek">FAKTEK</option>
                            <option value="fapetrik">FAPETRIK</option>
                            <option value="fikes">FIKES</option>
                            <option value="fai">FAI</option>
                            <option value="hukum">HUKUM</option>
                        </select>
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700">Angkatan</label>
                        <input type="text" name="angkatan" class="mt-1 p-2 w-full border rounded-md">
                    </div>

                    <div class="text-center">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Tambah
                            Anggota
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
