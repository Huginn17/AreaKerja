@extends('finance.sidebar.index')
@section('sidebar')
    <div class="p-4 sm:ml-64">
        <!-- Header -->
        <header class="w-full flex items-center justify-between px-6 py-3 border-b shadow-sm">
            <p class="font-bold animate-pulse text-2xl">Dashboard </p>
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

        <!-- Content -->
        <main class="px-6 py-6 space-y-6">

            <!-- Cards -->
            <div class="flex justify-center items-center gap-6">
                <div class="w-80 bg-orange-500 text-white rounded-md p-5 flex justify-between items-center">
                    <div>
                        <p class="text-sm">Total Omset</p>
                        <p class="text-lg font-bold">Rp. 2.000.000</p>
                    </div>
                    <div class="text-4xl"><svg width="52" height="53" viewBox="0 0 52 53" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M51.6876 26.6983C51.6876 40.904 40.1716 52.42 25.9659 52.42C11.7601 52.42 0.244141 40.904 0.244141 26.6983C0.244141 12.4926 11.7601 0.976562 25.9659 0.976562C40.1716 0.976562 51.6876 12.4926 51.6876 26.6983Z"
                                fill="white" />
                            <path
                                d="M22.3527 20.8449C22.6948 20.6176 23.1164 20.4123 23.6042 20.2556V24.0035C23.1621 23.865 22.7411 23.6667 22.3527 23.4142C21.5514 22.88 21.3969 22.3812 21.3969 22.1296C21.3969 21.8779 21.5514 21.3791 22.3527 20.8449ZM28.0187 32.8326V29.0847C28.5043 29.2414 28.9281 29.4466 29.2702 29.674C30.0737 30.2104 30.226 30.707 30.226 30.9586C30.226 31.2103 30.0715 31.7091 29.2702 32.2433C28.8818 32.4958 28.4608 32.694 28.0187 32.8326Z"
                                fill="#FA6601" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M25.8115 44.1993C30.4947 44.1993 34.9861 42.3389 38.2976 39.0273C41.6092 35.7158 43.4696 31.2244 43.4696 26.5411C43.4696 21.8579 41.6092 17.3665 38.2976 14.0549C34.9861 10.7434 30.4947 8.883 25.8115 8.883C21.1282 8.883 16.6368 10.7434 13.3253 14.0549C10.0137 17.3665 8.15333 21.8579 8.15333 26.5411C8.15333 31.2244 10.0137 35.7158 13.3253 39.0273C16.6368 42.3389 21.1282 44.1993 25.8115 44.1993ZM28.0187 15.5048C28.0187 14.9194 27.7862 14.358 27.3722 13.944C26.9583 13.5301 26.3969 13.2975 25.8115 13.2975C25.226 13.2975 24.6646 13.5301 24.2507 13.944C23.8367 14.358 23.6042 14.9194 23.6042 15.5048V15.7079C22.2857 15.9426 21.0278 16.4395 19.9048 17.1691C18.3112 18.2286 16.9824 19.9392 16.9824 22.1266C16.9824 24.3118 18.3112 26.0224 19.9048 27.0841C20.9643 27.7904 22.2313 28.2871 23.6042 28.5453V32.8296C22.7411 32.5493 22.1032 32.1299 21.7435 31.7172C21.5567 31.488 21.3259 31.2987 21.0646 31.1605C20.8033 31.0223 20.517 30.9379 20.2225 30.9125C19.928 30.887 19.6314 30.921 19.3502 31.0123C19.0691 31.1037 18.8092 31.2506 18.5859 31.4443C18.3627 31.638 18.1806 31.8745 18.0505 32.1399C17.9204 32.4054 17.8449 32.6942 17.8285 32.9893C17.8121 33.2845 17.8552 33.5799 17.9552 33.8581C18.0552 34.1362 18.21 34.3915 18.4105 34.6087C19.651 36.0412 21.5294 36.9837 23.6042 37.3744V37.5775C23.6042 38.1629 23.8367 38.7243 24.2507 39.1382C24.6646 39.5522 25.226 39.7847 25.8115 39.7847C26.3969 39.7847 26.9583 39.5522 27.3722 39.1382C27.7862 38.7243 28.0187 38.1629 28.0187 37.5775V37.3744C29.3372 37.1397 30.5951 36.6428 31.7181 35.9132C33.3117 34.8537 34.6405 33.1431 34.6405 30.9557C34.6405 28.7705 33.3117 27.0598 31.7181 25.9981C30.5951 25.2685 29.3372 24.7716 28.0187 24.5369V20.2526C28.8818 20.533 29.5197 20.9523 29.8794 21.3651C30.0679 21.5887 30.299 21.7727 30.5591 21.9062C30.8193 22.0398 31.1034 22.1203 31.395 22.1431C31.6865 22.166 31.9797 22.1306 32.2575 22.0392C32.5353 21.9477 32.7921 21.8019 33.0131 21.6104C33.2341 21.4188 33.4148 21.1852 33.5447 20.9232C33.6746 20.6612 33.7512 20.376 33.7699 20.0841C33.7887 19.7923 33.7492 19.4996 33.6539 19.2231C33.5586 18.9466 33.4093 18.6918 33.2146 18.4736C31.9719 17.0411 30.0958 16.0986 28.0187 15.7079V15.5048Z"
                                fill="#FA6601" />
                        </svg>
                    </div>
                </div>
                <div class="w-80 bg-orange-500 text-white rounded-md p-5 flex justify-between items-center">
                    <div>
                        <p class="text-sm">Total Transaksi Koin</p>
                        <p class="text-lg font-bold">40.000</p>
                    </div>
                    <div class="text-4xl"><svg width="52" height="53" viewBox="0 0 52 53" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M51.5899 26.6993C51.5899 40.905 40.0739 52.421 25.8682 52.421C11.6625 52.421 0.146484 40.905 0.146484 26.6993C0.146484 12.4935 11.6625 0.977539 25.8682 0.977539C40.0739 0.977539 51.5899 12.4935 51.5899 26.6993Z"
                                fill="white" />
                            <path
                                d="M13.3261 33.0642V34.8343C13.3261 36.2977 17.5094 37.4874 22.6655 37.4874C27.8216 37.4874 32.0049 36.2977 32.0049 34.8343V33.0642C29.9959 34.2705 26.3234 34.8343 22.6655 34.8343C19.0076 34.8343 15.3351 34.2705 13.3261 33.0642ZM28.8917 21.5689C34.0478 21.5689 38.2311 20.3791 38.2311 18.9158C38.2311 17.4524 34.0478 16.2627 28.8917 16.2627C23.7356 16.2627 19.5524 17.4524 19.5524 18.9158C19.5524 20.3791 23.7356 21.5689 28.8917 21.5689ZM13.3261 28.7156V30.8547C13.3261 32.318 17.5094 33.5078 22.6655 33.5078C27.8216 33.5078 32.0049 32.318 32.0049 30.8547V28.7156C29.9959 30.1251 26.3185 30.8547 22.6655 30.8547C19.0124 30.8547 15.3351 30.1251 13.3261 28.7156ZM33.5614 29.1716C36.3486 28.7115 38.2311 27.8575 38.2311 26.875V25.1049C37.1026 25.7848 35.4439 26.2491 33.5614 26.5351V29.1716ZM22.6655 22.8954C17.5094 22.8954 13.3261 24.3795 13.3261 26.2118C13.3261 28.0441 17.5094 29.5281 22.6655 29.5281C27.8216 29.5281 32.0049 28.0441 32.0049 26.2118C32.0049 24.3795 27.8216 22.8954 22.6655 22.8954ZM33.3328 25.2293C36.2513 24.7816 38.2311 23.9028 38.2311 22.8954V21.1253C36.5043 22.1658 33.5371 22.7254 30.4142 22.8581C31.8492 23.4509 32.9047 24.2468 33.3328 25.2293Z"
                                fill="#FA6601" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Table 1 -->
            <section>
                <h2 class="text-md font-semibold mb-2">Riwayat Transaksi Koin Terbaru</h2>
                <div class="overflow-x-auto border rounded-md">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="bg-orange-500 text-white text-sm">
                                <th class="font-medium px-3 py-2">No</th>
                                <th class="font-medium px-3 py-2">No. Refrensi</th>
                                <th class="font-medium px-3 py-2">Pesanan</th>
                                <th class="font-medium px-3 py-2">Dari</th>
                                <th class="font-medium px-3 py-2">Sumber Dana</th>
                                <th class="font-medium px-3 py-2">Tanggal</th>
                                <th class="font-medium px-3 py-2">Koin</th>
                                <th class="font-medium px-3 py-2">Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm text-gray-700">
                            {{-- <tr class="border-b">
                            <td class="px-3 py-2 text-center">1</td>
                            <td class="px-3 py-2 text-center">991773493631</td>
                            <td class="px-3 py-2 text-center">Open CV</td>
                            <td class="px-3 py-2 text-center">AppleCorp.</td>
                            <td class="px-3 py-2 text-center">Koin AreaKerja</td>
                            <td class="px-3 py-2 text-center">17 Juni 2024</td>
                            <td class="px-3 py-2 text-center">10 Koin</td>
                            <td class="px-3 py-2 text-red-500 font-medium text-center">Gagal</td>
                        </tr>
                        <tr class="border-b">
                            <td class="px-3 py-2 text-center">1</td>
                            <td class="px-3 py-2 text-center">991773493631</td>
                            <td class="px-3 py-2 text-center">Open CV</td>
                            <td class="px-3 py-2 text-center">AppleCorp.</td>
                            <td class="px-3 py-2 text-center">Koin AreaKerja</td>
                            <td class="px-3 py-2 text-center">17 Juni 2024</td>
                            <td class="px-3 py-2 text-center">10 Koin</td>
                            <td class="px-3 py-2 text-green-500 font-medium text-center">Sukses</td>
                        </tr>
                        <tr class="border-b">
                            <td class="px-3 py-2 text-center">1</td>
                            <td class="px-3 py-2 text-center">991773493631</td>
                            <td class="px-3 py-2 text-center">Open CV</td>
                            <td class="px-3 py-2 text-center">AppleCorp.</td>
                            <td class="px-3 py-2 text-center">Koin AreaKerja</td>
                            <td class="px-3 py-2 text-center">17 Juni 2024</td>
                            <td class="px-3 py-2 text-center">10 Koin</td>
                            <td class="px-3 py-2 text-green-500 font-medium text-center">Sukses</td>
                        </tr>
                        <tr class="border-b">
                            <td class="px-3 py-2 text-center">1</td>
                            <td class="px-3 py-2 text-center">991773493631</td>
                            <td class="px-3 py-2 text-center">Open CV</td>
                            <td class="px-3 py-2 text-center">AppleCorp.</td>
                            <td class="px-3 py-2 text-center">Koin AreaKerja</td>
                            <td class="px-3 py-2 text-center">17 Juni 2024</td>
                            <td class="px-3 py-2 text-center">10 Koin</td>
                            <td class="px-3 py-2 text-green-500 font-medium text-center">Sukses</td>
                        </tr>
                        <tr>
                            <td class="px-3 py-2 text-center">1</td>
                            <td class="px-3 py-2 text-center">991773493631</td>
                            <td class="px-3 py-2 text-center">Open CV</td>
                            <td class="px-3 py-2 text-center">AppleCorp.</td>
                            <td class="px-3 py-2 text-center">Koin AreaKerja</td>
                            <td class="px-3 py-2 text-center">17 Juni 2024</td>
                            <td class="px-3 py-2 text-center">10 Koin</td>
                            <td class="px-3 py-2 text-red-500 font-medium text-center">Gagal</td>
                        </tr> --}}
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- Table 2 (copy) -->
            <section>
                <h2 class="text-md font-semibold mb-2">Riwayat Transaksi Koin Terbaru</h2>
                <div class="overflow-x-auto border rounded-md">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="bg-orange-500 text-white text-sm">
                                <th class="font-medium px-3 py-2">No</th>
                                <th class="font-medium px-3 py-2">No. Refrensi</th>
                                <th class="font-medium px-3 py-2">Pesanan</th>
                                <th class="font-medium px-3 py-2">Dari</th>
                                <th class="font-medium px-3 py-2">Sumber Dana</th>
                                <th class="font-medium px-3 py-2">Tanggal</th>
                                <th class="font-medium px-3 py-2">Koin</th>
                                <th class="font-medium px-3 py-2">Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm text-gray-700">
                            {{-- <tr class="border-b">
                            <td class="px-3 py-2 text-center">1</td>
                            <td class="px-3 py-2 text-center">991773493631</td>
                            <td class="px-3 py-2 text-center">Open CV</td>
                            <td class="px-3 py-2 text-center">AppleCorp.</td>
                            <td class="px-3 py-2 text-center">Koin AreaKerja</td>
                            <td class="px-3 py-2 text-center">17 Juni 2024</td>
                            <td class="px-3 py-2 text-center">10 Koin</td>
                            <td class="px-3 py-2 text-red-500 font-medium text-center">Gagal</td>
                        </tr>
                        <tr class="border-b">
                            <td class="px-3 py-2 text-center">1</td>
                            <td class="px-3 py-2 text-center">991773493631</td>
                            <td class="px-3 py-2 text-center">Open CV</td>
                            <td class="px-3 py-2 text-center">AppleCorp.</td>
                            <td class="px-3 py-2 text-center">Koin AreaKerja</td>
                            <td class="px-3 py-2 text-center">17 Juni 2024</td>
                            <td class="px-3 py-2 text-center">10 Koin</td>
                            <td class="px-3 py-2 text-green-500 font-medium text-center">Sukses</td>
                        </tr>
                        <tr class="border-b">
                            <td class="px-3 py-2 text-center">1</td>
                            <td class="px-3 py-2 text-center">991773493631</td>
                            <td class="px-3 py-2 text-center">Open CV</td>
                            <td class="px-3 py-2 text-center">AppleCorp.</td>
                            <td class="px-3 py-2 text-center">Koin AreaKerja</td>
                            <td class="px-3 py-2 text-center">17 Juni 2024</td>
                            <td class="px-3 py-2 text-center">10 Koin</td>
                            <td class="px-3 py-2 text-green-500 font-medium text-center">Sukses</td>
                        </tr>
                        <tr class="border-b">
                            <td class="px-3 py-2 text-center">1</td>
                            <td class="px-3 py-2 text-center">991773493631</td>
                            <td class="px-3 py-2 text-center">Open CV</td>
                            <td class="px-3 py-2 text-center">AppleCorp.</td>
                            <td class="px-3 py-2 text-center">Koin AreaKerja</td>
                            <td class="px-3 py-2 text-center">17 Juni 2024</td>
                            <td class="px-3 py-2 text-center">10 Koin</td>
                            <td class="px-3 py-2 text-green-500 font-medium text-center">Sukses</td>
                        </tr>
                        <tr>
                            <td class="px-3 py-2 text-center">1</td>
                            <td class="px-3 py-2 text-center">991773493631</td>
                            <td class="px-3 py-2 text-center">Open CV</td>
                            <td class="px-3 py-2 text-center">AppleCorp.</td>
                            <td class="px-3 py-2 text-center">Koin AreaKerja</td>
                            <td class="px-3 py-2 text-center">17 Juni 2024</td>
                            <td class="px-3 py-2 text-center">10 Koin</td>
                            <td class="px-3 py-2 text-green-500 font-medium text-center">Sukses</td>
                        </tr> --}}
                        </tbody>
                    </table>
                </div>
            </section>

        </main>
    </div>
@endsection
