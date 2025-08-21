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
            <nav class="hidden md:flex gap-6 font-semibold text-gray-800">
                <a href="{{ url('/beranda') }}" class="hover:text-orange-700">Berlangganan</a>
                <a href="{{ url('/talent-hunter') }}" class="hover:text-orange-700">Talent Hunter</a>
                <a href="{{ url('/tips-kerja') }}" class="hover:text-orange-700">Kandidat</a>
                <a href="{{ url('/daftar-kandidat') }}" class="hover:text-orange-700">Pasang Lowongan</a>
                <a href="{{ url('/lowongan') }}" class="hover:text-orange-700">Event</a>
            </nav>


            {{-- aksi --}}
            <div class="flex items-center gap-5">
                <button class="relative">
                    <!-- Tombol Bell -->
                    <button onclick="toggleModal()" class="relative">
                        <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M23.4955 17.1131C23.3918 17.006 23.29 16.8989 23.1901 16.7955C21.8162 15.3699 20.9851 14.5096 20.9851 10.474C20.9851 8.38475 20.4024 6.67047 19.254 5.38475C18.4072 4.43493 17.2626 3.7144 15.7539 3.1819C15.7344 3.17263 15.7171 3.16048 15.7027 3.146C15.16 1.58708 13.675 0.542969 12.0002 0.542969C10.3253 0.542969 8.84094 1.58708 8.29828 3.1444C8.28379 3.15834 8.2667 3.17011 8.24769 3.17922C4.72691 4.42261 3.01586 6.80815 3.01586 10.4724C3.01586 14.5096 2.18593 15.3699 0.810843 16.7939C0.710927 16.8973 0.609138 17.0023 0.505476 17.1115C0.237702 17.3886 0.0680456 17.7256 0.0165842 18.0828C-0.0348772 18.4399 0.0340108 18.8023 0.215096 19.1269C0.600396 19.8233 1.42158 20.2556 2.35891 20.2556H21.6483C22.5812 20.2556 23.3968 19.8239 23.7833 19.1306C23.9652 18.8059 24.0347 18.4433 23.9837 18.0857C23.9327 17.7282 23.7633 17.3906 23.4955 17.1131ZM12.0002 24.543C12.9025 24.5423 13.7879 24.3322 14.5623 23.9349C15.3368 23.5375 15.9714 22.9677 16.3989 22.286C16.4191 22.2533 16.429 22.2167 16.4278 22.1798C16.4266 22.1429 16.4143 22.1068 16.392 22.0752C16.3698 22.0435 16.3384 22.0173 16.3008 21.9992C16.2633 21.981 16.221 21.9715 16.1779 21.9715H7.82368C7.78054 21.9714 7.7381 21.9809 7.70049 21.999C7.66288 22.0171 7.63138 22.0433 7.60906 22.0749C7.58674 22.1066 7.57435 22.1427 7.57311 22.1797C7.57188 22.2167 7.58182 22.2533 7.60199 22.286C8.02946 22.9677 8.664 23.5374 9.43832 23.9347C10.2126 24.3321 11.0979 24.5422 12.0002 24.543Z"
                                fill="#FA6601" />
                        </svg>
                        <span class="absolute top-0 right-0 block h-2 w-2 bg-yellow-400 rounded-full"></span>
                    </button>

                    <!-- Modal -->
                    <div id="notifModal" class="fixed inset-0 bg-black/40 hidden z-50 justify-end">
                        <div class="relative w-96 bg-white rounded-xl shadow-xl overflow-hidden mt-16 mr-10"
                            style="margin-left: 800px">

                             <div class="text-right mr-5 mt-3">
                               <button onclick="toggleModal()" class="text-gray-400 hover:text-red-500">
                                 ✕
                                </button>  

                             </div> 
                            <!-- Header -->
                            <div class="flex justify-between items-center p-4 border-b">
                                
                                <h2 class="text-lg font-medium">Notifikasi</h2>
                                <a href="#" class="text-orange-500 text-sm">Lihat semua</a>
                            </div>

                            <!-- Isi Notifikasi -->
                            <div>
                                <!-- Item -->
                                <div class="flex items-start gap-3 p-4 border-b">
                                    <img src="{{ asset('images/seven.png') }}" class="h-10 w-10" alt="logo">
                                    <div class="flex-1 text-sm">
                                        <p>Kandidat Anda Telah Siap</p>
                                        <div class="text-right">
                                          <span class="text-xs text-gray-400">2 Jam lalu</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Item -->
                                <div class="flex items-start gap-3 p-4 border-b bg-gray-50">
                                    <img src="{{ asset('images/seven.png') }}" class="h-10 w-10" alt="logo">
                                    <div class="flex-1 text-sm">
                                        <p>Anda Telah Melakukan Top Up Coin AK Sebesar 1000</p>
                                        <div class="text-right">
                                          <span class="text-xs text-gray-400">3 Jam lalu</span>
                                        </div>
                                    </div>
                                </div>
                                  <div class="flex items-start gap-3 p-4 border-b bg-gray-50">
                                    <img src="{{ asset('images/seven.png') }}" class="h-10 w-10" alt="logo">
                                    <div class="flex-1 text-sm">
                                        <p>Selesaikan transaksi sebelum estimasi habis melanjutkan Top Up Poin AK sebesar Rp.502.000,-</p>
                                        <div class="text-right">
                                          <span class="text-xs text-gray-400">3 Jam lalu</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Footer -->
                            <div class="p-3 text-right border-t">
                                <button class="text-sm text-gray-800">Tandai Baca</button>
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
                    <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0" id="user-menu-button"
                        aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                        <span class="sr-only">Open user menu</span>
                        <div class="bg-orange-500 text-sm text-white px-6 p-2 rounded-lg">
                            <p>Seven inc</p>
                        </div>
                        <!-- <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-3.jpg"
                            alt="user photo"> -->
                    </button>

                    <!-- Dropdown menu -->
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-md dark:bg-gray-700 dark:divide-gray-600 border" id="user-dropdown">
                        <div class="bg-white rounded-2xl shadow-lg w-80 overflow-hidden">
                            <!-- Header -->
                            <div class="flex items-center gap-3 px-5 py-4">
                                <img src="{{ asset('images/logoarea.png') }}" alt="Logo" class="w-10 h-10">
                                <div>
                                    <h2 class="font-semibold text-gray-800">Seven Inc</h2>
                                    <p class="text-sm text-gray-500">seveninc@gmail.com</p>
                                </div>
                            </div>
                            <hr>

                            <!-- Menu -->
                            <div class="flex flex-col mt-4">
                                <a href="#"
                                    class="flex items-center gap-3 px-5 py-3 bg-orange-50 text-orange-600 font-medium">
                                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11 1C5.477 1 1 5.477 1 11C1 16.523 5.477 21 11 21C16.523 21 21 16.523 21 11C21 5.477 16.523 1 11 1Z"
                                            stroke="#FA6601" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M3.27344 17.346C3.27344 17.346 5.50244 14.5 11.0024 14.5C16.5024 14.5 18.7324 17.346 18.7324 17.346M11.0024 11C11.7981 11 12.5611 10.6839 13.1238 10.1213C13.6864 9.55871 14.0024 8.79565 14.0024 8C14.0024 7.20435 13.6864 6.44129 13.1238 5.87868C12.5611 5.31607 11.7981 5 11.0024 5C10.2068 5 9.44373 5.31607 8.88112 5.87868C8.31851 6.44129 8.00244 7.20435 8.00244 8C8.00244 8.79565 8.31851 9.55871 8.88112 10.1213C9.44373 10.6839 10.2068 11 11.0024 11Z"
                                            fill="#FA6601" />
                                    </svg>

                                    Profil Perusahaan
                                </a>

                                <a href="#"
                                    class="flex items-center gap-3 px-5 py-3 text-gray-700 hover:bg-gray-100">
                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2 19C1.45 19 0.979333 18.8043 0.588 18.413C0.196667 18.0217 0.000666667 17.5507 0 17V6C0 5.45 0.196 4.97933 0.588 4.588C0.98 4.19667 1.45067 4.00067 2 4H6V2C6 1.45 6.196 0.979333 6.588 0.588C6.98 0.196667 7.45067 0.000666667 8 0H12C12.55 0 13.021 0.196 13.413 0.588C13.805 0.98 14.0007 1.45067 14 2V4H18C18.55 4 19.021 4.196 19.413 4.588C19.805 4.98 20.0007 5.45067 20 6V17C20 17.55 19.8043 18.021 19.413 18.413C19.0217 18.805 18.5507 19.0007 18 19H2ZM2 17H18V6H2V17ZM8 4H12V2H8V4Z"
                                        fill="#606060" />
                                   </svg>
                                   
                                    Koin Area Kerja
                                </a>

                                <a href="#"
                                    class="flex items-center gap-3 px-5 py-3 text-gray-700 hover:bg-gray-100">
                                     <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M19.3333 1H2.66667C2.22464 1 1.80072 1.17559 1.48816 1.48816C1.17559 1.80072 1 2.22464 1 2.66667V19.3333C1 19.7754 1.17559 20.1993 1.48816 20.5118C1.80072 20.8244 2.22464 21 2.66667 21H19.3333C19.7754 21 20.1993 20.8244 20.5118 20.5118C20.8244 20.1993 21 19.7754 21 19.3333V2.66667C21 2.22464 20.8244 1.80072 20.5118 1.48816C20.1993 1.17559 19.7754 1 19.3333 1Z"
                                            stroke="#606060" stroke-width="1.66667" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M9.3342 14.8889L12.112 17.1111L16.5564 11.5556M5.44531 6H16.5564M5.44531 10.4444H9.88976"
                                            stroke="#606060" stroke-width="1.66667" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    Kandidat Saya
                                </a>

                                <a href="#"
                                    class="flex items-center gap-3 px-5 py-3 text-gray-700 hover:bg-gray-100">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                         <path d="M9.95 16C10.3 16 10.596 15.879 10.838 15.637C11.08 15.395 11.2007 15.0993 11.2 14.75C11.2 14.4 11.0793 14.104 10.838 13.862C10.5967 13.62 10.3007 13.4993 9.95 13.5C9.6 13.5 9.30433 13.621 9.063 13.863C8.82167 14.105 8.70067 14.4007 8.7 14.75C8.7 15.1 8.821 15.396 9.063 15.638C9.305 15.88 9.60067 16.0007 9.95 16ZM9.05 12.15H10.9C10.9 11.6 10.9627 11.1667 11.088 10.85C11.2133 10.5333 11.5673 10.1 12.15 9.55C12.5833 9.11667 12.925 8.704 13.175 8.312C13.425 7.92 13.55 7.44933 13.55 6.9C13.55 5.96667 13.2083 5.25 12.525 4.75C11.8417 4.25 11.0333 4 10.1 4C9.15 4 8.37933 4.25 7.788 4.75C7.19667 5.25 6.784 5.85 6.55 6.55L8.2 7.2C8.28333 6.9 8.471 6.575 8.763 6.225C9.055 5.875 9.50067 5.7 10.1 5.7C10.6333 5.7 11.0333 5.846 11.3 6.138C11.5667 6.43 11.7 6.75067 11.7 7.1C11.7 7.43333 11.6 7.746 11.4 8.038C11.2 8.33 10.95 8.60067 10.65 8.85C9.91667 9.5 9.46667 9.99167 9.3 10.325C9.13333 10.6583 9.05 11.2667 9.05 12.15ZM10 20C8.61667 20 7.31667 19.7377 6.1 19.213C4.88333 18.6883 3.825 17.9757 2.925 17.075C2.025 16.175 1.31267 15.1167 0.788 13.9C0.263333 12.6833 0.000666667 11.3833 0 10C0 8.61667 0.262667 7.31667 0.788 6.1C1.31333 4.88333 2.02567 3.825 2.925 2.925C3.825 2.025 4.88333 1.31267 6.1 0.788C7.31667 0.263333 8.61667 0.000666667 10 0C11.3833 0 12.6833 0.262667 13.9 0.788C15.1167 1.31333 16.175 2.02567 17.075 2.925C17.975 3.825 18.6877 4.88333 19.213 6.1C19.7383 7.31667 20.0007 8.61667 20 10C20 11.3833 19.7373 12.6833 19.212 13.9C18.6867 15.1167 17.9743 16.175 17.075 17.075C16.175 17.975 15.1167 18.6877 13.9 19.213C12.6833 19.7383 11.3833 20.0007 10 20ZM10 18C12.2333 18 14.125 17.225 15.675 15.675C17.225 14.125 18 12.2333 18 10C18 7.76667 17.225 5.875 15.675 4.325C14.125 2.775 12.2333 2 10 2C7.76667 2 5.875 2.775 4.325 4.325C2.775 5.875 2 7.76667 2 10C2 12.2333 2.775 14.125 4.325 15.675C5.875 17.225 7.76667 18 10 18Z" fill="#606060"/>
                                    </svg>

                                    Pengaturan
                                </a>
                            </div>

                            <!-- Logout Button -->
                            <div class="px-5 py-4">
                                <button
                                    class="w-full bg-orange-500 hover:bg-orange-600 text-white font-medium py-2 rounded-lg">
                                    Keluar
                                </button>
                            </div>
                        </div>
                        <button data-collapse-toggle="navbar-user" type="button"
                            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                            aria-controls="navbar-user" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 17 14">
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
