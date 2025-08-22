@extends('layouts.index-perusahaan')
@section('content')
    <!DOCTYPE html>
    <html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard AreaKerja</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: 'Poppins', sans-serif;
            }
        </style>
    </head>

    <body class="bg-gray-100">

        <!-- Container -->
        <div class="w-full mx-auto bg-white min-h-screen p-6">

            <!-- Header -->
            <h2 class="text-sm text-orange-500 font-medium">Dashboard</h2>
            <h1 class="text-2xl font-semibold mt-1">Selamat Datang Di Area Kerja Seven Inc</h1>

            <!-- Cards -->
            <div class="grid md:grid-cols-3 gap-4 mt-6 items-start">

                <!-- Lowongan Saya -->
                <div class="bg-orange-500 text-white p-7 rounded-md md:col-span-2">
                    <h3 class="text-xl font-medium mb-4">Lowongan Saya</h3>
                    <div class="bg-white shadow rounded-md p-4 mt-7 flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <img src="{{ asset('/images/seven.png') }}" alt="Logo" class="w-14 h-14 object-contain">
                            <div>
                                <h5 class="text-gray-500 text-sm">Seven Inc</h5>
                                <h2 class="font-semibold text-gray-800">UI/UX Designer – WFO</h2>
                                <p class="text-gray-500 text-sm mb-2">Yogyakarta</p>
                                <p class="text-gray-700 text-sm bg-gray-100 px-2 py-1 inline-block rounded">Rp. 4.500.000 –
                                    Rp.
                                    7.000.000 per bulan</p>
                            </div>
                        </div>
                        <div class="border-2 ml-9 rounded-md border-gray-400 px-11 py-3 text-sm text-gray-500 font-medium">Silver</div>
                        <button class="text-sm mr-2 px-9 border-2 border-orange-500 py-3 rounded-md text-white bg-orange-500 font-medium hover:bg-white hover:text-orange-500 transition duration-300 ">Lihat Pelamar</button>
                    </div>
                    <div class="bg-white shadow rounded-md p-4 mt-7 flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <img src="{{ asset('/images/seven.png') }}" alt="Logo" class="w-14 h-14 object-contain">
                            <div>
                                <h5 class="text-gray-500 text-sm">Seven Inc</h5>
                                <h2 class="font-semibold text-gray-800">UI/UX Designer – WFO</h2>
                                <p class="text-gray-500 text-sm mb-2">Yogyakarta</p>
                                <p class="text-gray-700 text-sm bg-gray-100 px-2 py-1 inline-block rounded">Rp. 4.500.000 –
                                    Rp.
                                    7.000.000 per bulan</p>
                            </div>
                        </div>
                        <div class="border-2 ml-9 rounded-md border-gray-400 px-11 py-3 text-sm text-gray-500 font-medium">Silver</div>
                        <button class="text-sm mr-2 px-9 border-2 border-orange-500 py-3 rounded-md text-white bg-orange-500 font-medium hover:bg-white hover:text-orange-500 transition duration-300 ">Lihat Pelamar</button>
                    </div>
                    <div class="bg-white shadow rounded-md p-4 mt-7 flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <img src="{{ asset('/images/seven.png') }}" alt="Logo" class="w-14 h-14 object-contain">
                            <div>
                                <h5 class="text-gray-500 text-sm">Seven Inc</h5>
                                <h2 class="font-semibold text-gray-800">UI/UX Designer – WFO</h2>
                                <p class="text-gray-500 text-sm mb-2">Yogyakarta</p>
                                <p class="text-gray-700 text-sm bg-gray-100 px-2 py-1 inline-block rounded">Rp. 4.500.000 –
                                    Rp.
                                    7.000.000 per bulan</p>
                            </div>
                        </div>
                        <div class="border-2 ml-9 rounded-md border-gray-400 px-11 py-3 text-sm text-gray-500 font-medium">Silver</div>
                        <button class="text-sm mr-2 px-9 border-2 border-orange-500 py-3 rounded-md text-white bg-orange-500 font-medium hover:bg-white hover:text-orange-500 transition duration-300 ">Lihat Pelamar</button>
                    </div>
                    <div class="bg-white shadow rounded-md p-4 mt-7 flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <img src="{{ asset('/images/seven.png') }}" alt="Logo" class="w-14 h-14 object-contain">
                            <div>
                                <h5 class="text-gray-500 text-sm">Seven Inc</h5>
                                <h2 class="font-semibold text-gray-800">UI/UX Designer – WFO</h2>
                                <p class="text-gray-500 text-sm mb-2">Yogyakarta</p>
                                <p class="text-gray-700 text-sm bg-gray-100 px-2 py-1 inline-block rounded">Rp. 4.500.000 –
                                    Rp.
                                    7.000.000 per bulan</p>
                            </div>
                        </div>
                        <div class="border-2 ml-9 rounded-md border-gray-400 px-11 py-3 text-sm text-gray-500 font-medium">Silver</div>
                        <button class="text-sm mr-2 px-9 border-2 border-orange-500 py-3 rounded-md text-white bg-orange-500 font-medium hover:bg-white hover:text-orange-500 transition duration-300 ">Lihat Pelamar</button>
                    </div>
                    <button class="block mx-auto px-12 mt-10 bg-white text-orange-500 text-sm font-semibold py-3 rounded-md">
                            Cari Kandidat
                    </button>
                </div>

                <!-- Kandidat Saya -->
                <div class="bg-orange-500 text-white p-5 rounded-md">
                    <!-- Judul tetap kiri -->
                    <h3 class="text-xl font-medium mb-4">Kandidat Saya</h3>

                    <!-- Tombol rata tengah -->
                    <div class="flex flex-col items-center mb-5">
                        <button
                            class="w-48 px-4 bg-orange-500 text-white text-sm font-medium border border-white py-2 rounded-md mb-3 mt-3">
                            Lihat Kandidat
                        </button>
                        <button class="w-48 px-4 bg-white text-black text-sm font-medium py-2 rounded-md">
                            Cari Kandidat
                        </button>
                    </div>
                </div>
            </div>
            

        </div>
    </body>

    </html>


    @include('layouts.footer')
@endsection
