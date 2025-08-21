@extends('layouts.index')
@section('content')
 

    <div class=" flex justify-center py-8">
        <div class="w-full max-w-4xl bg-white  p-6">

            <!-- Header Profil -->
            <h2 class="text-lg font-semibold mb-4">Profil Akun</h2>
            <div
                class="border border-orange-400 rounded-lg p-4 flex flex-col md:flex-row md:items-center md:justify-between">
                <!-- Foto + Upload -->
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <img src="{{ asset('images/cwe.png') }}" alt="Profile"
                            class="w-24 h-24 rounded-full object-cover">
                         <button class="absolute bottom-11 right-14 bg-orange-500 text-white rounded-full p-1 text-xs">
                            ✎
                        </button>
                        <select class="border border-orange-500 rounded-md px-3 py-2 text-sm text-orange-500 mt-4">
                            <option class="hover:bg-gray-100">Pelamar Aktif</option>
                            <option>Perusahaan</option>
                        </select>
                    </div>
                    <div class="flex flex-col space-y-2">
                        <div class="flex space-x-2">
                            <button
                                class="px-4 py-2 border border-orange-300 hover:bg-gray-100 text-orange-500 rounded-md flex items-center space-x-2">
                                <span>📤</span> <span>Upload</span>
                            </button>
                            <button class="px-4 py-2 border border-gray-300 hover:bg-gray-100 text-gray-500 rounded-md">🗑 Remove</button>
                        </div>
                    </div>
                </div>

                <!-- Tombol kanan -->
                <div class="flex space-x-2 mt-4 md:mt-0">
                    <button class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-md">Unduh CV</button>
                    <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md">Simpan</button>
                </div>
            </div>

            <!-- Form Alamat -->
            <div class="mt-8">
                <h3 class="text-base font-semibold hover:gray-100 border-b border-orange-500 pb-2 mb-4">Alamat</h3>

                <form class="space-y-4">
                    <div>
                        <label class="block text-sm mb-1">Label Alamat</label>
                        <input type="text" class="w-full border border-gray-300 rounded-md px-3 py-2"
                            placeholder="Label Alamat">
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Alamat Lengkap</label>
                        <input type="text" class="w-full border border-gray-300 rounded-md px-3 py-2"
                            placeholder="Alamat Lengkap">
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Kecamatan</label>
                        <input type="text" class="w-full border border-gray-300 rounded-md px-3 py-2"
                            placeholder="Kecamatan">
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Kota</label>
                        <input type="text" class="w-full border border-gray-300 rounded-md px-3 py-2" placeholder="Kota">
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Provinsi</label>
                        <input type="text" class="w-full border border-gray-300 rounded-md px-3 py-2"
                            placeholder="Provinsi">
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Detail Alamat</label>
                        <input type="text" class="w-full border border-gray-300 rounded-md px-3 py-2"
                            placeholder="Detail lainnya (Cth: Blok/Unit)">
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Kode Pos</label>
                        <input type="text" class="w-full border border-gray-300 rounded-md px-3 py-2"
                            placeholder="Kode Pos">
                    </div>

                    <!-- Tombol Simpan -->
                    <div class="flex justify-center pt-4">
                        <button class="bg-orange-500 hover:bg-orange-600  text-white px-6 py-2 rounded-md">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

   @include('layouts.footer')
@endsection
