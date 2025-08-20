@extends('layouts.index')
@section('content')
    <!-- Hero Section -->
    <section class="relative">
        <img src="{{ asset('images/woi.jpg') }}" alt="hero" class="w-full h-[350px] object-cover">
        <div class="absolute inset-0 bg-black bg-opacity-40"></div>
        <div class="absolute bottom-20 left-20 text-white">
            <h1 class="text-3xl md:text-4xl font-semibold mt-3 max-w-2xl">
                Talent Hunter
            </h1>
            <p class="text-sm mt-4">Daftarkan perusahaan anda dan biar kami</p>
            <p class="text-sm"> yang mencarikan kandidat yang cocok untuk anda</p><br>
            <button>
                <span class="bg-orange-500 hover:bg-orange-600 text-sm px-8 py-2 rounded-lg">Daftar</span>
            </button>
        </div>
    </section>
   
<section class="text-white py-20 rounded-b-[50px]" 
         style="background: linear-gradient(to right, orange, #ff7b00)">
    <div class="max-w-5xl mx-auto grid md:grid-cols-2 gap-8 items-center px-6">

        <div class="flex justify-center">
            <img src="{{ asset('images/ntip.png') }}" alt="Talent Hunter" class="h-96 w-96 ">
        </div>

        <div>
            <h2 class="text-2xl font-semibold mb-6 leading-snug">
                Langkah - Langkah Daftar <br> Talent Hunter
            </h2>
          <div class="relative pl-12 max-w-xl">
    <!-- Garis vertikal -->
    <div class="absolute left-2.5 top-0 bottom-0 w-0.5 bg-white"></div>

    <!-- Step 1 -->
    <div class="relative flex items-start mb-12">
      <div class="absolute left-0 top-1/2 -translate-y-1/2 w-5 h-5 bg-white rounded-full"></div>
      <p class="ml-8 text-lg leading-relaxed">
        Klik tombol daftar untuk mendaftarkan perusahaan anda
      </p>
    </div>

    <!-- Step 2 -->
    <div class="relative flex items-start mb-12">
      <div class="absolute left-0 top-1/2 -translate-y-1/2 w-5 h-5 bg-white rounded-full"></div>
      <p class="ml-8 text-lg leading-relaxed">
        Mengisi formulir pendaftaran dan kirim formulir pendaftaran
      </p>
    </div>

    <!-- Step 3 -->
    <div class="relative flex items-start mb-12">
      <div class="absolute left-0 top-1/2 -translate-y-1/2 w-5 h-5 bg-white rounded-full"></div>
      <p class="ml-8 text-lg leading-relaxed">
        Tunggu pemberitahuan selanjutnya setelah pendaftaran
      </p>
    </div>

    <!-- Step 4 (ceklist di lingkaran) -->
    <div class="relative flex items-start">
      <div class="absolute left-0 top-1/2 -translate-y-1/2 w-5 h-5 bg-white rounded-full flex items-center justify-center text-orange-500 font-bold text-sm">
        
      </div>
      <p class="ml-8 text-lg leading-relaxed">
        Perusahaan berhasil didaftarkan
        
      </p>
    </div>
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
            <img src="{{ asset('images/jam.png') }}" class="w-12 h-12 mb-3"/>
            <h3 class="font-bold text-orange-500">Kandidat</h3>
            <p class="text-sm text-orange-500">Mendapatkan kandidat sesuai kebutuhan perusahaan dan posisi yang ditujukan.</p>
        </div>

        <!-- Siap Kerja -->
        <div class="flex flex-col items-center">
            <img src="{{ asset('images/p.png') }}" class="w-12 h-12 mb-3"/>
            <h3 class="font-bold text-orange-500">Siap Kerja</h3>
            <p class="text-sm text-orange-500">Kandidat yang didapatkan dipastikan siap kerja dengan perusahaan yang direkomendasikan.</p>
        </div>
    </div>

    <!-- Bawah: 2 item -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mt-10 max-w-3xl mx-auto">
        <!-- Memudahkan -->
        <div class="flex flex-col items-center">
            <img src="{{ asset('images/roket.png') }}" class="w-12 h-12 mb-3"/>
            <h3 class="font-bold text-orange-500">Memudahkan</h3>
            <p class="text-sm text-orange-500">Mempermudah perusahaan dalam penyaringan kandidat.</p>
        </div>

        <!-- Jaminan -->
        <div class="flex flex-col items-center">
            <img src="{{ asset('images/roket.png') }}" class="w-12 h-12 mb-3"/>
            <h3 class="font-bold text-orange-500">Jaminan</h3>
            <p class="text-sm text-orange-500">Jaminan ganti kandidat baru jika tidak cocok dengan spesifikasi perusahaan.</p>
        </div>
    </div>
</div>

    </section>








    @include('layouts.footer')
@endsection
