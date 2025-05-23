@extends('component.admin-layout')

@section('title', 'Edit Anggota UKM')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-100 animate__animated animate__fadeIn">
        <div class="w-full max-w-4xl bg-white rounded-lg shadow-lg p-8">
            <h2 class="text-2xl font-bold mb-4 text-center text-[#07074D] animate__animated animate__fadeInDown">
                Edit Anggota UKM
            </h2>
            <form action="{{ route('adminUkmEditAnggota.edit', $anggota->id) }}" method="POST" enctype="multipart/form-data"
                class="grid grid-cols-2 gap-4">
                @csrf
                @method('PUT')
                <div>
                    <label for="nama" class="block text-sm font-medium text-[#07074D]">Nama</label>
                    <input type="text" name="nama" id="nama" value="{{ old('nama', $anggota->nama) }}"
                        class="mt-1 p-2 w-full border @error('nama') border-red-500 @else  @enderror rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#6A64F1] focus:border-transparent" />
                    @error('nama')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="jabatan" class="block text-sm font-medium text-[#07074D]">Jabatan</label>
                    <input type="text" name="jabatan" id="jabatan" value="{{ old('jabatan', $anggota->jabatan) }}"
                        class="mt-1 p-2 w-full border @error('jabatan') border-red-500 @else  @enderror rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#6A64F1] focus:border-transparent" />
                    @error('jabatan')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="tempat_lahir" class="block text-sm font-medium text-[#07074D]">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" id="tempat_lahir"
                        value="{{ old('tempat_lahir', $anggota->tempat_lahir) }}"
                        class="mt-1 p-2 w-full border @error('tempat_lahir') border-red-500 @else  @enderror rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#6A64F1] focus:border-transparent" />
                    @error('tempat_lahir')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="tanggal_lahir" class="block text-sm font-medium text-[#07074D]">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                        value="{{ old('tanggal_lahir', $anggota->tanggal_lahir) }}"
                        class="mt-1 p-2 w-full border @error('tanggal_lahir') border-red-500 @else  @enderror rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#6A64F1] focus:border-transparent" />
                    @error('tanggal_lahir')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="jenis_kelamin" class="block text-sm font-medium text-[#07074D]">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin"
                        class="mt-1 p-2 w-full border @error('jenis_kelamin') border-red-500 @else  @enderror rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#6A64F1] focus:border-transparent">
                        <option value="Laki-laki"
                            {{ old('jenis_kelamin', $anggota->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                        </option>
                        <option value="Perempuan"
                            {{ old('jenis_kelamin', $anggota->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan
                        </option>
                    </select>
                    @error('jenis_kelamin')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="fakultas" class="block text-sm font-medium text-[#07074D]">Fakultas</label>
                    <select name="fakultas" id="fakultas"
                        class="mt-1 p-2 w-full border @error('fakultas') border-red-500 @else  @enderror rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#6A64F1] focus:border-transparent">
                        @foreach (['fkip', 'feb', 'faktek', 'fapetrik', 'fikes', 'fai', 'hukum'] as $f)
                            <option value="{{ $f }}"
                                {{ old('fakultas', $anggota->fakultas) == $f ? 'selected' : '' }}>
                                {{ strtoupper($f) }}</option>
                        @endforeach
                    </select>
                    @error('fakultas')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="jurusan" class="block text-sm font-medium text-[#07074D]">Jurusan</label>
                    <input type="text" name="jurusan" id="jurusan" value="{{ old('jurusan', $anggota->jurusan) }}"
                        class="mt-1 p-2 w-full border @error('jurusan') border-red-500 @else  @enderror rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#6A64F1] focus:border-transparent" />
                    @error('jurusan')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="angkatan" class="block text-sm font-medium text-[#07074D]">Angkatan</label>
                    <input type="text" name="angkatan" id="angkatan" value="{{ old('angkatan', $anggota->angkatan) }}"
                        class="mt-1 p-2 w-full border @error('angkatan') border-red-500 @else  @enderror rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#6A64F1] focus:border-transparent" />
                    @error('angkatan')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-2">
                    <label for="foto" class="block text-sm font-medium text-[#07074D]">Foto Anggota</label>

                    <input type="file" name="foto" id="foto"
                        class="mt-1 p-2 w-full border @error('foto') border-red-500 @else  @enderror rounded-md shadow-sm bg-white focus:outline-none focus:ring-2 focus:ring-[#6A64F1] focus:border-transparent" />
                    @error('foto')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-2 flex justify-between mt-4">
                    <a href="{{ route('adminUkmDetailAnggota', $anggota->id) }}"
                        class="bg-gray-500 hover:bg-gray-700 text-white py-2 px-4 rounded transition duration-300">
                        Back
                    </a>
                    <button type="submit"
                        class="bg-[#6A64F1] hover:bg-indigo-600 text-white py-2 px-6 rounded transition duration-300">
                        Edit Anggota
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
