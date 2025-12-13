@extends('layouts.index-perusahaan')
@section('content')
    <div class="flex justify-center items-center mt-24 mb-10">
        <div class="w-full max-w-3xl bg-white p-8 rounded-lg shadow-md border mt-6">
            <!-- Judul -->
            <h2 class="text-xl font-semibold mb-6 text-center">Konfirmasi Terima Lamaran</h2>
            <p class="mb-6 text-center text-gray-600">Silahkan input jadwal wawancara untuk calon kandidat</p>

            <!-- Form -->
            <form action="{{ route('pelamar.konfirmasi.simpan', $data->id) }}" method="POST" class="space-y-6">
                @csrf

                <!-- Tanggal -->
                <div>
                    <label class="block mb-1 font-medium">Tanggal <span class="text-red-500">*</span></label>
                    <input type="date" name="tanggal" value="{{ old('tanggal', $jadwal->tanggal ?? '') }}"
                        class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
                    @error('tanggal')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Waktu -->
                <div>
                    <label class="block mb-1 font-medium">Waktu <span class="text-red-500">*</span></label>
                    <div class="flex gap-2">
                        <select name="jam"
                            class="w-20 border rounded-md px-2 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
                            @for ($i = 0; $i < 24; $i++)
                                <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}"
                                    {{ old('jam', isset($jadwal) ? substr($jadwal->waktu, 0, 2) : '') == str_pad($i, 2, '0', STR_PAD_LEFT) ? 'selected' : '' }}>
                                    {{ str_pad($i, 2, '0', STR_PAD_LEFT) }}
                                </option>
                            @endfor
                        </select>
                        <span class="flex items-center">:</span>
                        <select name="menit"
                            class="w-20 border rounded-md px-2 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">
                            @for ($i = 0; $i < 60; $i++)
                                <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}"
                                    {{ old('menit', isset($jadwal) ? substr($jadwal->waktu, 3, 2) : '') == str_pad($i, 2, '0', STR_PAD_LEFT) ? 'selected' : '' }}>
                                    {{ str_pad($i, 2, '0', STR_PAD_LEFT) }}
                                </option>
                            @endfor
                        </select>
                    </div>
                </div>

                <!-- Tempat -->
                <div>
                    <label class="block mb-1 font-medium">Tempat <span class="text-red-500">*</span></label>
                    <textarea rows="2" name="tempat"
                        class="w-full flex items-start h-24 border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">{{ old('tempat', $jadwal->tempat ?? '') }}</textarea>
                    @error('tempat')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div id="map" class="w-full h-64 rounded-lg border"></div>
                <input type="hidden" name="latitude" id="latitude">
                <input type="hidden" name="longitude" id="longitude">


                <!-- Catatan -->
                <div>
                    <label class="block mb-1 font-medium">Catatan</label>
                    <textarea rows="2" name="catatan"
                        class="w-full flex items-start h-24 border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500">{{ old('catatan', $jadwal->catatan ?? '') }}</textarea>
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
    </div>

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script>
        const map = L.map('map').setView([-6.200000, 106.816666], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap'
        }).addTo(map);

        let marker;

        map.on('click', function(e) {
            const {
                lat,
                lng
            } = e.latlng;

            document.getElementById('latitude').value = lat;
            document.getElementById('longitude').value = lng;

            if (marker) {
                marker.setLatLng(e.latlng);
            } else {
                marker = L.marker(e.latlng).addTo(map);
            }
        });
    </script>


    @include('layouts.footer')
@endsection
