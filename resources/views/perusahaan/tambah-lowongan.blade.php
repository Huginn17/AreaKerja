@extends('layouts.index-perusahaan')
@section('content')
    <div class="bg-white flex justify-center py-10">

        <div class="w-[900px]">
            <!-- Header -->
            <div class="flex items-start gap-4 mb-6">
                   <h2 class="font-semibold text-lg">Seven_Inc</h2>
                    <p class="text-sm">Jasa TI dan Konsultan TI</p>
                <img src="{{ asset('images/seven.png') }}" alt="Logo" class="w-24">
                <div>
                     <p class="text-sm text-gray-600">Jakarta Timur, DKI Jakarta, Indonesia</p>
                </div>
            </div>


            <!-- Card -->
            <div class="border rounded-xl p-6 shadow-sm">
                <h3 class="font-semibold text-lg mb-4">Tambah Lowongan</h3>

                <!-- Form -->
                <form class="space-y-4">

                    
                    <!-- Judul & Alamat -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium mb-1">Judul <span class="text-red-500">*</span></label>
                            <input type="text"
                                class="w-full border rounded-md px-3 py-2 outline-none focus:ring-1 focus:ring-orange-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Alamat <span class="text-red-500">*</span></label>
                            <select
                                class="w-full border rounded-md px-3 py-2 outline-none focus:ring-1 focus:ring-orange-500">
                                <option></option>
                            </select>
                        </div>
                    </div>

                    <!-- Jenis Lowongan & Gaji -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium mb-1">Jenis Lowongan <span
                                    class="text-red-500">*</span></label>
                            <select
                                class="w-full border rounded-md px-3 py-2 outline-none focus:ring-1 focus:ring-orange-500">
                                <option>Full Time</option>
                                <option>Part Time</option>
                                <option>Freelance</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Gaji <span class="text-red-500">*</span></label>
                            <div class="flex items-center gap-2">
                                <input type="number"
                                    class="w-28 border rounded-md px-3 py-2 outline-none focus:ring-1 focus:ring-orange-500">
                                <span>-</span>
                                <input type="number"
                                    class="w-28 border rounded-md px-3 py-2 outline-none focus:ring-1 focus:ring-orange-500">
                                <select class="border rounded-md px-3 py-2 outline-none focus:ring-1 focus:ring-orange-500">
                                    <option>Bulan</option>
                                    <option>Minggu</option>
                                    <option>Hari</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Deskripsi -->
                    <div>
                        <label class="block text-sm font-medium mb-1">Deskripsi</label>
                        <textarea rows="3" class="w-full border rounded-md px-3 py-2 outline-none focus:ring-1 focus:ring-orange-500">Deskripsi Pekerjaan</textarea>
                    </div>
                    <!-- Syarat Pekerjaan -->
                    <div>
                        <h4 class="font-medium mb-2">Syarat Pekerjaan</h4>

                        <!-- Pendidikan -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium mb-1">
                                Pendidikan <span class="text-red-500">*</span>
                            </label>
                            <div class="grid grid-cols-4 gap-x-6 gap-y-2">
                                <label class="flex items-center gap-2 text-sm">
                                    <input type="radio" name="pendidikan" class="text-orange-500"> SD
                                </label>
                                <label class="flex items-center gap-2 text-sm">
                                    <input type="radio" name="pendidikan" class="text-orange-500"> SMP
                                </label>
                                <label class="flex items-center gap-2 text-sm">
                                    <input type="radio" name="pendidikan" class="text-orange-500"> SMA
                                </label>
                                <label class="flex items-center gap-2 text-sm">
                                    <input type="radio" name="pendidikan" class="text-orange-500"> SMK
                                </label>
                                <label class="flex items-center gap-2 text-sm">
                                    <input type="radio" name="pendidikan" class="text-orange-500"> S1
                                </label>
                                <label class="flex items-center gap-2 text-sm">
                                    <input type="radio" name="pendidikan" class="text-orange-500"> S2
                                </label>
                                <label class="flex items-center gap-2 text-sm">
                                    <input type="radio" name="pendidikan" class="text-orange-500"> S3
                                </label>
                            </div>
                        </div>

                        <!-- Jurusan -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium mb-1">Jurusan</label>
                            <input type="text"
                                class="w-full border rounded-md px-3 py-2 outline-none focus:ring-1 focus:ring-orange-500">
                        </div>

                        <!-- Gender -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium mb-1">
                                Gender <span class="text-red-500">*</span>
                            </label>
                            <div class="flex gap-6">
                                <label class="flex items-center gap-2 text-sm">
                                    <input type="radio" name="gender" class="text-orange-500"> Laki-Laki
                                </label>
                                <label class="flex items-center gap-2 text-sm">
                                    <input type="radio" name="gender" class="text-orange-500"> Perempuan
                                </label>
                            </div>
                        </div>

                        <!-- Umur -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium mb-1">
                                Umur <span class="text-red-500">*</span>
                            </label>
                            <div class="flex items-center gap-2">
                                <input type="number"
                                    class="w-16 border rounded-md px-2 py-1 outline-none focus:ring-1 focus:ring-orange-500">
                                <span>-</span>
                                <input type="number"
                                    class="w-16 border rounded-md px-2 py-1 outline-none focus:ring-1 focus:ring-orange-500">
                            </div>
                        </div>

                        <!-- Batas Waktu -->
                        <div>
                            <label class="block text-sm font-medium mb-1">
                                Batas Waktu <span class="text-red-500">*</span>
                            </label>
                            <input type="date"
                                class="w-48 border rounded-md px-3 py-2 outline-none focus:ring-1 focus:ring-orange-500">
                        </div>
                    </div>



                    @include('layouts.footer')
                @endsection
