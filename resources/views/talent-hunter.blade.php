@extends('layouts.index')
@section('content')
    <!-- Hero Section -->
    <section class="relative">
        <img src="{{ asset('images/woi.jpg') }}" alt="hero" class="w-full h-[350px] object-cover">
        <div class="absolute inset-0 bg-black bg-opacity-20"></div>
        <div class="absolute bottom-20 left-20 text-white">
            <h1 class="text-3xl md:text-4xl font-bold mt-3 max-w-2xl">
                Talent Hunter
            </h1>
            <p class="text-sm mt-4">Daftarkan perusahaan anda dan biar kami</p>
            <p class="text-sm"> yang mencarikan kandidat yang cocok untuk anda</p><br>
            <button>
                <span class="bg-orange-500 hover:bg-orange-600 text-xl px-7 py-1 rounded-lg ">Daftar</span>
            </button>
        </div>
    </section>
    <!-- Langkah Daftar Talent Hunter -->
    <section class="bg-orange-400 text-white py-12 sm:eounded-lg">
        <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-8 items-center px-6">

            <!-- Gambar Kiri -->
            <div class="flex justify-center">
                <img src="{{ asset('images/ntip.png') }}" alt="Talent Hunter" class="rounded-lg ">
            </div>

            <!-- Konten Kanan -->
            <div>
                <h2 class="text-2xl font-semibold mb-6">Langkah - Langkah Daftar <br> Talent Hunter :</h2>
                <ul class="space-y-4">
                    <li class="flex items-start">
                        <span class="w-3 h-3 mt-2 mr-3 rounded-full bg-white"></span>
                        Klik tombol daftar untuk mendaftarkan perusahaan anda
                    </li>
                    <li class="flex items-start">
                        <span class="w-3 h-3 mt-2 mr-3 rounded-full bg-white"></span>
                        Mengisi formulir pendaftaran dan kirim formulir pendaftaran
                    </li>
                    <li class="flex items-start">
                        <span class="w-3 h-3 mt-2 mr-3 rounded-full bg-white"></span>
                        Tunggu pemberitahuan selanjutnya setelah pendaftaran
                    </li>
                    <li class="flex items-start">
                        <span class="w-3 h-3 mt-2 mr-3 rounded-full bg-white"></span>
                        Perusahaan berhasil didaftarkan
                    </li>
                </ul>
            </div>

        </div>
    </section>

    <!-- Benefit Talent Hunter -->
    <section class="bg-white py-12">
       <div class="text-center py-10">
    <!-- Judul -->
    <h2 class="text-2xl font-bold text-orange-600">Benefit Talent Hunter</h2>
    <div class="w-20 h-1 bg-orange-500 mx-auto my-2"></div>

    <!-- Atas: 2 item -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mt-10 max-w-3xl mx-auto">
        <!-- Kandidat -->
        <div class="flex flex-col items-center">
            <img src="https://img.icons8.com/ios-filled/50/000000/conference-call.png" class="w-12 h-12 mb-3"/>
            <h3 class="font-bold">Kandidat</h3>
            <p class="text-sm text-gray-600">Mendapatkan kandidat sesuai kebutuhan perusahaan dan posisi yang dituju.</p>
        </div>

        <!-- Siap Kerja -->
        <div class="flex flex-col items-center">
            <img src="https://img.icons8.com/ios-filled/50/000000/laptop.png" class="w-12 h-12 mb-3"/>
            <h3 class="font-bold">Siap Kerja</h3>
            <p class="text-sm text-gray-600">Kandidat yang didapatkan dipastikan siap kerja dengan perusahaan yang direkomendasikan.</p>
        </div>
    </div>

    <!-- Bawah: 2 item -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mt-10 max-w-3xl mx-auto">
        <!-- Memudahkan -->
        <div class="flex flex-col items-center">
            <img src="https://img.icons8.com/ios-filled/50/000000/flash-on.png" class="w-12 h-12 mb-3"/>
            <h3 class="font-bold">Memudahkan</h3>
            <p class="text-sm text-orange-500">Mempermudah perusahaan dalam penyaringan kandidat.</p>
        </div>

        <!-- Jaminan -->
        <div class="flex flex-col items-center">
            <img src="https://img.icons8.com/ios-filled/50/00FF00/checked.png" class="w-12 h-12 mb-3"/>
            <h3 class="font-bold">Jaminan</h3>
            <p class="text-sm text-gray-600">Jaminan ganti kandidat baru jika tidak cocok dengan spesifikasi perusahaan.</p>
        </div>
    </div>
</div>

    </section>








    @include('layouts.footer')
@endsection
