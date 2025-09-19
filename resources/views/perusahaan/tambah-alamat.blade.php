@extends('layouts.index-perusahaan')
@section('content')


<div class="min-h-screen bg-white p-8">
  <!-- Header -->
  <div class="flex items-start gap-3 mb-8">
    <!-- Logo -->
    <img src="{{asset('images/seven.png')}}" alt="Logo" class="w-24 h-24 object-contain">

    <!-- Info Perusahaan -->
    <div>
      <h1 class="font-semibold text-lg">Seven_Inc</h1>
      <p class="text-sm text-gray-700">Jasa TI dan Konsultan TI</p>
      <p class="text-xs text-gray-400">Alamat default</p>
    </div>
  </div>

  <!-- Bagian Alamat -->
  <div>
    <h2 class="font-medium text-base mb-2">Alamat</h2>
 <svg width="1040" height="2" viewBox="0 0 1040 2" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M-0.0078125 1L1040.01 1" stroke="#FA6601" stroke-width="2"/>
</svg><br>


    <!-- Box Alamat -->
   <div class="border border-orange-400 rounded-md p-6 w-[600px]">
  <div class="flex items-center gap-2 mb-8">
    <span class="text-gray-500">Alamat Kosong</span>
    <!-- Icon Dokumen -->
    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
      <path d="M6 2C4.897 2 4 2.897 4 4V20C4 21.103 4.897 22 6 22H18C19.103 22 20 21.103 20 20V8L14 2H6zM13 9V3.5L18.5 9H13z"/>
    </svg>
  </div>

  <div class="flex justify-end">
    <button class="bg-orange-500 hover:bg-orange-600 text-white text-sm px-4 py-1.5 rounded">
      Tambah Alamat
    </button>
  </div>
</div>


    </div>
  </div>
</div>


 @include('layouts.footer')
@endsection