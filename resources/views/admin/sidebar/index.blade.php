<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @vite('resources/css/app.css')
    <link rel="icon" sizes="512x512" type="image/png" href="{{ asset('images/logoarea.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>

    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
        type="button"
        class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
            </path>
        </svg>
    </button>

    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-600 dark:bg-gray-800 ">
            <a href="https://flowbite.com/" class="flex items-center ps-2.5 mb-5">
                <img src="{{ asset('images/logo_area_kerja_putih.png') }}" class=" me-1 sm:h-14"
                    alt="areakerjaputih Logo" />
                <span class="self-center text-xl font-semibold whitespace-nowrap text-white">areakerja.com</span>
            </a>
            <hr>
            <ul class="space-y-2 font-medium">
                <li class="mt-7">
                    <select id="kota"
                        class="bg-gray-0 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected="">Yogyakarta</option>
                        <option value="PG">Semarang</option>
                    </select>
                </li>
                <li>
                    <p class="flex items-center p-2 text-white rounded-lg dark:text-white">
                        <span class="ms-3 mt-3">Umum</span>
                    </p>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 group">
                        <svg width="15" height="17" viewBox="0 0 15 17" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14.8064 14.5365C14.8064 15.0108 14.6455 15.4167 14.3236 15.7542C14.0017 16.0916 13.6143 16.2607 13.1613 16.2612H1.64516C1.19274 16.2612 0.805581 16.0922 0.483677 15.7542C0.161774 15.4161 0.000548387 15.0102 0 14.5365L0 2.46315C0 1.98885 0.161226 1.58267 0.483677 1.24461C0.806129 0.906559 1.19329 0.737821 1.64516 0.738396H13.1613C13.6137 0.738396 14.0011 0.907134 14.3236 1.24461C14.646 1.58209 14.807 1.98827 14.8064 2.46315V14.5365ZM13.1613 10.2246H8.22581V14.5365H13.1613V10.2246ZM13.1613 8.49981V2.46315H8.22581V8.49981H13.1613ZM6.58064 14.5365L6.58064 2.46315H1.64516L1.64516 14.5365H6.58064Z"
                                fill="#FA6601" />
                        </svg>


                        <span class="flex-1 ms-3 whitespace-nowrap text-white hover:text-orange-500">Dashboard</span>
                    </a>
                </li>
                <li>
                    <p class="flex items-center p-2 text-white rounded-lg dark:text-white">
                        <span class="ms-3 mt-4">Finance</span>
                    </p>
                </li>
                <li>
                    <a href="#"
                         class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 group">
                       <svg class="shrink-0 w-5 h-5  transition duration-75 text-white group-hover:text-orange-500"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap text-white hover:text-orange-500">Profile</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 group">
                        <svg class="shrink-0 w-5 h-5  transition duration-75 text-white group-hover:text-orange-500"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap text-white hover:text-orange-500">Perusahaan</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 group">
                        <svg class="shrink-0 w-5 h-5  transition duration-75 text-white group-hover:text-orange-500"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                                    d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3" />
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap text-white hover:text-orange-500">Finance</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 group">
                        <svg class="shrink-0 w-5 h-5  transition duration-75 text-white group-hover:text-orange-500"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap text-white hover:text-orange-500">Tips Kerja</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 group">
                        <svg class="shrink-0 w-5 h-5  transition duration-75 text-white group-hover:text-orange-500"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 18 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap text-white hover:text-orange-500">Event</span>
                    </a>
                </li>
                <li>
                    <a onclick="openModal()"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 group mt-28">
                        <svg class="shrink-0 w-5 h-5  transition duration-75 text-white group-hover:text-orange-500"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 18 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap text-white hover:text-orange-500">Keluar</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
    @yield('sidebaradmin')


    @include('finance.sidebar.modal-logout')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>
