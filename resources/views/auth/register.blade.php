<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">
    @vite('resources/css/app.css')
</head>

<body>
    <div class="p-10">
        <h1 class="mb-8 font-bold text-4xl">Register</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            <form action={{ route('admin.register.submit') }} method="POST">
                @csrf
                <div>
                    <label class="block font-semibold" for="name">Masukan Nama Anda</label>
                    <input
                        class="shadow-inner bg-gray-100 rounded-lg placeholder-black text-2xl p-4 border-none block mt-1 w-full"
                        id="name" type="text" name="name" required="required" autofocus="autofocus">
                </div>

                <div class="mt-4">
                    <label class="block font-semibold" for="name">Masukan Nama UKM</label>
                    <input
                        class="shadow-inner bg-gray-100 rounded-lg placeholder-black text-2xl p-4 border-none block mt-1 w-full"
                        id="nama_ukm" type="text" name="nama_ukm" required="required" autofocus="autofocus">
                </div>

                <div class="mt-4">
                    <label class="block font-semibold" for="name">No Handphone (Nomor WhatsApp Aktif) </label>
                    <input
                        class="shadow-inner bg-gray-100 rounded-lg placeholder-black text-2xl p-4 border-none block mt-1 w-full"
                        id="phone" type="phone" name="phone" required="required" autofocus="autofocus">
                </div>

                <div class="mt-4">
                    <label class="block font-semibold" for="email">Email Aktif</label>
                    <input
                        class="shadow-inner bg-gray-100 rounded-lg placeholder-black text-2xl p-4 border-none block mt-1 w-full"
                        id="email" type="email" name="email" required="required">
                </div>
                <div class="mt-4 relative">
                    <label class="block font-semibold" for="password">Masukkan Password</label>
                    <input
                        class="w-full shadow-inner bg-gray-100 rounded-lg placeholder-black text-2xl p-4 pr-12 border-none block mt-1"
                        id="password" type="password" name="password" required autocomplete="new-password">
                    <div class="absolute top-[52px] right-4 cursor-pointer"
                        onclick="togglePassword('password', 'eyeIcon1')">
                        <svg id="eyeIcon1" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </div>
                </div>

                <div class="mt-4 relative">
                    <label class="block font-semibold" for="password_confirmation">Konfirmasi Password</label>
                    <input
                        class="w-full shadow-inner bg-gray-100 rounded-lg placeholder-black text-2xl p-4 pr-12 border-none block mt-1"
                        id="password_confirmation" type="password" name="password_confirmation" required
                        autocomplete="new-password">
                    <div class="absolute top-[52px] right-4 cursor-pointer"
                        onclick="togglePassword('password_confirmation', 'eyeIcon2')">
                        <svg id="eyeIcon2" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </div>
                </div>
                <div class="flex items-center justify-between mt-8">
                    <button type="submit"
                        class="flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">Register</button>
                    <a class="font-semibold" href="{{ route('admin.login') }}">
                        Already registered?
                    </a>
                </div>
            </form>

            <aside class="">
                <div class="bg-gray-100 p-8 rounded">
                    <h2 class="font-bold text-2xl">Instructions</h2>
                    <ul class="list-disc mt-4 list-inside">
                        <li>All users must provide a valid email address and password to create an account.</li>
                        <li>Users must not use offensive, vulgar, or otherwise inappropriate language in their username
                            or profile information</li>
                        <li>Users must not create multiple accounts for the same person.</li>
                    </ul>
                </div>
            </aside>

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
