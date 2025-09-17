    @extends('layouts.index-perusahaan')
    @section('content')
        <!DOCTYPE html>
        <html lang="id">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Dashboard AreaKerja</title>
            <script src="https://cdn.tailwindcss.com"></script>
            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
            <style>
                body {
                    font-family: 'Poppins', sans-serif;
                }
            </style>
        </head>

        <body class="bg-gray-100">

            <!-- Container -->
            <div class="w-full mx-auto bg-white min-h-screen p-6">
                <!-- Header -->
                <h2 class="text-lg text-orange-500 font-medium">Dashboard</h2>
                <h1 class="text-2xl font-semibold mt-1">Selamat Datang Di Area Kerja Seven Inc</h1>

                <!-- Cards -->
                <div class="grid md:grid-cols-3 gap-4 mt-6">
                    <!-- Lowongan Saya -->
                    <div class="bg-orange-500 text-white p-7 rounded-md md:col-span-2">
                        <h3 class="text-lg font-medium mb-4">Lowongan Saya</h3>
                        <div class="bg-white rounded-md flex justify-between items-center px-3 py-3">
                            <span class="text-black font-bold">Lowongan Belum Terpasang</span>
                            <a href="{{ route('lowongan.saya.perusahaan') }}"
                                class="border border-orange-500 text-orange-500 px-3 py-1 rounded-md text-sm font-semibold">
                                Tambah Lowongan
                            </a>
                        </div>
                        <div class="bg-white rounded-xl mt-4 px-4 py-2 text-green-700 inline-block">
                            <div class="max-w-2xl mx-auto flex justify-end">
                                <div class="flex items-center gap-6 bg-white px-2 py-1">
                                    <!-- Coin + jumlah + teks -->
                                    <div class="flex flex-col items-center">
                                        <span class="flex items-center">
                                            <p class="text-yellow-500 font-semibold text-4xl">
                                                {{ $perusahaan->koin_perusahaan ?? 0 }}
                                            </p>
                                            <img src="{{ asset('images/coin.png') }}" alt="coin" class="w-8 h-8 ml-4">
                                        </span>
                                        <button onclick="toggleModal()"
                                            class="flex items-center text-green-600 text-sm font-medium">
                                            <p class="mr-2">Top Up Koin</p>
                                            <!-- icon + -->
                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <mask id="mask0_614_15612" style="mask-type:alpha"
                                                    maskUnits="userSpaceOnUse" x="0" y="0" width="22" height="22">
                                                    <rect x="0.53125" y="0.722656" width="20.4918" height="20.4918"
                                                        fill="url(#pattern0_614_15612)" />
                                                </mask>
                                                <g mask="url(#mask0_614_15612)">
                                                    <rect x="0.773438" y="0.96875" width="20" height="20"
                                                        fill="#42BB72" />
                                                </g>
                                                <defs>
                                                    <pattern id="pattern0_614_15612" patternContentUnits="objectBoundingBox"
                                                        width="1" height="1">
                                                        <use xlink:href="#image0_614_15612" transform="scale(0.0104167)" />
                                                    </pattern>
                                                    <image id="image0_614_15612" width="96" height="96"
                                                        preserveAspectRatio="none"
                                                        xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAABmJLR0QA/wD/AP+gvaeTAAAEhUlEQVR4nO2dz48URRTHP47ouCPIL1kJRBc9AAdNIF6JhkVMjEwg/uJEOHhBvUDgjyASJRIve9UbBxU5GvGCePRHlMCGRUPWFQPyQxDwsnCoISyrs/W6q6pf9fT7JN/Mpabn9fdNdXV3Vb8GwzAMwzAMwzCaxgPaAXgYBtYDa2ZoGHgUWNz7BPgHuNz7/BMYB04Bp4HvgQuVRl2A3BLQATYDo8BG4FnCY7wN/Awc6+kr4GbgNgeKFrABGAOu4gxLqRvAYaALPFjB/mXLI8C7wFnSm95PE8A7vVgaQwfYB0yhZ/xsTQF7e7ENNF3gV/QN76dJ4M1ke6/IKuAo+gZLdQQYSeKEAtuAS+ibWlRXge0J/KiMNvAR+kaGaqy3L7ViKfAd+ubF0rfAkqgOJWQF8BP6psXWSeCpiD4lYS1wDn2zUulcbx+zZCXwG/ompdYkGZ4hLcV1UW1zqtI47qZgFrQZrAFXqhNkcnb0MfpmaOlQBP+CeAN9E7T1erCLJVkFXBEEOOi6jNKg/GWJYAdVRwK9LMy2SIEPkrpBjhagg+75vg+tuM4CQ4L47qNV9AvAe2R4IZIBTwO7Uv9IG/gd3a7uQzO2PyjYC4r2gLdxN9uM/2c5sDPVxlvoTqDXoQfcxk30i5fSFOkBL+KOc8bcPAO8IG1cJAE7isfSWMReSbvKEG6AWVgqnLj4YpYcplLzN2488K7Ak/aAl8nD/LrwGLBJ0lCagNHysTSWjZJG0gSINmbch+hPKxkDhoHzwrZVUIcxAGAaeAK4OFcjSQ9YTz7m14kWsE7SyMea8Fgai9c7S0BaoiRgdYRAmoo3AfMEG1keIZCZpB5PYjzSFAuvd5IesCBCIE3F650lIC1REjA/QiBNJUoCjIRIEnA9eRSDyzVfA0kCvBsx+mIJUCZKAs5HCGQmuc8Jx8TrnSQB4xECaSqnfQ0kCfBuxOiLJUAZr3eS+ybLcDV4cpkTqNOEzDDw11yNJD3gAq7ejlGMH/GYD/Ir4WNhsTQSkWeWgHR8I2lkC7PSEH1h1k3gs5CIGsZhhHXpitwN/bRcLI0kiVct3NJr7eXfPrTjO0Oi5enTwAcF2jeVAyQch+wRpbk1RcEKjEVnxP4FPiz4nSbxPnAr9Y900K186EMrrglKPKZallcq2KG6aUuQoyWwUgX39Hmgl6UYwRWq0N55bV1CsZZcF3d6qm2ClqaB14JdDOQQ+kZo6WAE/4Jp4+pqaptRtY4DD0fwLwoLcRMQ2qZUpV/IsJBrk8pWZlvAtQmFW7N/YmgFg3k4Ogk8GdGnpCzB1dXUNi2WjpPhMd/HQ8B+6n+dMEZGZztl2Ep9X+DwVgI/VBihXveOviDjM50QuuRRdaufJoBXk+19JnSAPejPrM3UJLCbCu/n50Ab9xI1zYn+CVypySyqoGvyPO6FPxdJb/oV4BPgJTJYcKwewCyGcJWmRnt6jvAnOadx77S5+zLPr6lg3lZKbgmYzeO4cjmrcbc57r7OdgGwiHvPMF/H/bOv8d/X2f6Ap2aPYRiGYRiGYRhGldwBFK9RwjpRCLwAAAAASUVORK5CYII=" />
                                                </defs>
                                            </svg>

                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Kandidat Saya -->
                    <div class="bg-orange-500 text-white p-5 rounded-md">
                        <h3 class="text-lg font-medium mb-4">Kandidat Saya</h3>
                        <div class="flex flex-col items-center">
                            <button
                                class="w-48 px-4 bg-orange-500 hover:bg-orange-600 text-white text-sm font-medium border border-white py-2 rounded-md mb-3 mt-3">
                                Lihat Kandidat
                            </button>
                            <button
                                class="w-48 px-4 bg-white hover:bg-gray-100 text-black font-semibold text-sm font-medium py-2 rounded-md">
                                Cari Kandidat
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Tentang AreaKerja -->
                <div class="mt-12 text-center">
                    <h2 class="text-3xl font-bold text-orange-500">Tentang AreaKerja</h2>
                </div>

                <!-- Content -->
                <div class="grid md:grid-cols-2 gap-8 mt-8 items-center">
                    <!-- Image -->
                    <div class="flex justify-center">
                        <img src="{{ asset('images/nari.jpg') }}" alt="Illustrasi" class="w-100">
                    </div>

                    <div class="grid md:grid-cols-2 gap-6 max-w-5xl">
                        <!-- Card 1 -->
                        <div class="bg-orange-500 text-white p-6 rounded-lg flex flex-col justify-center max-h-52 mt-28">
                            <div class="flex items-center space-x-3 mb-3">
                                <img src="{{ asset('images/logo_area_kerja_putih.png') }}" alt="logo" class="w-10 h-10">
                                <div>
                                    <p class="font-bold text-lg">01</p>
                                    <p class="text-sm">Mencari Lowongan</p>
                                </div>
                            </div>
                            <p class="text-sm leading-relaxed">
                                Area Kerja menyediakan platform bagi para pencari lowongan kerja untuk mendapatkan posisi
                                kerja
                                yang sesuai dengan keahlian yang dimiliki
                            </p>
                        </div>

                        <!-- Card 2 & 3 -->
                        <div class="flex flex-col gap-6">
                            <div class="border-2 border-orange-500 rounded-lg p-6 text-orange-500">
                                <div class="flex items-center space-x-3 mb-3">
                                    <img src="{{ asset('images/logoarea.png') }}" alt="logo" class="w-10 h-10">
                                    <div>
                                        <p class="font-bold text-lg">02</p>
                                        <p class="text-sm">Lowongan Terbaru</p>
                                    </div>
                                </div>
                                <p class="text-sm leading-relaxed">
                                    Area Kerja dapat menerima lowongan lowongan terbaru untuk mencakup berbagai macam bidang
                                    keahlian
                                </p>
                            </div>
                            <div class="border-2 border-orange-500 rounded-lg p-6 text-orange-500">
                                <div class="flex items-center space-x-3 mb-3">
                                    <img src="{{ asset('images/logoarea.png') }}" alt="logo" class="w-10 h-10">
                                    <div>
                                        <p class="font-bold text-lg">03</p>
                                        <p class="text-sm">Pasti Cocok</p>
                                    </div>
                                </div>
                                <p class="text-sm leading-relaxed">
                                    Pelamar merupakan orang yang sudah siap kerja secara mental dan keahlian berkat
                                    pelatihan
                                    sebelumnya.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ================= MODAL STEP 1 ================= -->
            <div id="modalStep1" class="fixed inset-0 hidden bg-black bg-opacity-50 z-50 flex items-center justify-center">
                <div class="bg-white w-full max-w-md rounded-2xl shadow-xl relative p-6 max-h-[80vh] overflow-y-auto">
                    <button onclick="closeAllModal()"
                        class="absolute top-3 right-3 text-gray-400 hover:text-black">✕</button>
                    <h2 class="text-lg font-semibold mb-4">Top Up Koin</h2>
                    <div class="grid grid-cols-3 gap-4">
                        @foreach ($hargaPembayarans as $paket)
                            <label
                                class="paketCoinWrapper cursor-pointer border rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition flex flex-col items-center">

                                <!-- Input radio -->
                                <input type="radio" name="paket" value="{{ $paket->id }}"
                                    data-jumlah="{{ $paket->jumlah_koin }}" data-harga="{{ $paket->harga }}"
                                    class="hidden paketCoin">

                                <!-- Isi kartu -->
                                <div class="flex flex-col items-center flex-1 p-4">
                                    <img src="{{ asset('icon/' . ($paket->icon ?? 'default-icon.png')) }}"
                                        alt="{{ $paket->nama }}" class="w-14 h-14 mb-3">
                                    <span class="text-lg font-bold text-gray-800">
                                        {{ number_format($paket->jumlah_koin, 0, ',', '.') }}
                                    </span>
                                </div>

                                <!-- Bagian harga -->
                                <div class="w-full bg-orange-500 text-white text-center py-2 font-semibold">
                                    Rp. {{ number_format($paket->harga, 0, ',', '.') }}
                                </div>
                            </label>
                        @endforeach
                    </div>

                    <div class="flex justify-center mt-6">
                        <button onclick="goToStep(2)"
                            class="px-6 py-2 bg-orange-500 hover:bg-orange-600 text-white rounded-md">
                            Konfirmasi
                        </button>
                    </div>
                </div>
            </div>

            <!-- ================= MODAL STEP 2 ================= -->
            <div id="modalStep2"
                class="fixed inset-0 hidden bg-black bg-opacity-50 z-50 flex items-center justify-center">
                <div class="bg-white w-full max-w-md rounded-2xl shadow-xl relative p-6">
                    <button onclick="closeAllModal()"
                        class="absolute top-3 right-3 text-gray-400 hover:text-black">✕</button>

                    <h2 class="text-lg font-semibold mb-4">Metode Pembayaran</h2>

                    <!-- Dropdown Transfer Bank -->
                    <details class="border rounded-xl overflow-hidden">
                        <summary class="flex items-center justify-between px-4 py-3 cursor-pointer">
                            <span class="flex items-center gap-2 font-medium">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-orange-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 9V7a5 5 0 00-10 0v2H5v12h14V9h-2z" />
                                </svg>
                                Transfer Bank
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </summary>
                        <div class="divide-y">
                            @foreach ($daftarBank as $bank)
                                @if (strtolower($bank->nama_bank) !== 'qris')
                                    <label
                                        class="pembayaranWrapper flex justify-between items-center px-4 py-3 cursor-pointer hover:bg-gray-50 transition">
                                        <div class="flex items-center gap-3">
                                            <img src="{{ asset($bank->logo ?? 'default-bank.png') }}" class="w-8 h-8">
                                            <span class="font-medium">{{ $bank->nama_bank }}</span>
                                        </div>
                                        <input type="radio" name="bank" value="{{ $bank->id }}"
                                            data-bank="{{ $bank->nama_bank }}" class="hidden peer metodePembayaran">
                                        <span
                                            class="w-5 h-5 border-2 border-orange-500 rounded-full flex items-center justify-center peer-checked:bg-orange-500">
                                            <span
                                                class="hidden peer-checked:block w-2.5 h-2.5 bg-white rounded-full"></span>
                                        </span>
                                    </label>
                                @endif
                            @endforeach
                        </div>
                    </details>

                    <!-- QRIS (pisah dari dropdown) -->
                    @foreach ($daftarBank as $bank)
                        @if (strtolower($bank->nama_bank) === 'qris')
                            <label
                                class="pembayaranWrapper mt-3 flex justify-between items-center px-4 py-3 border rounded-xl cursor-pointer hover:bg-gray-50 transition">
                                <div class="flex items-center gap-3">
                                    <img src="{{ asset($bank->logo ?? 'default-bank.png') }}" class="w-8 h-8">
                                    <span class="font-medium">{{ $bank->nama_bank }}</span>
                                </div>
                                <input type="radio" name="bank" value="{{ $bank->id }}"
                                    data-bank="{{ $bank->nama_bank }}" class="hidden peer metodePembayaran">
                                <span
                                    class="w-5 h-5 border-2 border-orange-500 rounded-full flex items-center justify-center peer-checked:bg-orange-500">
                                    <span class="hidden peer-checked:block w-2.5 h-2.5 bg-white rounded-full"></span>
                                </span>
                            </label>
                        @endif
                    @endforeach


                    <!-- Tombol navigasi -->
                    <div class="flex justify-between mt-6">
                        <button onclick="goToStep(1)" class="text-orange-500">Kembali</button>
                        <button onclick="goToStep(3)" class="text-orange-500 font-semibold">Selanjutnya</button>
                    </div>
                </div>
            </div>



            <!-- ================= MODAL STEP 3 ================= -->
            <div id="modalStep3"
                class="fixed inset-0 hidden bg-black bg-opacity-50 z-50 flex items-center justify-center">
                <div class="bg-white w-full max-w-lg rounded-2xl shadow-xl relative p-8">
                    <button onclick="closeAllModal()"
                        class="absolute top-4 right-4 text-gray-500 hover:text-black text-xl">✕</button>

                    <h2 class="text-xl font-bold">Detail Pembayaran</h2>
                    <div class="h-1 w-32 bg-orange-500 mb-6"></div>

                    <div class="border border-orange-400 rounded-lg p-6 space-y-3 text-sm">
                        <div class="flex justify-between">
                            <span>No. Transaksi</span>
                            <span id="detailTransaksi">-</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Nama Pengirim</span>
                            <span id="detailPengirim">-</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Nama Penerima</span>
                            <span id="detailPenerima">Area Kerja</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Metode Pembayaran</span>
                            <span class="bg-orange-500 text-white text-xs font-medium px-3 py-1 rounded-full"
                                id="detailBank">-</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Tgl/Waktu</span>
                            <span id="detailWaktu">-</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Jumlah Deposit</span>
                            <span id="detailHarga">-</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Biaya Admin</span>
                            <span id="detailAdmin">Rp. 2.000</span>
                        </div>
                        <div class="border-t border-dashed my-3"></div>
                        <div class="flex justify-between font-semibold">
                            <span>Total Pembayaran</span>
                            <span id="detailTotal">-</span>
                        </div>
                    </div>

                    <div class="flex justify-center mt-8">
                        <button type="button" id="btnKonfirmasi"
                            class="w-full py-3 bg-orange-500 hover:bg-orange-600 text-white font-semibold rounded-full">
                            Konfirmasi
                        </button>
                    </div>

                </div>
            </div>

            <script>
                //redirect
                document.getElementById('btnKonfirmasi').addEventListener('click', function() {
                    if (!selectedKoin || !selectedBank) {
                        alert("Silakan pilih paket dan metode pembayaran dulu.");
                        return;
                    }

                    fetch("{{ route('catatan_cash.store') }}", {
                            method: "POST",
                            headers: {
                                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                "Content-Type": "application/json"
                            },
                            body: JSON.stringify({
                                harga_pembayaran_id: document.querySelector(".paketCoin:checked").value,
                                daftar_bank_id: document.querySelector(".metodePembayaran:checked").value,
                            })
                        })
                        .then(async res => {
                            if (!res.ok) {
                                let err = await res.text();
                                throw new Error(err);
                            }
                            return res.json();
                        })
                        .then(data => {
                            if (data.success) {
                                window.location.href = data.redirect_url;
                            }
                        })
                        .catch(err => {
                            console.error("Error detail:", err.message);
                            alert("Gagal membuat transaksi: " + err.message);
                        });
                });



                let selectedKoin = null;
                let selectedHarga = null;
                let selectedBank = null;

                function toggleModal() {
                    closeAllModal();
                    document.getElementById('modalStep1').classList.remove('hidden');
                    document.getElementById('modalStep1').classList.add('flex');
                    updateButtons();
                }

                function closeAllModal() {
                    document.querySelectorAll('[id^="modalStep"]').forEach(m => {
                        m.classList.add('hidden');
                        m.classList.remove('flex');
                    });
                }

                function goToStep(step) {
                    // ✅ Validasi sebelum pindah step
                    if (step === 2 && !selectedKoin) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Oops...',
                            text: 'Silakan pilih paket koin terlebih dahulu!',
                            confirmButtonColor: '#f97316' // warna tombol orange
                        });
                        return;
                    }
                    if (step === 3 && !selectedBank) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Oops...',
                            text: 'Silakan pilih metode pembayaran terlebih dahulu!',
                            confirmButtonColor: '#f97316'
                        });
                        return;
                    }

                    closeAllModal();
                    let modal = document.getElementById('modalStep' + step);
                    modal.classList.remove('hidden');
                    modal.classList.add('flex');

                    updateButtons();

                    // Step 3: update detail pembayaran
                    if (step === 3) {
                        const biayaAdmin = 2000;
                        const totalBayar = (selectedHarga ?? 0) + biayaAdmin;

                        // 🔑 Buat No Transaksi random unik
                        const randomPart = Math.floor(Math.random() * 1000000);
                        const noTransaksi = "TRX" + Date.now() + randomPart;

                        document.getElementById('detailTransaksi').innerText = noTransaksi;
                        document.getElementById('detailPengirim').innerText = "Nama User";
                        document.getElementById('detailBank').innerText = selectedBank ?? '-';
                        document.getElementById('detailWaktu').innerText = new Date().toLocaleString('id-ID');
                        document.getElementById('detailHarga').innerText = "Rp. " + (selectedHarga ?? 0).toLocaleString('id-ID');
                        document.getElementById('detailTotal').innerText = "Rp. " + totalBayar.toLocaleString('id-ID');
                    }
                }


                // 🔑 Update status tombol (disable/enable)
                function updateButtons() {
                    // Step 1: tombol konfirmasi paket
                    const btnStep1 = document.querySelector('#modalStep1 button');
                    if (btnStep1) {
                        btnStep1.disabled = !selectedKoin;
                        btnStep1.classList.toggle('opacity-50', !selectedKoin);
                        btnStep1.classList.toggle('cursor-not-allowed', !selectedKoin);
                    }

                    // Step 2: tombol selanjutnya metode pembayaran
                    const btnStep2 = document.querySelector('#modalStep2 button:last-child');
                    if (btnStep2) {
                        btnStep2.disabled = !selectedBank;
                        btnStep2.classList.toggle('opacity-50', !selectedBank);
                        btnStep2.classList.toggle('cursor-not-allowed', !selectedBank);
                    }
                }

                document.addEventListener('DOMContentLoaded', () => {
                    // Step 1: Pilih Paket Koin
                    document.querySelectorAll('.paketCoin').forEach(el => {
                        el.addEventListener('change', function() {
                            selectedKoin = this.dataset.jumlah;
                            selectedHarga = parseInt(this.dataset.harga);

                            // Highlight kartu terpilih
                            document.querySelectorAll('.paketCoinWrapper').forEach(w => {
                                w.classList.remove('ring-2', 'ring-orange-500');
                            });
                            this.closest('.paketCoinWrapper').classList.add('ring-2', 'ring-orange-500');

                            updateButtons();
                        });
                    });

                    // Step 2: Pilih Metode Pembayaran
                    document.querySelectorAll('.metodePembayaran').forEach(el => {
                        el.addEventListener('change', function() {
                            selectedBank = this.dataset.bank;

                            // Highlight bank terpilih
                            document.querySelectorAll('.pembayaranWrapper').forEach(w => {
                                w.classList.remove('ring-2', 'ring-orange-500');
                            });
                            this.closest('.pembayaranWrapper').classList.add('ring-2', 'ring-orange-500');

                            updateButtons();
                        });
                    });
                });
            </script>



        </body>

        </html><br>
        @include('layouts.footer')
    @endsection
