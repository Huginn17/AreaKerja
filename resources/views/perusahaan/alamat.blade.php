@extends('layouts.index-perusahaan')
@section('content')
    <div class="bg-white min-h-screen p-8">
        <!-- Header -->
        <div class="flex items-center space-x-4">
            <img src="{{ asset('images/seven.png') }}" alt="Logo" class="w-60 h-56 object-contain" />
            <div>
                <h1 class="font-semibold text-gray-800">Seven_Inc</h1>
                <p class="text-sm text-gray-600">Jasa TI dan Konsultan TI</p>
            <p class="text-sm text-gray-400">Alamat default</p>
            </div>
        </div>

        <!-- Garis & Judul -->
        <div class="mt-6 ml-12">
            <h2 class="font-semibold text-gray-800">Alamat</h2>
            <hr class="border border-orange-500 mt-3 " />
        </div>

        <!-- Box Alamat -->
        <div class="mt-6 ml-12 border border-orange-400 rounded-md p-6 w-[500px]">
            <div class="flex items-center text-gray-400 space-x-2 mb-6">
                <span class="font-medium">Alamat Kosong</span>
                <!-- Icon dokumen -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 7h10M7 11h10M7 15h6M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h7l7 7v9a2 2 0 01-2 2z" />
                </svg>
            </div>
            <button class="ml-72 bg-orange-500 text-white px-4 py-1 rounded-md text-sm hover:bg-orange-600">
                Tambah Alamat
            </button>
        </div>
    </div>

    @include('layouts.footer')
@endsection
