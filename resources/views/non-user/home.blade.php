@extends('layouts.index')

@section('content')
    <section class="bg-white py-8 mt-20">
        <div class="max-w-5xl mx-auto px-5">
            {{-- Search Bar --}}
            <form action="{{ route('lowongan.search') }}" method="GET">
                <div
                    class="flex flex-col md:flex-row py-3 border border-gray-500 items-center text-gray-700 font-semibold rounded-xl shadow-md">

                    {{-- ICON search --}}
                    <img src="{{ asset('images/search.png') }}" alt="search" class="w-5 h-5 ml-7 mb-1">

                    {{-- INPUT nama lowongan --}}
                    <input type="text" name="posisi" value="{{ request('posisi') }}"
                        placeholder="Posisi lowongan, kata kunci..." class="flex-1 px-7 py-3 w-full">

                    {{-- Garis pembatas --}}
                    <svg width="2" height="35" viewBox="0 0 2 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 0V35" stroke="black" stroke-opacity="0.4" />
                    </svg>

                    {{-- ICON maps --}}
                    <img src="{{ asset('images/maps.png') }}" alt="location" class="w-5 h-5 ml-7 mb-1">

                    {{-- INPUT lokasi --}}
                    <input type="text" name="lokasi" value="{{ request('lokasi') }}"
                        placeholder="Kota, provinsi, kode pos..." class="flex-1 px-7 py-3 w-full">

                    {{-- Button --}}
                    <button type="submit"
                        class="bg-orange-500 px-4 py-3 text-white text-sm rounded-md mr-6 hover:bg-orange-600 font-medium transition duration-300">
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
        <h4 class="mb-4 text-lg font-semibold text-gray-900">KATEGORI PEKERJAAN POPULER </h4>
        <div class="grid grid-cols-5 gap-4 font-semibold text-xs transition-duration-300 py-1">
            @foreach (['Teknologi', 'Pelayanan', 'Administrasi', 'Pemasaran', '🔥 Full Time', 'Pendidik', 'Customer Service', 'Keuangan', 'Kasir', '🌐 WFO/WFH', 'Admin', 'Programmer', 'Marketing', 'Multimedia', '🎓 Graduate'] as $kategori)
                @php
                    $isFullTime = $kategori === '🔥 Full Time';
                    $isWfoWfh = $kategori === '🌐 WFO/WFH';
                    $isGraduate = $kategori === '🎓 Graduate';

                    $textClass = $isFullTime
                        ? 'text-red-600'
                        : ($isWfoWfh
                            ? 'text-blue-600'
                            : ($isGraduate
                                ? 'text-orange-500'
                                : 'text-orange'));

                    $borderClass = $isFullTime
                        ? 'border-l-4 border-red-600 hover:bg-red-100'
                        : ($isWfoWfh
                            ? 'border-l-4 border-blue-600 hover:bg-blue-700'
                            : ($isGraduate
                                ? 'border-l-4 border-orange-500 hover:bg-orange-100'
                                : ''));
                @endphp

                <span
                    class="h-14 w-full px-4 py-3 border-2 border-gray-400 rounded text-sm bg-white hover:bg-gray-50 cursor-pointer flex items-center justify-center text-center shadow-sm {{ $textClass }} {{ $borderClass }}">
                    @if ($isFullTime)
                        <span class="mr-2">🔥</span>
                        <span>Full Time</span>
                    @elseif ($isWfoWfh)
                        <span class="mr-2 hover:bg-gray-50">🌐</span>
                        <span>WFO/WFH</span>
                    @elseif ($isGraduate)
                        <span class="mr-2 hover:bg-gray-100">🎓</span>
                        <span>Graduate</span>
                    @else
                        {{ $kategori }}
                    @endif
                </span>
            @endforeach
        </div>
    </section>

    

    <!-- Tabs -->
    <div x-data="{ tab: 'umpan' }">
        <div class="flex justify-center border-b">
            <div class="max-w-5xl mx-auto flex gap-6 px-4 text">

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
        <div x-show="tab === 'riwayat'" x-transition class="w-full p-6">

            <h3 class="text-gray-500 font-semibold mb-4">
                Riwayat pencarian Anda
            </h3>
            <form action="{{ route('pelamar.resetRiwayat') }}" method="POST">
                @csrf
                <button class="text-red-600 text-sm hover:underline">
                    Hapus riwayat pencarian
                </button>
            </form>


            @if (!empty($riwayat) && count($riwayat) > 0)
                @foreach ($riwayat as $r)
                    <h2 class="font-bold text-lg mb-3 ml-[24px]">
                        {{ $r['posisi'] ?: '-' }} — {{ $r['lokasi'] ?: 'Lokasi apapun' }}
                    </h2>

                    <div class="grid grid-cols-1 lg:grid-cols-2 md:grid-cols-2 gap-3">

                        @foreach ($r['lowongan_ids'] as $id)
                            @php
                                $d = \App\Models\LowonganPerusahaan::find($id);
                            @endphp

                            @if ($d)
                                @include('non-user.components.card', ['lowongan' => $d])
                            @endif
                        @endforeach


                    </div>

                    <hr class="my-6">
                @endforeach
            @else
                <p class="text-gray-500">Belum ada pencarian.</p>
            @endif

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
                <div id="section-umpan-lowongan" class="grid grid-cols-1 lg:grid-cols-2 md:grid-cols-2 gap-3">


                    @foreach ($Data as $d)
                        @include('non-user.components.card', ['lowongan' => $d])
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
