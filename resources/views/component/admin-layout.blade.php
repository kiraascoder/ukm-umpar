<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Informasi UKM UMPAR')</title>
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">
    @vite('resources/css/app.css')
</head>

<body class="bg-[#EFE3C2] min-h-screen flex">
    {{-- Sidebar --}}
    <aside class="w-64 text-white h-screen fixed shadow-lg">
        @include('component.sidebar')
    </aside>

    {{-- Konten Utama --}}
    <div class="flex-1 ml-64">
        <main class="container mx-auto p-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
