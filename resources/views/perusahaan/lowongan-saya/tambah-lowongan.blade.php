@extends('layouts.index-perusahaan')
@section('content')
    <div class="bg-white flex justify-center py-10 mt-20">

        <div class="w-full max-w-[900px] p-4 sm:p-6">

            <!-- Header -->
            <div class="flex flex-col sm:flex-row sm:items-center gap-4 border p-4 rounded-md mb-6 shadow-md">

                @if (Auth::user()->role == 'perusahaan')
                    @if (Auth::user()->perusahaan->img_profile)
                        <img id="pu" class="w-20 h-20 object-cover rounded-full profile-img"
                            src="{{ asset('storage/' . Auth::user()->perusahaan->img_profile) }}" alt="Profile">
                    @else
                        <img id="pu" class="w-20 h-20 rounded-full"
                            src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                            alt="">
                    @endif
                @else
                    <img class="w-10 h-10 rounded-full"
                        src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                        alt="">
                @endif
                <div>
                    <h1 class="font-bold text-lg m-1">{{ Auth::user()->perusahaan->nama_perusahaan }}</h1>
                    <p class="text-sm text-gray-600 m-1">{{ Auth::user()->perusahaan->jenis_perusahaan }}</p>
                    <p class="text-sm text-gray-600 m-1">{{ Auth::user()->perusahaan->alamatUtama->kota->nama }},
                        {{ Auth::user()->perusahaan->alamatUtama->provinsi->nama }},
                        {{ Auth::user()->perusahaan->alamatUtama->kecamatan->nama }}</p>
                </div>
            </div>

            <!-- Form -->
            <div class="border shadow-md rounded-md p-6">
                <h2 class="font-semibold text-lg mb-4">Tambah Lowongan</h2>
                <form action="{{ route('lowongan.saya.store') }}" method="POST" class="space-y-5">
                    @csrf
                    <!-- Judul & Alamat -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium">Judul <span class="text-red-500">*</span></label>
                            <input type="text" name="nama"
                                class="w-full border rounded-md px-3 py-2 mt-1 outline-none focus:ring-1 focus:ring-orange-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Alamat <span class="text-red-500">*</span></label>
                            <input type="text" name="alamat"
                                class="w-full border rounded-md px-3 py-2 mt-1 outline-none focus:ring-1 focus:ring-orange-500">
                        </div>
                    </div>

                    <!-- Jenis Lowongan & Gaji -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        <!-- Jenis Lowongan -->
                        <div class="flex flex-col">
                            <label class="text-sm font-medium">
                                Jenis Lowongan <span class="text-red-500">*</span>
                            </label>
                            <select name="jenis"
                                class="border rounded-md px-3 py-2 mt-1 outline-none focus:ring-1 focus:ring-orange-500 w-50">
                                <option selected disabled value="">Pilih Jenis Lowongan</option>
                                <option value="fulltime">Full Time</option>
                                <option value="middletime">Middle Time</option>
                                <option value="parttime">Part Time</option>
                                <option value="freelance">Freelance</option>
                            </select>
                        </div>

                        <div class="flex flex-col">
                            <label class="text-sm font-medium">Kategori<span class="text-red-500"> *</span></label>
                            <select name="kategori"
                                class="border rounded-md px-3 py-2 mt-1 outline-none focus:ring-1 focus:ring-orange-500 w-50">
                                <option value=""> Pilih Kategori </option>
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->nama }}"
                                        {{ old('kategori', $lowongan->kategori ?? '') == $cat->nama ? 'selected' : '' }}>
                                        {{ $cat->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="text-sm font-medium mb-1">Label Gaji<span class="text-red-500"> *</span></label>
                            <input type="text" name="label_gaji"
                                class="w-full sm:w-40 border rounded-md px-3 py-2 outline-none focus:ring-1 focus:ring-orange-500" />
                        </div>


                        <div>
                            <label class="text-sm font-medium mb-1">Benefit<span class="text-red-500"> *</span></label>
                            <input type="text" name="benefit"
                                class="w-full sm:w-40 border rounded-md px-3 py-2 outline-none focus:ring-1 focus:ring-orange-500" />

                        </div>

                        <!-- Gaji -->
                        <div class="flex flex-col">
                            <label class="text-sm font-medium">
                                Gaji <span class="text-red-500"> *</span>
                            </label>
                            <div class="flex items-center gap-2 mt-1">
                                <input type="number" name="gaji_awal"
                                    class="w-full sm:w-40 border rounded-md px-3 py-2 outline-none focus:ring-1 focus:ring-orange-500" />
                                <span>-</span>
                                <input type="number" name="gaji_akhir"
                                    class="w-full sm:w-40 border rounded-md px-3 py-2 outline-none focus:ring-1 focus:ring-orange-500" />
                                {{-- <label class="block font-medium mb-1">Periode</label>
                                <select name="batas_lamaran"
                                    class="border rounded-md px-3 py-2 outline-none focus:ring-1 focus:ring-orange-500 w-full">
                                    <option>Bulan</option>
                                </select> --}}
                            </div>
                        </div>
                    </div>




                    <!-- Deskripsi -->
                    <div>
                        <label class="block text-sm font-medium">Deskripsi <span class="text-red-500"> *</span></label>
                        <textarea rows="3" name="deskripsi"
                            class="w-full border rounded-md px-3 py-2 mt-1 outline-none focus:ring-1 focus:ring-orange-500"></textarea>
                    </div>
                    <!-- Tanggung Jawab -->
                    <div>
                        <label class="block text-sm font-medium">Tanggung Jawab <span class="text-red-500"> *</span></label>
                        <textarea rows="3" name="tanggung_jawab"
                            class="w-full border rounded-md px-3 py-2 mt-1 outline-none focus:ring-1 focus:ring-orange-500"></textarea>
                    </div>

                    <!-- Syarat Pekerjaan -->
                    <div>
                        <h4 class="font-medium mb-2">Syarat Pekerjaan</h4>
                        <!-- Pendidikan -->
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 items-start mb-3">

                            <label class="text-sm font-medium mt-1 break-words">
                                Pendidikan <span class="text-red-500"> *</span>
                            </label>

                            <div class="sm:col-span-2">
                                <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-4 gap-2 mt-2">

                                    @foreach (['SD', 'SMP', 'SMA', 'SMK', 'S1', 'S2', 'S3'] as $pend)
                                        <label class="flex items-center gap-2 text-sm break-words whitespace-normal">
                                            <input class="border border-orange-500" type="radio"
                                                value="{{ $pend }}" name="syarat_pekerjaan">
                                            <span class="break-words">{{ $pend }}</span>
                                        </label>
                                    @endforeach

                                </div>
                            </div>

                        </div>

                        <!-- Batas Waktu -->
                        <div class="mt-4">
                            <label class="text-sm font-medium">Batas Waktu <span class="text-red-500"> *</span></label>
                            <input type="date" name="batas_lamaran"
                                class="w-full sm:w-48 border rounded-md px-3 py-2 mt-2 focus:ring-1 focus:ring-orange-500">
                        </div>

                    </div>
                    <div class="flex justify-center space-x-4 pt-6">
                        <a href="{{ route('lowongan.saya.perusahaan') }}"
                            class="px-6 py-2 border-2 border-orange-500 rounded-md text-orange-500 hover:bg-orange-50">
                            Batal
                        </a>
                        <button type="submit" class="px-6 py-2 bg-orange-500 text-white rounded-md hover:bg-orange-600">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('layouts.footer')
@endsection
