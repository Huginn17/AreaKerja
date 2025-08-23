@extends('layouts.index-perusahaan')
@section('content')
    <div class="bg-white flex justify-center py-10">

        <div class="w-[900px] p-6">
            <!-- Header -->
            <div class="flex items-center gap-4 mb-6">
                <img src="{{ asset('images/seven.png') }}" alt="Logo" class="w-20">
                <div>
                    <h1 class="font-bold text-lg">Seven_Inc</h1>
                    <p class="text-sm text-gray-600">Jasa TI dan Konsultan TI</p>
                    <p class="text-sm text-gray-600">Jakarta Timur, DKI Jakarta, Indonesia</p>
                </div>
            </div>

            <!-- Form -->
            <div class="border border-gray-800 rounded-md p-6">
                <h2 class="font-semibold text-lg mb-4">Tambah Lowongan</h2>
                <form class="space-y-5">

                    <!-- Judul & Alamat -->
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium">Judul <span class="text-red-500">*</span></label>
                            <input type="text"
                                class="w-full border rounded-md px-3 py-2 mt-1 outline-none focus:ring-1 focus:ring-orange-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Alamat <span class="text-red-500">*</span></label>
                            <select
                                class="w-full border rounded-md px-3 py-2 mt-1 outline-none focus:ring-1 focus:ring-orange-500">
                                <option>Pilih Alamat</option>
                            </select>
                        </div>
                    </div>

                    <!-- Jenis Lowongan & Gaji -->
                    <div class="grid grid-cols-[200px_1fr] gap-4">
                        <!-- Jenis Lowongan -->
                        <div class="flex flex-col">
                            <label class="text-sm font-medium">
                                Jenis Lowongan <span class="text-red-500">*</span>
                            </label>
                            <select
                                class="border rounded-md px-3 py-2 mt-1 outline-none focus:ring-1 focus:ring-orange-500 w-50">
                                <option>Full Time</option>
                            </select>
                        </div>

                        <!-- Gaji -->
                        <div class="flex flex-col">
                            <label class="text-sm font-medium">
                                Gaji <span class="text-red-500">*</span>
                            </label>
                            <div class="flex items-center gap-2 mt-1">
                                <input type="number"
                                    class="w-44 border rounded-md px-3 py-2 outline-none focus:ring-1 focus:ring-orange-500" />
                                <span>-</span>
                                <input type="number"
                                    class="w-44 border rounded-md px-3 py-2 outline-none focus:ring-1 focus:ring-orange-500" />
                                <select class="border rounded-md px-3 py-2 outline-none focus:ring-1 focus:ring-orange-500 w-full">
                                    <option>Bulan</option>
                                </select>
                            </div>
                        </div>
                    </div>




                    <!-- Deskripsi -->
                    <div>
                        <label class="block text-sm font-medium">Deskripsi <span class="text-red-500">*</span></label>
                        <textarea rows="3"
                            class="w-full border rounded-md px-3 py-2 mt-1 outline-none focus:ring-1 focus:ring-orange-500">Deskripsi Pekerjaan</textarea>
                    </div>

                    <!-- Syarat Pekerjaan -->
                    <div>
                        <h4 class="font-medium mb-2">Syarat Pekerjaan</h4>
                        <!-- Pendidikan -->
                        <div class=" grid-cols-3 gap-4 flex items-center mb-3">
                            <label class="text-sm font-medium mt-2">Pendidikan <span class="text-red-500">*</span></label>
                            <div class="col-span-2">
                                <div class="grid grid-cols-4 gap-x-4 gap-y-2 ml-12">
                                    <label class="flex items-center gap-2 text-sm"><input class="border border-orange-500"
                                            type="radio" name="pendidikan">
                                        SD</label>
                                    <label class="flex items-center gap-2 text-sm"><input class="border border-orange-500"
                                            type="radio" name="pendidikan">
                                        SMP</label>
                                    <label class="flex items-center gap-2 text-sm"><input class="border border-orange-500"
                                            type="radio" name="pendidikan">
                                        SMA</label>
                                    <label class="flex items-center gap-2 text-sm"><input class="border border-orange-500"
                                            type="radio" name="pendidikan">
                                        SMK</label>
                                    <label class="flex items-center gap-2 text-sm"><input class="border border-orange-500"
                                            type="radio" name="pendidikan">
                                        S1</label>
                                    <label class="flex items-center gap-2 text-sm"><input class="border border-orange-500"
                                            type="radio" name="pendidikan">
                                        S2</label>
                                    <label class="flex items-center gap-2 text-sm"><input class="border border-orange-500"
                                            type="radio" name="pendidikan">
                                        S3</label>
                                </div>
                            </div>
                        </div>

                        <!-- Jurusan -->
                        <div class="flex grid-cols-3 gap-4 items-center mb-3">
                            <label class="text-sm font-medium">Jurusan</label>
                            <input type="text"
                                class="col-span-2 border rounded-md px-3 py-2 ml-20 mt-2 outline-none focus:ring-1 focus:ring-orange-500">
                        </div>

                        <!-- Gender -->
                        <div class="flex grid-cols-3 gap-4 items-center mb-3">
                            <label class="text-sm font-medium">Gender <span class="text-red-500">*</span></label>
                            <div class="col-span-2 flex gap-6 ml-20 mt-2">
                                <label class="flex items-center gap-2 text-sm"><input class="border border-orange-500"
                                        type="radio" name="gender">
                                    Laki-Laki</label>
                                <label class="flex items-center gap-2 text-sm"><input class="border border-orange-500"
                                        type="radio" name="gender">
                                    Perempuan</label>
                            </div>
                        </div>

                        <!-- Umur -->
                        <div class="flex grid-cols-3 gap-4 items-center mb-3">
                            <label class="text-sm font-medium">Umur <span class="text-red-500">*</span></label>
                            <div class="col-span-2 flex items-center gap-2 ml-24 mt-2">
                                <input type="number"
                                    class="w-16 border rounded-md px-2 py-1 outline-none focus:ring-1 focus:ring-orange-500">
                                <span>-</span>
                                <input type="number"
                                    class="w-16 border rounded-md px-2 py-1 outline-none focus:ring-1 focus:ring-orange-500">
                            </div>
                        </div>

                        <!-- Batas Waktu -->
                        <div class="flex grid-cols-3 gap-4 items-center">
                            <label class="text-sm font-medium">Batas Waktu <span class="text-red-500">*</span></label>
                            <input type="date"
                                class="col-span-2 w-48 border rounded-md px-3 py-2 ml-10 mt-2 outline-none focus:ring-1 focus:ring-orange-500">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('layouts.footer')
@endsection
