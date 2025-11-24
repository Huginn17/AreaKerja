@extends('layouts.index-perusahaan')
@section('content')
    <div class="bg-white min-h-screen p-10 mt-16">
        <h2 class="text-xl font-semibold text-gray-800">Alamat Perusahaan</h2>
        <hr class="border-t-2 border-orange-500 mt-1 mb-6" />

        <form action="{{ route('alamat.store.perusahaan') }}" method="POST" class="ml-12 space-y-5 w-[1100px]">
            @csrf

            <!-- Nama Alamat -->
            <div>
                <label class="block text-sm font-medium text-gray-800 mb-1">Nama Alamat</label>
                <input type="text" name="label"
                    class="w-full border border-orange-500 rounded-md px-3 py-2 focus:ring-1 focus:ring-orange-500"
                    placeholder="Contoh: Kantor Pusat">
            </div>

            <!-- Kode Pos -->
            <div>
                <label class="block text-sm font-medium text-gray-800 mb-1">Kode Pos</label>
                <input type="text" name="kode_pos"
                    class="w-full border border-orange-500 rounded-md px-3 py-2 focus:ring-1 focus:ring-orange-500"
                    placeholder="Kode Pos">
            </div>

            <!-- Desa -->
            <div>
                <label class="block text-sm font-medium text-gray-800 mb-1">Desa</label>
                <input type="text" name="desa"
                    class="w-full border border-orange-500 rounded-md px-3 py-2 focus:ring-1 focus:ring-orange-500"
                    placeholder="Nama Desa">
            </div>

            <!-- Provinsi -->
            <div>
                <label class="block text-sm font-medium text-gray-800 mb-1">Provinsi</label>
                <select name="provinsi_id" id="provinsi"
                    class="w-full border border-orange-500 rounded-md px-3 py-2 focus:ring-1 focus:ring-orange-500">
                    <option value="">Pilih Provinsi</option>
                    @foreach ($provinsis as $provinsi)
                        <option value="{{ $provinsi->id }}">{{ $provinsi->nama }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Kota -->
            <div>
                <label class="block text-sm font-medium text-gray-800 mb-1">Kota</label>
                <select name="kota_id" id="kota"
                    class="w-full border border-orange-500 rounded-md px-3 py-2 focus:ring-1 focus:ring-orange-500">
                    <option value="">Pilih Kota</option>
                </select>
            </div>

            <!-- Kecamatan -->
            <div>
                <label class="block text-sm font-medium text-gray-800 mb-1">Kecamatan</label>
                <select name="kecamatan_id" id="kecamatan"
                    class="w-full border border-orange-500 rounded-md px-3 py-2 focus:ring-1 focus:ring-orange-500">
                    <option value="">Pilih Kecamatan</option>
                </select>
            </div>

            <!-- Detail -->
            <div>
                <label class="block text-sm font-medium text-gray-800 mb-1">Detail Alamat</label>
                <textarea name="detail" rows="4"
                    class="w-full border border-orange-500 rounded-md px-3 py-2 focus:ring-1 focus:ring-orange-500"
                    placeholder="Detail Alamat"></textarea>
            </div>

            <!-- Tombol -->
            <div class="flex justify-end gap-4">
                <a href="{{ route('alamat.perusahaan') }}"
                    class="px-6 py-2 border border-orange-500 text-orange-500 rounded-md hover:bg-orange-50">Batal</a>
                <button type="submit"
                    class="px-6 py-2 bg-orange-500 text-white rounded-md hover:bg-orange-600">Simpan</button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const provinsiSelect = document.getElementById('provinsi');
            const kotaSelect = document.getElementById('kota');
            const kecamatanSelect = document.getElementById('kecamatan');

            provinsiSelect.addEventListener('change', function() {
                const provinsiId = this.value;
                kotaSelect.innerHTML = '<option value="">Memuat...</option>';
                kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';

                console.time('loadKota'); // mulai ukur waktu
                fetch(`/get-kota/${provinsiId}`)
                    .then(res => res.json())
                    .then(data => {
                        console.timeEnd('loadKota'); // tampilkan waktu di console
                        kotaSelect.innerHTML = '<option value="">Pilih Kota</option>';
                        data.forEach(kota => {
                            kotaSelect.innerHTML +=
                                `<option value="${kota.id}">${kota.nama}</option>`;
                        });
                    });
            });


            kotaSelect.addEventListener('change', function() {
                const kotaId = this.value;
                kecamatanSelect.innerHTML = '<option value="">Memuat...</option>';

                fetch(`/get-kecamatan/${kotaId}`)
                    .then(res => res.json())
                    .then(data => {
                        kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
                        data.forEach(kec => {
                            kecamatanSelect.innerHTML +=
                                `<option value="${kec.id}">${kec.nama}</option>`;
                        });
                    });
            });
        });
    </script>

    @include('layouts.footer')
@endsection
