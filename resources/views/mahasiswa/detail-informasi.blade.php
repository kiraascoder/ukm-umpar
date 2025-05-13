@extends('component.app')

@section('title', 'Detail Informasi')

@section('content')
    <main class="mt-10">
        <div class="mb-4 md:mb-0 w-full max-w-screen-md mx-auto relative" style="height: 24em;">
            <div class="absolute left-0 bottom-0 w-full h-full z-10"
                style="background-image: linear-gradient(180deg,transparent,rgba(0,0,0,.7));"></div>
            <img src="{{ asset('storage/' . $informasi->brosur) }}" alt="{{ $informasi->brosur }}"
                class="absolute left-0 top-0 w-full h-full z-0 object-cover" />
            <div class="p-4 absolute bottom-0 left-0 z-20">
                <h2 class="text-4xl font-semibold text-gray-100 leading-tight">
                    {{ $informasi->pendaftaran }}
                </h2>
                <div class="flex mt-3">
                    <img src="{{ asset('storage/' . $ukmTerkait->logo) }}" alt="{{ $ukmTerkait->logo }}"
                        class="h-10 w-10 rounded-full mr-2 object-cover" />
                    <div>
                        <p class="font-semibold text-gray-200 text-sm"> UKM {{ $ukmTerkait->nama }} </p>
                        <p class="font-semibold text-gray-400 text-xs">Batas Pendaftaran :
                            {{ $informasi->batas_pendaftaran }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="px-4 lg:px-0 mt-8 text-gray-700 max-w-screen-md mx-auto text-lg leading-relaxed">
            <h1 class="text-3xl font-semibold text-gray-800 pb-6">Link Pendaftaran</h1>
            <p class="pb-6">{{ $informasi->link_pendaftaran }}</p>
        </div>
        <div class="px-4 lg:px-0  text-gray-700 max-w-screen-md mx-auto text-lg leading-relaxed">
            <h1 class="text-3xl font-semibold text-gray-800 pb-6">Deskripsi</h1>
            <p class="pb-6">{{ $informasi->persyaratan }}</p>
        </div>

    </main>
@endsection
