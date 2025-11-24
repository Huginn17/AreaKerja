@extends('layouts.index-perusahaan')
@section('content')
    <div class="max-w-5xl mx-auto p-6 mt-16">
        <!-- Judul -->
        <h2 class="text-xl font-bold mb-1">Alamat</h2>
        <svg width="1041" height="2" viewBox="0 0 1041 2" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0.890625 1L1040.91 1" stroke="#FA6601" stroke-width="2" />
        </svg><br>


        <!-- Loop Card Alamat -->
        <div class="space-y-4">
            <!-- Card 1 -->
            <div class="space-y-6">
                <!-- Card -->
                <div class="border border-orange-500 rounded-md p-4">
                    <h3 class="text-lg font-semibold text-orange-500 mb-1">Rumah</h3>
                    <p class="text-sm text-orange-500 leading-snug mb-3">
                        Jl. Mangga dua No. 27 RT/RW 001/003, Kecamatan Mangga, Kota Jakarta Timur, Provinsi DKI Jakarta,
                        13463
                    </p>
                    <p class="text-sm text-orange-500 mt-1 mb-3">Blok 3B Kanan Sebelum Lapangan Bola</p>
                    <div class="flex justify-end">
                        <button class="text-white bg-orange-500 hover:bg-orange-600 text-sm px-4 py-2 rounded-lg">
                            Edit Alamat
                        </button>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="space-y-8">
                <!-- Card -->
                <div class="border border-orange-500 rounded-md p-4">
                    <h3 class="text-lg font-semibold text-orange-500 mb-1">Rumah</h3>
                    <p class="text-sm text-orange-500 leading-snug mb-3">
                        Jl. Mangga dua No. 27 RT/RW 001/003, Kecamatan Mangga, Kota Jakarta Timur, Provinsi DKI Jakarta,
                        13463
                    </p>
                    <p class="text-sm text-orange-500 mt-1 mb-3">Blok 3B Kanan Sebelum Lapangan Bola</p>
                    <div class="flex justify-end">
                        <button class="text-white bg-orange-500 hover:bg-orange-600 text-sm px-4 py-2 rounded-lg">
                            Edit Alamat
                        </button>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="space-y-6">
                <!-- Card -->
                <div class="border border-orange-500 rounded-md p-4">
                    <h3 class="text-lg font-semibold text-orange-500 mb-1">Rumah</h3>
                    <p class="text-sm text-orange-500 leading-snug mb-3">
                        Jl. Mangga dua No. 27 RT/RW 001/003, Kecamatan Mangga, Kota Jakarta Timur, Provinsi DKI Jakarta,
                        13463
                    </p>
                    <p class="text-sm text-orange-500 mt-1 mb-3">Blok 3B Kanan Sebelum Lapangan Bola</p>
                    <div class="flex justify-end">
                        <button class="text-white bg-orange-500 hover:bg-orange-600 text-sm px-4 py-2 rounded-lg">
                            Edit Alamat
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div><br>
    <br>
    <br>



    @include('layouts.footer')
@endsection
