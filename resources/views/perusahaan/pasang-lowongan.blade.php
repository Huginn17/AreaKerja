@extends('layouts.index-perusahaan')
@section('content')
    <!-- Hero Section -->
    <div class="mt-10">
        <section class="relative">

            @php
                $header = \App\Models\SocialLink::where('nama', 'header_pasang_lowongan')->first();
            @endphp

            <img src="{{ $header && $header->link ? asset('storage/' . $header->link) : asset('images/tangan.png') }}"
                alt="Header Image" class="w-full h-[350px] object-cover">

            {{-- <img src="{{ asset('images/tangan.png') }}" alt="hero" class="w-full h-[350px] object-cover"> --}}
            <div class="absolute inset-0 bg-black bg-opacity-20"></div>
            <div class="absolute bottom-20 left-20 text-white">
                <h1 class="text-3xl md:text-4xl font-semibold mt-3 max-w-2xl">
                    Pasang Lowongan
                </h1>
                <p class="text-sm mt-4">Dapatkan karyawan berkualitas</p>
                <p class="text-sm "> untuk perusahaan anda</p><br>
                <button>
                    <span class="bg-orange-500 hover:bg-orange-600 text-sm px-8 py-2 rounded-lg">Daftar</span>
                </button>
            </div>
        </section>
    </div>
    <section class="py-16 mt-20">
        <div class="max-w-6xl mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-center gap-6 flex-wrap">

                @foreach ($pakets as $paket)
                    <div class="w-72">
                        <div
                            class="bg-white border border-gray-400 rounded-xl shadow-sm hover:shadow-lg overflow-hidden flex flex-col transition-all duration-500 hover:scale-105">
                            <!-- Warna header sesuai nama paket -->
                            <div
                                class="py-3 text-center 
                            @if ($paket->nama == 'Gold') bg-yellow-500 
                            @elseif($paket->nama == 'Silver') bg-gray-500 
                            @elseif($paket->nama == 'Bronze') bg-amber-700 
                            @else bg-orange-500 @endif">
                                <h3 class="text-xl font-bold text-white uppercase">{{ $paket->nama }}</h3>
                            </div>
                            <div class="p-6 flex-1 flex flex-col">
                                <h4 class="text-base font-semibold mb-1 text-center">Lebih Banyak Benefit</h4>
                                <p class="text-sm text-gray-700 mb-2 text-center">
                                    {{ $paket->deskripsi }}
                                </p>
                                <hr class="my-3 border-gray-300">

                                <!-- List benefit bisa disimpan di tabel atau hardcode -->
                                <ul class="text-sm text-gray-700 space-y-2 mb-6 flex-1">
                                    <li class="flex items-start"><span class="mr-2">✔</span> Website & Aplikasi</li>
                                    <li class="flex items-start"><span class="mr-2">✔</span> Instagram Post & Story</li>
                                    <li class="flex items-start"><span class="mr-2">✔</span> Highlight Story Favorit</li>
                                    <li class="flex items-start"><span class="mr-2">✔</span> Google Jobs & Bisnis</li>
                                    <li class="flex items-start"><span class="mr-2">✔</span> Facebook Post & Story</li>
                                    <li class="flex items-start"><span class="mr-2">✔</span> Twitter</li>
                                    <li class="flex items-start"><span class="mr-2">✔</span> LinkedIn</li>
                                    <li class="flex items-start"><span class="mr-2">✔</span> Telegram</li>
                                </ul>

                                <!-- Tombol pasang lowongan -->
                                <button type="button"
                                    onclick="openModal({{ $paket->id }}, '{{ $paket->nama }}', {{ $paket->harga }})"
                                    class="@if ($paket->nama == 'Gold') bg-yellow-500 
                                       @elseif($paket->nama == 'Silver') bg-gray-500 
                                       @elseif($paket->nama == 'Bronze') bg-amber-700 
                                       @else bg-orange-500 @endif
                                       text-white font-semibold py-2 rounded-md hover:opacity-90 w-full">
                                    Pasang Lowongan
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach

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
                    <p class="text-sm text-orange-600">Website kami menjangkau ratusan perusahaan yang siap menerima ribuan
                        pencari
                        kerja</p>
                </div>
                <div class="flex items-start gap-3">
                    <img src="{{ asset('images/3.png') }}" alt="obrol" class="w-20 h-20">
                    <p class="text-sm text-orange-600">Akun media sosial kami didedikasikan untuk membagikan info pekerjaan
                        setiap hari
                    </p>
                </div>
                <div class="flex items-start gap-3">
                    <img src="{{ asset('images/1.png') }}" alt="rp" class="w-20 h-20">
                    <p class="text-sm text-orange-600">Harga yang ramah bagi para pencari kerja dengan keuntungan peluang
                        kerja yang
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
        class="fixed bottom-6 right-6 bg-orange-500 text-white px-3 py-3 rounded-full shadow-lg hover:bg-orange-600 transition">
        <svg width="24" height="23" viewBox="0 0 31 28" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_231_4417)">
                <path
                    d="M26.6695 18.25L15.532 7.31684L4.3945 18.25L0.973172 14.8841L15.532 0.561196L30.0908 14.8841L26.6695 18.25Z"
                    fill="white" />
            </g>
            <defs>
                <clipPath id="clip0_231_4417">
                    <rect width="29.1176" height="26.9608" fill="white"
                        transform="translate(30.0586 27.2148) rotate(-180)" />
                </clipPath>
            </defs>
        </svg>

    </a>


    <!-- Modal -->
    <div id="paketModal" class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center z-50">

        <div class="bg-white w-full max-w-md rounded-2xl shadow-2xl p-6 animate-scaleIn">

            <!-- Header -->
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-bold text-gray-800">Konfirmasi Pembelian Paket</h2>
                <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700 transition">
                    ✕
                </button>
            </div>

            <form action="{{ route('paket.beli') }}" method="POST">
                @csrf
                <input type="hidden" name="paket_id" id="modal_paket_id">

                <!-- Detail Paket -->
                <div class="space-y-2 bg-gray-50 p-4 rounded-xl border border-gray-200 mb-4">
                    <p class="text-sm">
                        Paket:
                        <span id="modal_paket_name" class="font-semibold text-gray-800"></span>
                    </p>
                    <p class="text-sm">
                        Harga:
                        <span id="modal_paket_price" class="font-semibold text-orange-600"></span> koin
                    </p>
                    <p class="text-sm">
                        Koin Anda:
                        <span class="font-semibold text-green-600">{{ $perusahaan->koin_perusahaan ?? 0 }}</span>
                    </p>
                </div>

                <!-- Dropdown Lowongan -->
                <label class="block mb-2 text-sm font-medium text-gray-700">Pilih Lowongan</label>
                <select name="lowongan_id" required
                    class="w-full border-2 border-gray-300 rounded-xl px-3 py-2 mb-4 focus:ring-2 focus:ring-orange-400 focus:border-orange-400 transition">
                    <option value="">-- Pilih Lowongan --</option>
                    @foreach ($perusahaan->pasanglowongan as $lowongan)
                        <option value="{{ $lowongan->id }}">{{ $lowongan->nama }}</option>
                    @endforeach
                </select>

                <!-- Button -->
                <div class="flex justify-end gap-3 mt-4">
                    <button type="button" onclick="closeModal()"
                        class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-xl font-medium transition">
                        Batal
                    </button>

                    <button type="submit"
                        class="px-4 py-2 bg-orange-500 hover:bg-orange-600 text-white rounded-xl font-semibold shadow-md transition">
                        Konfirmasi
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Animation -->
    <style>
        @keyframes scaleIn {
            0% {
                opacity: 0;
                transform: scale(0.8);
            }

            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        .animate-scaleIn {
            animation: scaleIn 0.25s ease-out;
        }
    </style>


    {{-- MODAL TIDAK CUKUP KOIN --}}
    <div x-data="{ open: {{ session('koin_kurang') ? 'true' : 'false' }} }" x-show="open" x-cloak
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div x-transition class="bg-white p-8 rounded-2xl shadow-lg w-[400px] text-center">

            <h2 class="text-xl font-semibold mb-4 italic">Upss!!</h2>

            <p class="mb-6 text-gray-700">
                Koin anda kurang silahkan Top Up terlebih dahulu.
            </p>

            <a href="{{ route('perusahaan.dashboard') }}"
                class="px-6 py-2 bg-orange-500 text-white rounded-full hover:bg-orange-600 transition">
                Top Up
            </a>
        </div>
    </div>




    <script>
        function openModal(paketId, paketName, paketPrice) {
            document.getElementById('modal_paket_id').value = paketId;
            document.getElementById('modal_paket_name').textContent = paketName;
            document.getElementById('modal_paket_price').textContent = paketPrice.toLocaleString();
            document.getElementById('paketModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('paketModal').classList.add('hidden');
        }
    </script>
    @include('layouts.footer')
@endsection
