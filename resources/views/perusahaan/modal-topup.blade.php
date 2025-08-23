    <!-- Overlay Modal -->
    <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white w-[500px] rounded-xl p-6 relative">

            <!-- Header -->
            <div class="flex justify-between items-center mb-4">
                <h2 class="font-bold text-lg">Daftar Kandidat</h2>
                <button onclick="closeModal()" class="text-gray-500 text-2xl">&times;</button>
            </div>
            <div class="w-28 h-1 bg-orange-500 rounded mb-4"></div>

            <!-- Judul -->
            <h3 class="text-center font-semibold text-lg mb-6">Top Up Koin</h3>

            <!-- Grid Paket Koin -->
            <div class="grid grid-cols-3 gap-4 mb-6">

                <!-- Item -->
                <div class="border rounded-lg overflow-hidden shadow hover:shadow-lg cursor-pointer text-center">
                    <div class="p-4">
                        <img src="https://cdn-icons-png.flaticon.com/512/2769/2769071.png" alt="coin"
                            class="w-12 mx-auto mb-2">
                        <p class="font-bold text-orange-600 text-xl">1.000</p>
                    </div>
                    <div class="bg-orange-500 text-white py-2 text-sm">Rp. 500.000</div>
                </div>

                <div class="border rounded-lg overflow-hidden shadow hover:shadow-lg cursor-pointer text-center">
                    <div class="p-4">
                        <img src="https://cdn-icons-png.flaticon.com/512/2769/2769083.png" alt="coin"
                            class="w-12 mx-auto mb-2">
                        <p class="font-bold text-orange-600 text-xl">100</p>
                    </div>
                    <div class="bg-orange-500 text-white py-2 text-sm">Rp. 100.000</div>
                </div>

                <div class="border rounded-lg overflow-hidden shadow hover:shadow-lg cursor-pointer text-center">
                    <div class="p-4">
                        <img src="https://cdn-icons-png.flaticon.com/512/2769/2769083.png" alt="coin"
                            class="w-12 mx-auto mb-2">
                        <p class="font-bold text-orange-600 text-xl">10</p>
                    </div>
                    <div class="bg-orange-500 text-white py-2 text-sm">Rp. 10.000</div>
                </div>

                <div class="border rounded-lg overflow-hidden shadow hover:shadow-lg cursor-pointer text-center">
                    <div class="p-4">
                        <img src="https://cdn-icons-png.flaticon.com/512/2769/2769077.png" alt="coin"
                            class="w-12 mx-auto mb-2">
                        <p class="font-bold text-orange-600 text-xl">10.000</p>
                    </div>
                    <div class="bg-orange-500 text-white py-2 text-sm">Rp. 1.000.000</div>
                </div>

                <div class="border rounded-lg overflow-hidden shadow hover:shadow-lg cursor-pointer text-center">
                    <div class="p-4">
                        <img src="https://cdn-icons-png.flaticon.com/512/2769/2769071.png" alt="coin"
                            class="w-12 mx-auto mb-2">
                        <p class="font-bold text-orange-600 text-xl">100.000</p>
                    </div>
                    <div class="bg-orange-500 text-white py-2 text-sm">Rp. 1.500.000</div>
                </div>

                <div class="border rounded-lg overflow-hidden shadow hover:shadow-lg cursor-pointer text-center">
                    <div class="p-4">
                        <img src="https://cdn-icons-png.flaticon.com/512/2769/2769077.png" alt="coin"
                            class="w-12 mx-auto mb-2">
                        <p class="font-bold text-orange-600 text-xl">1.000.000</p>
                    </div>
                    <div class="bg-orange-500 text-white py-2 text-sm">Rp. 2.000.000</div>
                </div>

            </div>

            <!-- Tombol Konfirmasi -->
            <div class="text-center">
                <button class="bg-orange-500 text-white w-56 py-3 rounded-full font-medium">
                    Konfirmasi
                </button>
            </div>
        </div>
    </div>

    <script>
        function openModal() {
            const modal = document.getElementById("modal");
            modal.classList.remove("hidden");
            modal.classList.add("flex"); // jadi flex
        }

        function closeModal() {
            const modal = document.getElementById("modal");
            modal.classList.remove("flex");
            modal.classList.add("hidden"); // kembali hidden
        }
    </script>