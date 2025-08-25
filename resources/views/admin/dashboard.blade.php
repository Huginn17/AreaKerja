@extends('admin.sidebar.index')
@section('sidebaradmin')
    <div class="p-4 sm:ml-64">


        <!-- Header -->
        <header class="w-full flex items-center justify-between px-6 py-3 border-bshadow-sm">
            <h1 class="text-xl font-semibold">Dashboard</h1>
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


        <div class="flex gap-6 mt-6 px-5 ">
            <!-- Card Perusahaan -->
            <div class="bg-white shadow-md rounded-md p-5 w-60 hover:scale-105">
                <h3 class="text-gray-700 text-sm font-medium mb-2">Perusahaan</h3>
                <div class="flex items-center gap-2">
                    <span class="text-2xl font-bold text-gray-900">27</span>
                    <span class="text-green-600 text-sm font-semibold">+1.3%</span>
                </div>
                <a href="#" class="text-xs text-gray-500 hover:text-green-600 mt-2 inline-block">Lihat Detail
                    &gt;</a>
            </div>

            <!-- Card Kandidat -->
            <div class="bg-white shadow-md rounded-md p-5 w-60 hover:scale-105">
                <h3 class="text-gray-700 text-sm font-medium mb-2">Kandidat</h3>
                <div class="flex items-center gap-2">
                    <span class="text-2xl font-bold text-gray-900">15</span>
                    <span class="text-green-600 text-sm font-semibold">+2.3%</span>
                </div>
                <a href="#" class="text-xs text-gray-500 hover:text-green-600 mt-2 inline-block">Lihat Detail
                    &gt;</a>
            </div>

            <!-- Card Non Kandidat -->
            <div class="bg-white shadow-md rounded-md p-5 w-60 hover:scale-105">
                <h3 class="text-gray-700 text-sm font-medium mb-2">Non Kandidat</h3>
                <div class="flex items-center gap-2">
                    <span class="text-2xl font-bold text-gray-900">14</span>
                    <span class="text-green-600 text-sm font-semibold">+0.7%</span>
                </div>
                <a href="#" class="text-xs text-gray-500 hover:text-green-600 mt-2 inline-block">Lihat Detail
                    &gt;</a>
            </div>

            <!-- Card Lowongan -->
            <div class="bg-white shadow-md rounded-md p-5 w-60 hover:scale-105">
                <h3 class="text-gray-700 text-sm font-medium mb-2">Lowongan</h3>
                <div class="flex items-center gap-2">
                    <span class="text-2xl font-bold text-gray-900">37</span>
                    <span class="text-green-600 text-sm font-semibold">+5.3%</span>
                </div>
                <a href="#" class="text-xs text-gray-500 hover:text-green-600 mt-2 inline-block">Lihat Detail
                    &gt;</a>
            </div>
        </div>
    </div>
@endsection
