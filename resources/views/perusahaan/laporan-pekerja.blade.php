@extends('layouts.index-perusahaan')

@section('content')

  <!-- Header -->
  <<header class="relative h-64 md:h-80 w-full overflow-hidden">
  <!-- Gambar -->
 <section class="relative">
        <img src="{{ asset('images/ntap.png') }}" alt="hero" class="w-full h-[350px] object-cover">

  <!-- Overlay hitam -->
  <div class="absolute inset-0 bg-black bg-opacity-20"></div>

  <!-- Konten -->
  <div class="absolute inset-0 flex items-center px-6 md:px-16">
    <div class="max-w-xl text-white">
      <h1 class="text-2xl md:text-3xl font-bold mb-3">Laporan Pekerja</h1>
      <p class="text-sm md:text-base leading-relaxed text-gray-200">
        Lorem Ipsum is simply dummy text of the printing typesetting industry. 
        Lorem Ipsum has been industry's standard dummy text ever since the 1500s anda.
      </p>
    </div>
  </div>
</header>

  
  <br>

  <!-- Form Section -->
  <main class="max-w-3xl mx-auto mt-20 bg-white">
    <h2 class="text-xl font-semibold mb-6">Laporan Pekerja</h2>
    
    <form class="space-y-6">
      
      <!-- Nama Pekerja -->
      <div>
        <label class="block mb-2 text-sm font-medium text-gray-700">Nama Pekerja</label>
        <input 
          type="text" 
          placeholder="Nama Pekerja"
          class="w-full border border-gray-500 rounded-md px-4 py-2 text-sm focus:ring-2 focus:ring-orange-500 focus:outline-none"
        >
      </div>

      <!-- Upload Bukti & Gender -->
     <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        
  <!-- Upload -->
  <div>
    <label class="block mb-2 text-sm font-medium text-gray-700">Upload Bukti Pendukung</label>
    <input 
      type="text" 
      placeholder="Contoh : Absensi Kerja_Nama_.pdf"
      class="w-full border border-gray-500 rounded-md px-4 py-2 text-sm focus:ring-2 focus:ring-orange-500 focus:outline-none"
    >
  </div>

  <!-- Gender -->
  <div class="pl-10">
    <label class="block mb-2 text-sm font-semibold  text-gray-700">Gender</label>
    <div class="flex items-end gap-8 mt-2">
      <label class="flex items-center gap-2 text-sm text-gray-700">
        <input type="radio" 
               name="gender" 
               class="w-4 h-4 border border-orange-400 text-orange-500 focus:ring-orange-500">
        Laki-Laki
      </label>
      <label class="flex items-center gap-2 text-sm text-gray-700">
        <input type="radio" 
               name="gender" 
               class="w-4 h-4 border border-orange-400 text-orange-500 focus:ring-orange-500">
        Perempuan
      </label>
    </div>
  </div>

</div>



      </div>

      <!-- Alasan Pekerjaan -->
      <div>
        <label class="block mb-2 text-sm font-medium text-gray-700">Alasan Pelaporan</label>
        <textarea 
          rows="4" 
          placeholder="Contoh: Menno jarang sekali datang tepat waktu dan sering bolos kerja"
          class="w-full border border-gray-500 rounded-md px-4 py-2 text-sm focus:ring-2 focus:ring-orange-500 focus:outline-none"
        ></textarea>
      </div>

      <!-- Tombol Submit -->
      <div class="flex justify-end">
        <button 
          type="submit" 
          class="bg-orange-500 hover:bg-orange-600 text-white font-medium px-8 py-2 rounded-md transition"
        > Simpan
        </button>
      </div><br>

    </form >
  </main>

@include('layouts.footer')
@endsection
