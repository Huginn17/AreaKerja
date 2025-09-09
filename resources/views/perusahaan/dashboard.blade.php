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
            <h2 class="text-lg text-orange-500 font-medium">Dashboard</h2>
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
                    <div class="bg-white rounded-xl mt-4 px-4 py-2 text-green-700 inline-block">
                        <div class="max-w-2xl mx-auto flex justify-end">
                            <div class="flex items-center gap-6 bg-white px-2 py-1">
                                <!-- Coin + jumlah + teks -->
                                <div class="flex flex-col items-center">
                                    <span class="flex items-center">
                                        <p class="text-yellow-500 font-semibold text-4xl">0</p>
                                        <img src="{{ asset('images/coin.png') }}" alt="coin" class="w-8 h-8 ml-4">
                                    </span>
                                    <a href="#"
                                        class="flex items-center text-green-600 text-sm font-medium">
                                        <p class="mr-2">Top Up Koin</p>
                                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <mask id="mask0_2997_13201" style="mask-type:alpha" maskUnits="userSpaceOnUse"
                                                x="0" y="0" width="21" height="21">
                                                <rect width="20.4918" height="20.4918" fill="url(#pattern0_2997_13201)" />
                                            </mask>
                                            <g mask="url(#mask0_2997_13201)">
                                                <rect x="0.242188" y="0.246094" width="20" height="20"
                                                    fill="#42BB72" />
                                            </g>
                                            <defs>
                                                <pattern id="pattern0_2997_13201" patternContentUnits="objectBoundingBox"
                                                    width="1" height="1">
                                                    <use xlink:href="#image0_2997_13201" transform="scale(0.0104167)" />
                                                </pattern>
                                                <image id="image0_2997_13201" width="96" height="96"
                                                    preserveAspectRatio="none"
                                                    xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAABmJLR0QA/wD/AP+gvaeTAAAEhUlEQVR4nO2dz48URRTHP47ouCPIL1kJRBc9AAdNIF6JhkVMjEwg/uJEOHhBvUDgjyASJRIve9UbBxU5GvGCePRHlMCGRUPWFQPyQxDwsnCoISyrs/W6q6pf9fT7JN/Mpabn9fdNdXV3Vb8GwzAMwzAMwzCaxgPaAXgYBtYDa2ZoGHgUWNz7BPgHuNz7/BMYB04Bp4HvgQuVRl2A3BLQATYDo8BG4FnCY7wN/Awc6+kr4GbgNgeKFrABGAOu4gxLqRvAYaALPFjB/mXLI8C7wFnSm95PE8A7vVgaQwfYB0yhZ/xsTQF7e7ENNF3gV/QN76dJ4M1ke6/IKuAo+gZLdQQYSeKEAtuAS+ibWlRXge0J/KiMNvAR+kaGaqy3L7ViKfAd+ubF0rfAkqgOJWQF8BP6psXWSeCpiD4lYS1wDn2zUulcbx+zZCXwG/ompdYkGZ4hLcV1UW1zqtI47qZgFrQZrAFXqhNkcnb0MfpmaOlQBP+CeAN9E7T1erCLJVkFXBEEOOi6jNKg/GWJYAdVRwK9LMy2SIEPkrpBjhagg+75vg+tuM4CQ4L47qNV9AvAe2R4IZIBTwO7Uv9IG/gd3a7uQzO2PyjYC4r2gLdxN9uM/2c5sDPVxlvoTqDXoQfcxk30i5fSFOkBL+KOc8bcPAO8IG1cJAE7isfSWMReSbvKEG6AWVgqnLj4YpYcplLzN2488K7Ak/aAl8nD/LrwGLBJ0lCagNHysTSWjZJG0gSINmbch+hPKxkDhoHzwrZVUIcxAGAaeAK4OFcjSQ9YTz7m14kWsE7SyMea8Fgai9c7S0BaoiRgdYRAmoo3AfMEG1keIZCZpB5PYjzSFAuvd5IesCBCIE3F650lIC1REjA/QiBNJUoCjIRIEnA9eRSDyzVfA0kCvBsx+mIJUCZKAs5HCGQmuc8Jx8TrnSQB4xECaSqnfQ0kCfBuxOiLJUAZr3eS+ybLcDV4cpkTqNOEzDDw11yNJD3gAq7ejlGMH/GYD/Ir4WNhsTQSkWeWgHR8I2lkC7PSEH1h1k3gs5CIGsZhhHXpitwN/bRcLI0kiVct3NJr7eXfPrTjO0Oi5enTwAcF2jeVAyQch+wRpbk1RcEKjEVnxP4FPiz4nSbxPnAr9Y900K186EMrrglKPKZallcq2KG6aUuQoyWwUgX39Hmgl6UYwRWq0N55bV1CsZZcF3d6qm2ClqaB14JdDOQQ+kZo6WAE/4Jp4+pqaptRtY4DD0fwLwoLcRMQ2qZUpV/IsJBrk8pWZlvAtQmFW7N/YmgFg3k4Ogk8GdGnpCzB1dXUNi2WjpPhMd/HQ8B+6n+dMEZGZztl2Ep9X+DwVgI/VBihXveOviDjM50QuuRRdaufJoBXk+19JnSAPejPrM3UJLCbCu/n50Ab9xI1zYn+CVypySyqoGvyPO6FPxdJb/oV4BPgJTJYcKwewCyGcJWmRnt6jvAnOadx77S5+zLPr6lg3lZKbgmYzeO4cjmrcbc57r7OdgGwiHvPMF/H/bOv8d/X2f6Ap2aPYRiGYRiGYRhGldwBFK9RwjpRCLwAAAAASUVORK5CYII=" />
                                            </defs>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>

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
                        <button class="w-48 px-4 bg-white hover:bg-gray-100 text-black font-semibold text-sm font-medium py-2 rounded-md">
                            Cari Kandidat
                        </button>
                    </div>
                </div>


            </div>

            <!-- Tentang AreaKerja -->
            <div class="mt-12 text-center">
                <h2 class="text-3xl font-bold text-orange-500">Tentang AreaKerja</h2>
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
                                <img src="{{ asset('images/logoarea.png') }}" alt="logo" class="w-10 h-10">
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
                                <img src="{{ asset('images/logoarea.png') }}" alt="logo" class="w-10 h-10">
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

    </html><br>


    @include('layouts.footer')
@endsection
