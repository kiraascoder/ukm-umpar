@extends('component.app')

@section('title', 'UKM UMPAR')

@section('content')
    <section class="bg-gradient-to-b from-sky-50 to-white" id="contact">
        <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-20">
            <div class="mb-4">
                <div class="mb-6 max-w-3xl text-center sm:text-center md:mx-auto md:mb-12">
                    <h2 class="font-heading mb-4 font-bold tracking-tight text-gray-900 text-3xl sm:text-5xl">
                        Berikan Saran
                    </h2>
                    <p class="mx-auto mt-4 max-w-3xl text-xl text-gray-800">
                        Terima kasih sudah berkunjung ke website kami! Bagaimana pendapat Anda tentang website ini?
                    </p>
                </div>
            </div>
            <div class="flex items-stretch justify-center">
                <div class="grid md:grid-cols-2">
                    <div class="h-full pr-6">
                        <ul class="mb-6 md:mb-0">
                            <li class="flex">
                                <div class="flex h-10 w-10 items-center justify-center rounded bg-blue-900 text-gray-50">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                                        <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                                        <path
                                            d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="ml-4 mb-4">
                                    <h3 class="mb-2 text-lg font-medium leading-6 text-gray-900">Alamat Kami</h3>
                                    <p class="text-gray-800">Jl. Jend. Ahmad Yani KM. 6</p>
                                    <p class="text-gray-800">
                                        Kelurahan Bukit Harapan<br>
                                        Kecamatan Soreang<br>
                                        Kota Parepare<br>
                                        Provinsi Sulawesi Selatan, Indonesia
                                    </p>
                                </div>
                            </li>
                            <li class="flex">
                                <div class="flex h-10 w-10 items-center justify-center rounded bg-blue-900 text-gray-50">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                                        <path
                                            d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2">
                                        </path>
                                        <path d="M15 7a2 2 0 0 1 2 2"></path>
                                        <path d="M15 3a6 6 0 0 1 6 6"></path>
                                    </svg>
                                </div>
                                <div class="ml-4 mb-4">
                                    <h3 class="mb-2 text-lg font-medium leading-6 text-gray-900">Kontak</h3>
                                    <p class="text-gray-800">Mobile: 081144049599</p>
                                    <p class="text-gray-800">Mail: umpar@umpar.ac.id</p>
                                </div>
                            </li>
                            <li class="flex">
                                <div class="flex h-10 w-10 items-center justify-center rounded bg-blue-900 text-gray-50">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                                        <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                                        <path d="M12 7v5l3 3"></path>
                                    </svg>
                                </div>
                                <div class="ml-4 mb-4">
                                    <h3 class="mb-2 text-lg font-medium leading-6 text-gray-900">Jam Operasional</h3>
                                    <p class="text-gray-800">Senin - Jumat: 08:00 - 17:00</p>
                                    <p class="text-gray-800">Sabtu &amp; Minggu: 08:00 - 12:00</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="card h-fit max-w-6xl p-5 md:p-12" id="form">
                        <h2 class="mb-4 text-2xl font-bold text-dark">Silahkan Masukan Data Anda</h2>

                        @if (session('success'))
                            <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
                                <strong>Oops! Ada kesalahan pada data yang Anda masukkan:</strong>
                                <ul class="list-disc list-inside mt-2 text-sm">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('kirim-pesan') }}" method="POST">
                            @csrf
                            <div class="mb-6">
                                <div class="mx-0 mb-1 sm:mb-4">
                                    <label for="nama" class="pb-1 text-xs uppercase tracking-wider"></label>
                                    <input type="text" id="nama" name="nama" placeholder="Nama Anda"
                                        class="mb-2 w-full rounded-md border border-gray-400 py-2 pl-2 pr-4 shadow-md text-gray-800 sm:mb-0"
                                        value="{{ old('nama') }}">
                                </div>
                                <div class="mx-0 mb-1 sm:mb-4">
                                    <label for="email" class="pb-1 text-xs uppercase tracking-wider"></label>
                                    <input type="email" id="email" name="email" placeholder="Alamat Email Anda"
                                        class="mb-2 w-full rounded-md border border-gray-400 py-2 pl-2 pr-4 shadow-md text-gray-800 sm:mb-0"
                                        value="{{ old('email') }}">
                                </div>
                                <div class="mx-0 mb-1 sm:mb-4">
                                    <label for="pesan" class="pb-1 text-xs uppercase tracking-wider"></label>
                                    <textarea id="pesan" name="pesan" cols="30" rows="5" placeholder="Pesan Anda"
                                        class="mb-2 w-full rounded-md border border-gray-400 py-2 pl-2 pr-4 shadow-md text-gray-800 sm:mb-0">{{ old('pesan') }}</textarea>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit"
                                    class="w-full bg-blue-800 text-white px-6 py-3 rounded-md shadow hover:bg-blue-700 transition">
                                    Kirim Pesan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
