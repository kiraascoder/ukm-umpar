@extends('component.admin-layout')

@section('title', 'Arsip Surat UKM')

@section('content')
    <script src="https://unpkg.com/alpinejs" defer></script>
    <div class="bg-gray-100 min-h-screen p-6" x-data="{ openModal: null, selectedJudul: '', deleteUrl: '' }">
        <h1 class="text-2xl text-gray-800 mb-6">Surat UKM</h1>
        <div class="lg:col-span-3 w-full bg-white p-6 rounded-2xl shadow overflow-auto">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold text-gray-700">Daftar Surat UKM</h2>
                <a href="{{ route('adminUkmTambahSurat') }}"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md shadow">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Tambah Surat
                </a>
            </div>
            @if (session('success'))
                <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" x-transition
                    class="mb-4 px-4 py-3 rounded-lg bg-green-100 border border-green-300 text-green-800 shadow-md"
                    role="alert">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span><strong>Sukses!</strong> {{ session('success') }}</span>
                    </div>
                </div>
            @endif
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">Judul</th>
                        <th class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">Jenis</th>
                        <th class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">Dokumen</th>
                        <th class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @foreach ($surats as $index => $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-gray-700">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 text-gray-700">{{ $item->judul }}</td>
                            <td class="px-6 py-4 text-gray-700 capitalize">{{ $item->jenis_surat }}</td>
                            <td class="px-6 py-4 text-blue-600 hover:underline">
                                <a href="{{ asset('storage/' . $item->file_path) }}" target="_blank">
                                    Lihat Dokumen
                                </a>
                            </td>
                            <td class="px-6 py-4 flex gap-2">
                                <a href="{{ route('adminUkmEditArsipSurat', $item->id) }}"
                                    class="text-blue-600 hover:text-blue-800 text-xs font-medium">Edit</a>
                                <form action="{{ route('adminUkmHapusSurat', $item->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus anggota ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button"
                                        @click="openModal = {{ $item->id }}; selectedJudul = '{{ $item->judul }}'; deleteUrl = '{{ route('adminUkmHapusSurat', $item->id) }}'"
                                        class="text-red-600 hover:text-red-800 text-xs font-medium">
                                        Hapus
                                    </button>

                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($surats->isEmpty())
                <div class="text-center text-gray-500 py-10">
                    Belum ada Surat.
                </div>
            @endif
        </div>
        <div x-cloak x-show="openModal" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90"
            class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
            <div class="bg-white p-6 rounded-xl shadow-xl w-96">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Konfirmasi Hapus</h2>
                <p class="text-sm text-gray-600 mb-6">Yakin ingin menghapus surat <strong x-text="selectedJudul"></strong>?
                </p>
                <div class="flex justify-end gap-4">
                    <button @click="openModal = null" class="px-4 py-2 text-sm bg-gray-200 hover:bg-gray-300 rounded">
                        Batal
                    </button>
                    <form :action="deleteUrl" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm rounded">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
