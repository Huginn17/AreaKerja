@extends('finance.sidebar.index')
@section('sidebar')
    <div class="p-4 sm:ml-64 ">
        <!-- Header -->
        <header class="w-full flex items-center justify-between px-6 py-3">
            <!-- Kiri: Judul + Button -->
            <div>
                <p class="font-semibold text-2xl mb-2">Riwayat</p><br>

                <form action="/submit" method="POST" class="flex items-center gap-3">
                    <!-- Dropdown -->
                    <select id="menu_select" name="menu_select"
                        class="w-48 bg-orange-500 text-white font-medium px-4 py-2 border border-orange-500 rounded-lg focus:outline-none">
                        <option value="riwayat">Riwayat</option>
                        <option value="paket_harga">Paket Harga</option>
                        <option value="laporan">Laporan</option>
                    </select>
                </form>
                </button>

            </div>
            <div class="flex items-center gap-3">
                <svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_722_7956)">
                        <path
                            d="M23.076 14.9431L22.6747 12.7383L21.1101 13.0055L21.5756 15.5633C21.6168 15.7894 21.7387 15.9922 21.9146 16.127L24.4524 18.0732L24.6985 19.4255L7.4876 22.3654L7.24147 21.0131L8.93911 18.3434C9.05673 18.1585 9.09972 17.9276 9.05861 17.7015L8.43786 14.2911C8.21777 13.0934 8.29153 11.8668 8.65169 10.7352C9.01186 9.60353 9.64569 8.60691 10.4892 7.84595C11.3326 7.08499 12.3559 6.58665 13.4555 6.40126C14.5552 6.21586 15.6924 6.34997 16.7522 6.79004L16.4051 4.88278C15.595 4.65063 14.7612 4.55689 13.9346 4.605L13.6165 2.85717L12.0518 3.12444L12.37 4.87227C10.4802 5.41568 8.87215 6.70676 7.85685 8.49588C6.84155 10.285 6.49109 12.445 6.87324 14.5583L7.42973 17.6158L5.7321 20.2855C5.61447 20.4704 5.57149 20.7013 5.6126 20.9274L6.07815 23.4852C6.11931 23.7114 6.24121 23.9141 6.41702 24.049C6.59284 24.1838 6.80817 24.2396 7.01565 24.2042L12.4919 23.2688L12.647 24.1214C12.8528 25.252 13.4623 26.2659 14.3414 26.9401C15.2205 27.6142 16.2971 27.8934 17.3345 27.7162C18.3719 27.539 19.2851 26.9199 19.8732 25.9951C20.4612 25.0704 20.676 23.9157 20.4702 22.785L20.315 21.9324L25.7912 20.997C25.9987 20.9616 26.1813 20.8378 26.2989 20.6528C26.4165 20.4679 26.4595 20.2369 26.4183 20.0108L25.9528 17.453C25.9116 17.2269 25.7896 17.0241 25.6138 16.8894L23.076 14.9431ZM18.9055 23.0523C19.029 23.7307 18.9002 24.4235 18.5473 24.9784C18.1945 25.5332 17.6466 25.9047 17.0242 26.011C16.4017 26.1173 15.7557 25.9498 15.2283 25.5453C14.7008 25.1408 14.3351 24.5325 14.2117 23.8541L14.0565 23.0015L18.7504 22.1997L18.9055 23.0523Z"
                            fill="black" />
                        <path
                            d="M22.3629 11.0329C24.0912 10.7376 25.2143 8.97144 24.8714 7.08792C24.5286 5.20441 22.8497 3.91684 21.1214 4.21205C19.3932 4.50727 18.2701 6.27347 18.6129 8.15698C18.9558 10.0405 20.6347 11.3281 22.3629 11.0329Z"
                            fill="black" />
                        <ellipse cx="21.3472" cy="5.13034" rx="6.35506" ry="6.15646" fill="#E46054" />
                    </g>
                    <path d="M22.8299 3.49956L20.917 8H19.8345L21.7696 3.61819H19.3452V2.72106H22.8299V3.49956Z"
                        fill="white" />
                    <defs>
                        <clipPath id="clip0_722_7956">
                            <rect width="25.3967" height="27.7315" fill="white"
                                transform="matrix(0.985722 -0.168378 0.179073 0.983836 0.164062 4.27612)" />
                        </clipPath>
                    </defs>
                </svg>

                <div
                    class="flex items-center justify-between w-96 h-14 bg-white border border-orange-500 shadow-md rounded-2xl px-3 py-2">
                    <!-- Logo + Info -->
                    <div class="flex items-center gap-2 mr-2">
                        <a href="#">
                            <img src="{{ asset('images/seven.png') }}" class="w-16 h-16 object-contain" alt="User">
                        </a>
                        <div class="text-sm">
                            <div class="font-semibold">Seven Inc</div>
                            <div class="text-gray-500 text-xs">financeseven@gmail.com</div>
                        </div>
                    </div>

                    <!-- Dropdown -->
                    <select class="appearance-none text-gray-600 text-xs px-8 focus:outline-none cursor-pointer">
                        <option>Text 1</option>
                        <option>Text 2</option>
                        <option>Text 3</option>
                    </select>
                </div>
            </div>
        </header>



        {{-- riwayat transaksi --}}
        <div class="p-4">
            <div class="mb-8">
                <h2 class="text-lg font-semibold mb-2">Riwayat Tunai</h2>
                <div class="rounded-2xl overflow-hidden border">
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
                                <td class="px-4 py-3">1</td>
                                <td class="px-4 py-3">991773493631</td>
                                <td class="px-4 py-3">Open CV</td>
                                <td class="px-4 py-3">AppleCorp.</td>
                                <td class="px-4 py-3">Koin AreaKerja</td>
                                <td class="px-4 py-3">Rp. 10.000</td>
                                <td class="px-4 py-2 text-orange-500 flex items-center justify-center"><svg width="19"
                                        height="24" viewBox="0 0 19 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M0.4375 0.680664V23.091H18.3658V11.8858H8.12105V0.680664H0.4375ZM10.6822 0.680664V9.08455H18.3658L10.6822 0.680664ZM2.99868 6.28325H5.55987V9.08455H2.99868V6.28325ZM2.99868 11.8858H5.55987V14.6871H2.99868V11.8858ZM2.99868 17.4884H13.2434V20.2897H2.99868V17.4884Z"
                                            fill="#FA6601" />
                                    </svg>

                                </td>
                                <td class="px-4 py-2 text-green-600 font-semibold">Sukses</td>
                            </tr>

                            <tr class="border-t">
                                <td class="px-4 py-3">2</td>
                                <td class="px-4 py-3">991773493631</td>
                                <td class="px-4 py-3">Open CV</td>
                                <td class="px-4 py-3">AppleCorp.</td>
                                <td class="px-4 py-3">Koin AreaKerja</td>
                                <td class="px-4 py-3">Rp. 10.000</td>
                                <td class="px-4 py-2 text-orange-500 flex items-center justify-center"><svg width="19"
                                        height="24" viewBox="0 0 19 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M0.4375 0.680664V23.091H18.3658V11.8858H8.12105V0.680664H0.4375ZM10.6822 0.680664V9.08455H18.3658L10.6822 0.680664ZM2.99868 6.28325H5.55987V9.08455H2.99868V6.28325ZM2.99868 11.8858H5.55987V14.6871H2.99868V11.8858ZM2.99868 17.4884H13.2434V20.2897H2.99868V17.4884Z"
                                            fill="#FA6601" />
                                    </svg>

                                </td>
                                <td class="px-4 py-2 text-green-600 font-semibold">Sukses</td>
                            </tr>

                            <tr class="border-t">
                                <td class="px-4 py-3">3</td>
                                <td class="px-4 py-3">991773493631</td>
                                <td class="px-4 py-3">Open CV</td>
                                <td class="px-4 py-3">AppleCorp.</td>
                                <td class="px-4 py-3">Koin AreaKerja</td>
                                <td class="px-4 py-3">Rp. 10.000</td>
                                <td class="px-4 py-3 text-orange-500 flex items-center justify-center"><svg width="19"
                                        height="24" viewBox="0 0 19 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M0.4375 0.680664V23.091H18.3658V11.8858H8.12105V0.680664H0.4375ZM10.6822 0.680664V9.08455H18.3658L10.6822 0.680664ZM2.99868 6.28325H5.55987V9.08455H2.99868V6.28325ZM2.99868 11.8858H5.55987V14.6871H2.99868V11.8858ZM2.99868 17.4884H13.2434V20.2897H2.99868V17.4884Z"
                                            fill="#FA6601" />
                                    </svg>

                                </td>
                                <td class="px-4 py-2 text-green-600 font-semibold">Sukses</td>
                            </tr>

                            <tr class="border-b border-2">
                                <td class="px-4 py-2">4</td>
                                <td class="px-4 py-2">991773493631</td>
                                <td class="px-4 py-2">Open CV</td>
                                <td class="px-4 py-2">AppleCorp.</td>
                                <td class="px-4 py-2">Koin AreaKerja</td>
                                <td class="px-4 py-2">Rp. 10.000</td>
                                <td class="px-4 py-2 text-orange-500 flex items-center justify-center"><svg width="19"
                                        height="24" viewBox="0 0 19 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M0.4375 0.680664V23.091H18.3658V11.8858H8.12105V0.680664H0.4375ZM10.6822 0.680664V9.08455H18.3658L10.6822 0.680664ZM2.99868 6.28325H5.55987V9.08455H2.99868V6.28325ZM2.99868 11.8858H5.55987V14.6871H2.99868V11.8858ZM2.99868 17.4884H13.2434V20.2897H2.99868V17.4884Z"
                                            fill="#FA6601" />
                                    </svg>
                                </td>
                                <td class="px-4 py-2 text-green-600 font-semibold">Sukses</td>
                            </tr>

                            <tr class="border-b">
                                <td class="px-4 py-3">5</td>
                                <td class="px-4 py-3">991773493631</td>
                                <td class="px-4 py-3">Open CV</td>
                                <td class="px-4 py-3">AppleCorp.</td>
                                <td class="px-4 py-3">Koin AreaKerja</td>
                                <td class="px-4 py-3">Rp. 10.000</td>
                                <td class="px-4 py-2 text-orange-500 flex items-center justify-center"><svg width="19"
                                        height="24" viewBox="0 0 19 24" fill="none"
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
                <div class="w-full">
                    <div class="mt-6">
                        <h2 class="text-lg font-semibold mb-2">Riwayat Koin</h2>
                        <div class="rounded-2xl overflow-hidden border">
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

                                <tbody>
                                    <!-- Baris -->
                                    <tr class="border-t">
                                        <td class="px-4 py-2">3</td>
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

                                <tbody>
                                    <!-- Baris -->
                                    <tr class="border-t">
                                        <td class="px-4 py-2">4</td>
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

                                <tbody>
                                    <!-- Baris -->
                                    <tr class="border-t">
                                        <td class="px-4 py-2">5</td>
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
            @endsection
