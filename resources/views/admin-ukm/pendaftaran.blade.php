@extends('component.admin-layout')

@section('title', 'Pendaftaran UKM')

@section('content')
    <div class="bg-gray-100 min-h-screen p-6">
        <div class="container mx-auto bg-white shadow rounded-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-xl font-bold">Tambahkan Informasi Pendaftaran</h1>
                <a href="{{ route('adminUkmTambahPendaftaran') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">
                    + Tambah Pendaftaran
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="py-2 px-4 border">No</th>
                            <th class="py-2 px-4 border">Nama Pendaftaran</th>
                            <th class="py-2 px-4 border">Batas Pendaftaran</th>
                            <th class="py-2 px-4 border">Brosur</th>
                            <th class="py-2 px-4 border">Link Pendaftaran</th>
                            <th class="py-2 px-4 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pendaftaran as $index => $item)
                            <tr class="border-b">
                                <td class="py-2 px-4 border">{{ $index + 1 }}</td>
                                <td class="py-2 px-4 border">{{ $item->pendaftaran }}</td>
                                <td class="py-2 px-4 border">{{ $item->batas_pendaftaran }}</td>
                                <td class="py-2 px-4 border">
                                    <a href="{{ asset('storage/' . $item->brosur) }}" target="_blank"
                                        class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                        Lihat File
                                    </a>
                                </td>
                                <td class="py-2 px-4 border">{{ $item->link_pendaftaran }}</td>
                                <td class="py-2 px-4 border">
                                    <a href="{{ route('adminUkmDetailPendaftaran', $item->id) }}"
                                        class="text-blue-500 hover:underline">Detail</a> |
                                    <form action="{{ route('adminUkmPendaftaran.delete', $item->id) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline"
                                            onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4 text-gray-600">Belum ada anggota yang terdaftar.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
