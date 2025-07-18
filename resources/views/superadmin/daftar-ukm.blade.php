@extends('component.admin-layout')

@section('title', 'Daftar UKM')

@section('content')


    <script src="https://unpkg.com/alpinejs" defer></script>
    <div class="bg-gray-100 min-h-screen p-6" x-data="{ openModal: null, selectedNama: '', deleteUrl: '', confirmText: '' }">
        <h1 class="text-2xl text-gray-800 mb-6">Daftar UKM</h1>
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
        <div class="lg:col-span-3 w-full bg-white p-6 rounded-2xl shadow overflow-auto">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold text-gray-700">Daftar UKM UMPAR</h2>
            </div>
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">Nama UKM</th>
                        <th class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">Ketua Umum</th>
                        <th class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @foreach ($ukms as $index => $ukm)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-gray-700">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 text-gray-700">{{ $ukm->nama }}</td>
                            <td class="px-6 py-4 text-gray-700">
                                {{ $ukm->anggota->first()->nama ?? 'Belum ada Ketua Umum' }}
                            </td>
                            <td class="px-6 py-4 flex gap-2">
                                <a href="{{ route('detailUkm', $ukm->id) }}"
                                    class="text-blue-600 hover:text-blue-800 text-xs font-medium">Detail</a>
                                |
                                <button type="button"
                                    @click="openModal = {{ $ukm->id }}; selectedNama = '{{ $ukm->nama }}'; deleteUrl = '{{ route('hapusUkm.delete', $ukm->id) }}'; confirmText = ''"
                                    class="text-red-600 hover:text-red-800 text-xs font-medium">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @if ($ukms->isEmpty())
                <div class="text-center text-gray-500 py-10">
                    Belum ada UKM.
                </div>
            @endif
        </div>

        {{-- Modal Hapus --}}
        <div x-cloak x-show="openModal" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90"
            class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
            <div class="bg-white p-6 rounded-xl shadow-xl w-96">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Konfirmasi Hapus</h2>
                <p class="text-sm text-gray-600 mb-4">Ketik <strong>"HAPUS"</strong> untuk menghapus UKM <strong
                        x-text="selectedNama"></strong>.</p>
                <input type="text" x-model="confirmText" class="w-full px-3 py-2 border rounded mb-4"
                    placeholder="Ketik 'HAPUS'">
                <div class="flex justify-end gap-4">
                    <button @click="openModal = null"
                        class="px-4 py-2 text-sm bg-gray-200 hover:bg-gray-300 rounded">Batal</button>
                    <form :action="deleteUrl" method="POST" x-show="confirmText === 'HAPUS'">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm rounded">
                            Hapus
                        </button>
                    </form>
                </div>
                <template x-if="confirmText !== 'HAPUS'">
                    <p class="text-xs text-red-500 mt-2">Anda harus mengetik "HAPUS" untuk menghapus.</p>
                </template>
            </div>
        </div>
    </div>
@endsection
