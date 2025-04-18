@extends('component.admin-layout')

@section('title', 'Program Kerja UKM')

@section('content')
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
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-gray-700">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 text-gray-700">{{ $item->nama }}</td>
                            <td class="px-6 py-4 text-gray-700">{{ $item->bidang }}</td>
                            <td class="px-6 py-4 text-gray-700">{{ $item->deskripsi }}</td>
                            <td class="px-6 py-4 text-gray-700 capitalize">{{ $item->status }}</td>
                            <td class="px-6 py-4 flex gap-2">
                                <a href="{{ route('adminUkmEditProker', $item->id) }}"
                                    class="text-blue-600 hover:text-blue-800 text-xs font-medium">Edit</a>
                                <form action="{{ route('adminUkmProker', $item->id) }}" method="POST"
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
            @if ($proker->isEmpty())
                <div class="text-center text-gray-500 py-10">
                    Belum ada Surat.
                </div>
            @endif
        </div>
    </div>
@endsection
