@extends('layouts.index-perusahaan')
@section('content')
    <!-- Hero Section -->
    <section class="relative mb-16">
        @php
            $header = \App\Models\SocialLink::where('nama', 'header_beranda')->first();
        @endphp

        <img src="{{ $header && $header->link ? asset('storage/' . $header->link) : asset('images/ntap.png') }}"
            alt="Header Image" class="w-full h-[600px] object-cover">
        {{-- <img src="{{ asset('images/ntap.png') }}" alt="hero" class="w-full h-[350px] object-cover"> --}}
        <div class="absolute inset-0 bg-black bg-opacity-40"></div>
        <div class="absolute bottom-52 left-20 text-white">
            <h1 class="text-3xl md:text-4xl font-semibold max-w-2xl">
                Selamat Datang
            </h1>
            <p class="text-sm mt-4">Sambutlah hari ini dengan semangat, dan <br>
                manfaatkan sepenuhnya fasilitas yang kami <br>
                berikan demi kenyamanan anda</p>
        </div>
    </section>

    <!-- Section Cards -->
    <div class="bg-white py-16 px-6">
        <div class="max-w-6xl mx-auto space-y-12">

            <!-- Card 1 -->
            <div class="flex flex-col md:flex-row items-center md:items-start gap-6">
                <!-- Text -->
                <div class="md:w-2/3">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2 text-right">Request Data Pekerja</h3>
                    <p class="text-gray-800 text-sm font-medium leading-relaxed mb-6 text-right">
                        Dapatkan akses untuk bisa melihat statistik para pekerja seperti list <br>
                        pekerja yang bermasalah, list pekerja yang terdaftar, hingga <br> membuat laporan harian pekerja.
                    </p>
                    <a href="{{ route('perusahaan.data.pekerja') }}"
                        class="block text-orange-500 text-sm font-medium hover:underline text-right">
                        < Lebih Detail</a>
                </div>
                <!-- Image -->
                <div class="md:w-1/3">
                    <img src="{{ asset('images/nulis.jpg') }}" alt="request data"
                        class="rounded-lg shadow w-full h-44 object-cover">
                </div>
            </div>

            <!-- Card 2 -->
            <div class="flex flex-col md:flex-row-reverse items-center md:items-start gap-6">
                <!-- Text -->
                <div class="md:w-2/3">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Diskon Fitur Area Kerja</h3>
                    <p class="text-gray-800 font-medium text-sm leading-relaxed mb-6">
                        Dengan berlangganan, Anda mendapatkan diskon fitur serta <br>
                        berbagai manfaat tambahan dan informasi terbaru setiap saat.
                    </p>
                    <button id="btnDiskon" class="text-orange-500 text-sm font-medium hover:underline"> Lebih Detail >
                    </button>
                </div>
                <!-- Image -->
                <div class="md:w-1/3">
                    <img src="{{ asset('images/nulis.jpg') }}" alt="diskon fitur"
                        class="rounded-lg shadow w-full h-44 object-cover">
                </div>
            </div>

        </div>
    </div>

    <script>
        document.getElementById('btnDiskon').addEventListener('click', function() {

            fetch("{{ route('diskon.fitur') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({}) // WAJIB ADA
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        window.location.href = data.redirect_url;
                    } else {
                        alert(data.message || "Gagal memproses permintaan.");
                    }
                })
                .catch(err => {
                    console.error(err);
                    alert("Terjadi kesalahan. Coba lagi.");
                });

        });
    </script>
     @include('layouts.footer')
@endsection
