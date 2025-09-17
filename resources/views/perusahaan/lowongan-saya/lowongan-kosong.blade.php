@extends('layouts.index-perusahaan')
@section('content')
    <div class="bg-white text-gray-800">
        <!-- Header Perusahaan -->
        @if (Auth::user()->perusahaan->pasanglowongan->count() > 0)
            <div class="max-w-4xl mx-auto px-4 py-6">
                <div class="flex items-center justify-between">
                    <!-- Kiri: Logo + Info -->
                    <div class="flex items-center gap-4">
                        @if (Auth::user()->role == 'perusahaan')
                            @if (Auth::user()->perusahaan->img_profile)
                                <img id="pu" class="w-10 h-10 object-cover rounded-full profile-img"
                                    src="{{ asset('storage/' . Auth::user()->perusahaan->img_profile) }}" alt="Profile">
                            @else
                                <img id="pu" class="w-10 h-10 rounded-full"
                                    src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                                    alt="">
                            @endif
                        @else
                            <img class="w-10 h-10 rounded-full"
                                src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                                alt="">
                        @endif
                        <div>
                            <span class="font-semibold">{{ Auth::user()->username }}</span>
                            <p class="text-lg m-1">Jasa TI dan Konsultan TI</p>
                            <p class="text-sm text-gray-400">Jakarta Timur, DKI Jakarta, Indonesia</p>
                        </div>
                    </div>

                    <!-- Tombol tambah -->
                    <div>
                        <a href="{{ route('lowongan.create.form') }}"
                            class="absolute w-16 h-16 border border-orange-500 rounded-md flex items-center justify-center text-orange-500 hover:bg-orange-50">
                            <i class="ph ph-plus text-xl"></i>
                        </a>
                    </div>
                </div>
            </div>
    </div>

    <!-- Lowongan -->
    <div class="max-w-5xl mx-auto px-4 mb-10">
        <h2 class="text-base font-medium mb-3 flex">Lowongan</h2>

        <!-- Filter -->
        <div class="flex justify-end gap-2 mb-3">
            <select class="border rounded-md text-sm px-6 py-2">
                <option>Jenis Paket</option>
            </select>
            <select class="border rounded-md text-sm px-6 py-2">
                <option>Jenis Lowongan</option>
            </select>
        </div>

        @forelse ($Data as $d)
            @if ($d->paket_id)
                <!-- Card Publish -->
                <a href="{{ route('lowongan.detail', $d->id) }}">
                    <div class="flex shadow-md p-4">
                        <div>
                            <img src="{{ asset('Icon/seveninc.png') }}" alt="">
                        </div>
                        <div class="w-full">
                            <p>Seven Inc</p>
                            <h1 class="font-semibold">{{ $d->nama }} - {{ $d->jenis }}</h1>
                            <span>Yogyakarta</span>
                            <div class="mt-5 block lg:flex md:flex justify-between items-center w-full">
                                <span class="px-3 bg-[#d7d6d6] text-[#565656] py-2 rounded-md">
                                    Rp.{{ $d->gaji_awal }} - Rp.{{ $d->gaji_akhir }} per bulan
                                </span>
                                <span class="block mt-3 text-[#565656] pl-0 lg:pl-10 md:pl-10">
                                    <p id="countdown" class="text-red-500 font-medium"></p>
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            @else
                <!-- Card Non Publish -->
                <div class="flex justify-between items-end text-center gap-3 my-5">
                    <h3 class="font-semibold text-center text-orange-500">Lowongan Non Publish</h3>
                </div>
                <div class="flex shadow-md p-4">
                    <div>
                        <img src="{{ asset('Icon/seveninc.png') }}" alt="">
                    </div>
                    <div class="w-full">
                        <a href="{{ route('lowongan.detail', $d->id) }}">
                            <p>{{ Auth::user()->perusahaan->nama_perusahaan }}</p>
                            <h1 class="font-semibold">{{ $d->nama }} - {{ $d->jenis }}</h1>
                            <span>Yogyakarta</span>
                            <div class="mt-5 block lg:flex md:flex justify-between items-center w-full">
                                <span class="px-3 bg-[#d7d6d6] text-[#565656] py-2 rounded-md">
                                    Rp.{{ $d->gaji_awal }} - Rp.{{ $d->gaji_akhir }} per bulan
                                </span>
                            </div>
                        </a>
                        <button type="button"
                            class="publish-btn block mt-3 pl-0 lg:pl-10 md:pl-10 bg-orange-500 px-10 py-2 rounded-md text-white"
                            data-id="{{ $d->id }}">
                            Publish
                        </button>
                    </div>
                </div>
            @endif
        @empty
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
                            xlink:href="data:image/png;base64,..." />
                    </defs>
                </svg>
                <p class="text-gray-500 text-sm">Lowongan Kosong</p>
            </div>
        @endforelse

        <div class="flex justify-center mt-8">
            <button class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-2 rounded-lg shadow">
                Memuat
            </button>
        </div>
    </div>
@else
    <!-- Jika tidak ada pasanglowongan -->
    <div class="bg-white text-gray-800">
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

                <!-- Tombol tambah -->
                <div>
                    <a href="{{ route('lowongan.create.form') }}"
                        class="absolute w-16 h-16 border border-orange-500 rounded-md flex items-center justify-center text-orange-500 hover:bg-orange-50">
                        <i class="ph ph-plus text-xl"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Card Kosong -->
    <div class="max-w-5xl mx-auto px-4 mb-10">
        <h2 class="text-base font-medium mb-3 flex">Lowongan</h2>

        <div class="flex justify-end gap-2 mb-3">
            <select class="border rounded-md text-sm px-6 py-2">
                <option>Jenis Paket</option>
            </select>
            <select class="border rounded-md text-sm px-6 py-2">
                <option>Jenis Lowongan</option>
            </select>
        </div>

        <div class="border rounded-xl p-6 min-h-[400px] flex flex-col items-center justify-center relative">
            <!-- Tombol Tambah -->
            <a href="{{ route('lowongan.create.form') }}"
                class="absolute top-4 left-4 w-10 h-10 flex items-center justify-center border-2 border-orange-500 rounded-md text-orange-500 text-2xl">
                +
            </a>

            <!-- Konten kosong -->
            <div class="flex flex-col items-center justify-center">
                <svg width="71" height="85" viewBox="0 0 71 85" fill="none"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <mask id="mask0_637_59844" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0"
                        width="71" height="85">
                        <rect x="0.914062" width="69.6298" height="84.5162" fill="url(#pattern0_637_59844)" />
                    </mask>
                    <g mask="url(#mask0_637_59844)">
                        <rect x="9.4375" width="69.6298" height="84.5162" fill="#606060" fill-opacity="0.8" />
                    </g>
                    <defs>
                        <pattern id="pattern0_637_59844" patternContentUnits="objectBoundingBox" width="1"
                            height="1">
                            <use xlink:href="#image0_637_59844"
                                transform="matrix(0.0111111 0 0 0.00915404 0 0.0880682)" />
                        </pattern>
                        <image id="image0_637_59844" width="90" height="90" preserveAspectRatio="none"
                            xlink:href="data:image/png;base64,..." />
                    </defs>
                </svg>
                <p class="text-gray-500 text-sm">Lowongan Kosong</p>
            </div>
        </div>
    </div>
    @endif

    <!-- Modal Publish -->
    <div id="publishModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">
        <div class="bg-white p-6 rounded-md w-96 relative">
            <h2 class="text-lg font-bold mb-4">Konfirmasi Publish</h2>
            <p>Apakah Anda yakin ingin mem-publish lowongan ini?</p>

            <form id="publishForm" method="POST">
                @csrf
                <div class="mt-4 flex justify-end gap-3">
                    <button type="button" id="closeModal" class="px-4 py-2 border rounded-md">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-orange-500 text-white rounded-md">Ya, Publish</button>
                </div>
            </form>
        </div>
    </div>

    @include('layouts.footer')

    <script>
        const modal = document.getElementById('publishModal');
        const closeModal = document.getElementById('closeModal');
        const publishForm = document.getElementById('publishForm');

        document.querySelectorAll('.publish-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                let lowonganId = this.dataset.id;

                let route = "{{ route('lowongan.publish', ':id') }}";
                route = route.replace(':id', lowonganId);

                publishForm.action = route;

                modal.classList.remove('hidden');
                modal.classList.add('flex');
            });
        });


        closeModal.addEventListener('click', function() {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        });
    </script>
@endsection
