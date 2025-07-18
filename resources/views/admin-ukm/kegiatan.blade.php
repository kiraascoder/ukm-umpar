@extends('component.admin-layout')

@section('title', 'Kegiatan UKM')

@section('content')
    <div x-data="{ openModal: null, selectedNama: '', deleteUrl: '' }" class="bg-gray-100 min-h-screen p-6">
        <h1 class="text-2xl text-gray-800 mb-6">Manajemen Kegiatan UKM</h1>
        <div class="lg:col-span-3 w-full bg-white p-6 rounded-2xl shadow overflow-auto">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold text-gray-700">Daftar Kegiatan UKM</h2>
                <a href="{{ route('adminUkmTambahKegiatan') }}"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md shadow">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Tambah Kegiatan
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


            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                @foreach ($kegiatan as $item)
                    <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="relative overflow-hidden">
                            <img src="{{ $item->foto_sampul ? asset('storage/' . $item->foto_sampul) : asset('img/activity.png') }}"
                                class="w-full h-64 object-cover transition-all duration-500 hover:scale-105">
                            <div
                                class="absolute top-4 right-4 bg-[#608BC1] text-white text-sm font-bold px-3 py-1 rounded-full">
                                Kegiatan
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2">{{ $item->nama }}</h3>
                            <p class="text-gray-600 mb-4">
                                {!! Str::limit(strip_tags($item->deskripsi), 100, '...') !!}

                            </p>
                            <div class="flex justify-between">
                                <a href="{{ route('adminUkmDetailKegiatan', ['id' => $item->id]) }}"
                                    class="text-[#608BC1] font-medium hover:text-yellow-600 transition inline-flex items-center">
                                    <span>Lihat Detail</span>
                                    <i class="fas fa-arrow-right ml-2 text-sm"></i>
                                </a>
                                <button type="button"
                                    @click="openModal = {{ $item->id }}; selectedNama = '{{ $item->nama }}'; deleteUrl = '{{ route('adminUkmKegiatan.delete', $item->id) }}'"
                                    class="text-red-600 hover:text-red-800 text-xm font-medium">
                                    Hapus
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div x-cloak x-show="openModal" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90"
            class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
            <div class="bg-white p-6 rounded-xl shadow-xl w-96">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Konfirmasi Hapus</h2>
                <p class="text-sm text-gray-600 mb-6">
                    Yakin ingin menghapus kegiatan <strong x-text="selectedNama"></strong>?
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
