@extends('component.admin-layout')

@section('title', 'Dashboard Admin UKM')

@section('content')
    <h1 class="text-2xl text-gray-800 pl-6 pt-6">Dashboard</h1>
    <div class="bg-gray-100 p-6 grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-1 bg-white p-4 rounded-2xl shadow">
            <h2 class="text-lg font-semibold text-gray-700 mb-2">Left Section</h2>
            <p class="text-sm text-gray-600">Konten sebelah kiri.</p>
        </div>
        <div class="lg:col-span-2 bg-white p-4 rounded-2xl shadow">
            <h2 class="text-lg font-semibold text-gray-700 mb-2">Right Section</h2>
            <p class="text-sm text-gray-600">Konten sebelah kanan, bisa lebih lebar.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:col-span-2">
            <div class="bg-white p-4 rounded-2xl shadow">
            </div>

            <div class="bg-white p-4 rounded-2xl shadow">
            </div>
            <div class="bg-white p-4 rounded-2xl shadow md:col-span-2">
                <div class="text-gray-500 mb-4">Monthly Sales</div>
                <div class="flex items-end justify-between h-48">
                    @php
                        $months = [
                            'Jan' => 150,
                            'Feb' => 380,
                            'Mar' => 180,
                            'Apr' => 280,
                            'May' => 170,
                            'Jun' => 180,
                            'Jul' => 230,
                            'Aug' => 90,
                            'Sep' => 210,
                            'Oct' => 350,
                            'Nov' => 270,
                            'Dec' => 90,
                        ];
                    @endphp
                    @foreach ($months as $month => $value)
                        <div class="flex flex-col items-center text-xs">
                            <div class="bg-blue-500 w-4 rounded" style="height: {{ $value / 2 }}px;"></div>
                            <div class="mt-1">{{ $month }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="bg-white p-6 rounded-2xl shadow flex flex-col justify-between">
            <div>
                <div class="text-gray-500 mb-2">Monthly Target</div>
                <div class="flex justify-center mb-4">

                    <div class="relative w-32 h-32">
                        <div
                            class="absolute inset-0 rounded-full border-[10px] border-blue-500 border-t-transparent rotate-45">
                        </div>
                        <div class="absolute inset-0 flex items-center justify-center text-2xl font-bold">
                            75.55%
                        </div>
                    </div>
                </div>
                <div class="text-green-500 text-center text-sm mb-2">+10%</div>
                <p class="text-center text-sm text-gray-600">
                    You earn $3287 today, it's higher than last month.<br>
                    Keep up your good work!
                </p>
            </div>
            <div class="mt-6 grid grid-cols-3 text-center text-sm">
                <div>
                    <div class="text-gray-500">Target</div>
                    <div class="text-red-500 font-semibold">$20K ↓</div>
                </div>
                <div>
                    <div class="text-gray-500">Revenue</div>
                    <div class="font-semibold">$20K</div>
                </div>
                <div>
                    <div class="text-gray-500">Today</div>
                    <div class="text-green-500 font-semibold">$20K ↑</div>
                </div>
            </div>
        </div>
        <div class="lg:col-span-3 w-full bg-white p-4 rounded-2xl shadow">
            <h2 class="text-lg font-semibold text-gray-700 mb-2">Full Width Section</h2>
            <p class="text-sm text-gray-600">Ini adalah bagian tambahan yang mengisi seluruh lebar di bawah grid.</p>
        </div>
        <div class="lg:col-span-1 bg-white p-4 rounded-2xl shadow">
            <h2 class="text-lg font-semibold text-gray-700 mb-2">Left Section</h2>
            <p class="text-sm text-gray-600">Konten sebelah kiri.</p>
        </div>

        <div class="lg:col-span-2 bg-white p-4 rounded-2xl shadow">
            <h2 class="text-lg font-semibold text-gray-700 mb-2">Right Section</h2>
            <p class="text-sm text-gray-600">Konten sebelah kanan, bisa lebih lebar.</p>
        </div>
    </div>
@endsection
