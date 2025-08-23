@extends('layouts.index-perusahaan')
@section('content')
    <div class="bg-white text-gray-900">

        <div class="max-w-3xl mx-auto p-6">

            <!-- Tanggal -->
            <div class="text-sm font-medium text-gray-800 mb-2">25 Juni 2024</div>

            <!-- Gambar -->
            <img src="{{ asset('images/megangbuku.jpg') }}" alt="Event" class="w-full rounded-xl mb-4">

            <!-- Judul & Deskripsi -->
            <h2 class="text-lg font-bold mb-2">Event</h2>
            <p class="text-sm text-gray-700 mb-1">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
            </p>
            <p class="text-sm text-gray-700 mb-4">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
            </p>

            <hr class="my-4">

            <!-- Detail acara -->
            <h3 class="text-base font-semibold text-orange-600 mb-3">Detail acara</h3>
            <div class="flex flex-wrap gap-8 mb-6">
                <!-- Waktu -->
                <div class="flex items-start gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-700 flex-shrink-0" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p class="text-sm">
                        <span class="font-semibold">Waktu:</span><br>
                        20 Agustus 2023 (09.00 – 15.00) WIB
                    </p>
                </div>
                <!-- Lokasi -->
                <div class="flex items-start gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-700 flex-shrink-0" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 11c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 22s8-4.5 8-11a8 8 0 10-16 0c0 6.5 8 11 8 11z" />
                    </svg>
                    <p class="text-sm">
                        <span class="font-semibold">Lokasi:</span><br>
                        Kantor I Seven INC, Bantul, Yogyakarta
                    </p>
                </div>
            </div>

            <!-- Daftar kegiatan -->
            <h3 class="text-base font-semibold mb-2">Daftar kegiatan:</h3>
            <div class="border-2 border-orange-500 rounded-xl overflow-hidden">
                <table class="w-full border-orange-500  text-sm">
                    <thead>
                        <tr class="text-left">
                            <th class="border border-orange-500 px-4 py-2 w-[20%]">Waktu</th>
                            <th class="border border-orange-500 px-4 py-2">Acara</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border border-orange-500 px-4 py-2">Lorem Ipsum</td>
                            <td class="border border-orange-500 px-4 py-2">Lorem Ipsum</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-500 px-4 py-2">Lorem Ipsum</td>
                            <td class="border border-orange-500 px-4 py-2">Lorem Ipsum</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-500 px-4 py-2">Lorem Ipsum</td>
                            <td class="border border-orange-500 px-4 py-2">Lorem Ipsum</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-500 px-4 py-2">Lorem Ipsum</td>
                            <td class="border border-orange-500 px-4 py-2">Lorem Ipsum</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-500 px-4 py-2">Lorem Ipsum</td>
                            <td class="border border-orange-500 px-4 py-2">Lorem Ipsum</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-500 px-4 py-2">Lorem Ipsum</td>
                            <td class="border border-orange-500 px-4 py-2">Lorem Ipsum</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-500 px-4 py-2">Lorem Ipsum</td>
                            <td class="border border-orange-500 px-4 py-2">Lorem Ipsum</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-500 px-4 py-2">Lorem Ipsum</td>
                            <td class="border border-orange-500 px-4 py-2">Lorem Ipsum</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Tombol daftar -->
            <div class="text-center">
                <!-- Tombol untuk buka eventmodal -->
                <button onclick="openEventmodal()"
                    class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-2 rounded-full text-sm font-medium shadow mt-5">
                    Ikuti Event
                </button>
            </div>

        </div>
        @include('perusahaan.alert-ikutevent')
    </div>
    @include('layouts.footer')
@endsection
