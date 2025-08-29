@extends('super_admin.sidebar.index')
@section('sidebarsuperadmin')
    <div class="flex-1 p-6 bg-white overflow-y-auto">
        {{-- Header --}}
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-medium">Paket Harga</h1>

            <!-- user info -->
            <div class="flex items-center gap-3">
                <svg width="31" height="32" viewBox="0 0 31 32" fill="none"
                    xmlns="http://www.w3.org/2000/svg">...</svg>
                <div class="flex items-center gap-2 bg-white px-3 py-2 border border-gray-500 shadow-md rounded-2xl">
                    <a href="#">
                        <img src="{{ asset('images/ohim.jpg') }}" class="w-8 h-8 rounded-full" alt="User">
                    </a>
                    <div class="text-md">
                        <div class="font-semibold">Dj Ohim</div>
                        <div class="text-gray-500">lutung123@gmail.com</div>
                    </div>
                    <select class="appearance-none px-8 py-2 bg-transparent text-gray-600 text-md focus:outline-none">
                        <option>Text 1</option>
                        <option>Text 2</option>
                        <option>Text 3</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Dropdown -->
        <select id="menu_select"
            class="w-48 bg-orange-500 text-white font-medium px-4 py-2 border border-orange-500 rounded-md flex justify-between items-center focus:outline-none">
            <option value="paket_harga">Paket Harga</option>
            <option value="riwayat">Riwayat</option>
            <option value="laporan">Laporan</option>
        </select>

        <!-- Konten Paket Harga -->
        <div id="paket_harga" class="mt-4">
            <div class="p-4">
                {{-- paket harga koin --}}
                <div class="mb-10">
                    <div class="flex justify-between items-center mb-2">
                        <h2 class="flex justify-between items-start text-lg font-semibold mb-2">Paket Harga Koin</h2>
                        <button onclick="bukaModal()"
                            class="bg-orange-500 text-white text-xs px-5 py-1 rounded-full ml-auto">Edit</button>
                    </div>
                    <div class="border border-gray-300 rounded-2xl overflow-hidden w[500px]">

                        {{-- header --}}
                        <div class="flex justify-between items-center bg-orange-500 text-white px-4 py-2">
                            <div class="flex-1 font-semibold">Nama</div>
                            <div class="font-semibold">Harga</div>
                        </div>

                        {{-- isi tabel --}}
                        <div class="divider-y divide-gray-300 bg-white">
                            <div class="flex justify-between items-center px-4 py-3">
                                <div>Pasang Lowongan Bronze</div>
                                <div>150 Koin</div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Paket Harga Pembayaran --}}
                <div class="mb-10">
                    <div class="flex justify-between items-center mb-2">
                        <h2 class="flex justify-between items-start text-lg font-semibold mb-2">Paket Harga Pembayaran</h2>
                        <button class="bg-orange-500 text-white text-xs px-5 py-1 rounded-full ml-auto">Edit</button>
                    </div>
                    <div class="border border-gray-300 rounded-2xl overflow-hidden w[500px]">

                        {{-- header --}}
                        <div class="flex justify-between items-center bg-orange-500 text-white px-4 py-2">
                            <div class="flex-1 font-semibold">Nama</div>
                            <div class="font-semibold">Harga</div>
                        </div>

                        {{-- isi tabel --}}
                        <div class="divider-y divide-gray-300 bg-white">
                            <div class="flex justify-between items-center px-4 py-3">
                                <div>Pendaftaran kandidat</div>
                                <div>Rp. 10.000.000</div>
                            </div>
                        </div>
                    </div>
                </div>

                @include('finance.modal-editkoin')
            </div>
        </div>




        <!-- Konten Riwayat -->
        <div id="riwayat" class="mt-4 hidden">

            <div class="p-4">
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
                                    <th class="px-4 py-2 text-center">Detail</th>
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
                                    <td class="px-4 py-2 text-orange-500 flex items-center justify-center"><svg
                                            width="19" height="24" viewBox="0 0 19 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M0.4375 0.680664V23.091H18.3658V11.8858H8.12105V0.680664H0.4375ZM10.6822 0.680664V9.08455H18.3658L10.6822 0.680664ZM2.99868 6.28325H5.55987V9.08455H2.99868V6.28325ZM2.99868 11.8858H5.55987V14.6871H2.99868V11.8858ZM2.99868 17.4884H13.2434V20.2897H2.99868V17.4884Z"
                                                fill="#FA6601" />
                                        </svg>

                                    </td>
                                    <td class="px-4 py-2 text-green-600 font-semibold">Sukses</td>
                                </tr>
                                <tr class="border-t">
                                    <td class="px-4 py-2">2</td>
                                    <td class="px-4 py-2">991773493631</td>
                                    <td class="px-4 py-2">Open CV</td>
                                    <td class="px-4 py-2">AppleCorp.</td>
                                    <td class="px-4 py-2">Koin AreaKerja</td>
                                    <td class="px-4 py-2">Rp. 10.000</td>
                                    <td class="px-4 py-2 text-orange-500 flex items-center justify-center"><svg
                                            width="19" height="24" viewBox="0 0 19 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M0.4375 0.680664V23.091H18.3658V11.8858H8.12105V0.680664H0.4375ZM10.6822 0.680664V9.08455H18.3658L10.6822 0.680664ZM2.99868 6.28325H5.55987V9.08455H2.99868V6.28325ZM2.99868 11.8858H5.55987V14.6871H2.99868V11.8858ZM2.99868 17.4884H13.2434V20.2897H2.99868V17.4884Z"
                                                fill="#FA6601" />
                                        </svg>

                                    </td>
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
                                        <th class="px-4 py-2 text-center">Detail</th>
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
                                        <td class="px-4 py-2 text-orange-500 flex items-center justify-center"><svg
                                                width="19" height="24" viewBox="0 0 19 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M0.4375 0.680664V23.091H18.3658V11.8858H8.12105V0.680664H0.4375ZM10.6822 0.680664V9.08455H18.3658L10.6822 0.680664ZM2.99868 6.28325H5.55987V9.08455H2.99868V6.28325ZM2.99868 11.8858H5.55987V14.6871H2.99868V11.8858ZM2.99868 17.4884H13.2434V20.2897H2.99868V17.4884Z"
                                                    fill="#FA6601" />
                                            </svg>

                                        </td>
                                        <td class="px-4 py-2 text-green-600 font-semibold">Sukses</td>
                                    </tr>
                                    <tr class="border-t">
                                        <td class="px-4 py-2">2</td>
                                        <td class="px-4 py-2">991773493631</td>
                                        <td class="px-4 py-2">Open CV</td>
                                        <td class="px-4 py-2">AppleCorp.</td>
                                        <td class="px-4 py-2">Koin AreaKerja</td>
                                        <td class="px-4 py-2">10 Koin</td>
                                        <td class="px-4 py-2 text-orange-500 flex items-center justify-center"><svg
                                                width="19" height="24" viewBox="0 0 19 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M0.4375 0.680664V23.091H18.3658V11.8858H8.12105V0.680664H0.4375ZM10.6822 0.680664V9.08455H18.3658L10.6822 0.680664ZM2.99868 6.28325H5.55987V9.08455H2.99868V6.28325ZM2.99868 11.8858H5.55987V14.6871H2.99868V11.8858ZM2.99868 17.4884H13.2434V20.2897H2.99868V17.4884Z"
                                                    fill="#FA6601" />
                                            </svg>

                                        </td>
                                        <td class="px-4 py-2 text-green-600 font-semibold">Sukses</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Konten Laporan -->
        <div id="laporan" class="mt-4 hidden overflow-hidden">
            <div class="p-4">
                <div>
                    <h4 class="font-semibold text-lg ">Catatan Transaksi Penghasilan</h4>
                    <p class="text-sm mt-3">Hanya catatan transaksi dalam 12 bulan terakhir akan dipertahankan. silahkan
                        download
                        salinan PDF anda</p>
                </div>
                {{-- riwayat transaksi --}}
                <div class="mb-8 bg-orange-500 p-4 rounded-lg mt-3">
                    <span class="text-md font-semibold text-white">Riwayat Koin</span>
                    <div class="flex justify-start gap-3 mb-3 mt-4">
                        <select class="border border-orange-500 rounded-lg px-4 py-2 text-sm text-orange-500 font-medium">
                            <option selected">Bulan</option>
                            <div class="font-bold text-black">
                                <option value="">1 Bulan Terakhir</option>
                                <option value="">3 Bulan Terakhir</option>
                            </div>
                        </select>
                        <select class="border border-orange-500 rounded-lg px-4 py-2 text-sm text-orange-500 font-medium">
                            <option selected">Tahun</option>
                            <div class="font-bold text-black">
                                <option value="">1 Bulan Terakhir</option>
                                <option value="">3 Bulan Terakhir</option>
                            </div>
                        </select>
                    </div>
                    <div class="rounded-2xl overflow-hidden bg-white">
                        <table class="w-full text-sm text-center">
                            <thead>
                                <tr class=" text-orange-500">
                                    <th class="px-4 py-2">Contoh Tansaksi</th>
                                    <th class="px-4 py-2">Pendapatan</th>
                                    <th class="px-4 py-2">Koin</th>
                                    <th class="px-4 py-2">Tanggal</th>
                                    <th class="px-4 py-2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Baris -->
                                <tr class="border-t">
                                    <td class="px-4 py-2 ">25 Juni 2024</td>
                                    <td class="px-4 py-2">Top Up</td>
                                    <td class="px-4 py-2">10</td>
                                    <td class="px-4 py-2">Rp. 1.000.000</td>
                                    <td class="px-4 py-2 text-orange-500 flex items-center justify-center"><svg
                                            width="19" height="24" viewBox="0 0 19 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M0.4375 0.680664V23.091H18.3658V11.8858H8.12105V0.680664H0.4375ZM10.6822 0.680664V9.08455H18.3658L10.6822 0.680664ZM2.99868 6.28325H5.55987V9.08455H2.99868V6.28325ZM2.99868 11.8858H5.55987V14.6871H2.99868V11.8858ZM2.99868 17.4884H13.2434V20.2897H2.99868V17.4884Z"
                                                fill="#FA6601" />
                                        </svg>

                                    </td>
                                </tr>
                                <tr class="border-t">
                                    <td class="px-4 py-2">25 Juni 2024</td>
                                    <td class="px-4 py-2">Top Up</td>
                                    <td class="px-4 py-2">10</td>
                                    <td class="px-4 py-2">Rp. 1.000.000</td>
                                    <td class="px-4 py-2 text-orange-500 flex items-center justify-center"><svg
                                            width="19" height="24" viewBox="0 0 19 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M0.4375 0.680664V23.091H18.3658V11.8858H8.12105V0.680664H0.4375ZM10.6822 0.680664V9.08455H18.3658L10.6822 0.680664ZM2.99868 6.28325H5.55987V9.08455H2.99868V6.28325ZM2.99868 11.8858H5.55987V14.6871H2.99868V11.8858ZM2.99868 17.4884H13.2434V20.2897H2.99868V17.4884Z"
                                                fill="#FA6601" />
                                        </svg>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
