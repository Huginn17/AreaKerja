@extends('super_admin.sidebar.index')
@section('sidebarsuperadmin')
<div class="p-2 bg-white h-screen font-sans text-gray-900  overflow-y-auto">
  <!-- Header -->
  <!-- Konten utama -->
  <main class="flex-1 p-20 bg-white font-sans text-gray-900 ">
    <!-- Header -->
    <h1 class="text-xl font-semibold mb-6">Tambah Lowongan</h1>

    <!-- Card Container -->
    <div class="border border-gray-500 rounded-lg p-6 max-w-3xl mx-auto">

      <h2 class="font-semibold mb-6 text-gray-700 text-lg">Tambah Data Lowongan</h2>

      <!-- Form -->
      <form class="space-y-6">

        <!-- Baris 1: Judul & Alamat -->
        <div class="grid grid-cols-2 gap-6">
          <div>
            <label for="judul" class="block text-sm font-medium mb-1">Judul <span class="text-red-600">*</span></label>
            <input type="text" id="judul" name="judul" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500" />
          </div>

          <div>
            <label for="alamat" class="block text-sm font-medium mb-1">Alamat <span class="text-red-600">*</span></label>
            <select id="alamat" name="alamat" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
              <option value="">Pilih Alamat</option>
              <option>Jakarta</option>
              <option>Bandung</option>
              <option>Surabaya</option>
            </select>
          </div>
        </div>

        <!-- Baris 2: Jenis Lowongan & Gaji -->
        <div class="grid grid-cols-5 gap-4 items-end">
          <div class="col-span-2">
            <label for="jenis" class="block text-sm font-medium mb-1">Jenis Lowongan <span class="text-red-600">*</span></label>
            <select id="jenis" name="jenis" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
              <option value="">Pilih Jenis</option>
              <option>Full Time</option>
              <option>Part Time</option>
              <option>Freelance</option>
            </select>
          </div>

          <div class="col-span-1">
            <label for="gaji-min" class="block text-sm font-medium mb-1">Gaji <span class="text-red-600">*</span></label>
            <input type="number" id="gaji-min" name="gaji-min" placeholder="Min" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500" />
          </div>

          <div class="col-span-1">
            <label for="gaji-max" class="block mb-1 invisible">Max</label>
            <input type="number" id="gaji-max" name="gaji-max" placeholder="Max" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500" />
          </div>

          <div class="col-span-1">
            <label for="periode" class="block text-sm font-medium mb-1">Bulan</label>
            <select id="periode" name="periode" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
              <option value="">Pilih Bulan</option>
              <option>1 Bulan</option>
              <option>3 Bulan</option>
              <option>6 Bulan</option>
              <option>12 Bulan</option>
            </select>
          </div>
        </div>

        <!-- Deskripsi -->
        <div>
          <label for="deskripsi" class="block text-sm font-medium mb-1">Deskripsi <span class="text-red-600">*</span></label>
          <textarea id="deskripsi" name="deskripsi" rows="5" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500 resize-none"></textarea>
        </div>

        <!-- Syarat Pekerjaan -->
        <div>
          <p class="text-sm font-medium mb-2">Syarat Pekerjaan</p>

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
    class="flex-1 border border-gray-300 rounded px-2 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500"
  />
</div>


          <!-- Gender -->
        <div class="mb-4 flex items-start">
  <!-- Label -->
  <label class="w-32 text-sm font-medium pt-1">Gender <span class="text-red-600">*</span></label>

  <!-- Radio Group -->
  <fieldset class="flex gap-6 text-sm">
    <label class="flex items-center gap-2 font-semibold">
      <input type="radio" name="gender" value="Laki-laki"  class="h-4 w-4 rounded-full border border-orange-500 text-orange-500 focus:ring-1 focus:ring-orange-500 font-semibold" />

      Laki-laki
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
      class="w-11 h-10 border border-gray-300 rounded-md text-center text-sm focus:outline-none focus:ring-2 focus:ring-orange-500"
    />

    <!-- Strip -->
    <span class="text-gray-500 font-semibold">-</span>

    <!-- Input Max -->
    <input
      type="number"
      id="umur-max"
      name="umur-max"
      placeholder="Max"
      class="w-11 h-10 border border-gray-300 rounded-md text-center text-sm focus:outline-none focus:ring-2 focus:ring-orange-500"
    />
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
    class="w-30 border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500 text-sm"
  />
</div>


        <!-- Tombol -->
        <div class="flex gap-4">
          <button type="submit" class="bg-orange-600 text-white px-6 py-2 rounded hover:bg-orange-700 transition">Simpan</button>
          <button type="reset" class="border border-orange-600 text-orange-600 px-6 py-2 rounded hover:bg-orange-50 transition">Batal</button>
        </div>

      </form>

    </div>
  </main>
</div>

@endsection