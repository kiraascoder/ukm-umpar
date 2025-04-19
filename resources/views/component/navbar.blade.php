{{-- resources/views/components/navbar.blade.php --}}

<div class="relative">
    @if (Request::is('/'))
        <!-- Full-width background image khusus halaman home -->
        <div class="absolute inset-0 bg-cover bg-center z-0"
            style="background-image: url({{ asset('img/bg-umpar.png') }}); height: 85vh;">
            <div class="absolute inset-0 bg-black opacity-20"></div>
        </div>
    @endif

    <!-- Navbar -->
    <nav class="container mx-auto px-6 py-4 flex justify-between items-center relative z-10">
        <div class="text-white font-bold text-2xl">
            <img src="{{ asset('img/umpar.png') }}" alt="" class="w-16">
        </div>
        <div class="hidden md:flex space-x-10 text-dark font-medium">
            <a href="/" class="hover:text-white transition">Home</a>
            <a href="{{ route('daftar-ukm') }}" class="hover:text-white transition">UKM</a>
            <a href="{{ route('galeri') }}" class="hover:text-white transition">Galeri</a>
            <a href="{{ route('kegiatan') }}" class="hover:text-white transition">Kegiatan</a>
            <a href="{{ route('informasi') }}" class="hover:text-white transition">Informasi</a>
        </div>
        <div class="md:hidden" x-data="{ open: false }">
            <button class="text-white focus:outline-none" @click="open = !open">
                <i class="fa fa-bars text-2xl"></i>
            </button>
            <div x-show="open" @click.away="open = false"
                class="absolute top-20 right-6 bg-white shadow-lg rounded-lg p-6 w-48 z-50">
                <div class="flex flex-col space-y-4">
                    <a href="/" class="hover:text-yellow-500 transition">Home</a>
                    <a href="{{ route('daftar-ukm') }}" class="hover:text-white transition">UKM</a>
                    <a href="{{ route('galeri') }}" class="hover:text-white transition">Galeri</a>
                    <a href="{{ route('kegiatan') }}" class="hover:text-white transition">Kegiatan</a>
                    <a href="{{ route('informasi') }}" class="hover:text-white transition">Informasi</a>

                </div>
            </div>
        </div>
    </nav>
    @if (Request::is('/'))
        <div class="container mx-auto px-6 pt-32 pb-48 relative z-10" x-data="{ fadeIn: false }" x-init="setTimeout(() => fadeIn = true, 500)">
            <div class="max-w-3xl transition-all duration-1000"
                :class="fadeIn ? 'opacity-100 transform translate-y-0' : 'opacity-0 transform translate-y-10'">
                <h1 class="text-4xl md:text-6xl font-bold text-white leading-tight mb-6">Where Imaginations <br>Come to
                    Life</h1>
                <p class="text-xl text-white mb-8 md:pr-12">
                    Premium vinyl playsets designed for endless adventures, built to last for generations of fun.
                </p>
                <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="#featured"
                        class="bg-[#608BC1] hover:bg-[#133E87] text-gray-900 font-bold py-3 px-8 rounded-lg transition transform hover:-translate-y-1 inline-flex items-center justify-center">
                        <span>Explore Playsets</span>
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                    <a href="#contact"
                        class="bg-transparent border-2 border-white text-white hover:bg-white hover:text-gray-900 font-bold py-3 px-8 rounded-lg transition transform hover:-translate-y-1 inline-flex items-center justify-center">
                        <span>Get a Quote</span>
                    </a>
                </div>
            </div>
        </div>
    @endif
</div>
