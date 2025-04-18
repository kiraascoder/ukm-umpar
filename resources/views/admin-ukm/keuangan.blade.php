@extends('component.admin-layout')

@section('title', 'Keuangan UKM')

@section('content')
    <div x-data="{ openModal: false }" class="bg-gray-100 min-h-screen p-6">
        <h1 class="text-2xl text-gray-800 mb-6">Manajemen Keuangan UKM</h1>
        <div class="lg:col-span-3 w-full bg-white p-6 rounded-2xl shadow overflow-auto">
            <div class="flex items-center justify-between mb-4">
                <h1 class="text-2xl font-semibold text-gray-800">Saldo UKM : Rp
                    {{ number_format($ukmSaldo, 0, ',', '.') }}</h1>
                <div class="button flex gap-2">
                    <a href="{{ route('adminUkmTambahKeuangan') }}"
                        class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md shadow">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Tambah Transaksi
                    </a>
                    <button @click="openModal = true"
                        class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md shadow">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                        </svg>
                        Edit Saldo Awal
                    </button>
                </div>
            </div>

            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">Keterangan</th>
                        <th class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">Jumlah</th>
                        <th class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">Jenis Transaksi
                        </th>
                        <th class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">Dokumen</th>
                        <th class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @foreach ($keuangan as $index => $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-gray-700">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 text-gray-700">{{ $item->keterangan }}</td>
                            <td class="px-6 py-4 text-gray-700">{{ $item->jumlah }}</td>
                            <td class="px-6 py-4 text-gray-700 capitalize">{{ $item->jenis }}</td>
                            <td class="px-6 py-4 text-gray-700">{{ $item->tanggal }}</td>
                            <td class="px-6 py-4 text-blue-600 hover:underline">
                                <a href="{{ asset('storage/' . $item->bukti_transaksi) }}" target="_blank">
                                    Lihat Dokumen
                                </a>
                            </td>
                            <td class="px-6 py-4 flex gap-2">
                                <a href="{{ route('adminUkmEditKeuangan', $item->id) }}"
                                    class="text-blue-600 hover:text-blue-800 text-xs font-medium">Edit</a>
                                <form action="{{ route('adminUkmKeuangan.delete', $item->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus anggota ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-red-600 hover:text-red-800 text-xs font-medium">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @if ($keuangan->isEmpty())
                <div class="text-center text-gray-500 py-10">
                    Belum ada Transaksi
                </div>
            @endif
        </div>


        <div x-show="openModal" x-cloak
            class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
            <div @click.away="openModal = false" class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Edit Saldo Awal</h2>

                <form method="POST" action="{{ route('adminUkmUpdateSaldo.update', $ukm->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="saldo" class="block text-sm font-medium text-gray-700">Saldo Awal</label>
                        <input type="number" name="saldo" id="saldo_awal"
                            value="{{ old('saldo_awal', $ukm->saldo_awal) }}"
                            class="mt-1 block w-full px-4 py-2 border rounded-md focus:ring focus:ring-blue-200 focus:outline-none"
                            required>
                    </div>

                    <div class="flex justify-end gap-2">
                        <button type="button" @click="openModal = false"
                            class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-700 rounded-md">
                            Batal
                        </button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
