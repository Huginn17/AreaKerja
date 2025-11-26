@extends('layouts.index-perusahaan')
@section('content')
    <div class="bg-white min-h-screen p-10 mt-16">
        <!-- Judul -->
        <h2 class="text-xl font-semibold text-gray-800">Edit Alamat</h2>
        <hr class="border-t-2 border-orange-500 mt-1 mb-6" />

        <!-- Form -->
        <form action="{{ route('alamat.update.perusahaan', $data->id) }}" method="POST" class="ml-12 space-y-5 w-[1100px]">
            @csrf
            @method('PUT')

            <!-- Nama Alamat -->
            <div>
                <label class="block text-sm font-medium text-gray-800 mb-1">
                    Nama Alamat <span class="text-red-500">*</span>
                </label>
                <input type="text" name="label" placeholder="Nama Alamat" value="{{ $data->label }}"
                    class="w-full border border-orange-500 rounded-md px-3 py-2 outline-none focus:ring-1 focus:ring-orange-500">
            </div>

            <!-- Kode Pos -->
            <div>
                <label class="block text-sm font-medium text-gray-800 mb-1">
                    Kode Pos <span class="text-red-500">*</span>
                </label>
                <input type="text" name="kode_pos" placeholder="Kode Pos" value="{{ $data->kode_pos }}"
                    class="w-full border border-orange-500 rounded-md px-3 py-2 outline-none focus:ring-1 focus:ring-orange-500">
            </div>

            <!-- Desa -->
            <div>
                <label class="block text-sm font-medium text-gray-800 mb-1">
                    Desa <span class="text-red-500">*</span>
                </label>
                <input type="text" name="desa" placeholder="Desa" value="{{ $data->desa }}"
                    class="w-full border border-orange-500 rounded-md px-3 py-2 outline-none focus:ring-1 focus:ring-orange-500">
            </div>

            <!-- Provinsi -->
            <div>
                <label class="block text-sm font-medium text-gray-800 mb-1">Provinsi <span
                        class="text-red-500">*</span></label>
                <select id="provinsiSelect" name="provinsi_id"
                    class="w-full border border-orange-500 rounded-md px-3 py-2 outline-none focus:ring-1 focus:ring-orange-500">
                    <option value="">Pilih Provinsi</option>
                    @foreach ($provinsis as $prov)
                        <option value="{{ $prov->id }}" {{ $data->provinsi_id == $prov->id ? 'selected' : '' }}>
                            {{ $prov->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Kota -->
            <div>
                <label class="block text-sm font-medium text-gray-800 mb-1">Kota <span class="text-red-500">*</span></label>
                <select id="kotaSelect" name="kota_id"
                    class="w-full border border-orange-500 rounded-md px-3 py-2 outline-none focus:ring-1 focus:ring-orange-500">
                    <option value="">Pilih Kota</option>
                    @if ($data->kota)
                        <option value="{{ $data->kota_id }}" selected>{{ $data->kota->nama }}</option>
                    @endif
                </select>
            </div>

            <!-- Kecamatan -->
            <div>
                <label class="block text-sm font-medium text-gray-800 mb-1">Kecamatan <span
                        class="text-red-500">*</span></label>
                <select id="kecamatanSelect" name="kecamatan_id"
                    class="w-full border border-orange-500 rounded-md px-3 py-2 outline-none focus:ring-1 focus:ring-orange-500">
                    <option value="">Pilih Kecamatan</option>
                    @if ($data->kecamatan)
                        <option value="{{ $data->kecamatan_id }}" selected>{{ $data->kecamatan->nama }}</option>
                    @endif
                </select>
            </div>

            <!-- Detail Alamat -->
            <div>
                <label class="block text-sm font-medium text-gray-800 mb-1">
                    Detail Alamat <span class="text-red-500">*</span>
                </label>
                <textarea name="detail" rows="4" placeholder="Detail Alamat"
                    class="w-full border border-orange-500 rounded-md px-3 py-2 outline-none focus:ring-1 focus:ring-orange-500">{{ $data->detail }}</textarea>
            </div>

            <!-- Tombol -->
            <div class="flex justify-end space-x-4 pt-4">
                <a href="{{ route('alamat.perusahaan') }}"
                    class="px-6 py-2 border border-orange-500 text-orange-500 rounded-md hover:bg-orange-50">Batal</a>
                <button type="submit" class="px-6 py-2 bg-orange-500 text-white rounded-md hover:bg-orange-600">
                    Update
                </button>
            </div>
        </form>
    </div>

    @include('layouts.footer')

    {{-- Script AJAX Dinamis --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const provinsiSelect = document.getElementById('provinsiSelect');
            const kotaSelect = document.getElementById('kotaSelect');
            const kecamatanSelect = document.getElementById('kecamatanSelect');

            // Ganti provinsi → load kota
            provinsiSelect.addEventListener('change', function() {
                const provinsiId = this.value;
                kotaSelect.innerHTML = '<option>Memuat...</option>';
                kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';

                fetch(`/get-kota/${provinsiId}`)
                    .then(res => res.json())
                    .then(data => {
                        kotaSelect.innerHTML = '<option value="">Pilih Kota</option>';
                        const options = data.map(k => `<option value="${k.id}">${k.nama}</option>`);
                        kotaSelect.insertAdjacentHTML('beforeend', options.join(''));
                    });
            });

            // Ganti kota → load kecamatan
            kotaSelect.addEventListener('change', function() {
                const kotaId = this.value;
                kecamatanSelect.innerHTML = '<option>Memuat...</option>';

                fetch(`/get-kecamatan/${kotaId}`)
                    .then(res => res.json())
                    .then(data => {
                        kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
                        const options = data.map(k => `<option value="${k.id}">${k.nama}</option>`);
                        kecamatanSelect.insertAdjacentHTML('beforeend', options.join(''));
                    });
            });
        });
    </script>
@endsection
