<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-b from-orange-500 to-orange-400 font-sans">

    <div class="bg-white rounded-2xl  flex w-full max-w-5xl overflow-hidden">

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
                Masuk
            </button>
        </div>


        <!-- Kanan -->
        <div class="flex w-[55%] bg-white items-center justify-center">
            <div class="w-full max-w-md p-8">
                <h2 class="text-2xl font-bold text-center text-orange-600 mb-8">Verifikasi Akun</h2>

                <!-- Login Sosial -->
                <div class="flex justify-center space-x-2 mb-3">

                </div>

                <p class="text-center text-gray-500 mb-6 mt-6 text-sm">kata sandi Anda akan diatur ulang melalui email
                </p>

                <!-- Form Login -->
                <form class="space-y-4">
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700">E-mail</label>
                        <input type="email" id="email" name="email" placeholder="Email"
                            class="mt-2 block w-full border border-gray-700 rounded-lg p-2.5 focus:ring-orange-500 focus:border-orange-500" />
                    </div>
                    <div class="flex justify-center">
                        <button type="submit"
                            class=" bg-orange-500 text-white px-40 py-3 rounded font-small text-sm hover:bg-orange-600 transition">
                            Lanjutkan
                        </button>
                    </div>
                    <a href="#" class="flex justify-center text-sm text-orange-500">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
