@extends('layouts.index')
@section('content')
    <!-- Hero Section -->
    <section class="relative">
        <img src="{{ asset('images/ntap.png') }}" alt="hero" class="w-full h-[350px] object-cover">
        <div class="absolute inset-0 bg-black bg-opacity-30"></div>
        <div class="absolute bottom-20 left-20 text-white">
            <h1 class="text-3xl md:text-4xl font-semibold mt-3 max-w-2xl">
                Daftar Kandidat
            </h1>
            <p class="text-sm mt-4">Ikuti pelatihan terakreditasi AreaKerja.com</p>
            <p class="text-sm "> dan dapatkan pekerjaan impian anda!</p><br>
            <button>
                <a href="{{ url('/form-divisi') }}" class="bg-orange-500 hover:bg-orange-600 text-sm px-8 py-2 rounded-lg ">Daftar</a>
            </button>
        </div>
    </section>
    <section class="text-white py-12" style="background: linear-gradient(to left, rgb(255, 196, 0), #ff7b00)">
        <div class="max-w-6xl mx-auto grid md:grid-cols-2 items-center gap-8 px-6">
            
            <!-- Left Content -->
            <div>
                <h2 class="text-2xl font-semibold mb-6">Benefit Menjadi Kandidat <br> Areakerja.com</h2>
                <ul class="space-y-4 text-base">
                    <li class="flex items-center">
                        <span class="text-white mr-2">
                            <svg width="18" height="18" viewBox="0 0 23 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M21.094 2.28125L8.36467 15.7594L2 9.02032" stroke="white" stroke-width="3.36953" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span>
                        <p class="ml-4">
                          Menjadi prioritas pilihan dari perusahaan <br> mitra Areakerja
                        </p>
                    </li>
                    <li class="flex items-center">
                        <span class="text-white mr-2">
                             <svg width="18" height="18" viewBox="0 0 23 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M21.094 2.28125L8.36467 15.7594L2 9.02032" stroke="white" stroke-width="3.36953" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span>
                        <p class="ml-4">
                        Areakerja memiliki banyak mitra <br> perusahaan yang sedang membuka lowongan
                        </p>
                    </li>
                    <li class="flex items-center">
                        <span class="text-white mr-2">
                             <svg width="18" height="18" viewBox="0 0 23 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M21.094 2.28125L8.36467 15.7594L2 9.02032" stroke="white" stroke-width="3.36953" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span>
                        <p class="ml-4">
                        Areakerja merupakan perusahaan terpercaya <br> berbadan hukum
                        </p>
                    </li>
                    <li class="flex items-center">
                        <span class="text-white mr-2">
                             <svg width="18" height="18" viewBox="0 0 23 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M21.094 2.28125L8.36467 15.7594L2 9.02032" stroke="white" stroke-width="3.36953" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span>
                        <p class="ml-4">
                        Server Terbaik
                        </p>
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
                        class="flex-shrink-0 w-10 h-10 bg-orange-500 text-white flex items-center justify-center rounded-full mr-4 hover:scale-105">1</span>
                    <p class="text-gray-700 font-semibold ">Klik Daftar untuk registrasi kandidat</p>
                </div>

                <div class="flex items-center py-4 text-left">
                    <span
                        class="flex-shrink-0 w-10 h-10 bg-orange-500 text-white flex items-center justify-center rounded-full mr-4 hover:scale-105">2</span>
                    <p class="text-gray-700  font-semibold">Lengkapi data yang diperlukan pada proses registrasi</p>
                </div>

                <div class="flex items-center py-4 text-left">
                    <span
                        class="flex-shrink-0 w-10 h-10 bg-orange-500 text-white flex items-center justify-center rounded-full mr-4 hover:scale-105">3</span>
                    <p class="text-gray-700  font-semibold">Tunggu pemberitahuan setelah melakukan registrasi</p>
                </div>

                <div class="flex items-center py-4 text-left">
                    <span
                        class="flex-shrink-0 w-10 h-10 bg-orange-500 text-white flex items-center justify-center rounded-full mr-4 hover:scale-105">4</span>
                    <p class="text-gray-700  font-semibold">Ikuti pelatihan sesuai prosedur Areakerja.com</p>
                </div>
            </div>
        </div>
    </section>














    @include('layouts.footer')
@endsection
