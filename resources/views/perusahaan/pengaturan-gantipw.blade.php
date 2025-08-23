@extends('layouts.index-perusahaan')
@section('content')
    <div class="bg-white flex items-start min-h-screen">
        <div class="w-full max-w-3xl px-8 pl-12">
            <!-- Logo + Info Perusahaan -->
            <div class="flex items-center gap-4">
                <img src="{{ asset('images/seven.png') }}" alt="Logo" class="w-48 h-48 object-contain">
                <div>
                    <h1 class="font-semibold text-lg">Seven_Inc</h1>
                    <p class="text-gray-700">Jasa TI dan Konsultan TI</p>
                    <p class="text-gray-500 text-sm">Jakarta Timur, DKI Jakarta, Indonesia</p>
                </div>
            </div>

            <div class="bg-white min-h-screen flex items-start justify-start p-10">
                <div class="w-full max-w-2xl space-y-6">

                    <!-- Tombol Ganti Password -->
                    <button class="w-full bg-orange-600 text-white font-medium py-3 rounded-lg text-left pl-4">
                        Ganti Password
                    </button>

                    <!-- Form Password -->
                    <div class="space-y-4">
                        <!-- Kata Sandi Lama -->
                        <div class="flex items-center gap-6">
                            <label class="w-56 text-gray-800">Kata Sandi Lama</label>
                            <input type="text" placeholder="Teknik Informatika"
                                class="flex-1 border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-400" />
                        </div>

                        <!-- Kata Sandi Baru -->
                        <div class="flex items-center gap-6">
                            <label class="w-56 text-gray-800">Kata Sandi Baru</label>
                            <input type="text" placeholder="Teknik Informatika"
                                class="flex-1 border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-400" />
                        </div>

                        <!-- Masukkan Kembali Kata Sandi Baru -->
                        <div class="flex items-center gap-6">
                            <label class="w-56 text-gray-800">Masukkan Kembali Kata Sandi Baru</label>
                            <input type="text" placeholder="Teknik Informatika"
                                class="flex-1 border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-400" />
                        </div>
                    </div>

                    <!-- Tombol Ganti Email -->
                    <button class="w-full bg-orange-600 text-white font-medium py-3 rounded-lg text-left pl-4">
                        Ganti Email
                    </button>

                </div>
            </div>

        </div>
    </div>
    @include('layouts.footer')
@endsection
