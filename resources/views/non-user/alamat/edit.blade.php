@extends('layouts.index')
@section('content')
    <div class="flex justify-center py-8">
        <div class="w-full max-w-6xl bg-white p-6">

            <!-- Header Profil -->
            <h2 class="text-lg font-semibold mb-4">Profil Akun</h2>

            <div
                class="border border-orange-400 rounded-lg p-4 
                    flex flex-col md:flex-row md:items-center md:justify-between gap-6">

                <!-- Foto + Upload -->
                <div class="flex items-center gap-4 md:ml-10 ml-0">
                    <div class="relative">

                        @if (Auth::user()->pelamar->img_profile)
                            <img id="pp" class="w-24 h-24 object-cover rounded-full"
                                src="{{ asset('storage/' . Auth::user()->pelamar->img_profile) }}" alt="Profile">
                        @else
                            <img id="pp" class="w-24 h-24 object-cover rounded-full"
                                src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                                alt="Profile">
                        @endif

                        <button
                            class="absolute bottom-11 right-14 bg-orange-500 text-white rounded-full p-1 text-xs">✎</button>

                        <!-- Select Box -->
                        <div class="relative inline-block mt-4 w-full md:w-[95%]">
                            @php
                                $status = '';
                                if ($data->pelamar->kategori === 'pelamar') {
                                    $status = 'Pelamar Aktif';
                                } elseif (in_array($data->pelamar->kategori, ['calon kandidat', 'kandidat aktif'])) {
                                    $status = 'Belum Bekerja';
                                } elseif ($data->pelamar->kategori === 'kandidat nonaktif') {
                                    $status = 'Bekerja';
                                }
                            @endphp

                            <select id="statusSelect"
                                class="w-full border border-orange-500 text-orange-500 font-semibold rounded-md px-2 py-1 text-xs cursor-pointer bg-white">
                                <option value="Pelamar Aktif" {{ $status == 'Pelamar Aktif' ? 'selected' : '' }}>Pelamar
                                    Aktif</option>
                                <option value="Belum Bekerja" {{ $status == 'Belum Bekerja' ? 'selected' : '' }}>Belum
                                    Bekerja</option>
                                <option value="Bekerja" {{ $status == 'Bekerja' ? 'selected' : '' }}>Bekerja</option>
                            </select>

                            <input type="hidden" id="kategoriPelamar" value="{{ $data->pelamar->kategori }}">
                        </div>
                    </div>
                </div>

                <!-- Tombol Kanan -->
                <div class="flex justify-center md:justify-end w-full md:w-auto">
                    <a href="{{ route('cv.download', Auth::user()->pelamar->id) }}"
                        class="bg-orange-500 text-white text-sm font-semibold px-4 py-2 rounded hover:bg-orange-600">
                        Unduh CV
                    </a>
                </div>

            </div>

            <!-- Form Alamat -->
            <div class="mt-8">
                <h3 class="text-base font-semibold border-b border-orange-500 pb-2 mb-4">Alamat</h3>

                <form action="{{ route('alamat.update', $data->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-sm mb-1">Label Alamat</label>
                        <input type="text" name="label" value="{{ old('label', $data->label) }}"
                            class="w-full border border-gray-300 rounded-md px-3 py-2">
                    </div>

                    <div>
                        <label class="block text-sm mb-1">Alamat Lengkap</label>
                        <input type="text" name="desa" value="{{ old('desa', $data->desa) }}"
                            class="w-full border border-gray-300 rounded-md px-3 py-2">
                    </div>

                    <div>
                        <label class="block text-sm mb-1">Kecamatan</label>
                        <input type="text" name="kecamatan" value="{{ old('kecamatan', $data->kecamatan) }}"
                            class="w-full border border-gray-300 rounded-md px-3 py-2">
                    </div>

                    <div>
                        <label class="block text-sm mb-1">Kota</label>
                        <input type="text" name="kota" value="{{ old('kota', $data->kota) }}"
                            class="w-full border border-gray-300 rounded-md px-3 py-2">
                    </div>

                    <div>
                        <label class="block text-sm mb-1">Provinsi</label>
                        <input type="text" name="provinsi" value="{{ old('provinsi', $data->provinsi) }}"
                            class="w-full border border-gray-300 rounded-md px-3 py-2">
                    </div>

                    <div>
                        <label class="block text-sm mb-1">Detail Alamat</label>
                        <input type="text" name="detail" value="{{ old('detail', $data->detail) }}"
                            class="w-full border border-gray-300 rounded-md px-3 py-2">
                    </div>

                    <div>
                        <label class="block text-sm mb-1">Kode Pos</label>
                        <input type="text" name="kode_pos" value="{{ old('kode_pos', $data->kode_pos) }}"
                            class="w-full border border-gray-300 rounded-md px-3 py-2">
                    </div>

                    <div class="flex justify-center pt-4">
                        <button class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-md">Update</button>
                    </div>
                </form>
            </div>

        </div>
    </div>


    @include('layouts.footer')
@endsection
