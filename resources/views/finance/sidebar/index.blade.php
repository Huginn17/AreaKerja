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
        <div class="h-full px-3 py-4 overflow-y-auto bg-orange-600 dark:bg-gray-800 ">
            <a href="https://flowbite.com/" class="flex items-center ps-2.5 mb-5">
                <img src="{{ asset('images/logo_area_kerja_putih.png') }}" class=" me-1 sm:h-14"
                    alt="areakerjaputih Logo" />
                <span class="self-center text-xl font-semibold whitespace-nowrap text-white">areakerja.com</span>
            </a>
            <hr>
            <ul class="space-y-2 font-medium">
                <li>
                    <p class="flex items-center p-2 text-white rounded-lg dark:text-white">
                        <span class="ms-3 mt-7">Umum</span>
                    </p>
                </li>
                <li>


                     <a href="#"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 group">
                     <svg width="15" height="17" viewBox="0 0 15 17" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.8064 14.5365C14.8064 15.0108 14.6455 15.4167 14.3236 15.7542C14.0017 16.0916 13.6143 16.2607 13.1613 16.2612H1.64516C1.19274 16.2612 0.805581 16.0922 0.483677 15.7542C0.161774 15.4161 0.000548387 15.0102 0 14.5365L0 2.46315C0 1.98885 0.161226 1.58267 0.483677 1.24461C0.806129 0.906559 1.19329 0.737821 1.64516 0.738396H13.1613C13.6137 0.738396 14.0011 0.907134 14.3236 1.24461C14.646 1.58209 14.807 1.98827 14.8064 2.46315V14.5365ZM13.1613 10.2246H8.22581V14.5365H13.1613V10.2246ZM13.1613 8.49981V2.46315H8.22581V8.49981H13.1613ZM6.58064 14.5365L6.58064 2.46315H1.64516L1.64516 14.5365H6.58064Z" fill="#FA6601"/>
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
                       <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
   <mask id="mask0_679_15285" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="20" height="21">
    <rect y="0.5" width="20" height="20" fill="url(#pattern0_679_15285)"/>
    </mask>
   <g mask="url(#mask0_679_15285)">
    <rect x="-1.17188" y="1.59375" width="22.6562" height="18.0469" fill="white"/>
    </g>
    <defs>
    <pattern id="pattern0_679_15285" patternContentUnits="objectBoundingBox" width="1" height="1">
    <use xlink:href="#image0_679_15285" transform="scale(0.00195312)"/>
    </pattern>
    <image id="image0_679_15285" width="512" height="512" preserveAspectRatio="none" xlink:href="data:image/png;base64,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"/>
   </defs>
    </svg>

                        <span class="flex-1 ms-3 whitespace-nowrap text-white hover:text-orange-500">Paket Harga</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 group">
                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M10.0217 0.909668C7.51245 0.909668 5.2259 1.70443 3.87345 2.35409C3.75155 2.41263 3.6373 2.46999 3.5311 2.52548C3.321 2.63531 3.1426 2.73781 3 2.82769L4.53885 5.00019L5.26315 5.27672C8.09445 6.64672 11.8913 6.64672 14.7226 5.27672L15.545 4.86751L17 2.82769C16.7868 2.69137 16.4919 2.52598 16.1291 2.35012C16.107 2.3394 16.0846 2.32864 16.062 2.31785C14.7154 1.67526 12.4844 0.909668 10.0217 0.909668ZM6.4426 3.36908C5.8888 3.2711 5.34465 3.13595 4.831 2.98089C6.0984 2.44118 7.98715 1.86868 10.0217 1.86868C11.4313 1.86868 12.7641 2.14356 13.8665 2.49161C12.5746 2.6665 11.196 2.96174 9.8827 3.32609C8.84935 3.61277 7.64145 3.58122 6.4426 3.36908Z" fill="white"/>
<path fill-rule="evenodd" clip-rule="evenodd" d="M15.3093 6.06748L15.1731 6.13336C12.0584 7.64045 7.9273 7.64045 4.8127 6.13336L4.6832 6.07074C0.00453835 10.9943 -4.90379 20.2272 10.0217 20.0888C24.9369 19.9506 19.9517 10.8244 15.3093 6.06748ZM10.8557 9.54122H9.14435V10.3084C8.58825 10.3072 8.05355 10.5002 7.6534 10.8465C7.25335 11.1928 7.0194 11.6651 7.00115 12.1635C6.9829 12.6618 7.1818 13.147 7.55565 13.516C7.92955 13.8851 8.44905 14.1091 9.00405 14.1406L9.14435 14.1445H10.8557L10.9327 14.1506C11.0313 14.1666 11.1206 14.2132 11.1848 14.2822C11.2491 14.3511 11.2843 14.4382 11.2843 14.5281C11.2843 14.6179 11.2491 14.705 11.1848 14.774C11.1206 14.843 11.0313 14.8895 10.9327 14.9056L10.8557 14.9117H7.43305V16.4461H9.14435V17.2133H10.8557V16.4461C11.4118 16.4474 11.9465 16.2544 12.3466 15.908C12.7467 15.5618 12.9806 15.0894 12.9989 14.591C13.0171 14.0927 12.8182 13.6076 12.4444 13.2385C12.0705 12.8694 11.551 12.6454 10.996 12.6139L10.8557 12.6101H9.14435L9.06736 12.6039C8.9687 12.5879 8.87945 12.5413 8.8152 12.4723C8.75095 12.4034 8.7157 12.3163 8.7157 12.2265C8.7157 12.1366 8.75095 12.0495 8.8152 11.9806C8.87945 11.9116 8.9687 11.865 9.06736 11.849L9.14435 11.8428H12.567V10.3084H10.8557V9.54122Z" fill="white"/>
</svg>

                        <span class="flex-1 ms-3 whitespace-nowrap text-white hover:text-orange-500">Omset Perusahaan</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 group">
                      <svg width="14" height="19" viewBox="0 0 14 19" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1 6.3C1 4.0376 1 2.9056 1.65925 2.2032C2.31775 1.5 3.379 1.5 5.5 1.5H8.5C10.621 1.5 11.6823 1.5 12.3408 2.2032C13 2.9056 13 4.0376 13 6.3V12.7C13 14.9624 13 16.0944 12.3408 16.7968C11.6823 17.5 10.621 17.5 8.5 17.5H5.5C3.379 17.5 2.31775 17.5 1.65925 16.7968C1 16.0944 1 14.9624 1 12.7V6.3Z" stroke="white" stroke-width="1.5"/>
<path d="M12.9235 12.7002H3.9235C3.226 12.7002 2.87725 12.7002 2.59075 12.7818C2.20923 12.8909 1.86137 13.1053 1.58213 13.4032C1.3029 13.7012 1.10212 14.0724 1 14.4794" stroke="white" stroke-width="1.5"/>
<path d="M4 5.5H10M4 8.3H7.75M7.75 12.7V15.524C7.75 15.7448 7.75 15.8552 7.67875 15.9C7.6075 15.9448 7.51075 15.8952 7.31575 15.796L6.38425 15.324C6.31825 15.292 6.28525 15.2744 6.25 15.2744C6.21475 15.2744 6.18175 15.2912 6.11575 15.3248L5.18425 15.7968C4.98925 15.8952 4.89175 15.9448 4.82125 15.9C4.75 15.8552 4.75 15.7448 4.75 15.524V13.06" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
</svg>

                        <span class="flex-1 ms-3 whitespace-nowrap text-white hover:text-orange-500">Catatan Transaksi</span>
                    </a>
                </li>
                <li>
                     <a href="#"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 group">
                      <svg width="20" height="23" viewBox="0 0 20 23" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M0 15.8822L0.779186 15.3096L4.2708 21.3348L18.7438 12.3646L19.523 13.3189L4.27084 22.6708L0 15.8822ZM0.293989 12.6151L0.887456 12.2334L4.37911 18.4495L18.8521 9.67008L19.4456 10.8152L4.37911 19.9763L0.293989 12.6151ZM0.10569 9.16111L15.5435 0L20 7.93376L4.56221 17.0949L0.10569 9.16111ZM10.1329 4.96223C8.28691 4.96223 6.79046 6.50034 6.79046 8.39765C6.79046 10.295 8.28691 11.8331 10.1329 11.8331C11.9788 11.8331 13.4752 10.295 13.4752 8.39765C13.4752 6.50034 11.9788 4.96223 10.1329 4.96223ZM11.6705 10.5671L11.1624 10.8686L10.8831 10.3715L10.3489 10.5856L9.90247 10.6534L9.70643 9.94617L10.1715 9.88894L10.6756 9.68537C10.8277 9.59404 10.9377 9.48975 11.0057 9.37249C11.0737 9.25523 11.0799 9.14283 11.0245 9.03541C10.9679 8.9355 10.8697 8.87861 10.7299 8.86472L10.1759 8.91757C9.8497 8.98748 9.56242 8.99452 9.31402 8.93883C9.06568 8.88309 8.86753 8.72832 8.71971 8.47451C8.58545 8.23289 8.54624 7.98429 8.60197 7.7287C8.65774 7.4731 8.81213 7.23299 9.06512 7.00835L8.78318 6.50646L9.28752 6.20718L9.54867 6.67208L10.0163 6.47382L10.3883 6.40627L10.575 7.09499L10.2312 7.14176L9.70526 7.3609C9.54271 7.46187 9.44528 7.56254 9.41291 7.66307C9.38054 7.76356 9.38758 7.85228 9.43402 7.92923C9.47896 8.01399 9.57123 8.06129 9.71089 8.07113L10.3295 8.00493C10.697 7.93347 10.9921 7.93839 11.2149 8.01968C11.4378 8.10102 11.6155 8.26318 11.7478 8.50619C11.8838 8.74838 11.9239 9.0033 11.868 9.2709C11.8121 9.53855 11.6453 9.79091 11.3677 10.0281L11.6705 10.5671Z" fill="white"/>
</svg>

                        <span class="flex-1 ms-3 whitespace-nowrap text-white hover:text-orange-500">Laporan Transaksi</span>
                    </a>
                </li>
                <li>
                     <a onclick="openModal()"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 group mt-28">
                        <svg class="shrink-0 w-5 h-5  transition duration-75 text-white group-hover:text-orange-500"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap text-white hover:text-orange-500">Keluar</span>
                    </a>
                    
                </li>
            </ul>
        </div>
    </aside>
    @yield('sidebar')


   @include('finance.sidebar.modal-logout')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>
