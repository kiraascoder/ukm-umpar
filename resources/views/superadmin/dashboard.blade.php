@extends('component.admin-layout')

@section('title', 'Dashboard Superadmin')

@section('content')

    <div class="p-6 bg-gray-100 min-h-screen space-y-6">

        <!-- Welcome Message -->
        <div class="bg-white rounded-2xl shadow p-6 flex flex-col justify-between">
            <h2 class="text-xl font-semibold text-gray-800 mb-2">Selamat Datang Superadmin 👋</h2>
            <p class="text-sm text-gray-600">Kelola seluruh UKM dan administrasi kampus melalui panel ini.</p>
        </div>

        <!-- Statistik Utama -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-blue-100 rounded-2xl p-6 text-center shadow">
                <h3 class="text-md font-semibold text-blue-700">Jumlah UKM</h3>
                <p class="text-4xl font-bold text-blue-900 mt-2">10</p> <!-- Ganti dengan variabel $jumlahUkm jika ada -->
            </div>

            <div class="bg-green-100 rounded-2xl p-6 text-center shadow">
                <h3 class="text-md font-semibold text-green-700">Jumlah Program Kerja</h3>
                <p class="text-4xl font-bold text-green-900 mt-2">25</p> <!-- Ganti dengan variabel yang sesuai -->
            </div>

            <div class="bg-orange-100 rounded-2xl p-6 text-center shadow">
                <h3 class="text-md font-semibold text-orange-700">Jumlah Kegiatan</h3>
                <p class="text-4xl font-bold text-orange-900 mt-2">5</p> <!-- Ganti dengan variabel yang sesuai -->
            </div>

            <div class="bg-purple-100 rounded-2xl p-6 text-center shadow">
                <h3 class="text-md font-semibold text-purple-700">Jumlah Anggota</h3>
                <p class="text-4xl font-bold text-purple-900 mt-2">200</p> <!-- Ganti dengan variabel yang sesuai -->
            </div>
        </div>

        <!-- Kegiatan Terkini dan Kalender -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Kegiatan Terkini -->
            <div class="bg-white rounded-2xl shadow p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">📌 Kegiatan Terkini</h2>
                <ul class="list-disc pl-5 text-gray-700">
                    <li>Kegiatan 1 - Tanggal</li>
                    <li>Kegiatan 2 - Tanggal</li>
                    <li>Kegiatan 3 - Tanggal</li>
                    <li>Kegiatan 4 - Tanggal</li>
                    <!-- Tambahkan kegiatan terkini lainnya di sini -->
                </ul>
            </div>

            <!-- Kalender -->
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
