@extends('component.admin-layout')

@section('title', 'Dashboard Superadmin')

@section('content')

    <div class="p-6 bg-gray-100 space-y-6">

        <!-- Welcome Message -->
        <div class="bg-white rounded-2xl shadow p-6 flex flex-col justify-between">
            <h2 class="text-xl font-semibold text-gray-800 mb-2">Selamat Datang Superadmin 👋</h2>
            <p class="text-sm text-gray-600">Kelola seluruh UKM dan administrasi kampus melalui panel ini.</p>
        </div>

        <!-- Statistik Utama -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-blue-100 rounded-2xl p-6 text-center shadow">
                <h3 class="text-md font-semibold text-blue-700">Jumlah UKM</h3>
                <p class="text-4xl font-bold text-blue-900 mt-2">{{ $jumlahUkm }}</p>
            </div>
        </div>


        <!-- Kegiatan Terbaru -->
        {{-- <div class="bg-white rounded-2xl shadow p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">🗓️ Kegiatan Terbaru UKM</h2>
                @if ($kegiatanTerbaru)
                    <div class="p-4 border rounded-lg bg-gray-50">
                        <h3 class="text-md font-bold text-gray-800">{{ $kegiatanTerbaru->judul }}</h3>
                        <p class="text-sm text-gray-600 mt-1">{{ $kegiatanTerbaru->deskripsi }}</p>
                        <p class="text-xs text-gray-500 mt-2">Tanggal: {{ $kegiatanTerbaru->created_at->format('d M Y') }}
                        </p>
                    </div>
                @else
                    <p class="text-sm text-gray-600">Belum ada kegiatan terbaru.</p>
                @endif
            </div> --}}
    </div>

    </div>

@endsection
