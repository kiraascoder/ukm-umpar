@extends('component.admin-layout')

@section('title', 'Edit Program Kerja UKM')

@section('content')
    <div class="bg-gray-100 min-h-screen py-10 animate-fade-in">
        <div class="container mx-auto px-4">
            <div
                class="max-w-3xl mx-auto bg-white p-8 shadow-xl rounded-2xl transition-all duration-500 ease-in-out transform hover:scale-[1.005]">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl text-gray-800">Edit Program Kerja</h2>

                </div>
                <form action="{{ route('adminUkmEditProker.edit', $proker->id) }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6 animate-fade-in-up">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block font-semibold text-gray-700">Judul Program Kerja</label>
                        <input type="text" name="nama"
                            class="mt-2 p-3 w-full border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none transition"
                            value="{{ $proker->nama }}">
                    </div>

                    <div>
                        <label class="block font-semibold text-gray-700">Bidang Program Kerja</label>
                        <input type="text" name="bidang"
                            class="mt-2 p-3 w-full border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none transition"
                            value="{{ $proker->bidang }}">
                    </div>

                    <div>
                        <label class="block font-semibold text-gray-700">Deskripsi</label>
                        <textarea name="deskripsi" rows="4"
                            class="mt-2 p-3 w-full border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none transition">{{ $proker->deskripsi }}</textarea>
                    </div>

                    <div>
                        <label class="block font-semibold text-gray-700">Status</label>
                        <select name="status"
                            class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 transition"
                            required>
                            <option value="selesai" {{ $proker->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            <option value="belum selesai" {{ $proker->status == 'belum selesai' ? 'selected' : '' }}>Belum
                                Selesai</option>
                        </select>
                    </div>
                    <div class="flex justify-end space-x-4 pt-4">
                        <a href="{{ route('adminUkmProker') }}"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md transition duration-200">
                            Kembali
                        </a>
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-md shadow-md transition duration-300">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <style>
        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(10px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeInUp 0.5s ease-out both;
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out both;
        }
    </style>
@endsection
