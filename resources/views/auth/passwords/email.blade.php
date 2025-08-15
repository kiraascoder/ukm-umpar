@extends('component.app')

@section('content')
    <div class="max-w-md mx-auto p-6 bg-white rounded shadow mt-8">
        <h2 class="text-xl font-bold mb-4">Lupa Password</h2>

        @if (session('status'))
            <div class="mb-4 p-3 rounded bg-green-100 text-green-800">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <label class="block text-sm mb-1" for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                class="w-full border rounded p-2 @error('email') border-red-500 @enderror">
            @error('email')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror

            <button class="mt-4 w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                Kirim Link Reset
            </button>
        </form>
    </div>
@endsection
