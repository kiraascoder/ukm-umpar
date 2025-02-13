<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin UKM')</title>
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">
    @vite('resources/css/app.css')
</head>

<body class="bg-[#EFE3C2] min-h-screen flex">
    <!-- Sidebar -->
    <div class="w-64 bg-white shadow-lg">
        @include('component.sidebar')
    </div>

    <!-- Content -->
    <div class="flex-1 p-6">
        @yield('content')
    </div>
</body>

</html>
