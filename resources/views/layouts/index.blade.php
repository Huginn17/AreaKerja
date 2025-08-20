<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AreaKerja</title>
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
                <button class="relative">
                    <!-- Tombol Bell -->
  <button onclick="toggleModal()" class="relative">
    <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
     <path d="M23.4955 17.1131C23.3918 17.006 23.29 16.8989 23.1901 16.7955C21.8162 15.3699 20.9851 14.5096 20.9851 10.474C20.9851 8.38475 20.4024 6.67047 19.254 5.38475C18.4072 4.43493 17.2626 3.7144 15.7539 3.1819C15.7344 3.17263 15.7171 3.16048 15.7027 3.146C15.16 1.58708 13.675 0.542969 12.0002 0.542969C10.3253 0.542969 8.84094 1.58708 8.29828 3.1444C8.28379 3.15834 8.2667 3.17011 8.24769 3.17922C4.72691 4.42261 3.01586 6.80815 3.01586 10.4724C3.01586 14.5096 2.18593 15.3699 0.810843 16.7939C0.710927 16.8973 0.609138 17.0023 0.505476 17.1115C0.237702 17.3886 0.0680456 17.7256 0.0165842 18.0828C-0.0348772 18.4399 0.0340108 18.8023 0.215096 19.1269C0.600396 19.8233 1.42158 20.2556 2.35891 20.2556H21.6483C22.5812 20.2556 23.3968 19.8239 23.7833 19.1306C23.9652 18.8059 24.0347 18.4433 23.9837 18.0857C23.9327 17.7282 23.7633 17.3906 23.4955 17.1131ZM12.0002 24.543C12.9025 24.5423 13.7879 24.3322 14.5623 23.9349C15.3368 23.5375 15.9714 22.9677 16.3989 22.286C16.4191 22.2533 16.429 22.2167 16.4278 22.1798C16.4266 22.1429 16.4143 22.1068 16.392 22.0752C16.3698 22.0435 16.3384 22.0173 16.3008 21.9992C16.2633 21.981 16.221 21.9715 16.1779 21.9715H7.82368C7.78054 21.9714 7.7381 21.9809 7.70049 21.999C7.66288 22.0171 7.63138 22.0433 7.60906 22.0749C7.58674 22.1066 7.57435 22.1427 7.57311 22.1797C7.57188 22.2167 7.58182 22.2533 7.60199 22.286C8.02946 22.9677 8.664 23.5374 9.43832 23.9347C10.2126 24.3321 11.0979 24.5422 12.0002 24.543Z" fill="#FA6601"/>
    </svg>
    <span class="absolute top-0 right-0 block h-2 w-2 bg-yellow-400 rounded-full"></span>
  </button>

  <!-- Modal -->
  <div id="notifModal" class="fixed inset-0 bg-black/40 hidden z-50 justify-end">
    <div class="relative w-96 bg-white rounded-xl shadow-xl overflow-hidden mt-16 mr-10" style="margin-left: 800px">
      
      <!-- Tombol Close -->
      <button onclick="toggleModal()" 
        class="absolute top-2 right-2 text-gray-400 hover:text-red-500">
        ✕
      </button>

      <!-- Header -->
      <div class="flex justify-between items-center p-4 border-b">
        <h2 class="text-lg font-semibold">Notifikasi</h2>
        <a href="#" class="text-blue-600 text-sm">Lihat semua</a>
      </div>

      <!-- Isi Notifikasi -->
      <div>
        <!-- Item -->
        <div class="flex items-start gap-3 p-4 border-b">
          <img src="{{ asset('images/seven.png') }}" class="h-10 w-10" alt="logo">
          <div class="flex-1 text-sm">
            <p>Selamat! Lamaran yang anda ajukan ke 
              <span class="font-semibold">Seven Inc divisi Videografi</span> 
              <span class="text-green-600 font-medium">Diterima.</span>
            </p>
            <span class="text-xs text-gray-400">2 Jam lalu</span>
          </div>
        </div>
        <!-- Item -->
        <div class="flex items-start gap-3 p-4 border-b bg-gray-50">
          <img src="{{ asset('images/seven.png') }}" class="h-10 w-10" alt="logo">
          <div class="flex-1 text-sm">
            <p>Lamaran yang anda ajukan ke 
              <span class="font-semibold">Apple Corp divisi Videografi</span> 
              <span class="text-red-600 font-medium">Ditolak.</span>
            </p>
            <span class="text-xs text-gray-400">3 Jam lalu</span>
          </div>
        </div>
      </div>

      <!-- Footer -->
      <div class="p-3 text-right border-t">
        <button class="text-sm text-blue-600">Tandai Baca</button>
      </div>
    </div>
  </div>

  <script>
    function toggleModal() {
      document.getElementById("notifModal").classList.toggle("hidden");
    }
  </script>







                </button>
                {{-- <a href="#" class="px-11 py-2 bg-orange-500 text-white rounded-xl hover:bg-orange-600 transition">
                    Masuk
                </a> --}}

                <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                    <button type="button"
                        class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                        id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                        data-dropdown-placement="bottom">
                        <span class="sr-only">Open user menu</span>
                        <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-3.jpg"
                            alt="user photo">
                    </button>
                    <!-- Dropdown menu -->
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-sm dark:bg-gray-700 dark:divide-gray-600"
                        id="user-dropdown">
                        <div class="px-4 py-3">
                            <span class="block text-sm text-gray-900 dark:text-white">Bonnie Green</span>
                            <span
                                class="block text-sm  text-gray-500 truncate dark:text-gray-400">name@flowbite.com</span>
                        </div>
                        <ul class="py-2" aria-labelledby="user-menu-button">
                            <li>
                                <a href="{{ url('/profile') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-red-200 dark:hover:bg-ora-600 dark:text-gray-200 hover:text-orange-500">Profile</a>
                            </li>
                            <li>
                                <a href="{{ url('/lowongan-tersimpan') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-red-200 dark:hover:bg-gray-600 dark:text-gray-200 hover:text-orange-500">Lowongan
                                    Tersimpan</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700  hover:bg-red-200 dark:hover:bg-gray-600 dark:text-gray-200 hover:text-orange-500">Transaksi</a>
                            </li>
                            <li>
                                <a href="{{ url('/bantuan') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-red-200  hover:text-orange-500">Bantuan</a>
                            </li>
                            <li>
                                <div class="flex justify-center">
                                    <button type="submit"
                                        class=" bg-orange-500 text-white px-12 py-1 rounded font-small text-sm hover:bg-orange-600 transition mb-5">
                                        Keluar
                                    </button>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <button data-collapse-toggle="navbar-user" type="button"
                        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        aria-controls="navbar-user" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                        </svg>
                    </button>
                </div>



            </div>
        </div>
    </header>

    {{-- isi halaman --}}
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>
