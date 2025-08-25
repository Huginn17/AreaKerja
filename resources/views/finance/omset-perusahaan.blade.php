@extends('finance.sidebar.index')
@section('sidebar')
    <div class="p-4 sm:ml-64">
        <!-- Header -->
        <header class="w-full flex items-center justify-between px-6 py-3 border-b shadow-sm">
            <p class="font-bold animate-pulse text-2xl">Omset Perusahaan </p>
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


        <div class="p-10 font-sans">


            {{-- paket harga koin --}}
            <div class="mb-10">
                <div class="flex justify-between items-center mb-2">
                    <h2 class=" text-lg font-semibold mb-2">Tamplikan Omset Perusahaan</h2>
                    <select class="border border-orange-500 rounded-lg px-3 py-2 text-sm ml-[430px]">
                        <option selected">Bulan</option>
                        <option value="">1 Bulan Terakhir</option>
                        <option value="">3 Bulan Terakhir</option>
                    </select>
                    <button class="bg-orange-500 text-white text-xs px-5 py-1 rounded-full ml-auto">Cari</button>
                </div>
                <div class="border border-gray-300 rounded-2xl overflow-hidden w[500px]">

                    {{-- header --}}
                    <div class="flex justify-center items-center bg-orange-500 text-white px-4 py-2">
                        <div class=" font-semibold">Daftar Omset Perusahaan</div>
                    </div>

                    {{-- isi tabel --}}
                    <div class="divider-y divide-gray-300 bg-white">
                        <div class="flex justify-between items-center px-4 py-3">
                            <div>Januari 2023</div>
                            <div>RP. 3.000.000</div>
                        </div>
                    </div>
                </div>
            </div>

            <ul class="text-md font-semibold ">
                <li class="py-2">Total Omset<span class="pl-3">: RP. 24.000.000</span></li>
                <li class="py-2">Rata Rata<span class="pl-8">: RP. 3.000.000</span></li>
            </ul>
            <div class="border border-orange-500 mt-5"></div>
            <div class="mt-5">
                <button class="bg-orange-500 text-white text-xs px-5 py-1 rounded-full ml-auto"
                    type="submit">Unduh</button>
            </div>
        </div>
    </div>
@endsection
