@extends('component.admin-layout')

@section('title', 'Dashboard Superadmin')

@section('content')

    <div class="p-6 bg-gray-100 min-h-screen space-y-6">
        <div class="bg-white rounded-2xl shadow p-6 flex flex-col justify-between">
            <h2 class="text-xl font-semibold text-gray-800 mb-2">Selamat Datang Superadmin 👋</h2>
            <p class="text-sm text-gray-600">Kelola seluruh UKM dan administrasi kampus melalui panel ini.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-blue-100 rounded-2xl p-6 text-center shadow">
                <h3 class="text-md font-semibold text-blue-700">Jumlah UKM</h3>
                <p class="text-4xl font-bold text-blue-900 mt-2">{{ $jumlahUkm }}</p>
            </div>

            <div class="bg-green-100 rounded-2xl p-6 text-center shadow">
                <h3 class="text-md font-semibold text-green-700">Jumlah Program Kerja</h3>
                <p class="text-4xl font-bold text-green-900 mt-2">{{ $jumlahProker }}</p>
            </div>

            <div class="bg-orange-100 rounded-2xl p-6 text-center shadow">
                <h3 class="text-md font-semibold text-orange-700">Jumlah Kegiatan</h3>
                <p class="text-4xl font-bold text-orange-900 mt-2">{{ $jumlahKegiatan }}</p>
            </div>

            <div class="bg-purple-100 rounded-2xl p-6 text-center shadow">
                <h3 class="text-md font-semibold text-purple-700">Jumlah Pesan Masuk</h3>
                <p class="text-4xl font-bold text-purple-900 mt-2">{{ $jumlahPesanMasuk }}</p>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row gap-6">
            <div class="flex-1 bg-white rounded-2xl shadow p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">📌 Kegiatan Terkini</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-4">
                    @foreach ($kegiatanTerkini as $item)
                        <div
                            class="bg-gray-50 rounded-xl p-4 shadow hover:shadow-md transition flex flex-col justify-between h-full">
                            <div>
                                <h3 class="text-base font-medium text-gray-900">{{ $item->nama }}</h3>
                                <p class="text-sm text-gray-600">Tanggal:
                                    {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</p>
                            </div>
                            <div class="mt-4">
                                <a href="{{ route('detailKegiatan', $item->id) }}"
                                    class="inline-block text-sm text-blue-600 hover:underline font-medium">
                                    Lihat Detail →
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="bg-white rounded-2xl shadow p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">📅 Kalender</h2>
                <div id="calendar" class="p-4 border rounded-lg shadow-md bg-white"></div>
            </div>
        </div>


    </div>

    <script>
        const calendarEl = document.getElementById('calendar');

        const renderCalendar = (date = new Date()) => {
            const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September",
                "Oktober", "November", "Desember"
            ];
            const dayNames = ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"];

            const year = date.getFullYear();
            const month = date.getMonth();
            const firstDay = new Date(year, month, 1).getDay();
            const lastDate = new Date(year, month + 1, 0).getDate();

            let html =
                `<div class="text-center font-semibold text-xl text-blue-800 mb-4">${monthNames[month]} ${year}</div>`;
            html += `<div class="grid grid-cols-7 gap-1 text-center font-medium text-gray-600 mb-2">`;
            dayNames.forEach(day => html += `<div class="p-2">${day}</div>`);
            html += `</div><div class="grid grid-cols-7 gap-1 text-center text-gray-800">`;

            for (let i = 0; i < firstDay; i++) {
                html += `<div></div>`;
            }

            for (let day = 1; day <= lastDate; day++) {
                const isToday = (new Date().toDateString() === new Date(year, month, day).toDateString());
                html +=
                    `<div class="p-2 rounded-lg ${isToday ? 'bg-blue-500 text-white font-bold' : 'hover:bg-gray-200'} transition-all ease-in-out duration-200 cursor-pointer">${day}</div>`;
            }

            html += `</div>`;
            calendarEl.innerHTML = html;
        };

        renderCalendar();
    </script>

@endsection
