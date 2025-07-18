<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Register')</title>
    <link rel="icon" href="{{ asset('umpar.png') }}" type="image/png">
    @vite('resources/css/app.css')
</head>

<body class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-3xl">
        <h1 class="mb-6 text-center font-bold text-3xl text-indigo-600">Register</h1>

        @if ($errors->any())
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                <strong>Oops!</strong> Ada kesalahan pada input Anda.<br><br>
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.register.submit') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-semibold mb-1" for="name">Nama Ketua UKM</label>
                <input
                    class="w-full border @error('name') border-red-500 @else border-gray-300 @enderror rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-400"
                    id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold mb-1" for="nama_ukm">Nama UKM</label>
                <input
                    class="w-full border @error('nama_ukm') border-red-500 @else border-gray-300 @enderror rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-400"
                    id="nama_ukm" type="text" name="nama_ukm" value="{{ old('nama_ukm') }}" required>
                @error('nama_ukm')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold mb-1" for="phone">No Handphone (WhatsApp Aktif)</label>
                <input
                    class="w-full border @error('phone') border-red-500 @else border-gray-300 @enderror rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-400"
                    id="phone" type="tel" name="phone" value="{{ old('phone') }}" required>
                @error('phone')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold mb-1" for="email">Email Aktif</label>
                <input
                    class="w-full border @error('email') border-red-500 @else border-gray-300 @enderror rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-400"
                    id="email" type="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="relative">
                <label class="block text-sm font-semibold mb-1" for="password">Password</label>
                <input
                    class="w-full border @error('password') border-red-500 @else border-gray-300 @enderror rounded-lg px-4 py-2 pr-10 focus:outline-none focus:ring-2 focus:ring-indigo-400"
                    id="password" type="password" name="password" required autocomplete="new-password">
                <div class="absolute top-9 right-3 cursor-pointer" onclick="togglePassword('password', 'eyeIcon1')">
                    <svg id="eyeIcon1" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5
                            c4.477 0 8.268 2.943 9.542 7
                            -1.274 4.057-5.065 7-9.542 7
                            -4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </div>
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="relative">
                <label class="block text-sm font-semibold mb-1" for="password_confirmation">Konfirmasi Password</label>
                <input
                    class="w-full border @error('password_confirmation') border-red-500 @else border-gray-300 @enderror rounded-lg px-4 py-2 pr-10 focus:outline-none focus:ring-2 focus:ring-indigo-400"
                    id="password_confirmation" type="password" name="password_confirmation" required
                    autocomplete="new-password">
                <div class="absolute top-9 right-3 cursor-pointer"
                    onclick="togglePassword('password_confirmation', 'eyeIcon2')">
                    <svg id="eyeIcon2" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5
                            c4.477 0 8.268 2.943 9.542 7
                            -1.274 4.057-5.065 7-9.542 7
                            -4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </div>
                @error('password_confirmation')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit"
                    class="w-full py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow-md transition duration-300">
                    Register
                </button>
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('admin.login') }}" class="text-indigo-600 hover:underline text-sm">
                    Already registered? Login
                </a>
            </div>
        </form>

        <div class="mt-10">
            <h2 class="font-bold text-lg mb-2 text-indigo-500">Instructions</h2>
            <ul class="list-disc pl-5 text-gray-600 text-sm space-y-1">
                <li>Gunakan email aktif dan password yang kuat.</li>
                <li>Nama UKM dan nama pengguna harus sopan dan sesuai.</li>
                <li>Dilarang membuat akun ganda untuk 1 orang.</li>
            </ul>
        </div>
    </div>

    <script>
        function togglePassword(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);
            if (input.type === "password") {
                input.type = "text";
                icon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.269-2.943-9.543-7
                        a9.963 9.963 0 012.036-3.292M6.1 6.1
                        A9.964 9.964 0 0112 5c4.477 0 8.268 2.943 9.542 7
                        a9.97 9.97 0 01-4.187 5.411M15 12a3 3 0 00-3-3M3 3l18 18" />
                `;
            } else {
                input.type = "password";
                icon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M2.458 12C3.732 7.943 7.523 5 12 5
                        c4.477 0 8.268 2.943 9.542 7
                        -1.274 4.057-5.065 7-9.542 7
                        -4.477 0-8.268-2.943-9.542-7z" />
                `;
            }
        }
    </script>
</body>

</html>
