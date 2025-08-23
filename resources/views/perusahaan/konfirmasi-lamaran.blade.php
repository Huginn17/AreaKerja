@extends('layouts.index-perusahaan')

@section('content')

<!-- Judul di luar border -->
<div class="max-w-3xl mx-auto mt-7 px-4">
  <h1 class="text-lg font-semibold mb-4">Konfirmasi Terima Lamaran</h1>
</div>

<!-- Box utama dengan border -->
<div class="max-w-3xl mx-auto px-4">
<div class="border border-gray-300 rounded-md p-6 bg-white shadow-sm mb-10">

    <!-- Header: Logo dan Informasi -->
    <div class="flex items-start gap-6 mb-4">
      <!-- Logo -->
      <div class="w-24">
        <img src="https://i.imgur.com/f8iH6E4.png" alt="Seven Logo" class="w-full h-auto" />
      </div>

      <!-- Teks -->
      <div>
        <h2 class="text-xl font-bold">Selamat Kepada</h2><br>
        <p class="mt-1 font-semibold">
          Jason Statham<br>
          <span class="font-semibold">Status:</span> Belum Kerja
        </p>

        <p class="mt-4">
          Lamaran yang anda ajukan ke lowongan kami pada Divisi Videografi telah kami 
          <span class="text-green-600 font-semibold">Terima</span>.
        </p>

        <p class="mt-4">
          Oleh karena itu, kami mengharapkan kehadiran anda pada:
        </p>

        <div class="mt-4 space-y-1">
          <p><span class="font-semibold">Tanggal</span> : 08 Februari 2023</p>
          <p><span class="font-semibold">Pukul</span> : 09:00</p>
          <p><span class="font-semibold">Tempat</span> : Kantor Seven Inc</p>
          <p><span class="font-semibold">Keperluan</span> : Wawancara Kerja</p>
        </div>

        <p class="mt-8">
          <span class="font-semibold">Catatan </span class="font-semibold">: Berpakaian sopan, rapi, dengan kemeja putih dan celana bahan hitam.
          Silakan bawa CV, KTP, ijazah SMA/SMK dan Transkrip Nilai Kuliah, serta dokumen-dokumen pendukung lainnya (jika ada).
        </p>

        <p class="mt-4 font-semibold">Hormat kami,<br class="font-semiold">Seven Inc</p>
      </div>
    </div>

    <!-- Footer Logo -->
    <div class="flex flex-col items-center mt-10">
      <img src="https://logoarea.png" alt="logoarea" class="w-16 mb-1" />
      <p class="text-xs text-gray-500">Copyright©2024areakerja.com</p>
    </div>

    <!-- Tombol -->
    <div class="flex justify-end gap-4 mt-6">
      <button class="px-7 py-1 bg-orange-500 text-white rounded-lg hover:bg-orange-600">Kembali</button>
      <button class="px-7 py-1 bg-orange-500 text-white rounded-lg hover:bg-orange-600">Kirim</button>
    </div>

  </div>
</div>

@include('layouts.footer')
@endsection
