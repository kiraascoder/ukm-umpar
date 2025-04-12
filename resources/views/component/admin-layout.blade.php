<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ADMIN UKM UMPAR')</title>
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">
    
    @vite('resources/css/app.css')
</head>
<body class="bg-[#EFE3C2] min-h-screen flex">
    <aside class="w-64 text-white h-screen fixed shadow-lg">
        @include('component.sidebar')
    </aside>
    <div class="flex-1 ml-64">
        <main class="container">
            @yield('content')
        </main>
    </div>
</body>

</html>
