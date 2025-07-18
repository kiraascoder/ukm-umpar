@extends('component.admin-layout')

@section('title', 'Keuangan UKM')

@section('content')
    <script src="https://unpkg.com/alpinejs" defer></script>

    <div class="bg-gray-100 min-h-screen p-6" x-data="{
        openModal: null,
        selectedJudul: '',
        deleteUrl: '',
        openEditSaldo: false,
        showDeleteModal: false
    }">

        <h1 class="text-2xl text-gray-800 mb-6">Manajemen Keuangan UKM</h1>

        <div class="lg:col-span-3 w-full bg-white p-6 rounded-2xl shadow overflow-auto">
            <div class="flex items-center justify-between mb-4">
                <h1 class="text-2xl font-semibold text-gray-800">
                    Saldo UKM : Rp {{ number_format($ukmSaldo, 0, ',', '.') }}
                </h1>
                <div class="flex gap-2">
                    <a href="{{ route('adminUkmTambahKeuangan') }}"
                        class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md shadow">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Tambah Transaksi
                    </a>

                    <button @click="openEditSaldo = true"
                        class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md shadow">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                        </svg>
                        Tambah Saldo
                    </button>
                    <div class="flex gap-2">
                        <a href="{{ route('adminUkmKeuangan.download') }}"
                            class="inline-flex items-center gap-2 px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-md shadow">
                            Download Rekap Keuangan (CSV)
                        </a>

                    </div>
                </div>

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
                        <th class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">Keterangan</th>
                        <th class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">Jumlah</th>
                        <th class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">Jenis</th>
                        <th class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">Dokumen</th>
                        <th class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse ($keuangan as $index => $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-gray-700">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 text-gray-700">{{ $item->keterangan }}</td>
                            <td class="px-6 py-4 text-gray-700">Rp {{ number_format($item->jumlah, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 text-gray-700 capitalize">{{ $item->jenis }}</td>
                            <td class="px-6 py-4 text-gray-700">{{ $item->tanggal }}</td>
                            <td class="px-6 py-4 text-blue-600 hover:underline">
                                <a href="{{ asset('storage/' . $item->bukti_transaksi) }}" target="_blank">Lihat Dokumen</a>
                            </td>
                            <td class="px-6 py-4 flex gap-2">
                                <a href="{{ route('adminUkmEditKeuangan', $item->id) }}"
                                    class="text-blue-600 hover:text-blue-800 text-xs font-medium">Edit</a>

                                <button type="button"
                                    @click="selectedJudul = '{{ $item->keterangan }}';
                                            deleteUrl = '{{ route('adminUkmKeuangan.delete', $item->id) }}';
                                            showDeleteModal = true"
                                    class="text-red-600 hover:text-red-800 text-xs font-medium">
                                    Hapus
                                </button>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-gray-500 py-10">Belum ada Transaksi</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>


        <div x-show="showDeleteModal" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90"
            class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50" x-cloak>
            <div class="bg-white p-6 rounded-xl shadow-xl max-w-md w-full text-center">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Yakin ingin menghapus?</h2>
                <p class="text-gray-600 mb-6">Transaksi <strong x-text="selectedJudul"></strong> akan dihapus secara
                    permanen.</p>
                <div class="flex justify-center gap-4">
                    <form :action="deleteUrl" method="POST" @submit="showDeleteModal = false">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-md">Hapus</button>
                    </form>
                    <button @click="showDeleteModal = false"
                        class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-md">Batal</button>
                </div>

            </div>
        </div>


        <div x-show="openEditSaldo" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90"
            class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50" x-cloak>
            <div class="bg-white p-6 rounded-xl shadow-xl max-w-md w-full">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Edit Saldo Awal</h2>
                <form action="{{ route('adminUkmUpdateSaldo.update', $ukm->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm mb-1">Saldo Awal</label>
                        <input type="number" name="saldo" value="{{ $ukmSaldo }}"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                    <div class="flex justify-end gap-3">
                        <button type="button" @click="openEditSaldo = false"
                            class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-md">Batal</button>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
