@extends('layouts.index-perusahaan')
@section('content')
    <div class="bg-white min-h-screen p-10">
        <!-- Judul -->
        <h2 class="text-xl font-semibold text-gray-800">Alamat</h2>
        <hr class="border-t-2 border-orange-500 mt-1 mb-6" />

        <!-- Form -->
        <form action="{{ route('alamat.store.perusahaan') }}" method="POST" class="ml-12 space-y-5 w-[1100px]">
            @csrf
            <!-- Nama Alamat -->
            <div>
                <label class="block text-sm font-medium text-gray-800 mb-1">
                    Nama Alamat <span class="text-red-500">*</span>
                </label>
                <input type="text" placeholder="Nama Alamat" name="label"
                    class="w-full mt-1 border border-orange-500 rounded-md px-3 py-2 outline-none focus:ring-1 focus:ring-orange-500" />
            </div>
            {{-- Kode Pos --}}
            <div>
                <label class="block text-sm font-medium text-gray-800 mb-1">
                    Kode Pos <span class="text-red-500">*</span>
                </label>
                <input type="text" placeholder="Kode Pos" name="kode_pos"
                    class="w-full mt-1 border border-orange-500 rounded-md px-3 py-2 outline-none focus:ring-1 focus:ring-orange-500" />
            </div>
            {{-- Desa --}}
            <div>
                <label class="block text-sm font-medium text-gray-800 mb-1">
                    Desa <span class="text-red-500">*</span>
                </label>
                <input type="text" placeholder="Desa" name="desa"
                    class="w-full mt-1 border border-orange-500 rounded-md px-3 py-2 outline-none focus:ring-1 focus:ring-orange-500" />
            </div>

            <!-- Provinsi -->
            <div>
                <label class="block text-sm font-medium text-gray-800 mb-1">
                    Provinsi <span class="text-red-500">*</span>
                </label>
                <select name="provinsi"
                    class="w-full mt-1 border border-orange-500 rounded-md px-3 py-2 outline-none focus:ring-1 focus:ring-orange-500">
                    <option value="" disabled selected>Provinsi</option>
                    <option value="jawa_barat">Jawa Barat</option>
                    <option value="jawa_tengah">Jawa tengah</option>
                    <option value="jawa_timur">Jawa Timur</option>
                </select>
            </div>



            <!-- Kabupaten -->
            <div>
                <label class="block text-sm font-medium text-gray-800 mb-1">
                    Kota <span class="text-red-500">*</span>
                </label>
                <select name="kota"
                    class="w-full mt-1 border border-orange-500 rounded-md px-3 py-2 outline-none focus:ring-1 focus:ring-orange-500">
                    <option value="" selected disabled>Kota</option>
                    <option value="banjar">Banjar</option>

                </select>
            </div>

            <!-- Kecamatan -->
            <div>
                <label class="block text-sm font-medium text-gray-800 mb-1">
                    Kecamatan <span class="text-red-500">*</span>
                </label>
                <select name="kecamatan"
                    class="w-full mt-1 border border-orange-500 rounded-md px-3 py-2 outline-none focus:ring-1 focus:ring-orange-500">
                    <option value="" selected disabled>Kecamatan</option>
                    <option value="cibeunying_kaler">Kec.Cibeunying Kaler</option>
                    <option value="bantul">Kec.Bantul</option>
                    <option value="sidoarjo">Kec.Sidoarjo</option>

                </select>
            </div>

            <!-- Detail Alamat -->
            <div>
                <label class="block text-sm font-medium text-gray-800 mb-1">
                    Detail Alamat <span class="text-red-500">*</span>
                </label>
                <textarea name="detail" rows="4" placeholder="Detail Alamat"
                    class="w-full mt-1 border border-orange-500 rounded-md px-3 py-2 outline-none focus:ring-1 focus:ring-orange-500"></textarea>
            </div>

            <!-- Tombol -->
            <div class="flex justify-end space-x-4 pt-4">
                <button type="button"
                    class="px-6 py-2 border border-orange-500 text-orange-500 rounded-md hover:bg-orange-50">
                    Batal
                </button>
                <button type="submit" class="px-6 py-2 bg-orange-500 text-white rounded-md hover:bg-orange-600">
                    Simpan
                </button>
            </div>
        </form>
    </div>


    @include('layouts.footer')
@endsection
