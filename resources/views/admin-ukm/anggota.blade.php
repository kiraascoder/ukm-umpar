@extends('component.admin-layout')

@section('title', 'Anggota UKM')

@section('content')
    <div class="bg-gray-100 min-h-screen p-6">
        <div class="container mx-auto bg-white shadow rounded-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-xl font-bold">Daftar Anggota UKM</h1>
                <a href="{{ route('adminUkmTambahAnggota') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">
                    + Tambah Anggota
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="py-2 px-4 border">No</th>
                            <th class="py-2 px-4 border">Nama</th>
                            <th class="py-2 px-4 border">Jabatan</th>
                            <th class="py-2 px-4 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($anggota as $index => $item)
                            <tr class="border-b">
                                <td class="py-2 px-4 border">{{ $index + 1 }}</td>
                                <td class="py-2 px-4 border">{{ $item->nama }}</td>
                                <td class="py-2 px-4 border">{{ $item->jabatan }}</td>
                                <td class="py-2 px-4 border">
                                    <a href="{{ route('adminUkmEditAnggota', $item->id) }}"
                                        class="text-blue-500 hover:underline">Edit</a> |
                                    <form action="{{ route('adminUkmHapusAnggota', $item->id) }}" method="POST"
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
