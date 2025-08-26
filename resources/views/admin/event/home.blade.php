@extends('admin.sidebar.index')
@section('sidebaradmin')
    <div class="p-4 sm:ml-64">


        <!-- Header -->
        <header class="w-full flex items-center justify-between px-6 py-3 border-bshadow-sm">
            <h1 class="text-xl font-semibold">Kelola Event</h1>
            <div class="flex items-center gap-3">
                <!-- Notifikasi -->
                <button class="relative">
                    <span class="absolute top-0 right-0 block w-2 h-2 bg-red-500 rounded-full"></span>
                    🔔
                </button>
                <!-- Profil -->
                <div class="flex items-center border-gray-800  border rounded-lg shadow px-3 scroll-py-5">
                    <img src="{{ asset('images/ohim.jpg') }}" alt="Logo" class="w-15 h-12 pr-2   rounded-full" />
                    <div class="text-sm">
                        <p class="font-semibold">Dj Ohim </p>
                        <p class="text-xs text-gray-500">ohim@gmail.com</p>
                    </div>
                </div>
            </div>
        </header>


        {{-- search --}}
        <div class="p-6">
            <div class="block lg:flex justify-between items-center mb-4">
                <div class="space-x-2 grid grid-cols-2 gap-2 lg:inline md:inline mb-5 lg:mb-0">
                    <button class="bg-blue-400 text-white px-4 py-2 rounded-md">Buat Post</button>
                </div>

                <div class="flex items-center space-x-2 mt-0 lg:mt-0 md:mt">
                    <input type="text" placeholder="Cari Event"
                        class="border border-gray-500 rounded-md px-3 py-2 w-56 focus:outline-none focus:ring-2 focus:ring-gray-400">
                    <button class="bg-gray-700 text-white px-4 py-2 rounded-md">Cari</button>
                </div>
            </div>


            {{-- Table Kandidat --}}
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="text-left">
                            <th class="px-6 py-3 font-semibold text-gray-700">Status</th>
                            <th class="px-6 py-3 font-semibold text-gray-700">Nama</th>
                            <th class="px-6 py-3 font-semibold text-gray-700">Pendaftran</th>
                            <th class="px-6 py-3 font-semibold text-gray-700">Qouta</th>
                            <th class="px-6 py-3 font-semibold text-gray-700">Mulai</th>
                            <th class="px-6 py-3 font-semibold text-gray-700">Selesai</th>
                            <th class="px-6 py-3 font-semibold text-gray-700">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="px-6 py-3 text-white"><span class="bg-green-500 px-4 py-1 rounded-lg">Buka</span>
                            </td>
                            <td class="px-6 py-3 text-blue-400">Nama Event</td>
                            <td class="px-6 py-3 text-gray-700 text-center">0</td>
                            <td class="px-6 py-3 text-gray-700">200</td>
                            <td class="px-6 py-3 text-gray-700">27 Jul 2023 08.00</td>
                            <td class="px-6 py-3 text-gray-700">27 Jul 2023 11.00</td>
                            <td class="px-6 py-3 flex space-x-1">
                            <td class="px-6 py-4 flex gap-2">
                                 <button class="bg-gray-500 text-white p-2 rounded hover:bg-gray-600">
                                    <svg width="19" height="20" viewBox="0 0 19 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M3.42593 20C2.79784 20 2.25997 19.7822 1.81231 19.3467C1.36466 18.9111 1.14121 18.3881 1.14198 17.7778V3.33333H0V1.11111H5.70988V0H12.5617V1.11111H18.2716V3.33333H17.1296V17.7778C17.1296 18.3889 16.9058 18.9122 16.4581 19.3478C16.0105 19.7833 15.473 20.0007 14.8457 20H3.42593ZM14.8457 3.33333H3.42593V17.7778H14.8457V3.33333ZM5.70988 15.5556H7.99383V5.55556H5.70988V15.5556ZM10.2778 15.5556H12.5617V5.55556H10.2778V15.5556Z"
                                            fill="white" />
                                    </svg>
                                </button>
                            </td>
                            </td>
                        </tr>


                        <tr class="border-t">
                            <td class="px-6 py-3 text-white"><span class="bg-red-600 px-4 py-1 rounded-lg">Tutup</span></td>
                            <td class="px-6 py-3 text-blue-400">Nama Event</td>
                            <td class="px-6 py-3 text-gray-700 text-center">0</td>
                            <td class="px-6 py-3 text-gray-700">200</td>
                            <td class="px-6 py-3 text-gray-700">27 Jul 2023 08.00</td>
                            <td class="px-6 py-3 text-gray-700">27 Jul 2023 11.00</td>
                            <td class="px-6 py-3 flex space-x-1">
                            <td class="px-6 py-4 flex gap-2">
                                <button class="bg-gray-500 text-white p-2 rounded hover:bg-gray-600">
                                    <svg width="19" height="20" viewBox="0 0 19 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M3.42593 20C2.79784 20 2.25997 19.7822 1.81231 19.3467C1.36466 18.9111 1.14121 18.3881 1.14198 17.7778V3.33333H0V1.11111H5.70988V0H12.5617V1.11111H18.2716V3.33333H17.1296V17.7778C17.1296 18.3889 16.9058 18.9122 16.4581 19.3478C16.0105 19.7833 15.473 20.0007 14.8457 20H3.42593ZM14.8457 3.33333H3.42593V17.7778H14.8457V3.33333ZM5.70988 15.5556H7.99383V5.55556H5.70988V15.5556ZM10.2778 15.5556H12.5617V5.55556H10.2778V15.5556Z"
                                            fill="white" />
                                    </svg>
                                </button>
                            </td>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            {{-- End Table Kandidat --}}

        </div>
    </div>
@endsection
