@extends('admin.sidebar.index')
@section('sidebaradmin')
    <div class="p-4 sm:ml-64">
        <!-- Header -->
        <header class="w-full flex items-center justify-between px-6 py-3 border-bshadow-sm">
            <h1 class="text-xl font-semibold mt-4">Event</h1>
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


        <div class="pl-3 mt-5">

            {{-- header status & tombol --}}
            <div class="flex justify-end items-center space-x-2 mb-4">
                <span class="font-medium">Status</span>
                <span class="bg-green-500 text-white px-3 py-1 rounded text-sm">Open</span>
                <button class="bg-red-500 text-white px-3 py-1 rounded text-sm">Hapus</button>
            </div>

            <div class="flex justify-end items-center space-x-2 mb-6">
                <button class="bg-blue-500 text-white px-4 py-1 rounded text-sm">Edit Event</button>
                <button class="bg-blue-500 text-white px-4 py-1 rounded text-sm">Lihat Partisipan</button>
            </div>

            {{-- tanggal --}}
            <p class="mb-2">25 Juni 2024</p>

            {{-- gambar --}}
            <img src="{{ asset('images/rang nulis.jpg') }}" alt="event image" class="rounded-lg mb-6">

            {{-- deskripsi --}}
            <h2 class="font-semibold text-lg mb-2">Event</h2>
            <p class="text-justify">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus totam perspiciatis id nostrum
                praesentium enim, accusamus nisi adipisci recusandae similique consequuntur vitae atque, dolore laudantium
                commodi, ea excepturi possimus. Odit!
            </p>

            {{-- detail acara --}}
            <h3 class="font-semibold text-orange-600 mt-6 mb-2">Detail Acara</h3>
            <div class="space-y-2">
                <div class="flex items-center space-x-2">
                    <span class="text-xl">🕒</span>
                    <p>Waktu: 20 Agustus 2023 (09.00 – 15.00) WIB</p>
                </div>
                <div class="flex items-center space-x-2">
                    <span class="text-xl">📍</span>
                    <p>Lokasi: Kantor 1 Seven INC, Bantul, Yogyakarta</p>
                </div>
            </div>

            <!-- Daftar kegiatan -->
            <h3 class="text-base font-semibold mb-2 mt-8">Daftar kegiatan:</h3>
            <div class="border-2 border-orange-500 rounded-xl overflow-hidden">
                <table class="w-full border-orange-500 text-sm">
                    <thead>
                        <tr>
                            <th class="border border-orange-500 px-4 py-2 w-[20%] text-center">Waktu</th>
                            <th class="border border-orange-500 px-4 py-2 text-center">Acara</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border border-orange-500 px-4 py-2 text-center">Lorem ipsum</td>
                            <td class="border border-orange-500 px-4 py-2 text-center">Lorem ipsum</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-500 px-4 py-2 text-center">Lorem ipsum</td>
                            <td class="border border-orange-500 px-4 py-2 text-center">Lorem ipsum</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-500 px-4 py-2 text-center">Lorem ipsum</td>
                            <td class="border border-orange-500 px-4 py-2 text-center">Lorem ipsum</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-500 px-4 py-2 text-center">Lorem ipsum</td>
                            <td class="border border-orange-500 px-4 py-2 text-center">Lorem ipsum</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-500 px-4 py-2 text-center">Lorem ipsum</td>
                            <td class="border border-orange-500 px-4 py-2 text-center">Lorem ipsum</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-500 px-4 py-2 text-center">Lorem ipsum</td>
                            <td class="border border-orange-500 px-4 py-2 text-center">Lorem ipsum</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-500 px-4 py-2 text-center">Lorem ipsum</td>
                            <td class="border border-orange-500 px-4 py-2 text-center">Lorem ipsum</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-500 px-4 py-2 text-center">Lorem ipsum</td>
                            <td class="border border-orange-500 px-4 py-2 text-center">Lorem ipsum</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- tombol daftar --}}
            <div class="flex justify-center mt-6">
                <button class="bg-orange-500 text-white px-8 py-2 rounded">Mendaftar</button>
            </div>
        </div>

    </div>
@endsection
