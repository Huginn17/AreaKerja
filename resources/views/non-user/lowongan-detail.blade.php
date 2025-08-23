@extends('layouts.index')
@section('content')
    <div class="bg-gray-50 font-sans">
        <div class="max-w-7xl mx-auto py-8 px-4 md:px-8 grid md:grid-cols-3 gap-6">

            <!-- Kiri: Detail Lowongan -->
            <div class="md:col-span-2 space-y-6">
                <!-- Header Lowongan -->
                <div class="bg-white rounded-lg shadow p-6 space-y-4">
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('images/seven.png') }}" alt="Logo Perusahaan" class="w-12 h-12">
                        <div>
                            <h1 class="text-xl font-semibold">UI/UX Designer</h1>
                            <p class="text-gray-600">Seven Inc.</p>
                            <p class="text-gray-500 text-sm">Yogyakarta</p>
                        </div>
                    </div>
                    <p class="text-orange-600 font-medium">Rp. 7.000.000 - Rp. 15.000.000 perbulan</p>
                    <div class="flex gap-3">
                        <button class="bg-orange-600 hover:bg-orange-700 text-white px-4 py-2 rounded-lg">
                            Lamar Cepat
                        </button>
                        <button class="border border-gray-300 px-3 py-2 rounded-lg">
                            <img src="/assets/icon-save.svg" alt="Simpan" class="w-5 h-5">
                        </button>
                        <button class="border border-gray-300 px-3 py-2 rounded-lg">
                            <img src="/assets/icon-share.svg" alt="Bagikan" class="w-5 h-5">
                        </button>
                    </div>
                </div>

                <!-- Detail Lowongan -->
                <div class="bg-white rounded-lg shadow p-6 space-y-6">
                    <div>
                        <h2 class="font-semibold text-lg mb-2">Detail Lowongan</h2>
                        <div class="flex items-center gap-2 text-gray-700 mb-2">
                            <img src="/assets/icon-time.svg" alt="Jenis" class="w-5 h-5">
                            <span>Jenis Lowongan: <b>Full time</b></span>
                        </div>
                        <div class="flex items-center gap-2 text-gray-700">
                            <img src="/assets/icon-location.svg" alt="Lokasi" class="w-5 h-5">
                            <span>Lokasi: <b>Jakarta</b></span>
                        </div>
                    </div>

                    <!-- Deskripsi -->
                    <div>
                        <h2 class="font-semibold text-lg mb-2">Deskripsi Lowongan</h2>
                        <p class="text-gray-700 mb-4"><b>Requirements</b></p>
                        <ul class="list-disc pl-6 text-gray-600 space-y-2">
                            <li>Terbukti 2 tahun pengalaman sebagai Designer UX/UI.</li>
                            <li>Latar belakang terkait proyek desain grafis.</li>
                            <li>Kemampuan HTML5 & CSS3.</li>
                            <li>Pemahaman wireframe dan komunikasi tim.</li>
                            <li>Pengalaman desain responsif & interaktif.</li>
                        </ul>
                    </div>

                    <!-- Responsibilities -->
                    <div>
                        <p class="text-gray-700 mb-4"><b>Responsibilities</b></p>
                        <ul class="list-disc pl-6 text-gray-600 space-y-2">
                            <li>Kumpulkan dan periksa kebutuhan pengguna.</li>
                            <li>Konsultasi dengan tim/klien terkait produk.</li>
                            <li>Mengembangkan desain visual & prototipe.</li>
                            <li>Buat diagram, flow, papan cerita, wireframe.</li>
                            <li>Rancang UI interaktif (tab, widget, dll).</li>
                            <li>Buat mockup web & aplikasi mobile.</li>
                            <li>Presentasi desain ke stakeholder.</li>
                            <li>Uji desain & revisi dari feedback klien.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Kanan: Lowongan Lain -->
            <div class="space-y-4">
                <div class="flex justify-between items-center">
                    <h2 class="font-semibold">Lowongan Seven Inc Lainnya</h2>
                    <a href="#" class="text-orange-600 text-sm font-medium">Lihat semua</a>
                </div>

                <!-- Card Lowongan -->
                <div class="bg-white rounded-lg shadow p-4 space-y-4">
                    <!-- Item -->
                    <div class="flex items-start gap-3 border-b pb-4">
                        <img src="{{ asset('images/seven.png') }}" alt="Logo" class="w-10 h-10">
                        <div>
                            <h3 class="font-medium">Lead Graphic Designer - WFH</h3>
                            <p class="text-gray-500 text-sm">Yogyakarta</p>
                            <p class="text-sm text-gray-700">Rp. 4.500.000 - Rp. 7.000.000 per bulan</p>
                            <span class="text-xs text-gray-400">Aktif 2 jam lalu</span>
                        </div>
                    </div>

                    <!-- Duplikat item -->
                    <div class="flex items-start gap-3 border-b pb-4">
                        <img src="{{ asset('images/seven.png') }}" alt="Logo" class="w-10 h-10">
                        <div>
                            <h3 class="font-medium">Lead Graphic Designer - WFH</h3>
                            <p class="text-gray-500 text-sm">Yogyakarta</p>
                            <p class="text-sm text-gray-700">Rp. 4.500.000 - Rp. 7.000.000 per bulan</p>
                            <span class="text-xs text-gray-400">Aktif 2 jam lalu</span>
                        </div>
                    </div>

                    <div class="flex items-start gap-3 border-b pb-4">
                        <img src="{{ asset('images/seven.png') }}" alt="Logo" class="w-10 h-10">
                        <div>
                            <h3 class="font-medium">Lead Graphic Designer - WFH</h3>
                            <p class="text-gray-500 text-sm">Yogyakarta</p>
                            <p class="text-sm text-gray-700">Rp. 4.500.000 - Rp. 7.000.000 per bulan</p>
                            <span class="text-xs text-gray-400">Aktif 2 jam lalu</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>
    @include('layouts.footer')
@endsection
