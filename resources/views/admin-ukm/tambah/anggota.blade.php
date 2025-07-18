@extends('component.admin-layout')

@section('title', 'Tambah Anggota UKM')

@section('content')
    <div class="bg-gray-100 min-h-screen py-10">
        <div class="container mx-auto">
            <div class="max-w-7xl mx-auto bg-white p-8 shadow-lg rounded-lg">
                <h2 class="text-2xl mb-6 text-center">Tambah Anggota Profil UKM</h2>
                <form action="{{ route('adminUkmAnggota.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block font-medium text-gray-700">Nama</label>
                            <input type="text" name="nama" class="mt-1 p-2 w-full border rounded-md"
                                value="{{ old('nama') }}">
                            @error('nama')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="block font-medium text-gray-700">Jabatan</label>
                            <select id="jabatanSelect" name="jabatan" class="mt-1 p-2 w-full border rounded-md"
                                onchange="toggleInput(this)">
                                <option value="Ketua Umum" {{ old('jabatan') == 'Ketua Umum' ? 'selected' : '' }}>Ketua
                                    Umum
                                </option>
                                <option value="Bendahara" {{ old('jabatan') == 'Bendahara' ? 'selected' : '' }}>Bendahara
                                </option>
                                <option value="Sekretaris" {{ old('jabatan') == 'Sekretaris' ? 'selected' : '' }}>Sekretaris
                                </option>
                                <option value="Ketua Bidang" {{ old('jabatan') == 'Ketua Bidang' ? 'selected' : '' }}>Ketua
                                    Bidang</option>
                                <option value="lainnya" {{ old('jabatan') == 'lainnya' ? 'selected' : '' }}>Lainnya...
                                </option>
                            </select>
                            <input type="text" id="jabatanInput" name="jabatan_custom"
                                class="mt-2 p-2 w-full border rounded-md hidden" placeholder="Masukkan jabatan lain..."
                                value="{{ old('jabatan_custom') }}">
                            @error('jabatan')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label class="block font-medium text-gray-700">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="mt-1 p-2 w-full border rounded-md"
                                value="{{ old('tempat_lahir') }}">
                            @error('tempat_lahir')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="block font-medium text-gray-700">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="mt-1 p-2 w-full border rounded-md"
                                value="{{ old('tanggal_lahir') }}">
                            @error('tanggal_lahir')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label class="block font-medium text-gray-700">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin"
                                class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
                                <option value="" selected>-- Pilih Jenis Kelamin --</option>
                                <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>
                                    Laki-laki
                                </option>
                                <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan
                                </option>
                            </select>
                            @error('jenis_kelamin')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label class="block font-medium text-gray-700">Fakultas</label>
                            <select name="fakultas" id="fakultas"
                                class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
                                <option value="" selected>-- Pilih Fakultas --</option>
                                <option value="fkip" {{ old('fakultas') == 'fkip' ? 'selected' : '' }}>FKIP</option>
                                <option value="feb" {{ old('fakultas') == 'feb' ? 'selected' : '' }}>FEB</option>
                                <option value="faktek" {{ old('fakultas') == 'faktek' ? 'selected' : '' }}>Teknik</option>
                                <option value="fapetrik" {{ old('fakultas') == 'fapetrik' ? 'selected' : '' }}>FAPETRIK
                                </option>
                                <option value="fikes" {{ old('fakultas') == 'fikes' ? 'selected' : '' }}>FIKES</option>
                                <option value="fai" {{ old('fakultas') == 'fai' ? 'selected' : '' }}>FAI</option>
                                <option value="hukum" {{ old('fakultas') == 'hukum' ? 'selected' : '' }}>HUKUM</option>
                            </select>
                            @error('fakultas')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="block font-medium text-gray-700">Jurusan</label>
                            <select name="jurusan" id="jurusan"
                                class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
                                <option value="" selected>-- Pilih Jurusan --</option>
                            </select>
                            @error('jurusan')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label class="block font-medium text-gray-700">Angkatan</label>
                            <input type="text" name="angkatan" class="mt-1 p-2 w-full border rounded-md"
                                value="{{ old('angkatan') }}">
                            @error('angkatan')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label class="block font-medium text-gray-700">Foto Anggota</label>
                            <input type="file" name="foto" class="mt-1 p-2 w-full border rounded-md">
                            @error('foto')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
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

    <script>
        const jurusanByFakultas = {
            fkip: [
                "Pendidikan Matematika",
                "Pendidikan Bahasa Inggris",
                "Pendidikan Non Formal",
                "Pendidikan Biologi"
            ],
            feb: [
                "Ekonomi Pembangunan",
                "Akuntansi",
                "Prodi Manajemen",
                "Perbankan Syariah"
            ],
            faktek: [
                "Teknik Sipil",
                "Teknik Elektro",
                "Teknik Informatika",
                "Perencanaan Wilayah Kota (PWK)"
            ],
            fapetrik: [
                "Agribisnis",
                "Agroteknologi",
                "Budidaya Perairan",
                "Peternakan"
            ],
            fai: [
                "Pendidikan Agama Islam",
                "Pendidikan Islam Anak Usia Dini",
                "Bimbingan dan Penyuluhan Islam"
            ],
            fikes: [
                "Kesehatan Masyarakat",
                "Gizi"
            ],
            hukum: [
                "Ilmu Hukum"
            ]
        };
        document.getElementById("fakultas").addEventListener("change", function() {
            let fakultas = this.value;
            let jurusanSelect = document.getElementById("jurusan");
            jurusanSelect.innerHTML = '<option value="" selected>-- Pilih Jurusan --</option>';

            if (fakultas && jurusanByFakultas[fakultas]) {
                jurusanByFakultas[fakultas].forEach(jurusan => {
                    let option = document.createElement("option");
                    option.value = jurusan.toLowerCase().replace(/\s+/g, " ");
                    option.textContent = jurusan;
                    jurusanSelect.appendChild(option);
                });
            }
        });

        function toggleInput(select) {
            var input = document.getElementById('jabatanInput');
            if (select.value === 'lainnya') {
                input.classList.remove('hidden');
                input.setAttribute('name', 'jabatan');
                select.removeAttribute('name');
                input.focus();
            } else {
                input.classList.add('hidden');
                input.removeAttribute('name');
                select.setAttribute('name', 'jabatan');
            }
        }
    </script>
@endsection
