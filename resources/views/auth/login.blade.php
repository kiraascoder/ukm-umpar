<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Login Admin')</title>
    <link rel="icon" href="{{ asset('umpar.png') }}" type="image/png">
    @vite('resources/css/app.css')
</head>

<body>

    <div class="min-h-screen bg-gray-100 text-gray-900 flex justify-center">
        <div class="max-w-screen-xl m-0 sm:m-10 bg-white shadow sm:rounded-lg flex justify-center flex-1">
            <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12">
                <div class="mt-12 flex flex-col items-center">
                    <h1 class="text-2xl xl:text-3xl">
                        Login Sebagai Admin
                    </h1>
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4 w-full text-center"
                            role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="w-full flex-1 mt-8">
                        <form action="{{ route('admin.login.submit') }}" method="POST">
                            @csrf
                            <div class="mx-auto max-w-xs">
                                <!-- Error handling for email -->
                                @error('email')
                                    <div class="text-red-500 text-sm">{{ $message }}</div>
                                @enderror

                                <input
                                    class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                                    type="email" placeholder="Email" name="email" value="{{ old('email') }}" />

                                <!-- Error handling for password -->
                                @error('password')
                                    <div class="text-red-500 text-sm">{{ $message }}</div>
                                @enderror

                                <div class="relative mt-5">
                                    <input id="password"
                                        class="w-full px-8 py-4 pr-10 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                                        type="password" placeholder="Password" name="password" />
                                    <div class="absolute inset-y-0 right-0 flex items-center px-3 cursor-pointer"
                                        onclick="togglePassword()">
                                        <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg"
                                            class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </div>
                                </div>

                                <!-- Error handling for login -->
                                @if ($errors->has('login'))
                                    <div class="text-red-500 text-sm mt-2">
                                        {{ $errors->first('login') }}
                                    </div>
                                @endif

                                <button
                                    class="mt-5 tracking-wide w-full py-4 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md shadow"
                                    type="submit">
                                    <span class="ml-3">
                                        Masuk
                                    </span>
                                </button>

                                <div class="mt-6 text-md text-gray-600 text-center">
                                    <p>Belum Punya Akun?
                                        <a href="{{ route('admin.register') }}" class="underline text-indigo-600">Daftar
                                            UKM</a>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="flex-1 bg-indigo-100 text-center hidden lg:flex">
                <div class="w-full h-full bg-cover bg-center bg-no-repeat"
                    style="background-image: url('{{ asset('img/auth.png') }}');">
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.innerHTML = `  
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.269-2.943-9.543-7a9.963 9.963 0 012.036-3.292M6.1 6.1A9.964 9.964 0 0112 5c4.477 0 8.268 2.943 9.542 7a9.97 9.97 0 01-4.187 5.411M15 12a3 3 0 00-3-3M3 3l18 18" />
                `;
            } else {
                passwordInput.type = "password";
                eyeIcon.innerHTML = `  
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                `;
            }
        }
    </script>
</body>

</html>
