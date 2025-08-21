<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Akun</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="flex min-h-screen">

        {{-- Background dengan overlay  --}}
        <section class="relative h-screen w-2/4">
            <img src="{{ asset('images/gambarkom.jpg') }}" alt="Background"
                class="absolute inset-0 w-full h-full object-cover">

            <!-- Overlay hitam transparan -->
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>

            <!-- Konten -->
            <div class="relative z-10 flex flex-col items-center justify-center h-full text-center text-white px-6 mt">

                <!-- Logo -->
                <div class="absolute top-6 left-6 flex items-center">
                    <img src="{{ asset('images/logo_area_kerja_putih.png') }}" alt="Logo" class="h-12 w-12">
                    <span class="font-semibold mb-1">areakerja.com</span>
                </div>

                <!-- Text -->
                <h1 class="text-3xl font-bold mt-[10%] mb-10">Admin Area Kerja</h1>
                <p class="text-sm mb-10">untuk tetap terhubung dengan kami, silakan<br> masuk dengan informasi pribadi
                    Anda</p>

                <!-- Button -->
                <a href="{{ url('/register') }}"
                    class="px-20 py-4 border border-white rounded-full hover:bg-white hover:text-black transition">
                    DAFTAR
                </a>
            </div>
        </section>

    <!-- Right -->
    <div class="flex w-full md:w-4/2 bg-white items-center justify-center">
            <div class="w-full max-w-md p-8">
            <h2 class="text-2xl font-bold mb-4">Verifikasi Akun </h2>
            <p class="text-gray-600 text-sm mb-2">
                Silahkan verifikasi akun anda terlebih dahulu untuk bisa melakukan penggantian kata sandi
            </p>
            <p class="text-gray-600 text-sm mb-6">
                Kode verifikasi telah dikirim ke email <span
                    class="font-medium text-black">emailpengguna@gmail.com</span>.
            </p>
            <h3 class="text-lg font-semibold mb-4">Kode Verifikasi</h3>

            <!-- OTP Input -->
            <div class="flex justify-between mb-6">
                <input type="text" maxlength="1"
                    class="w-12 h-12 border-b-2 border-black text-center text-xl focus:outline-none">
                <input type="text" maxlength="1"
                    class="w-12 h-12 border-b-2 border-black text-center text-xl focus:outline-none">
                <input type="text" maxlength="1"
                    class="w-12 h-12 border-b-2 border-black text-center text-xl focus:outline-none">
                <input type="text" maxlength="1"
                    class="w-12 h-12 border-b-2 border-black text-center text-xl focus:outline-none">
                <input type="text" maxlength="1"
                    class="w-12 h-12 border-b-2 border-black text-center text-xl focus:outline-none">
                <input type="text" maxlength="1"
                    class="w-12 h-12 border-b-2 border-black text-center text-xl focus:outline-none">
            </div>

            <!-- Resend -->
            <p class="text-gray-500 text-sm mb-2">Belum menerima kode verifikasi melalui email?</p>
            <p class="text-sm">Kirim Ulang Kode Verifikasi
                <span id="countdown" class="text-orange-500 font-semibold">(00:45)</span>
            </p>
        </div>
    </div>

    <script>
        let timeLeft = 45;
        const countdownEl = document.getElementById("countdown");

        function startCountdown() {
            const timer = setInterval(() => {
                if (timeLeft <= 0) {
                    clearInterval(timer);
                    countdownEl.textContent = "(00:00)";
                    countdownEl.classList.remove("text-orange-500");
                    countdownEl.classList.add("text-blue-600", "cursor-pointer");
                    countdownEl.textContent = " Kirim Ulang";
                } else {
                    let minutes = String(Math.floor(timeLeft / 60)).padStart(2, '0');
                    let seconds = String(timeLeft % 60).padStart(2, '0');
                    countdownEl.textContent = `(${minutes}:${seconds})`;
                    timeLeft--;
                }
            }, 1000);
        }

        startCountdown();
    </script>

</body>

</html>
