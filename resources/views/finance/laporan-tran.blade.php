@extends('finance.sidebar.index')
@section('sidebar')
    <div class="p-4 sm:ml-64">
        <!-- Header -->
        <header class="w-full flex items-center justify-between px-6 py-3">
            <p class="font-bold animate-pulse text-2xl">Laporan Transaksi </p>
            <div class="flex items-center gap-3">
                <!-- Notifikasi -->
                <button class="relative">
                    <span class="absolute top-0 right-0 block w-2 h-2 bg-red-500 rounded-full"></span>
                    🔔
                </button>
                <!-- Profil -->
                <div class="flex items-center border-orange-500  border rounded-lg shadow px-3 scroll-py-5">
                    <img src="{{ asset('images/seven.png') }}" alt="Logo" class="w-20 h-12   rounded-full" />
                    <div class="text-sm">
                        <p class="font-semibold">Seven Inc</p>
                        <p class="text-xs text-gray-500">financeseven@gmail.com</p>
                    </div>
                </div>
            </div>
        </header>



        <div class="ml-[24px]">
            <h4 class="font-semibold text-lg ">Laporan Transaksi Penghasilan</h4>
            <p class="text-sm mt-3">Hanya catatan transaksi dalam 12 bulan terakhir akan dipertahankan. silahkan download
                salinan PDF anda</p>
        </div>


        {{-- riwayat transaksi --}}
        <div class="mb-8">
            <div class="flex justify-between items-start ml-[380px] mb-3">
                <select
                    class="border border-orange-500 rounded-lg px-2 py-2 text-sm ml-[430px] text-orange-500 hover:bg-orange-500 hover:text-white">
                    <option selected">Periode</option>
                    <div class="font-bold text-black">
                        <option value="">1 Bulan Terakhir</option>
                        <option value="">3 Bulan Terakhir</option>
                    </div>
                </select>
            </div>
            <div class="rounded-2xl overflow-hidden">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-orange-500 text-white">
                            <th class="px-4 py-2 text-left">Tanggal</th>
                            <th class="px-4 py-2 text-left">Jenis Trnasaksi</th>
                            <th class="px-4 py-2 text-left">Penghasilan</th>
                            <th class="px-4 py-2 text-left">Koin</th>
                            <th class="px-4 py-2 text-left">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Baris -->
                        <tr class="border-t">
                            <td class="px-4 py-2">25 Juni 2024</td>
                            <td class="px-4 py-2">Top Up</td>
                            <td class="px-4 py-2">Rp. 1.000.000</td>
                            <td class="px-4 py-2">10</td>
                            <td class="px-4 py-2 text-orange-500"><i class="fa-solid fa-file-lines">detail</i></td>
                        </tr>
                        <tr class="border-t">
                            <td class="px-4 py-2">25 Juni 2024</td>
                            <td class="px-4 py-2">Top Up</td>
                            <td class="px-4 py-2">Rp. 1.000.000</td>
                            <td class="px-4 py-2">10</td>
                            <td class="px-4 py-2 text-orange-500"><i class="fa-solid fa-file-lines">detail</i></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
