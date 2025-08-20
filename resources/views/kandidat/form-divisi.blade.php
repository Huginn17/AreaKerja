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
    <div id="divisiModal" class="fixed inset-0 bg-black/40  z-50 flex items-center justify-center">
        <div class="bg-white w-[400px] rounded-t-2xl rounded-b-2xl shadow-lg relative">

            <!-- Header -->
            <div class="flex items-center justify-between p-5">
                <h2 class="text-xl font-semibold border-b-4 border-orange-500 pb-2">Daftar Kandidat</h2>
                <button onclick="toggleModal()" class="text-gray-600 hover:text-black text-2xl">&times;</button>
            </div>
            

            <!-- Body -->
            <div class="px-5 pb-5">
                <h3 class="text-lg font-medium mb-4 mt-4">Bidang yang diminati</h3>

                <div class="mb-40">
                    
                    <select id="category"
                        class="bg-gray-0 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected="">Divisi</option>
                        <option value="PG">Programmer</option>
                        <option value="UX">UI/UX</option>
                        <option value="GA">Animasi</option>
                        <option value="PH">Sosial Media</option>
                    </select>
                </div>

                <!-- Footer -->
                <div class="flex justify-between items-center px-5 py-4">
                    <a href="{{ url('/daftar-kandidat') }}" onclick="toggleModal()"
                        class="text-orange-500 font-medium">Kembali</a>
                    <a href="{{ url('/form-metode-pembayaran') }}" class="text-orange-500 font-medium">Selanjutnya</a>
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
