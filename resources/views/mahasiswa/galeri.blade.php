@extends('component.app')

@section('title', 'UKM UMPAR')

@section('content')
    <div class="mb-6" x-data="{ selectedImage: '{{ asset('storage/' . ($gallery->shuffle()->first()->photo_path ?? 'img/activity.jpg')) }}' }">
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-4xl font-bold text-center mb-4">Galeri Kegiatan UKM UMPAR</h1>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

                <div class="md:col-span-2 md:row-span-2 relative overflow-hidden rounded-2xl shadow-lg group">
                    <img :src="selectedImage" alt="Gambar besar"
                        class="w-full h-full object-cover transition-all duration-500"
                        style="height: 100%; min-height: 400px;">
                </div>


                @foreach ($gallery->shuffle()->take(20) as $dok)
                    <div @click="selectedImage = '{{ asset('storage/' . $dok->photo_path) }}'"
                        class="relative overflow-hidden rounded-2xl shadow-lg group cursor-pointer border-2"
                        :class="selectedImage === '{{ asset("storage/{$dok->photo_path}") }}' ? 'border-blue-500' :
                            'border-transparent'">
                        <img src="{{ asset('storage/' . $dok->photo_path) }}"
                            alt="{{ $dok->kegiatan->nama_kegiatan ?? 'Dokumentasi' }}"
                            class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-105">
                        <div
                            class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="absolute bottom-0 left-0 right-0 p-4">
                                <h4 class="text-xl font-bold text-white">{{ $dok->kegiatan->nama ?? 'Kegiatan' }}</h4>
                                <p class="text-white">{{ $dok->kegiatan->ukm->nama ?? 'UKM Tidak Dikenal' }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <section class="mb-12">
        <div class="text-center mb-8">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Video Dokumentasi</h2>
        </div>


        <div x-data="videoSlider()" class="max-w-5xl mx-auto">


            <div class="relative rounded-xl overflow-hidden shadow-lg mb-6 border border-gray-300">
                <template x-if="currentVideo">
                    <div>
                        <template x-if="isYoutube(currentVideo.link)">
                            <iframe class="w-full h-96 md:h-[450px]" :src="youtubeEmbedUrl(currentVideo.link)"
                                frameborder="0" allowfullscreen></iframe>
                        </template>
                        <template x-if="isTiktok(currentVideo.link)">
                            <blockquote class="tiktok-embed mx-auto" :cite="currentVideo.link"
                                :data-video-id="tiktokVideoId(currentVideo.link)"
                                style="max-width: 605px;min-width: 325px;">
                                <section>Loading...</section>
                            </blockquote>
                        </template>
                        <template x-if="isLocalVideo(currentVideo.link)">
                            <video controls class="w-full h-auto">
                                <source :src="`{{ asset('storage') }}/${currentVideo.link}`" />
                                Browser tidak mendukung video ini.
                            </video>
                        </template>
                    </div>
                </template>
            </div>


            <div class="flex justify-center space-x-3 overflow-x-auto px-2">
                <template x-for="(video, index) in videos" :key="index">
                    <button @click="currentIndex = index"
                        :class="{
                            'border-4 border-blue-500 rounded-lg': currentIndex === index,
                            'border border-gray-300 rounded-lg': currentIndex !== index
                        }"
                        class="flex-shrink-0 w-32 h-20 relative overflow-hidden" :title="video.kegiatan_nama">
                        <template x-if="isYoutube(video.link)">
                            <img :src="youtubeThumbnail(video.link)" alt="" class="object-cover w-full h-full" />
                        </template>
                        <template x-if="isTiktok(video.link)">
                            <img :src="`https://p16-sign-va.tiktokcdn.com/tos-maliva-p-0068/${tiktokVideoId(video.link)}.jpg`"
                                alt="" class="object-cover w-full h-full" />
                        </template>
                        <template x-if="isLocalVideo(video.link)">
                            <video class="object-cover w-full h-full pointer-events-none" muted playsinline>
                                <source :src="`{{ asset('storage') }}/${video.link}`" />
                            </video>
                        </template>
                    </button>
                </template>
            </div>
        </div>


        <script async src="https://www.tiktok.com/embed.js"></script>

        <script>
            function videoSlider() {
                return {
                    currentIndex: 0,
                    videos: @json(
                        $videos->map(function ($v) {
                            return [
                                'link' => $v->link_dokumentasi,
                                'kegiatan_nama' => $v->kegiatan->nama ?? 'Video Dokumentasi',
                            ];
                        })),
                    get currentVideo() {
                        return this.videos.length > 0 ? this.videos[this.currentIndex] : null;
                    },
                    isYoutube(link) {
                        return link && (link.includes('youtube.com') || link.includes('youtu.be'));
                    },
                    isTiktok(link) {
                        return link && link.includes('tiktok.com');
                    },
                    isLocalVideo(link) {
                        return link && !this.isYoutube(link) && !this.isTiktok(link);
                    },
                    youtubeEmbedUrl(link) {
                        if (link.includes('youtu.be')) {
                            let id = link.split('youtu.be/')[1];
                            return `https://www.youtube.com/embed/${id}`;
                        }
                        if (link.includes('youtube.com')) {
                            let urlParams = new URLSearchParams(link.split('?')[1]);
                            let v = urlParams.get('v');
                            return `https://www.youtube.com/embed/${v}`;
                        }
                        return '';
                    },
                    youtubeThumbnail(link) {

                        let videoId = '';
                        if (link.includes('youtu.be')) {
                            videoId = link.split('youtu.be/')[1];
                        } else if (link.includes('youtube.com')) {
                            let urlParams = new URLSearchParams(link.split('?')[1]);
                            videoId = urlParams.get('v');
                        }
                        return `https://img.youtube.com/vi/${videoId}/hqdefault.jpg`;
                    },
                    tiktokVideoId(link) {

                        let parts = link.split('/');
                        return parts[parts.length - 1] || '';
                    },
                }
            }
        </script>
    </section>

@endsection
