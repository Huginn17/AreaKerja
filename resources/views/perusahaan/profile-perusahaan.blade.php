@extends('layouts.index-perusahaan')
@section('content')
<div class="bg-white p-6 font-sans">

  <!-- Header -->
  <div class="flex items-start space-x-4">
    <!-- Logo -->
    <img src="{{ asset('images/seven.png') }}" alt="Logo" class="w-20 h-20 object-contain" />

    <!-- Info Perusahaan -->
    <div>
      <h1 class="text-lg font-semibold">Seven_Inc</h1>
      <p class="text-sm text-gray-600">Jasa TI dan Konsultan TI</p>
      <p class="text-xs text-gray-400">Alamat default</p>
      <button class="mt-2 px-4 py-1 rounded-md border border-orange-400 text-orange-500 text-sm">
        Edit Profile
      </button>
    </div>
  </div>

  <!-- Deskripsi -->
  <div class="mt-6">
    <div class="flex items-start">
      <label class="w-32 text-sm">Deskripsi</label>
      <textarea class="flex-1 border border-orange-400 rounded-md h-24 p-2 focus:outline-none"></textarea>
    </div>
  </div>

  <!-- Grid Form & Kontak -->
  <div class="mt-6 grid grid-cols-3 gap-6">
    
    <!-- Kolom Kiri (span 2 kolom) -->
    <div class="col-span-2 space-y-4">
      <!-- Badan Usaha -->
      <div class="flex items-center">
        <label class="w-1 text-sm">Badan Usaha</label>
        <select class="flex-1 border border-orange-400 rounded-md p-2 focus:outline-none mx-32 text-gray-400 text-sm">
          <option class="text-sm ">Pilih Badan Usaha</option>
          <option class="text-sm text-black font-semibold ">Perusahaan Perseorang</option>
          <option class="text-sm text-black font-semibold ">CV (Persekutuan Komanditer)</option>
          <option class="text-sm text-black font-semibold ">PT (Persekutuan Terbatas)</option>
          <option class="text-sm text-black font-semibold ">Perseroan (Perseroan Terbatas Negara)</option>
        </select>
      </div>

      <!-- Visi -->
      <div class="flex items-center">
        <label class="w-32 text-sm">Visi</label>
        <input type="text" class="flex-1 border border-orange-400 rounded-md p-2 focus:outline-none h-20" />
      </div>

      <!-- Misi -->
      <div class="flex items-center">
        <label class="w-32 text-sm">Misi</label>
        <input type="text" class="flex-1 border border-orange-400 rounded-md p-2 focus:outline-none h-20" />
      </div>
    </div>

    <!-- Kolom Kanan (Kontak) -->
    <div class="border border-orange-400 rounded-md p-4 flex flex-col">
      <h2 class="font-semibold mb-2 ml-4">Kontak</h2>
      <ul class="list-disc ml-5 text-sm space-y-2 flex-1">
        <li class="py-2">Website<span class="pl-6" ><a href="http://seven.inc"">: http://seven.inc</span></a></li>
        <li class="py-2">Telepon<span class="pl-6">: +62 81363729803</span></li>
        <li class="py-2">Whatsapp<span class="pl-3">: +62 81363729803</span></li>
        <li class="py-2">Email<span class="pl-10">: seveninc@gmail.com</span></li>
      </ul>
    </div>
  </div>

  <!-- Separator -->
  <div class="my-6 border-t"></div>

  <!-- Tombol Lowongan -->
  <div class="flex justify-center">
    <div class="flex flex-col items-center">
      <div class="w-20 h-20 border border-orange-400 rounded-md flex items-center justify-center">
        <span class="text-3xl text-orange-500">+</span>
      </div>
      <button class="mt-2 px-4 py-1 bg-orange-500 text-white text-sm rounded-md">Lowongan</button>
    </div>
  </div>

</div>


    @include('layouts.footer')
@endsection
