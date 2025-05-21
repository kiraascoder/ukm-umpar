@extends('component.admin-layout')

@section('title', 'Daftar UKM')

@section('content')
    <div class="bg-gray-100 min-h-screen p-6">
        <h1 class="text-2xl text-gray-800 mb-6">Daftar UKM</h1>
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
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($ukms->isEmpty())
                <div class="text-center text-gray-500 py-10">
                    Belum ada Surat.
                </div>
            @endif
        </div>
    </div>
@endsection
