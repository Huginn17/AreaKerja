@extends('layouts.index')
@section('content')
        <!-- Hero Section -->
        <section class="relative">
            <img src="{{ asset('images/tangan.png') }}" alt="hero" class="w-full h-[350px] object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-20"></div>
            <div class="absolute bottom-20 left-20 text-white">
                <h1 class="text-3xl md:text-4xl font-semibold mt-3 max-w-2xl">
                    Pasang Lowongan
                </h1>
                <p class="text-sm mt-4">Dapatkan karyawan berkualitas</p>
                <p class="text-sm "> untuk perusahaan anda</p><br>
                <button>
                    <span class="bg-orange-500 hover:bg-orange-600 text-sm px-8 py-2 rounded-lg ">Daftar</span>
                </button>
            </div>
        </section>

        <!-- Pricing Section -->
   <section class="py-16">
    <div class="max-w-6xl mx-auto px-6">
      <div class="flex flex-col md:flex-row justify-center gap-6">

        <!-- GOLD -->
        <div class="bg-white rounded-2xl shadow-lg w-72 overflow-hidden flex flex-col transition hover:scale-105">
          <div class="py-3 text-center" style="background: linear-gradient(to right,#eab308, #facc15);">
            <h3 class="text-xl font-semibold text-white">Gold</h3>
          </div>
          <div class="p-5 flex-1 flex flex-col">
            <p class="text-sm text-gray-700 mb-4 text-center">
              <span class="font-semibold">Lebih Banyak Benefit</span>
            </p>
            <p class="text-sm text-gray-700 mb-4 text-center">
                5 Kali Publikasi di semua jaringan Areakerja.com
            </p>
            <hr class="my-3">
            <ul class="text-sm text-gray-700 space-y-2 mb-6 flex-1">
              <li class="flex items-start"><span class="mr-2">
                <img src="{{ asset('images/centang.jpg') }}" alt="" class="w-5 h-5">
              </span> Website & Aplikasi</li>

              <li class="flex items-start"><span class="mr-2">
                <img src="{{ asset('images/centang.jpg') }}" alt="" class="w-5 h-5">
              </span> Instagram Post & Story</li>

              <li class="flex items-start"><span class="mr-2">
                <img src="{{ asset('images/centang.jpg') }}" alt="" class="w-5 h-5">
              </span> Highlight Story Favorit</li>

              <li class="flex items-start"><span class="mr-2">
                <img src="{{ asset('images/centang.jpg') }}" alt="" class="w-5 h-5">
              </span> Google Jobs & Bisnis</li>

              <li class="flex items-start"><span class="mr-2">
                <img src="{{ asset('images/centang.jpg') }}" alt="" class="w-5 h-5">
              </span> Facebook Post & Story</li>

              <li class="flex items-start"><span class="mr-2">
                <img src="{{ asset('images/centang.jpg') }}" alt="" class="w-5 h-5">
              </span> Twitter</li>

              <li class="flex items-start"><span class="mr-2">
                <img src="{{ asset('images/centang.jpg') }}" alt="" class="w-5 h-5">
              </span> LinkedIn</li>

              <li class="flex items-start"><span class="mr-2">
                <img src="{{ asset('images/centang.jpg') }}" alt="" class="w-5 h-5">
              </span> Telegram</li>
            </ul>
            <a href="#" class="text-white font-semibold py-2 rounded-lg block text-center hover:opacity-90" 
               style="background: linear-gradient(to right, #eab308);">
               Pasang Lowongan
            </a>
          </div>
        </div>

        <!-- SILVER -->
        <div class="bg-white rounded-2xl shadow-lg w-72 overflow-hidden flex flex-col transition hover:scale-105">
          <div class="py-3 text-center" style="background: linear-gradient(to right, #81858b, #c2c4c7);">
            <h3 class="text-xl font-semibold text-white">Silver</h3>
          </div>
          <div class="p-5 flex-1 flex flex-col">
            <p class="text-sm text-gray-700 mb-4 text-center">
              <span class="font-semibold">Lebih Banyak Benefit</span>
            </p>
            <p class="text-sm text-gray-700 mb-4 text-center">
              3 Kali Publikasi di semua jaringan Areakerja.com
            </p>
            
            <hr class="my-3">
            <ul class="text-sm text-gray-700 space-y-2 mb-6 flex-1">
              <li class="flex items-start"><span class="mr-2">
                <img src="{{ asset('images/centang.jpg') }}" alt="" class="w-5 h-5">
              </span> Website & Aplikasi</li>
              <li class="flex items-start"><span class="mr-2">
                
                <img src="{{ asset('images/centang.jpg') }}" alt="" class="w-5 h-5">
              </span> Instagram Post & Story</li>
              <li class="flex items-start"><span class="mr-2">
                
                <img src="{{ asset('images/centang.jpg') }}" alt="" class="w-5 h-5">
              </span> Highlight Story Favorit</li>
              <li class="flex items-start"><span class="mr-2">
                
                <img src="{{ asset('images/centang.jpg') }}" alt="" class="w-5 h-5">
              </span> Google Jobs & Bisnis</li>
              <li class="flex items-start"><span class="mr-2">
                
                <img src="{{ asset('images/centang.jpg') }}" alt="" class="w-5 h-5">
              </span> Facebook Post & Story</li>
              <li class="flex items-start"><span class="mr-2">
                
                <img src="{{ asset('images/centang.jpg') }}" alt="" class="w-5 h-5">
              </span> Twitter</li>
              <li class="flex items-start"><span class="mr-2">
                
                <img src="{{ asset('images/centang.jpg') }}" alt="" class="w-5 h-5">
              </span> LinkedIn</li>
              <li class="flex items-start"><span class="mr-2">
                
                <img src="{{ asset('images/centang.jpg') }}" alt="" class="w-5 h-5">
              </span> Telegram</li>
            </ul>
            <a href="#" class="text-white font-semibold py-2 rounded-lg block text-center hover:opacity-90" 
               style="background: linear-gradient(to right, #6b7280);">
               Pasang Lowongan
            </a>
          </div>
        </div>

        <!-- BRONZE -->
        <div class="bg-white rounded-2xl shadow-lg w-72 overflow-hidden flex flex-col transition hover:scale-105">
          <div class="py-3 text-center" style="background: linear-gradient(to right, rgb(99, 86, 79),rgb(172, 161, 161));">
            <h3 class="text-xl font-semibold text-white">Bronze</h3>
          </div>
          <div class="p-5 flex-1 flex flex-col">
            <p class="text-sm text-gray-700 mb-4 text-center">
              <span class="font-semibold">Lebih Banyak Benefit</span>
             </p>
             <p class="text-sm text-gray-700 mb-4 text-center">
               1 Kali Publikasi di semua jaringan Areakerja.com
             </p>
             
            <hr class="my-3">
            <ul class="text-sm text-gray-700 space-y-2 mb-6 flex-1">
              <li class="flex items-start"><span class="mr-2">
                
                <img src="{{ asset('images/centang.jpg') }}" alt="" class="w-5 h-5">
              </span> Website & Aplikasi</li>
              <li class="flex items-start"><span class="mr-2">
                
                <img src="{{ asset('images/centang.jpg') }}" alt="" class="w-5 h-5">
              </span> Instagram Post & Story</li>
              <li class="flex items-start"><span class="mr-2">
                
                <img src="{{ asset('images/centang.jpg') }}" alt="" class="w-5 h-5">
              </span> Highlight Story Favorit</li>
              <li class="flex items-start"><span class="mr-2">
                
                <img src="{{ asset('images/centang.jpg') }}" alt="" class="w-5 h-5">
              </span> Google Jobs & Bisnis</li>
              <li class="flex items-start"><span class="mr-2">
                
                <img src="{{ asset('images/centang.jpg') }}" alt="" class="w-5 h-5">
              </span> Facebook Post & Story</li>
              <li class="flex items-start"><span class="mr-2">
                
                <img src="{{ asset('images/centang.jpg') }}" alt="" class="w-5 h-5">
              </span> Twitter</li>
              <li class="flex items-start"><span class="mr-2">
                
                <img src="{{ asset('images/centang.jpg') }}" alt="" class="w-5 h-5">
              </span> LinkedIn</li>
              <li class="flex items-start"><span class="mr-2">
                
                <img src="{{ asset('images/centang.jpg') }}" alt="" class="w-5 h-5">
              </span> Telegram</li>
            </ul>
            <a href="#" class="text-white font-semibold py-2 rounded-lg block text-center hover:opacity-90" 
               style="background: linear-gradient(to right, rgb(99, 86, 79));">
               Pasang Lowongan
            </a>
          </div>
        </div>

      </div>
    </div>
  </section>

        <!-- Steps Section -->
        <!-- Steps Section -->
        <section class="py-12 bg-white">
            <div class="max-w-5xl mx-auto text-center">

                <!-- Judul -->
                <h2 class="text-2xl font-bold text-orange-600">Langkah - Langkah</h2>
                <div class="w-32 h-1 bg-orange-500 mx-auto mt-5 mb-7 rounded"></div>

                <!-- Steps Box -->
                <div class="grid md:grid-cols-4 grid-cols-1 text-left font-semibold overflow-hidden rounded-lg">

                    <!-- Step 1 -->
                    <div class="bg-orange-600 p-6 text-white">
                        <h3 class="text-xl font-bold">01</h3>
                        <p class="text-sm mt-2 font-normal text-white">
                            Pilih paket pemasangan lowongan sesuai yang anda inginkan
                        </p>
                    </div>

                    <!-- Step 2 -->
                    <div class="bg-orange-400 p-6 text-white">
                        <h3 class="text-xl font-bold">02</h3>
                        <p class="text-sm mt-2 font-normal text-white">
                            Kirim materi lowongan via formulir website atau whatsapp kami
                        </p>
                    </div>

                    <!-- Step 3 -->
                    <div class="bg-orange-500 p-6 text-white">
                        <h3 class="text-xl font-bold">03</h3>
                        <p class="text-sm mt-2 font-normal text-white">
                            Anda akan diberi instruksi pembayaran
                        </p>
                    </div>

                    <!-- Step 4 -->
                    <div class="bg-yellow-500 p-6 text-white">
                        <h3 class="text-xl font-bold">04</h3>
                        <p class="text-sm mt-2 font-normal text-white">
                            Lowongan anda siap di publish!
                        </p>
                    </div>

                </div>
            </div>
        </section>


        <!-- Why Choose Us -->
        <section class="max-w-6xl mx-auto px-4 py-12">
            <h2 class="text-2xl font-bold text-orange-600 text-center mb-5">
                Kenapa Harus Area Kerja ?
            </h2>
            <div class="w-32 h-1 bg-orange-500 mx-auto mt-5 mb-7 rounded"></div>
            <div class="grid md:grid-cols-2 gap-8 items-center">

                <!-- Image -->
                <div class="flex justify-center">
                    <img src="{{ asset('images/wongwong.png') }}" alt="Team" class="rounded-lg ">
                </div>

                <!-- Text -->
                <div class="space-y-3">
                    <div class="flex items-start gap-3">
                          <img src="{{ asset('images/2.png') }}" alt="www" class="w-20 h-20">
                          <p class="text-sm text-orange-600">Website kami menjangkau ratusan perusahaan yang siap menerima ribuan pencari
                            kerja</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <img src="{{ asset('images/3.png') }}" alt="obrol" class="w-20 h-20">
                        <p class="text-sm text-orange-600">Akun media sosial kami didedikasikan untuk membagikan info pekerjaan setiap hari
                        </p>
                    </div>
                    <div class="flex items-start gap-3">
                       <img src="{{ asset('images/1.png') }}" alt="rp" class="w-20 h-20">
                        <p class="text-sm text-orange-600">Harga yang ramah bagi para pencari kerja dengan keuntungan peluang kerja yang
                            besar</p>
                    </div>
                </div>

            </div>
        </section>

        <!-- Floating Button -->



        </div>
        </section>

        <!-- Floating Button -->
        <a href="#top"
            class="fixed bottom-6 right-6 bg-orange-500 text-white p-3 rounded-full shadow-lg hover:bg-orange-600 transition">
            ↑
        </a>


        @include('layouts.footer')
    @endsection
