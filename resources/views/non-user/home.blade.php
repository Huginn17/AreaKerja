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

                            <input type="hidden" name="kategori" id="kategoriInput">
                            <input type="hidden" name="jenis" id="jenisInput">

                            {{-- Tombol --}}
                            <button type="submit"
                                class="bg-orange-500 px-5 py-2.5 text-white text-sm md:text-base rounded-md hover:bg-orange-600 mt-2 md:mt-0 w-full md:w-auto md:ml-auto">
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

        <div class="flex flex-col lg:flex-row gap-4 mt-6 relative">

            <!-- ================= KATEGORI ================= -->
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4" id="kategori-wrapper">
                @foreach ($KategoriList as $namaKategori)
                    <button type="button" data-kategori="{{ $namaKategori }}" onclick="pilihKategori(this)"
                        class="kategori-btn px-4 py-3 shadow-sm hover:shadow-lg rounded-lg text-xs sm:text-sm font-semibold transition-all duration-300 border
                         bg-white border-gray-300 text-gray-700 hover:bg-orange-500 hover:border-orange-300 hover:text-white">
                        {{ $namaKategori }}
                    </button>
                @endforeach
            </div>

            <div class="hidden lg:block w-px bg-gray-300 mx-6"></div>

            <!-- ================= JENIS ================= -->
            <div class="grid grid-flow-col grid-rows-3 gap-4 w-full lg:w-[240px]" id="jenis-wrapper">
                @foreach ($jenisList as $jenis)
                    <button type="button" data-jenis="{{ $jenis }}" onclick="pilihJenis(this)"
                        class="jenis-btn px-4 py-3 shadow-sm hover:shadow-lg rounded-lg text-sm font-medium transition-all duration-300 border
                             bg-white border-gray-300 text-gray-700 hover:bg-orange-500 hover:border-orange-300 hover:text-white">
                        {{ $jenis }}
                    </button>
                @endforeach
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
        <div x-show="tab === 'riwayat'" x-cloak x-transition class="w-full px-4 md:px-36">
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
                    <p class="text-gray-500 mb-4">Belum ada pencarian.</p>
                @endif
            </div>
        </div>

        <!-- =============================== -->
        <!-- TAB: UMPAN LOWONGAN -->
        <!-- =============================== -->
        <div x-show="tab === 'umpan'" x-transition class="w-full px-4 md:px-36 mt-8">

            <h3 class="text-gray-500 font-semibold mb-8">
                Lowongan berdasarkan pada aktivitas Anda di areakerja
            </h3>

            <section class="mb-8">
                <div id="section-umpan-lowongan" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-3">

                    @foreach ($Data as $d)
                        <div>
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
    <script>
        function pilihKategori(kategori) {
            const input = document.getElementById('kategoriInput');

            // toggle
            if (input.value === kategori) {
                input.value = '';
            } else {
                input.value = kategori;
            }
        }

        function pilihJenis(jenis) {
            const input = document.getElementById('jenisInput');

            // toggle
            if (input.value === jenis) {
                input.value = '';
            } else {
                input.value = jenis;
            }
        }
    </script>

    <script>
        function resetKategoriUI() {
            document.querySelectorAll('.kategori-btn').forEach(el => {
                el.classList.remove('bg-orange-500', 'border-orange-500', 'text-white');
                el.classList.add('bg-white', 'border-gray-300', 'text-gray-700');
            });
        }

        function resetJenisUI() {
            document.querySelectorAll('.jenis-btn').forEach(el => {
                el.classList.remove('bg-orange-500', 'border-orange-500', 'text-white');
                el.classList.add('bg-white', 'border-gray-300', 'text-gray-700');
            });
        }

        function pilihKategori(btn) {
            const value = btn.dataset.kategori;
            const input = document.getElementById('kategoriInput');

            // JIKA KLIK KATEGORI YANG SAMA → TOGGLE OFF
            if (input.value === value) {
                input.value = '';
                resetKategoriUI();
                return;
            }

            // AKTIFKAN
            resetKategoriUI();
            btn.classList.remove('bg-white', 'border-gray-300', 'text-gray-700');
            btn.classList.add('bg-orange-500', 'border-orange-500', 'text-white');
            input.value = value;
        }

        function pilihJenis(btn) {
            const value = btn.dataset.jenis;
            const input = document.getElementById('jenisInput');

            if (input.value === value) {
                input.value = '';
                resetJenisUI();
                return;
            }

            resetJenisUI();
            btn.classList.remove('bg-white', 'border-gray-300', 'text-gray-700');
            btn.classList.add('bg-orange-500', 'border-orange-500', 'text-white');
            input.value = value;
        }
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const kategori = "{{ request('kategori') }}";
            const jenis = "{{ request('jenis') }}";

            if (kategori) {
                document.querySelector(`[data-kategori="${kategori}"]`)?.click();
            }

            if (jenis) {
                document.querySelector(`[data-jenis="${jenis}"]`)?.click();
            }
        });
    </script>


    @include('layouts.footer')
@endsection
