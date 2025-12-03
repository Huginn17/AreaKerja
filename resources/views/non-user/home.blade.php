@extends('layouts.index')

@section('content')
    <section class="bg-white py-8 mt-20">
        <div class="max-w-5xl mx-auto px-5">
            {{-- Search Bar --}}
            <form action="{{ route('lowongan.search') }}" method="GET">
                <div
                    class="flex flex-col md:flex-row py-3 border border-gray-300 items-center text-gray-700 font-semibold rounded-xl shadow-lg">

                    {{-- ICON search --}}
                    <img src="{{ asset('images/search.png') }}" alt="search" class="w-5 h-5 ml-7 mb-1">

                    {{-- INPUT nama lowongan --}}
                    <input type="text" name="posisi" value="{{ request('posisi') }}"
                        placeholder="Posisi lowongan, kata kunci..." class="flex-1 px-7 py-3 w-full border-none">

                    {{-- Garis pembatas --}}
                    <svg width="2" height="35" viewBox="0 0 2 35" fill="none" class="ml-4" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 0V35" stroke="black" stroke-opacity="0.4" />
                    </svg>

                    {{-- ICON maps --}}
                    <img src="{{ asset('images/maps.png') }}" alt="location" class="w-5 h-5 ml-9  mb-1">

                    {{-- INPUT lokasi --}}
                    <input type="text" name="lokasi" value="{{ request('lokasi') }}"
                        placeholder="Kota, provinsi, kode pos..." class="flex-1 px-7 py-3 w-full border-none">

                    {{-- Button --}}
                    <button type="submit"
                        class="bg-orange-500 px-4 py-3 text-white text-sm rounded-md mr-6 ml-4 hover:bg-orange-600 font-medium transition duration-300">
                        Cari Lowongan Kerja
                    </button>

                </div>
            </form>

        </div>

        <div class="mt-8">
            <p class="text-center text-sm">
                <span class="text-orange-500 font-semibold">Lamar Pekerjaan Kamu</span>
                <span class="font-semibold text-gray-500">- Dengan waktu dan langkah yang cepat</span>
            </p>
        </div>
        </div>
    </section>

    <!-- Kategori Populer -->
  <section class="max-w-5xl mx-auto px-4 py-8">
    <h4 class="mb-4 text-lg font-semibold text-gray-900">
        KATEGORI PEKERJAAN POPULER
    </h4>

    <div class="flex items-start justify-between gap-4">
        <div class="grid grid-cols-4 gap-4 font-semibold text-sm flex-1">
            @foreach ($KategoriList as $namaKategori)
                @php
                    $isActive = request('kategori') === $namaKategori;
                @endphp

                <a href="?kategori={{ urlencode($namaKategori) }}" class="block">
                    <div
                        class="w-full py-3 border rounded-sm text-center transition
                        {{ $isActive ? 'bg-orange-500 border-orange-500 text-white' : 'text-gray-900 border-gray-300 hover:bg-gray-100' }}">
                        {{ $namaKategori }}
                    </div>
                </a>
            @endforeach
        </div>

        <!-- Kategori khusus di kanan -->
        <div class="flex flex-col gap-4 min-w-[120px] text-sm font-semibold">

            <!-- Full Time -->
            <div class="flex items-center gap-2 border border-red-300 text-red-500 px-10 py-3 rounded-sm border-l-4 border-l-red-500 hover:bg-gray-100">
                <span>🔥</span>
                <span>Full Time</span>
            </div>

            <!-- WFO/WFH -->
            <div class="flex items-center gap-2 border border-blue-300 text-blue-500 px-10 py-3 rounded-sm border-l-4 border-l-blue-500 hover:bg-gray-100">
                <span>🌐</span>
                <span>WFO/WFH</span>
            </div>

            <!-- Graduate -->
            <div class="flex items-center gap-2 border border-orange-300 text-orange-500 px-10 py-3 rounded-sm border-l-4 border-l-orange-500 hover:bg-gray-100">
                <span>🎓</span>
                <span>Graduate</span>
            </div>

        </div>

    </div>
</section>




    <!-- Tabs -->
    <div x-data="{ tab: 'umpan' }">
        <div class="flex justify-center border-b">
            <div class="max-w-full mx-auto flex gap-6 px-4">

                <!-- TAB UMPAN -->
                <button @click="tab = 'umpan'"
                    :class="tab === 'umpan'
                        ?
                        'py-3 border-b-4 border-orange-600 text-gray-800 font-bold' :
                        'py-3 text-gray-700 hover:text-gray-800 font-bold'">
                    UMPAN LOWONGAN
                </button>

                <!-- TAB RIWAYAT -->
                <button @click="tab = 'riwayat'"
                    :class="tab === 'riwayat'
                        ?
                        'py-3 border-b-4 border-orange-600 text-gray-800 font-bold' :
                        'py-3 text-gray-700 hover:text-gray-800 font-bold'">
                    PENCARIAN BARU-BARU INI
                </button>

            </div>

        </div>

        <!-- =============================== -->
        <!-- TAB: PENCARIAN TERAKHIR -->
        <!-- =============================== -->
        <div x-show="tab === 'riwayat'" x-transition class="w-full">
            <div class="flex justify-between">
                <h3 class="ml-24 mt-8 mb-8 text-gray-500 font-semibold">
                    Riwayat pencarian Anda
                </h3>

                <form action="{{ route('pelamar.resetRiwayat') }}" method="POST">
                    @csrf
                    <button class="mr-24 mt-8 mb-8 text-red-600 text-sm hover:underline">
                        Hapus riwayat pencarian
                    </button>
                </form>
            </div>
            <div class="ml-24 mr-24">
                @if (!empty($riwayat) && count($riwayat) > 0)
                    @foreach ($riwayat as $r)
                        <h2 class="font-bold text-lg mb-3">
                            {{ $r['posisi'] ?: '-' }} <span class="font-medium"> - </span>
                            {{ $r['lokasi'] ?: 'Lokasi apapun' }}
                        </h2>

                        <div class="grid grid-cols-2 gap-3">

                            @foreach ($r['lowongan_ids'] as $id)
                                @php
                                    $d = \App\Models\LowonganPerusahaan::find($id);
                                @endphp

                                @if ($d)
                                    @include('non-user.components.card', ['lowongan' => $d])
                                @endif
                            @endforeach


                        </div>

                        <hr class="my-6 border-gray-300">
                    @endforeach
                @else
                    <p class="ml-24 mt-8 mb-8 text-gray-500">Belum ada pencarian.</p>
                @endif
            </div>
        </div>


        <!-- =============================== -->
        <!-- TAB: UMPAN LOWONGAN -->
        <!-- =============================== -->
        <div x-show="tab === 'umpan'" x-transition class="w-full">
            <!-- Card Lowongan -->
            <h3 class="ml-24 mt-8 mb-8 text-gray-500 font-semibold">
                Lowongan berdasarkan pada aktivitas Anda di areakerja
            </h3>


            <section class="mx-2 lg:mx-0 md:mx-0 px-0 lg:px-20 md:px-20 mb-8">
                <div id="section-umpan-lowongan" class="columns-1 md:columns-2 lg:columns-2 gap-3">
                    @foreach ($Data as $d)
                        <div class="break-inside-avoid mb-3">
                            @include('non-user.components.card', ['lowongan' => $d])
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>



    {{-- AlpineJS --}}
    <script src="https://unpkg.com/alpinejs" defer></script>


    <script src="//unpkg.com/alpinejs" defer></script>
    @include('layouts.footer')
@endsection
