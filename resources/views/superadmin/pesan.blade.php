@extends('component.admin-layout')

@section('title', 'Pesan Masuk')

@section('content')
    <div class="bg-gray-100 min-h-screen p-6" x-data="{ openModal: false, selectedNama: '', deleteUrl: '' }">
        <h1 class="text-2xl text-gray-800 mb-6">Pesan</h1>
        <div class="lg:col-span-3 w-full bg-white p-6 rounded-2xl shadow overflow-auto">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold text-gray-700">Pesan Masuk</h2>
            </div>
            @if ($pesan->isEmpty())
                <div class="text-center text-gray-500 py-10">
                    Belum ada pesan masuk.
                </div>
            @else
                <table class="min-w-full divide-y divide-gray-200 text-sm">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">No</th>
                            <th class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">Nama</th>
                            <th class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">Pesan</th>
                            <th class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @foreach ($pesan as $index => $item)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 text-gray-700">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 text-gray-700">{{ $item->nama }}</td>
                                <td class="px-6 py-4 text-gray-700">{{ $item->email }}</td>
                                <td class="px-6 py-4 text-gray-700">{{ $item->pesan }}</td>
                                <td class="px-6 py-4">
                                    <button
                                        @click="openModal = true; selectedNama = '{{ $item->nama }}'; deleteUrl = '{{ route('pesan.destroy', $item->id) }}'"
                                        class="text-red-600 hover:text-red-800 text-xs font-medium">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        <div x-cloak x-show="openModal" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90"
            class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
            <div class="bg-white p-6 rounded-xl shadow-xl w-96">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Konfirmasi Hapus</h2>
                <p class="text-sm text-gray-600 mb-6">
                    Yakin ingin menghapus pesan dari <strong x-text="selectedNama"></strong>?
                </p>
                <div class="flex justify-end gap-4">
                    <button @click="openModal = false" class="px-4 py-2 text-sm bg-gray-200 hover:bg-gray-300 rounded">
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
