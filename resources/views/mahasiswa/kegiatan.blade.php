@extends('component.app')

@section('title', 'UKM UMPAR')

@section('content')
    <div class="py-20 bg-gradient-to-b from-sky-50 to-white" id="featured">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Daftar Kegiatan UKM UMPAR</h2>
                <p class="text-gray-600 max-w-4xl text-center mx-auto mb-4">UKM di Universitas Muhammadiyah Parepare secara
                    rutin mengadakan
                    berbagai kegiatan yang mendukung pengembangan diri mahasiswa. Mulai dari pelatihan, seminar, perlombaan,
                    hingga kegiatan sosial kemasyarakatan — semua dirancang untuk membentuk karakter, meningkatkan soft
                    skill, dan memperluas jaringan pertemanan antar mahasiswa lintas jurusan</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="kegiatan-container">
                @include('mahasiswa.partials.kegiatan-card', ['kegiatans' => $kegiatans])
            </div>

            @if ($kegiatans->count() < $totalKegiatan)
                <div class="text-center mt-12">
                    <button id="loadMoreBtn"
                        class="inline-block bg-[#608BC1] hover:bg-[#133E87] text-white font-bold py-3 px-8 rounded-lg transition transform hover:-translate-y-1">
                        Lihat Selengkapnya
                    </button>
                </div>
            @endif

        </div>
    </div>
    <script>
        let offset = {{ $kegiatans->count() }};

        document.getElementById('loadMoreBtn').addEventListener('click', function() {
            fetch(`{{ url('/kegiatan/load-more') }}?offset=${offset}`)
                .then(res => res.text())
                .then(html => {
                    if (html.trim() !== '') {
                        document.getElementById('kegiatan-container').insertAdjacentHTML('beforeend', html);
                        offset += 3;
                    } else {
                        document.getElementById('loadMoreBtn').remove();
                    }
                });
        });
    </script>
@endsection
