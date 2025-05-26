@extends('component.admin-layout')

@section('title', 'Detail Proker')

@section('content')
    <div class="max-w-4xl mx-auto py-10 px-6">
        <div class="mb-6 flex items-center gap-4">
            <a href="/admin/proker-ukm"
                class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 text-white rounded-full text-sm hover:bg-indigo-700 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Kembali ke Dashboard
            </a>

            <a href="{{ route('adminUkmDetailProker.download', $proker->id) }}"
                class="inline-flex items-center gap-2 px-4 py-2 bg-red-600 text-white rounded-full text-sm hover:bg-red-700 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Download PDF
            </a>
        </div>


        <div class="bg-white rounded-xl shadow-lg p-8">
            <h2 class="text-2xl font-bold text-indigo-700 mb-6">Detail Program Kerja</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-gray-700 text-sm">
                <div>
                    <p class="font-semibold">Nama UKM:</p>
                    <p class="bg-gray-100 rounded px-4 py-2">{{ $proker->ukm->nama }}</p>
                </div>

                <div>
                    <p class="font-semibold">Nama Proker:</p>
                    <p class="bg-gray-100 rounded px-4 py-2">{{ $proker->nama }}</p>
                </div>

                <div>
                    <p class="font-semibold">Bidang:</p>
                    <p class="bg-gray-100 rounded px-4 py-2">{{ $proker->bidang }}</p>
                </div>

                <div>
                    <p class="font-semibold">Status:</p>
                    <p class="bg-green-100 text-green-800 rounded px-4 py-2 inline-block">{{ $proker->status }}</p>
                </div>

                <div class="md:col-span-2">
                    <p class="font-semibold">Deskripsi:</p>
                    <div class="bg-gray-100 rounded px-4 py-3 leading-relaxed whitespace-pre-line">{{ $proker->deskripsi }}
                    </div>
                </div>

                <div>
                    <p class="font-semibold">Dibuat Pada:</p>
                    <p class="bg-gray-100 rounded px-4 py-2">
                        {{ \Carbon\Carbon::parse($proker->created_at)->format('d M Y H:i') }}</p>
                </div>

                <div>
                    <p class="font-semibold">Diperbarui Pada:</p>
                    <p class="bg-gray-100 rounded px-4 py-2">
                        {{ \Carbon\Carbon::parse($proker->updated_at)->format('d M Y H:i') }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
