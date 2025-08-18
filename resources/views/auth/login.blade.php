<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login | Areakerja</title>
  <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
 
<body class="bg-gray-100">
  <div class="flex min-h-screen">

    
   <!-- Bagian Kiri -->
<div class="hidden md:flex w-2/5 h-screen bg-contain bg-center relative" 
     style="background-image: url('{{ asset('images/gambar2.jpg') }}')">
    <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center text-white px-8">
        <img src="{{  asset('images/logoarea.png') }}" alt="Logo" class="w-36 mb-6">
        <h2 class="text-3xl font-bold mb-2">Hallo, Pekerja 🖐</h2>
        <p class="mb-6 text-center">
            untuk tetap terhubung dengan kami,silakan masuk dengan informasi pribadi Anda
        </p>
        <a href=""
           class="border border-white px-6 py-2 rounded-full hover:bg-white hover:text-black transition">
            DAFTAR
        </a>
    </div>
</div>

    <!-- Kanan -->
    <div class="flex w-full md:w-4/5 bg-white items-center justify-center">
      <div class="w-full max-w-md p-8">
        <h2 class="text-2xl font-bold text-center text-orange-600 mb-6">Masuk</h2>

        <!-- Login Sosial -->
        <div class="flex justify-center space-x-3 mb-5">
          <button class="p-2 border rounded-full hover:bg-gray-100">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
              <path
                d="M21.35 11.1H12v2.9h5.35c-.25 1.4-.95 2.5-2 3.25v2.7h3.25c1.9-1.75 3-4.3 3-7.35 0-.65-.05-1.25-.25-1.8z"
                fill="#4285F4"></path>
              <path
                d="M12 22c2.7 0 4.9-.9 6.55-2.45l-3.25-2.7c-.9.6-2.05 1-3.3 1-2.55 0-4.75-1.7-5.55-4.05H3.05v2.55C4.7 19.55 8.05 22 12 22z"
                fill="#34A853"></path>
              <path
                d="M6.45 13.8c-.2-.6-.35-1.25-.35-1.95s.15-1.35.35-1.95V7.35H3.05A9.95 9.95 0 0 0 2 12c0 1.55.35 3.05 1.05 4.35l3.4-2.55z"
                fill="#FBBC05"></path>
              <path
                d="M12 4.75c1.45 0 2.75.5 3.8 1.55l2.8-2.8C16.9 1.7 14.7.75 12 .75 8.05.75 4.7 3.2 3.05 6.65l3.4 2.55C7.25 6.45 9.45 4.75 12 4.75z"
                fill="#EA4335"></path>
            </svg>
          </button>
        
         <div class="flex gap-3">
 
  <button class="w-10 h-10 flex items-center justify-center border rounded-full hover:bg-gray-100 text-gray-700 font-bold">
    f
  </button>

  
  <button class="w-10 h-10 flex items-center justify-center border rounded-full hover:bg-gray-100 text-gray-700 font-bold">
    in
  </button>
</div>

        </div>

        <p class="text-center text-gray-500 mb-6">gunakan email Anda untuk pendaftaran</p>

        <!-- Form Login -->
        <form class="space-y-4">
          <div>
            <label for="username" class="block text-sm font-medium text-gray-700">Nama Pengguna</label>
            <input type="text" id="username" name="username" placeholder="Nama Pengguna"
              class="mt-1 block w-full border border-gray-300 rounded-lg p-2.5 focus:ring-orange-500 focus:border-orange-500" />
          </div>
          <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Kata Sandi</label>
            <input type="password" id="password" name="password" placeholder="Kata Sandi"
              class="mt-1 block w-full border border-gray-300 rounded-lg p-2.5 focus:ring-orange-500 focus:border-orange-500" />
          </div>
          <div class="flex justify-between items-center">
            <label class="flex items-center">
              <input type="checkbox" class="mr-2 border"> Ingat saya
            </label>
            <a href="#" class="text-sm text-orange-500 hover:underline">Lupa kata sandi?</a>
          </div>
          <button type="submit"
            class="w-full bg-orange-500 text-white py-2.5 rounded-full font-medium hover:bg-orange-600 transition">
            MASUK
          </button>
          <p class="text-center text-sm mt-4">Tidak Memiliki Akun? <a href="#" class="text-orange-500 font-medium">Daftar
              Sekarang</a></p>
        </form>
      </div>
    </div>
  </div>
</body>

</html>
