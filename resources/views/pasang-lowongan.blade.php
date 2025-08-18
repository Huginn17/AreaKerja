@extends('layouts.index')
@section('content')
        <!-- Hero Section -->
        <section class="relative">
            <img src="{{ asset('images/tangan.png') }}" alt="hero" class="w-full h-[350px] object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-20"></div>
            <div class="absolute bottom-20 left-20 text-white">
                <h1 class="text-3xl md:text-4xl font-bold mt-3 max-w-2xl">
                    Pasang Lowongan
                </h1>
                <p class="text-sm mt-4">Dapatkan karyawan berkualitas</p>
                <p class="text-sm "> untuk perusahaan anda</p><br>
                <button>
                    <span class="bg-orange-500 hover:bg-orange-600 text-xl px-7 py-1 rounded-lg ">Daftar</span>
                </button>
            </div>
        </section>

        <!-- Pricing Section -->
        <section class="max-w-6xl mx-auto px-4 py-12">
            <div class="grid md:grid-cols-3 gap-6">

                <!-- Gold -->
                <div class="bg-white shadow-lg rounded-lg border-t-8 border-yellow-400">
                    <div class="bg-yellow-400 text-center py-3 font-bold text-xl">GOLD</div>
                    <div class="p-6">
                        <h2 class="font-bold mb-4 text-center">Lebih Banyak Benefit</h2>
                        <p class="text-sm text-center">5 Kali Publikasi di semua jaringan</p>
                        <p class="text-sm text-center mb-4">Areakerja.com</p>
                        <ul class="space-y-2 text-sm ">
                            <hr>
                            <li>✔ Website & Aplikasi</li>
                            <li>✔ Instagram Post & Story</li>
                            <li>✔ Highlight Story Favorit</li>
                            <li>✔ Google Jobs & Bisnis</li>
                            <li>✔ Facebook Post & Story</li>
                            <li>✔ Twitter</li>
                            <li>✔ Lingkedin</li>
                            <li>✔ Telegram</li>
                        </ul>
                        <button
                            class="w-full mt-6 bg-yellow-400 hover:bg-yellow-500 text-white font-semibold py-2 rounded-lg transition-duration-300">
                            Pasang Lowongan
                        </button>
                    </div>
                </div>

                <!-- Silver -->
                <div class="bg-white shadow-lg rounded-lg border-t-8 border-gray-400">
                    <div class="bg-gray-400 text-center py-3 font-bold text-xl text-white">Silver</div>
                    <div class="p-6">
                        <h3 class="font-bold mb-4 text-center">Lebih Banyak Benefit</h3>
                        <p class="text-sm text-center">3 Kali Publikasi di semua jaringan</p>
                        <p class="text-sm text-center mb-4">Areakerja.com</p>
                        <ul class="space-y-2 text-sm">
                            <hr>
                            <li>✔ Website & Aplikasi</li>
                            <li>✔ Instagram Post & Story</li>
                            <li>✔ Highlight Story Favorit</li>
                            <li>✔ Google Jobs & Bisnis</li>
                            <li>✔ Facebook Post & Story</li>
                            <li>✔ Twitter</li>
                            <li>✔ Lingkedin</li>
                            <li>✔ Telegram</li>
                        </ul>
                        <button class="w-full mt-6 bg-gray-400 hover:bg-gray-500 text-white font-semibold py-2 rounded-lg">
                            Pasang Lowongan
                        </button>
                    </div>
                </div>

                <!-- Bronze -->
                <div class="bg-white shadow-lg rounded-lg border-t-8 border-orange-700">
                    <div class="bg-orange-700 text-center py-3 font-bold text-xl text-white">Bronze</div>
                    <div class="p-6">
                        <h3 class="font-semibold mb-4 text-center">Lebih Banyak Benefit</h3>
                        <p class="text-sm text-center">1 Kali Publikasi di semua jaringan</p>
                        <p class="text-sm text-center mb-4">Areakerja.com</p>
                        <ul class="space-y-2 text-sm">
                            <hr>
                            <li>✔ Website & Aplikasi</li>
                            <li>✔ Instagram Post & Story</li>
                            <li>✔ Highlight Story Favorit</li>
                            <li>✔ Google Jobs & Bisnis</li>
                            <li>✔ Facebook Post & Story</li>
                            <li>✔ Twitter</li>
                            <li>✔ Lingkedin</li>
                            <li>✔ Telegram</li>
                        </ul>
                        <button
                            class="w-full mt-6 bg-orange-700 hover:bg-orange-800 text-white font-semibold py-2 rounded-lg">
                            Pasang Lowongan
                        </button>
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
                <div class="space-y-6">
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
