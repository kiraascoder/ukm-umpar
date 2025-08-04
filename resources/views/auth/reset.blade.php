<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold text-center mb-6">Atur Ulang Password</h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 px-4 py-3 rounded mb-4 text-sm">
                <ul class="list-disc pl-4">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="mb-4">
                <label for="email" class="block text-sm text-gray-700">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email', $email) }}" required
                    class="w-full px-4 py-2 border rounded-lg bg-gray-100 focus:outline-none focus:border-indigo-500">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm text-gray-700">Password Baru</label>
                <input id="password" type="password" name="password" required
                    class="w-full px-4 py-2 border rounded-lg bg-gray-100 focus:outline-none focus:border-indigo-500">
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm text-gray-700">Konfirmasi Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                    class="w-full px-4 py-2 border rounded-lg bg-gray-100 focus:outline-none focus:border-indigo-500">
            </div>

            <button type="submit"
                class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition">
                Reset Password
            </button>
        </form>
    </div>
</body>

</html>
