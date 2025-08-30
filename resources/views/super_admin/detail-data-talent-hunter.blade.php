@extends('super_admin.sidebar.index')

@section('sidebarsuperadmin')
<div class="flex min-h-screen">
  
  <!-- Sidebar sudah otomatis dari super_admin.sidebar.index -->
  
  <!-- Konten -->
  <main class="flex-1 p-6 bg-gray-50">

    <!-- 🔔 PROFIL & NOTIFIKASI -->
    <div class="flex justify-end items-center space-x-3 mb-6">
      <!-- Notifikasi Icon -->
      <button class="p-2 rounded-full hover:bg-gray-200">
        <svg width="28" height="28" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg">
          <!-- isi path notifikasi -->
        </svg>
      </button>

      <!-- Profil Box -->
      <div class="flex items-center bg-white px-4 py-2 border border-gray-300 rounded-lg shadow">
        <img src="https://randomuser.me/api/portraits/men/32.jpg" 
             alt="Avatar" 
             class="w-8 h-8 rounded-full mr-2" />
        <div>
          <p class="text-sm font-medium leading-none">Ronaldo</p>
          <p class="text-xs text-gray-500 leading-none">ronaldo@gmail.com</p>
        </div>
      </div>
    </div>

    <!-- 🧾 FORM UTAMA -->
    <div class="max-w-4xl w-full mx-auto border border-gray-300 rounded-lg shadow-lg p-10 bg-white font-sans">

      <!-- Header -->
      <div class="border-b border-gray-300 pb-3 mb-6">
        <div class="flex items-center justify-center">
          <img src="{{ asset('images/seven.png') }}" alt="Logo" class="h-16 mr-3">
          <h1 class="text-2xl font-bold">SEVEN INC</h1>
        </div>
      </div>

      <!-- Deskripsi -->
      <div class="mb-6">
        <h2 class="font-semibold text-lg">Deskripsi</h2>
        <p class="text-red-600 text-sm font-medium">Perusahaan Belum Menyelesaikan Bagian Ini</p>
      </div>

      <!-- Culture -->
      <div class="mb-6">
        <h2 class="font-semibold text-lg">Culture Perusahaan</h2>
        <p class="text-red-600 text-sm font-medium">Perusahaan Belum Menyelesaikan Bagian Ini</p>
      </div>

      <!-- Alamat -->
      <div class="mb-6">
        <h2 class="font-semibold text-lg">Alamat Perusahaan</h2>
        <p class="text-sm font-medium">Ngasinan, Kraguman, Jogonalan, Klaten, Jawa Tengah 57452</p>
      </div>

      <!-- Kriteria -->
      <div>
        <h2 class="font-semibold text-lg mb-3">Kriteria Kandidat</h2>
        <div class="grid grid-cols-[12rem_auto] gap-y-2 gap-x-4 text-sm">
          <div class="font-medium">Posisi yang dibutuhkan</div>
          <div>: Front-End Developer</div>

          <div class="font-medium">Jenis Kelamin</div>
          <div>: Laki-Laki</div>

          <div class="font-medium">Kisaran Gaji</div>
          <div>: Rp 4.500.000 sampai Rp 6.500.000</div>

          <div class="font-medium">Detail Tambahan</div>
          <div>: Memiliki pengalaman lebih 1 tahun</div>
        </div>
      </div>

    </div>
  </main>
</div>
@endsection
