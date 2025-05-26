<script src="//unpkg.com/alpinejs" defer></script>

<nav class="container mx-auto px-6 py-4 relative z-10" x-data="{ open: false }">
    <div class="flex justify-between items-center">
        <div class="text-white font-bold text-2xl">
            <img src="{{ asset('img/umpar.png') }}" alt="Logo UMPAR" class="w-16">
        </div>
        <div class="md:hidden">
            <button class="text-white focus:outline-none" @click="open = !open">
                <i class="fa fa-bars text-2xl"></i>
            </button>
        </div>
        <div
            class="hidden md:flex space-x-10 font-medium 
            {{ Request::is('/') ? 'text-white' : 'text-gray-900' }}">
            <a href="/" class="hover:text-yellow-300 transition">Home</a>
            <a href="{{ route('daftar-ukm') }}" class="hover:text-yellow-300 transition">UKM</a>
            <a href="{{ route('galeri') }}" class="hover:text-yellow-300 transition">Galeri</a>
            <a href="{{ route('kegiatan') }}" class="hover:text-yellow-300 transition">Kegiatan</a>
            <a href="{{ route('informasi') }}" class="hover:text-yellow-300 transition">Informasi</a>
        </div>
    </div>


    <div x-show="open" class="md:hidden mt-4 bg-white rounded-lg shadow-lg px-4 py-4 space-y-3">
        <a href="/" class="block text-gray-800 hover:text-blue-600">Home</a>
        <a href="{{ route('daftar-ukm') }}" class="block text-gray-800 hover:text-blue-600">UKM</a>
        <a href="{{ route('galeri') }}" class="block text-gray-800 hover:text-blue-600">Galeri</a>
        <a href="{{ route('kegiatan') }}" class="block text-gray-800 hover:text-blue-600">Kegiatan</a>
        <a href="{{ route('informasi') }}" class="block text-gray-800 hover:text-blue-600">Informasi</a>
    </div>
</nav>
