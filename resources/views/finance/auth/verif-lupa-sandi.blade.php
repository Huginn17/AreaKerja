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

        {{-- Bagian Kiri  --}}
        <div
            class="w-1/2 bg-gradient-to-b from-orange-500 to-orange-400 text-white flex flex-col items-center justify-center p-10">
             {{-- Logo  --}}
            <div class="absolute top-6 left-6 flex items-center gap-2">
                <img src="{{ asset('images/logo_area_kerja_putih.png') }}" alt="Logo" class="w-8 h-8">
                <span class="font-semibold">areakerja.com</span>
            </div>
             {{-- Welcome  --}}
            <h2 class="text-2xl font-bold text-center mb-6 leading-snug">
                Selamat Datang Kembali ! <br> Finance Area Kerja
            </h2>
             {{-- Ilustrasi  --}}
            <img src="{{ asset('images/wong_kang.png') }}" alt="Ilustrasi" class="w-auto mb-6">
             {{-- Button Daftar  --}}
            <button
                class="border-2 border-white px-10 py-2 rounded-full font-semibold hover:bg-white hover:text-orange-500 transition">
                Masuk
            </button>
        </div>


     {{-- Kanan  --}}
        <div class="flex w-full md:w-4/5 bg-white items-center justify-center">
            <div class="w-full max-w-md ">
                 {{-- Bagian Kanan  --}}
                <div class=" flex items-center justify-center bg-white">
                    <div class="max-w-md w-full">
                        <h2 class="text-2xl font-bold text-orange-600 mb-2">Lupa Kata Sandi</h2>
                        <p class="text-gray-600 text-sm mb-6">Masukan kata sandi anda.<br>kata sandi harus mengandung:
                        </p>

                         {{-- Verifikasi Syarat Password --}}
                        <div class="grid grid-cols-5 gap-4 text-center mb-6">
                            <div><span class="font-bold">8+</span><br><span class="text-xs">Karakter</span></div>
                            <div><span class="font-bold">AA</span><br><span class="text-xs">Huruf Besar</span></div>
                            <div><span class="font-bold">aa</span><br><span class="text-xs">Huruf Kecil</span></div>
                            <div><span class="font-bold">123</span><br><span class="text-xs">Angka</span></div>
                            <div><span class="font-bold">@$#</span><br><span class="text-xs">Simbol</span></div>
                        </div>

                         {{-- Form  --}}
                        <form action="#" method="POST" class="space-y-4">
                            @csrf
                            <div>
                                <label class="block text-sm font-medium m-2">Kata Sandi Baru</label>
                                <div class="relative">
                                    <input type="password" name="password" placeholder="Kata Sandi"
                                        class="w-full border-gray-500 border rounded-md px-4 py-2 focus:ring-2 focus:ring-orange-500">
                                    <span class="absolute right-3 top-2.5 text-gray-500 cursor-pointer">👁</span>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium m-2">Konfirmasi Kata Sandi</label>
                                <div class="relative">
                                    <input type="password" name="password_confirmation" placeholder="Kata Sandi"
                                        class="w-full border-gray-500 border rounded-md px-4 py-2 focus:ring-2 focus:ring-orange-500">
                                    <span class="absolute right-3 top-2.5 text-gray-500 cursor-pointer">👁</span>
                                </div>
                            </div>

                            <button type="submit"
                                class="w-full bg-orange-600 text-white py-2 rounded-md hover:bg-orange-700 transition">
                                Ulang Kata Sandi
                            </button>
                        </form>

                        <div class="text-center mt-4">
                            <a href="#" class="text-orange-600 font-medium hover:underline">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
