@extends('layouts.index')
@section('content')
    <!-- Hero Section -->
    <div class="relative">
        @php
            $header = \App\Models\SocialLink::where('nama', 'header_rekrut_pelamar')->first();
        @endphp

        <img src="{{ $header && $header->link ? asset('storage/' . $header->link) : asset('images/ter.jpg') }}"
            alt="Header Image" class="w-screen h-[600px] object-cover">
        {{-- 
        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80"
            alt="Hero Image" class="w-screen h-96 object-cover"> --}}
        <div class="absolute inset-0 bg-black bg-opacity-40 flex flex-col justify-center px-10">
            <h1 class="text-white text-4xl font-bold">Rekrut Saya</h1>
            <p class="text-white text-lg mt-2">CV anda sudah terdaftar. Perusahaan impian anda akan segera merekrut anda.
            </p>
        </div>
    </div>


    <!-- Card List -->
    <div class="max-w-4xl mx-auto my-8 px-4 grid gap-4">
        @forelse ($tawaran as $t)
            <a href="{{ route('kandidat.detailTawaran', $t->lowongan_perusahaan_id) }}"
                class="block bg-white rounded-xl shadow-[0_3px_10px_rgba(0,0,0,0.08)] p-5 hover:shadow-lg transition transform hover:-translate-y-1">
                <div class="flex items-start justify-between">
                    <div class="flex items-start space-x-4">
                        <!-- Logo -->
                        @if ($t->lowonganPerusahaan->perusahaan && $t->lowonganPerusahaan->perusahaan->img_profile)
                            <img src="{{ asset('storage/' . $t->lowonganPerusahaan->perusahaan->img_profile) }}"
                                class="w-12 h-12 object-contain rounded" alt="logo">
                        @else
                            <img src="{{ asset('images/logo.png') }}" class="w-12 h-12 object-contain rounded"
                                alt="logo">
                        @endif

                        <!-- Detail -->
                        <div>
                            <p class="text-sm text-gray-500 font-medium">
                                {{ $t->lowonganPerusahaan->perusahaan->nama_perusahaan }}
                            </p>
                            <h2 class="text-lg font-semibold text-gray-800">
                                {{ $t->lowonganPerusahaan->nama }}
                            </h2>
                            <p class="text-sm text-gray-600">
                                {{ $t->lowonganPerusahaan->alamat }}
                            </p>
                            <span
                                class="inline-block mt-2 bg-gray-200 text-gray-800 text-sm px-3 py-1 rounded-full font-medium">
                                Rp. {{ number_format($t->lowonganPerusahaan->gaji_awal, 0, ',', '.') }} –
                                Rp. {{ number_format($t->lowonganPerusahaan->gaji_akhir, 0, ',', '.') }} / bulan
                            </span>
                        </div>
                    </div>

                    <!-- Waktu -->
                    <div class="text-right">
                        <p class="text-sm text-gray-400">
                            {{ $t->lowonganPerusahaan->created_at->diffForHumans() }}
                        </p>
                    </div>
                </div>
            </a>
        @empty
            <p class="text-center text-gray-500 mt-10">Belum ada tawaran yang masuk.</p>
        @endforelse
    </div>

    <!-- Button at the Bottom -->
    <div class="flex justify-center my-8">
        <button class="bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 px-6 rounded-md">
            Memuat
        </button>
    </div>

    @include('layouts.footer')
@endsection
