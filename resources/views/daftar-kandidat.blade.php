@extends('layouts.index')
@section('content')
    <!-- Hero Section -->
    <section class="relative">
        <img src="{{ asset('images/ntap.png') }}" alt="hero" class="w-full h-[350px] object-cover">
        <div class="absolute inset-0 bg-black bg-opacity-20"></div>
        <div class="absolute bottom-20 left-20 text-white">
            <h1 class="text-3xl md:text-4xl font-bold mt-3 max-w-2xl">
                Daftar Kandidat
            </h1>
            <p class="text-sm mt-4">Ikuti pelatihan terakreditasi AreaKerja.com</p>
            <p class="text-sm "> dan dapatkan pekerjaan impian anda!</p><br>
            <button>
                <span class="bg-orange-500 hover:bg-orange-600 text-xl px-7 py-1 rounded-lg ">Daftar</span>
            </button>
        </div>
    </section>
    <section class="bg-orange-500 text-white py-12">
        <div class="max-w-6xl mx-auto grid md:grid-cols-2 items-center gap-8 px-6">
            
            <!-- Left Content -->
            <div>
                <h2 class="text-2xl font-bold mb-6">Benefit Menjadi Kandidat <br> Areakerja.com</h2>
                <ul class="space-y-4 text-base">
                    <li class="flex items-start">
                        <span class="text-white mr-2">✔</span>
                        Menjadi prioritas pilihan dari perusahaan mitra Areakerja
                    </li>
                    <li class="flex items-start">
                        <span class="text-white mr-2">✔</span>
                        Areakerja memiliki banyak mitra perusahaan yang sedang membuka lowongan
                    </li>
                    <li class="flex items-start">
                        <span class="text-white mr-2">✔</span>
                        Areakerja merupakan perusahaan terpercaya berbadan hukum
                    </li>
                    <li class="flex items-start">
                        <span class="text-white mr-2">✔</span>
                        Server Terbaik
                    </li>
                </ul>
            </div>

            <!-- Right Image -->
            <div class="flex justify-center">
                <img src="{{ asset('images/ntep.png') }}" alt="Kandidat" class="rounded-lg ">
            </div>
        </div>
    </section>

    <!-- Steps Section -->
    <section class="bg-white py-12">
        <div class="max-w-4xl mx-auto text-center px-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Cara Daftar Kandidat</h2>
            <div class="border-t border-gray-300 divide-y divide-gray-300">

                <div class="flex items-center py-4 text-left" >
                    <span
                        class="flex-shrink-0 w-10 h-10 bg-orange-500 text-white flex items-center justify-center rounded-full mr-4">1</span>
                    <p class="text-gray-700 font-semibold">Klik Daftar untuk registrasi kandidat</p>
                </div>

                <div class="flex items-center py-4 text-left">
                    <span
                        class="flex-shrink-0 w-10 h-10 bg-orange-500 text-white flex items-center justify-center rounded-full mr-4">2</span>
                    <p class="text-gray-700  font-semibold">Lengkapi data yang diperlukan pada proses registrasi</p>
                </div>

                <div class="flex items-center py-4 text-left">
                    <span
                        class="flex-shrink-0 w-10 h-10 bg-orange-500 text-white flex items-center justify-center rounded-full mr-4">3</span>
                    <p class="text-gray-700  font-semibold">Tunggu pemberitahuan setelah melakukan registrasi</p>
                </div>

                <div class="flex items-center py-4 text-left">
                    <span
                        class="flex-shrink-0 w-10 h-10 bg-orange-500 text-white flex items-center justify-center rounded-full mr-4">4</span>
                    <p class="text-gray-700  font-semibold">Ikuti pelatihan sesuai prosedur Areakerja.com</p>
                </div>
            </div>
        </div>
    </section>














    @include('layouts.footer')
@endsection
