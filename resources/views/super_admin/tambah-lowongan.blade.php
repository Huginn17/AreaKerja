@extends('super_admin.sidebar.index')
@section('sidebarsuperadmin')
<div class="p-2 bg-white h-screen font-sans overflow-y-auto">
  <!-- Header -->
  <!-- Konten utama -->
  <main class="flex-1 p-20 bg-white font-sans text-gray-900 ">
    <!-- Header -->
   <!-- Header atas form -->
<div class="flex items-center justify-between mb-4">
  <!-- Kiri: Judul -->
  <h1 class="text-2xl font-semibold text-black ">Tambah Lowongan</h1>

  <!-- Kanan: Notifikasi + Profil -->
  <div class="flex items-center space-x-1">
    <!-- Ikon Notifikasi -->
    <div class="relative">
   <svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_733_9512)">
<path d="M23.076 14.9416L22.6747 12.7368L21.1101 13.0041L21.5756 15.5619C21.6168 15.788 21.7387 15.9907 21.9146 16.1255L24.4524 18.0718L24.6985 19.424L7.4876 22.3639L7.24147 21.0117L8.93911 18.3419C9.05673 18.157 9.09972 17.9261 9.05861 17.7L8.43786 14.2896C8.21777 13.0919 8.29153 11.8654 8.65169 10.7337C9.01186 9.60207 9.64569 8.60544 10.4892 7.84449C11.3326 7.08353 12.3559 6.58519 13.4555 6.39979C14.5552 6.21439 15.6924 6.3485 16.7522 6.78858L16.4051 4.88131C15.595 4.64916 14.7612 4.55542 13.9346 4.60354L13.6165 2.85571L12.0518 3.12297L12.37 4.8708C10.4802 5.41421 8.87215 6.7053 7.85685 8.49441C6.84155 10.2835 6.49109 12.4436 6.87324 14.5569L7.42973 17.6143L5.7321 20.284C5.61447 20.4689 5.57149 20.6999 5.6126 20.926L6.07815 23.4838C6.11931 23.7099 6.24121 23.9127 6.41702 24.0475C6.59284 24.1823 6.80817 24.2382 7.01565 24.2027L12.4919 23.2673L12.647 24.1199C12.8528 25.2505 13.4623 26.2644 14.3414 26.9386C15.2205 27.6128 16.2971 27.892 17.3345 27.7147C18.3719 27.5375 19.2851 26.9185 19.8732 25.9937C20.4612 25.0689 20.676 23.9142 20.4702 22.7836L20.315 21.931L25.7912 20.9956C25.9987 20.9601 26.1813 20.8363 26.2989 20.6513C26.4165 20.4664 26.4595 20.2354 26.4183 20.0093L25.9528 17.4515C25.9116 17.2254 25.7896 17.0227 25.6138 16.8879L23.076 14.9416ZM18.9055 23.0508C19.029 23.7292 18.9002 24.422 18.5473 24.9769C18.1945 25.5318 17.6466 25.9032 17.0242 26.0095C16.4017 26.1159 15.7557 25.9484 15.2283 25.5439C14.7008 25.1394 14.3351 24.531 14.2117 23.8526L14.0565 23L18.7504 22.1982L18.9055 23.0508Z" fill="black"/>
<path d="M22.3629 11.0324C24.0912 10.7372 25.2143 8.97095 24.8714 7.08743C24.5286 5.20392 22.8497 3.91635 21.1214 4.21156C19.3932 4.50678 18.2701 6.27298 18.6129 8.15649C18.9558 10.04 20.6347 11.3276 22.3629 11.0324Z" fill="black"/>
<ellipse cx="21.3472" cy="5.12912" rx="6.35506" ry="6.15646" fill="#E46054"/>
</g>
<path d="M22.8299 3.49956L20.917 8H19.8345L21.7696 3.61819H19.3452V2.72106H22.8299V3.49956Z" fill="white"/>
<defs>
<clipPath id="clip0_733_9512">
<rect width="25.3967" height="27.7315" fill="white" transform="matrix(0.985722 -0.168378 0.179073 0.983836 0.164062 4.27539)"/>
</clipPath>
</defs>
</svg>

    </div>

    <!-- Profil -->
    <div class="flex items-center bg-white px-3 py-2 rounded-lg shadow text-sm">
      <img src="{{ asset('images/tangan.png') }}" alt="Profile" class="w-9 h-9 rounded-full mr-2">
      <div class="text-left leading-tight">
        <div class="font-semibold text-gray-900">Steve Jobs</div>
        <div class="text-gray-500 text-xs">stevejobs@gmail.com</div>
      </div>
      <svg class="w-4 h-4 ml-2 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
      </svg>
    </div>
  </div>
</div><br>


    <!-- Card Container -->
    <div class="border border-gray-500 rounded-xl p-16 max-w-3xl mx-auto">

      <h2 class="font-bold mb-6 text-gray-600 text-lg px-6 py-2 ">Tambah Data Lowongan</h2>

      <!-- Form -->
      <form class="space-y-6">

        <!-- Baris 1: Judul & Alamat -->
        <div class="grid grid-cols-2 gap-6">
          <div>
            <label for="judul" class="block text-sm font-bold mb-1">Judul <span class="text-red-600">*</span></label>
            <input type="text" id="judul" name="judul" required class=" w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500" />
          </div>

          <div>
            <label for="alamat" class="block text-sm font-bold mb-1">Alamat <span class="text-red-600">*</span></label>
            <select id="alamat" name="alamat" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
              <option value="">Pilih Alamat</option>
              <option>Jakarta</option>
              <option>Bandung</option>
              <option>Ciamis</option>
              <option>Yogyakarta</option>
              <option>Solo</option>
              <option>Semarang</option>
              <option>Surabaya</option>
            </select>
          </div>
        </div>

        <!-- Baris 2: Jenis Lowongan & Gaji -->
        <div class="grid grid-cols-5 gap-4 items-end">
          <div class="col-span-2">
            <label for="jenis" class="block text-sm font-bold mb-1">Jenis Lowongan <span class="text-red-600">*</span></label>
            <select id="jenis" name="jenis" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
              <option value="">Pilih Jenis</option>
              <option>Full Time</option>
              <option>Part Time</option>
              <option>Middle Time</option>
              <option>Freelance</option>
            </select>
          </div>

          <div class="col-span-1">
            <label for="gaji-min" class="block text-sm font-bold mb-1">Gaji <span class="text-red-600">*</span></label>
            <input type="number" id="gaji-min" name="gaji-min" placeholder="Min" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500" />
          </div>

          <div class="col-span-1">
            <label for="gaji-max" class="block mb-1 invisible">Max</label>
            <input type="number" id="gaji-max" name="gaji-max" placeholder="Max" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500" />
          </div>

          <div class="col-span-1">
            <label for="periode" class="block text-sm font-bold mb-1">Bulan</label>
            <select id="periode" name="periode" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
              <option value="">Pilih Bulan</option>
              <option>1 Bulan</option>
              <option>3 Bulan</option>
              <option>6 Bulan</option>
              <option>8 Bulan</option>
            </select>
          </div>
        </div>

        <!-- Deskripsi -->
        <div>
          <label for="deskripsi" class="block text-sm font-bold mb-1">Deskripsi <span class="text-red-600">*</span></label>
          <textarea id="deskripsi" name="deskripsi" rows="5" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500 resize-none"></textarea>
        </div>

        <!-- Syarat Pekerjaan -->
        <div>
          <p class="text-sm font-semibold mb-2">Syarat Pekerjaan</p>

          <!-- Pendidikan -->
        <div class="mb-4 flex items-start">
  <label class="w-32 text-sm font-medium pt-1">Pendidikan <span class="text-red-600">*</span></label>

  <fieldset class="flex flex-col gap-2 text-sm">
    <!-- Baris 1 -->
    <div class="flex gap-4">
      <label class="flex items-center gap-2 font-semibold">
   
        <input type="checkbox" name="pendidikan[]" value="SD"
          class="h-4 w-4 rounded-full border border-orange-500 text-orange-500 focus:ring-1 focus:ring-orange-500 font-semibold" />
        SD
      </label>
      <label class="flex items-center gap-2 font-semibold">
        <input type="checkbox" name="pendidikan[]" value="SMP"
          class="h-4 w-4 rounded-full border border-orange-500 text-orange-500 focus:ring-1 focus:ring-orange-500 font-semibold" />
        SMP
      </label>
      <label class="flex items-center gap-2 font-semibold">
        <input type="checkbox" name="pendidikan[]" value="SMA"
          class="h-4 w-4 rounded-full border border-orange-500 text-orange-500 focus:ring-1 focus:ring-orange-500 font-semibold" />
        SMA
      </label>
      <label class="flex items-center gap-2 font-semibold">
        <input type="checkbox" name="pendidikan[]" value="SMK"
          class="h-4 w-4 rounded-full border border-orange-500 text-orange-500 focus:ring-1 focus:ring-orange-500 font-semibold" />
        SMK
      </label>
    </div>

    <!-- Baris 2 -->
    <div class="flex gap-4">
      <label class="flex items-center gap-2 font-semibold">
        <input type="checkbox" name="pendidikan[]" value="S1"
          class="h-4 w-4 rounded-full border border-orange-500 text-orange-500 focus:ring-1 focus:ring-orange-500 font-semibold" />
        S1
      </label>
      <label class="flex items-center gap-2 font-semibold">
        <input type="checkbox" name="pendidikan[]" value="S2"
          class="h-4 w-4 rounded-full border border-orange-500 text-orange-500 focus:ring-1 focus:ring-orange-500 font-semibold" />
        S2
      </label>
      <label class="flex items-center gap-2 font-semibold">
        <input type="checkbox" name="pendidikan[]" value="S3"
          class="h-4 w-4 rounded-full border border-orange-500 text-orange-500 focus:ring-1 focus:ring-orange-500 font-semibold" />
        S3
      </label>
    </div>
  </fieldset>
</div>


          <!-- Jurusan -->
          <div class="mb-4 flex items-center">
  <!-- Label -->
  <label for="jurusan" class="w-32 text-sm font-medium">Jurusan</label>

  <!-- Input -->
  <input
    type="text"
    id="jurusan"
    name="jurusan"
    class="flex-1 border border-gray-300 rounded px-2 py-1 focus:outline-none focus:ring-2 focus:ring-orange-500"/>
  </div>


          <!-- Gender -->
        <div class="mb-4 flex items-start">
  <!-- Label -->
  <label class="w-32 text-sm font-medium pt-1">Gender <span class="text-red-600">*</span></label>

  <!-- Radio Group -->
  <fieldset class="flex gap-6 text-sm">
    <label class="flex items-center gap-2 font-semibold">
      <input type="radio" name="gender" value="Laki-laki"  class="h-4 w-4 rounded-full border border-orange-500 text-orange-500 focus:ring-1 focus:ring-orange-500 font-semibold" />

      Laki-Laki
    </label>
    <label class="flex items-center gap-2 font-semibold">
      <input type="radio" name="gender" value="Perempuan"    class="h-4 w-4 rounded-full border border-orange-500 text-orange-500 focus:ring-1 focus:ring-orange-500 font-semibold" />
    
      Perempuan
    </label>
  </fieldset>
</div>


          <!-- Umur -->
       <div class="mb-4 flex items-center">
  <!-- Label -->
  <label for="umur-min" class="w-32 text-sm font-medium">Umur <span class="text-red-600">*</span></label>

  <!-- Input Min - Max -->
  <div class="flex items-center gap-2">
    <!-- Input Min -->
    <input
      type="number"
      id="umur-min"
      name="umur-min"
      required
      placeholder="Min"
      class="w-11 h-10 border border-gray-300 rounded-md text-center text-sm focus:outline-none focus:ring-2 focus:ring-orange-500"/>

    <!-- Strip -->
    <span class="text-gray-500 font-semibold">-</span>

    <!-- Input Max -->
    <input
      type="number"
      id="umur-max"
      name="umur-max"
      placeholder="Max"
      class="w-11 h-10 border border-gray-300 rounded-md text-center text-sm focus:outline-none focus:ring-2 focus:ring-orange-500"/>
  </div>
</div>

          <!-- Batas Waktu -->
        <div class="mb-4 flex items-center">
  <!-- Label -->
  <label for="batas-waktu" class="w-32 text-sm font-medium">
    Batas Waktu <span class="text-red-600">*</span>
  </label>

  <!-- Input Date -->
  <input 
    type="date"
    
    required
    class="w-30 border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500 text-sm"/>
</div><br>


        <!-- Tombol -->
     <div class="flex justify-center gap-3">
  <button type="submit" class="bg-orange-500 text-white text-sm px-7 py-1 rounded-lg hover:bg-orange-600 transition">Simpan</button>
  <button type="reset" class="border border-orange-600 text-orange-600 text-sm px-7 py-1 rounded-lg hover:bg-gray-100 transition">Batal</button>
</div>

      </form>

    </div>
  </main>
</div>

@endsection