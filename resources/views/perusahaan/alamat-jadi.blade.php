@extends('layouts.index-perusahaan')
@section('content')
<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Seven Inc Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body class="bg-white text-gray-800 font-sans">

    <!-- PROFILE SECTION -->
    <section class="p-6">
      <div class="flex items-start gap-4">
        <img src="https://i.imgur.com/sV0GNNF.png" alt="Seven Logo" class="w-16 h-auto" />
        <div class="mt-1">
          <h3 class="font-semibold text-xl">Seven_Inc</h3>
          <p class="text-medium font-semibold">Jasa TI dan Konsultan TI</p>
          <p class="text-sm text-gray-400 mt-1">Alamat default</p>
        </div>
      </div><br>

      <!-- Garis dan Judul -->
    
       <h4 class="font-semibold text-base ml-9">Alamat</h4>

        <div class="ml-9">
  <svg width="1040" height="2" viewBox="0 0 1040 2" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M-0.0078125 1L1040.01 1" stroke="#FA6601" stroke-width="2" m-2 />
  </svg>
</div>
<br>

      </div>

      <!-- ALAMAT KARTU -->
      <div class="space-y-6 ml-10 max-w-3xl m-3">
        <!-- 3x Alamat -->
        <div class="border border-orange-500 rounded-md p-6 bg-white text-orange-600">
          <p class="font-semibold mb-2">Rumah</p>
          <p class="text-medium leading-relaxed mb-1">
            Jl. Mangga dua No. 27 RT/RW 001/003, Kecamatan Mangga, Kota Jakarta Timur,<br />
            Provinsi DKI Jakarta, 13463
          </p>
          <p class="text-medium leading-relaxed mb-4">Blok 3B Kanan Sebelum Lapangan Bola</p>
          <button class="bg-orange-500 text-white text-sm px-4 py-2 rounded-md hover:bg-orange-600 transition m-3">
            Edit alamat
          </button>
        </div>

        <!-- Duplikat -->
        <div class="border border-orange-500 rounded-md p-6 bg-white text-orange-600">
          <p class="font-semibold mb-2">Rumah</p>
          <p class="text-medium leading-relaxed mb-1">
            Jl. Mangga dua No. 27 RT/RW 001/003, Kecamatan Mangga, Kota Jakarta Timur,<br />
            Provinsi DKI Jakarta, 13463
          </p>
          <p class="text-medium leading-relaxed mb-4">Blok 3B Kanan Sebelum Lapangan Bola</p>
          <button class="bg-orange-500 text-white text-sm px-4 py-2 rounded-md hover:bg-orange-600 transition">
            Edit alamat
          </button>
        </div>

        <!-- Duplikat -->
        <div class="border border-orange-500 rounded-md p-6 bg-white text-orange-600">
          <p class="font-semibold mb-2">Rumah</p>
          <p class="text-medium leading-relaxed mb-1">
            Jl. Mangga dua No. 27 RT/RW 001/003, Kecamatan Mangga, Kota Jakarta Timur,<br />
            Provinsi DKI Jakarta, 13463
          </p>
          <p class="text-medium leading-relaxed mb-4">Blok 3B Kanan Sebelum Lapangan Bola</p>
          <button class="bg-orange-500 text-white text-sm px-4 py-2 rounded-md hover:bg-orange-600 transition">
            Edit alamat
          </button><br>
        </div>
      </div>
    </section>
  </body>
</html>
@include('layouts.footer')
@endsection

