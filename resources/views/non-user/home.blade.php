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
    <!-- Card Lowongan -->
    <h3 class="px-40 mt-8 mb-4 text-gray-500 font-semibold dark:text-white">
        Lowongan berdasarkan pada aktivitas Anda di areakerja
    </h3>

    <section class="mx-2 lg:mx-0 md:mx-0 px-0 lg:px-20 md:px-20">
        <div id="section-umpan-lowongan" class="grid grid-cols-1 lg:grid-cols-2 md:grid-cols-2 gap-3">
            @foreach ($Data as $d)
                @if ($d->published_at && (!$d->expired_at || $d->expired_at > now()))
                    <div x-data="{ open: false, showConfirm: false, showSuccess: false }"
                        class="border p-8 rounded-lg shadow-sm hover:shadow-md transition bg-white">

                        {{-- Header --}}
                        <div class="flex justify-between items-start">
                            <div>
                                @if ($d->urgent ?? true)
                                    <p class="bg-[#fdedf4] w-fit px-3 py-1 text-[#9d2b6b] font-semibold rounded-md text-xs">
                                        Dibutuhkan segera
                                    </p>
                                @endif

                                <h1 class="font-bold text-lg my-3">
                                    {{ $d->nama }} - {{ $d->jenis }}
                                </h1>
                            </div>
                            <div class="text-2xl text-gray-500">
                                <i class="ph ph-dots-three-vertical"></i>
                            </div>
                        </div>

                        {{-- Perusahaan & Lokasi --}}
                        <p class="text-gray-500 font-semibold">{{ $d->perusahaan->nama_perusahaan }}</p>
                        <p class="text-gray-500 font-semibold">{{ $d->alamat }}</p>

                        {{-- Rentang Gaji --}}
                        <p class="bg-[#d7d6d6] w-fit my-3 px-3 py-1 text-[#565656] font-semibold rounded-md text-sm">
                            Rp. {{ number_format($d->gaji_awal, 0, ',', '.') }} – Rp.
                            {{ number_format($d->gaji_akhir, 0, ',', '.') }} / bulan
                        </p>

                        {{-- Ringkasan --}}
                        <div x-show="!open" class="mt-3">
                            <div class="flex items-center justify-between my-4 text-gray-600">
                                <div class="flex items-center gap-2">
                                    <i class="ph-fill ph-paper-plane-right text-blue-600 text-xl"></i>
                                    <span class="font-medium">Lamar Dengan Cepat</span>
                                </div>


                                {{-- Tombol Simpan Lowongan --}}
                                @auth
                                    @php
                                        $sudahSimpan = Auth::user()->pelamar
                                            ? Auth::user()
                                                ->pelamar->simpanLowongans()
                                                ->where('lowongan_id', $d->id)
                                                ->exists()
                                            : false;
                                    @endphp

                                    @if (!$sudahSimpan)
                                        <form action="{{ route('simpan-lowongan.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="lowongan_id" value="{{ $d->id }}">
                                            <button type="submit" class="text-gray-400 hover:text-blue-600"
                                                title="Simpan Lowongan">
                                                <i class="ph ph-bookmark-simple text-2xl"></i>
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('simpan-lowongan.destroy', $d->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-blue-600 hover:text-red-500"
                                                title="Hapus dari Simpan">
                                                <i class="ph-fill ph-bookmark-simple text-2xl"></i>
                                            </button>
                                        </form>
                                    @endif
                                @endauth
                            </div>

                            <ul class="ps-5 mt-2 space-y-1 list-disc list-inside mb-5 text-sm text-gray-600">
                                <li>Gaji – Rp{{ $d->gaji_awal }} – Rp{{ $d->gaji_akhir }} per bulan tergantung pengalaman.
                                </li>
                                <li>Harus menyelesaikan penilaian pra-wawancara singkat sebelum diwawancara.</li>
                                <li>Diminta mengirimkan video perkenalan singkat (detail diberikan nanti).</li>
                            </ul>

                            <span class="text-xs text-gray-400">Aktif {{ $d->published_at->diffForHumans() }}</span>
                        </div>

                        {{-- Detail --}}
                        <div x-show="open" x-collapse class="mt-6 space-y-6">
                            <button @click.stop="showConfirm = true"
                                class="inline-block px-4 py-2 bg-orange-500 text-white rounded-lg text-sm font-semibold hover:bg-orange-600 transition">
                                Lamar Cepat
                            </button>

                            <div>
                                <h3 class="font-semibold text-lg mb-2">Detail Lowongan</h3>
                                <p class="text-gray-600">Jenis Lowongan: {{ $d->jenis }}</p>
                            </div>

                            <div>
                                <h3 class="font-semibold text-lg mb-2">Lokasi</h3>
                                <p class="text-gray-600">{{ $d->alamat }}</p>
                            </div>

                            <div>
                                <h3 class="font-semibold text-lg mb-2">Deskripsi Lowongan</h3>
                                <p class="text-gray-700 leading-relaxed">{{ $d->deskripsi }}</p>
                            </div>

                            <div>
                                <h3 class="font-semibold text-lg mb-2">Requirements</h3>
                                <ul class="list-disc list-inside text-gray-700 space-y-1">
                                    @foreach (explode("\n", $d->syarat_pekerjaan) as $req)
                                        <li>{{ $req }}</li>
                                    @endforeach
                                </ul>
                            </div>

                            <div>
                                <h3 class="font-semibold text-lg mb-2">Responsibilities</h3>
                                <ul class="list-disc list-inside text-gray-700 space-y-1">
                                    @foreach (explode("\n", $d->tanggung_jawab) as $res)
                                        <li>{{ $res }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        {{-- Tombol toggle detail --}}
                        <div class="mt-4">
                            <button @click="open = !open" class="text-sm text-blue-600 hover:underline">
                                <span x-show="!open">Lihat Detail</span>
                                <span x-show="open">Tutup Detail</span>
                            </button>
                        </div>

                        {{-- Modal Konfirmasi --}}
                        <div x-show="showConfirm"
                            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50" x-cloak>
                            <div class="bg-white rounded-lg p-6 text-center w-96">
                                <h2 class="text-lg font-semibold mb-4">Konfirmasi</h2>
                                <p class="mb-6">CV akan dikirimkan ke <b>{{ $d->perusahaan->nama_perusahaan }}</b></p>
                                <div class="flex justify-center gap-4">
                                    <button @click="showConfirm = false"
                                        class="px-4 py-2 bg-gray-300 rounded-lg">Batal</button>

                                    {{-- Tombol Kirim dengan AJAX --}}
                                    <button
                                        @click.prevent="
        fetch('{{ route('lamar.cepat', $d->id) }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').getAttribute('content')
            },
            body: JSON.stringify({})
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                showConfirm = false;
                showSuccess = true;
            } else if (data.redirect) {
                window.location.href = data.redirect;
            } else {
                alert(data.message ?? 'Gagal mengirim lamaran.');
            }
        })
        .catch(err => {
            console.error(err);
            alert('Terjadi kesalahan koneksi.');
        })
    "
                                        class="px-4 py-2 bg-orange-500 text-white rounded-lg">
                                        Kirim
                                    </button>

                                </div>
                            </div>
                        </div>



                        {{-- Modal Sukses --}}
                        <div x-show="showSuccess"
                            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50" x-cloak>
                            <div class="bg-white rounded-lg p-6 text-center w-96">
                                <h2 class="text-lg font-semibold mb-4">Lamaran anda telah terkirim</h2>
                                <p class="mb-6">Silahkan menunggu informasi selanjutnya melalui sistem kami</p>
                                <button @click="showSuccess = false"
                                    class="px-6 py-2 bg-orange-500 text-white rounded-lg">Selesai</button>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </section>



    {{-- AlpineJS --}}
    <script src="https://unpkg.com/alpinejs" defer></script>


    <script src="//unpkg.com/alpinejs" defer></script>
    @include('layouts.footer')
@endsection
