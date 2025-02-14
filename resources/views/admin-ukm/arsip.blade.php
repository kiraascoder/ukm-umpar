@extends('component.admin-layout')

@section('title', 'Arsip Surat UKM')

@section('content')
    <div class="bg-gray-100 min-h-screen p-6">
        <div class="container mx-auto bg-white shadow rounded-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-xl font-bold">Arsip Surat</h1>
                <a href="{{ route('adminUkmTambahSurat') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">
                    + Tambah Surat
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="py-2 px-4 border">No</th>
                            <th class="py-2 px-4 border">Judul</th>
                            <th class="py-2 px-4 border">Jenis Surat</th>
                            <th class="py-2 px-4 border">Dokumen</th>
                            <th class="py-2 px-4 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($surats as $index => $item)
                            <tr class="border-b text-center">
                                <td class="py-2 px-4 border">{{ $index + 1 }}</td>
                                <td class="py-2 px-4 border">{{ $item->judul }}</td>
                                <td class="py-2 px-4 border capitalize">{{ $item->jenis_surat }}</td>
                                <td class="py-2 px-4 border">
                                    <a href="{{ asset('storage/' . $item->file_path) }}" target="_blank"
                                        class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                        Lihat File
                                    </a>
                                </td>

                                <td class="py-2 px-4 border">
                                    <a href="{{ route('adminUkmEditArsipSurat', $item->id) }}"
                                        class="text-blue-500 hover:underline">Edit</a>
                                    |
                                    <form action="{{ route('adminUkmHapusSurat', $item->id) }}" method="POST"
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
                                <td colspan="4" class="text-center py-4 text-gray-600">Belum Ada Arsip Surat
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
