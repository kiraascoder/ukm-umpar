@extends('component.admin-layout')

@section('title', 'Dashboard Admin UKM')

@section('content')

    <div class="p-6 bg-gray-100 space-y-6">

        <!-- Welcome + Saldo -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Welcome Box -->
            <div class="bg-white rounded-2xl shadow p-6 flex flex-col justify-between">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">Selamat Datang 👋</h2>
                    <p class="text-sm text-gray-600">Halo Admin UKM <span class="font-bold">{{ $nama_ukm }}</span>, kelola
                        UKM-mu dengan baik melalui panel ini.</p>
                </div>
            </div>

            <!-- Saldo Box -->
            <div
                class="bg-gradient-to-r from-green-400 to-green-600 text-white rounded-2xl shadow p-6 lg:col-span-2 flex flex-col justify-between">
                <h2 class="text-lg font-semibold">Saldo UKM</h2>
                <p class="text-3xl font-bold mt-2">Rp {{ number_format($ukmSaldo, 0, ',', '.') }}</p>
            </div>
        </div>

        <!-- Surat Masuk/Keluar -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6">
            <div class="bg-white rounded-2xl shadow p-6">
                <h3 class="text-lg font-semibold text-blue-700">📩 Surat Masuk</h3>
                <p class="text-4xl font-bold text-blue-900 mt-2">{{ $jumlahSuratMasuk }}</p>
            </div>
            <div class="bg-white rounded-2xl shadow p-6">
                <h3 class="text-lg font-semibold text-red-700">📤 Surat Keluar</h3>
                <p class="text-4xl font-bold text-red-900 mt-2">{{ $jumlahSuratKeluar }}</p>
            </div>
        </div>

        <!-- Proker -->
        <div class="bg-white rounded-2xl shadow p-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">📌 Status Proker</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-blue-100 p-4 rounded-xl text-center shadow-sm">
                    <h4 class="text-md font-semibold text-blue-700">Total Proker</h4>
                    <p class="text-3xl font-bold text-blue-900 mt-2">{{ $proker->count() }}</p>
                </div>
                <div class="bg-green-100 p-4 rounded-xl text-center shadow-sm">
                    <h4 class="text-md font-semibold text-green-700">Proker Selesai</h4>
                    <p class="text-3xl font-bold text-green-900 mt-2">{{ $prokerSelesai }}</p>
                </div>
                <div class="bg-yellow-100 p-4 rounded-xl text-center shadow-sm">
                    <h4 class="text-md font-semibold text-yellow-700">Belum Selesai</h4>
                    <p class="text-3xl font-bold text-yellow-900 mt-2">{{ $prokerBelumSelesai }}</p>
                </div>
            </div>
        </div>

        <!-- Kegiatan Terbaru + Kalender -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Kegiatan Terbaru -->
            <div class="bg-white rounded-2xl shadow p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">🗓️ Kegiatan Terbaru</h2>
                @if ($kegiatanTerbaru)
                    <div class="p-4 border rounded-lg bg-gray-50">
                        <h3 class="text-md font-bold text-gray-800">{{ $kegiatanTerbaru->judul }}</h3>
                        <p class="text-sm text-gray-600 mt-1">{!! $kegiatanTerbaru->deskripsi !!}</p>
                        <p class="text-xs text-gray-500 mt-2">Tanggal: {{ $kegiatanTerbaru->created_at->format('d M Y') }}
                        </p>
                    </div>
                @else
                    <p class="text-sm text-gray-600">Belum ada kegiatan terbaru.</p>
                @endif
            </div>

            <!-- Kalender -->
            <div class="bg-white rounded-2xl shadow p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">📅 Kalender</h2>
                <div id="calendar"></div>
            </div>
        </div>

    </div>

    <!-- Kalender Script -->
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
            dayNames.forEach(day => html += `<div>${day}</div>`);
            html += `</div><div class="grid grid-cols-7 gap-1 text-center text-gray-800">`;

            for (let i = 0; i < firstDay; i++) {
                html += `<div></div>`;
            }

            for (let day = 1; day <= lastDate; day++) {
                const isToday = (new Date().toDateString() === new Date(year, month, day).toDateString());
                html +=
                    `<div class="p-2 rounded-lg ${isToday ? 'bg-blue-500 text-white font-bold' : 'hover:bg-gray-200'}">${day}</div>`;
            }

            html += `</div>`;
            calendarEl.innerHTML = html;
        };

        renderCalendar();
    </script>

@endsection
