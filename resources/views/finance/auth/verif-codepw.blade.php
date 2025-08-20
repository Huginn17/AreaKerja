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
        <div class="flex w-full md:w-4/5 bg-white items-center justify-center">
            <div class="w-full max-w-md p-8">


                <!-- Login Sosial -->
                <div class="flex justify-center space-x-3 mb-5">

                </div>

                <div class="flex items-center justify-center">
                    <div class="max-w-md w-full px-8">
                        <h2 class="text-2xl font-bold text-orange-500 mb-4">Verifikasi Akun</h2>
                        <p class="text-gray-600 mb-4">
                            Silahkan verifikasi akun anda terlebih dahulu untuk bisa melakukan penggantian kata sandi
                        </p>
                        <p class="mb-6">
                            Kode verifikasi telah dikirim ke email <span
                                class="font-semibold">emailpengguna@gmail.com</span>.
                        </p>

                        <p class="font-semibold text-center mb-4">Kode Verifikasi</p>

                        <!-- Input OTP -->
                        <div class="flex justify-center space-x-4 mb-6">
                            <input type="text" maxlength="1"
                                class="w-12 h-12 text-center border-b-4 border-black text-lg focus:outline-none">
                            <input type="text" maxlength="1"
                                class="w-12 h-12 text-center border-b-4 border-black text-lg focus:outline-none">
                            <input type="text" maxlength="1"
                                class="w-12 h-12 text-center border-b-4 border-black text-lg focus:outline-none">
                            <input type="text" maxlength="1"
                                class="w-12 h-12 text-center border-b-4 border-black text-lg focus:outline-none">
                            <input type="text" maxlength="1"
                                class="w-12 h-12 text-center border-b-4 border-black text-lg focus:outline-none">
                            <input type="text" maxlength="1"
                                class="w-12 h-12 text-center border-b-4 border-black text-lg focus:outline-none">
                        </div>

                        <p class="text-center text-gray-500">Belum menerima kode verifikasi melalui email?</p>
                        <p class="text-center mt-1">Kirim Ulang Kode Verifikasi <span
                                class="text-orange-500 font-semibold">(00:45)</span></p><br>
                        <div class="flex justify-center">
                            <button type="submit"
                                class=" bg-orange-500 text-white px-40 py-3 rounded-lg font-small text-sm hover:bg-orange-600 transition">
                                Lanjutkan
                            </button>
                        </div><br>
                        <p class="text-center font-semibold text-orange-500 hover:text-orange-600">Ubah Email</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
