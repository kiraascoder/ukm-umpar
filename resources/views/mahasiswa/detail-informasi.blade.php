@extends('component.app')

@section('title', 'Detail Informasi')

@section('content')
    <main class="py-16 px-4 md:px-8 ">
        <div class="max-w-6xl mx-auto bg-white rounded-3xl shadow-xl overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-2">

                <div class="relative flex items-center justify-center bg-gray-100">
                    <img src="{{ asset('storage/' . $informasi->brosur) }}" alt="{{ $informasi->brosur }}"
                        class="w-full h-auto max-h-[700px] object-contain p-4" />
                </div>

                <div class="p-6 md:p-10 flex flex-col justify-center space-y-6">

                    <div class="space-y-3">
                        <h1 class="text-3xl md:text-4xl font-bold text-gray-800">{{ $informasi->pendaftaran }}</h1>
                        <div class="flex items-center gap-4">
                            <img src="{{ asset('storage/' . $ukmTerkait->logo) }}" alt="{{ $ukmTerkait->logo }}"
                                class="h-12 w-12 object-cover rounded-full border border-gray-300 shadow" />
                            <div>
                                <p class="text-base font-semibold text-gray-700">UKM {{ $ukmTerkait->nama }}</p>
                                <p class="text-sm text-gray-500">Batas Pendaftaran: <span
                                        class="font-medium">{{ $informasi->batas_pendaftaran }}</span></p>
                            </div>
                        </div>
                    </div>


                    <div>
                        <h2 class="text-lg font-semibold text-gray-700 mb-1">🔗 Link Pendaftaran</h2>
                        <a href="{{ $informasi->link_pendaftaran }}" target="_blank"
                            class="text-blue-600 hover:text-blue-800 underline break-all text-sm">
                            {{ $informasi->link_pendaftaran }}
                        </a>
                    </div>


                    <div>
                        <h2 class="text-lg font-semibold text-gray-700 mb-1">📝 Deskripsi & Persyaratan</h2>
                        <p class="text-sm text-gray-600 leading-relaxed whitespace-pre-line">
                            {{ $informasi->persyaratan }}
                        </p>
                    </div>
                    <div>
                        <h2 class="text-lg font-semibold text-gray-700 mb-1">📱 Narahubung WhatsApp</h2>
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $informasi->wa) }}" target="_blank"
                            class="text-green-600 hover:text-green-800 underline break-all text-sm">
                            {{ $informasi->wa }}
                        </a>
                    </div>



                    <div>
                        <a href="{{ $informasi->link_pendaftaran }}" target="_blank"
                            class="inline-block bg-blue-600 hover:bg-blue-700 transition text-white font-semibold text-sm px-6 py-3 rounded-lg shadow">
                            Daftar Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
