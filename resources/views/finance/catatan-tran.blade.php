@extends('finance.sidebar.index')
@section('sidebar')
    <div class="p-4 sm:ml-64">
        <!-- Header -->
        <header class="w-full flex items-center justify-between px-6 py-3">
            <p class="font-bold animate-pulse text-2xl">Catatan Transaksi </p>
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



        {{-- riwayat transaksi --}}
        <div class="mb-8">
            <h2 class="text-lg font-semibold mb-2">Riwayat Tunai</h2>
            <div class="rounded-2xl overflow-hidden">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-orange-500 text-white">
                            <th class="px-4 py-2 text-left">No</th>
                            <th class="px-4 py-2 text-left">No. Refrensi</th>
                            <th class="px-4 py-2 text-left">Jenis</th>
                            <th class="px-4 py-2 text-left">Dari</th>
                            <th class="px-4 py-2 text-left">Sumber Dana</th>
                            <th class="px-4 py-2 text-left">Total Koin</th>
                            <th class="px-4 py-2 text-left">Detail</th>
                            <th class="px-4 py-2 text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Baris -->
                        <tr class="border-t">
                            <td class="px-4 py-2">1</td>
                            <td class="px-4 py-2">991773493631</td>
                            <td class="px-4 py-2">Open CV</td>
                            <td class="px-4 py-2">AppleCorp.</td>
                            <td class="px-4 py-2">Koin AreaKerja</td>
                            <td class="px-4 py-2">Rp. 10.000</td>
                            <td class="px-4 py-2 text-orange-500"><i class="fa-solid fa-file-lines">detail</i></td>
                            <td class="px-4 py-2 text-green-600 font-semibold">Sukses</td>
                        </tr>
                        <tr class="border-t">
                            <td class="px-4 py-2">2</td>
                            <td class="px-4 py-2">991773493631</td>
                            <td class="px-4 py-2">Open CV</td>
                            <td class="px-4 py-2">AppleCorp.</td>
                            <td class="px-4 py-2">Koin AreaKerja</td>
                            <td class="px-4 py-2">Rp. 10.000</td>
                            <td class="px-4 py-2 text-orange-500"><i class="fa-solid fa-file-lines">detail</i></td>
                            <td class="px-4 py-2 text-green-600 font-semibold">Sukses</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- riwayat transaksi koin --}}
            <div class="mb-8 mt-6">
                <h2 class="text-lg font-semibold mb-2">Riwayat Koin</h2>
                <div class="rounded-2xl overflow-hidden">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-orange-500 text-white">
                                <th class="px-4 py-2 text-left">No</th>
                                <th class="px-4 py-2 text-left">No. Refrensi</th>
                                <th class="px-4 py-2 text-left">Jenis</th>
                                <th class="px-4 py-2 text-left">Dari</th>
                                <th class="px-4 py-2 text-left">Sumber Dana</th>
                                <th class="px-4 py-2 text-left">Total Koin</th>
                                <th class="px-4 py-2 text-left">Detail</th>
                                <th class="px-4 py-2 text-left">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Baris -->
                            <tr class="border-t">
                                <td class="px-4 py-2">1</td>
                                <td class="px-4 py-2">991773493631</td>
                                <td class="px-4 py-2">Open CV</td>
                                <td class="px-4 py-2">AppleCorp.</td>
                                <td class="px-4 py-2">Koin AreaKerja</td>
                                <td class="px-4 py-2">10 Koin</td>
                                <td class="px-4 py-2 text-orange-500"><i class="fa-solid fa-file-lines">detail</i></td>
                                <td class="px-4 py-2 text-green-600 font-semibold">Sukses</td>
                            </tr>
                            <tr class="border-t">
                                <td class="px-4 py-2">2</td>
                                <td class="px-4 py-2">991773493631</td>
                                <td class="px-4 py-2">Open CV</td>
                                <td class="px-4 py-2">AppleCorp.</td>
                                <td class="px-4 py-2">Koin AreaKerja</td>
                                <td class="px-4 py-2">10 Koin</td>
                                <td class="px-4 py-2 text-orange-500"><i class="fa-solid fa-file-lines">detail</i></td>
                                <td class="px-4 py-2 text-green-600 font-semibold">Sukses</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
