@extends('layouts.index-perusahaan')
@section('content')
    <h2 class="text-lg font-medium mb-4 mt-7 ml-56">Konfirmasi Terima Lamaran</h2>
    <div class="max-w-4xl mx-auto p-6 mb-7 border rounded-lg shadow-sm">
        <!-- Judul -->

        <p class="mb-6">Silahkan input jadwal wawancara untuk calon kandidat</p>

        <!-- Form -->
        <form action="#" method="POST" class="space-y-5">
            <!-- Tanggal -->
            <div>
                <label class="block mb-1 font-medium">Tanggal <span class="text-red-500">*</span></label>
                <div class="flex items-center">
                    <input type="date"
                        class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
                </div>
            </div>

            <!-- Waktu -->
            <div>
                <label class="block mb-1 font-medium">Waktu <span class="text-red-500">*</span></label>
                <div class="flex gap-2">
                    <select class="w-20 border rounded-md px-2 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
                        <option>00</option>
                        <option>01</option>
                        <option>02</option>
                        <option>03</option>
                    </select>
                    <span class="flex items-center">:</span>
                    <select class="w-20 border rounded-md px-2 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
                        <option>00</option>
                        <option>15</option>
                        <option>30</option>
                        <option>45</option>
                    </select>
                </div>
            </div>

            <!-- Tempat -->
            <div>
                <label class="block mb-1 font-medium">Tempat <span class="text-red-500">*</span></label>
                <textarea rows="2"
                    class="w-full flex items-start h-24 border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">Jl. Mangga dua No. 27 RT/RW 001/003, Kecamatan Mangga, Kota Jakarta Timur, Provinsi DKI Jakarta, 13463</textarea>
            </div>

            <!-- Catatan -->
            <div>
                <label class="block mb-1 font-medium">Catatan <span class="text-red-500">*</span></label>
                <textarea rows="2"
                    class="w-full  flex items-start h-24 border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">Jl. Mangga dua No. 27 RT/RW 001/003, Kecamatan Mangga, Kota Jakarta Timur, Provinsi DKI Jakarta, 13463</textarea>
            </div>

            <!-- Tombol -->
            <div class="flex justify-center pt-3">
                <button type="submit"
                    class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-md font-medium">
                    Selanjutnya
                </button>
            </div>
        </form>
    </div>

    @include('layouts.footer')
@endsection
