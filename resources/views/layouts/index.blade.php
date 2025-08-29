<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>areakerja.com</title>
    @vite('resources/css/app.css')
    <link rel="icon" sizes="512x512" type="image/png" href="{{ asset('images/logoarea.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- Paksa semua teks pakai Poppins  --}}
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>
    {{-- navbar --}}
    <header class="bg-white border-b border-gray-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            {{-- logo --}}
            <div class="flex items-center gap-2">
                <img src="{{ asset('images/logoarea.png') }}" alt="Areakerja Logo" class="h-12">
                <span class="font-bold text-xl text-orange-600 ">areakerja.com</span>
            </div>

            {{-- menu --}}
            <nav class="hidden md:flex gap-6 font-medium text-orange-500">
                <a href="{{ url('/beranda') }}" class="hover:text-orange-700">Beranda</a>
                <a href="{{ url('/talent-hunter') }}" class="hover:text-orange-700">Talent Hunter</a>
                <a href="{{ url('/tips-kerja') }}" class="hover:text-orange-700">Tips Kerja</a>
                <a href="{{ url('/daftar-kandidat') }}" class="hover:text-orange-700">Daftar Kandidat</a>
                <a href="{{ url('/lowongan') }}" class="hover:text-orange-700">Pasang Lowongan</a>
            </nav>


            {{-- aksi --}}
            <div class="flex items-center gap-5">
                {{-- 🔔 Notifikasi --}}
                <button class="relative">
                    <button onclick="toggleModal()" class="relative">
                      <svg width="58" height="26" viewBox="0 0 58 26" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M23.4955 18.1131C23.3918 18.006 23.29 17.8989 23.1901 17.7955C21.8162 16.3699 20.9851 15.5096 20.9851 11.474C20.9851 9.38475 20.4024 7.67047 19.254 6.38475C18.4072 5.43493 17.2626 4.7144 15.7539 4.1819C15.7344 4.17263 15.7171 4.16048 15.7027 4.146C15.16 2.58708 13.675 1.54297 12.0002 1.54297C10.3253 1.54297 8.84094 2.58708 8.29828 4.1444C8.28379 4.15834 8.2667 4.17011 8.24769 4.17922C4.72691 5.42261 3.01586 7.80815 3.01586 11.4724C3.01586 15.5096 2.18593 16.3699 0.810843 17.7939C0.710927 17.8973 0.609138 18.0023 0.505476 18.1115C0.237702 18.3886 0.0680456 18.7256 0.0165842 19.0828C-0.0348772 19.4399 0.0340108 19.8023 0.215096 20.1269C0.600396 20.8233 1.42158 21.2556 2.35891 21.2556H21.6483C22.5812 21.2556 23.3968 20.8239 23.7833 20.1306C23.9652 19.8059 24.0347 19.4433 23.9837 19.0857C23.9327 18.7282 23.7633 18.3906 23.4955 18.1131ZM12.0002 25.543C12.9025 25.5423 13.7879 25.3322 14.5623 24.9349C15.3368 24.5375 15.9714 23.9677 16.3989 23.286C16.4191 23.2533 16.429 23.2167 16.4278 23.1798C16.4266 23.1429 16.4143 23.1068 16.392 23.0752C16.3698 23.0435 16.3384 23.0173 16.3008 22.9992C16.2633 22.981 16.221 22.9715 16.1779 22.9715H7.82368C7.78054 22.9714 7.7381 22.9809 7.70049 22.999C7.66288 23.0171 7.63138 23.0433 7.60906 23.0749C7.58674 23.1066 7.57435 23.1427 7.57311 23.1797C7.57188 23.2167 7.58182 23.2533 7.60199 23.286C8.02946 23.9677 8.664 24.5374 9.43832 24.9347C10.2126 25.3321 11.0979 25.5422 12.0002 25.543Z" fill="#FA6601"/>
<circle cx="18" cy="3.54297" r="3" fill="#FFCB13"/>
</svg>

                   
                    </button>
                </button>

                {{-- 🔹 Jika belum login tampilkan tombol Masuk --}}
                @guest
                    <a href="{{ route('login') }}"
                        class="px-11 py-2 bg-orange-500 text-white rounded-xl hover:bg-orange-600 transition">
                        Masuk
                    </a>
                @endguest

                {{-- 🔹 Jika sudah login tampilkan foto profil + dropdown --}}
                @auth
                    <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                        <button type="button" class="flex text-sm rounded-full focus:ring-4 focus:ring-gray-300"
                            id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                            data-dropdown-placement="bottom">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-9 h-9 rounded-full border-2 border-orange-500"
                                src="{{ Auth::user()->profile_picture ?? 'https://ui-avatars.com/api/?name=' . Auth::user()->name }}"
                                alt="user photo">
                        </button>

                        <!-- Dropdown -->
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-md"
                            id="user-dropdown">
                            <div class="px-4 py-3">
                                <span class="block text-sm text-gray-900">{{ Auth::user()->name }}</span>
                                <span class="block text-sm text-gray-500 truncate">{{ Auth::user()->email }}</span>
                            </div>
                            <ul class="py-2" aria-labelledby="user-menu-button">
                                <li>
                                    <a href="{{ url('/profile') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-orange-500">Profil</a>
                                </li>
                                <li>
                                    <a href="{{ url('/lowongan-tersimpan') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-orange-500">Lowongan
                                        Tersimpan</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-orange-500">Transaksi</a>
                                </li>
                                <li>
                                    <a href="{{ url('/bantuan') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-orange-500">Bantuan</a>
                                </li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST" class="flex justify-center mt-2">
                                        @csrf
                                        <button type="submit"
                                            class="px-10 py-1 bg-orange-500 text-white rounded-lg shadow-md hover:bg-orange-600 transition">
                                            Keluar
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endauth
            </div>


        </div>
        </div>
    </header>

    {{-- isi halaman --}}
    @yield('content')

    <!-- Overlay + Tooltip -->
    <div id="onboarding" class="hidden">
        <!-- Overlay gelap -->
        <div class="fixed inset-0 bg-black bg-opacity-70 z-40"></div>

        <!-- Tooltip -->
        <div class="absolute top-20 right-6 bg-white text-black p-4 rounded-lg shadow-lg z-50 max-w-xs">
            <p class="text-sm">
                Silahkan lengkapi <span class="font-semibold">Profil</span> anda terlebih dahulu.
            </p>
            <div class="mt-3 text-right">
                <button onclick="closeOnboarding()"
                    class="px-3 py-1 bg-orange-500 text-white rounded-md hover:bg-orange-600 transition">
                    OK
                </button>
            </div>

            <!-- Segitiga kecil -->
            <div class="absolute top-3 -left-2 w-0 h-0 border-y-8 border-y-transparent border-r-8 border-r-white"></div>
        </div>
    </div>

    <script>
        function showOnboarding() {
            document.getElementById('onboarding').classList.remove('hidden');
        }

        function closeOnboarding() {
            document.getElementById('onboarding').classList.add('hidden');
        }

        window.onload = function() {
            let firstLogin = "{{ session('first_login') }}";
            if (firstLogin) {
                showOnboarding();
            }
        };
    </script>





    @include('layouts.modal-logout')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>
