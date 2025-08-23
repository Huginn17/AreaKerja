@extends('layouts.index-perusahaan')
@section('content')
    <div class="max-w-4xl scale-90 mx-auto bg-white px-14 py-12 rounded-xl shadow border">
        <!-- Header -->
        <h2 class="text-2xl font-medium mb-2">Detail Transaksi</h2>
        <hr class="border-b border-gray-200 mb-10">

        <!-- Grid 2 kolom -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
            <!-- Kiri -->
            <div class="text-sm">
                <p class="font-medium text-gray-600">No. Transaksi</p>
                <p class="text-lg font-semibold text-gray-800 mb-6">AK0078232327</p>
                <p class="font-medium text-gray-600 mb-2">Status Tagihan</p>
                <span class="inline-block mb-2 bg-orange-100 text-orange-600 text-sm px-8 py-4 rounded-full">
                    Menunggu Pembayaran
                </span>
                <div class="mb-6">
                    <p class="inline text-gray-800 text-sm font-semibold">Batas Pembayaran : </p>
                    <span class="inline text-orange-600">23 Jam 59 Menit 59 Detik</span>
                </div>
                <div class="mb-6">
                    <p class="font-medium mb-1 text-gray-600">Waktu</p>
                    <span class="text-gray-900 font-semibold">25 Juni 2024</span>
                </div>
                <div>
                    <p class="font-medium text-gray-600 mb-1">Metode Pembayaran</p>
                    <span class="text-gray-900 font-semibold">Transfer BANK BCA</span>
                </div>
            </div>

            <!-- Rekening Tujuan -->
            <div class="border rounded-lg p-5 w-full text-left shadow-sm">
                <p class="text-gray-500 text-sm">Rekening Tujuan</p>
                <div class="flex justify-center items-center gap-3">
                    <img src="{{ asset('images/bca.png') }}" alt="BCA Logo" class="w-64 h-48">
                </div>
                <p class="font-semibold text-lg">Bank BCA, Yogyakarta</p>
                <p class="text-gray-500 text-sm mt-2 flex items-center gap-1 cursor-pointer">
                    Salin No.Rek
                    <svg width="14" height="14" viewBox="0 0 8 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6.13826 0.582031H1.65368C1.24259 0.582031 0.90625 0.969336 0.90625 1.44271V7.46745H1.65368V1.44271H6.13826V0.582031ZM7.25941 2.30339H3.14854C2.73746 2.30339 2.40111 2.69069 2.40111 3.16406V9.18881C2.40111 9.66218 2.73746 10.0495 3.14854 10.0495H7.25941C7.6705 10.0495 8.00684 9.66218 8.00684 9.18881V3.16406C8.00684 2.69069 7.6705 2.30339 7.25941 2.30339ZM7.25941 9.18881H3.14854V3.16406H7.25941V9.18881Z"
                            fill="black" fill-opacity="0.6" />
                    </svg>
                </p>
            </div>
        </div>

        <!-- Tabel Transaksi -->
        <div class="overflow-x-auto mb-6">
            <table class="w-full text-sm border border-gray-100 rounded-lg overflow-hidden">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3 text-left font-semibold text-gray-500">Keterangan</th>
                        <th class="p-3 text-left font-semibold text-gray-500">Jumlah</th>
                        <th class="p-3 text-right font-semibold text-gray-500">Tagihan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b-2 border-gray-200">
                        <td class="p-3">Pendaftaran Kandidat</td>
                        <td class="p-3 text-left">1</td>
                        <td class="p-3 text-right">Rp. 200.000</td>
                    </tr>
                </tbody>
                <tfoot class="text-sm">
                    <tr>
                        <td></td>
                        <td class="p-3 text-left">Tagihan</td>
                        <td class="p-3 text-right">Rp. 200.000</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="p-3 text-left">Admin</td>
                        <td class="p-3 text-right">Rp. 2.000</td>
                    </tr>
                    <tr class="font-medium">
                        <td></td>
                        <td class="p-3 text-left">Total</td>
                        <td class="p-3 text-right">Rp. 222.000</td>
                    </tr>
                    <tr class="font-semibold border-b-4 border-gray-200">
                        <td></td>
                        <td class="p-3 text-left">Total Tagihan</td>
                        <td class="p-3 text-right">Rp. 222.000</td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <!-- Tombol Upload -->
        <div class="mb-6">
            <button class="px-5 py-3 text-sm bg-green-500 hover:bg-green-600 text-white rounded-lg shadow">
                Upload Bukti
            </button>
        </div>

        <!-- Petunjuk Pembayaran -->
        <div class="w-full">
            <h3 class="text-2xl font-medium mb-3">Petunjuk Pembayaran</h3>
            <div class="flex items-center justify-between py-3 border-b-2 border-gray-300">
                <span class="font-medium text-md">Transfer mBanking</span>
                <svg width="14" height="7" viewBox="0 0 14 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.335938 0.332031L7.0026 6.9987L13.6693 0.332031H0.335938Z" fill="#FA6601" />
                </svg>
            </div>
            <div class="flex items-center justify-between py-3 border-b-2 border-gray-300">
                <span class="font-medium text-md">Transfer iBanking</span>
                <svg width="14" height="7" viewBox="0 0 14 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.335938 0.332031L7.0026 6.9987L13.6693 0.332031H0.335938Z" fill="#FA6601" />
                </svg>
            </div>
            <div class="flex items-center justify-between py-3 border-b-2 border-gray-300">
                <span class="font-medium text-md">Transfer ATM</span>
                <svg width="14" height="7" viewBox="0 0 14 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.335938 0.332031L7.0026 6.9987L13.6693 0.332031H0.335938Z" fill="#FA6601" />
                </svg>
            </div>
        </div>
    </div>

    @include('layouts.footer')
@endsection
