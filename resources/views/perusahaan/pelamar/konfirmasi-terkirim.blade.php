@extends('layouts.index-perusahaan')

@section('content')
    <!-- Judul di luar border -->
    <h1 class="text-lg font-medium mb-4 mt-24 ml-56">Konfirmasi Terima Lamaran</h1>

    <!-- Box utama dengan border -->
    <div class="max-w-4xl mx-auto px-4">
        <div class="border border-gray-300 rounded-xl p-6 bg-white shadow-sm mb-10">

            <!-- Header: Logo dan Informasi -->
            <div class="flex items-start gap-6 mb-4">
                <!-- Logo -->
                <div class="w-30">
                    <img src="{{ asset('images/seven.png') }}" alt="Seven Logo" class="w-30 h-30" />
                </div>

                <!-- Teks -->
                <div>
                    <h2 class="text-xl font-semibold">Selamat Kepada</h2><br>

                    <!-- Nama pelamar -->
                    <p class="mb-4 mt-1 font-medium">{{ $data->pelamar->nama_pelamar ?? '-' }}</p>
                    <span class="font-semibold">Status :</span>
                    <span class="font-normal">{{ $data->pelamar->status_pekerjaan ?? 'Belum Kerja' }}</span>

                    <p class="mt-4">
                        Lamaran yang anda ajukan ke lowongan kami pada Divisi <br>
                        {{ $data->lowongan_perusahaan->nama ?? '-' }} telah kami
                        <span class="text-green-600 font-semibold">Terima</span>.
                    </p>

                    <p class="mt-4">
                        Oleh karena itu, kami mengharapkan kehadiran anda pada :
                    </p>

                    <div class="mt-4 space-y-1">
                        <p><span class="font-semibold">Tanggal</span> :
                            {{ \Carbon\Carbon::parse($konfirmasi['tanggal'])->translatedFormat('d F Y') }}</p>
                        <p><span class="font-semibold">Pukul</span> : {{ $konfirmasi['waktu'] }}</p>
                        <p><span class="font-semibold">Tempat</span> : {{ $konfirmasi['tempat'] }}</p>
                        <p><span class="font-semibold">Keperluan</span> : Wawancara Kerja</p>
                    </div>

                    <p class="mt-8">
                        <span class="font-semibold">Catatan</span> :
                        {{ $konfirmasi['catatan'] ?? '-' }}
                    </p>

                    <p class="mt-4 font-semibold">Hormat
                        kami,<br>{{ $data->lowongan_perusahaan->perusahaan->nama_perusahaan ?? 'Perusahaan' }}</p>
                </div>
            </div>

            <!-- Footer Logo -->
            <div class="flex flex-col items-center mt-10">
                <img src="{{ asset('images/logoarea.png') }}" alt="logoarea" class="w-16 mb-1" />
                <p class="text-xs text-gray-500">Copyright©2024 areakerja.com</p>
            </div>

            <!-- Tombol -->
            <div class="flex justify-end gap-2 mt-6">
                <a href="{{ route('pelamar.konfirmasi', $data->id) }}"
                    class="px-7 py-1 bg-orange-500 text-white rounded-lg hover:bg-orange-600">Kembali</a>
                <form action="{{ route('pelamar.konfirmasi.kirim', $data->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="px-7 py-1 bg-orange-500 text-white rounded-lg hover:bg-orange-600">
                        Kirim
                    </button>
                </form>
            </div>

        </div>
    </div>

    @include('layouts.footer')
@endsection
