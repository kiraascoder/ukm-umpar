<!-- resources/views/component/navbar.blade.php -->
<nav class="container mx-auto px-6 py-4 flex justify-between items-center relative z-10">
    <div class="text-white font-bold text-2xl">
        <img src="{{ asset('img/umpar.png') }}" alt="Logo UMPAR" class="w-16">
    </div>
    <div class="hidden md:flex space-x-10 font-medium 
    {{ Request::is('/') ? 'text-white' : 'text-gray-900' }}">
        <a href="/" class="hover:text-yellow-300 transition">Home</a>
        <a href="{{ route('daftar-ukm') }}" class="hover:text-yellow-300 transition">UKM</a>
        <a href="{{ route('galeri') }}" class="hover:text-yellow-300 transition">Galeri</a>
        <a href="{{ route('kegiatan') }}" class="hover:text-yellow-300 transition">Kegiatan</a>
        <a href="{{ route('informasi') }}" class="hover:text-yellow-300 transition">Informasi</a>
    </div>
    <div class="md:hidden" x-data="{ open: false }">
        <button class="text-white focus:outline-none" @click="open = !open">
            <i class="fa fa-bars text-2xl"></i>
        </button>
        <div x-show="open" @click.away="open = false"
            class="absolute top-20 right-6 bg-white text-gray-800 shadow-lg rounded-lg p-6 w-48 z-50">
            <div class="flex flex-col space-y-4">
                <a href="/" class="hover:text-blue-600">Home</a>
                <a href="{{ route('daftar-ukm') }}" class="hover:text-blue-600">UKM</a>
                <a href="{{ route('galeri') }}" class="hover:text-blue-600">Galeri</a>
                <a href="{{ route('kegiatan') }}" class="hover:text-blue-600">Kegiatan</a>
                <a href="{{ route('informasi') }}" class="hover:text-blue-600">Informasi</a>
            </div>
        </div>
    </div>
</nav>
