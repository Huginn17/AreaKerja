@extends('layouts.index-perusahaan')
@section('content')
    <section class="relative">
            <img src="{{ asset('images/tangan.png') }}" alt="hero" class="w-full h-[350px] object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-10"></div>
            <div class="absolute bottom-20 left-20 text-white">
                <h1 class="text-3xl md:text-5xl font-semibold mt-3 max-w-2xl m-2">
                    Pelamar
                </h1>
                <h2 class="text-xl">Lihat riwayat lamar yang masuk</h2>
                <h2 class="text-xl"> Ke lowongan anda</h2><br>
             
            </div>
        </section>

<div class="p-6 bg-white min-h-screen flex justify-center">
  <div class="w-full max-w-5xl">
    <!-- Header Info Lowongan -->
    <div class="bg-white rounded-lg shadow p-5 flex items-center justify-between mb-6 border">
      <div class="flex items-center gap-4">
        <img src="{{ asset('images/seven.png') }}" alt="Logo" class="w-14 h-14" />
        <div>
              <h5 class="text-gray-500 text-sm">Seven Inc</h5>
          <h2 class="font-semibold text-gray-800">UI UX Designer - WFO</h2>
          <p class="text-sm text-gray-500">Yogyakarta</p>
          <div class="flex gap-2 mt-2">
            <span class="bg-gray-300 border rounded px-3 py-1 text-xs">Rp. 4.500.000 - Rp. 7.000.000 per bulan</span>
          
          </div>
        </div>
      </div>
      <span class="text-sm text-gray-500">Aktif 2 jam lalu</span>
    </div>

    <!-- Tabel Pelamar -->
  <div class="bg-white rounded-xl shadow overflow-hidden border">
  <table class="w-full text-sm border-collapse">
    <thead class="bg-gray-white">
      <tr>
        <th class="px-11 py-6 text-left">Tanggal</th>
        <th class="px-12 py-6 text-left">Nama</th>
        <th class="px-6 py-4 text-left">CV</th>
        <th class="px-11 py-6 text-left">Status</th>
        <th class="px-11 py-6 text-left">Waktu</th>
      </tr>
    </thead>
    <tbody class="divide-y">
      <tr>
        <td class="px-9 py-6">25 Juni, 2024</td>
        <td class="px-6 py-4">Bambang Kurnia</td>
       <td class="px-6 py-4">
  <div class="flex justify-left items-center">
    <svg xmlns="http://www.w3.org/2000/svg" 
         class="w-5 h-5 text-orange-500" 
         fill="currentColor" viewBox="0 0 24 24">
      <path d="M12 3v12l4-4h-3V3h-2v8H8l4 4zM4 19h16v2H4z"/>
    </svg>
  </div>
</td>
        <td class="px-6 py-4">
          <button class="bg-green-500 hover:bg-green-600 text-white px-5 py-1 rounded">Terima</button>
          <button class="bg-red-500  hover:bg-red-600 text-white px-5 py-1 rounded">Tolak</button>
        </td>
        <td class="px-11 py-6">30 Hari</td>
      </tr>

      
      <tr>
        <td class="px-9 py-6">25 Juni, 2024</td>
        <td class="px-6 py-4">Bambang Kurnia</td>
       <td class="px-6 py-4">
  <div class="flex justify-left items-center">
    <svg xmlns="http://www.w3.org/2000/svg" 
         class="w-5 h-5 text-orange-500" 
         fill="currentColor" viewBox="0 0 24 24">
      <path d="M12 3v12l4-4h-3V3h-2v8H8l4 4zM4 19h16v2H4z"/>
    </svg>
  </div>
</td>
        <td class="px-6 py-4">
          <button class="bg-gray-400  hover:bg-gray-500 text-white px-5 py-1 rounded">Terima</button>
          <button class="bg-gray-400  hover:bg-gray-500 text-white px-5 py-1 rounded">Tolak</button>
        </td>
        <td class="px-11 py-6">30 Hari</td>
      </tr>
   

      <tr>
        <td class="px-9 py-6">25 Juni, 2024</td>
        <td class="px-6 py-4">Bambang Kurnia</td>
        <td class="px-6 py-4">
  <div class="flex justify-left items-center">
    <svg xmlns="http://www.w3.org/2000/svg" 
         class="w-5 h-5 text-orange-500" 
         fill="currentColor" viewBox="0 0 24 24">
      <path d="M12 3v12l4-4h-3V3h-2v8H8l4 4zM4 19h16v2H4z"/>
    </svg>
  </div>
</td>
        <td class="px-6 py-4">
          <button class="bg-gray-400 hover:bg-gray-500 text-white px-5 py-1 rounded">Terima</button>
          <button class="bg-gray-400  hover:bg-gray-500 text-white px-5 py-1 rounded">Tolak</button>
        </td>
        <td class="px-11 py-6">30 Hari</td>
      </tr>

      <tr>
        <td class="px-9 py-6">25 Juni, 2024</td>
        <td class="px-6 py-4">Bambang Kurnia</td>
        <td class="px-6 py-4">
  <div class="flex justify-left items-center">
    <svg xmlns="http://www.w3.org/2000/svg" 
         class="w-5 h-5 text-orange-500" 
         fill="currentColor" viewBox="0 0 24 24">
      <path d="M12 3v12l4-4h-3V3h-2v8H8l4 4zM4 19h16v2H4z"/>
    </svg>
  </div>
</td>
        <td class="px-6 py-4">
          <button class="bg-gray-400  hover:bg-gray-500 text-white px-5 py-1 rounded">Terima</button>
          <button class="bg-gray-400  hover:bg-gray-500 text-white px-5 py-1 rounded">Tolak</button>
        </td>
        <td class="px-11 py-6">30 Hari</td>
      </tr>
  
  

      <tr>
        <td class="px-9 py-4">25 Juni, 2024</td>
        <td class="px-6 py-4">Bambang Kurnia</td>
       <td class="px-6 py-4">
  <div class="flex justify-left items-center">
    <svg xmlns="http://www.w3.org/2000/svg" 
         class="w-5 h-5 text-orange-500" 
         fill="currentColor" viewBox="0 0 24 24">
      <path d="M12 3v12l4-4h-3V3h-2v8H8l4 4zM4 19h16v2H4z"/>
    </svg>
  </div>
</td>
        <td class="px-6 py-4">
          <button class="bg-gray-400  hover:bg-gray-500 text-white px-5 py-1 rounded">Terima</button>
          <button class="bg-gray-400  hover:bg-gray-500 text-white px-5 py-1 rounded">Tolak</button>
        </td>
        <td class="px-11 py-6">30 Hari</td>
      </tr>

      <tr>
        <td class="px-9 py-6">25 Juni, 2024</td>
        <td class="px-6 py-4">Bambang Kurnia</td>
       <td class="px-6 py-4">
  <div class="flex justify-left items-center">
    <svg xmlns="http://www.w3.org/2000/svg" 
         class="w-5 h-5 text-orange-500" 
         fill="currentColor" viewBox="0 0 24 24">
      <path d="M12 3v12l4-4h-3V3h-2v8H8l4 4zM4 19h16v2H4z"/>
    </svg>
  </div>
</td>
        <td class="px-6 py-4">
          <button class="bg-gray-400  hover:bg-gray-500 text-white px-5 py-1 rounded">Terima</button>
          <button class="bg-gray-400  hover:bg-gray-500 text-white px-5 py-1 rounded">Tolak</button>
        </td>
        <td class="px-11 py-6">30 Hari</td>
      </tr>
   
      
    
      <tr>
        <td class="px-9 py-6">25 Juni, 2024</td>
        <td class="px-6 py-4">Bambang Kurnia</td>
      <td class="px-6 py-4">
  <div class="flex justify-left items-center">
    <svg xmlns="http://www.w3.org/2000/svg" 
         class="w-5 h-5 text-orange-500" 
         fill="currentColor" viewBox="0 0 24 24">
      <path d="M12 3v12l4-4h-3V3h-2v8H8l4 4zM4 19h16v2H4z"/>
    </svg>
  </div>
</td>
        <td class="px-6 py-4">
          <button class="bg-gray-400 hover:bg-gray-500 text-white px-5 py-1 rounded">Terima</button>
          <button class="bg-gray-400  hover:bg-gray-500 text-white px-5 py-1 rounded">Tolak</button>
        </td>
        <td class="px-11 py-6">30 Hari</td>
      </tr>

      <tr>
        <td class=px-9 py-6">25 Juni, 2024</td>
        <td class="px-6 py-4">Bambang Kurnia</td>
        <td class="px-6 py-4">
  <div class="flex justify-left items-center">
    <svg xmlns="http://www.w3.org/2000/svg" 
         class="w-5 h-5 text-orange-500" 
         fill="currentColor" viewBox="0 0 24 24">
      <path d="M12 3v12l4-4h-3V3h-2v8H8l4 4zM4 19h16v2H4z"/>
    </svg>
  </div>
</td>
        <td class="px-6 py-4">
          <button class="bg-gray-400  hover:bg-gray-500 text-white px-5 py-1 rounded">Terima</button>
          <button class="bg-gray-400  hover:bg-gray-500 text-white px-5 py-1 rounded">Tolak</button>
        </td>
        <td class="px-11 py-6">30 Hari</td>
      </tr>
  
    
    
      <tr>
        <td class="px-9 py-6">25 Juni, 2024</td>
        <td class="px-6 py-4">Bambang Kurnia</td>
        <td class="px-6 py-4">
  <div class="flex justify-left items-center">
    <svg xmlns="http://www.w3.org/2000/svg" 
         class="w-5 h-5 text-orange-500" 
         fill="currentColor" viewBox="0 0 24 24">
      <path d="M12 3v12l4-4h-3V3h-2v8H8l4 4zM4 19h16v2H4z"/>
    </svg>
  </div>
</td>
        <td class="px-6 py-4">
          <button class="bg-gray-400  hover:bg-gray-500 text-white px-5 py-1 rounded">Terima</button>
          <button class="bg-gray-400  hover:bg-gray-500  text-white px-5 py-1 rounded">Tolak</button>
        </td>
        <td class="px-11 py-6">30 Hari</td>
      </tr>

      <tr>
        <td class="px-9 py-6">25 Juni, 2024</td>
        <td class="px-6 py-4">Bambang Kurnia</td>
     <td class="px-6 py-4">
  <div class="flex justify-left items-center">
    <svg xmlns="http://www.w3.org/2000/svg" 
         class="w-5 h-5 text-orange-500" 
         fill="currentColor" viewBox="0 0 24 24">
      <path d="M12 3v12l4-4h-3V3h-2v8H8l4 4zM4 19h16v2H4z"/>
    </svg>
  </div>
</td>
        <td class="px-6 py-4">
          <button class="bg-gray-400 hover:bg-gray-500 text-white px-5 py-1 rounded  text-sm ">Terima</button>
          <button class="bg-gray-400  hover:bg-gray-500 text-white px-5 py-1 rounded  text-sm">Tolak</button>
        </td>
        <td class="px-11 py-6">30 Hari</td>
      </tr>
   



     
         
          
          <!-- Tambahkan baris sesuai jumlah pelamar -->
        </tbody>
      </table>
    </div>

    

    <!-- Info bawah -->
    <div class="flex items-start gap-2 text-red-500 text-sm mt-4">
      <!-- Ikon peringatan -->
    <svg class="w-[33px] h-[33px] text-orange-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
  <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v5a1 1 0 1 0 2 0V8Zm-1 7a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H12Z" clip-rule="evenodd"/>
</svg>

      <p>
        Informasi pelamar akan hilang dalam waktu 30 hari setelah<br>
         anda konfirmasi
        <span class="font-semibold">Terima</span>.
      </p>
    </div>
  </div>
</div>





@include('layouts.footer')
@endsection