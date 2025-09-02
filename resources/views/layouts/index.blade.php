<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="register-pelamar-url" content="{{ route('registerproses') }}">
    <meta name="register-perusahaan-url" content="{{ route('registerproses_perusahaan') }}">


    <title>areakerja.com</title>
    @vite('resources/css/app.css')
    <link rel="icon" type="image/png" href="{{ asset('images/logoarea.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/fill/style.css" />
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>
    {{-- 🔹 Navbar --}}
    <header class="bg-white border-b border-gray-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">

            {{-- Logo --}}
            <div class="flex items-center gap-2">
                <img src="{{ asset('images/logoarea.png') }}" alt="Areakerja Logo" class="h-12">
                <span class="font-bold text-xl text-orange-600">areakerja.com</span>
            </div>

            {{-- Menu --}}
            <nav class="hidden md:flex gap-6 font-medium text-orange-500">
                <a href="{{ url('/beranda') }}" class="hover:text-orange-700">Beranda</a>
                <a href="{{ url('/talent-hunter') }}" class="hover:text-orange-700">Talent Hunter</a>
                <a href="{{ url('/tips-kerja') }}" class="hover:text-orange-700">Tips Kerja</a>
                <a href="{{ url('/daftar-kandidat') }}" class="hover:text-orange-700">Daftar Kandidat</a>
                <a href="{{ url('/lowongan') }}" class="hover:text-orange-700">Pasang Lowongan</a>
            </nav>

            {{-- Aksi --}}
            <div class="flex items-center gap-5">
                {{-- Notifikasi --}}
                <button onclick="toggleModal()" class="relative">
                    <svg width="58" height="26" viewBox="0 0 58 26" xmlns="http://www.w3.org/2000/svg">
                        <path d="M23.4955 18.1131C23.3918 ..." fill="#FA6601" />
                        <circle cx="18" cy="3.54297" r="3" fill="#FFCB13" />
                    </svg>
                </button>

                {{-- Jika belum login tampilkan tombol Masuk --}}
                @guest
                    <a href="{{ route('login') }}"
                        class="px-11 py-2 bg-orange-500 text-white rounded-xl hover:bg-orange-600 transition">
                        Masuk
                    </a>
                @endguest

                {{-- Jika sudah login tampilkan dropdown --}}
                @auth
                    <div class="flex items-center space-x-3">
                        {{-- Foto Profil --}}
                        <button type="button" id="user-menu-button"
                            class="flex text-sm rounded-full focus:ring-4 focus:ring-gray-300"
                            data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                            <span class="sr-only">Open user menu</span>
                            @if (Auth::user()->role == 'pelamar')
                                @if (Auth::user()->pelamar->img_profile)
                                    <img id="pi" class="w-10 h-10  object-cover rounded-full profile-img"
                                        src="{{ asset('storage/' . Auth::user()->pelamar->img_profile) }}" alt="Profile">
                                @else
                                    <img id="pi" class="w-10 h-10 rounded-full"
                                        src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                                        alt="">
                                @endif
                            @else
                                <img class="w-10 h-10 rounded-full"
                                    src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                                    alt="">
                            @endif
                        </button>

                        {{-- Dropdown --}}
                        <div class="z-50 hidden my-4 text-base bg-white divide-y divide-gray-100 rounded-lg shadow-md"
                            id="user-dropdown">
                            <div class="px-4 py-3">
                                <span class="block text-sm text-gray-900">{{ Auth::user()->username }}</span>
                                <span class="block text-sm text-gray-500 truncate">{{ Auth::user()->email }}</span>
                            </div>
                            <ul class="py-2" aria-labelledby="user-menu-button">
                                @if (Auth::user()->role == 'superadmin')
                                    <li class="px-3 font-semibold text-orange-600">SuperAdmin</li>
                                    <li>
                                        <a href="/dashboard/superadmin"
                                            class="block px-4 py-2 text-sm hover:bg-gray-100 hover:text-orange-500">Dashboard</a>
                                    </li>
                                @else
                                    <li>
                                        <a href="/profile"
                                            class="block px-4 py-2 text-sm hover:bg-gray-100 hover:text-orange-500">Profil</a>
                                    </li>
                                    <li>
                                        <a href="/lowongan/tersimpan"
                                            class="block px-4 py-2 text-sm hover:bg-gray-100 hover:text-orange-500">Lowongan
                                            Tersimpan</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm hover:bg-gray-100 hover:text-orange-500">Transaksi</a>
                                    </li>
                                    <li>
                                        <a href="/bantuan"
                                            class="block px-4 py-2 text-sm hover:bg-gray-100 hover:text-orange-500">Bantuan</a>
                                    </li>
                                @endif
                                <li>
                                    <form action="{{ route('logout_pelamar') }}" method="POST" class="flex justify-center mt-2">
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
    </header>

    {{-- Isi Halaman --}}
    @yield('content')


    {{-- Onboarding Tooltip --}}
    <div id="onboarding" class="hidden">
        <div class="fixed inset-0 bg-black bg-opacity-70 z-40"></div>
        <div class="absolute top-20 right-6 bg-white p-4 rounded-lg shadow-lg z-50 max-w-xs">
            <p class="text-sm">Silahkan lengkapi <span class="font-semibold">Profil</span> anda terlebih dahulu.</p>
            <div class="mt-3 text-right">
                <button onclick="closeOnboarding()"
                    class="px-3 py-1 bg-orange-500 text-white rounded-md hover:bg-orange-600 transition">
                    OK
                </button>
            </div>
            <div class="absolute top-3 -left-2 w-0 h-0 border-y-8 border-y-transparent border-r-8 border-r-white">
            </div>
        </div>
    </div>

    {{-- Script --}}
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

    {{-- Liat Gambar --}}
    <script>
        document.getElementById('fileinput').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    document.getElementById('pp').setAttribute('src', event.target.result);
                    document.getElementById('pi').setAttribute('src', event.target.result);
                }
                reader.readAsDataURL(file);
            }
        });
    </script>

    @include('layouts.modal-logout')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="{{ asset('js/non_user.js') }}"></script>
</body>

</html>
