@extends('layouts.index-perusahaan')
@section('content')
<div class="bg-white min-h-screen p-10">
  <!-- Judul -->
  <h2 class="text-xl font-semibold text-gray-800">Alamat</h2>
  <hr class="border-t-2 border-orange-500 mt-1 mb-6" />

  <!-- Form -->
  <form class="ml-12 space-y-5 w-[1100px]">
    <!-- Nama Alamat -->
    <div>
      <label class="block text-sm font-medium text-gray-800 mb-1">
        Nama Alamat <span class="text-red-500">*</span>
      </label>
      <input type="text" placeholder="Nama Alamat"
        class="w-full mt-1 border border-orange-500 rounded-md px-3 py-2 outline-none focus:ring-1 focus:ring-orange-500" />
    </div>

    <!-- Provinsi -->
    <div>
      <label class="block text-sm font-medium text-gray-800 mb-1">
        Provinsi <span class="text-red-500">*</span>
      </label>
      <select
        class="w-full mt-1 border border-orange-500 rounded-md px-3 py-2 outline-none focus:ring-1 focus:ring-orange-500">
        <option>Provinsi</option>
      </select>
    </div>

    <!-- Kabupaten -->
    <div>
      <label class="block text-sm font-medium text-gray-800 mb-1">
        Kabupaten <span class="text-red-500">*</span>
      </label>
      <select
        class="w-full mt-1 border border-orange-500 rounded-md px-3 py-2 outline-none focus:ring-1 focus:ring-orange-500">
        <option>Kabupaten</option>
      </select>
    </div>

    <!-- Kecamatan -->
    <div>
      <label class="block text-sm font-medium text-gray-800 mb-1">
        Kecamatan <span class="text-red-500">*</span>
      </label>
      <select
        class="w-full mt-1 border border-orange-500 rounded-md px-3 py-2 outline-none focus:ring-1 focus:ring-orange-500">
        <option>Kecamatan</option>
      </select>
    </div>

    <!-- Detail Alamat -->
    <div>
      <label class="block text-sm font-medium text-gray-800 mb-1">
        Detail Alamat <span class="text-red-500">*</span>
      </label>
      <textarea rows="4" placeholder="Detail Alamat"
        class="w-full mt-1 border border-orange-500 rounded-md px-3 py-2 outline-none focus:ring-1 focus:ring-orange-500"></textarea>
    </div>

    <!-- Tombol -->
    <div class="flex justify-end space-x-4 pt-4">
      <button type="button"
        class="px-6 py-2 border border-orange-500 text-orange-500 rounded-md hover:bg-orange-50">
        Batal
      </button>
      <button type="submit"
        class="px-6 py-2 bg-orange-500 text-white rounded-md hover:bg-orange-600">
        Simpan
      </button>
    </div>
  </form>
</div>


@include('layouts.footer')
@endsection