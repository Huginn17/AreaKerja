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
                    alt="{{ $headline->title }}" class="h-full w-auto object-contain">
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
                    {{ $headline->title }}
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
                <p class="text-gray-500">Belum ada artikel lain.</p>
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
