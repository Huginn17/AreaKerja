<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AreaKerja.com</title>
    @vite('resources/css/app.css')
    <link rel="icon" sizes="512x512" type="image/png" href="{{ asset('images/logoarea.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-poppins">
    {{-- navbar --}}
    <header class="bg-white border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            {{-- logo --}}
            <div class="flex items-center gap-2">
                <img src="{{ asset('images/logoarea.png') }}" alt="Areakerja Logo" class="h-12">
                <span class="font-poppins font-bold text-xl text-orange-600 ">areakerja.com</span>
            </div>

            {{-- menu --}}
            <nav class="hidden md:flex gap-6 text-gray-800 font-medium text-orange-500">
                <a href="{{ url('/beranda') }}" class="hover:text-orange-600">Beranda</a>
                <a href="{{ url('/talent-hunter') }}" class="hover:text-orange-600">Talent Hunter</a>
                <a href="{{ url('/tips') }}" class="hover:text-orange-600">Tips Kerja</a>
                <a href="{{ url('/daftar-kandidat') }}" class="hover:text-orange-600">Daftar Kandidat</a>
                <a href="{{ url('/lowongan') }}" class="hover:text-orange-600">Pasang Lowongan</a>
            </nav>

            {{-- aksi --}}
            <div class="flex items-center gap-3">
                <button class="relative">
                    <svg class="w-6 h-6 text-orange-500 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path
                            d="M17.133 12.632v-1.8a5.406 5.406 0 0 0-4.154-5.262.955.955 0 0 0 .021-.106V3.1a1 1 0 0 0-2 0v2.364a.955.955 0 0 0 .021.106 5.406 5.406 0 0 0-4.154 5.262v1.8C6.867 15.018 5 15.614 5 16.807 5 17.4 5 18 5.538 18h12.924C19 18 19 17.4 19 16.807c0-1.193-1.867-1.789-1.867-4.175ZM8.823 19a3.453 3.453 0 0 0 6.354 0H8.823Z" />
                    </svg>

                </button>
                <a href="#" class="px-11 py-2 bg-orange-500 text-white rounded-xl hover:bg-orange-600 transition">
                    Masuk
                </a>
            </div>
        </div>
    </header>

    {{-- isi halaman --}}
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>
