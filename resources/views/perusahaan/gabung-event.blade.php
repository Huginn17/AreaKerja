@extends('layouts.index-perusahaan')
@section('content')
    <div class="bg-white text-gray-900">

        <div class="max-w-3xl mx-auto p-6">

            <!-- Tanggal -->
            <div class="text-sm font-medium text-gray-800 mb-2">25 Juni 2024</div>

            <!-- Gambar -->
            <img src="{{ asset('images/megangbuku.jpg') }}" alt="Event" class="w-full rounded-xl mb-4">

            <!-- Judul & Deskripsi -->
            <h2 class="text-lg font-bold mb-2">Seminar Kerja</h2>
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
               <div class="flex flex-col space-y-2">
  <div class="flex items-start">
    <span class="mr-3 mt-[2px]"><svg width="25" height="26" viewBox="0 0 25 26" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M12.2831 25.2713C5.49916 25.2713 0 19.7722 0 12.9882C0 6.20423 5.49916 0.705078 12.2831 0.705078C19.0671 0.705078 24.5662 6.20423 24.5662 12.9882C24.5662 19.7722 19.0671 25.2713 12.2831 25.2713ZM12.2831 22.8147C14.8893 22.8147 17.3887 21.7794 19.2315 19.9366C21.0743 18.0938 22.1096 15.5944 22.1096 12.9882C22.1096 10.3821 21.0743 7.88264 19.2315 6.03982C17.3887 4.19699 14.8893 3.1617 12.2831 3.1617C9.67698 3.1617 7.17757 4.19699 5.33474 6.03982C3.49191 7.88264 2.45662 10.3821 2.45662 12.9882C2.45662 15.5944 3.49191 18.0938 5.33474 19.9366C7.17757 21.7794 9.67698 22.8147 12.2831 22.8147ZM13.5114 12.9882H18.4247V15.4448H11.0548V6.84664H13.5114V12.9882Z" fill="black"/>
</svg>
</span> <!-- atau pakai icon -->
    <div class="flex">
      <p class="font-semibold mr-2">Waktu:</p>
      <p class="font-semibold">20 Agustus 2023 (09.00 – 15.00) WIB</p>
    </div>
  </div>


<div class="flex items-start">
  <span class="mr-3 mt-[2px]">
    <!-- SVG lokasi -->
    <svg width="20" height="25" viewBox="0 0 20 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M9.82731 14.8558C12.537 14.8558 14.7406 12.6522 14.7406 9.94255C14.7406 7.23289 12.537 5.0293 9.82731 5.0293C7.11765 5.0293 4.91406 7.23289 4.91406 9.94255C4.91406 12.6522 7.11765 14.8558 9.82731 14.8558ZM9.82731 7.48592C11.1821 7.48592 12.2839 8.58772 12.2839 9.94255C12.2839 11.2974 11.1821 12.3992 9.82731 12.3992C8.47248 12.3992 7.37069 11.2974 7.37069 9.94255C7.37069 8.58772 8.47248 7.48592 9.82731 7.48592Z" fill="black"/>
<path d="M9.11419 24.453C9.32208 24.6015 9.57115 24.6813 9.82661 24.6813C10.0821 24.6813 10.3311 24.6015 10.539 24.453C10.9124 24.1889 19.6887 17.8521 19.6531 9.94174C19.6531 4.52365 15.2447 0.115234 9.82661 0.115234C4.40852 0.115234 0.000108138 4.52365 0.000108138 9.93559C-0.0355129 17.8521 8.74078 24.1889 9.11419 24.453ZM9.82661 2.57186C13.8911 2.57186 17.1965 5.87725 17.1965 9.94788C17.2223 15.3991 11.8066 20.294 9.82661 21.8994C7.8478 20.2927 2.43094 15.3967 2.45673 9.94174C2.45673 5.87725 5.76212 2.57186 9.82661 2.57186Z" fill="black"/>
</svg>

  </span>
  <div class="flex">
    <p class="font-semibold mr-2">Lokasi:</p>
    <p class="font-semibold">Kantor 1 Seven INC, Bantul, Yogyakarta</p>
  </div>
</div>

</div>
</div>
            <!-- Daftar kegiatan -->
            <h3 class="text-base font-semibold mb-2">Daftar kegiatan:</h3>
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
                            <td class="border border-orange-500 px-4 py-2 text-center">09.00-09.15</td>
                            <td class="border border-orange-500 px-4 py-2 text-center">Pembukaan</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-500 px-4 py-2 text-center">09.15-09.30</td>
                            <td class="border border-orange-500 px-4 py-2 text-center">Sambutan</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-500 px-4 py-2 text-center">09.30-11.00</td>
                            <td class="border border-orange-500 px-4 py-2 text-center">Materi 1</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-500 px-4 py-2 text-center">11.00-12.00</td>
                            <td class="border border-orange-500 px-4 py-2 text-center">Materi 2</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-500 px-4 py-2 text-center">12.00-13.30</td>
                            <td class="border border-orange-500 px-4 py-2 text-center">Istirahat Makan Siang</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-500 px-4 py-2 text-center">13.30-14.00</td>
                            <td class="border border-orange-500 px-4 py-2 text-center">Materi 3</td>
                        </tr>
                        <tr>
                            <td class="border border-orange-500 px-4 py-2 text-center">14.00-14.30</td>
                            <td class="border border-orange-500 px-4 py-2 text-center">Doorprize
                            <td>
                        </tr>
                        <tr>
                            <td class="border border-orange-500 px-4 py-2 text-center">14.30-15.00</td>
                            <td class="border border-orange-500 px-4 py-2 text-center">Penutupan</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Tombol daftar -->
            <div class="text-center">
                <!-- Tombol untuk buka eventmodal -->
                <button onclick="openEventmodal()"
                    class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-2 rounded-lg text-sm font-medium shadow mt-5">
                    Mendaftar
                </button>
            </div>

        </div>
        @include('perusahaan.alert-ikutevent')
    </div>
    @include('layouts.footer')
@endsection
