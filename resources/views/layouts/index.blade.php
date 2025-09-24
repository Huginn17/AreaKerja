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

    <!-- 🔹 Opsi 1: Pakai JS Loader (paling mudah) -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>

    <!-- 🔹 Opsi 2: Kalau mau CSS langsung (style regular) -->
    <!-- <link rel="stylesheet" href="https://unpkg.com/@phosphor-icons/web/src/regular/style.css"> -->
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>


<body x-data="{ openNotif: false }">
    {{-- Navbar --}}
    <header class="bg-white border-b border-gray-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">

            {{-- Logo --}}
            <div class="flex items-center gap-2">
                <img src="{{ asset('images/logoarea.png') }}" alt="Areakerja Logo" class="h-12">
                <span class="font-bold text-xl text-orange-600">areakerja.com</span>
            </div>

            {{-- Menu --}}
            <nav class="hidden md:flex gap-6 font-semibold text-orange-500">
                <a href="{{ url('/beranda') }}" class="hover:text-orange-500">Beranda</a>
                <a href="{{ url('/talent-hunter') }}" class="hover:text-orange-500">Talent Hunter</a>
                <a href="{{ url('/tips-kerja') }}" class="hover:text-orange-500">Tips Kerja</a>
                <a href="{{ url('/daftar-kandidat') }}" class="hover:text-orange-500">Daftar Kandidat</a>
                <a href="{{ url('/lowongan') }}" class="hover:text-orange-500">Pasang Lowongan</a>
            </nav>

            {{-- Aksi --}}
            <div class="flex items-center gap-5">
                {{-- Notifikasi --}}
                <button @click="openNotif = true" class="relative">
                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M23.4955 17.1131C23.3918 17.006 23.29 16.8989 23.1901 16.7955C21.8162 15.3699 20.9851 14.5096 20.9851 10.474C20.9851 8.38475 20.4024 6.67047 19.254 5.38475C18.4072 4.43493 17.2626 3.7144 15.7539 3.1819C15.7344 3.17263 15.7171 3.16048 15.7027 3.146C15.16 1.58708 13.675 0.542969 12.0002 0.542969C10.3253 0.542969 8.84094 1.58708 8.29828 3.1444C8.28379 3.15834 8.2667 3.17011 8.24769 3.17922C4.72691 4.42261 3.01586 6.80815 3.01586 10.4724C3.01586 14.5096 2.18593 15.3699 0.810843 16.7939C0.710927 16.8973 0.609138 17.0023 0.505476 17.1115C0.237702 17.3886 0.0680456 17.7256 0.0165842 18.0828C-0.0348772 18.4399 0.0340108 18.8023 0.215096 19.1269C0.600396 19.8233 1.42158 20.2556 2.35891 20.2556H21.6483C22.5812 20.2556 23.3968 19.8239 23.7833 19.1306C23.9652 18.8059 24.0347 18.4433 23.9837 18.0857C23.9327 17.7282 23.7633 17.3906 23.4955 17.1131ZM12.0002 24.543C12.9025 24.5423 13.7879 24.3322 14.5623 23.9349C15.3368 23.5375 15.9714 22.9677 16.3989 22.286C16.4191 22.2533 16.429 22.2167 16.4278 22.1798C16.4266 22.1429 16.4143 22.1068 16.392 22.0752C16.3698 22.0435 16.3384 22.0173 16.3008 21.9992C16.2633 21.981 16.221 21.9715 16.1779 21.9715H7.82368C7.78054 21.9714 7.7381 21.9809 7.70049 21.999C7.66288 22.0171 7.63138 22.0433 7.60906 22.0749C7.58674 22.1066 7.57435 22.1427 7.57311 22.1797C7.57188 22.2167 7.58182 22.2533 7.60199 22.286C8.02946 22.9677 8.664 23.5374 9.43832 23.9347C10.2126 24.3321 11.0979 24.5422 12.0002 24.543Z"
                            fill="#FA6601" />
                    </svg>
                    @if ($unreadCount > 0)
                        <span
                            class="absolute -top-1 -right-1 flex items-center justify-center h-5 w-5 text-xs font-bold text-white bg-red-500 rounded-full">
                            {{ $unreadCount }}
                        </span>
                    @endif
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
                                <li>
                                    <a href="{{ route('profile.index') }}"
                                        class="block px-4 py-2 text-sm hover:bg-gray-100 hover:text-orange-500">Profil</a>
                                </li>
                                <li>
                                    <a href="{{ route('lowongan.tersimpan') }}"
                                        class="block px-4 py-2 text-sm hover:bg-gray-100 hover:text-orange-500">Lowongan
                                        Tersimpan</a>
                                </li>
                                <li>
                                    <a href="tran-tf-kosong"
                                        class="block px-4 py-2 text-sm hover:bg-gray-100 hover:text-orange-500">Transaksi</a>
                                </li>
                                <li>
                                    <a href="/bantuan"
                                        class="block px-4 py-2 text-sm hover:bg-gray-100 hover:text-orange-500">Bantuan</a>
                                </li>
                                <li>
                                    <form action="{{ route('logout_pelamar') }}" method="POST"
                                        class="flex justify-center mt-2">
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

    <!-- Modal Notifikasi -->
    <div x-cloak x-show="openNotif" class="fixed inset-0 z-50 flex items-start justify-end p-4 "
        @click.self="openNotif = false">
        <div class="bg-white w-[380px] rounded-xl shadow-lg overflow-hidden">
            <!-- Header -->
            <div class="flex items-center justify-between px-4 py-3 border-b">
                <h2 class="font-semibold text-lg">Notifikasi</h2>
                <a href="{{ route('pelamar.notifikasi') }}" class="text-sm text-orange-500">Lihat semua</a>
            </div>

            <!-- Isi Notifikasi -->
            <div class="max-h-[400px] overflow-y-auto divide-y">
                @forelse($notifs as $notif)
                    <a href="{{ route('pelamar.notifikasi.show', $notif->id) }}"
                        class="flex gap-3 p-4 notif-item {{ $notif->is_read ? 'bg-gray-100' : 'bg-white' }} hover:bg-gray-50 transition">

                        {{-- Foto perusahaan --}}
                        <img src="{{ $notif->lowongan_perusahaan->perusahaan->img_profile
                            ? asset('storage/' . $notif->lowongan_perusahaan->perusahaan->img_profile)
                            : asset('images/default-company.png') }}"
                            class="w-10 h-10 rounded object-cover">

                        {{-- Isi notif --}}
                        <div class="flex-1">
                            <p class="text-sm">
                                @if ($notif->status === 'diterima')
                                    <b>Selamat!</b> Lamaran yang kamu ajukan ke
                                    <span
                                        class="font-semibold">{{ $notif->lowongan_perusahaan->perusahaan->nama_perusahaan }}</span>
                                    divisi <span class="font-semibold">{{ $notif->lowongan_perusahaan->nama }}</span>
                                    <span class="text-green-600">diterima</span>.
                                @elseif($notif->status === 'ditolak')
                                    Lamaran ke
                                    <span
                                        class="font-semibold">{{ $notif->lowongan_perusahaan->perusahaan->nama_perusahaan }}</span>
                                    divisi <span class="font-semibold">{{ $notif->lowongan_perusahaan->nama }}</span>
                                    <span class="text-red-600">ditolak</span>.
                                @endif
                            </p>
                            <span class="text-xs text-gray-400">{{ $notif->updated_at->diffForHumans() }}</span>
                        </div>
                    </a>
                @empty
                    <div class="p-4 text-sm text-gray-500 text-center">Belum ada notifikasi</div>
                @endforelse
            </div>


            <!-- Footer -->
            <div class="p-3 border-t text-right">
                <button id="markAllBtn" class="text-sm text-blue-600 hover:underline">Tandai Baca</button>
            </div>
        </div>
    </div>


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

    {{-- notif baca semua --}}
    <script>
        document.getElementById('markAllBtn').addEventListener('click', function() {
            fetch("{{ route('notifikasi.bacaSemua') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({})
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        // Update tampilan notif jadi "sudah dibaca"
                        document.querySelectorAll('.notif-item').forEach(item => {
                            item.classList.remove('bg-gray-50');
                            item.classList.add('opacity-60'); // contoh efek kalau sudah dibaca
                        });

                        // Hilangkan tanda "dot" kuning di icon notif
                        let dot = document.querySelector('.relative .bg-yellow-400');
                        if (dot) dot.remove();
                    }
                })
                .catch(err => console.error(err));
        });
    </script>


    @include('layouts.modal-logout')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="{{ asset('js/non_user.js') }}"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>

</html>
