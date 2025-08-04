<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Lupa Password</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold text-center mb-6">Lupa Password</h2>

        @if (session('status'))
            <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-4 text-sm text-center">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('password.request') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Alamat Email</label>
                <input type="email" name="email" id="email" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-indigo-500 bg-gray-100"
                    value="{{ old('email') }}">
                @error('email')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit"
                class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition">
                Kirim Link Reset Password
            </button>
        </form>

        <div class="text-center mt-4">
            <a href="{{ route('admin.login') }}" class="text-sm text-indigo-600 hover:underline">
                ← Kembali ke Login
            </a>
        </div>
    </div>
</body>

</html>
