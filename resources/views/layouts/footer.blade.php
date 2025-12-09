<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

<!-- Paksa semua teks pakai Poppins -->
<style>
    footer {
        font-family: 'Poppins', sans-serif;
    }
</style>

<!-- Footer -->
<footer class="bg-orange-500 text-white px-8 md:px-16 py-10">
    <div class="grid md:grid-cols-3 gap-8">

        <!-- Logo + Description -->
        <div class="mt-[-10%]">
            <div>
                <img src="{{ asset('images/logo_area_kerja_putih.png') }}" alt="Logo" class="w-20 h-20 ">
            </div>
            <div class="text-sm leading-relaxed ">
                <p>Lamar Pekerjaan Kamu - Dengan <br> waktu dan langkah yang cepat</p>
            </div>
        </div>

        <!-- Kategori -->
        <div>
            <h3 class="mb-4 text-xl">Kategori</h3>
            @auth
                @if (Auth::user()->role == 'pelamar')
                    <ul class="grid grid-cols-2 gap-y-3 text-sm">
                        <li><a href="{{ route('beranda') }}"
                                class="hover:text-orange-200 transition hover:scale-105">Beranda</a></li>
                        <li><a href="{{ url('/pelamar/tips-kerja') }}"
                                class="hover:text-orange-200 transition hover:scale-105">Tips Kerja</a></li>
                        <li><a href="{{ route('transaksi.pendaftaran') }}"
                                class="hover:text-orange-200 transition hover:scale-105">Transaksi</a></li>
                        <li><a href="{{ url('/bantuan') }}"
                                class="hover:text-orange-200 transition hover:scale-105">Bantuan</a>
                        </li>
                    </ul>
                @elseif (Auth::user()->role == 'perusahaan')
                    <ul class="grid grid-cols-2 gap-y-3 text-sm">
                        <li><a href="{{ route('perusahaan.dashboard') }}"
                                class="hover:text-orange-200 transition hover:scale-105">Beranda</a></li>
                        <li><a href="{{ route('perusahaan.kandidat.ak') }}"
                                class="hover:text-orange-200 transition hover:scale-105">Kandidat</a></li>
                        <li><a href="{{ route('talent-hunter.index') }}"
                                class="hover:text-orange-200 transition hover:scale-105">Talent Hunter</a></li>
                        <li><a href="{{ route('paket.form') }}"
                                class="hover:text-orange-200 transition hover:scale-105">Pasang Lowongan</a></li>
                    </ul>
                @else
                    <li><a href="/bantuan" class="hover:text-orange-200 transition hover:scale-105">Bantuan</a></li>
                @endif
            @endauth

            @guest
                <li><a href="#" class="hover:text-orange-200 transition hover:scale-105">Beranda</a></li>
                <li><a href="#" class="hover:text-orange-200 transition hover:scale-105">Tips Kerja</a></li>
                <li><a href="#" class="hover:text-orange-200 transition hover:scale-105">Provinsi Lainnya</a></li>
                <li><a href="#" class="hover:text-orange-200 transition hover:scale-105">Pasang Lowongan</a></li>
            @endguest

        </div>

        <!-- Kontak -->
        <div>
            <h3 class="mb-4 text-xl">Kontak Kami</h3>

            <form class="flex flex-col sm:flex-row bg-white overflow-hidden rounded-lg">

                <input type="email" placeholder="Email address"
                    class="flex-1 px-3 py-2 text-black focus:outline-none 
                   border border-gray-300 sm:border-r-0 
                   rounded-md sm:rounded-none w-full">

                <button type="submit"
                    class="bg-black text-orange-500 px-4 py-2 hover:bg-gray-800 
                   rounded-md sm:rounded-none sm:rounded-r-lg 
                   w-full sm:w-auto text-center">
                    Submit
                </button>

            </form>
        </div>


    </div>

    <!-- Divider -->
    <div class="border-t border-orange-400 my-6"></div>

    <!-- Bottom Section -->
    <div class="flex flex-col md:flex-row items-center justify-between gap-4 text-sm">
        <!-- Left text -->
        <p class="text-orange-200">Get ease in applying for <br> your dream job</p>

        <!-- Social Icons -->
        <div class="flex gap-4">
            @foreach ($socialLinks as $social)
                @if (in_array(strtolower($social->nama), ['facebook', 'youtube', 'instagram', 'twitter', 'linkedin']))
                    <a href="{{ $social->link }}"
                        class="border border-orange-400 rounded-md px-2 py-1 hover:bg-orange-600 transition duration-300 hover:scale-110"
                        title="{{ ucfirst($social->nama) }}">
                        @switch(strtolower($social->nama))
                            @case('facebook')
                                <i class=" text-3xl ph ph-facebook-logo"></i>
                            @break

                            @case('youtube')
                                <i class=" text-3xl ph ph-youtube-logo"></i>
                            @break

                            @case('instagram')
                                <i class=" text-3xl ph ph-instagram-logo"></i>
                            @break

                            @case('twitter')
                                <i class=" text-3xl ph ph-twitter-logo"></i>
                            @break

                            @case('linkedin')
                                <i class=" text-3xl ph ph-linkedin-logo"></i>
                            @break
                        @endswitch
                    </a>
                @endif
            @endforeach
        </div>

        <!-- Right copyright -->
        <p class="text-orange-200">Copyright © 2025 areakerja.com</p>
    </div>

</footer>
