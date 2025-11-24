@extends('layouts.index-perusahaan')
@section('content')
    <div class="flex items-center justify-center bg-white my-12 mt-16">
        <div class="w-[600px] border border-gray-300 rounded-lg p-6 bg-white shadow-sm">
            <h2 class="text-lg font-semibold mb-4">Laporan Pekerja</h2>

            <!-- Nama Pekerja -->
            <div class="mb-4">
                <label class="block mb-1">Nama Pekerja</label>
                <input type="text"
                    class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-orange-500">
            </div>
            89
            <!-- Gender -->
            <div class="mb-4">
                <label class="block mb-1">Gender</label>
                <div class="flex items-center gap-4">
                    <label class="flex items-center gap-1 text-sm">
                        <input type="radio" name="gender"
                            class="w-4 h-4 border-2 border-orange-500 text-orange-500 focus:ring-orange-500 accent-orange-500">
                        Laki-Laki
                    </label>
                    <label class="flex items-center gap-1 text-sm">
                        <input type="radio" name="gender"
                            class="w-4 h-4 border-2 border-orange-500 text-orange-500 focus:ring-orange-500 accent-orange-500">
                        Perempuan
                    </label>
                </div>
            </div>

            <!-- Upload Bukti -->
            <div class="mb-4">
                <label class="block mb-1">Upload Bukti Pendukung</label>
                <input type="text" placeholder="Contoh : Absensi Kerja_Nama_.pdf"
                    class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-orange-500">
            </div>

            <!-- Alasan -->
            <div class="mb-6">
                <label class="block mb-1">Alasan Pelaporan</label>
                <textarea rows="3" placeholder="Contoh : Nama jarang sekali datang tepat waktu dan sering bolos kerja"
                    class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-orange-500"></textarea>
            </div>

            <!-- Tombol Simpan -->
            <div class="text-center">
                <button class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-1.5 rounded-md text-sm">Simpan</button>
            </div>
        </div>
    </div>

    @include('layouts.footer')
@endsection
