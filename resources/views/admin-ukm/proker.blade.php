@extends('component.admin-layout')

@section('title', 'Program Kerja UKM')

@section('content')



    <div class="bg-gray-100 min-h-screen p-6">
        <div class="mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">Proker UKM </h1>
        </div>
        <div class="container mx-auto bg-white shadow rounded-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <a href="{{ route('adminUkmTambahProker') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">
                    + Tambah proker
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="py-2 px-4 border">No</th>
                            <th class="py-2 px-4 border">Nama Program Kerja</th>
                            <th class="py-2 px-4 border">Bidang</th>
                            <th class="py-2 px-4 border">Status</th>
                            <th class="py-2 px-4 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($proker as $index => $item)
                            <tr class="border-b text-center">
                                <td class="py-2 px-4 border">{{ $index + 1 }}</td>
                                <td class="py-2 px-4 border">{{ $item->nama }}</td>
                                <td class="py-2 px-4 border capitalize">{{ $item->bidang }}</td>
                                <td class="py-2 px-4 border capitalize">{{ $item->status }}</td>

                                <td class="py-2 px-4 border">
                                    <a href="{{ route('adminUkmDetailProker', $item->id) }}"
                                        class="text-blue-500 hover:underline">Detail</a>
                                    |
                                    <form action="{{ route('adminUkmDeleteProker.delete', $item->id) }}" method="POST"
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
                                <td colspan="4" class="text-center py-4 text-gray-600">Belum Ada proker
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
