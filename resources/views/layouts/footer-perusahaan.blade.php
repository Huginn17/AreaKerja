<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

<!-- Paksa semua teks pakai Poppins -->
<style>
    footer {
        font-family: 'Poppins', sans-serif;
    }
</style>

<!-- Footer -->
<footer class="bg-orange-500 text-white px-8 md:px-16 py-10">
    <div class="grid md:grid-cols-4 gap-8">

        <!-- Logo + Description -->
        <div class="mt-[-10%]">
            <div>
                <img src="{{ asset('images/logo_area_kerja_putih.png') }}" alt="Logo" class="w-20 h-20 ">
            </div>
            <div class="text-sm leading-relaxed ">
                <p class="mb-5">Lamar Pekerjaan Kamu - Dengan <br> waktu dan langkah yang cepat</p>
                <p>Copyright © 2024 <br>areakerja.com</p>
            </div>
        </div>

        <!-- Kategori -->
        <div>
            <h3 class="mb-4 text-xl">Kategori</h3>
            <ul class="grid gap-y-3 text-sm">
                <li><a href="#" class="hover:text-orange-200 transition">Beranda</a></li>
                <li><a href="#" class="hover:text-orange-200 transition">Tips Kerja</a></li>
                <li><a href="#" class="hover:text-orange-200 transition">Provinsi Lainnya</a></li>
                <li><a href="#" class="hover:text-orange-200 transition">Pasang Lowongan</a></li>
            </ul>
        </div>

<div class="flex gap-2">
  <div class="grid grid-cols-2 gap-x-4 gap-y-2">
    <!-- Facebook -->
    <a href="#"
      class="border-2 w-12 h-12 border-white rounded-md p-2 hover:bg-orange-600 transition duration-300 hover:scale-110">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="currentColor" viewBox="0 0 24 24">
        <path
          d="M22,12A10,10,0,1,0,9.74,21.92V14.89H7.1V12h2.64V9.79c0-2.6,1.54-4.04,3.9-4.04a15.87,15.87,0,0,1,2.3.2v2.53H14.9c-1.27,0-1.66.79-1.66,1.6V12h2.83l-.45,2.89H13.24v7A10,10,0,0,0,22,12Z" />
      </svg>
    </a>

    <!-- LinkedIn -->
    <a href="#"
      class="border-2 w-12 h-12 border-white rounded-md p-2 hover:bg-orange-600 transition duration-300 hover:scale-110">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="currentColor" viewBox="0 0 24 24">
        <path
          d="M19 0h-14C2.2 0 0 2.2 0 5v14c0 2.8 2.2 5 5 5h14c2.8 0 5-2.2 5-5V5c0-2.8-2.2-5-5-5zm-8.7 19H7V9h3.3v10zm-1.6-11.5c-1.1 0-1.9-.9-1.9-2s.9-2 1.9-2 1.9.9 1.9 2-.8 2-1.9 2zm12.3 11.5h-3.3v-5.4c0-1.3 0-3-1.8-3s-2.1 1.4-2.1 2.9V19h-3.3V9h3.2v1.4h.1c.4-.7 1.5-1.5 3-1.5 3.2 0 3.8 2.1 3.8 5.1V19z" />
      </svg>
    </a>

    <!-- Instagram -->
    <a href="#"
      class="border-2 w-12 h-12 border-white rounded-md p-2 hover:bg-orange-600 transition duration-300 hover:scale-110">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="currentColor" viewBox="0 0 24 24">
        <path
          d="M7.75 2h8.5A5.75 5.75 0 0 1 22 7.75v8.5A5.75 5.75 0 0 1 16.25 22h-8.5A5.75 5.75 0 0 1 2 16.25v-8.5A5.75 5.75 0 0 1 7.75 2ZM12 7a5 5 0 1 0 0 10 5 5 0 0 0 0-10Zm0 1.5a3.5 3.5 0 1 1 0 7 3.5 3.5 0 0 1 0-7Zm5.25-.75a.75.75 0 1 0 0 1.5.75.75 0 0 0 0-1.5Z" />
      </svg>
    </a>

    <!-- Twitter -->
    <a href="#"
      class="border-2 w-12 h-12 border-white rounded-md p-2 hover:bg-orange-600 transition duration-300 hover:scale-110">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="currentColor" viewBox="0 0 24 24">
        <path
          d="M22.46 6c-.77.35-1.6.58-2.46.69a4.21 4.21 0 0 0 1.84-2.32 8.27 8.27 0 0 1-2.65 1.02 4.15 4.15 0 0 0-7.06 3.78 11.76 11.76 0 0 1-8.54-4.33 4.15 4.15 0 0 0 1.28 5.55 4.1 4.1 0 0 1-1.88-.52v.05a4.15 4.15 0 0 0 3.32 4.06 4.22 4.22 0 0 1-1.88.07 4.15 4.15 0 0 0 3.87 2.88A8.33 8.33 0 0 1 2 19.54a11.75 11.75 0 0 0 6.36 1.86c7.63 0 11.8-6.32 11.8-11.8v-.54A8.37 8.37 0 0 0 22.46 6Z" />
      </svg>
    </a>
  </div>
</div>


        <!-- Kontak -->
        <div>
            <h3 class="mb-4 text-xl">Kontak Kami</h3>
            <div class="flex gap-2 text-sm">
                <form class="overflow-hidden bg-white rounded-[10px]">
                    <input type="email" placeholder="Email address"
                        class="flex-1 px-4 py-2 text-black focus:outline-none">
                </form>
                <button type="submit"
                    class="text-white border-2 border-gray-50  bg-orange-500 px-5 rounded-[10px]">Submit</button>
            </div>
        </div>
    </div>

    <!-- Divider -->
    <div class="my-6"></div>

    <!-- Bottom Section -->
    <div class="flex flex-col md:flex-row items-center justify-between gap-4 text-sm">
        <!-- Left text -->


        <!-- Social icons -->


        <!-- Right copyright -->

    </div>

</footer>
