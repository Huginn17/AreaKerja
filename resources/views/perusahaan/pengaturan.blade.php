@extends('layouts.index-perusahaan')
@section('content')
    <div class="bg-white flex items-start min-h-screen">
        <div class="w-full max-w-3xl px-8 pl-12">
            <!-- Logo + Info Perusahaan -->
            <div class="flex items-center gap-4">
                <img src="{{ asset('images/seven.png') }}" alt="Logo" class="w-full h-full object-contain">
                <div>
                    <h1 class="font-semibold text-lg">Seven_Inc</h1>
                    <p class="text-gray-700">Jasa TI dan Konsultan TI</p>
                    <p class="text-gray-500 text-sm">Jakarta Timur, DKI Jakarta, Indonesia</p>
                </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="mt-12 space-y-4">
                <button class="w-full bg-orange-600 text-white py-3 rounded text-left pl-3">
                    Ganti Email
                </button>
                <button class="w-full bg-orange-600 text-white py-3 rounded text-left pl-3">
                    Ganti Password
                </button>
            </div>
        </div>
    </div>

    @include('layouts.footer')
@endsection
