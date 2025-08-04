@extends('component.admin-layout')

@section('title', 'Detail UKM')

@section('content')
    @if (session('success'))
        <div class="mb-4 max-w-5xl mx-auto px-4 py-3 bg-green-100 text-green-700 rounded-md shadow">
            {{ session('success') }}
        </div>
    @endif

    <div class="max-w-5xl mx-auto mt-10 p-6 bg-white shadow-xl rounded-2xl space-y-8">
        <!-- Header -->
        <div class="flex items-center space-x-6">
            <img src="{{ asset('storage/' . $ukm->logo) }}" alt="Logo UKM"
                class="w-24 h-24 rounded-full object-cover border-2 border-indigo-500 shadow">
            <div>
                <h2 class="text-3xl font-bold text-gray-900">{{ $ukm->nama }}</h2>
                <h2 class="text-sm font-bold text-gray-900">{{ $ukm->admin->email }}</h2>
                <p class="text-gray-600 mt-1">Saldo:
                    <span class="font-semibold text-green-600">Rp {{ number_format($ukm->saldo, 0, ',', '.') }}</span>
                </p>
            </div>
        </div>

        <!-- Info Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h3 class="text-lg font-semibold text-indigo-700 mb-1">Deskripsi</h3>
                <p class="text-gray-700">{{ $ukm->deskripsi }}</p>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-indigo-700 mb-1">Sejarah</h3>
                <p class="text-gray-700">{{ $ukm->sejarah }}</p>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-indigo-700 mb-1">Visi</h3>
                <p class="text-gray-700">{{ $ukm->visi }}</p>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-indigo-700 mb-1">Misi</h3>
                <div class="text-gray-700 mt-2">
                    {!! nl2br(e($ukm->misi)) !!}
                </div>
            </div>
        </div>

        <!-- Struktur Organisasi -->
        <div>
            <h3 class="text-lg font-semibold text-indigo-700 mb-1">Struktur Organisasi</h3>
            <img src="{{ asset('storage/' . $ukm->struktur_organisasi) }}" alt="Struktur Organisasi"
                class="w-full rounded-lg shadow-md">
        </div>

        <!-- Foto Pengurus -->
        <div>
            <h3 class="text-lg font-semibold text-indigo-700 mb-1">Foto Pengurus</h3>
            <img src="{{ asset('storage/' . $ukm->foto_pengurus) }}" alt="Foto Pengurus"
                class="w-full rounded-lg shadow-md">
        </div>

        <!-- Media Sosial -->
        <div>
            <h3 class="text-lg font-semibold text-indigo-700 mb-1">Media Sosial</h3>
            @if ($ukm->media_sosial && is_array(json_decode($ukm->media_sosial, true)))
                <ul class="text-gray-700 space-y-1 list-disc list-inside">
                    @foreach (json_decode($ukm->media_sosial, true) as $platform => $link)
                        <li><span class="font-semibold">{{ ucfirst($platform) }}:</span> {{ $link }}</li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-500">Belum ada media sosial yang ditambahkan.</p>
            @endif
        </div>

        <!-- Daftar Anggota UKM -->
        <div>
            <h3 class="text-lg font-semibold text-indigo-700 mb-4">Daftar Anggota UKM</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white shadow border border-gray-200 rounded-md">
                    <thead class="bg-indigo-100 text-indigo-800 text-sm font-semibold">
                        <tr>
                            <th class="text-left px-4 py-2">#</th>
                            <th class="text-left px-4 py-2">Nama</th>
                            <th class="text-left px-4 py-2">Jabatan</th>
                            <th class="text-left px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 text-sm divide-y divide-gray-100">
                        @foreach ($anggota as $index => $a)
                            <tr>
                                <td class="px-4 py-2">{{ $anggota->firstItem() + $index }}</td>
                                <td class="px-4 py-2">{{ $a->nama }}</td>
                                <td class="px-4 py-2">{{ $a->jabatan }}</td>
                                <td class="px-4 py-2">
                                    <a href="{{ route('getAnggotaUkm', $a->id) }}"
                                        class="bg-indigo-600 text-white px-3 py-1 rounded-full text-xs hover:bg-indigo-700 transition">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                        @if ($ukm->anggota->isEmpty())
                            <tr>
                                <td colspan="4" class="px-4 py-4 text-center text-gray-500">Belum ada anggota.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $anggota->links() }}
                </div>
            </div>
        </div>

        <!-- Form Ubah Password Admin UKM -->
        <div class="border-t pt-6">
            <h3 class="text-lg font-semibold text-red-600 mb-4">Ubah Password Admin UKM</h3>

            <form action="{{ route('superadmin.ukm.updatePassword', $ukm->admin->id) }}" method="POST"
                class="space-y-4 max-w-md">
                @csrf
                @method('PUT')

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password Baru</label>
                    <input type="password" name="password" id="password" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-indigo-500">
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password
                        Baru</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-indigo-500">
                </div>

                <div>
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-md hover:bg-red-700 transition">
                        Ubah Password
                    </button>
                </div>
            </form>
        </div>

        <!-- Tombol Kembali -->
        <div class="pt-6">
            <a href="/admin/dashboard"
                class="inline-flex items-center gap-2 px-5 py-2.5 bg-gray-700 text-white text-sm font-medium rounded-full shadow hover:bg-gray-800 transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
                Kembali ke Dashboard
            </a>
        </div>
    </div>
@endsection
