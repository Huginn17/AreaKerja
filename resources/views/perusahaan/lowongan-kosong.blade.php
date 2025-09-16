@extends('layouts.index-perusahaan')
@section('content')
    <div class="bg-white text-gray-800">
        <!-- Header Perusahaan -->
        <div class="max-w-4xl mx-auto px-4 py-6">
            <div class="flex items-center justify-between">

                <!-- Kiri: Logo + Info -->
                <div class="flex items-center gap-4">
                    <img src="{{ asset('images/seven.png') }}" alt="Logo" class="w-20 h-20 object-contain">
                    <div>
                        <h1 class="font-semibold text-lg m-1">Seven_Inc</h1>
                        <p class="text-lg m-1">Jasa TI dan Konsultan TI</p>
                        <p class="text-sm text-gray-400">Jakarta Timur, DKI Jakarta, Indonesia</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Lowongan -->
    <div class="max-w-5xl mx-auto px-4 mb-10">
        <h2 class="text-base font-medium mb-3">Lowongan</h2>

        <!-- Filter -->
        <div class="flex justify-end gap-2 mb-3">
            <select class="border rounded-md text-sm px-6 py-2">
                <option>Jenis Paket</option>
            </select>
            <select class="border rounded-md text-sm px-6 py-2">
                <option>Jenis Lowongan</option>
            </select>
        </div>

        <!-- Card -->
        <div class="border rounded-xl p-6 min-h-[400px] flex flex-col items-center justify-center relative">

            <!-- Tombol Tambah -->
            <button
                class="absolute top-4 left-4 w-10 h-10 flex items-center justify-center border-2 border-orange-500 rounded-md text-orange-500 text-2xl">
                +
            </button>

            <!-- Konten kosong -->
            <div class="flex flex-col items-center justify-center">
                <svg width="71" height="85" viewBox="0 0 71 85" fill="none" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink">
                    <mask id="mask0_637_59844" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="71"
                        height="85">
                        <rect x="0.914062" width="69.6298" height="84.5162" fill="url(#pattern0_637_59844)" />
                    </mask>
                    <g mask="url(#mask0_637_59844)">
                        <rect x="9.4375" width="69.6298" height="84.5162" fill="#606060" fill-opacity="0.8" />
                    </g>
                    <defs>
                        <pattern id="pattern0_637_59844" patternContentUnits="objectBoundingBox" width="1"
                            height="1">
                            <use xlink:href="#image0_637_59844" transform="matrix(0.0111111 0 0 0.00915404 0 0.0880682)" />
                        </pattern>
                        <image id="image0_637_59844" width="90" height="90" preserveAspectRatio="none"
                            xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFoAAABaCAYAAAA4qEECAAAABmJLR0QA/wD/AP+gvaeTAAACg0lEQVR4nO3dsYoTURjF8fMNxAQUMpNSfAIVbUTfQBEj9gu2WlvZ+wL29tpoo2BjZWGjWKwItnmAkGSyLKILuddi10LYKMw3nrm5c/5lwr355scwxRBmAKWUUkopRtbGJrPZbFSW5UMAewAuATjbxr4NOwLwuSiKR+Px+FOHc/yRG3qxWFwoiuItgCstzNNaMcYfRVHcK8vyXdezAEDhWTybzUYpIgOAmY1CCK/rur7Z9SyAE/rkcpEc8u9SwnZB4/ianHSpYHuhL7YyRXt9P+3DFLC90OdamaKlYoy3ABye9p2ZjWKMb5bL5ZQ8FgA/dFJNJpMPMcbb2IINYGhmr7rAzgoaSBc7O2ggTewsoYH0sLOFBtLCzhoaSAc7e2ggDexeQAPdY/cGGugWu1fQQHfYvYMGusHuJTTAx+4tNMDF7jU0cIwN4C623GIFMATwcr1eX/f8TlbQ8/n8fJN1VVW9B3AHf7+f/dQzW1bQg8HgftO1/8IGcK3p3kBm0DHGJ3VdP/5PZ/YZz2yuvxusVqvoWb9rVVXV2CurMzrlBE1K0KQETUrQpARNStCkBE1K0KQETUrQpARNStCkBE1K0KQETUrQpARNStCkBE1K0KQETUrQpARNStCkBE1K0KQETUrQpARNStCkBE1K0KQETUrQpARNStCkBE1K0KQETUrQpARNStCkBE1K0KQETUrQpLzQ2x76lGMHnsVe6G/O9TuTmbmO1Qv93Ll+ZwohuI7V9aifGOOwruuPAK569tmB9suyvGFmR003cJ3RZvYzhDAF8MWzT+LtbzabqQcZaOmlZCdn9gMz24sxXkZirw1p0KGZfQ0hvKiq6pkXWSmllFKK1y8u6f7v7t4EAQAAAABJRU5ErkJggg==" />
                    </defs>
                </svg>

                <p class="text-gray-500 text-sm">Lowongan Kosong</p>
            </div>
        </div>
    </div>


    @include('layouts.footer')
@endsection
