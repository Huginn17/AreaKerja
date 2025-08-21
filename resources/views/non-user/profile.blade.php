@extends('layouts.index')

@section('content')
<h2 class="text-xl font-semibold mb-6 mt-10 ml-12">Profil Akun</h2>

<div class="bg-white  mx-12">
    <!-- Header: Avatar + Tombol -->
   <div class="border border-orange-300">
  <div class=" border-orange-500 border-rounded-lg p-8 flex items-center justify-between">
  
  <!-- Kiri: Foto + Upload/Remove -->

  <div class="flex items-center gap-8">
    <!-- Avatar + Select -->
    <div class="flex flex-col items-center">
      <div class="relative">
        <img src="cwe.png"
             alt="Profile"
             class="w-20 h-20 rounded-full object-cover border" />
        <span class="absolute bottom-1 right-1 bg-orange-500  text-white text-xs rounded-full p-1">
          ✎
        </span>
      </div>

      <!-- Select Box -->
      <div class="relative inline-block mt-2 w-32">
        <select class="w-full border-2 border-orange-500 text-orange-500 font-semibold rounded-md px-2 py-1 text-xs cursor-pointer appearance-none bg-white">
          <option selected>Pelamar Aktif</option>
          <option>Pelamar Nonaktif</option>
          <option>Menunggu Review</option>
        </select>
        <svg xmlns="http://www.w3.org/2000/svg"ht-2 top-1/2 transform -translate-y-1/2 pointer-events-none"
             fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
      </div>
    </div>

    <!-- Tombol Upload & Remove -->
    <div class="flex items-center gap-2">
      <button class="flex items-center gap-1 border border-orange-400 text-orange-500 px-3 py-1.5 rounded-md text-sm font-medium hover:bg-orange-50">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
             stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5-5m0 0l5 5m-5-5v12" />
        </svg>
        Upload
      </button>

      <button class="flex items-center gap-1 border px-3 py-1.5 rounded-md text-sm font-medium text-gray-600 hover:bg-gray-100">
       
         🗑 Remove
      </button>
    </div>
  </div>

  <!-- Bagian Kanan (Tombol CV & Simpan) -->
  <div class="flex items-center gap-2">
    <button
      class="bg-orange-500 text-white text-sm font-semibold px-4 py-2 rounded hover:bg-orange-600">
      Unduh CV
    </button>
    <button
      class="bg-green-600 text-white text-sm font-semibold px-4 py-2 rounded hover:bg-green-700">
      Simpan
    </button>
  </div>
</div>

    </div><br>



<div style="display: flex; justify-content: space-between; width: 800px; margin: 20px 0;">
  <div style="font-weight: bold; border-bottom: 3px solid orange; padding-bottom: 5px; width: 40%;">
    Data Diri
  </div>
  <div style="font-weight: bold; border-bottom: 3px solid orange; padding-bottom: 5px; width: 40%;">
    Informasi Akun
    
  </div>
</div>






    <!-- Grid: Dua Kolom -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Kolom Kiri -->
        <div class="flex flex-col gap-4">
            <div>
                <label class="text-sm font-medium">Nama Lengkap <span class="text-red-500">*</span></label>
                <input type="text" placeholder="Nama Lengkap"
                    class="w-full mt-1 border rounded-md px-3 py-2 text-sm">
            </div>

            <div>
                <label class="text-sm font-medium">Gender <span class="text-red-500">*</span></label>
                <div class="flex gap-6 mt-2 text-sm">
                    <label class="flex items-center gap-2">
                        <input type="radio" name="gender" class="w-4 h-4 text-orange-500 border-2 border-orange-500">
                        Laki - Laki
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="radio" name="gender" class="w-4 h-4 text-orange-500 border-2 border-orange-500">
                        Perempuan
                    </label>
                </div>
            </div>

            <div>

                <label class="text-sm font-medium">Tanggal Lahir <span class="text-red-500">*</span></label>
                <input type="Date" class="w-full mt-1 border rounded-md px-3 py-2 text-sm text-gray-500 ">
            </div>

            <div>
                <label class="text-sm font-medium">No. Tlp <span class="text-red-500">*</span></label>
                <input type="text" placeholder="No. Tlp" class="w-full mt-1 border rounded-md px-3 py-2 text-sm">
            </div>

            <div>
                <label class="text-sm font-medium">Deskripsi Diri <span class="text-red-500">*</span></label>
                <textarea placeholder="Deskripsikan diri anda secara singkat"
                    class="w-full mt-1 border rounded-md px-3 py-2 text-sm"></textarea>
            </div>
            
             <label class="text-sm font-medium">Alamat <span class="text-red-500"></span></label>
              <a href="{{ url('alamat') }}"
     class="w-full flex justify-between items-center px-4 py-3 bg-orange-500 hover:bg-orange-600 
            border border-orange-500 text-white rounded-md text-sm">
     Alamat
  </a>
           

            <!-- Tombol Tambahan -->
            <label class="text-sm font-medium">Organisasi <span class="text-red-500"></span></label>
            <button class="flex justify-between items-center px-4 py-2 hover:bg-gray-50 border border-orange-500 text-orange-500 rounded-md text-sm">
                Tambahkan Organisasi <span class="text-xl">+</span>
            </button>
            <label class="text-sm font-medium">Pengalaman Kerja <span class="text-red-500"></span></label>
            <button class="flex justify-between items-center px-4 py-2 hover:bg-gray-50 border border-orange-500 text-orange-500 rounded-md text-sm">
                Tambahkan Pengalaman Kerja <span class="text-xl">+</span>
            </button>
            <label class="text-sm font-medium">Skill <span class="text-red-500">*</span></label>
            <button class="flex justify-between items-center px-4 py-2 hover:bg-gray-50 border border-orange-500 text-orange-500 rounded-md text-sm">
                Tambahkan Skill <span class="text-xl">+</span>
            </button>

            <!-- Sosial Media -->
            <div class="flex flex-col gap-2">
                <label class="text-lg font-medium">Sosial Media</label>
                <div class="w-30 h-1 bg-orange-500 mt-1"></div><br>
                <label class="text-sm font-medium">Instagram <span class="text-red-500"></span></label>
                <input type="text" placeholder="Instagram" class="w-full border rounded-md px-3 py-2 text-sm">
                <label class="text-sm font-medium">Linkedin<span class="text-red-500"></span></label>
                <input type="text" placeholder="LinkedIn" class="w-full border rounded-md px-3 py-2 text-sm">
                <label class="text-sm font-medium">Website<span class="text-red-500"></span></label>
                <input type="text" placeholder="Website" class="w-full border rounded-md px-3 py-2 text-sm">
                <label class="text-sm font-medium">Twitter<span class="text-red-500">*</span></label>
                <input type="text" placeholder="Twitter" class="w-full border rounded-md px-3 py-2 text-sm">
            </div><br>
        </div>

        <!-- Kolom Kanan -->
        <div class="flex flex-col gap-4">
            <div>
                <label class="text-sm font-medium">ID Pengguna</label>
                <input type="text" placeholder="ID Pengguna" class="w-full mt-1 border rounded-md px-3 py-2 text-sm">
            </div>

            <div>
                <label class="text-sm font-medium">Nama Pengguna <span class="text-red-500">*</span></label>
                <input type="text" placeholder="Nama Pengguna"
                    class="w-full mt-1 border rounded-md px-3 py-2 text-sm">
            </div>

            <div>
                <label class="text-sm font-medium">Email <span class="text-red-500">*</span></label>
               <div class="flex items-center gap-2">
  <!-- Input -->
  <input 
    type="email" 
    placeholder="Email" 
    class="w-full mt-1 border rounded-md px-3 py-2 text-sm focus:outline-none">
  

  <!-- Icon di luar border -->
  <span class="mt-1 text-orange-500 cursor-pointer">
    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" 
         class="w-5 h-5" viewBox="0 0 24 24">
      <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 
               7.04a1.003 1.003 0 0 0 0-1.42l-2.34-2.34a1.003 
               1.003 0 0 0-1.42 0l-1.83 1.83 3.75 
               3.75 1.84-1.82z"/>
    </svg>
  </span>
</div>

                
            </div>

            <div>
                <label class="text-sm font-medium">Kata Sandi <span class="text-red-500">*</span></label>
                <div class="flex items-center gap-2">
  <!-- Input -->
  <input 
    type="password" 
    placeholder="Kata sandi" 
    class="w-full mt-1 border rounded-md px-3 py-2 text-sm focus:outline-none">

  <!-- Icon di luar border -->
  <span class="mt-1 text-orange-500 cursor-pointer">
    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" 
         class="w-5 h-5" viewBox="0 0 24 24">
      <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 
               7.04a1.003 1.003 0 0 0 0-1.42l-2.34-2.34a1.003 
               1.003 0 0 0-1.42 0l-1.83 1.83 3.75 
               3.75 1.84-1.82z"/>
    </svg>
  </span>
</div>

            </div>

            <!-- Ekspektasi Gaji -->
            <div>
                <label class="text-lg font-medium">Ekspektasi Gaji</label>
                  <div class="w-30 h-1 bg-orange-500 mt-1"></div><br>
                <div class="flex items-center gap-2 mt-1">
                    <input type="text" placeholder="Rp. -" class="border border-black rounded-md px-4 py-2 text-gray-500 w-29">
                    <span>—</span>
                    <input type="text" placeholder="Rp. -" class="border border-black rounded-md px-4 py-2 text-sm w-29">
                </div>
                <input type="range" class="w-full mt-4 accent-gray-700 ">
            </div>

            <!-- Catatan -->
            <div class="text-orange-500 text-sm space-y-2 mt-2">
                <p>✓ Setelah menjadi kandidat AreaKerja, CV anda akan otomatis terunggah ke etalase perusahaan</p>
                <p>✓ Range gaji akan tampil pada profil anda di etalase perusahaan</p>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
@endsection
