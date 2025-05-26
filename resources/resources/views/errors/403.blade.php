<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>403 - Forbidden</title>
</head>

<body>
    <div
        class="min-h-screen bg-gray-100 dark:bg-gray-900 flex flex-col justify-center items-center px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 text-center">
            <div class="mb-8">
                <h2 class="mt-6 text-6xl font-extrabold text-red-600 dark:text-red-400">403</h2>
                <p class="mt-1 text-3xl font-bold text-gray-900 dark:text-gray-100">Access Denied</p>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                    Maaf, Anda tidak memiliki izin untuk mengakses halaman ini.
                </p>
            </div>
            <div class="mt-2">
                <a href="/"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <svg class="mr-2 -ml-1 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12h18m-9-9l9 9-9 9" />
                    </svg>
                    Kembali ke Beranda
                </a>
            </div>
        </div>
        <div class="mt-2 w-full max-w-2xl">
            <div class="relative">
                <div class="absolute inset-0 flex items-center" aria-hidden="true">
                    <div class="w-full border-t border-gray-300 dark:border-gray-600"></div>
                </div>
                <div class="relative flex justify-center">
                    <span class="px-2 bg-gray-100 dark:bg-gray-800 text-sm text-gray-500 dark:text-gray-400">
                        Jika ini adalah kesalahan, silakan hubungi admin.
                    </span>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Redirect ke homepage setelah 5 detik
        setTimeout(function() {
            window.location.href = "{{ url('/') }}";
        }, 5000);
    </script>
</body>

</html>
