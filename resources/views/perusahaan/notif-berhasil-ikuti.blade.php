<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Modal Konfirmasi Event</title>
    <script src="https://cdn.tailwindcss.com"></script> <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- Paksa semua teks pakai Poppins  --}}
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>

</head>

<body class="flex items-center justify-center h-screen bg-gray-100">
    <!-- Overlay Modal -->
    <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <!-- Box Modal -->
        <div class="bg-white w-[400px] rounded-xl shadow-lg overflow-hidden animate-fadeIn">

            <!-- Header -->
            <div class="bg-orange-500 p-3 flex justify-center items-center">
                <img src="{{ asset('images/logo_area_kerja_putih.png') }}" alt="Logo" class="h-6">
                 <span class="text-white font-semibold ml-2">areakerja.com</span>
                <!-- Ganti dengan logo asli -->
            </div>

            <!-- Isi -->
            <div class="p-6 flex flex-col items-center text-center space-y-6">

                <!-- Ikon tanda seru -->
                <div
                    class="w-12 h-12 rounded-full bg-green-500 flex items-center justify-center text-white text-3xl font-bold">
                   ✓
                </div>

                <!-- Teks -->
                <p class="text-sm font-medium">
                  Terima kasih telah mengikuti event kami,<br>kami akan menghubungi anda dalam waktu dekat
                </p>

                <!-- Tombol -->
                <div class="flex space-x-6">
                    <button class="bg-green-600 text-white px-8 py-2 rounded-md font-semibold">
                        Selesai
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('modal').classList.remove('hidden');
            document.getElementById('modal').classList.add('flex');
        }

        function closeModal() {
            document.getElementById('modal').classList.remove('flex');
            document.getElementById('modal').classList.add('hidden');
        }
    </script>

    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeIn {
            animation: fadeIn 0.3s ease-out;
        }
    </style>
</body>

</html>
