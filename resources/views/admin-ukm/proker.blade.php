@extends('component.admin-layout')

@section('title', 'Program Kerja UKM')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <div class="bg-gray-100 min-h-screen p-6">
        <h1 class="text-2xl text-gray-800 mb-6">Program Kerja UKM</h1>
        <div class="lg:col-span-3 w-full bg-white p-6 rounded-2xl shadow overflow-auto">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold text-gray-700">Daftar Program Kerja UKM</h2>
                <a href="{{ route('adminUkmTambahProker') }}"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md shadow">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Tambah Program Kerja
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
                        <th class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">Bidang</th>
                        <th class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">Deskripsi</th>
                        <th class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @foreach ($proker as $index => $item)
                        <tr class="hover:bg-gray-50" x-data="{ showDeleteModal{{ $item->id }}: false }">
                            <td class="px-6 py-4 text-gray-700">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 text-gray-700">{{ $item->nama }}</td>
                            <td class="px-6 py-4 text-gray-700">{{ $item->bidang }}</td>
                            <td class="px-6 py-4 text-gray-700">{{ $item->deskripsi }}</td>
                            <td class="px-6 py-4 text-gray-700 capitalize">{{ $item->status }}</td>
                            <td class="px-6 py-4 flex gap-2">
                                <a href="{{ route('adminUkmEditProker', $item->id) }}"
                                    class="text-blue-600 hover:text-blue-800 text-xs font-medium">Edit</a>


                                <button @click="showDeleteModal{{ $item->id }} = true"
                                    class="text-red-600 hover:text-red-800 text-xs font-medium">
                                    Hapus
                                </button>


                                <div x-show="showDeleteModal{{ $item->id }}" x-cloak
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                    x-transition:leave="transition ease-in duration-200"
                                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                                    <div @click.away="showDeleteModal{{ $item->id }} = false"
                                        x-show="showDeleteModal{{ $item->id }}"
                                        x-transition:enter="transition transform ease-out duration-300"
                                        x-transition:enter-start="scale-90 opacity-0"
                                        x-transition:enter-end="scale-100 opacity-100"
                                        x-transition:leave="transition transform ease-in duration-200"
                                        x-transition:leave-start="scale-100 opacity-100"
                                        x-transition:leave-end="scale-90 opacity-0"
                                        class="bg-white rounded-lg p-6 w-full max-w-md shadow-xl">
                                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Konfirmasi Hapus</h2>
                                        <p class="text-gray-600 mb-6">Yakin ingin menghapus <b>{{ $item->nama }}</b>?
                                            Tindakan ini tidak bisa dibatalkan.</p>

                                        <div class="flex justify-end space-x-3">
                                            <button @click="showDeleteModal{{ $item->id }} = false"
                                                class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">
                                                Batal
                                            </button>
                                            <form action="{{ route('adminUkmDeleteProker.delete', $item->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @if ($proker->isEmpty())
                <div class="text-center text-gray-500 py-10">
                    Belum ada Program Kerja.
                </div>
            @endif
        </div>
    </div>
@endsection
