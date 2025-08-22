<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- Paksa semua teks pakai Poppins -->
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-b from-orange-500 to-orange-400 font-sans">

    <div class="bg-white rounded-2xl shadow-lg flex w-11/12 max-w-5xl overflow-hidden">

        <!-- Bagian Kiri -->
        <div
            class="w-1/2 bg-gradient-to-b from-orange-500 to-orange-400 text-white flex flex-col items-center justify-center p-10">
            <!-- Logo -->
            <div class="absolute top-6 left-6 flex items-center gap-2">
                <img src="{{ asset('images/logo_area_kerja_putih.png') }}" alt="Logo" class="w-8 h-8">
                <span class="font-semibold">areakerja.com</span>
            </div>
            <!-- Welcome -->
            <h2 class="text-2xl font-bold text-center mb-6 leading-snug">
                Selamat Datang Kembali ! <br> Finance Area Kerja
            </h2>
            <!-- Ilustrasi -->
            <img src="{{ asset('images/wong_kang.png') }}" alt="Ilustrasi" class="w-auto mb-6">
            <!-- Button Daftar -->
            <button
                class="border-2 border-white px-10 py-2 rounded-full font-semibold hover:bg-white hover:text-orange-500 transition">
                DAFTAR
            </button>
        </div>

        <!-- Bagian Kanan (Login Form) -->
        <div class="w-1/2 p-10 flex flex-col justify-center">
            <h2 class="text-center text-2xl font-bold text-orange-600 mb-4">Masuk</h2>

            <!-- Social Login -->
            <div class="flex justify-center space-x-3 mb-5">

        
          <div class="flex gap-3">
              <button class="w-10 h-10 flex text-1xl items-center justify-center border rounded-full hover:bg-gray-100 text-gray-700 font-bold">
               G
              </button>

              <button class="w-10 h-10 flex items-center justify-center border rounded-full hover:bg-gray-100 text-gray-700 font-bold">
               f
              </button>

  
              <button class="w-10 h-10 flex items-center justify-center border rounded-full hover:bg-gray-100 text-gray-700 font-bold">
               in
              </button>
          </div>

        </div>
            <!-- Keterangan -->
            <p class="text-center text-gray-400 text-sm mb-6">gunakan email Anda untuk pendaftaran</p>

            <!-- Form -->
            <form action="#" class="space-y-4">
                <div>
                    <label class="space-y-4 block text-sm font-medium m-2">Nama Pengguna</label>
                    <input type="text" placeholder="Nama Pengguna"
                        class="w-full border-gray-700 border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-orange-400">
                </div>
                <div>
                    <label class="block text-sm font-medium m-2">Kata Sandi</label>
                    <div class="relative">
                        <input type="password" placeholder="Kata Sandi"
                            class="w-full border-gray-700 border rounded-md p-2 pr-10 focus:outline-none focus:ring-2 focus:ring-orange-400">
                        <span class="absolute right-3 top-2 text-gray-500 cursor-pointer">👁️</span>
                    </div>
                </div>

                <!-- Ingat saya + lupa kata sandi -->
                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center">
                        <input type="checkbox" class="mr-2">
                        Ingat saya
                    </label>
                    <a href="#" class="text-orange-500 hover:underline">Lupa kata sandi</a>
                </div>

                <!-- Tombol Masuk -->
                <div class="flex justify-center">
                <button
                    class="w-40 bg-orange-500 text-white font-bold rounded-full py-3 hover:bg-orange-600">MASUK</button>
                </div>
            </form>

            <!-- Daftar link -->
            <p class="text-center text-sm mt-4 text-gray-600">
                Tidak Memiliki Akun?
                <a href="#" class="text-orange-500 font-semibold hover:underline">Daftar Sekarang</a>
            </p>
        </div>

    </div>

</body>

</html>
