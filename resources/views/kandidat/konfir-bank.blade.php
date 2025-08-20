<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Konfirmasi Pembayaran</title>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>

<body class="bg-gray-200 flex items-center justify-center">

  <!-- Modal -->
  <div id="konfirbankModal" class="bg-white max-w-sm rounded-xl shadow-lg scale-90">
    <!-- Header -->
    <div class="flex items-center justify-between px-5 py-4">
      <h2 class="text-[15px] font-semibold border-b-4 border-orange-500 pb-2">Daftar Kandidat</h2>
      <button onclick="toggleModal()" class="text-gray-600 hover:text-black text-2xl">&times;</button>
    </div>

    <!-- Body -->
    <div class="px-5 pb-5 mt-3">

      <!-- Box status -->
      <div class="border border-orange-500 rounded-lg p-5 flex flex-col items-center text-center mb-5">
        <img src="{{ asset('images/logoarea.png') }}" alt="Logo" class="w-16 mr-1 mb-2">
        <!-- Icon success -->
        <svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="18.5" cy="18.5" r="18.5" fill="#32D74B" fill-opacity="0.3"/>
          <circle cx="18.9115" cy="18.9115" r="12.3333" fill="#32D74B" fill-opacity="0.8"/>
          <path d="M16.9534 21.7645L14.4058 19.3866C14.2686 19.2585 14.0824 19.1865 13.8882 19.1865C13.6941 19.1865 13.5079 19.2585 13.3706 19.3866C13.2334 19.5147 13.1562 19.6885 13.1562 19.8697C13.1562 19.9594 13.1752 20.0483 13.212 20.1312C13.2488 20.2141 13.3027 20.2894 13.3706 20.3528L16.4395 23.2172C16.7258 23.4845 17.1884 23.4845 17.4747 23.2172L25.2423 15.9671C25.3796 15.839 25.4567 15.6652 25.4567 15.484C25.4567 15.3028 25.3796 15.129 25.2423 15.0009C25.105 14.8728 24.9188 14.8008 24.7247 14.8008C24.5306 14.8008 24.3444 14.8728 24.2071 15.0009L16.9534 21.7645Z" fill="white"/>
        </svg>
        <p class="text-green-500 text-[13px] mt-3">Pembayaran Berhasil!</p>
        <p class="text-lg font-semibold mt-1">Rp. 202.000</p>
      </div>

      <!-- Detail transaksi -->
      <div class="border border-orange-500 rounded-lg px-4 py-3 space-y-2 text-[13px]">
        <div class="flex justify-between">
          <span class="text-gray-600">No.Transaksi</span>
          <span class="font-medium">081798924451</span>
        </div>
        <div class="flex justify-between">
          <span class="text-gray-600">Status</span>
          <span class="bg-orange-500 text-white text-[11px] px-2 py-0.5 rounded-full">Berhasil</span>
        </div>
        <div class="flex justify-between">
          <span class="text-gray-600">Nama Pengirim</span>
          <span class="font-medium">Ucup</span>
        </div>
        <div class="flex justify-between">
          <span class="text-gray-600">Nama Penerima</span>
          <span class="font-medium">Area Kerja</span>
        </div>
        <div class="flex justify-between">
          <span class="text-gray-600">Metode Pembayaran</span>
          <span class="font-medium">Transfer Bank</span>
        </div>
        <div class="flex justify-between">
          <span class="text-gray-600">Bank</span>
          <span class="font-medium">BCA</span>
        </div>
        <div class="flex justify-between">
          <span class="text-gray-600">Tgl/Waktu</span>
          <span class="font-medium">25 Juni 12:30 WIB</span>
        </div>
        <div class="flex justify-between">
          <span class="text-gray-600">Jumlah Deposit</span>
          <span class="font-medium">Rp. 200.000</span>
        </div>
        <div class="flex justify-between">
          <span class="text-gray-600">Biaya Admin</span>
          <span class="font-medium">Rp. 2.000</span>
        </div>
        <div class="pt-2">
            <svg width="290" height="2" viewBox="0 0 290 2" fill="none" xmlns="http://www.w3.org/2000/svg">
           <line y1="1.25" x2="290" y2="1.25" stroke="black" stroke-width="1.5" stroke-dasharray="6 6"/>
        </svg>
        </div>
        <div class="flex justify-between font-bold text-sm pt-2">
          <span>Total Pembayaran</span>
          <span>Rp. 202.000</span>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <div class="px-5 pb-6 flex justify-center">
      <button onclick="toggleModal()"
        class="bg-orange-500 hover:bg-orange-600 text-white font-semibold px-24 py-2 rounded-full text-sm">
        Selesai
      </button>
    </div>
  </div>

  <script>
    function toggleModal() {
      document.getElementById("konfirbankModal").classList.toggle("hidden");
    }
  </script>
</body>
</html>
