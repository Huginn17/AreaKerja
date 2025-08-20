<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- Paksa semua teks pakai Poppins -->
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">

    <!-- Tombol buka modal -->
    {{-- <button onclick="toggleModal()" class="px-4 py-2 bg-orange-500 text-white rounded-lg">
        Lihat Bukti Pembayaran
    </button> --}}

    <!-- Modal -->

    <div id="konfirbankModal" class="fixed inset-0 bg-black/40 z-50 flex items-center justify-center h">
        <div class="bg-white w-[360px] rounded-2xl shadow-lg relative">

            <!-- Header -->
            <div class="flex items-center justify-between p-4 border-b">
                <h2 class="text-lg font-bold">Daftar Kandidat</h2>
                <button onclick="toggleModal()" class="text-gray-600 hover:text-black text-2xl">&times;</button>
            </div>

            <!-- Garis Orange -->
            <div class="h-[3px] bg-orange-500 w-[40px] ml-4 mt-1 mb-3 rounded"></div>

            <!-- Body -->
            <div class="px-5 pb-5">

                <!-- Box status -->
                <div class="border border-orange-500 rounded-lg p-4 flex flex-col items-center text-center mb-5">
                    <img src="{{ asset('images/logoarea.png') }}" alt="Logo" class="w-14 mb-2">
                    <div class="flex items-center justify-center w-8 h-8 rounded-full bg-green-100 mb-1">
                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" stroke-width="3"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <p class="text-green-600 font-semibold text-sm">Pembayaran Berhasil!</p>
                    <p class="text-lg font-bold mt-1">Rp. 25.700.700</p>
                </div>

                <!-- Detail transaksi -->
                <div class="border border-orange-500 rounded-lg px-3 py-3 space-y-2 text-sm">
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
                        <span class="font-medium">Jason Statham</span>
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
                    <div class="border-t border-dashed my-1"></div>
                    <div class="flex justify-between font-bold text-sm">
                        <span>Total Pembayaran</span>
                        <span>Rp. 202.000</span>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="p-4 border-t flex justify-center">
                <button onclick="toggleModal()"
                    class="bg-orange-500 text-white font-semibold px-32 py-2 rounded-full text-sm">
                    Selesai
                </button>
            </div>
        </div>
    </div>

    <script>
        function toggleModal() {
            document.getElementById("resultModal").classList.toggle("hidden");
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>
