@extends('layouts.index')

@section('content')
    <section class="bg-white py-8">
        <div class="max-w-5xl mx-auto px-5">
            <div class="flex flex-col md:flex-row py-2 border border-gray-300 items-center text-gray-700 font-semibold rounded-xl shadow-md">
                <img src="{{ asset('images/search.png') }}" alt="search" class="w-5 h-5 ml-7 mb-1">
                <input type="text" placeholder="Posisi lowongan, kata kunci, ..."
                    class="flex-1 px-7 py-3  w-full">
                    <svg width="2" height="35" viewBox="0 0 2 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                       <path d="M1 0V35" stroke="black" stroke-opacity="0.4"/>
                    </svg>
                <img src="{{ asset('images/maps.png') }}" alt="location" class="w-5 h-5 ml-7 mb-1">    
                <input type="text" placeholder="Kota, provinsi, kode pos, ..."
                    class="flex-1 px-7 py-3 w-full ">
                <button
                    class="bg-orange-500 px-4 py-2 text-white text-sm rounded-md mr-6 hover:bg-orange-600 font-medium transition duration-300">
                    Cari Lowongan Kerja
                </button>
            </div>
            <div class="mt-8">
                <p class="text-center text-sm">
                <span class="text-orange-500 font-semibold">Lamar Pekerjaan Kamu</span> <span class="font-semibold">- Dengan
                waktu dan langkah yang cepat</span>
                </p>
            </div>
        </div>
    </section>

    <!-- Kategori Populer -->
    <section class="max-w-5xl mx-auto px-4 py-8">
        <h4 class="mb-6 text-xl font-semibold text-gray-900 dark:text-white">KATEGORI PEKERJAAN POPULER </h4>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3 font-semibold text-shadow">
            @foreach (['Teknologi', 'Pelayanan', 'Administrasi', '🔥 Full Time', 'Pemasaran', 'Pendidik', 'Customer Service', '🌐 WFO/WFH', 'Kasir', 'Keuangan', 'Admin', '🎓 Graduate'] as $kategori)
                <span
                    class="px-4 py-2 border rounded-lg text-sm bg-white hover:bg-gray-50 cursor-pointer flex items-center justify-center">
                    {{ $kategori }}
                </span>
            @endforeach
        </div>
    </section>

    <!-- Tabs -->
     <div class="flex justify-center border-b">
        <div class="max-w-5xl mx-auto flex gap-6 px-4 text">
            <a href="#" class="py-3 border-b-2 border-orange-600  text-gray-800 font-bold">
                Umpan Lowongan
            </a>
            <a href="#" class="py-3 text-gray-600 hover:text-gray-800 font-bold">
                Pencarian Baru-Baru Ini
            </a>
        </div>
     </div>
    

    <!-- Card Lowongan -->
    <h3 class=" px-40 mt-8  text-gray-500 dark:text-white">Lowongan berdasarkan pada aktivitas Anda di areakerja</h3>
    <section class="max-w-5xl mx-auto px-4 py-8 grid md:grid-cols-2 gap-6">

        {{-- nanti perulangannya disini --}}
        <div class="bg-white border rounded-2xl shadow-sm p-5">
            <span class="inline-block px-3 py-1 bg-red-100 text-red-600 text-xs rounded-lg mb-3">
                Dibutuhkan segera
            </span>
            <h3 class="font-semibold text-lg">Lead Graphic Designer – WFH </h3>
            <p class="text-gray-500 text-sm mt-2">Capital Club <br> <p class="mt-1 text-gray-500 text-sm">Jakarta</p></p>
            <p class="mt-4 px-3 py-1 inline-block bg-gray-300 text-gray-700 text-sm font-semibold rounded-md">
                Rp. 4.500.000 – Rp. 7.000.000 per bulan
            </p>
            <div class="mt-4 flex items-center">
               <svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-2">
                  <path d="M0.798085 16.0512L19.7364 8.15646L0.798085 0.261719L0.789062 6.40207L14.3229 8.15646L0.789062 9.91084L0.798085 16.0512Z" fill="#007ABF"/>
               </svg> 
               <p class="text-gray-600 text-sm">
                Lamar dengan cepat
               </p>
            </div>

            <ul class="mt-4 text-sm text-gray-600 list-disc list-inside space-y-1"> 
              <li> Gaji sasuai pengalaman </li> 
              <li> Tes pra-wawancara singkat </li> 
            </ul>
          <p class="mt-4 text-xs text-gray-400">Aktif 2 jam lalu</p>
        </div>
        {{-- 2 --}}
        <div class="max-w-md mx-auto bg-white shadow rounded-lg p-4 relative" x-data="{ open: false }">
            {{-- Header --}}
            <div class="flex justify-between items-start">
                <div>
                    <h2 class="text-xl font-bold">UI/UX Designer</h2>
                    <p class="text-gray-600">Permata Solutions | Jakarta</p>
                    <p class="text-orange-600 font-semibold">Rp. 7.000.000 - Rp. 15.000.000 per bulan</p>
                </div>

                {{-- Tombol Titik Tiga --}}
                <div class="relative">
                    <button @click="open = !open" class="p-2 rounded-full hover:bg-gray-100">
                        ⋮
                    </button>

                    {{-- Dropdown Menu --}}
                    <div x-show="open" x-cloak @click.outside="open = false" x-transition
                        class="absolute right-0 mt-2 w-40 bg-white border rounded-lg shadow-lg z-10">
                        <a href="https://linkedin.com" target="_blank"
                            class="block px-4 py-2 hover:bg-gray-100">LinkedIn</a>
                        <a href="mailto:example@gmail.com" class="block px-4 py-2 hover:bg-gray-100">Gmail</a>
                        <a href="https://example.com" target="_blank" class="block px-4 py-2 hover:bg-gray-100">Website</a>
                        <a href="https://wa.me/628123456789" target="_blank"
                            class="block px-4 py-2 hover:bg-gray-100">WhatsApp</a>
                    </div>
                </div>
            </div>

            {{-- Tombol Lamar --}}
            <button class="mt-4 px-4 py-2 bg-orange-500 text-white rounded-lg shadow hover:bg-orange-600">
                Lamar Cepat
            </button>

            {{-- Detail Lowongan --}}
            <div class="mt-6">
                <h3 class="font-semibold mb-2">Detail Lowongan</h3>
                <p class="text-sm text-gray-600">Jenis Lowongan: <span class="font-medium">Full Time</span></p>
                <p class="text-sm text-gray-600 mt-2">Lokasi: <span class="font-medium">Jakarta</span></p>
            </div>

            {{-- Deskripsi --}}
            <div class="mt-6">
                <h3 class="font-semibold mb-2">Deskripsi Lowongan</h3>
                <ul class="list-disc list-inside text-sm text-gray-600 space-y-1">
                    <li>Minimal 2 tahun pengalaman sebagai Designer UI/UX</li>
                    <li>Menguasai HTML, CSS, dan dasar-dasar JS</li>
                    <li>Terbiasa dengan tools seperti Figma</li>
                </ul>
            </div>
        </div>



        <div class="flex flex-col md:flex-row gap-7 items-center" style="padding-left: 440px">
            <button class="px-10 py-2 bg-orange-500 text-white rounded-md text-sm hover:bg-orange-600 font-medium transition duration-300">
                Memuat
            </button>
        </div>
    </section>
    @include('layouts.footer')
@endsection
