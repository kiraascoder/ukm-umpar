<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Informasi UKM UMPAR')</title>
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">
    @vite('resources/css/app.css')
</head>

<body class="bg-[#F3F3E0] min-h-screen flex flex-col">
    @include('component.navbar')
    <div class="container mx-auto">
        @yield('content')
    </div>
    @include('component.footer')
</body>

</html>
