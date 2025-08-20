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
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">

    {{-- <!-- Tombol buka modal -->
  <button onclick="toggleModal()" 
    class="px-4 py-2 bg-orange-500 text-white rounded-lg">
    Buka Modal
  </button> --}}

    <!-- Modal -->
    <div id="qrModal" class="fixed inset-0 bg-black/40  z-50 flex items-center justify-center">
        <div class="bg-white w-[400px] rounded-t-2xl rounded-b-2xl shadow-lg relative">

            <!-- Header -->
            <div class="flex items-center justify-between p-5 border-b">
                <h2 class="text-xl font-bold">Daftar Kandidat</h2>
                <button onclick="toggleModal()" class="text-gray-600 hover:text-black text-2xl">&times;</button>
            </div>

            <!-- Garis Orange -->
            <div class="h-[3px] bg-orange-500 w-[150px] ml-5 mt-1 mb-4 rounded"></div>

            <!-- Body -->
            <div class="px-5 pb-5">
                <div class="mb-4">

               <img src="{{ asset('images/barcode.jpg') }}" alt="bar Code" class="mx-auto">
                </div>
                <img src="{{ asset('images/qr.jpg') }}" alt="QR Code" class="mx-20 w-44 h-35 mb-4">

                <!-- Footer -->
                <div class="flex justify-between items-center px-5 py-4 border-t">
                    <a href="{{ url('/form-metode-pembayaran') }}" onclick="toggleModal()"
                        class="text-orange-500 font-semibold">Kembali</a>
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
