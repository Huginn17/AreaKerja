@extends('layouts.index-perusahaan')
@section('content')
    <div class="bg-white text-gray-800">
        <!-- Header Perusahaan -->
        <div class="max-w-4xl mx-auto px-4 py-6">
            <div class="flex items-center justify-between">

                <!-- Kiri: Logo + Info -->
                <div class="flex items-center gap-4">
                    <img src="{{ asset('images/seven.png') }}" alt="Logo" class="w-20 h-20 object-contain">
                    <div>
                        <h1 class="font-semibold text-lg">Seven_Inc</h1>
                        <p class="text-sm">Jasa TI dan Konsultan TI</p>
                        <p class="text-sm text-gray-600">Jakarta Timur, DKI Jakarta, Indonesia</p>
                    </div>
                </div>

                <!-- Kanan: Tombol + -->
                <button
                    class="w-14 h-14 flex items-center justify-center border border-orange-400 text-orange-500 rounded-md hover:bg-orange-50"><span
                        class="text-3xl">
                        +
                    </span>
                </button>
            </div>
        </div>
    </div>


    <!-- Filter Bar -->
    <div class="max-w-4xl mx-auto px-4 flex justify-between items-center mb-6">
        <div></div>
        <div class="flex gap-3 text-gray-500">
            <select class="border rounded px-3 py-2 text-sm">
                <option>Jenis Paket</option>
            </select>
            <select class="border rounded px-3 py-2 text-sm">
                <option>Jenis Lowongan</option>
            </select>
        </div>
    </div>

    <!-- Lowongan -->
    <div class="max-w-4xl mx-auto px-4 space-y-4">

        <!-- Card Lowongan -->
        <div class="flex items-center gap-4 p-4 rounded-lg shadow bg-white">
            <img src="{{ asset('images/seven.png') }}" alt="Logo" class="w-16 h-16 object-contain">
            <div class="flex-1">
                <span class="text-sm text-gray-600">Seven Inc</span>
                <h2 class="font-semibold mt-1">UI UX Designer – WFO</h2>
                <p class="text-sm text-gray-600">Yogyakarta</p>
                <span class="inline-block mt-4 text-sm px-2 py-1 bg-gray-100 border rounded ">
                    Rp. 4.500.000 – Rp. 7.000.000 per bulan
                </span>
            </div>
            <p class="text-xs text-gray-500">Aktif 2 jam lalu</p>
        </div>

        <!-- Card lainnya copy saja -->
        <div class="flex items-center gap-4 p-4 rounded-lg shadow bg-white">
            <img src="{{ asset('images/seven.png') }}" alt="Logo" class="w-16 h-16 object-contain">
            <div class="flex-1">
                <span class="text-sm text-gray-600">Seven Inc</span>
                <h2 class="font-semibold mt-1">UI UX Designer – WFO</h2>
                <p class="text-sm text-gray-600">Yogyakarta</p>
                <span class="inline-block mt-4 text-sm px-2 py-1 bg-gray-100 border rounded ">
                    Rp. 4.500.000 – Rp. 7.000.000 per bulan
                </span>
            </div>
            <p class="text-xs text-gray-500">Aktif 2 jam lalu</p>
        </div>

        <!-- Card lainnya tinggal diulang -->

    </div>

    <!-- Button bawah -->
    <div class="max-w-4xl mx-auto px-4 py-6 text-center">
        <button class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded">
            Memuat
        </button>
    </div>

    </div>

    @include('layouts.footer')
@endsection
