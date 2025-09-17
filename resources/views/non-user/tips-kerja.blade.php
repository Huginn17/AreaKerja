@extends('layouts.index')
@section('content')
    <!-- Gambar Header -->
    <div class="mb-6 w-full h-96 overflow-hidden">
        <img src="{{ asset('images/cwe.png') }}" alt="Artikel Header" class="w-full h-full object-cover object-center shadow">
    </div>
    <div class="max-w-5xl mx-auto py-8">
        <div class="max-w-5xl mx-auto p-4">
            <!-- Label Tips & Top News -->
            <div class="flex items-center gap-2 mb-3">
                <span class="px-6 py-1 hover:bg-gray-100 border border-black rounded-full text-sm font-medium">
                    Tips
                </span>
                <span class="px-3 py-1 bg-orange-500 hover:bg-orange-600 text-white rounded-full text-sm">
                    Top News
                </span>
            </div>

            <!-- Judul -->
            <h2 class="text-2xl font-serif font-semibold leading-snug">
                4 Rekomendasi Kerja Freelance Menguntungkan Yang Patut Kamu Coba
            </h2>
            <div class="flex justify-end gap-5 mt-6">
                <button class="bg-orange-500 hover:bg-orange-600 text-white px-5 py-1 rounded-full">
                    ➔
                </button>
                <svg width="23" height="24" viewBox="0 0 23 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M19.5529 23.8983C18.6492 23.8983 17.8797 23.601 17.2445 23.0064C16.6093 22.4134 16.2917 21.6925 16.2917 20.8437C16.2917 20.6808 16.3069 20.5126 16.3373 20.3391C16.3669 20.1648 16.4116 20.0011 16.4716 19.8479L6.38033 14.274C6.06142 14.6112 5.69037 14.8739 5.26719 15.0621C4.84487 15.251 4.39214 15.3455 3.909 15.3455C3.00354 15.3455 2.23451 15.049 1.6019 14.456C0.967562 13.8622 0.650391 13.1413 0.650391 12.2934C0.650391 11.4463 0.967562 10.725 1.6019 10.1295C2.23364 9.5341 3.00267 9.23638 3.909 9.23638C4.39214 9.23638 4.84487 9.33087 5.26719 9.51985C5.69037 9.70801 6.06142 9.9707 6.38033 10.3079L16.4716 4.73395C16.4116 4.58081 16.3669 4.41709 16.3373 4.24278C16.3069 4.06928 16.2917 3.90107 16.2917 3.73816C16.2917 2.8894 16.6084 2.16852 17.2419 1.57553C17.8745 0.980905 18.6431 0.683594 19.5477 0.683594C20.4514 0.683594 21.2209 0.980498 21.8561 1.57431C22.4913 2.1673 22.8089 2.88777 22.8089 3.73572C22.8089 4.58285 22.4918 5.30414 21.8574 5.89957C21.2248 6.49501 20.4558 6.79273 19.5503 6.79273C19.0672 6.79273 18.6144 6.69824 18.1921 6.50927C17.7689 6.3211 17.3979 6.05841 17.079 5.72119L6.98773 11.2952C7.04769 11.4483 7.09244 11.6112 7.12199 11.7839C7.1524 11.9574 7.16761 12.1248 7.16761 12.2861C7.16761 12.4473 7.1524 12.6164 7.12199 12.7931C7.09244 12.9691 7.04769 13.1336 6.98773 13.2867L17.079 18.8607C17.3979 18.5235 17.7689 18.2608 18.1921 18.0726C18.6144 17.8837 19.0672 17.7892 19.5503 17.7892C20.4558 17.7892 21.2248 18.0861 21.8574 18.6799C22.4918 19.2729 22.8089 19.9933 22.8089 20.8413C22.8089 21.6884 22.4926 22.4097 21.86 23.0051C21.2265 23.6006 20.4575 23.8983 19.5529 23.8983ZM19.5503 5.5709C20.0865 5.5709 20.5466 5.39129 20.9307 5.03208C21.3139 4.67204 21.5055 4.24074 21.5055 3.73816C21.5055 3.23558 21.3139 2.80428 20.9307 2.44425C20.5466 2.08503 20.0865 1.90542 19.5503 1.90542C19.0142 1.90542 18.5541 2.08503 18.17 2.44425C17.7868 2.80428 17.5952 3.23558 17.5952 3.73816C17.5952 4.24074 17.7868 4.67204 18.17 5.03208C18.5541 5.39129 19.0142 5.5709 19.5503 5.5709ZM3.909 14.1237C4.44515 14.1237 4.90526 13.9441 5.28935 13.5849C5.67256 13.2248 5.86416 12.7935 5.86416 12.291C5.86416 11.7884 5.67256 11.3571 5.28935 10.997C4.90526 10.6378 4.44515 10.4582 3.909 10.4582C3.37285 10.4582 2.91273 10.6378 2.52865 10.997C2.14544 11.3571 1.95383 11.7884 1.95383 12.291C1.95383 12.7935 2.14544 13.2248 2.52865 13.5849C2.91273 13.9441 3.37285 14.1237 3.909 14.1237ZM19.5503 22.6765C20.0865 22.6765 20.5466 22.4969 20.9307 22.1377C21.3139 21.7776 21.5055 21.3463 21.5055 20.8437C21.5055 20.3412 21.3139 19.9099 20.9307 19.5498C20.5466 19.1906 20.0865 19.011 19.5503 19.011C19.0142 19.011 18.5541 19.1906 18.17 19.5498C17.7868 19.9099 17.5952 20.3412 17.5952 20.8437C17.5952 21.3463 17.7868 21.7776 18.17 22.1377C18.5541 22.4969 19.0142 22.6765 19.5503 22.6765Z"
                        fill="black" />
                </svg>
            </div>
            <!-- Footer -->
            <div class="flex items-center justify-between mt-4">
                <span class="text-orange-500 hover:text-orange-600 font-semibold">Areakerja.com</span>

                <div class="flex items-center gap-4 text-sm text-gray-600">

                    <span>Kamis, 27 Oktober 13:00 WIB</span>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 py-8">

            <!-- Header Section -->
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-semibold">Tips Kerja</h2>
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

           <div class="flex justify-between mb-8">
                <!-- Card Artikel -->
                <div
                    class="max-w-xs bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition hover:scale-105">

                    <!-- Gambar Artikel -->
                    <img class="w-full h-48 object-cover" src="{{ asset('images/cwe.png') }}" alt="Freelance">

                    <!-- Konten -->
                    <div class="p-4">
                        <!-- Info sumber & tanggal -->
                        <div class="flex items-center text-gray-500 text-sm mb-2">
                            <img src="{{ asset('images/logoarea.png') }}" alt="logo" class="w-4 h-4 mr-1">
                            <span class="mr-2">Areakerja.com</span>
                            <span>• 14 Oktober 2024</span>
                        </div>

                        <!-- Judul -->
                        <h2 class="font-semibold text-lg leading-snug mb-1">
                            4 Rekomendasi Kerja Freelance Menguntungkan Yang Patut Kamu Coba
                        </h2>

                        <!-- Ringkasan -->
                        <p class="text-gray-600 text-sm mb-3">
                            Banyak jenis pekerjaan freelance, tentu hanya ada beberapa yang memiliki prospek dan menjanjikan
                            di
                            masa mendatang. Ini tentu akan jadi pertimbangan kamu sebagai calon pekerja lepas.
                        </p>

                        <!-- Footer kategori -->
                        <div class="flex justify-between items-center text-sm">
                            <span
                                class="bg-red-100 hover:bg-red-200 text-red-500 px-2 py-1 rounded-full font-medium">Tips</span>
                            <span class="text-gray-400">20 menit</span>
                        </div>
                    </div>
                </div>
                <div
                    class="max-w-xs bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition hover:scale-105">

                    <!-- Gambar Artikel -->
                    <img class="w-full h-48 object-cover" src="{{ asset('images/cwe.png') }}" alt="Freelance">

                    <!-- Konten -->
                    <div class="p-4">
                        <!-- Info sumber & tanggal -->
                        <div class="flex items-center text-gray-500 text-sm mb-2">
                            <img src="{{ asset('images/logoarea.png') }}" alt="logo" class="w-4 h-4 mr-1">
                            <span class="mr-2">Areakerja.com</span>
                            <span>• 14 Oktober 2024</span>
                        </div>

                        <!-- Judul -->
                        <h2 class="font-semibold text-lg leading-snug mb-1">
                            4 Rekomendasi Kerja Freelance Menguntungkan Yang Patut Kamu Coba
                        </h2>

                        <!-- Ringkasan -->
                        <p class="text-gray-600 text-sm mb-3">
                            Banyak jenis pekerjaan freelance, tentu hanya ada beberapa yang memiliki prospek dan menjanjikan
                            di
                            masa mendatang. Ini tentu akan jadi pertimbangan kamu sebagai calon pekerja lepas.
                        </p>

                        <!-- Footer kategori -->
                        <div class="flex justify-between items-center text-sm">
                            <span
                                class="bg-red-100 hover:bg-red-200 text-red-500 px-2 py-1 rounded-full font-medium">Tips</span>
                            <span class="text-gray-400">20 menit</span>
                        </div>
                    </div>
                </div>
                <div
                    class="max-w-xs bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition hover:scale-105">

                    <!-- Gambar Artikel -->
                    <img class="w-full h-48 object-cover" src="{{ asset('images/cwe.png') }}" alt="Freelance">

                    <!-- Konten -->
                    <div class="p-4">
                        <!-- Info sumber & tanggal -->
                        <div class="flex items-center text-gray-500 text-sm mb-2">
                            <img src="{{ asset('images/logoarea.png') }}" alt="logo" class="w-4 h-4 mr-1">
                            <span class="mr-2">Areakerja.com</span>
                            <span>• 14 Oktober 2024</span>
                        </div>

                        <!-- Judul -->
                        <h2 class="font-semibold text-lg leading-snug mb-1">
                            4 Rekomendasi Kerja Freelance Menguntungkan Yang Patut Kamu Coba
                        </h2>

                        <!-- Ringkasan -->
                        <p class="text-gray-600 text-sm mb-3">
                            Banyak jenis pekerjaan freelance, tentu hanya ada beberapa yang memiliki prospek dan menjanjikan
                            di
                            masa mendatang. Ini tentu akan jadi pertimbangan kamu sebagai calon pekerja lepas.
                        </p>

                        <!-- Footer kategori -->
                        <div class="flex justify-between items-center text-sm">
                            <span
                                class="bg-red-100 hover:bg-red-200 text-red-500 px-2 py-1 rounded-full font-medium">Tips</span>
                            <span class="text-gray-400">20 menit</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-between">
                <!-- Card Artikel -->
                <div
                    class="max-w-xs bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition hover:scale-105">

                    <!-- Gambar Artikel -->
                    <img class="w-full h-48 object-cover" src="{{ asset('images/cwe.png') }}" alt="Freelance">

                    <!-- Konten -->
                    <div class="p-4">
                        <!-- Info sumber & tanggal -->
                        <div class="flex items-center text-gray-500 text-sm mb-2">
                            <img src="{{ asset('images/logoarea.png') }}" alt="logo" class="w-4 h-4 mr-1">
                            <span class="mr-2">Areakerja.com</span>
                            <span>• 14 Oktober 2024</span>
                        </div>

                        <!-- Judul -->
                        <h2 class="font-semibold text-lg leading-snug mb-1">
                            4 Rekomendasi Kerja Freelance Menguntungkan Yang Patut Kamu Coba
                        </h2>

                        <!-- Ringkasan -->
                        <p class="text-gray-600 text-sm mb-3">
                            Banyak jenis pekerjaan freelance, tentu hanya ada beberapa yang memiliki prospek dan menjanjikan
                            di
                            masa mendatang. Ini tentu akan jadi pertimbangan kamu sebagai calon pekerja lepas.
                        </p>

                        <!-- Footer kategori -->
                        <div class="flex justify-between items-center text-sm">
                            <span
                                class="bg-red-100 hover:bg-red-200 text-red-500 px-2 py-1 rounded-full font-medium">Tips</span>
                            <span class="text-gray-400">20 menit</span>
                        </div>
                    </div>
                </div>
                <div
                    class="max-w-xs bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition hover:scale-105">

                    <!-- Gambar Artikel -->
                    <img class="w-full h-48 object-cover" src="{{ asset('images/cwe.png') }}" alt="Freelance">

                    <!-- Konten -->
                    <div class="p-4">
                        <!-- Info sumber & tanggal -->
                        <div class="flex items-center text-gray-500 text-sm mb-2">
                            <img src="{{ asset('images/logoarea.png') }}" alt="logo" class="w-4 h-4 mr-1">
                            <span class="mr-2">Areakerja.com</span>
                            <span>• 14 Oktober 2024</span>
                        </div>

                        <!-- Judul -->
                        <h2 class="font-semibold text-lg leading-snug mb-1">
                            4 Rekomendasi Kerja Freelance Menguntungkan Yang Patut Kamu Coba
                        </h2>

                        <!-- Ringkasan -->
                        <p class="text-gray-600 text-sm mb-3">
                            Banyak jenis pekerjaan freelance, tentu hanya ada beberapa yang memiliki prospek dan menjanjikan
                            di
                            masa mendatang. Ini tentu akan jadi pertimbangan kamu sebagai calon pekerja lepas.
                        </p>

                        <!-- Footer kategori -->
                        <div class="flex justify-between items-center text-sm">
                            <span
                                class="bg-red-100 hover:bg-red-200 text-red-500 px-2 py-1 rounded-full font-medium">Tips</span>
                            <span class="text-gray-400">20 menit</span>
                        </div>
                    </div>
                </div>
                <div
                    class="max-w-xs bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition hover:scale-105">

                    <!-- Gambar Artikel -->
                    <img class="w-full h-48 object-cover" src="{{ asset('images/cwe.png') }}" alt="Freelance">

                    <!-- Konten -->
                    <div class="p-4">
                        <!-- Info sumber & tanggal -->
                        <div class="flex items-center text-gray-500 text-sm mb-2">
                            <img src="{{ asset('images/logoarea.png') }}" alt="logo" class="w-4 h-4 mr-1">
                            <span class="mr-2">Areakerja.com</span>
                            <span>• 14 Oktober 2024</span>
                        </div>

                        <!-- Judul -->
                        <h2 class="font-semibold text-lg leading-snug mb-1">
                            4 Rekomendasi Kerja Freelance Menguntungkan Yang Patut Kamu Coba
                        </h2>

                        <!-- Ringkasan -->
                        <p class="text-gray-600 text-sm mb-3">
                            Banyak jenis pekerjaan freelance, tentu hanya ada beberapa yang memiliki prospek dan menjanjikan
                            di
                            masa mendatang. Ini tentu akan jadi pertimbangan kamu sebagai calon pekerja lepas.
                        </p>

                        <!-- Footer kategori -->
                        <div class="flex justify-between items-center text-sm">
                            <span
                                class="bg-red-100 hover:bg-red-200 text-red-500 px-2 py-1 rounded-full font-medium">Tips</span>
                            <span class="text-gray-400">20 menit</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Floating Button -->
        <a href="#top"
            class="fixed bottom-6 right-6 bg-orange-500 hover:bg-orange-600 text-white py-3 px-3 rounded-full shadow-lg">
            <svg width="19" height="19" viewBox="0 0 31 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_659_5875)">
                    <path
                        d="M26.6724 18.25L15.5349 7.31684L4.39742 18.25L0.976101 14.8841L15.5349 0.561196L30.0938 14.8841L26.6724 18.25Z"
                        fill="white" />
                </g>
                <defs>
                    <clipPath id="clip0_659_5875">
                        <rect width="29.1176" height="26.9608" fill="white"
                            transform="translate(30.0625 27.2148) rotate(-180)" />
                    </clipPath>
                </defs>
            </svg>
        </a>
    </div>
    @include('layouts.footer')
@endsection
