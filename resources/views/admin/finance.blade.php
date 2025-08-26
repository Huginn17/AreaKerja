@extends('admin.sidebar.index')
@section('sidebaradmin')
    <div class="p-4 sm:ml-64">

        <!-- Header -->
        <header class="w-full flex items-center justify-between px-6 py-3 border-bshadow-sm">
            <h1 class="text-xl font-semibold">Data Transaksi Coin</h1>
            <div class="flex items-center gap-3">
                <!-- Notifikasi -->
                <button class="relative">
                    <span class="absolute top-0 right-0 block w-2 h-2 bg-red-500 rounded-full"></span>
                    🔔
                </button>
                <!-- Profil -->
                <div class="flex items-center border-gray-800  border rounded-lg shadow px-3 scroll-py-5">
                    <img src="{{ asset('images/owi.jpg') }}" alt="Logo" class="w-20 h-10   rounded-full" />
                    <div class="text-sm">
                        <p class="font-semibold">Bapak Owi </p>
                        <p class="text-xs text-gray-500">owihutan@gmail.com</p>
                    </div>
                </div>
            </div>
        </header>

        <div class="p-6">
            <div class="block lg:flex justify-between items-center mb-4">
                <div class="space-x-2 grid grid-cols-2 gap-2 lg:inline md:inline mb-5 lg:mb-0">
                    <button id="btn_koin"
                        class="bg-gray-700 text-gray-700 text-white w-[110px] px-4 py-2 rounded-md text-sm">Koin</button>
                    <button id="btn_tunai"
                        class="border text-gray-700 w-[110px] px-4 py-2 rounded-md text-sm">Tunai</button>
                </div>


                <div class="flex items-center space-x-2 mb-4 justify-end">
                    <select class="border border-gray-300 rounded px-2 py-1 text-sm">
                        <option>No. Ref</option>
                    </select>
                    <input type="text" value="991773493631"
                        class="border border-gray-300 rounded px-2 py-1 text-sm w-48">
                    <button class="bg-gray-700 text-white px-4 py-1 rounded">Cari</button>
                </div>
            </div>

            <!-- Table -->
            <div id="table_koin" class="rounded-2xl border border-gray-300 overflow-hidden">
                <table class="w-full text-sm text-left">
                    <thead class="bg-white">
                        <tr class="border-b">
                            <th class="px-4 py-2">No</th>
                            <th class="px-4 py-2">No.Refrensi</th>
                            <th class="px-4 py-2">Jenis</th>
                            <th class="px-4 py-2">Dari</th>
                            <th class="px-4 py-2">Sumber Dana</th>
                            <th class="px-4 py-2">Transaksi Koin</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Baris -->
                        <tr class="border-b">
                            <td class="px-4 py-2">1</td>
                            <td class="px-4 py-2">991773493631</td>
                            <td class="px-4 py-2">Open CV</td>
                            <td class="px-4 py-2">AppleCorp.</td>
                            <td class="px-4 py-2">VA BCA</td>
                            <td class="px-4 py-2">1.000 Koin</td>
                            <td class="px-4 py-2 text-red-600">Pending</td>
                            <td class="px-4 py-2 text-blue-600"><i class="fa-regular fa-file-lines"></i></td>
                        </tr>

                        <tr class="border-b">
                            <td class="px-4 py-2">1</td>
                            <td class="px-4 py-2">991773493631</td>
                            <td class="px-4 py-2">Open CV</td>
                            <td class="px-4 py-2">AppleCorp.</td>
                            <td class="px-4 py-2">VA BCA</td>
                            <td class="px-4 py-2">1.000 Koin</td>
                            <td class="px-4 py-2 text-green-600">Success</td>
                            <td class="px-4 py-2 text-blue-600"><i class="fa-regular fa-file-lines"></i></td>
                        </tr>

                        <tr class="border-b">
                            <td class="px-4 py-2">1</td>
                            <td class="px-4 py-2">991773493631</td>
                            <td class="px-4 py-2">Open CV</td>
                            <td class="px-4 py-2">AppleCorp.</td>
                            <td class="px-4 py-2">VA BCA</td>
                            <td class="px-4 py-2">1.000 Koin</td>
                            <td class="px-4 py-2 text-green-600">Success</td>
                            <td class="px-4 py-2 text-blue-600"><i class="fa-regular fa-file-lines"></i></td>
                        </tr>

                        <tr class="border-b">
                            <td class="px-4 py-2">1</td>
                            <td class="px-4 py-2">991773493631</td>
                            <td class="px-4 py-2">Open CV</td>
                            <td class="px-4 py-2">AppleCorp.</td>
                            <td class="px-4 py-2">VA BCA</td>
                            <td class="px-4 py-2">1.000 Koin</td>
                            <td class="px-4 py-2 text-green-600">Success</td>
                            <td class="px-4 py-2 text-blue-600"><i class="fa-regular fa-file-lines"></i></td>
                        </tr>

                        <tr class="border-b">
                            <td class="px-4 py-2">1</td>
                            <td class="px-4 py-2">991773493631</td>
                            <td class="px-4 py-2">Open CV</td>
                            <td class="px-4 py-2">AppleCorp.</td>
                            <td class="px-4 py-2">VA BCA</td>
                            <td class="px-4 py-2">1.000 Koin</td>
                            <td class="px-4 py-2 text-green-600">Success</td>
                            <td class="px-4 py-2 text-blue-600"><i class="fa-regular fa-file-lines"></i></td>
                        </tr>

                        <tr class="border-b">
                            <td class="px-4 py-2">1</td>
                            <td class="px-4 py-2">991773493631</td>
                            <td class="px-4 py-2">Open CV</td>
                            <td class="px-4 py-2">AppleCorp.</td>
                            <td class="px-4 py-2">VA BCA</td>
                            <td class="px-4 py-2">1.000 Koin</td>
                            <td class="px-4 py-2 text-red-600">Pending</td>
                            <td class="px-4 py-2 text-blue-600"><i class="fa-regular fa-file-lines"></i></td>
                        </tr>

                        <tr class="border-b">
                            <td class="px-4 py-2">1</td>
                            <td class="px-4 py-2">991773493631</td>
                            <td class="px-4 py-2">Open CV</td>
                            <td class="px-4 py-2">AppleCorp.</td>
                            <td class="px-4 py-2">VA BCA</td>
                            <td class="px-4 py-2">1.000 Koin</td>
                            <td class="px-4 py-2 text-green-600">Success</td>
                            <td class="px-4 py-2 text-blue-600"><i class="fa-regular fa-file-lines"></i></td>
                        </tr>

                        <tr class="border-b">
                            <td class="px-4 py-2">1</td>
                            <td class="px-4 py-2">991773493631</td>
                            <td class="px-4 py-2">Open CV</td>
                            <td class="px-4 py-2">AppleCorp.</td>
                            <td class="px-4 py-2">VA BCA</td>
                            <td class="px-4 py-2">1.000 Koin</td>
                            <td class="px-4 py-2 text-green-600">Success</td>
                            <td class="px-4 py-2 text-blue-600"><i class="fa-regular fa-file-lines"></i></td>
                        </tr>

                        <tr class="border-b">
                            <td class="px-4 py-2">1</td>
                            <td class="px-4 py-2">991773493631</td>
                            <td class="px-4 py-2">Open CV</td>
                            <td class="px-4 py-2">AppleCorp.</td>
                            <td class="px-4 py-2">VA BCA</td>
                            <td class="px-4 py-2">1.000 Koin</td>
                            <td class="px-4 py-2 text-red-600">Pending</td>
                            <td class="px-4 py-2 text-blue-600"><i class="fa-regular fa-file-lines"></i></td>
                        </tr>

                        <tr class="border-b">
                            <td class="px-4 py-2">1</td>
                            <td class="px-4 py-2">991773493631</td>
                            <td class="px-4 py-2">Open CV</td>
                            <td class="px-4 py-2">AppleCorp.</td>
                            <td class="px-4 py-2">VA BCA</td>
                            <td class="px-4 py-2">1.000 Koin</td>
                            <td class="px-4 py-2 text-red-600">Pending</td>
                            <td class="px-4 py-2 text-blue-600"><i class="fa-regular fa-file-lines"></i></td>
                        </tr>

                        <tr>
                            <td class="px-4 py-2">1</td>
                            <td class="px-4 py-2">991773493631</td>
                            <td class="px-4 py-2">Open CV</td>
                            <td class="px-4 py-2">AppleCorp.</td>
                            <td class="px-4 py-2">VA BCA</td>
                            <td class="px-4 py-2">1.000 Koin</td>
                            <td class="px-4 py-2 text-red-600">Pending</td>
                            <td class="px-4 py-2 text-blue-600"><i class="fa-regular fa-file-lines"></i></td>
                        </tr>

                    </tbody>
                </table>
            </div>

            {{-- End table koin --}}




            {{-- table tunai --}}
            <div id="table_tunai" class="hidden rounded-2xl border border-gray-300 overflow-hidden">
                <table class="w-full text-sm text-left">
                    <thead class="bg-white">
                        <tr class="border-b">
                            <th class="px-4 py-2">No</th>
                            <th class="px-4 py-2">No.Refrensi</th>
                            <th class="px-4 py-2">Jenis</th>
                            <th class="px-4 py-2">Dari</th>
                            <th class="px-4 py-2">Sumber Dana</th>
                            <th class="px-4 py-2">Transaksi Koin</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Baris -->
                        <tr class="border-b">
                            <td class="px-4 py-2">1</td>
                            <td class="px-4 py-2">991773493631</td>
                            <td class="px-4 py-2">Open CV</td>
                            <td class="px-4 py-2">AppleCorp.</td>
                            <td class="px-4 py-2">VA BCA</td>
                            <td class="px-4 py-2">1.000 Koin</td>
                            <td class="px-4 py-2 text-red-600">Pending</td>
                            <td class="px-4 py-2 text-blue-600"><i class="fa-regular fa-file-lines"></i></td>
                        </tr>

                        <tr class="border-b">
                            <td class="px-4 py-2">1</td>
                            <td class="px-4 py-2">991773493631</td>
                            <td class="px-4 py-2">Open CV</td>
                            <td class="px-4 py-2">AppleCorp.</td>
                            <td class="px-4 py-2">VA BCA</td>
                            <td class="px-4 py-2">1.000 Koin</td>
                            <td class="px-4 py-2 text-green-600">Success</td>
                            <td class="px-4 py-2 text-blue-600"><i class="fa-regular fa-file-lines"></i></td>
                        </tr>

                        <tr class="border-b">
                            <td class="px-4 py-2">1</td>
                            <td class="px-4 py-2">991773493631</td>
                            <td class="px-4 py-2">Open CV</td>
                            <td class="px-4 py-2">AppleCorp.</td>
                            <td class="px-4 py-2">VA BCA</td>
                            <td class="px-4 py-2">1.000 Koin</td>
                            <td class="px-4 py-2 text-green-600">Success</td>
                            <td class="px-4 py-2 text-blue-600"><i class="fa-regular fa-file-lines"></i></td>
                        </tr>

                        <tr class="border-b">
                            <td class="px-4 py-2">1</td>
                            <td class="px-4 py-2">991773493631</td>
                            <td class="px-4 py-2">Open CV</td>
                            <td class="px-4 py-2">AppleCorp.</td>
                            <td class="px-4 py-2">VA BCA</td>
                            <td class="px-4 py-2">1.000 Koin</td>
                            <td class="px-4 py-2 text-green-600">Success</td>
                            <td class="px-4 py-2 text-blue-600"><i class="fa-regular fa-file-lines"></i></td>
                        </tr>

                        <tr class="border-b">
                            <td class="px-4 py-2">1</td>
                            <td class="px-4 py-2">991773493631</td>
                            <td class="px-4 py-2">Open CV</td>
                            <td class="px-4 py-2">AppleCorp.</td>
                            <td class="px-4 py-2">VA BCA</td>
                            <td class="px-4 py-2">1.000 Koin</td>
                            <td class="px-4 py-2 text-green-600">Success</td>
                            <td class="px-4 py-2 text-blue-600"><i class="fa-regular fa-file-lines"></i></td>
                        </tr>

                        <tr class="border-b">
                            <td class="px-4 py-2">1</td>
                            <td class="px-4 py-2">991773493631</td>
                            <td class="px-4 py-2">Open CV</td>
                            <td class="px-4 py-2">AppleCorp.</td>
                            <td class="px-4 py-2">VA BCA</td>
                            <td class="px-4 py-2">1.000 Koin</td>
                            <td class="px-4 py-2 text-red-600">Pending</td>
                            <td class="px-4 py-2 text-blue-600"><i class="fa-regular fa-file-lines"></i></td>
                        </tr>

                        <tr class="border-b">
                            <td class="px-4 py-2">1</td>
                            <td class="px-4 py-2">991773493631</td>
                            <td class="px-4 py-2">Open CV</td>
                            <td class="px-4 py-2">AppleCorp.</td>
                            <td class="px-4 py-2">VA BCA</td>
                            <td class="px-4 py-2">1.000 Koin</td>
                            <td class="px-4 py-2 text-green-600">Success</td>
                            <td class="px-4 py-2 text-blue-600"><i class="fa-regular fa-file-lines"></i></td>
                        </tr>

                        <tr class="border-b">
                            <td class="px-4 py-2">1</td>
                            <td class="px-4 py-2">991773493631</td>
                            <td class="px-4 py-2">Open CV</td>
                            <td class="px-4 py-2">AppleCorp.</td>
                            <td class="px-4 py-2">VA BCA</td>
                            <td class="px-4 py-2">1.000 Koin</td>
                            <td class="px-4 py-2 text-green-600">Success</td>
                            <td class="px-4 py-2 text-blue-600"><i class="fa-regular fa-file-lines"></i></td>
                        </tr>

                        <tr class="border-b">
                            <td class="px-4 py-2">1</td>
                            <td class="px-4 py-2">991773493631</td>
                            <td class="px-4 py-2">Open CV</td>
                            <td class="px-4 py-2">AppleCorp.</td>
                            <td class="px-4 py-2">VA BCA</td>
                            <td class="px-4 py-2">1.000 Koin</td>
                            <td class="px-4 py-2 text-red-600">Pending</td>
                            <td class="px-4 py-2 text-blue-600"><i class="fa-regular fa-file-lines"></i></td>
                        </tr>

                        <tr class="border-b">
                            <td class="px-4 py-2">1</td>
                            <td class="px-4 py-2">991773493631</td>
                            <td class="px-4 py-2">Open CV</td>
                            <td class="px-4 py-2">AppleCorp.</td>
                            <td class="px-4 py-2">VA BCA</td>
                            <td class="px-4 py-2">1.000 Koin</td>
                            <td class="px-4 py-2 text-red-600">Pending</td>
                            <td class="px-4 py-2 text-blue-600"><i class="fa-regular fa-file-lines"></i></td>
                        </tr>

                        <tr>
                            <td class="px-4 py-2">1</td>
                            <td class="px-4 py-2">991773493631</td>
                            <td class="px-4 py-2">Open CV</td>
                            <td class="px-4 py-2">AppleCorp.</td>
                            <td class="px-4 py-2">VA BCA</td>
                            <td class="px-4 py-2">1.000 Koin</td>
                            <td class="px-4 py-2 text-red-600">Pending</td>
                            <td class="px-4 py-2 text-blue-600"><i class="fa-regular fa-file-lines"></i></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    </div>
    </div>
    </div>
@endsection
