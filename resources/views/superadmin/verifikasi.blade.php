@extends('component.admin-layout')

@section('title', 'Verifikasi UKM')

@section('content')
    <div class="bg-gray-100 min-h-screen p-6">
        <h1 class="text-2xl text-gray-800 mb-6">Verifikasi UKM</h1>
        <div class="lg:col-span-3 w-full bg-white p-6 rounded-2xl shadow overflow-auto">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold text-gray-700">Daftar UKM</h2>
            </div>

            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">Nama Ketua</th>
                        <th class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">Nama UKM</th>
                        <th class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">Ketua Umum</th>
                        <th class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">Nomor HP</th>
                        <th class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @foreach ($adminUKM as $index => $item)
                        <tr class="hover:bg-gray-50 text">
                            <td class="px-6 py-4 text-gray-700">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 text-gray-700">{{ $item->name }}</td>
                            <td class="px-4 py-2">{{ $item->ukm->nama ?? '-' }}</td>
                            <td class="px-6 py-4 text-gray-700">{{ $item->email }}</td>
                            <td class="px-6 py-4 text-gray-700">{{ $item->phone }}</td>
                            <td class="px-6 py-4 text-gray-700 capitalize">
                                <span
                                    class="inline-block px-2 py-1 rounded-full text-xs {{ $item->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $item->status }}
                                </span>

                                <form action="{{ route('verifikasiUkm.update', $item->id) }}" method="POST"
                                    class="inline-block ml-2">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="text-sm text-blue-600 hover:underline">
                                        {{ $item->status === 'active' ? 'Nonaktifkan' : 'Aktifkan' }}
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($adminUKM->isEmpty())
                <div class="text-center text-gray-500 py-10">
                    Belum ada UKM.
                </div>
            @endif
        </div>
    </div>
@endsection
