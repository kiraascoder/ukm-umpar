<div
    class="relative flex h-full w-full max-w-[20rem] flex-col  bg-[#2D336B] bg-clip-border p-4 text-white shadow-xl shadow-blue-gray-900/5">
    <div class="p-4">
        <h5
            class="block font-sans text-sm antialiased font-semibold leading-snug tracking-normal text-blue-gray-900 opacity-75">
            Main Menu
        </h5>
    </div>
    <nav class="flex min-w-[240px] flex-col gap-1 p-2 font-sans text-base font-normal text-blue-gray-700">
        <div class="relative block w-full">
            <div class="relative block w-full">
                @if (Auth::user()->role == 'admin_ukm')
                    <a href="{{ route('adminUkmDashboard') }}"
                        class="flex items-center w-full p-3 rounded-lg transition-all duration-300 mb-2
                    {{ request()->routeIs('adminUkmDashboard') ? 'bg-blue-700 text-white' : 'text-white hover:bg-blue-600' }}">
                        <div class="grid mr-4 place-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                            </svg>
                        </div>
                        <p
                            class="block mr-auto font-sans text-base antialiased font-normal leading-relaxed text-blue-gray-900">
                            Dashboard
                        </p>
                    </a>
                    <a href="{{ route('adminUkmAnggota') }}"
                        class="flex items-center w-full p-3 rounded-lg transition-all duration-300 mb-2
                    {{ request()->routeIs('adminUkmAnggota') ? 'bg-blue-700 text-white' : 'text-white hover:bg-blue-600' }} ">
                        <div class="grid mr-4 place-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                        </div>
                        Anggota
                    </a>

                    <a href="{{ route('adminUkmProfile') }}"
                        class="flex items-center w-full p-3 rounded-lg transition-all duration-300 mb-2
                    {{ request()->routeIs('adminUkmProfile') ? 'bg-blue-700 text-white' : 'text-white hover:bg-blue-600' }}">
                        <div class="grid mr-4 place-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>

                        </div>
                        Profil
                    </a>
                    <a href="{{ route('adminUkmGaleri') }}"
                        class="flex items-center w-full p-3 rounded-lg transition-all duration-300 mb-2
                    {{ request()->routeIs('adminUkmGaleri') ? 'bg-blue-700 text-white' : 'text-white hover:bg-blue-600' }}">
                        <div class="grid mr-4 place-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                            </svg>
                        </div>
                        Galeri
                        <div class="grid ml-auto place-items-center justify-self-end">
                            <div
                                class="relative grid items-center px-2 py-1 font-sans text-xs font-bold uppercase rounded-full select-none whitespace-nowrap bg-blue-gray-500/20 text-blue-gray-900">

                            </div>
                        </div>
                    </a>
                    <a href="{{ route('adminUkmArsipSurat') }}"
                        class="flex items-center w-full p-3 rounded-lg transition-all duration-300 mb-2
                    {{ request()->routeIs('adminUkmArsipSurat') ? 'bg-blue-700 text-white' : 'text-white hover:bg-blue-600' }}">
                        <div class="grid mr-4 place-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>
                        </div>
                        Arsip Surat
                        <div class="grid ml-auto place-items-center justify-self-end">
                            <div
                                class="relative grid items-center px-2 py-1 font-sans text-xs font-bold uppercase rounded-full select-none whitespace-nowrap bg-blue-gray-500/20 text-blue-gray-900">

                            </div>
                        </div>
                    </a>
                    <a href="{{ route('adminUkmKeuangan') }}"
                        class="flex items-center w-full p-3 rounded-lg transition-all duration-300 mb-2
                    {{ request()->routeIs('adminUkmKeuangan') ? 'bg-blue-700 text-white' : 'text-white hover:bg-blue-600' }}">
                        <div class="grid mr-4 place-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 12a2.25 2.25 0 0 0-2.25-2.25H15a3 3 0 1 1-6 0H5.25A2.25 2.25 0 0 0 3 12m18 0v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 9m18 0V6a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 6v3" />
                            </svg>
                        </div>
                        Keuangan
                    </a>
                    <a href="{{ route('adminUkmKegiatan') }}"
                        class="flex items-center w-full p-3 rounded-lg transition-all duration-300 mb-2
                    {{ request()->routeIs('adminUkmKegiatan') ? 'bg-blue-700 text-white' : 'text-white hover:bg-blue-600' }}">
                        <div class="grid mr-4 place-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                            </svg>
                        </div>
                        Kegiatan
                    </a>
                    <a href="{{ route('adminUkmPendaftaran') }}"
                        class="flex items-center w-full p-3 rounded-lg transition-all duration-300 mb-2
                    {{ request()->routeIs('adminUkmPendaftaran') ? 'bg-blue-700 text-white' : 'text-white hover:bg-blue-600' }}">
                        <div class="grid mr-4 place-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25M9 16.5v.75m3-3v3M15 12v5.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                            </svg>
                        </div>
                        Pendaftaran
                    </a>
                    <a href="{{ route('adminUkmProker') }}"
                        class="flex items-center w-full p-3 rounded-lg transition-all duration-300 mb-2
                    {{ request()->routeIs('adminUkmProker') ? 'bg-blue-700 text-white' : 'text-white hover:bg-blue-600' }}">
                        <div class="grid mr-4 place-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                            </svg>
                        </div>
                        Program Kerja
                    </a>
                @endif
                @if (Auth::user()->role == 'admin')
                    <a href="{{ route('superAdminDashboard') }}"
                        class="flex items-center w-full p-3 rounded-lg
                        transition-all duration-300 mb-2
                        {{ request()->routeIs('superAdminDashboard') ? 'bg-blue-700 text-white' : 'text-white hover:bg-blue-600' }}"">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" class="w-5 h-5 mr-4" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                        </svg>

                        <p>Dashboard </p>
                    </a>
                    <a href="{{ route('adminUkmProgram') }}"
                        class="flex items-center w-full p-3 rounded-lg
                        transition-all duration-300 mb-2
                        {{ request()->routeIs('adminUkmProgram') ? 'bg-blue-700 text-white' : 'text-white hover:bg-blue-600' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            class="w-5 h-5 mr-4" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.242 5.992h12m-12 6.003H20.24m-12 5.999h12M4.117 7.495v-3.75H2.99m1.125 3.75H2.99m1.125 0H5.24m-1.92 2.577a1.125 1.125 0 1 1 1.591 1.59l-1.83 1.83h2.16M2.99 15.745h1.125a1.125 1.125 0 0 1 0 2.25H3.74m0-.002h.375a1.125 1.125 0 0 1 0 2.25H2.99" />
                        </svg>

                        <p>Program UKM</p>
                    </a>

                    <a href="{{ route('adminUkmList') }}"
                        class="flex items-center w-full p-3 rounded-lg
                        transition-all duration-300 mb-2
                        {{ request()->routeIs('adminUkmList') ? 'bg-blue-700 text-white' : 'text-white hover:bg-blue-600' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-6 w-5 h-5 mr-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                        </svg>

                        <p>Daftar UKM</p>
                    </a>
                    <a href="{{ route('verifikasiUkm') }}"
                        class="flex items-center w-full p-3 rounded-lg
                        transition-all duration-300 mb-2
                        {{ request()->routeIs('verifikasiUkm') ? 'bg-blue-700 text-white' : 'text-white hover:bg-blue-600' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-6 w-5 h-5 mr-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                        </svg>
                        <p>Verifikasi UKM</p>
                    </a>
                    <a href="{{ route('adminPesan') }}"
                        class="flex items-center w-full p-3 rounded-lg
                        transition-all duration-300 mb-2
                        {{ request()->routeIs('adminPesan') ? 'bg-blue-700 text-white' : 'text-white hover:bg-blue-600' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-6 w-5 h-5 mr-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                        </svg>
                        <p>Pesan</p>
                    </a>
                @endif
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit"
                        class="flex items-center w-full p-3 rounded-lg transition-all duration-300 mb-2 text-white hover:bg-blue-600">
                        <div class="grid mr-4 place-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                aria-hidden="true" class="w-5 h-5">
                                <path fill-rule="evenodd"
                                    d="M12 2.25a.75.75 0 01.75.75v9a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM6.166 5.106a.75.75 0 010 1.06 8.25 8.25 0 1011.668 0 .75.75 0 111.06-1.06c3.808 3.807 3.808 9.98 0 13.788-3.807 3.808-9.98 3.808-13.788 0-3.808-3.807-3.808-9.98 0-13.788a.75.75 0 011.06 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        Log Out
                    </button>
                </form>
            </div>
        </div>
    </nav>
</div>
