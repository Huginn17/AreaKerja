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
            <div class="grid md:grid-cols-3 gap-4 mt-6">

                <!-- Lowongan Saya -->
                <div class="bg-orange-500 text-white p-7 rounded-md md:col-span-2">
                    <h3 class="text-lg font-medium mb-4">Lowongan Saya</h3>
                    <div class="bg-white rounded-md flex justify-between items-center px-3 py-3">
                        <span class="text-black font-bold">Lowongan Belum Terpasang</span>
                        <button
                            class="border border-orange-500 text-orange-500 px-3 py-1 rounded-md text-sm font-semibold">Tambah
                            Lowongan</button>
                    </div>
                    <div class="bg-white rounded-md mt-4 px-4 py-2 text-green-700 inline-block">
                        Top Up
                    </div>
                </div>

                <!-- Kandidat Saya -->
                <div class="bg-orange-500 text-white p-5 rounded-md">
                    <!-- Judul tetap kiri -->
                    <h3 class="text-lg font-medium mb-4">Kandidat Saya</h3>

                    <!-- Tombol rata tengah -->
                    <div class="flex flex-col items-center">
                        <button
                            class="w-48 px-4 bg-orange-500 hover:bg-orange-600 text-white text-sm font-medium border border-white py-2 rounded-md mb-3 mt-3">
                            Lihat Kandidat
                        </button>
                        <button class="w-48 px-4 bg-white hover:bg-gray-100 text-black text-sm font-medium py-2 rounded-md">
                            Cari Kandidat
                        </button>
                    </div>
                </div>


            </div>

            <!-- Tentang AreaKerja -->
            <div class="mt-12 text-center">
                <h2 class="text-xl font-bold text-orange-500">Tentang AreaKerja</h2>
            </div>

            <!-- Content -->
            <div class="grid md:grid-cols-2 gap-8 mt-8 items-center">

                <!-- Image -->
                <div class="flex justify-center">
                    <img src="{{ asset('images/nari.jpg') }}" alt="Illustrasi" class="w-100">
                </div>
                
                <div class="grid md:grid-cols-2 gap-6 max-w-5xl">
                    <!-- Kiri (Card 1) -->
                    <div class="bg-orange-500  text-white p-6 rounded-lg flex flex-col justify-center max-h-52 mt-28">
                        <div class="flex items-center space-x-3 mb-3">
                            <img src="{{ asset('images/logo_area_kerja_putih.png') }}" alt="logo" class="w-10 h-10">
                            <div>
                                <p class="font-bold text-lg">01</p>
                                <p class="text-sm">Mencari Lowongan</p>
                            </div>
                        </div>
                        <p class="text-sm leading-relaxed">
                            Area Kerja menyediakan platform bagi para pencari lowongan kerja untuk mendapatkan posisi kerja
                            yang sesuai dengan keahlian yang dimiliki
                        </p>
                    </div>

                    <!-- Kanan (Card 2 & 3 ditumpuk) -->
                    <div class="flex flex-col gap-6">
                        <!-- Card 2 -->
                        <div class="border-2 border-orange-500 rounded-lg p-6 text-orange-500">
                            <div class="flex items-center space-x-3 mb-3">
                                <img src="{{ asset('images/logoarea.png') }}" alt="logo"
                                    class="w-10 h-10">
                                <div>
                                    <p class="font-bold text-lg">02</p>
                                    <p class="text-sm">Lowongan Terbaru</p>
                                </div>
                            </div>
                            <p class="text-sm leading-relaxed">
                                Area Kerja dapat menerima lowongan lowongan terbaru untuk mencakup berbagai macam bidang
                                keahlian
                            </p>
                        </div>

                        <!-- Card 3 -->
                        <div class="border-2 border-orange-500 rounded-lg p-6 text-orange-500">
                            <div class="flex items-center space-x-3 mb-3">
                                <img src="{{ asset('images/logoarea.png') }}" alt="logo"
                                    class="w-10 h-10">
                                <div>
                                    <p class="font-bold text-lg">03</p>
                                    <p class="text-sm">Pasti Cocok</p>
                                </div>
                            </div>
                            <p class="text-sm leading-relaxed">
                                Pelamar merupakan orang yang sudah siap kerja secara mental dan keahlian berkat pelatihan
                                sebelumnya.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </body>

    </html>


    @include('layouts.footer')
@endsection
