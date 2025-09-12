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
                        <button class="border border-orange-500 text-orange-500 px-3 py-1 rounded-md text-sm font-semibold">
                            Tambah Lowongan
                        </button>
                    </div>
                    <div class="bg-white rounded-xl mt-4 px-4 py-2 text-green-700 inline-block">
                        <div class="max-w-2xl mx-auto flex justify-end">
                            <div class="flex items-center gap-6 bg-white px-2 py-1">
                                <!-- Coin + jumlah + teks -->
                                <div class="flex flex-col items-center">
                                    <span class="flex items-center">
                                        <p class="text-yellow-500 font-semibold text-4xl">0</p>
                                        <img src="{{ asset('images/coin.png') }}" alt="coin" class="w-8 h-8 ml-4">
                                    </span>
                                    <button onclick="toggleModal()"
                                        class="flex items-center text-green-600 text-sm font-medium">
                                        <p class="mr-2">Top Up Koin</p>
                                        <!-- icon + -->
                                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect x="0.242188" y="0.246094" width="20" height="20" fill="#42BB72" />
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
                            Area Kerja menyediakan platform bagi para pencari lowongan kerja untuk mendapatkan posisi kerja
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
                                Pelamar merupakan orang yang sudah siap kerja secara mental dan keahlian berkat pelatihan
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
                <button onclick="closeAllModal()" class="absolute top-3 right-3 text-gray-400 hover:text-black">✕</button>
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
                    <button onclick="goToStep(2)" class="px-6 py-2 bg-orange-500 hover:bg-orange-600 text-white rounded-md">
                        Konfirmasi
                    </button>
                </div>
            </div>
        </div>

        <!-- ================= MODAL STEP 2 ================= -->
        <div id="modalStep2" class="fixed inset-0 hidden bg-black bg-opacity-50 z-50 flex items-center justify-center">
            <div class="bg-white w-full max-w-md rounded-2xl shadow-xl relative p-6">
                <button onclick="closeAllModal()" class="absolute top-3 right-3 text-gray-400 hover:text-black">✕</button>
                <h2 class="text-lg font-semibold mb-4">Metode Pembayaran</h2>
                <div class="space-y-3">
                    @foreach ($daftarBank as $bank)
                        <label
                            class="pembayaranWrapper cursor-pointer border rounded-xl p-3 flex items-center gap-3 hover:shadow-md transition">
                            <input type="radio" name="bank" value="{{ $bank->id }}"
                                data-bank="{{ $bank->nama_bank }}" class="hidden metodePembayaran">
                            <img src="{{ asset($bank->logo ?? 'default-bank.png') }}" class="w-10 h-10">
                            <div>
                                <p class="font-medium">{{ $bank->nama_bank }}</p>
                                <p class="text-sm text-gray-500">{{ $bank->no_rek }} ({{ $bank->owner }})</p>
                            </div>
                        </label>
                    @endforeach
                </div>
                <div class="flex justify-between mt-6">
                    <button onclick="goToStep(1)" class="text-orange-500">Kembali</button>
                    <button onclick="goToStep(3)" class="text-orange-500 font-semibold">Selanjutnya</button>
                </div>
            </div>
        </div>


        <!-- ================= MODAL STEP 3 ================= -->
        <div id="modalStep3" class="fixed inset-0 hidden bg-black bg-opacity-50 z-50 flex items-center justify-center">
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
                    <button type="submit"
                        class="w-full py-3 bg-orange-500 hover:bg-orange-600 text-white font-semibold rounded-full">
                        Konfirmasi
                    </button>
                </div>
            </div>
        </div>

        <script>
            let selectedKoin = null;
            let selectedHarga = null;
            let selectedBank = null;

            function toggleModal() {
                closeAllModal();
                document.getElementById('modalStep1').classList.remove('hidden');
                document.getElementById('modalStep1').classList.add('flex');
            }

            function closeAllModal() {
                document.querySelectorAll('[id^="modalStep"]').forEach(m => {
                    m.classList.add('hidden');
                    m.classList.remove('flex');
                });
            }

            function goToStep(step) {
                closeAllModal();
                let modal = document.getElementById('modalStep' + step);
                modal.classList.remove('hidden');
                modal.classList.add('flex');

                // Step 3: update detail pembayaran
                if (step === 3) {
                    const biayaAdmin = 2000;
                    const totalBayar = (selectedHarga ?? 0) + biayaAdmin;

                    document.getElementById('detailTransaksi').innerText = Date.now();
                    document.getElementById('detailPengirim').innerText = "Nama User";
                    document.getElementById('detailBank').innerText = selectedBank ?? '-';
                    document.getElementById('detailWaktu').innerText = new Date().toLocaleString('id-ID');
                    document.getElementById('detailHarga').innerText = "Rp. " + (selectedHarga ?? 0).toLocaleString('id-ID');
                    document.getElementById('detailTotal').innerText = "Rp. " + totalBayar.toLocaleString('id-ID');
                }
            }

            // 🔑 PASANG LISTENER SEKALI SAJA SAAT PAGE LOAD
            document.addEventListener('DOMContentLoaded', () => {
                document.querySelectorAll('.paketCoin').forEach(el => {
                    el.addEventListener('change', function() {
                        selectedKoin = this.dataset.jumlah;
                        selectedHarga = parseInt(this.dataset.harga);
                    });
                });

                document.querySelectorAll('.metodePembayaran').forEach(el => {
                    el.addEventListener('change', function() {
                        selectedBank = this.dataset.bank;
                    });
                });
            });

            //hightlightdocument.addEventListener('DOMContentLoaded', () => {
            // Step 1: Pilih Paket Koin
            document.querySelectorAll('.paketCoin').forEach(el => {
                el.addEventListener('change', function() {
                    selectedKoin = this.dataset.jumlah;
                    selectedHarga = parseInt(this.dataset.harga);

                    // Hilangkan highlight dari semua
                    document.querySelectorAll('.paketCoinWrapper').forEach(w => {
                        w.classList.remove('ring-2', 'ring-orange-500');
                    });

                    // Tambahkan highlight ke elemen terpilih
                    this.closest('.paketCoinWrapper').classList.add('ring-2', 'ring-orange-500');
                });
            });

            // Step 2: Pilih Metode Pembayaran
            document.querySelectorAll('.metodePembayaran').forEach(el => {
                el.addEventListener('change', function() {
                    selectedBank = this.dataset.bank;

                    // Hilangkan highlight dari semua
                    document.querySelectorAll('.pembayaranWrapper').forEach(w => {
                        w.classList.remove('ring-2', 'ring-orange-500');
                    });

                    // Tambahkan highlight ke elemen terpilih
                    this.closest('.pembayaranWrapper').classList.add('ring-2', 'ring-orange-500');
                });
            });
        </script>


    </body>

    </html><br>
    @include('layouts.footer')
@endsection
