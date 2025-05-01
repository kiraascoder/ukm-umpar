@extends('component.app')

@section('title', 'UKM UMPAR')

@section('content')

    <section class="text-gray-700 body-font">
        <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
            <div
                class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{ $kegiatan->nama }}

                </h1>
                <p class="mb-8 leading-relaxed">{{ $kegiatan->deskripsi }}</p>
            </div>
            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                <img class="object-cover object-center rounded" alt="Belum ada Gambar"
                    src="{{ asset('storage/' . $kegiatan->foto_sampul) }}">
            </div>
        </div>
    </section>
    <section class="">
        <div class="text-center mb-8">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Dokumentasi Kegiatan</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                UKM UMPAR rutin mengadakan berbagai kegiatan seperti pelatihan, seminar, kompetisi, dan acara sosial
                yang melibatkan mahasiswa dari berbagai latar belakang.
            </p>
        </div>
        <div class="py-4 px-2 mx-auto max-w-screen-xl sm:py-4 lg:px-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-4 h-full">
                <div class="col-span-2 sm:col-span-1 md:col-span-2 bg-gray-50 h-auto md:h-full flex flex-col">
                    <a href=""
                        class="group relative flex flex-col overflow-hidden rounded-lg px-4 pb-4 pt-40 flex-grow">
                        <img src="https://images.unsplash.com/photo-1510812431401-41d2bd2722f3?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            alt=""
                            class="absolute inset-0 h-full w-full object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out">
                        <div class="absolute inset-0 bg-gradient-to-b from-gray-900/25 to-gray-900/5"></div>
                        <h3 class="z-10 text-2xl font-medium text-white absolute top-0 left-0 p-4 xs:text-xl md:text-3xl">
                            Wines</h3>
                    </a>
                </div>
                <div class="col-span-2 sm:col-span-1 md:col-span-2 bg-stone-50">
                    <a href="" class="group relative flex flex-col overflow-hidden rounded-lg px-4 pb-4 pt-40 mb-4">
                        <img src="https://images.unsplash.com/photo-1504675099198-7023dd85f5a3?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            alt=""
                            class="absolute inset-0 h-full w-full object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out">
                        <div class="absolute inset-0 bg-gradient-to-b from-gray-900/25 to-gray-900/5"></div>
                        <h3 class="z-10 text-2xl font-medium text-white absolute top-0 left-0 p-4 xs:text-xl md:text-3xl">
                            Gin</h3>
                    </a>
                    <div class="grid gap-4 grid-cols-2 sm:grid-cols-2 lg:grid-cols-2">
                        <a href="" class="group relative flex flex-col overflow-hidden rounded-lg px-4 pb-4 pt-40">
                            <img src="https://images.unsplash.com/photo-1571104508999-893933ded431?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                alt=""
                                class="absolute inset-0 h-full w-full object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out">
                            <div class="absolute inset-0 bg-gradient-to-b from-gray-900/25 to-gray-900/5"></div>
                            <h3
                                class="z-10 text-2xl font-medium text-white absolute top-0 left-0 p-4 xs:text-xl md:text-3xl">
                                Whiskey</h3>
                        </a>
                        <a href="" class="group relative flex flex-col overflow-hidden rounded-lg px-4 pb-4 pt-40">
                            <img src="https://images.unsplash.com/photo-1626897505254-e0f811aa9bf7?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                alt=""
                                class="absolute inset-0 h-full w-full object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out">
                            <div class="absolute inset-0 bg-gradient-to-b from-gray-900/25 to-gray-900/5"></div>
                            <h3
                                class="z-10 text-2xl font-medium text-white absolute top-0 left-0 p-4 xs:text-xl md:text-3xl">
                                Vodka</h3>
                        </a>
                    </div>
                </div>
                <div class="col-span-2 sm:col-span-1 md:col-span-1 bg-sky-50 h-auto md:h-full flex flex-col">
                    <a href=""
                        class="group relative flex flex-col overflow-hidden rounded-lg px-4 pb-4 pt-40 flex-grow">
                        <img src="https://images.unsplash.com/photo-1693680501357-a342180f1946?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            alt=""
                            class="absolute inset-0 h-full w-full object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out">
                        <div class="absolute inset-0 bg-gradient-to-b from-gray-900/25 to-gray-900/5"></div>
                        <h3 class="z-10 text-2xl font-medium text-white absolute top-0 left-0 p-4 xs:text-xl md:text-3xl">
                            Brandy</h3>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="mb-6">
        <div class="text-center mb-8">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Video Dokumentasi</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                UKM UMPAR rutin mengadakan berbagai kegiatan seperti pelatihan, seminar, kompetisi, dan acara sosial
                yang melibatkan mahasiswa dari berbagai latar belakang.
            </p>
        </div>
        @php
            use Illuminate\Support\Str;
            $link = $kegiatan->link_dokumentasi;
        @endphp

        @if ($link)
            @if (Str::contains($link, 'youtube.com') || Str::contains($link, 'youtu.be'))
                <div class="flex justify-center">
                    <iframe width="800" height="450" class="rounded shadow"
                        src="https://www.youtube.com/embed/{{ Str::contains($link, 'youtu.be') ? Str::after($link, 'youtu.be/') : Str::after($link, 'v=') }}"
                        frameborder="0" allowfullscreen></iframe>
                </div>
            @elseif (Str::contains($link, 'tiktok.com'))
                <div class="flex justify-center">
                    <blockquote class="tiktok-embed" cite="{{ $link }}"
                        data-video-id="{{ Str::afterLast($link, '/') }}" style="max-width: 605px;min-width: 325px;">
                        <section>Loading...</section>
                    </blockquote>
                    <script async src="https://www.tiktok.com/embed.js"></script>
                </div>
            @else
                <div class="flex justify-center">
                    <video controls class="w-[800px] h-auto rounded shadow">
                        <source src="{{ asset('storage/' . $link) }}">
                        Browser tidak mendukung video ini.
                    </video>
                </div>
            @endif
        @else
            <p class="text-center text-gray-500">Belum ada Video Dokumentasi.</p>
        @endif
    </section>
@endsection
