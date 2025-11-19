@extends('layouts.index')
@section('content')

    @php
        // fallback kalau $head kosong, ambil 1 dari $others
        $headline = $head ?? ($others->first() ?? null);
    @endphp

    <!-- Headline Artikel -->
    @if ($headline)
        <div class="mb-8">
            <!-- Gambar -->
            <div class="w-full max-h-full overflow-hidden bg-white flex justify-center">
                <img src="{{ $headline->image ? asset('storage/' . $headline->image) : asset('images/cwe.png') }}"
                    alt="{{ $headline->title }}" class="h-full w-full object-contain">
            </div>



            <!-- Konten Headline -->
            <div class="bg-white border-b shadow-sm mt-6 p-6 md:p-8">
                <!-- Label -->
                <div class="flex items-center gap-2 mb-4">
                    <span class="px-4 py-1 bg-gray-200 rounded-full text-xs md:text-sm font-medium">
                        Tips
                    </span>
                    <span class="px-3 py-1 bg-orange-500 text-white rounded-full text-xs md:text-sm font-medium">
                        Top News
                    </span>
                </div>

                <!-- Judul -->
                <h1 class="text-2xl md:text-4xl font-bold leading-snug mb-3">
                    <a href="{{ route('pelamar.tips-kerja.show', $headline->id) }}">
                        {{ $headline->title }}
                    </a>
                </h1>

                <!-- Meta -->
                <div class="flex items-center gap-6 text-xs md:text-sm text-gray-500 mb-4">
                    <span>{{ $headline->penulis ?? 'Areakerja.com' }}</span>
                    <span>{{ $headline->created_at->translatedFormat('l, d F Y H:i') }}</span>
                </div>

                <!-- Intro -->
                @if ($headline->intro)
                    <p class="max-w-3xl text-gray-700 text-sm md:text-base leading-relaxed">
                        {{ Str::limit($headline->intro, 250) }}
                    </p>
                @endif
            </div>
        </div>
    @endif

    <!-- Artikel Lainnya -->
    <div class="max-w-7xl mx-auto px-4 py-8">
        <h2 class="text-xl font-semibold mb-6">Tips Kerja</h2>

        <!-- Grid Artikel -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-4">
            @forelse ($others->when($headline, fn($q) => $q->where('id', '!=', $headline->id)) as $artikel)
                <div
                    class="bg-white rounded-xl shadow hover:shadow-xl transition duration-300 overflow-hidden flex flex-col hover:scale-[1.03]">

                    <!-- Gambar -->
                    <div class="w-full bg-gray-100 flex items-center justify-center overflow-hidden">
                        <img src="{{ $artikel->image ? asset('storage/' . $artikel->image) : asset('images/cwe.png') }}"
                            alt="{{ $artikel->title }}" class="w-auto h-full object-contain">
                    </div>

                    <!-- Konten -->
                    <div class="p-4 flex-1 flex flex-col">
                        <!-- Meta -->
                        <div class="flex items-center text-xs text-gray-500 mb-2">
                            <span class="bg-orange-500 text-white px-2 py-0.5 rounded mr-2">
                                Tips
                            </span>
                            <span>{{ $artikel->created_at->translatedFormat('d F Y') }}</span>
                        </div>

                        <!-- Judul -->
                        <h3 class="text-sm font-semibold leading-tight mb-2 line-clamp-2 break-words">
                            <a href="{{ route('pelamar.tips-kerja.show', $artikel->id) }}" class="hover:text-orange-600">
                                {{ $artikel->title }}
                            </a>
                        </h3>

                        <!-- Intro -->
                        @if ($artikel->intro)
                            <p class="text-xs text-gray-600 mb-3 line-clamp-3">
                                {{ $artikel->intro }}
                            </p>
                        @endif

                        <!-- Footer -->
                        <div class="mt-auto flex items-center justify-between text-xs text-gray-400 pt-2 border-t">
                            <span>👁 {{ $artikel->views ?? 0 }}</span>
                            <span>💬 {{ $artikel->comments_count ?? 0 }}</span>
                            <span class="cursor-pointer hover:text-orange-500">↗ Share</span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-1 sm:col-span-2 lg:col-span-3">
                    <div
                        class="bg-white shadow rounded-xl p-10 flex flex-col items-center justify-center text-center border border-gray-200">

                        <!-- Icon -->
                        <div
                            class="w-20 h-20 flex items-center justify-center bg-orange-100 text-orange-500 rounded-full mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M12 9v3m0 4h.01M4.93 4.93l14.14 14.14M9.17 6.17C10.05 5.52 11 5 12 5c3.31 0 6 2.69 6 6 0 1-.25 1.94-.7 2.75M6.17 9.17C5.52 10.05 5 11 5 12c0 3.31 2.69 6 6 6 1.03 0 2-.26 2.83-.72" />
                            </svg>
                        </div>

                        <!-- Title -->
                        <h3 class="text-lg font-semibold text-gray-700">
                            Belum Ada Artikel
                        </h3>

                        <!-- Description -->
                        <p class="text-gray-500 text-sm mt-2 max-w-md">
                            Kami belum menemukan artikel untuk Tips Kerja. Silakan cek kembali nanti ya!
                        </p>

                        {{-- <!-- Button (opsional) -->
                        <a href="{{ route('pelamar.tips-kerja.index') }}"
                            class="mt-5 inline-block bg-orange-500 text-white px-5 py-2 rounded-lg shadow hover:bg-orange-600 transition">
                            Kembali ke Tips Kerja
                        </a> --}}
                    </div>
                </div>
                {{-- @endempty --}}
            @endforelse
        </div>
    </div>

    <a href="#top"
        class="fixed bottom-6 right-6 bg-orange-500 text-white px-3 py-3 rounded-full shadow-lg hover:bg-orange-600 transition">
        <svg width="24" height="23" viewBox="0 0 31 28" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_231_4417)">
                <path
                    d="M26.6695 18.25L15.532 7.31684L4.3945 18.25L0.973172 14.8841L15.532 0.561196L30.0908 14.8841L26.6695 18.25Z"
                    fill="white" />
            </g>
            <defs>
                <clipPath id="clip0_231_4417">
                    <rect width="29.1176" height="26.9608" fill="white"
                        transform="translate(30.0586 27.2148) rotate(-180)" />
                </clipPath>
            </defs>
        </svg>

    </a>
    @include('layouts.footer')
@endsection
