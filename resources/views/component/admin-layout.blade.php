<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ADMIN UKM UMPAR')</title>

    <link rel="icon" href="{{ asset('umpar.png') }}" type="image/png">

    <!-- Animasi dan Font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Fira+Code&family=Merriweather&family=Open+Sans&family=Oswald&display=swap"
        rel="stylesheet">

    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/s9lagaszd2jkooxlmdgqy0qhu09qh0viu7acznz2nu74v3o2/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>
    <x-head.tinymce-config />

    <!-- Alpine.js Style Helper -->
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    <script src="//unpkg.com/alpinejs" defer></script>

    @vite('resources/css/app.css')
</head>

<body class="w-full bg-gradient-to-b from-sky-50 to-white min-h-screen flex" x-data="{ openModal: false, selectedNama: '', deleteUrl: '' }">
    <!-- Sidebar -->
    <aside class="w-64 text-white h-screen fixed shadow-lg">
        @include('component.sidebar')
    </aside>

    <!-- Main Content -->
    <div class="flex-1 ml-64">
        <main class="w-full">
            @yield('content')
        </main>
    </div>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>
