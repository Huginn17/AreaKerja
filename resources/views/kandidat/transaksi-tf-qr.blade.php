@extends('layouts.index')
@section('content')
    <div class="bg-gray-100 flex justify-center py-10">

        <div class="bg-white w-full max-w-2xl rounded-2xl shadow p-8">
            <!-- Judul -->
            <h2 class="text-xl font-bold mb-6">Detail Transaksi</h2>

            <!-- Info transaksi -->
            <div class="flex justify-between items-start mb-6">
                <div class="space-y-3 text-sm">
                    <div>
                        <p class="text-gray-500">No. Transaksi</p>
                        <p class="font-medium">AK0078223327</p>
                    </div>
                    <div>
                        <p class="text-gray-500">Status Tagihan</p>
                        <span class="bg-orange-100 text-orange-600 px-3 py-1 rounded-full text-xs font-medium">
                            Menunggu Pembayaran
                        </span>
                    </div>
                    <div>
                        <p class="text-gray-500">Batas Pembayaran</p>
                        <p class="text-red-500 font-medium text-sm">23 Jam 59 Menit 59 Detik</p>
                    </div>
                    <div>
                        <p class="text-gray-500">Waktu</p>
                        <p class="font-medium">25 Juni 2024</p>
                    </div>
                    <div>
                        <p class="text-gray-500">Metode Pembayaran</p>
                        <p class="font-medium">Transfer BANK BCA</p>
                    </div>
                </div>

                <!-- Rekening Tujuan -->
                <div class="border rounded-lg p-4 text-center text-sm">
                    <p class="text-gray-500 mb-2 ">Bayar Melalui</p>
                    <img src="{{ asset('images/qr.jpg  ') }}" alt="qr" class="w-20 mx-auto mb-2">
                    <p class="font-medium">Qris</p>
                    <p class="font-medium ">NMID :ID112233225566778</p>
                   <img src="{{ asset('images/barcode.jpg  ') }}" alt="barcode" class="w-20 mx-auto mb-2">
                </div>
            </div>

            <!-- Tabel Keterangan -->
            <div class="border rounded-lg overflow-hidden text-sm">
                <div class="bg-gray-100 px-4 py-2 text-gray-500">Keterangan</div>
                <div class="px-4 py-3 flex justify-between">
                    <span>Pendaftaran Kandidat</span>
                    <span>Rp. 200.000</span>
                </div>
            </div>

            <!-- Rincian -->
            <div class="mt-4 text-sm">
                <div class="flex justify-between py-1">
                    <span>Tagihan</span>
                    <span>Rp. 200.000</span>
                </div>
                <div class="flex justify-between py-1">
                    <span>Admin</span>
                    <span>Rp. 2.000</span>
                </div>
                <div class="flex justify-between py-1 font-medium">
                    <span>Total</span>
                    <span>Rp. 222.000</span>
                </div>
                <div class="flex justify-between py-1 font-bold border-t mt-1 pt-2">
                    <span>Total Tagihan</span>
                    <span>Rp. 222.000</span>
                </div>
            </div>

            <!-- Tombol Upload -->
            <div class="mt-6">
                <button class="bg-green-600 text-white px-5 py-2 rounded-lg font-medium">
                    Upload Bukti
                </button>
            </div>

            <!-- Accordion Petunjuk -->
            <div class="mt-8">
                <h3 class="text-lg font-semibold mb-3">Petunjuk Pembayaran</h3>

                <details class="border rounded mb-2">
                    <summary class="px-4 py-2 cursor-pointer">Transfer mBanking</summary>
                    <div class="px-4 py-2 text-sm text-gray-600">
                        Petunjuk transfer melalui mBanking.
                    </div>
                </details>

                <details class="border rounded mb-2">
                    <summary class="px-4 py-2 cursor-pointer">Transfer iBanking</summary>
                    <div class="px-4 py-2 text-sm text-gray-600">
                        Petunjuk transfer melalui iBanking.
                    </div>
                </details>

                <details class="border rounded">
                    <summary class="px-4 py-2 cursor-pointer">Transfer QRIS</summary>
                    <div class="px-4 py-2 text-sm text-gray-600">
                        Petunjuk transfer melalui QRIS.
                    </div>
                </details>
            </div>
        </div>

    </div>
    @include('layouts.footer')
@endsection
