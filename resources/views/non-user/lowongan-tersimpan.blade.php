@extends('layouts.index')
@section('content')
    <!-- Hero Section -->
    <div class="relative">
        @php
            $header = \App\Models\SocialLink::where('nama', 'header_lowongan_tersimpan')->first();
        @endphp

        <img src="{{ $header && $header->link ? asset('storage/' . $header->link) : asset('images/tersimpan.jpg') }}"
            alt="Header Image" class="w-screen h-[600px] object-cover">
        {{-- 
        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80"
            alt="Hero Image" class="w-screen h-96 object-cover"> --}}
        <div class="absolute inset-0 bg-black bg-opacity-40 flex flex-col justify-center px-10">
            <h1 class="text-white text-4xl font-bold">Lowongan Tersimpan</h1>
            <p class="text-white text-lg mt-2">Lowongan anda yang sudah tersimpan <br> disistem areakerja.com</p>
        </div>
    </div>

    <!-- Card List -->
    <div class="max-w-6xl mx-auto px-4 mt-10 space-y-4 mb-10">
        @forelse($simpanlowongan as $item)
            @php $lowongan = $item->lowongan; @endphp
            <a href="{{ route('detail.lowongan.non.user', $lowongan->id) }}">
                <div class="bg-white shadow rounded-md p-4 flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <img src="{{ asset('/images/seven.png') }}" alt="Logo" class="w-14 h-14 object-contain">
                        <div>
                            <h5 class="text-gray-500 text-sm">{{ $lowongan->perusahaan->nama_perusahaan ?? 'Perusahaan' }}
                            </h5>
                            <h2 class="font-semibold text-gray-800">{{ $lowongan->nama }}</h2>
                            <p class="text-gray-500 text-sm">{{ $lowongan->alamat }}</p>
                            <p class="text-gray-700 text-sm bg-gray-100 px-2 py-1 inline-block rounded">
                                Rp. {{ number_format($lowongan->gaji_awal, 0, ',', '.') }} –
                                Rp. {{ number_format($lowongan->gaji_akhir, 0, ',', '.') }} per bulan
                            </p>
                        </div>
                    </div>
                    <p class="text-gray-400 text-sm">Aktif {{ $lowongan->created_at->diffForHumans() }}</p>
                </div>
            </a>
        @empty
            <p class="text-center text-gray-500">Belum ada lowongan yang tersimpan.</p>
        @endforelse
    </div>

    <!-- Button -->
    @if ($simpanlowongan->count() > 5)
        <div class="flex justify-center mb-10">
            <button class="bg-orange-500 text-white px-8 py-2 rounded-md hover:bg-orange-600 transition">
                Memuat
            </button>
        </div>
    @endif

    @include('layouts.footer')
@endsection
