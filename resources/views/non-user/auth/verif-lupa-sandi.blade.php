<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password | Areakerja</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="flex min-h-screen w-screen overflow-x-hidden">

        <!-- Background kiri -->
        <section class="relative lg:h-auto w-2/4 hidden lg:block">
            <img src="{{ asset('images/gambar2.jpg') }}" alt="Background"
                class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>

            <div class="relative z-10 flex flex-col items-center justify-center h-full text-center text-white px-6">
                <h1 class="text-3xl font-bold mt-[-45%] mb-10">Hallo, Pekerja</h1>
                <p class="text-sm mb-10">Untuk tetap terhubung dengan kami, silakan<br> masuk dengan informasi pribadi
                    Anda</p>
                <a href="{{ route('login') }}"
                    class="px-20 py-4 border border-white rounded-full hover:bg-white hover:text-black transition">
                    Masuk
                </a>
            </div>
        </section>

        <!-- Form Reset Password -->
        <div class="flex w-full lg:w-4/5 bg-white items-center justify-center">
            <div class="w-full max-w-md px-6 py-10">
                <h2 class="text-2xl font-semibold text-orange-600 mb-2">Lupa Kata Sandi</h2>
                <p class="text-gray-600 text-sm mb-6">Masukkan kata sandi baru.<br>Kata sandi harus mengandung:</p>

                <!-- Syarat Password -->
                <!-- Indikator Password -->
                <div class="grid grid-cols-5 gap-4 text-center mb-6 text-xs">
                    <div id="rule-length" class="text-red-500">
                        <span class="font-bold">8+</span><br>Karakter
                    </div>
                    <div id="rule-uppercase" class="text-red-500">
                        <span class="font-bold">AA</span><br>Huruf Besar
                    </div>
                    <div id="rule-lowercase" class="text-red-500">
                        <span class="font-bold">aa</span><br>Huruf Kecil
                    </div>
                    <div id="rule-number" class="text-red-500">
                        <span class="font-bold">123</span><br>Angka
                    </div>
                    <div id="rule-symbol" class="text-red-500">
                        <span class="font-bold">@#$</span><br>Simbol
                    </div>
                </div>


                <form id="reset-passwordForm" action="{{ route('password.update.pelamar', ['token' => $token]) }}"
                    method="POST" class="space-y-4">
                    @csrf

                    <input type="hidden" name="email" value="{{ $email }}">
                    <input type="hidden" name="token" value="{{ $token }}">

                    <!-- Password Baru -->

                    <div>
                        <label class="block text-sm font-medium mb-1">Kata Sandi Baru</label>
                        <input type="password" id="password" name="password" placeholder="Kata Sandi"
                            class="w-full border rounded-md px-4 py-2 focus:ring-2 focus:ring-orange-500" required>
                    </div>


                    <!-- Konfirmasi Password -->
                    <div>
                        <label class="block text-sm font-medium mb-1">Konfirmasi Kata Sandi</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            placeholder="Kata Sandi"
                            class="w-full border rounded-md px-4 py-2 focus:ring-2 focus:ring-orange-500" required>
                    </div>

                    {{-- <!-- Indikator -->
                    <div class="text-sm text-gray-600 mb-4">
                        <ul class="space-y-1">
                            <li id="length" class="text-red-500">❌ Minimal 8 karakter</li>
                            <li id="uppercase" class="text-red-500">❌ Huruf Besar (A-Z)</li>
                            <li id="lowercase" class="text-red-500">❌ Huruf Kecil (a-z)</li>
                            <li id="number" class="text-red-500">❌ Angka (0-9)</li>
                            <li id="symbol" class="text-red-500">❌ Simbol (@$!%*?&#)</li>
                        </ul>
                    </div> --}}

                    <!-- Submit -->
                    <button type="submit"
                        class="w-full bg-orange-600 text-white py-2 rounded-md hover:bg-orange-700 transition">
                        Ulang Kata Sandi
                    </button>
                </form>

                {{-- modal lupa pw --}}
                <div id="successModal" class="hidden fixed inset-0 z-50 items-center justify-center bg-black/50">
                    <!-- Konten Modal -->
                    <div
                        class="relative bg-white rounded-2xl shadow-lg w-[90%] max-w-md p-8 text-center animate-fadeIn">

                        <!-- Tombol X -->
                        <button onclick="closeModal()"
                            class="absolute top-3 right-3 text-gray-500 hover:text-gray-700 text-xl font-bold">
                            &times;
                        </button>

                        <!-- Judul -->
                        <h2 class="text-2xl font-bold mb-3">
                            Password Anda Berhasil Diperbarui
                        </h2>

                        <!-- Pesan -->
                        <p class="text-gray-700 mb-6">
                            Kata sandi akun Anda telah berhasil diubah.
                            Silakan masuk kembali untuk melanjutkan.
                        </p>

                        <!-- Gambar ilustrasi -->
                        <div class="flex justify-center mb-6">
                            <img src="{{ asset('images/orang.png') }}" alt="Ilustrasi" class="w-30 h-28">
                        </div>

                        <!-- Tombol aksi -->
                        <div class="flex justify-center gap-6">
                            <button id="goLogin"
                                class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-lg">
                                Masuk
                            </button>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <a href="{{ route('email.ubah') }}" class="font-semibold text-orange-500 hover:text-orange-600">
                        Ubah Email
                    </a>
                </div>
            </div>
        </div>
    </div>



    <!-- Script Validasi Password -->
    <script>
        const password = document.getElementById('password');

        password.addEventListener('input', function() {
            const val = password.value;

            // Aturan
            document.getElementById('rule-length').className = val.length >= 8 ? "text-green-500" : "text-red-500";
            document.getElementById('rule-uppercase').className = /[A-Z]/.test(val) ? "text-green-500" :
                "text-red-500";
            document.getElementById('rule-lowercase').className = /[a-z]/.test(val) ? "text-green-500" :
                "text-red-500";
            document.getElementById('rule-number').className = /[0-9]/.test(val) ? "text-green-500" :
                "text-red-500";
            document.getElementById('rule-symbol').className = /[@$!%*?&#]/.test(val) ? "text-green-500" :
                "text-red-500";
        });
    </script>
    {{-- modal lupa pw --}}
    <script>
        document.getElementById("reset-passwordForm").addEventListener("submit", async function(e) {
            e.preventDefault();

            let formData = new FormData(this);

            let response = await fetch(this.action, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value,
                    "Accept": "application/json",
                    "X-Requested-With": "XMLHttpRequest"
                },
                body: formData
            });

            let data = await response.json();

            // =============================
            //  Jika VALIDASI GAGAL
            // =============================
            if (data.errors) {
                if (data.errors.password) {
                    let list = "";
                    data.errors.password.forEach(msg => {
                        list += `<li style="text-align:center;">${msg}</li>`;
                    });

                    Swal.fire({
                        icon: 'error',
                        title: 'Password tidak valid',
                        html: `<ul style="text-align:center; font-size:14px; list-style:none; padding:0;">${list}</ul>`,
                        confirmButtonColor: '#d33'
                    });

                    return;
                }


                if (data.errors.email) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Email tidak valid',
                        text: data.errors.email[0],
                        confirmButtonColor: '#d33'
                    });
                    return;
                }
            }

            // =============================
            //  Jika TOKEN SALAH
            // =============================
            if (data.success === false && data.message) {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: data.message,
                    confirmButtonColor: '#d33'
                });
                return;
            }

            // =============================
            //  Jika BERHASIL
            // =============================
            if (data.success) {
                let modal = document.getElementById("successModal");
                modal.classList.remove("hidden");
                modal.classList.add("flex");
                return;
            }

            // Jika error lain
            Swal.fire({
                icon: 'error',
                title: 'Kesalahan',
                text: 'Terjadi kesalahan, coba lagi.',
                confirmButtonColor: '#d33'
            });
        });

        document.getElementById("goLogin").addEventListener("click", function() {
            window.location.href = "{{ route('login') }}";
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>
