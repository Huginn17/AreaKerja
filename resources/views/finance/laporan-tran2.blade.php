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


        <div class="shadow-md rounded-xl p-6">
            {{-- header --}}
            <div class="flex justify-between items-start">
                {{-- logo alamat --}}
                <div class="font-semibold">
                    <div class="flex items-center space-x-2">
                        <img src="{{ asset('images/logoarea.png') }}" class="w-12 h-12" alt="">
                        <span class="text-orange-500 font-bold text-xl">areakerja.com</span>
                    </div>
                    <p class="text-sm text-gray-600 mt-1 leading-snug">
                        Jl. Laksda Adisucipto No.80, Ambarrukmo, Caturtunggal, Kec.<br>
                        Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281
                    </p>
                </div>
                {{-- info user --}}
                <div class="text-sm text-gray-700 text-right font-semibold">
                    <div class="flex justify-end space-x-3 mt-2 text-orange-500 text-lg">
                        <span>🖨️</span>
                        <span>⬇️</span>
                    </div>
                    <p class="pr-[103px]">Username : <span class="font-medium">Finance</span></p>
                    <p>Email : finance.group@gmail.com</p>
                    <p class="pr-[70px]">No.Telp : 0816342825322</p>
                </div>
            </div>





            {{-- riwayat transaksi --}}
            <div class="mt-10">
                <div class="flex justify-between items-center mb-3">
                    <h2 class="font-semibold text-lg ">Laporan Transaksi Penghasilan</h2>
                </div>
                <!-- Table -->
                <div class="overflow-hidden border border-gray-200 rounded-xl">
                    <table class="w-full text-sm border-collapse">
                        <thead>
                            <tr class="bg-orange-500 text-white text-left">
                                <th class="py-2 px-3">Transaksi</th>
                                <th class="py-2 px-3">Perusahaan</th>
                                <th class="py-2 px-3">Jenis Transaksi</th>
                                <th class="py-2 px-3">Sumber Dana</th>
                                <th class="py-2 px-3">Nominal IDR</th>
                                <th class="py-2 px-3">Transaksi Koin</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-t">
                                <td class="px-3 py-2">691174849221</td>
                                <td class="px-3 py-2">Applecorp.</td>
                                <td class="px-3 py-2">Pasang Lowongan</td>
                                <td class="px-3 py-2">BCA</td>
                                <td class="px-3 py-2">Rp. 1.000.000</td>
                                <td class="px-3 py-2 text-center">-</td>
                            </tr>
                            <tr class="border-t">
                                <td class="px-3 py-2">691174849221</td>
                                <td class="px-3 py-2">Applecorp.</td>
                                <td class="px-3 py-2">Pasang Lowongan</td>
                                <td class="px-3 py-2">BCA</td>
                                <td class="px-3 py-2">Rp. 1.000.000</td>
                                <td class="px-3 py-2 text-center">-</td>
                            </tr>
                            <tr class="border-t">
                                <td class="px-3 py-2">691174849221</td>
                                <td class="px-3 py-2">Applecorp.</td>
                                <td class="px-3 py-2">Pasang Lowongan</td>
                                <td class="px-3 py-2">BCA</td>
                                <td class="px-3 py-2">Rp. 1.000.000</td>
                                <td class="px-3 py-2 text-center">-</td>
                            </tr>
                            <tr class="border-t">
                                <td class="px-3 py-2">691174849221</td>
                                <td class="px-3 py-2">Applecorp.</td>
                                <td class="px-3 py-2">Pasang Lowongan</td>
                                <td class="px-3 py-2">BCA</td>
                                <td class="px-3 py-2">Rp. 1.000.000</td>
                                <td class="px-3 py-2 text-center">-</td>
                            </tr>
                            <tr class="border-t">
                                <td class="px-3 py-2">691174849221</td>
                                <td class="px-3 py-2">Applecorp.</td>
                                <td class="px-3 py-2">Pasang Lowongan</td>
                                <td class="px-3 py-2">Koin</td>
                                <td class="px-3 py-2">-</td>
                                <td class="px-3 py-2 text-center">30</td>
                            </tr>
                            <tr class="border-t">
                                <td class="px-3 py-2">691174849221</td>
                                <td class="px-3 py-2">Applecorp.</td>
                                <td class="px-3 py-2">Pasang Lowongan</td>
                                <td class="px-3 py-2">Koin</td>
                                <td class="px-3 py-2">-</td>
                                <td class="px-3 py-2 text-center">30</td>
                            </tr>
                            <tr class="border-t">
                                <td class="px-3 py-2">691174849221</td>
                                <td class="px-3 py-2">Applecorp.</td>
                                <td class="px-3 py-2">Pasang Lowongan</td>
                                <td class="px-3 py-2">Koin</td>
                                <td class="px-3 py-2">-</td>
                                <td class="px-3 py-2 text-center">30</td>
                            </tr>
                            <tr class="border-t">
                                <td class="px-3 py-2">691174849221</td>
                                <td class="px-3 py-2">Applecorp.</td>
                                <td class="px-3 py-2">Pasang Lowongan</td>
                                <td class="px-3 py-2">Koin</td>
                                <td class="px-3 py-2">-</td>
                                <td class="px-3 py-2 text-center">30</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- footer --}}
            <div class="mt-4 text-sm text-gray-800 font-semibold">
               <p>Total Tunai <span class="ml-14">: RP. 1.000.000</span></p>
               <p>Total Koin <span class="ml-[65px]">: 150 Koin</span></p>
            </div>
        </div>
    </div>
@endsection
