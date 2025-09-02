<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - AreaKerja</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Paksa semua teks pakai Poppins -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class=" bg-gray-100 flex">

    <!-- Container -->
    <div class="flex w-full">

        <!-- Bagian kiri (Form) -->
        <div class="flex w-full md:w-4/5 bg-white items-center justify-center px-10">
            <div class="w-full max-w-md">

                <!-- Logo + Judul -->
                <div class="absolute top-6 left-6 gap-1 flex items-center">
                    <img src="{{ asset('images/logoarea.png') }}" alt="Logo" class="h-12 w-12">
                    <span class="font-bold mb-1 text-orange-500">areakerja.com</span>
                </div>


                <div class="pt-20">
                    <h2 class="text-2xl font-semibold text-center text-orange-600 mb-6">Buat Akun</h2>
                </div>

                <!-- Tombol Sosial -->
                <div class="flex space-x-4 mb-6 justify-center">
                    <button
                        class="w-10 h-10 flex text-2xl items-center justify-center border rounded-full hover:bg-gray-100 text-gray-700 font-bold">G</button>
                    <button
                        class="w-10 h-10 flex items-center justify-center border rounded-full hover:bg-gray-100 text-gray-700 font-bold">f</button>
                    <button
                        class="w-10 h-10 flex items-center justify-center border rounded-full hover:bg-gray-100 text-gray-700 font-bold">in</button>
                </div>

                <!-- Pilih Role -->
                <div class="flex justify-center mb-6">
                    <div class="bg-gray-200 rounded-full p-1 flex space-x-1">
                        <!-- Tombol Aktif -->
                        <button id="btn_pelamar"
                            class="bg-orange-500 text-white px-6 py-2 rounded-full text-sm font-semibold">
                            Pelamar
                        </button>
                        <!-- Tombol Tidak Aktif -->
                        <button id="btn_perusahaan"
                            class="bg-gray-200 text-gray-600 px-6 py-2 rounded-full text-sm font-semibold">
                            Perusahaan
                        </button>
                    </div>
                </div>

                {{-- form register pelamar --}}
                <div id="regis_pelamar" class="overflow-hidden">
                    <form id="registerForm" action="{{ route('registerproses') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="username" class="block text-sm font-medium text-gray-700 m-2">Nama
                                Pengguna</label>
                            <input type="text" id="username_pelamar" name="username" placeholder="Nama Pengguna"
                                class="w-full px-4 py-3 border border-gray-700 rounded-lg focus:ring focus:ring-orange-300 focus:outline-none">
                            <p class="text-red-500 text-sm mt-1 error-message" data-field="username"></p>
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 m-2">Email</label>
                            <input type="email" id="email" name="email" placeholder="E-mail"
                                class="w-full px-4 py-3 border border-gray-700 rounded-lg focus:ring focus:ring-orange-300 focus:outline-none">
                            <p class="text-red-500 text-sm mt-1 error-message" data-field="email"></p>
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 m-2">No.Tlp</label>
                            <input type="text" id="phone_pelamar" name="telepon_pelamar" placeholder="No. Tlp"
                                class="w-full px-4 py-3 border border-gray-700 rounded-lg focus:ring focus:ring-orange-300 focus:outline-none">
                            <p class="text-red-500 text-sm mt-1 error-message" data-field="telepon_pelamar"></p>
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 m-2">Kata Sandi</label>
                            <input type="password" id="password_pelamar" name="password" placeholder="Kata Sandi"
                                class="w-full px-4 py-3 border border-gray-700 rounded-lg focus:ring focus:ring-orange-300 focus:outline-none">
                            <p class="text-red-500 text-sm mt-1 error-message" data-field="password"></p>
                        </div>

                        <!-- Checkbox -->
                        <label class="flex items-center text-sm font-medium gap-1">
                            <input type="checkbox" class="mr-2">
                            Saya menyetujui <a href="{{ url('syarat/ketentuan') }}" class="text-orange-500"> Syarat dan
                                Ketentuan </a> yang
                            berlaku
                        </label>

                        <input type="hidden" name="role" value="pelamar">

                        <!-- Tombol submit harus di dalam form -->
                        <button type="submit"
                            class="w-full py-3 bg-orange-500 text-white rounded-lg  font-semibold hover:bg-orange-600 mt-6">
                            Daftar
                        </button>
                    </form>
                </div>
                {{-- end form register pelamar  --}}


                {{-- form regsiter perusahaan --}}
                <div id="regis_perusahaan" class="hidden overflow-hidden">
                    <form id="register_perusahaanForm" action="{{ route('registerproses_perusahaan') }}" method="POST"
                        class="space-y-4">
                        @csrf
                        <div>
                            <label for="username" class="block text-sm font-medium text-gray-700 m-2">Nama
                                Perusahaan</label>
                            <input type="text" id="username_perusahaan" placeholder="Nama Pengguna" name="username"
                                class="w-full px-4 py-3 border border-gray-700 rounded-lg focus:ring focus:ring-orange-300 focus:outline-none">
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 m-2">Email</label>
                            <input type="email" id="email_perusahaan" placeholder="E-mail" name="email"
                                class="w-full px-4 py-3    border-gray-700 border rounded-lg focus:ring focus:ring-orange-300 focus:outline-none">
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 m-2">No.Tlp
                                Perusahaan</label>
                            <input type="text" id="phone_perusahaan" placeholder="No. Tlp"
                                name="telepon_perusahaan"
                                class="w-full px-4 py-3 border border-gray-700 rounded-lg focus:ring focus:ring-orange-300 focus:outline-none">
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 m-2">Kata
                                Sandi</label>
                            <input type="password" id="password_perusahaan" placeholder="Kata Sandi" name="password"
                                class="w-full px-4 py-3 border border-gray-700 rounded-lg focus:ring focus:ring-orange-300 focus:outline-none">
                        </div>

                        <!-- Checkbox -->
                        <label class="flex items-center text-sm font-medium gap-1">
                            <input type="checkbox" class="mr-2">
                            Saya menyetujui <a href="{{ url('syarat/ketentuan') }}" class="text-orange-500"> Syarat
                                dan Ketentuan </a> yang
                            berlaku
                        </label>

                        <input type="hidden" name="role" value="perusahaan">

                        <button type="submit"
                            class="w-full py-3 bg-orange-500 text-white rounded-lg  font-semibold hover:bg-orange-600 mt-6">
                            Daftar
                        </button>
                    </form>
                    <!-- Tombol Daftar -->
                </div>
            </div>
        </div>


        <!-- Modal overlay Perusahaan -->

        <div id="successModal_perusahaan" class="hidden fixed inset-0 z-50 items-center justify-center bg-black/50">
            <!-- Konten Modal -->
            <div class="relative bg-white rounded-2xl shadow-lg w-[90%] max-w-md p-8 text-center animate-fadeIn">

                <!-- Tombol X -->
                <button onclick="closeModal()"
                    class="absolute top-3 right-3 text-gray-500 hover:text-gray-700 text-xl font-bold">
                    &times;
                </button>

                <!-- Judul -->
                <h2 class="text-2xl font-bold mb-3">Selamat Akun anda berhasil dibuat</h2>

                <!-- Pesan -->
                <p class="text-gray-700 mb-8">
                    setelah ini anda hanya perlu login <br>untuk terhubung dengan areakerja
                </p>

                <!-- Gambar ilustrasi -->
                <div class="flex justify-center mb-6">
                    <img src="{{ asset('images/orang.png') }}" alt="Ilustrasi" class="w-30 h-28">
                </div>

                <!-- Tombol aksi -->
                <div class="flex justify-center gap-6">
                    <button id="gooLogin" class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-lg">
                        Masuk
                    </button>

                </div>
            </div>
        </div>


        <!-- Modal overlay register -->

        <div id="successModal" class="hidden fixed inset-0 z-50 items-center justify-center bg-black/50">
            <!-- Konten Modal -->
            <div class="relative bg-white rounded-2xl shadow-lg w-[90%] max-w-md p-8 text-center animate-fadeIn">

                <!-- Tombol X -->
                <button onclick="closeModal()"
                    class="absolute top-3 right-3 text-gray-500 hover:text-gray-700 text-xl font-bold">
                    &times;
                </button>

                <!-- Judul -->
                <h2 class="text-2xl font-bold mb-3">Selamat Akun anda berhasil dibuat</h2>

                <!-- Pesan -->
                <p class="text-gray-700 mb-8">
                    setelah ini anda hanya perlu login <br>untuk terhubung dengan areakerja
                </p>

                <!-- Gambar ilustrasi -->
                <div class="flex justify-center mb-6">
                    <img src="{{ asset('images/orang.png') }}" alt="Ilustrasi" class="w-30 h-28">
                </div>

                <!-- Tombol aksi -->
                <div class="flex justify-center gap-6">
                    <button id="goLogin" class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-lg">
                        Masuk
                    </button>

                </div>
            </div>
        </div>
        <section class="relative hidden md:flex w-2/4">
            <img src="{{ asset('images/gambar2.jpg') }}" alt="Background" class="w-full h-full object-cover">

            <!-- Overlay hitam transparan -->
            <div
                class="absolute inset-0 bg-black bg-opacity-40 flex flex-col items-center justify-center text-center text-white px-6 pb-56">
                <h2 class="text-3xl font-semibold mb-4">Hallo, Pekerja</h2>
                <p class="mb-6">untuk tetap terhubung dengan kami, silakan <br> masuk dengan informasi pribadi
                    Anda
                </p>
                <a href="{{ url('/login') }}"
                    class="px-20 py-4 border border-white rounded-full hover:bg-white hover:text-black transition">MASUK</a>
            </div>
        </section>
    </div>


    <!-- Bagian kanan (Gambar) -->


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const btn_pelamar = document.getElementById("btn_pelamar");
            const btn_perusahaan = document.getElementById("btn_perusahaan");
            const regis_pelamar = document.getElementById("regis_pelamar");
            const regis_perusahaan = document.getElementById("regis_perusahaan");

            if (btn_pelamar && regis_pelamar) {
                btn_pelamar.addEventListener("click", () => {
                    regis_pelamar.classList.remove("hidden");
                    regis_perusahaan.classList.add("hidden");

                    btn_pelamar.classList.add("bg-orange-500", "text-white");
                    btn_pelamar.classList.remove("bg-gray-200", "text-gray-600");

                    btn_perusahaan.classList.add("bg-gray-200", "text-gray-600");
                    btn_perusahaan.classList.remove("bg-orange-500", "text-white");
                });
            }

            if (btn_perusahaan && regis_perusahaan) {
                btn_perusahaan.addEventListener("click", () => {
                    regis_perusahaan.classList.remove("hidden");
                    regis_pelamar.classList.add("hidden");

                    btn_perusahaan.classList.add("bg-orange-500", "text-white");
                    btn_perusahaan.classList.remove("bg-gray-200", "text-gray-600");

                    btn_pelamar.classList.add("bg-gray-200", "text-gray-600");
                    btn_pelamar.classList.remove("bg-orange-500", "text-white");
                });
            }
        });
    </script>

    {{-- modal register perusahaan --}}
    <script>
        document.getElementById("register_perusahaanForm").addEventListener("submit", async function(e) {
            e.preventDefault();

            let formData = new FormData(this);

            let response = await fetch("{{ route('registerproses_perusahaan') }}", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
                },
                body: formData
            });

            let data = await response.json();

            if (data.success) {
                let modal = document.getElementById("successModal_perusahaan");
                modal.classList.remove("hidden");
                modal.classList.add("flex"); // ✅ bikin tampil
            } else {
                alert("Terjadi kesalahan, coba lagi.");
            }
        });

        // tombol "Masuk"
        document.getElementById("gooLogin").addEventListener("click", function() {
            window.location.href = "{{ route('login_perusahaan') }}";
        });
    </script>



    {{-- modal register pelamar --}}
    <script>
        document.getElementById("registerForm").addEventListener("submit", async function(e) {
            e.preventDefault();

            let formData = new FormData(this);

            let response = await fetch("{{ route('registerproses') }}", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
                },
                body: formData
            });

            let data = await response.json();

            if (data.success) {
                let modal = document.getElementById("successModal");
                modal.classList.remove("hidden");
                modal.classList.add("flex"); // ✅ bikin tampil
            } else {
                alert("Terjadi kesalahan, coba lagi.");
            }
        });

        // tombol "Masuk"
        document.getElementById("goLogin").addEventListener("click", function() {
            window.location.href = "{{ route('login') }}";
        });
    </script>

</body>

</html>
