@extends('layouts.index')
@section('content')

    @php
        // fallback kalau $head kosong, ambil 1 dari $others
        $headline = $head ?? ($others->first() ?? null);
    @endphp

    <!-- Headline Artikel -->
    @if ($headline)
        <div class="mb-8 mt-20">
            <!-- Gambar -->
            <div class="w-full max-h-full overflow-hidden bg-white flex justify-center">
                <img src="{{ $headline->image ? asset('storage/' . $headline->image) : asset('images/cwe.png') }}"
                    alt="{{ $headline->title }}" class="h-full w-full object-contain">
            </div>

            <!-- Konten Headline -->
            <div class="bg-white border-b shadow-sm mt-6 p-4 sm:p-6 md:p-8">
                <!-- Label -->
                <div class="flex flex-wrap items-center gap-2 mb-4">
                    <span class="px-3 py-1 bg-gray-200 rounded-full text-xs sm:text-sm font-medium">Tips</span>
                    <span class="px-3 py-1 bg-orange-500 text-white rounded-full text-xs sm:text-sm font-medium">Top
                        News</span>
                </div>

                <!-- Judul -->
                <h1 class="text-xl sm:text-2xl md:text-4xl font-bold leading-snug mb-3">
                    <a href="{{ route('pelamar.tips-kerja.show', $headline->id) }}">
                        {{ $headline->title }}
                    </a>
                </h1>

                <!-- Meta + Share Button -->
                <div
                    class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 text-xs sm:text-sm text-gray-500 mb-4">
                    <div class="flex flex-wrap items-center gap-4">
                        <span class="text-orange-500">{{ $headline->penulis ?? 'Areakerja.com' }}</span>
                        <span>{{ $headline->created_at->translatedFormat('l, d F Y H:i') }}</span>
                    </div>

                    <!-- Tombol share -->
                    <div x-data="{ showMenu: false }" class="relative self-start sm:self-auto">
                        <button @click="showMenu = !showMenu"
                            class="text-2xl sm:text-3xl text-gray-500 hover:text-gray-700 p-1 rounded-lg">
                            <i class="ph ph-share-network ml-[300px]"></i>
                        </button>

                        <!-- Popup -->
                        <div x-show="showMenu" @click.outside="showMenu = false" x-transition x-cloak
                            class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-gray-200 z-50 py-2">

                            <!-- LinkedIn -->
                            <a href="{{ route('tips.share', ['platform' => 'linkedin', 'slug' => $headline->slug]) }}"
                                class="flex items-center gap-3 px-4 py-3 hover:bg-gray-100">
                                <svg width="24" height="24" viewBox="2 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19 3C19.5304 3 20.0391 3.21071 20.4142 3.58579C20.7893 3.96086 21 4.46957 21 5V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V5C3 4.46957 3.21071 3.96086 3.58579 3.58579C3.96086 3.21071 4.46957 3 5 3H19ZM18.5 18.5V13.2C18.5 12.3354 18.1565 11.5062 17.5452 10.8948C16.9338 10.2835 16.1046 9.94 15.24 9.94C14.39 9.94 13.4 10.46 12.92 11.24V10.13H10.13V18.5H12.92V13.57C12.92 12.8 13.54 12.17 14.31 12.17C14.6813 12.17 15.0374 12.3175 15.2999 12.5801C15.5625 12.8426 15.71 13.1987 15.71 13.57V18.5H18.5ZM6.88 8.56C7.32556 8.56 7.75288 8.383 8.06794 8.06794C8.383 7.75288 8.56 7.32556 8.56 6.88C8.56 5.95 7.81 5.19 6.88 5.19C6.43178 5.19 6.00193 5.36805 5.68499 5.68499C5.36805 6.00193 5.19 6.43178 5.19 6.88C5.19 7.81 5.95 8.56 6.88 8.56ZM8.27 18.5V10.13H5.5V18.5H8.27Z"
                                        fill="black" />
                                </svg>
                                <span class="text-sm font-bold">LinkedIn</span>
                            </a>

                            <!-- Gmail -->
                            <a href="{{ route('tips.share', ['platform' => 'email', 'slug' => $headline->slug]) }}"
                                class="flex items-center gap-3 px-4 py-3 hover:bg-gray-100">
                                <svg width="20" height="16" viewBox="0 0 20 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20 2C20 0.9 19.1 0 18 0H2C0.9 0 0 0.9 0 2V14C0 15.1 0.9 16 2 16H18C19.1 16 20 15.1 20 14V2ZM18 2L10 7L2 2H18ZM18 14H2V4L10 9L18 4V14Z"
                                        fill="black" />
                                </svg>
                                <span class="text-sm font-bold">Gmail</span>
                            </a>

                            <!-- Website -->
                            <a href="{{ route('tips.share', ['platform' => 'website', 'slug' => $headline->slug]) }}"
                                class="flex items-center gap-3 px-4 py-3 hover:bg-gray-100">
                                <svg width="18" height="10" viewBox="0 0 18 10" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13.5 0H10.8C10.305 0 9.9 0.45 9.9 1C9.9 1.55 10.305 2 10.8 2H13.5C14.985 2 16.2 3.35 16.2 5C16.2 6.65 14.985 8 13.5 8H10.8C10.305 8 9.9 8.45 9.9 9C9.9 9.55 10.305 10 10.8 10H13.5C15.984 10 18 7.76 18 5C18 2.24 15.984 0 13.5 0ZM5.4 5C5.4 5.55 5.805 6 6.3 6H11.7C12.195 6 12.6 5.55 12.6 5C12.6 4.45 12.195 4 11.7 4H6.3C5.805 4 5.4 4.45 5.4 5ZM7.2 8H4.5C3.015 8 1.8 6.65 1.8 5C1.8 3.35 3.015 2 4.5 2H7.2C7.695 2 8.1 1.55 8.1 1C8.1 0.45 7.695 0 7.2 0H4.5C2.016 0 0 2.24 0 5C0 7.76 2.016 10 4.5 10H7.2C7.695 10 8.1 9.55 8.1 9C8.1 8.45 7.695 8 7.2 8Z"
                                        fill="black" />
                                </svg>
                                <span class="text-sm font-bold">Website</span>
                            </a>

                            <!-- WhatsApp -->
                            <a href="{{ route('tips.share', ['platform' => 'whatsapp', 'slug' => $headline->slug]) }}"
                                class="flex items-center gap-3 px-4 py-3 hover:bg-gray-100">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M17 2.91005C16.0831 1.98416 14.991 1.25002 13.7875 0.750416C12.584 0.250812 11.2931 -0.00426317 9.99 5.38951e-05C4.53 5.38951e-05 0.0800002 4.45005 0.0800002 9.91005C0.0800002 11.6601 0.54 13.3601 1.4 14.8601L0 20.0001L5.25 18.6201C6.7 19.4101 8.33 19.8301 9.99 19.8301C15.45 19.8301 19.9 15.3801 19.9 9.92005C19.9 7.27005 18.87 4.78005 17 2.91005ZM9.99 18.1501C8.51 18.1501 7.06 17.7501 5.79 17.0001L5.49 16.8201L2.37 17.6401L3.2 14.6001L3 14.2901C2.17755 12.9771 1.74092 11.4593 1.74 9.91005C1.74 5.37005 5.44 1.67005 9.98 1.67005C12.18 1.67005 14.25 2.53005 15.8 4.09005C16.5676 4.85392 17.1759 5.7626 17.5896 6.76338C18.0033 7.76417 18.2142 8.83714 18.21 9.92005C18.23 14.4601 14.53 18.1501 9.99 18.1501ZM14.51 11.9901C14.26 11.8701 13.04 11.2701 12.82 11.1801C12.59 11.1001 12.43 11.0601 12.26 11.3001C12.09 11.5501 11.62 12.1101 11.48 12.2701C11.34 12.4401 11.19 12.4601 10.94 12.3301C10.69 12.2101 9.89 11.9401 8.95 11.1001C8.21 10.4401 7.72 9.63005 7.57 9.38005C7.43 9.13005 7.55 9.00005 7.68 8.87005C7.79 8.76005 7.93 8.58005 8.05 8.44005C8.17 8.30005 8.22 8.19005 8.3 8.03005C8.38 7.86005 8.34 7.72005 8.28 7.60005C8.22 7.48005 7.72 6.26005 7.52 5.76005C7.32 5.28005 7.11 5.34005 6.96 5.33005H6.48C6.31 5.33005 6.05 5.39005 5.82 5.64005C5.6 5.89005 4.96 6.49005 4.96 7.71005C4.96 8.93005 5.85 10.1101 5.97 10.2701C6.09 10.4401 7.72 12.9401 10.2 14.0101C10.79 14.2701 11.25 14.4201 11.61 14.5301C12.2 14.7201 12.74 14.6901 13.17 14.6301C13.65 14.5601 14.64 14.0301 14.84 13.4501C15.05 12.8701 15.05 12.3801 14.98 12.2701C14.91 12.1601 14.76 12.1101 14.51 11.9901Z"
                                        fill="black" />
                                </svg>
                                <span class="text-sm font-bold">WhatsApp</span>
                            </a>

                        </div>
                    </div>
                </div>

                <!-- Intro -->
                @if ($headline->intro)
                    <p class="max-w-full md:max-w-3xl text-gray-700 text-sm sm:text-base leading-relaxed">
                        {{ Str::limit($headline->intro, 250) }}
                    </p>
                @endif
            </div>
        </div>
    @endif


    <!-- Artikel Lainnya -->

    <div class="max-w-7xl mx-auto px-4 py-8 mt-20">
        <h2 class="text-xl sm:text-2xl font-semibold mb-6">Tips Kerja</h2>

        <!-- Grid Artikel -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 mb-4">
            @forelse ($others->when($headline, fn($q) => $q->where('id', '!=', $headline->id)) as $artikel)
                <div
                    class="bg-white rounded-xl shadow hover:shadow-xl transition duration-300 flex flex-col hover:scale-[1.03]">

                    <!-- Gambar -->
                    <div
                        class="w-full bg-gray-100 flex items-center justify-center overflow-hidden h-48 sm:h-56 md:h-64 lg:h-48">
                        <img src="{{ $artikel->image ? asset('storage/' . $artikel->image) : asset('images/cwe.png') }}"
                            alt="{{ $artikel->title }}" class="w-full h-full object-cover">
                    </div>

                    <!-- Konten -->
                    <div class="p-3 sm:p-4 flex-1 flex flex-col">
                        <!-- Meta -->
                        <div class="flex flex-wrap items-center text-xs sm:text-sm text-gray-500 mb-2 gap-2">
                            <span class="bg-orange-500 text-white px-2 py-0.5 rounded">Tips</span>
                            <span>{{ $artikel->created_at->translatedFormat('d F Y') }}</span>
                        </div>

                        <!-- Judul -->
                        <h3 class="text-sm sm:text-base font-semibold leading-tight mb-2 line-clamp-2 break-words">
                            <a href="{{ route('pelamar.tips-kerja.show', $artikel->id) }}" class="hover:text-orange-600">
                                {{ $artikel->title }}
                            </a>
                        </h3>

                        <!-- Intro -->
                        @if ($artikel->intro)
                            <p class="text-xs sm:text-sm text-gray-600 mb-3 line-clamp-3">
                                {{ $artikel->intro }}
                            </p>
                        @endif

                        <!-- Footer -->
                        <div
                            class="mt-auto flex flex-wrap items-center justify-between text-xs sm:text-sm text-gray-400 pt-2 border-t gap-2">
                            <span>👁 {{ $artikel->views ?? 0 }}</span>
                            <span>💬 {{ $artikel->comments_count ?? 0 }}</span>
                            <div x-data="{ showMenu: false }" class="relative">
                                <!-- Tombol titik tiga -->
                                <button @click="showMenu = !showMenu"
                                    class="text-sm text-gray-500 hover:text-gray-700 p-1 rounded-lg">
                                    <span class="cursor-pointer hover:text-orange-500">↗ Share</span>
                                </button>

                                <!-- Popup -->
                                <div x-show="showMenu" @click.outside="showMenu = false" x-transition x-cloak
                                    class="absolute right-0 mt-2 w-48 sm:w-52 bg-white rounded-xl shadow-lg border border-gray-200 z-50 py-2">

                                    <!-- LinkedIn -->
                                    <a href="{{ route('tips.share', ['platform' => 'linkedin', 'slug' => $artikel->slug]) }}"
                                        class="flex items-center gap-3 px-4 py-3 hover:bg-gray-100">
                                        <svg width="24" height="24" viewBox="2 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M19 3C19.5304 3 20.0391 3.21071 20.4142 3.58579C20.7893 3.96086 21 4.46957 21 5V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V5C3 4.46957 3.21071 3.96086 3.58579 3.58579C3.96086 3.21071 4.46957 3 5 3H19ZM18.5 18.5V13.2C18.5 12.3354 18.1565 11.5062 17.5452 10.8948C16.9338 10.2835 16.1046 9.94 15.24 9.94C14.39 9.94 13.4 10.46 12.92 11.24V10.13H10.13V18.5H12.92V13.57C12.92 12.8 13.54 12.17 14.31 12.17C14.6813 12.17 15.0374 12.3175 15.2999 12.5801C15.5625 12.8426 15.71 13.1987 15.71 13.57V18.5H18.5ZM6.88 8.56C7.32556 8.56 7.75288 8.383 8.06794 8.06794C8.383 7.75288 8.56 7.32556 8.56 6.88C8.56 5.95 7.81 5.19 6.88 5.19C6.43178 5.19 6.00193 5.36805 5.68499 5.68499C5.36805 6.00193 5.19 6.43178 5.19 6.88C5.19 7.81 5.95 8.56 6.88 8.56ZM8.27 18.5V10.13H5.5V18.5H8.27Z"
                                                fill="black" />
                                        </svg>
                                        <span class="text-sm font-bold">LinkedIn</span>
                                    </a>

                                    <!-- Gmail -->
                                    <a href="{{ route('tips.share', ['platform' => 'email', 'slug' => $artikel->slug]) }}"
                                        class="flex items-center gap-3 px-4 py-3 hover:bg-gray-100">
                                        <svg width="20" height="16" viewBox="0 0 20 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M20 2C20 0.9 19.1 0 18 0H2C0.9 0 0 0.9 0 2V14C0 15.1 0.9 16 2 16H18C19.1 16 20 15.1 20 14V2ZM18 2L10 7L2 2H18ZM18 14H2V4L10 9L18 4V14Z"
                                                fill="black" />
                                        </svg>
                                        <span class="text-sm font-bold">Gmail</span>
                                    </a>

                                    <!-- Website -->
                                    <a href="{{ route('tips.share', ['platform' => 'website', 'slug' => $artikel->slug]) }}"
                                        class="flex items-center gap-3 px-4 py-3 hover:bg-gray-100">
                                        <svg width="18" height="10" viewBox="0 0 18 10" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M13.5 0H10.8C10.305 0 9.9 0.45 9.9 1C9.9 1.55 10.305 2 10.8 2H13.5C14.985 2 16.2 3.35 16.2 5C16.2 6.65 14.985 8 13.5 8H10.8C10.305 8 9.9 8.45 9.9 9C9.9 9.55 10.305 10 10.8 10H13.5C15.984 10 18 7.76 18 5C18 2.24 15.984 0 13.5 0ZM5.4 5C5.4 5.55 5.805 6 6.3 6H11.7C12.195 6 12.6 5.55 12.6 5C12.6 4.45 12.195 4 11.7 4H6.3C5.805 4 5.4 4.45 5.4 5ZM7.2 8H4.5C3.015 8 1.8 6.65 1.8 5C1.8 3.35 3.015 2 4.5 2H7.2C7.695 2 8.1 1.55 8.1 1C8.1 0.45 7.695 0 7.2 0H4.5C2.016 0 0 2.24 0 5C0 7.76 2.016 10 4.5 10H7.2C7.695 10 8.1 9.55 8.1 9C8.1 8.45 7.695 8 7.2 8Z"
                                                fill="black" />
                                        </svg>
                                        <span class="text-sm font-bold">Website</span>
                                    </a>

                                    <!-- WhatsApp -->
                                    <a href="{{ route('tips.share', ['platform' => 'whatsapp', 'slug' => $artikel->slug]) }}"
                                        class="flex items-center gap-3 px-4 py-3 hover:bg-gray-100">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M17 2.91005C16.0831 1.98416 14.991 1.25002 13.7875 0.750416C12.584 0.250812 11.2931 -0.00426317 9.99 5.38951e-05C4.53 5.38951e-05 0.0800002 4.45005 0.0800002 9.91005C0.0800002 11.6601 0.54 13.3601 1.4 14.8601L0 20.0001L5.25 18.6201C6.7 19.4101 8.33 19.8301 9.99 19.8301C15.45 19.8301 19.9 15.3801 19.9 9.92005C19.9 7.27005 18.87 4.78005 17 2.91005ZM9.99 18.1501C8.51 18.1501 7.06 17.7501 5.79 17.0001L5.49 16.8201L2.37 17.6401L3.2 14.6001L3 14.2901C2.17755 12.9771 1.74092 11.4593 1.74 9.91005C1.74 5.37005 5.44 1.67005 9.98 1.67005C12.18 1.67005 14.25 2.53005 15.8 4.09005C16.5676 4.85392 17.1759 5.7626 17.5896 6.76338C18.0033 7.76417 18.2142 8.83714 18.21 9.92005C18.23 14.4601 14.53 18.1501 9.99 18.1501ZM14.51 11.9901C14.26 11.8701 13.04 11.2701 12.82 11.1801C12.59 11.1001 12.43 11.0601 12.26 11.3001C12.09 11.5501 11.62 12.1101 11.48 12.2701C11.34 12.4401 11.19 12.4601 10.94 12.3301C10.69 12.2101 9.89 11.9401 8.95 11.1001C8.21 10.4401 7.72 9.63005 7.57 9.38005C7.43 9.13005 7.55 9.00005 7.68 8.87005C7.79 8.76005 7.93 8.58005 8.05 8.44005C8.17 8.30005 8.22 8.19005 8.3 8.03005C8.38 7.86005 8.34 7.72005 8.28 7.60005C8.22 7.48005 7.72 6.26005 7.52 5.76005C7.32 5.28005 7.11 5.34005 6.96 5.33005H6.48C6.31 5.33005 6.05 5.39005 5.82 5.64005C5.6 5.89005 4.96 6.49005 4.96 7.71005C4.96 8.93005 5.85 10.1101 5.97 10.2701C6.09 10.4401 7.72 12.9401 10.2 14.0101C10.79 14.2701 11.25 14.4201 11.61 14.5301C12.2 14.7201 12.74 14.6901 13.17 14.6301C13.65 14.5601 14.64 14.0301 14.84 13.4501C15.05 12.8701 15.05 12.3801 14.98 12.2701C14.91 12.1601 14.76 12.1101 14.51 11.9901Z"
                                                fill="black" />
                                        </svg>
                                        <span class="text-sm font-bold">WhatsApp</span>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-1 sm:col-span-2 lg:col-span-3">
                    <div
                        class="bg-white shadow rounded-xl p-6 sm:p-10 flex flex-col items-center justify-center text-center border border-gray-200">

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

                    </div>
                </div>
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
