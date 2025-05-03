@foreach ($kegiatans as $kegiatan)
    <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300"
        x-data="{ hover: false }">
        <div class="relative overflow-hidden">
            <img src="{{ asset('storage/' . $kegiatan->foto_sampul) }}" alt="{{ $kegiatan->nama }}"
                class="w-full h-64 object-cover transition-all duration-500" :class="{ 'transform scale-105': hover }">
        </div>
        <div class="p-6">
            <h3 class="text-xl font-bold mb-2">{{ $kegiatan->nama }}</h3>
            <p class="text-gray-600 mb-4">{{ Str::limit($kegiatan->deskripsi, 100) }}</p>
            <a href="{{ route('detail-kegiatan', $kegiatan->id) }}"
                class="text-[#608BC1] font-medium hover:text-yellow-600 transition inline-flex items-center">
                <span>View Details</span>
                <i class="fas fa-arrow-right ml-2 text-sm"></i>
            </a>
        </div>
    </div>
@endforeach
