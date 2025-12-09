@extends('layouts.index')

@section('content')
    <section class="bg-white py-8 mt-24">
        <div class="max-w-5xl mx-auto px-4">

            {{-- Search Bar --}}
            {{-- WRAPPER supaya konten berada di tengah desktop --}}
            <div class="w-full flex justify-center">
                <div class="w-full max-w-4xl">

                    {{-- Search bar --}}
                    <form action="{{ route('lowongan.search') }}" method="GET">
                        <div
                            class="flex flex-col md:flex-row items-center gap-3 md:gap-0 py-3 border border-gray-300 rounded-xl shadow-lg px-4 md:px-6 w-full bg-white">

                            {{-- ICON search --}}
                            <div class="flex items-center gap-2 w-full md:w-auto">
                                <img src="{{ asset('images/search.png') }}" class="w-5 h-5 opacity-70">
                                <input type="text" name="posisi" value="{{ request('posisi') }}"
                                    placeholder="Posisi lowongan, kata kunci..."
                                    class="flex-1 py-2 w-full border-none focus:ring-0 text-sm md:text-base">
                            </div>

                            {{-- Garis --}}
                            <div class="hidden md:block h-8 w-px bg-gray-300 mx-4"></div>

                            {{-- ICON maps --}}
                            <div class="flex items-center gap-2 w-full md:w-auto">
                                <img src="{{ asset('images/maps.png') }}" class="w-5 h-5 opacity-70">
                                <input type="text" name="lokasi" value="{{ request('lokasi') }}"
                                    placeholder="Kota, provinsi, kode pos..."
                                    class="flex-1 py-2 w-full border-none focus:ring-0 text-sm md:text-base">
                            </div>

                            {{-- Tombol --}}
                            <button type="submit"
                                class="bg-orange-500 px-5 py-2.5 text-white text-sm md:text-base rounded-md 
                           hover:bg-orange-600 mt-2 md:mt-0 ml-auto md:w-400px">
                                Cari Lowongan Kerja
                            </button>

                        </div>
                    </form>
                </div>
            </div>

            <div class="mt-8 text-center">
                <p class="text-sm">
                    <span class="text-orange-500 font-semibold">Lamar Pekerjaan Kamu</span>
                    <span class="font-semibold text-gray-500">- Dengan waktu dan langkah cepat</span>
                </p>
            </div>

        </div>
    </section>

    <!-- Kategori Populer -->
    <section class="max-w-5xl mx-auto px-4 py-8">

        <h4 class="mb-4 text-lg font-semibold text-gray-900">
            KATEGORI PEKERJAAN POPULER
        </h4>

        <div class="flex flex-col lg:flex-row gap-6">

            <!-- Grid kategori utama -->
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3 flex-1 text-sm font-semibold">
                @foreach ($KategoriList as $namaKategori)
                    @php $isActive = request('kategori') === $namaKategori; @endphp

                    <a href="?kategori={{ urlencode($namaKategori) }}">
                        <div
                            class="w-full py-3 border rounded text-center transition text-xs sm:text-sm
                        {{ $isActive ? 'bg-orange-500 border-orange-500 text-white' : 'text-gray-900 border-gray-300 hover:bg-gray-100' }}">
                            {{ $namaKategori }}
                        </div>
                    </a>
                @endforeach
            </div>

            <!-- Kategori Kanan -->
            <div class="grid grid-cols-1 gap-3 text-sm font-semibold w-full lg:w-[140px]">

                <div
                    class="flex items-center gap-2 border border-red-300 text-red-500 px-4 py-3 rounded border-l-4 border-l-red-500 hover:bg-gray-100">
                    <span>🔥</span><span>Full Time</span>
                </div>

                <div
                    class="flex items-center gap-2 border border-blue-300 text-blue-500 px-4 py-3 rounded border-l-4 border-l-blue-500 hover:bg-gray-100">
                    <span>🌐</span><span>WFO/WFH</span>
                </div>

                <div
                    class="flex items-center gap-2 border border-orange-300 text-orange-500 px-4 py-3 rounded border-l-4 border-l-orange-500 hover:bg-gray-100">
                    <span>🎓</span><span>Graduate</span>
                </div>

            </div>

        </div>
    </section>




    <!-- Tabs -->
    <div x-data="{ tab: 'umpan' }">
        <div class="flex justify-center border-b">
            <div class="max-w-full mx-auto flex gap-6 px-4 overflow-x-auto">

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
        <div x-show="tab === 'riwayat'" x-transition class="w-full px-4 md:px-24">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mt-8 mb-8">
                <h3 class="text-gray-500 font-semibold mb-4 md:mb-0">
                    Riwayat pencarian Anda
                </h3>

                <form action="{{ route('pelamar.resetRiwayat') }}" method="POST">
                    @csrf
                    <button class="text-red-600 text-sm hover:underline">
                        Hapus riwayat pencarian
                    </button>
                </form>
            </div>

            <div>
                @if (!empty($riwayat) && count($riwayat) > 0)
                    @foreach ($riwayat as $r)
                        <h2 class="font-bold text-lg mb-3">
                            {{ $r['posisi'] ?: 'Nama Lowongan' }} <span class="font-medium"> - </span>
                            {{ $r['lokasi'] ?: 'Lokasi apapun' }}
                        </h2>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
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
                    <p class="text-gray-500">Belum ada pencarian.</p>
                @endif
            </div>
        </div>

        <!-- =============================== -->
        <!-- TAB: UMPAN LOWONGAN -->
        <!-- =============================== -->
        <div x-show="tab === 'umpan'" x-transition class="w-full px-4 md:px-24 mt-8">
            <h3 class="text-gray-500 font-semibold mb-8">
                Lowongan berdasarkan pada aktivitas Anda di areakerja
            </h3>

            <section class="mb-8">
                <div id="section-umpan-lowongan" class="columns-1 sm:columns-1 md:columns-2 lg:columns-2 gap-3">
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
