@extends('layouts.index-perusahaan')
@section('content')
    <div class="max-w-6xl mx-auto p-10 bg-white">

        <!-- Header dengan garis bawah oranye -->
        <h2 class="text-lg font-semibold mb-4 border-b-2 border-orange-500 pb-1">Alamat</h2>

        <form class="space-y-6">
            <!-- Nama Alamat -->
            <div>
                <label class="block mb-1 text-sm font-semibold text-gray-900">
                    Nama Alamat <span class="text-red-600">*</span>
                </label>
                <input type="text" placeholder="Nama Alamat"
                    class="w-full border border-orange-500 rounded-md px-3 py-2 placeholder-gray-400 focus:outline-none" />
            </div>

            <!-- Provinsi -->
            <div>
                <label class="block mb-1 text-sm font-semibold text-gray-900">
                    Provinsi <span class="text-red-600">*</span>
                </label>
                <select
                    class="w-full border border-orange-500 rounded-md px-3 py-2 text-gray-700 placeholder-gray-400 focus:outline-none">
                    <option value="" disabled selected>Provinsi</option>
                    <option>Kosong</option>
                </select>
            </div>

            <!-- Kabupaten -->
            <div>
                <label class="block mb-1 text-sm font-semibold text-gray-900">
                    Kabupaten <span class="text-red-600">*</span>
                </label>
                <select
                    class="w-full border border-orange-500 rounded-md px-3 py-2 text-gray-700 placeholder-gray-400 focus:outline-none">
                    <option value="" disabled selected>Kabupaten</option>
                    <option>Kosong</option>
                </select>
            </div>

            <!-- Kecamatan -->
            <div>
                <label class="block mb-1 text-sm font-semibold text-gray-900">
                    Kecamatan <span class="text-red-600">*</span>
                </label>
                <select
                    class="w-full border border-orange-500 rounded-md px-3 py-2 text-gray-700 placeholder-gray-400 focus:outline-none">
                    <option value="" disabled selected>Kecamatan</option>
                    <option>Kosong</option>
                </select>
            </div>

            <!-- Detail Alamat -->
            <div>
                <label class="block mb-1 text-sm font-semibold text-gray-900">
                    Detail Alamat <span class="text-red-600">*</span>
                </label>
                <textarea rows="4"
                    placeholder="Detail Alamat"class="w-full border border-orange-500 rounded-md px-3 py-2 placeholder-gray-400 focus:outline-none"></textarea>
            </div>

            <!-- Tombol Batal & Simpan -->
            <div class="flex justify-end space-x-4">
                <button type="button"
                    class="px-7 py-1 border border-orange-500 text-sm text-orange-500 rounded-md hover:bg-orange-50">
                    Batal
                </button>
                <button type="submit" class="px-7 py-1 bg-orange-500 text-sm text-white rounded-md hover:bg-orange-600">
                    Simpan
                </button>
            </div>
        </form>
    </div>
    @include('layouts.footer')
@endsection
