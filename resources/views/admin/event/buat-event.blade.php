@extends('admin.sidebar.index')
@section('sidebaradmin')
    <div class="p-4 sm:ml-64">
        <!-- Header -->
        <header class="w-full flex items-center justify-between px-6 py-3 border-bshadow-sm">
            <h1 class="text-xl font-semibold">Buat Post Baru</h1>
            <div class="flex items-center gap-3">
                <!-- Notifikasi -->
                <button class="relative">
                    <span class="absolute top-0 right-0 block w-2 h-2 bg-red-500 rounded-full"></span>
                    🔔
                </button>
                <!-- Profil -->
                <div class="flex items-center border-gray-800  border rounded-lg shadow px-3 scroll-py-5">
                    <img src="{{ asset('images/ohim.jpg') }}" alt="Logo" class="w-15 h-12 pr-2   rounded-full" />
                    <div class="text-sm">
                        <p class="font-semibold">Dj Ohim </p>
                        <p class="text-xs text-gray-500">ohim@gmail.com</p>
                    </div>
                </div>
            </div>
        </header>


        <div class="mx-auto p-6">

            <div class="mb-4">
                <input type="text" name="title" placeholder="Judul artikel..."
                    class="w-full border border-gray-300 rounded-lg px-3 py-2">
            </div>

            <div class="mb-3">
                <button type="button"
                    class="px-4 py-2 bg-gray-100 border rounded-lg shadow hover:bg-gray-200 text-sm font-medium">
                    Tambahkan Media
                </button>
            </div>

            <div class="">
                <input id="x" type="hidden" name="content">
                <trix-editor input="x" class="trix-content"></trix-editor>
            </div>




            <div class="w-[600px] space-y-6 mt-5">

                {{-- waktu acara --}}
                <div>
                    <label for="" class="block mb-1 font-medium">Waktu Acara</label>
                    <div class="flex items-center space-x-2">
                        <select name="" id="" class="px-3 py-2 rounded bg-gray-200 w-52">
                            <option value="">-- Tanggal --</option>
                        </select>
                        <input type="time" placeholder="00.00" class="px-3 py-2 rounded bg-gray-200">
                        <span>Sampai</span>
                        <input type="time" placeholder="00.00" class="px-3 py-2 rounded bg-gray-200">
                    </div>
                </div>

                <!-- Penutupan Pendaftaran -->
                <div>
                    <label class="block mb-1 font-medium">Penutupan Pendaftaran</label>
                    <select class="px-3 py-2 rounded bg-gray-200 text-gray-400 w-52">
                        <option>Pilih Tanggal</option>
                    </select>
                </div>

                <!-- Kuota -->
                <div>
                    <label class="block mb-1 font-medium">Kuota Partisipasi</label>
                    <input type="text" value="             000" class="px-3 py-2 rounded bg-gray-200 w-48">
                </div>

                {{-- lokasi --}}
                <div>
                    <label for="" class="block mb-1 font-medium">Lokasi</label>
                    <textarea name="" id="" cols="50" rows="4" placeholder="  Isikan Alamat Acara"
                        class=" w-fullpx-3 py-2 rounded bg-gray-200"></textarea>
                </div>

                {{-- daftar kegiatan --}}
                <div>
                    <label for="" class="block mb-1 font-medium">Daftar Kegiatan</label>
                    <div class="space-y-2">
                        <div class="space-x-2">
                            <input type="text" placeholder="00.00" class="px-3 py-2 rounded bg-gray-200 w-40">
                            <input type="text" name="" id="" placeholder="Isi Kegiatan"
                                class="flex-1 px-3 py-2 rounded bg-gray-200">
                        </div>
                        <div class="space-x-2">
                            <input type="text" placeholder="00.00" class="px-3 py-2 rounded bg-gray-200 w-40">
                            <input type="text" name="" id="" placeholder="Isi Kegiatan"
                                class="flex-1 px-3 py-2 rounded bg-gray-200">
                        </div>
                        <div class="space-x-2">
                            <input type="text" placeholder="00.00" class="px-3 py-2 rounded bg-gray-200 w-40">
                            <input type="text" name="" id="" placeholder="Isi Kegiatan"
                                class="flex-1 px-3 py-2 rounded bg-gray-200">
                        </div>
                        <div class="space-x-2">
                            <input type="text" placeholder="00.00" class="px-3 py-2 rounded bg-gray-200 w-40">
                            <input type="text" name="" id="" placeholder="Isi Kegiatan"
                                class="flex-1 px-3 py-2 rounded bg-gray-200">
                        </div>
                        <div class="space-x-2">
                            <input type="text" placeholder="00.00" class="px-3 py-2 rounded bg-gray-200 w-40">
                            <input type="text" name="" id="" placeholder="Isi Kegiatan"
                                class="flex-1 px-3 py-2 rounded bg-gray-200">
                        </div>
                    </div>
                </div>

                {{-- tombol --}}
                <div class="space-y-3">
                    <button class="bg-green-600 text-white px-5 py-2 rounded">Tambah Acara</button>
                    <button class="bg-green-600 text-white px-5 py-2 rounded block">Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection
