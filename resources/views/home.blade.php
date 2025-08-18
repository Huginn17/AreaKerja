@extends('layouts.index')

@section('content')
    <section class="bg-white py-8">
        <div class="max-w-5xl mx-auto px-5">
            <div class="flex flex-col md:flex-row gap-7 items-center border rounded-xl">
                <input type="text" placeholder="🔍 Posisi lowongan, kata kunci, ..."
                    class="flex-1 px-7 py-3  w-full focus:ring-2 focus:ring-orange-500 focus:outline-none">|
                <input type="text" placeholder="📍 Kota, provinsi, kode pos, ..."
                    class="flex-1 px-7 py-3 w-full focus:ring-2 focus:ring-orange-500 focus:outline-none">
                <button
                    class="px-7 py-2 bg-orange-500 text-white rounded-xl hover:bg-orange-600 font-semibold transition-duration-3">
                    Cari Lowongan Kerja
                </button>
            </div>
            <p class="mt-3 text-center text-sm">
                <span class="text-orange-500 font-bold">Lamar Pekerjaan Kamu</span> <span class="font-semibold">- Dengan waktu dan langkah yang cepat</span>
                
            </p>
        </div>
    </section>

    <!-- Kategori Populer -->
    <section class="max-w-5xl mx-auto px-4 py-8">
        <h4 class="mb-6 text-xl font-bold text-gray-900 dark:text-white">KATEGORI PEKERJAAN POPULER :</h4>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3 font-bold text-shadow">
            @foreach (['Teknologi', 'Pelayanan', 'Administrasi','🔥 Full Time', 'Pemasaran', 'Pendidik', 'Customer Service', '🌐 WFO/WFH', 'Kasir', 'Keuangan', 'Admin', '🎓 Graduate'] as $kategori)
                <span
                    class="px-4 py-2 border rounded-lg text-sm bg-white hover:bg-gray-50 cursor-pointer flex items-center justify-center">
                    {{ $kategori }}
                </span>
            @endforeach
        </div>
    </section>

    <!-- Tabs -->
    <div class="border-b">
        <div class="max-w-5xl mx-auto flex gap-6 px-4 text">
            <a href="#" class="py-3 border-b-2 border-orange-600 font-semibold text-gray-800 font-bold">
                Umpan Lowongan
            </a>
            <a href="#" class="py-3 text-gray-600 hover:text-gray-800 font-bold">
                Pencarian Baru-Baru Ini
            </a>
        </div>
    </div>

    <!-- Card Lowongan -->
    <h3 class=" px-40 mt-6  text-gray-500 dark:text-white">Lowongan berdasarkan pada aktivitas Anda di areakerja</h3>
    <section class="max-w-5xl mx-auto px-4 py-8 grid md:grid-cols-2 gap-6">

        {{-- nanti perulangannya disini --}}
        <div class="bg-white border rounded-2xl shadow-sm p-5">
            <span class="inline-block px-3 py-1 bg-red-100 text-red-600 text-xs rounded-lg mb-3">
                Dibutuhkan segera
            </span>
            <h3 class="font-semibold text-lg">Lead Graphic Designer – WFH :</h3>
            <p class="text-gray-500 text-sm">Capital Club · Jakarta</p>
            <p class="mt-2 px-3 py-1 inline-block bg-gray-100 text-gray-700 text-sm rounded-lg">
                Rp. 4.500.000 – Rp. 7.000.000 per bulan
            </p>
            <ul class="mt-3 text-sm text-gray-600 list-disc list-inside space-y-1">
                <li>➣ Lamar dengan cepat</li>
                <li>Gaji sesuai pengalaman</li>
                <li>Tes pra-wawancara singkat</li>
            </ul>
            <p class="mt-4 text-xs text-gray-400">Aktif 2 jam lalu</p>
        </div>
        {{-- 2 --}}
        <div class="bg-white border rounded-2xl shadow-sm p-5">
            <span class="inline-block px-3 py-1 bg-red-100 text-red-600 text-xs rounded-lg mb-3">
                Dibutuhkan segera
            </span>
            <h3 class="font-semibold text-lg">Lead Graphic Designer – WFH :</h3>
            <p class="text-gray-500 text-sm">Capital Club · Jakarta</p>
            <p class="mt-2 px-3 py-1 inline-block bg-gray-100 text-gray-700 text-sm rounded-lg">
                Rp. 4.500.000 – Rp. 7.000.000 per bulan
            </p>
            <ul class="mt-3 text-sm text-gray-600 list-disc list-inside space-y-1">
                <li>➣ Lamar dengan cepat</li>
                <li>Gaji sesuai pengalaman</li>
                <li>Tes pra-wawancara singkat</li>
            </ul>
            <p class="mt-4 text-xs text-gray-400">Aktif 2 jam lalu</p>
        </div>

        <div class="flex flex-col md:flex-row gap-7 items-center" style="padding-left: 440px">
            <button class="px-7 py-2 bg-orange-500 text-white rounded-xl hover:bg-orange-600 font-semibold transition">
                Memuat
            </button>
        </div>
    </section>
    @include('layouts.footer')
@endsection
