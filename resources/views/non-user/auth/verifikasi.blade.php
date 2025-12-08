<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verifikasi | Areakerja</title>

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


        <!-- Background -->
        <section class="relative w-2/4 lg:h-auto hidden lg:block">
            <img src="{{ asset('images/gambar2.jpg') }}" alt="Background"
                class="absolute inset-0 w-full h-full object-cover">

            <div class="absolute inset-0 bg-black bg-opacity-50"></div>

            <div class="relative z-10 flex flex-col items-center justify-center h-full text-center text-white px-6">
                <h1 class="text-3xl font-bold mt-[-45%] mb-10">Hallo, Pekerja</h1>
                <p class="text-sm mb-10">untuk tetap terhubung dengan kami, silakan<br> masuk dengan informasi pribadi
                    Anda</p>

                <a href="{{ url('/login') }}"
                    class="px-20 py-3 border border-white rounded-full hover:bg-white hover:text-black transition">
                    Masuk
                </a>
            </div>
        </section>

        <!-- Kanan -->
        <div class="flex w-full lg:w-4/2 bg-white items-center justify-center">
            <div class="w-full max-w-md p-8">
                <h2 class="text-2xl font-semibold text-center text-orange-600 mb-8">Verifikasi Akun</h2>

                <p class="text-center text-gray-500 mb-6 mt-6 text-sm">kata sandi Anda akan diatur ulang melalui email
                </p>

                <form action="{{ route('password.email.pelamar') }}" method="POST" class="space-y-4">
                    @csrf
                    <div class="space-y-3">
                        <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                        <input type="email" id="email" name="email" placeholder="Email"
                            value="{{ old('email') }}"
                            class="mt-2 block w-full border border-gray-700 rounded-lg p-2.5 focus:ring-orange-500 focus:border-orange-500" />

                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    
                        <button type="submit"
                             class="mt-2 block w-full border border-orange-500 bg-orange-500 text-white hover:bg-orange-600 rounded-lg p-2.5 transition duration-300" />
                            Lanjutkan
                        </button>
                    

                    <a href="{{ route('login') }}" class="flex justify-center text-sm text-orange-500">Kembali</a>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('alert'))
        <script>
            Swal.fire({
                title: "{{ session('alert')['title'] }}",
                text: "{{ session('alert')['text'] }}",
                icon: "{{ session('alert')['icon'] }}"
            });

            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        </script>
    @endif

    @if (session('success'))
        <script>
            Swal.fire({
                title: "Berhasil!",
                text: "{{ session('success') }}",
                icon: "success"
            });

            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        </script>
    @endif

</body>

</html>
