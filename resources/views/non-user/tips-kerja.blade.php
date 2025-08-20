@extends('layouts.index')
@section('content')
    <div class="max-w-3xl mx-auto py-8">

        <!-- Gambar Header -->
        <div class="mb-6">
            <img src="{{ asset('images/cwe.png') }}" alt="Artikel Header" class="w-full h-72 object-cover rounded-lg shadow">
        </div>

        <div class="max-w-3xl mx-auto p-4">
            <!-- Label Tips & Top News -->
            <div class="flex items-center gap-2 mb-3">
                <span class="px-3 py-1 hover:bg-gray-100 border border-black rounded-full text-sm">
                    Tips
                </span>
                <span class="px-3 py-1 bg-orange-500 hover:bg-orange-600 text-white rounded-full text-sm">
                    Top News
                </span>
            </div>

            <!-- Judul -->
            <h2 class="text-2xl font-serif font-bold leading-snug">
                4 Rekomendasi Kerja Freelance Menguntungkan Yang Patut Kamu Coba
            </h2>

            <!-- Footer -->
            <div class="flex items-center justify-between mt-4">
                <span class="text-orange-500 hover:text-orange-600 font-semibold">Areakerja.com</span>

                <div class="flex items-center gap-4 text-sm text-gray-600">
                    <button class="bg-orange-500 hover:bg-orange-600 text-white p-2 rounded-full">
                        ➔
                    </button>
                    <span>Kamis, 27 Oktober 13:00 WIB</span>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 py-8">

            <!-- Header Section -->
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-bold">Tips Kerja</h2>
                <a href="#" class="text-sm text-orange-500 hover:text-orange-600 font-medium hover:underline">
                    Selengkapnya →
                </a>
            </div>

            <!-- Grid Artikel -->
            {{-- <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($artikels as $artikel)
                    <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">
                        <!-- Gambar -->
                        <img src="{{ asset('storage/' . $artikel->thumbnail) }}" alt="{{ $artikel->judul }}"
                            class="w-full h-48 object-cover">

                        <!-- Konten -->
                        <div class="p-4">
                            <!-- Meta info -->
                            <div class="flex items-center text-xs text-gray-500 mb-2">
                                <span class="bg-orange-500 text-white px-2 py-0.5 rounded mr-2">
                                    {{ $artikel->kategori->nama }}
                                </span>
                                <span>{{ $artikel->created_at->translatedFormat('d F Y') }}</span>
                            </div>

                            <!-- Judul -->
                            <h3 class="text-sm font-semibold leading-tight mb-2 line-clamp-2">
                                <a href="{{ route('artikel.show', $artikel->id) }}" class="hover:text-orange-600">
                                    {{ $artikel->judul }}
                                </a>
                            </h3>

                            <!-- Deskripsi -->
                            <p class="text-xs text-gray-600 mb-3 line-clamp-3">
                                {{ $artikel->excerpt }}
                            </p>

                            <!-- Footer info -->
                            <div class="flex items-center justify-between text-xs text-gray-400">
                                <span>👁 {{ $artikel->views }}</span>
                                <span>💬 {{ $artikel->comments_count }}</span>
                                <span>↗ Share</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div> --}}




            <!-- Card Artikel -->
            <div class="max-w-sm bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition hover:scale-105">

                <!-- Gambar Artikel -->
                <img class="w-full h-48 object-cover"
                    src="{{ asset('images/cwe.png') }}"
                    alt="Freelance">
 
                <!-- Konten -->
                <div class="p-4">
                    <!-- Info sumber & tanggal -->
                    <div class="flex items-center text-gray-500 text-sm mb-2">
                        <img src="{{ asset('images/logoarea.png') }}" alt="logo"
                            class="w-4 h-4 mr-1">
                        <span class="mr-2">Areakerja.com</span>
                        <span>• 14 Oktober 2024</span>
                    </div>

                    <!-- Judul -->
                    <h2 class="font-semibold text-lg leading-snug mb-1">
                        4 Rekomendasi Kerja Freelance Menguntungkan Yang Patut Kamu Coba
                    </h2>

                    <!-- Ringkasan -->
                    <p class="text-gray-600 text-sm mb-3">
                        Banyak jenis pekerjaan freelance, tentu hanya ada beberapa yang memiliki prospek dan menjanjikan di
                        masa mendatang. Ini tentu akan jadi pertimbangan kamu sebagai calon pekerja lepas.
                    </p>

                    <!-- Footer kategori -->
                    <div class="flex justify-between items-center text-sm">
                        <span class="bg-red-100 hover:bg-red-200 text-red-500 px-2 py-1 rounded-full font-medium">Tips</span>
                        <span class="text-gray-400">20 menit</span>
                    </div>
                </div>
            </div>

        </div>

        <!-- Floating Button -->
        <a href="#top"
            class="fixed bottom-6 right-6 bg-orange-500 hover:bg-orange-600 text-white p-3 rounded-full shadow-lg">
            ↑
        </a>
    </div>
        @include('layouts.footer')
    @endsection
