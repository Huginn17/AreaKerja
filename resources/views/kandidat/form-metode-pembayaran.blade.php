<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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

    {{-- <!-- Tombol buka modal -->
  <button onclick="toggleModal()" 
    class="px-4 py-2 bg-orange-500 text-white rounded-lg">
    Buka Modal
  </button> --}}

    <!-- Modal -->
    <div id="paymentModal" class="fixed inset-0 bg-black/40  z-50 flex items-center justify-center">
        <div class="bg-white w-[400px] rounded-t-2xl rounded-b-2xl shadow-lg relative">

            <!-- Header -->
            <div class="flex items-center justify-between p-5">
                <h2 class="text-xl font-semibold border-b-4 border-orange-500 pb-2">Daftar Kandidat</h2>
                <button onclick="toggleModal()" class="text-gray-600 hover:text-black text-2xl">&times;</button>
            </div>

            <!-- Body -->
            <div class="px-5 pb-5">
                <h3 class="text-lg font-medium mb-4">Metode Pembayaran</h3>

                <!-- Dropdown (dummy) -->
                <div class="border rounded-lg px-4 py-3 flex justify-between items-center cursor-pointer mb-4">
                    <span class="flex items-center gap-2 text-gray-700">
                        <span>⇆</span> Transfer Bank
                    </span>
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>

                <!-- List Bank -->
                <div class="space-y-3">

                    <!-- Bank BCA -->
                    <label class="flex items-center justify-between border rounded-lg px-4 py-3 cursor-pointer">
                        <div class="flex items-center gap-3">
                            <img src="https://seeklogo.com/images/B/bca-bank-central-asia-logo-1CCF1F6C34-seeklogo.com.png"
                                alt="BCA" class="w-8 h-8">
                            <span class="text-gray-800 font-medium">Bank BCA</span>
                        </div>
                        <input type="radio" name="bank" class="text-orange-500 focus:ring-orange-500">
                    </label>

                    <!-- Bank BNI -->
                    <label class="flex items-center justify-between border rounded-lg px-4 py-3 cursor-pointer">
                        <div class="flex items-center gap-3">
                            <img src="https://seeklogo.com/images/B/bank-negara-indonesia-bni-logo-23C9B497C4-seeklogo.com.png"
                                alt="BNI" class="w-8 h-8">
                            <span class="text-gray-800 font-medium">Bank BNI</span>
                        </div>
                        <input type="radio" name="bank" class="text-orange-500 focus:ring-orange-500">
                    </label>

                    <!-- Bank BRI -->
                    <label class="flex items-center justify-between border rounded-lg px-4 py-3 cursor-pointer">
                        <div class="flex items-center gap-3">
                            <img src="https://seeklogo.com/images/B/bank-rakyat-indonesia-bri-logo-569BB394C6-seeklogo.com.png"
                                alt="BRI" class="w-8 h-8">
                            <span class="text-gray-800 font-medium">Bank BRI</span>
                        </div>
                        <input type="radio" name="bank" class="text-orange-500 focus:ring-orange-500">
                    </label>

                    <!-- QRIS -->
                    <label class="flex items-center justify-between border rounded-lg px-4 py-3 cursor-pointer">
                        <div class="flex items-center gap-3">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/6/6c/QRIS_logo.svg" alt="QRIS"
                                class="w-12">
                            <span class="text-gray-800 font-medium">QRIS</span>
                        </div>
                        <input type="radio" name="bank" class="text-orange-500 focus:ring-orange-500">
                    </label>
                </div>
            </div>

            <!-- Footer -->
            <div class="flex justify-between items-center px-5 py-4">
                <a href="{{ url('/form-divisi') }}" onclick="toggleModal()"
                    class="text-orange-500 font-semibold">Kembali</a>
                <a href="{{ url('/konfir-bank') }}" class="text-orange-500 font-semibold">Selanjutnya</a>
            </div>
        </div>
    </div>

    <script>
        function toggleModal() {
            document.getElementById("paymentModal").classList.toggle("hidden");
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>
