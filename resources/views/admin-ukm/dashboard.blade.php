@extends('component.admin-layout')

@section('title', 'Dashboard Admin UKM')

@section('content')
    <div class="p-6 bg-gray-100 min-h-screen">
        <!-- Header Dashboard -->
        <div class="mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">Dashboard Admin UKM {{ $nama_ukm }}</h1>
            <p class="text-gray-600">Selamat datang, {{ Auth::user()->name }}! Kelola data UKM dengan mudah.</p>
        </div>

        <!-- Statistik -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <div class="p-5 bg-white rounded-lg shadow-md">
                <h2 class="text-lg font-semibold text-gray-700">Total Anggota</h2>
                <p class="text-2xl font-bold text-blue-600">12</p>
            </div>
            <div class="p-5 bg-white rounded-lg shadow-md">
                <h2 class="text-lg font-semibold text-gray-700">Surat Masuk</h2>
                <p class="text-2xl font-bold text-green-600">245</p>
            </div>
            <div class="p-5 bg-white rounded-lg shadow-md">
                <h2 class="text-lg font-semibold text-gray-700">Surat Keluar</h2>
                <p class="text-2xl font-bold text-red-600">5</p>
            </div>
        </div>

        <!-- Tabel Data UKM -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Daftar Program Kerja</h2>
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border p-3">Bidang</th>
                        <th class="border p-3">Ketua Bidang</th>
                        <th class="border p-3">Nama Program Kerja</th>
                        <th class="border p-3">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border p-3">UKM Robotika</td>
                        <td class="border p-3">Teknologi</td>
                        <td class="border p-3 text-green-600">Aktif</td>
                        <td class="border p-3">
                            <button class="px-3 py-1 bg-blue-500 text-white rounded">Detail</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="border p-3">UKM Seni Tari</td>
                        <td class="border p-3">Seni & Budaya</td>
                        <td class="border p-3 text-red-600">Pending</td>
                        <td class="border p-3">
                            <button class="px-3 py-1 bg-blue-500 text-white rounded">Detail</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
