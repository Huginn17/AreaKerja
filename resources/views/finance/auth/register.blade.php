<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrasi</title>
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

<body class="min-h-screen flex items-center justify-center bg-orange-500">
    <div class="w-full max-w-5xl px-6 py-12 bg-gradient-to-r from-orange-500 to-yellow-300 rounded-md">
        <!-- Wrapper dengan padding agar form tidak mentok -->
        <div class="w-full max-w-5xl px-6 py-12">
            <div class="bg-white rounded-md flex overflow-hidden">

                <!-- Bagian Kiri (Form Registrasi) -->
                <div class="w-[50%] p-10">
                    <h2 class="text-center text-xl font-bold text-orange-600 mb-4">Buat Akun</h2>

                    <!-- Logo -->
                    <div class="absolute top-6 left-32 flex items-center gap-2">
                        <img src="{{ asset('images/logo_area_kerja_putih.png') }}" alt="Logo" class="w-8 h-8">
                        <span class="font-semibold text-white">areakerja.com</span>
                    </div>

                    <!-- Social Login -->
                    <div class="flex justify-center gap-3 mb-5">
                        <button
                            class="w-10 h-10 flex text-1xl items-center justify-center border rounded-full hover:bg-gray-100 text-gray-700 font-bold">
                            G
                        </button>

                        <button
                            class="w-10 h-10 flex items-center justify-center border rounded-full hover:bg-gray-100 text-gray-700 font-bold">
                            f
                        </button>


                        <button
                            class="w-10 h-10 flex items-center justify-center border rounded-full hover:bg-gray-100 text-gray-700 font-bold">
                            in
                        </button>
                    </div>

                    <!-- Form -->
                    <form action="#" class="space-y-3">
                        <div>
                            <label class="block text-sm font-medium m-2">Nama Pengguna</label>
                            <input type="text" placeholder="Nama Pengguna"
                                class="w-full border-gray-700 border rounded-md p-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-400">
                        </div>
                        <div>
                            <label class="block text-sm font-medium m-2">E-mail</label>
                            <input type="email" placeholder="E-mail"
                                class="w-full border-gray-700 border rounded-md p-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-400">
                        </div>
                        <div>
                            <label class="block text-sm font-medium m-2">No. Tlp</label>
                            <input type="text" placeholder="No. Tlp"
                                class="w-full border-gray-700 border rounded-md p-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-400">
                        </div>
                        <div>
                            <label class="block text-sm font-medium m-2">Kata Sandi</label>
                            <div class="relative">
                                <input type="password" placeholder="Kata Sandi"
                                    class="w-full border-gray-700 border rounded-md p-2 pr-9 text-sm focus:outline-none focus:ring-2 focus:ring-orange-400">
                                <span class="absolute right-3 top-2 text-gray-500 cursor-pointer text-xs">👁️</span>
                            </div>
                        </div>

                        <!-- Checkbox -->
                        <div class="flex items-center text-xs">
                            <input type="checkbox" class="mr-2 accent-black border border-black">
                            <span>Saya menyetujui <a href="#" class="text-orange-500 font-semibold">Syarat dan
                                    Ketentuan</a> yang berlaku</span>
                        </div>

                        <!-- Tombol Daftar -->
                        
                        <button onclick="openModal()"
                            class="w-full  bg-orange-500 text-white  font-bold rounded-full py-2 text-sm hover:bg-orange-600 ">
                            Daftar
                        </button>
                    </form>
                </div>

                <!-- Bagian Kanan -->
                <div class="w-[55%] text-white flex flex-col items-center justify-center relative p-6">
                    <h2 class="text-lg font-bold text-center mb-6">Selamat Datang Kembali !<br>Finance Area Kerja</h2>
                    <div class="mb-6">
                        <!-- Gambar ilustrasi -->
                        <img src="{{ asset('images/wong_kang.png') }}" alt="Ilustrasi" class="w-auto mx-auto">
                    </div>
                    <button
                        class="border-2 border-white px-8 py-1.5 rounded-full text-sm hover:bg-white hover:text-orange-500 transition">MASUK</button>
                </div>

            </div>
        </div>
    </div>
    @include('finance.auth.modal-register')
</body>

</html>
