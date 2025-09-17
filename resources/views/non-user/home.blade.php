@extends('layouts.index')

@section('content')
    <section class="bg-white py-8">
        <div class="max-w-5xl mx-auto px-5">
            {{-- Search Bar --}}
            <div
                class="flex flex-col md:flex-row py-3 border border-gray-500 items-center text-gray-700 font-semibold rounded-xl shadow-md">
                <img src="{{ asset('images/search.png') }}" alt="search" class="w-5 h-5 ml-7 mb-1 ">
                <input type="text" placeholder="Posisi lowongan, kata kunci, ..." class="flex-1 px-7 py-3  w-full">
                <svg width="2" height="35" viewBox="0 0 2 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 0V35" stroke="black" stroke-opacity="0.4" />
                </svg>
                <img src="{{ asset('images/maps.png') }}" alt="location" class="w-5 h-5 ml-7 mb-1">
                <input type="text" placeholder="Kota, provinsi, kode pos,ata ..." class="flex-1 px-7 py-3 w-full ">
                <button
                    class="bg-orange-500 px-4 py-3 text-white text-sm rounded-md mr-6 hover:bg-orange-600 font-medium transition duration-300">
                    Cari Lowongan Kerja
                </button>
            </div>

            <div class="mt-8">
                <p class="text-center text-lg">
                    <span class="text-orange-500 font-semibold">Lamar Pekerjaan Kamu</span>
                    <span class="font-semibold text-gray-500">- Dengan waktu dan langkah yang cepat</span>
                </p>
            </div>
        </div>
    </section>

    <!-- Kategori Populer -->
    <section class="max-w-5xl mx-auto px-4 py-8">
        <h4 class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">KATEGORI PEKERJAAN POPULER </h4>
        <div class="grid grid-cols-5 gap-4 font-semibold text-xl transition-duration-300 py-4">
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
                        ? 'border-l-4 border-red-600'
                        : ($isWfoWfh
                            ? 'border-l-4 border-blue-600'
                            : ($isGraduate
                                ? 'border-l-4 border-orange-500'
                                : ''));
                @endphp

                <span
                    class="h-14 w-full px-4 py-3 border border-gray-300 rounded text-sm bg-white hover:bg-gray-50 cursor-pointer flex items-center justify-center text-center shadow-sm {{ $textClass }} {{ $borderClass }}">
                    @if ($isFullTime)
                        <span class="mr-2">🔥</span>
                        <span>Full Time</span>
                    @elseif ($isWfoWfh)
                        <span class="mr-2">🌐</span>
                        <span>WFO/WFH</span>
                    @elseif ($isGraduate)
                        <span class="mr-2">🎓</span>
                        <span>Graduate</span>
                    @else
                        {{ $kategori }}
                    @endif
                </span>
            @endforeach
        </div>
    </section>

    <!-- Tabs -->
    <div class="flex justify-center border-b">
        <div class="max-w-5xl mx-auto flex gap-6 px-4 text">
            <a href="#" class="py-3 border-b-4 border-orange-600  text-gray-800 font-bold">
                Umpan Lowongan
            </a>
            <a href="#" class="py-3 text-gray-700 hover:text-gray-800 font-bold">
                Pencarian Baru-Baru Ini
            </a>
        </div>
    </div>

    <!-- Card Lowongan -->
    <h3 class="px-40 mt-8 text-gray-500 font-semibold dark:text-white">
        Lowongan berdasarkan pada aktivitas Anda di areakerja
    </h3>

    <section class="max-w-5xl mx-auto px-4 py-8 grid md:grid-cols-2 gap-6">
        @forelse ($lowongan as $item)
            <div class="bg-white border rounded-2xl shadow-sm p-5">
                @if ($item->urgent)
                    <span class="inline-block px-3 py-1 bg-red-100 text-red-600 text-xs rounded-lg mb-3">
                        Dibutuhkan segera
                    </span>
                @endif

                <h3 class="font-semibold text-lg">{{ $item->judul }}</h3>
                <p class="text-gray-500 text-sm mt-2">{{ $item->perusahaan }}</p>
                <p class="mt-1 text-gray-500 text-sm">{{ $item->lokasi }}</p>

                @if ($$item->gaji_min && $item->gaji_max)
                    <p class="mt-4 px-3 py-1 inline-block bg-gray-300 text-gray-700 text-sm font-semibold rounded-md">
                        Rp. {{ number_format($$item->gaji_min, 0, ',', '.') }} – Rp.
                        {{ number_format($$item->gaji_max, 0, ',', '.') }} per bulan
                    </p>
                @endif

                <div class="mt-4 flex items-center">
                    <svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg"
                        class="mr-2">
                        <path
                            d="M0.798085 16.0512L19.7364 8.15646L0.798085 0.261719L0.789062 6.40207L14.3229 8.15646L0.789062 9.91084L0.798085 16.0512Z"
                            fill="#007ABF" />
                    </svg>
                    <p class="text-gray-600 text-sm">
                        Lamar dengan cepat
                    </p>
                </div>

                <ul class="mt-4 text-sm text-gray-600 list-disc list-inside space-y-1">
                    <li>{{ $item->benefit ?? 'Benefit tidak tersedia' }}</li>
                </ul>

                <p class="mt-4 text-xs text-gray-400">Dipublish {{ $$item->created_at->diffForHumans() }}</p>
            </div>
        @empty
            <p class="col-span-2 text-center text-gray-500">Belum ada lowongan yang tersedia.</p>
        @endforelse
    </section>

    @include('layouts.footer')
@endsection
