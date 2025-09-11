<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Laporan Omset Bulanan</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white p-6">

  <!-- Container Utama -->
  <div class="max-w-3xl mx-auto  overflow-hidden">

    <!-- Header -->
  <div class="bg-white  border-black-b p-6 flex justify-center items-center">
  <div class="flex items-center space-x-4">
    <img src="{{ asset('images/seven.png') }}" alt="Logo" class="w-24 h-24" />
    <div class="text-center">
      <h2 class="text-2xl font-serif font-bold leading-snug">SEVEN INC.</h2>
      <p class=" font-serif">
        Jl. Raya Janti, Gang Arjuna No. 59, Karangjambe, Banguntapan,<br />
        Bantul, Yogyakarta<br />
        Kode Pos: 55198 | Telp: 0274 - 4534571
      </p>
    </div>
  </div>


    </div>

    

    <!-- Info Kontak -->
    <div class="flex justify-between px-6 py-4">
      <div class="flex items-center space-x-2">
        <img src="{{asset('images/logoarea.png')}}" alt="areakerja" class="w-14 h-14"/>
        <span class="text-orange-500 font-semibold text-lg">Areakerja.com</span>
      </div>
      <div class="text-sm text-right">
        <p class="text-lg font-semibold">Email: finance.group@gmail.com</p>
        <p class="text-lg font-semibold">No.Telp: 0816342825322</p>
      </div>
    </div>
  
    <!-- Orange underline -->
  <hr class="border-t-4 border-orange-500 mb-5" />


    <!-- Judul Tabel -->
    <div class="px-6">
      <h2 class="text-center text-xl font-bold mb-4">DAFTAR OMSET BULANAN</h2>
    </div>

    <!-- Tabel -->
    <div class="px-6 mb-4">
<table class="w-full  border-black-2  border-black-black border-2 border-black-collapse text-xs">
        
        <tbody>
          <tr><td class="border-2 border-black px-4 py-2 text-lg">Januari 2023</td><td class="border-2 border-black px-4 py-2 text-lg">Rp 3.000.000,00</td></tr>
          <tr><td class="border-2 border-black px-4 py-2  text-lg">Februari 2023</td><td class="border-2 border-black px-4 py-2 text-lg">Rp 3.000.000,00</td></tr>
          <tr><td class="border-2 border-black px-4 py-2  text-lg">Maret 2023</td><td class="border-2 border-black px-4 py-2 text-lg">Rp 3.000.000,00</td></tr>
          <tr><td class="border-2 border-black px-4 py-2  text-lg">April 2023</td><td class="border-2 border-black px-4 py-2 text-lg">Rp 3.000.000,00</td></tr>
          <tr><td class="border-2 border-black px-4 py-2  text-lg">Mei 2023</td><td class="border-2 border-black px-4 py-2 text-lg">Rp 3.000.000,00</td></tr>
          <tr><td class="border-2 border-black px-4 py-2  text-lg">Juni 2023</td><td class="border-2 border-black px-4 py-2 text-lg">Rp 3.000.000,00</td></tr>
          <tr><td class="border-2 border-black px-4 py-2  text-lg">Juli 2023</td><td class="border-2 border-black px-4 py-2 text-lg">Rp 3.000.000,00</td></tr>
        </tbody>
      </table>
    </div><br>

    <!-- Total dan Rata-rata -->
    <div class="px-6 pb-6 text-sm">
      <div class="flex justify-between mb-2">
        <span class="text-lg font-semibold">Total Omset :</span>
        <span class="font-bold text-orange-500 text-lg">Rp 21.000.000,00</span>
      </div>
      <div class="flex justify-between">
        <span class="text-lg font-semibold">Rata-rata :</span>
        <span class="font-bold text-orange-500 text-lg">Rp 3.000.000,00</span>
      </div>
    </div>

  </div>

</body>
</html>
