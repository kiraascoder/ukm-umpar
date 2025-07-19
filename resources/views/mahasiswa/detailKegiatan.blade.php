@extends('component.app')

@section('title', 'UKM UMPAR')

@section('content')

    <section class="text-gray-700 body-font">
        <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
            <div
                class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{ $kegiatan->nama }}</h1>
                <p class="mb-8 leading-relaxed {{ $kegiatan->font_deskripsi }}">
                    {!! $kegiatan->deskripsi !!}
                </p>
            </div>
            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                <img class="object-cover object-center rounded" alt="Belum ada Gambar"
                    src="{{ $kegiatan->foto_sampul ? asset('storage/' . $kegiatan->foto_sampul) : asset('img/activity.jpg') }}">
            </div>
        </div>
    </section>

    <section>
        <div class="text-center mb-8">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Dokumentasi Kegiatan</h2>
        </div>
        <div class="py-4 px-2 mx-auto max-w-screen-xl sm:py-4 lg:px-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-4 h-full">
                <div class="col-span-2 sm:col-span-1 md:col-span-2 bg-gray-50 h-auto md:h-full flex flex-col">
                    <a href="#"
                        class="group relative flex flex-col overflow-hidden rounded-lg px-4 pb-4 pt-40 flex-grow">
                        <img src="{{ optional($gambar1)->photo_path ? asset('storage/' . $gambar1->photo_path) : asset('img/activity.jpg') }}"
                            alt="Gambar 1"
                            class="absolute inset-0 h-full w-full object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out">
                        <div class="absolute inset-0 bg-gradient-to-b from-gray-900/25 to-gray-900/5"></div>
                    </a>
                </div>
                <div class="col-span-2 sm:col-span-1 md:col-span-2 bg-stone-50">
                    <a href="#" class="group relative flex flex-col overflow-hidden rounded-lg px-4 pb-4 pt-40 mb-4">
                        <img src="{{ optional($gambar2)->photo_path ? asset('storage/' . $gambar2->photo_path) : asset('img/activity.jpg') }}"
                            alt="Gambar 2"
                            class="absolute inset-0 h-full w-full object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out">
                        <div class="absolute inset-0 bg-gradient-to-b from-gray-900/25 to-gray-900/5"></div>
                    </a>
                    <div class="grid gap-4 grid-cols-2 sm:grid-cols-2 lg:grid-cols-2">
                        <a href="#" class="group relative flex flex-col overflow-hidden rounded-lg px-4 pb-4 pt-40">
                            <img src="{{ optional($gambar3)->photo_path ? asset('storage/' . $gambar3->photo_path) : asset('img/activity.jpg') }}"
                                alt="Gambar 3"
                                class="absolute inset-0 h-full w-full object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out">
                            <div class="absolute inset-0 bg-gradient-to-b from-gray-900/25 to-gray-900/5"></div>
                        </a>
                        <a href="#" class="group relative flex flex-col overflow-hidden rounded-lg px-4 pb-4 pt-40">
                            <img src="{{ optional($gambar4)->photo_path ? asset('storage/' . $gambar4->photo_path) : asset('img/activity.jpg') }}"
                                alt="Gambar 4"
                                class="absolute inset-0 h-full w-full object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out">
                            <div class="absolute inset-0 bg-gradient-to-b from-gray-900/25 to-gray-900/5"></div>
                        </a>
                    </div>
                </div>
                <div class="col-span-2 sm:col-span-1 md:col-span-1 bg-sky-50 h-auto md:h-full flex flex-col">
                    <a href="#"
                        class="group relative flex flex-col overflow-hidden rounded-lg px-4 pb-4 pt-40 flex-grow">
                        <img src="{{ optional($gambar5)->photo_path ? asset('storage/' . $gambar5->photo_path) : asset('img/activity.jpg') }}"
                            alt="Gambar 5"
                            class="absolute inset-0 h-full w-full object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out">
                        <div class="absolute inset-0 bg-gradient-to-b from-gray-900/25 to-gray-900/5"></div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-6">
        <div class="text-center mb-8">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Video Dokumentasi</h2>
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
    <div class="text-center mb-8">
        <a href="{{ url('/kegiatan') }}"
            class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded shadow">
            ← Kembali ke Kegiatan
        </a>
    </div>

@endsection
