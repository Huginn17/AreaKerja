@extends('layouts.index')
@section('content')
    <div class="max-w-3xl mx-auto py-8 mt-16 px-4 sm:px-0">

        <!-- Gambar Header -->
        <div class="mb-6">
            <img src="{{ $artikel->image ? asset('storage/' . $artikel->image) : asset('images/cwe.png') }}"
                alt="{{ $artikel->title }}" class="w-full h-48 sm:h-64 md:h-72 object-cover rounded-lg shadow">
        </div>

        <!-- Label -->
        <div class="flex flex-wrap items-center gap-2 mb-3">
            <span class="px-4 sm:px-7 py-1 bg-orange-500 text-white rounded-full text-sm sm:text-base">
                Tips
            </span>
            <span class="px-3 py-1 border border-black rounded-full text-sm sm:text-base">
                Top News
            </span>
        </div>

        <!-- Judul -->
        <h2 class="text-xl sm:text-2xl font-serif font-bold leading-snug">
            {{ $artikel->title }}
        </h2>

        <!-- Footer -->
        <div class="flex flex-wrap items-center justify-between mt-4 gap-2">
            <span
                class="text-orange-500 font-semibold text-sm sm:text-base">{{ $artikel->penulis ?? 'Areakerja.com' }}</span>
            <div class="flex flex-wrap items-center gap-2 text-xs sm:text-sm text-gray-600">
                <span>{{ $artikel->created_at->translatedFormat('l, d F Y H:i') }}</span>
                <div x-data="{ showMenu: false }" class="relative">

                    <!-- Tombol titik tiga -->
                    <button @click="showMenu = !showMenu"
                        class="text-xl sm:text-2xl text-gray-500 hover:text-gray-700 p-1 rounded-lg">
                        <i class="ph ph-share-network"></i>
                    </button>

                    <!-- Popup -->
                    <div x-show="showMenu" @click.outside="showMenu = false" x-transition x-cloak
                        class="absolute right-0 mt-2 w-48 sm:w-52 bg-white rounded-xl shadow-lg border border-gray-200 z-50 py-2">

                        <!-- LinkedIn -->
                        <a href="{{ route('tips.share', ['platform' => 'linkedin', 'tips' => $artikel->slug]) }}"
                            class="flex items-center gap-2 sm:gap-3 px-4 py-2 hover:bg-gray-100 text-sm sm:text-base">
                            <svg width="24" height="24" viewBox="2 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M19 3C19.5304 3 20.0391 3.21071 20.4142 3.58579C20.7893 3.96086 21 4.46957 21 5V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V5C3 4.46957 3.21071 3.96086 3.58579 3.58579C3.96086 3.21071 4.46957 3 5 3H19ZM18.5 18.5V13.2C18.5 12.3354 18.1565 11.5062 17.5452 10.8948C16.9338 10.2835 16.1046 9.94 15.24 9.94C14.39 9.94 13.4 10.46 12.92 11.24V10.13H10.13V18.5H12.92V13.57C12.92 12.8 13.54 12.17 14.31 12.17C14.6813 12.17 15.0374 12.3175 15.2999 12.5801C15.5625 12.8426 15.71 13.1987 15.71 13.57V18.5H18.5ZM6.88 8.56C7.32556 8.56 7.75288 8.383 8.06794 8.06794C8.383 7.75288 8.56 7.32556 8.56 6.88C8.56 5.95 7.81 5.19 6.88 5.19C6.43178 5.19 6.00193 5.36805 5.68499 5.68499C5.36805 6.00193 5.19 6.43178 5.19 6.88C5.19 7.81 5.95 8.56 6.88 8.56ZM8.27 18.5V10.13H5.5V18.5H8.27Z"
                                    fill="black" />
                            </svg>
                            LinkedIn
                        </a>

                        <!-- Gmail -->
                        <a href="{{ route('tips.share', ['platform' => 'email', 'tips' => $artikel->slug]) }}"
                            class="flex items-center gap-2 sm:gap-3 px-4 py-2 hover:bg-gray-100 text-sm sm:text-base">
                            <svg width="20" height="16" viewBox="0 0 20 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M20 2C20 0.9 19.1 0 18 0H2C0.9 0 0 0.9 0 2V14C0 15.1 0.9 16 2 16H18C19.1 16 20 15.1 20 14V2ZM18 2L10 7L2 2H18ZM18 14H2V4L10 9L18 4V14Z"
                                    fill="black" />
                            </svg>
                            Gmail
                        </a>

                        <!-- Website -->
                        <a href="{{ route('tips.share', ['platform' => 'website', 'tips' => $artikel->slug]) }}"
                            class="flex items-center gap-2 sm:gap-3 px-4 py-2 hover:bg-gray-100 text-sm sm:text-base">
                            <svg width="18" height="10" viewBox="0 0 18 10" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13.5 0H10.8C10.305 0 9.9 0.45 9.9 1C9.9 1.55 10.305 2 10.8 2H13.5C14.985 2 16.2 3.35 16.2 5C16.2 6.65 14.985 8 13.5 8H10.8C10.305 8 9.9 8.45 9.9 9C9.9 9.55 10.305 10 10.8 10H13.5C15.984 10 18 7.76 18 5C18 2.24 15.984 0 13.5 0ZM5.4 5C5.4 5.55 5.805 6 6.3 6H11.7C12.195 6 12.6 5.55 12.6 5C12.6 4.45 12.195 4 11.7 4H6.3C5.805 4 5.4 4.45 5.4 5ZM7.2 8H4.5C3.015 8 1.8 6.65 1.8 5C1.8 3.35 3.015 2 4.5 2H7.2C7.695 2 8.1 1.55 8.1 1C8.1 0.45 7.695 0 7.2 0H4.5C2.016 0 0 2.24 0 5C0 7.76 2.016 10 4.5 10H7.2C7.695 10 8.1 9.55 8.1 9C8.1 8.45 7.695 8 7.2 8Z"
                                    fill="black" />
                            </svg>
                            Website
                        </a>

                        <!-- WhatsApp -->
                        <a href="{{ route('tips.share', ['platform' => 'whatsapp', 'tips' => $artikel->slug]) }}"
                            class="flex items-center gap-2 sm:gap-3 px-4 py-2 hover:bg-gray-100 text-sm sm:text-base">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M17 2.91005C16.0831 1.98416 14.991 1.25002 13.7875 0.750416C12.584 0.250812 11.2931 -0.00426317 9.99 5.38951e-05C4.53 5.38951e-05 0.0800002 4.45005 0.0800002 9.91005C0.0800002 11.6601 0.54 13.3601 1.4 14.8601L0 20.0001L5.25 18.6201C6.7 19.4101 8.33 19.8301 9.99 19.8301C15.45 19.8301 19.9 15.3801 19.9 9.92005C19.9 7.27005 18.87 4.78005 17 2.91005ZM9.99 18.1501C8.51 18.1501 7.06 17.7501 5.79 17.0001L5.49 16.8201L2.37 17.6401L3.2 14.6001L3 14.2901C2.17755 12.9771 1.74092 11.4593 1.74 9.91005C1.74 5.37005 5.44 1.67005 9.98 1.67005C12.18 1.67005 14.25 2.53005 15.8 4.09005C16.5676 4.85392 17.1759 5.7626 17.5896 6.76338C18.0033 7.76417 18.2142 8.83714 18.21 9.92005C18.23 14.4601 14.53 18.1501 9.99 18.1501ZM14.51 11.9901C14.26 11.8701 13.04 11.2701 12.82 11.1801C12.59 11.1001 12.43 11.0601 12.26 11.3001C12.09 11.5501 11.62 12.1101 11.48 12.2701C11.34 12.4401 11.19 12.4601 10.94 12.3301C10.69 12.2101 9.89 11.9401 8.95 11.1001C8.21 10.4401 7.72 9.63005 7.57 9.38005C7.43 9.13005 7.55 9.00005 7.68 8.87005C7.79 8.76005 7.93 8.58005 8.05 8.44005C8.17 8.30005 8.22 8.19005 8.3 8.03005C8.38 7.86005 8.34 7.72005 8.28 7.60005C8.22 7.48005 7.72 6.26005 7.52 5.76005C7.32 5.28005 7.11 5.34005 6.96 5.33005H6.48C6.31 5.33005 6.05 5.39005 5.82 5.64005C5.6 5.89005 4.96 6.49005 4.96 7.71005C4.96 8.93005 5.85 10.1101 5.97 10.2701C6.09 10.4401 7.72 12.9401 10.2 14.0101C10.79 14.2701 11.25 14.4201 11.61 14.5301C12.2 14.7201 12.74 14.6901 13.17 14.6301C13.65 14.5601 14.64 14.0301 14.84 13.4501C15.05 12.8701 15.05 12.3801 14.98 12.2701C14.91 12.1601 14.76 12.1101 14.51 11.9901Z"
                                    fill="black" />
                            </svg>
                            WhatsApp
                        </a>

                    </div>
                </div>
            </div>
        </div>

        <!-- Konten -->
        <div class="tinymce-content max-w-3xl mx-auto px-0 sm:px-0 py-6">
            {!! $artikel->content !!}
        </div>

    </div>


    <!-- Floating Button -->
    <a href="#top"
        class="fixed bottom-6 right-6 bg-orange-500 hover:bg-orange-600 text-white p-3 rounded-full shadow-lg">
        ↑
    </a>
    @include('layouts.footer')
@endsection
