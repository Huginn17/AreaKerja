@extends('layouts.index')
@section('content')
    <div class="bg-gray-50 font-sans" x-data="{ open: true, showConfirm: false, showSuccess: false }">
        <div class="max-w-7xl mx-auto py-8 px-4 md:px-8 grid md:grid-cols-3 gap-6">

            <!-- Kiri: Detail Lowongan -->
            <div class="md:col-span-2 space-y-6">
                <!-- Header Lowongan -->
                <div class="bg-white rounded-lg shadow p-6 space-y-4">
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('images/seven.png') }}" alt="Logo Perusahaan" class="w-12 h-12">
                        <div>
                            <h1 class="text-xl font-semibold">{{ $data->nama }}</h1>
                            <p class="text-gray-600">{{ $data->perusahaan->nama_perusahaan }}</p>
                            <p class="text-gray-500 text-sm">{{ $data->alamat }}</p>
                        </div>
                    </div>
                    <p class="text-orange-600 font-medium">Rp. {{ $data->gaji_awal }} - Rp. {{ $data->gaji_akhir }} perbulan
                    </p>
                    <div x-show="open" x-collapse class="flex gap-3">
                        <button @click.stop="showConfirm = true"
                            class="inline-block px-4 py-2 bg-orange-500 text-white rounded-lg text-sm font-semibold hover:bg-orange-600 transition">
                            Lamar Cepat
                        </button>
                        {{-- Tombol Simpan Lowongan --}}
                        @foreach ($Data as $d)
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
                                        <button type="submit" class="text-orange-600 hover:text-gray-500"
                                            title="Hapus dari Simpan">
                                            <i class="ph-fill ph-bookmark-simple text-2xl"></i>
                                        </button>
                                    </form>
                                @endif
                            @endauth
                        @endforeach
                        <button class="border border-gray-300 px-3 py-2 rounded-lg">
                            <img src="/assets/icon-share.svg" alt="Bagikan" class="w-5 h-5">
                        </button>
                    </div>
                </div>

                <!-- Detail Lowongan -->
                <div class="bg-white rounded-lg shadow p-6 space-y-6">
                    <div>
                        <h2 class="font-semibold text-lg mb-2">Detail Lowongan</h2>
                        <div class="flex items-center gap-2 text-gray-700 mb-2">
                            <img src="/assets/icon-time.svg" alt="Jenis" class="w-5 h-5">
                            <span>Jenis Lowongan: <b>{{ $data->jenis }}</b></span>
                        </div>
                        <div class="flex items-center gap-2 text-gray-700">
                            <img src="/assets/icon-location.svg" alt="Lokasi" class="w-5 h-5">
                            <span>Lokasi: <b>{{ $data->alamat }}</b></span>
                        </div>
                    </div>

                    <!-- Deskripsi -->
                    <div>
                        <h2 class="font-semibold text-lg mb-2">Deskripsi Lowongan</h2>
                        <p class="text-gray-700 mb-4"><b>Requirements</b></p>
                        <ul class="list-disc pl-6 text-gray-600 space-y-2">
                            <li>{{ $data->syarat_pekerjaan }}</li>
                        </ul>
                    </div>

                    <!-- Responsibilities -->
                    <div>
                        <p class="text-gray-700 mb-4"><b>Responsibilities</b></p>
                        <ul class="list-disc pl-6 text-gray-600 space-y-2">
                            <li>{{ $data->tanggung_jawab }}</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Kanan: Lowongan Lain -->
            <div class="space-y-4">
                <div class="flex justify-between items-center">
                    <h2 class="font-semibold">Lowongan Seven Inc Lainnya</h2>
                    <a href="#" class="text-orange-600 text-sm font-medium">Lihat semua</a>
                </div>

                <!-- Card Lowongan -->
                <div class="bg-white rounded-lg shadow p-4 space-y-4">
                    <!-- Item -->
                    <div class="flex items-start gap-3 border-b pb-4">
                        <img src="{{ asset('images/seven.png') }}" alt="Logo" class="w-10 h-10">
                        <div>
                            <h3 class="font-medium">Lead Graphic Designer - WFH</h3>
                            <p class="text-gray-500 text-sm">Yogyakarta</p>
                            <p class="text-sm text-gray-700">Rp. 4.500.000 - Rp. 7.000.000 per bulan</p>
                            <span class="text-xs text-gray-400">Aktif 2 jam lalu</span>
                        </div>
                    </div>

                    <!-- Duplikat item -->
                    <div class="flex items-start gap-3 border-b pb-4">
                        <img src="{{ asset('images/seven.png') }}" alt="Logo" class="w-10 h-10">
                        <div>
                            <h3 class="font-medium">Lead Graphic Designer - WFH</h3>
                            <p class="text-gray-500 text-sm">Yogyakarta</p>
                            <p class="text-sm text-gray-700">Rp. 4.500.000 - Rp. 7.000.000 per bulan</p>
                            <span class="text-xs text-gray-400">Aktif 2 jam lalu</span>
                        </div>
                    </div>

                    <div class="flex items-start gap-3 border-b pb-4">
                        <img src="{{ asset('images/seven.png') }}" alt="Logo" class="w-10 h-10">
                        <div>
                            <h3 class="font-medium">Lead Graphic Designer - WFH</h3>
                            <p class="text-gray-500 text-sm">Yogyakarta</p>
                            <p class="text-sm text-gray-700">Rp. 4.500.000 - Rp. 7.000.000 per bulan</p>
                            <span class="text-xs text-gray-400">Aktif 2 jam lalu</span>
                        </div>
                    </div>

                </div>
            </div>
            {{-- Modal Konfirmasi --}}
            <div x-show="showConfirm" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
                x-cloak>
                <div class="bg-white rounded-lg p-6 text-center w-96">
                    <h2 class="text-lg font-semibold mb-4">Konfirmasi</h2>
                    <p class="mb-6">CV akan dikirimkan ke <b>{{ $data->perusahaan->nama_perusahaan }}</b></p>
                    <div class="flex justify-center gap-4">
                        <button @click="showConfirm = false" class="px-4 py-2 bg-gray-300 rounded-lg">Batal</button>

                        {{-- Tombol Kirim dengan AJAX --}}
                        <button
                            @click.prevent="
        fetch('{{ route('lamar.cepat', $data->id) }}', {
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
            <div x-show="showSuccess" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
                x-cloak>
                <div class="bg-white rounded-lg p-6 text-center w-96">
                    <h2 class="text-lg font-semibold mb-4">Lamaran anda telah terkirim</h2>
                    <p class="mb-6">Silahkan menunggu informasi selanjutnya melalui sistem kami</p>
                    <button @click="showSuccess = false"
                        class="px-6 py-2 bg-orange-500 text-white rounded-lg">Selesai</button>
                </div>
            </div>
        </div>


    </div>
    @include('layouts.footer')
@endsection
