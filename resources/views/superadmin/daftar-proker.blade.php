@extends('component.admin-layout')

@section('title', 'Daftar Proker UKM')

@section('content')



    <div class="bg-gray-100 min-h-screen p-6">
        <div class="mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">Daftar Proker UKM</h1>
        </div>
        <div class="container mx-auto bg-white shadow rounded-lg p-6">
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="py-2 px-4 border">No</th>
                            <th class="py-2 px-4 border">Nama UKM</th>
                            <th class="py-2 px-4 border">Judul Proker</th>
                            <th class="py-2 px-4 border">Bidang</th>
                            <th class="py-2 px-4 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($proker as $index => $item)
                            <tr class="border-b text-center">
                                <td class="py-2 px-4 border">{{ $index + 1 }}</td>
                                <td class="py-2 px-4 border">{{ $item->ukm->nama }}</td>
                                <td class="py-2 px-4 border">{{ $item->nama }}</td>
                                <td class="py-2 px-4 border capitalize">{{ $item->bidang }}</td>
                                <td class="py-2 px-4 border">
                                    <a href="{{ route('prokerUkm', $item->id) }}"
                                        class="text-blue-500 hover:underline">Detail</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4 text-gray-600">Belum Ada Program Kerja
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
