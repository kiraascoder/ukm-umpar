@extends('component.app')

@section('content')
    <div class="max-w-md mx-auto p-6 bg-white rounded shadow mt-8">
        <h2 class="text-xl font-bold mb-4">Atur Password Baru</h2>

        @if ($errors->any())
            <div class="mb-4 p-3 rounded bg-red-100 text-red-800">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ $email }}">

            <label class="block text-sm mb-1" for="password">Password Baru</label>
            <input id="password" type="password" name="password" required class="w-full border rounded p-2">

            <label class="block text-sm mb-1 mt-3" for="password_confirmation">Konfirmasi Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required
                class="w-full border rounded p-2">

            <button class="mt-4 w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                Simpan Password
            </button>
        </form>
    </div>
@endsection
