@extends('layouts.index')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="bg-white shadow rounded-lg overflow-hidden w-full max-w-2xl">
        <div class="flex">
            <!-- Sidebar orange -->
            <div class="w-3 bg-orange-500"></div>

            <!-- Isi Surat -->
            <div class="flex-1 p-10">
                <!-- Header -->
                <h2 class="text-xl font-bold mb-8">Selamat Kepada</h2>

                <!-- Data Pelamar -->
                <p class="mb-1">{{ $notif->pelamar->nama_pelamar }}</p>
                <p class="mb-6">Status : {{ $notif->pelamar->status ?? 'Belum Kerja' }}</p>

                <!-- Pesan diterima / ditolak -->
                @if ($notif->status === 'diterima')
                    <p class="mb-4 leading-relaxed">
                        Lamaran yang anda ajukan ke lowongan kami pada Divisi
                        <span class="font-medium">{{ $notif->lowongan_perusahaan->judul }}</span>
                        telah kami <span class="text-green-600 font-semibold">Terima.</span>
                    </p>

                    <p class="mb-4">
                        Oleh karena itu, kami mengharapkan kehadiran anda pada :
                    </p>

                    <!-- Detail Wawancara -->
                    <div class="mb-6 space-y-1">
                        <p><span class="inline-block w-28">Tanggal</span> : {{ \Carbon\Carbon::parse($notif->jadwal_wawancara->waktu)->translatedFormat('d F Y') }}</p>
                        <p><span class="inline-block w-28">Pukul</span> : {{ \Carbon\Carbon::parse($notif->jadwal_wawancara->waktu)->format('H : i') }}</p>
                        <p><span class="inline-block w-28">Tempat</span> : {{ $notif->jadwal_wawancara->tempat }}</p>
                        <p><span class="inline-block w-28">Keperluan</span> : Wawancara Kerja</p>
                    </div>

                    <!-- Catatan -->
                    <div class="mb-6">
                        <p>
                            <span class="inline-block w-28">Catatan</span> : 
                            {{ $notif->jadwal_wawancara->catatan }}
                        </p>
                    </div>
                @else
                    <p class="mb-4 leading-relaxed">
                        Lamaran yang anda ajukan ke lowongan kami pada Divisi
                        <span class="font-medium">{{ $notif->lowongan_perusahaan->judul }}</span>
                        telah kami <span class="text-red-600 font-semibold">Tolak.</span>
                    </p>

                    <p class="mb-6">
                        Kami mengucapkan terima kasih atas ketertarikan anda untuk bergabung bersama
                        <span class="font-medium">{{ $notif->lowongan_perusahaan->perusahaan->nama }}</span>.
                        Kami berharap anda tetap semangat dan tidak menyerah dalam mencari kesempatan kerja berikutnya.
                    </p>
                @endif

                <!-- Penutup -->
                <p class="mt-8">Hormat kami,</p>
                <p class="font-medium">{{ $notif->lowongan_perusahaan->perusahaan->nama_perusahaan }}</p>

                <!-- Footer -->
                <div class="mt-16 text-center">
                    <img src="{{ asset('images/logoarea.png') }}"  alt="logo" class="mx-auto w-20 h-20">
                    <p class="text-xs text-gray-500 mt-2">Copyright©2024areakerja.com</p>
                </div>
            </div>
        </div>
    </div>
</div> 
@include('layouts.footer')
@endsection
