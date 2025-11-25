@extends('layouts.index')
@section('content')
    <div class=" flex justify-center py-8">
        <div class="w-full max-w-6xl bg-white  p-6">

            <!-- Header Profil -->
            <h2 class="text-lg font-semibold mb-4">Profil Akun</h2>
            <div
                class="border border-orange-400 rounded-lg p-4 flex flex-col md:flex-row md:items-center md:justify-between">
                <!-- Foto + Upload -->
                <div class="flex items-center space-x-4 ml-[40px]">
                    <div class="relative">
                        @if (Auth::user()->pelamar->img_profile)
                            <img id="pp" class="w-24 h-24 object-cover rounded-full"
                                src="{{ asset('storage/' . Auth::user()->pelamar->img_profile) }}" alt="Profile">
                        @else
                            <img id="pp" class="w-24 h-24 object-cover rounded-full"
                                src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                                alt="Profile">
                        @endif <button
                            class="absolute bottom-11 right-14 bg-orange-500 text-white rounded-full p-1 text-xs">
                            ✎
                        </button>
                        <!-- Select Box -->
                        <div class="relative inline-block mt-4 w-[95%]">
                            @php
                                $status = '';

                                if ($pelamar->kategori === 'pelamar') {
                                    $status = 'Pelamar Aktif';
                                } elseif (in_array($pelamar->kategori, ['calon kandidat', 'kandidat aktif'])) {
                                    $status = 'Belum Bekerja';
                                } elseif ($pelamar->kategori === 'kandidat nonaktif') {
                                    $status = 'Bekerja';
                                }
                            @endphp

                            <select id="statusSelect"
                                class="w-full border border-orange-500 text-orange-500 font-semibold rounded-md px-2 py-1 text-xs cursor-pointer appearance-none bg-white">

                                <option value="Pelamar Aktif" {{ $status == 'Pelamar Aktif' ? 'selected' : '' }}>
                                    Pelamar Aktif
                                </option>

                                <option value="Belum Bekerja" {{ $status == 'Belum Bekerja' ? 'selected' : '' }}>
                                    Belum Bekerja
                                </option>

                                <option value="Bekerja" {{ $status == 'Bekerja' ? 'selected' : '' }}>
                                    Bekerja
                                </option>

                            </select>

                            <input type="hidden" id="kategoriPelamar" value="{{ $pelamar->kategori }}">

                        </div>
                    </div>

                </div>

                <!-- Tombol kanan -->
                <div class="flex items-center gap-2">
                    <a href="{{ route('cv.download', Auth::user()->pelamar->id) }}"
                        class="bg-orange-500 mr-[780px] text-white text-sm font-semibold px-4 py-2 rounded hover:bg-orange-600">
                        Unduh CV
                    </a>
                </div>
            </div>

            <!-- Form Alamat -->
            <div class="mt-8">
                <h3 class="text-base font-semibold hover:gray-100 border-b border-orange-500 pb-2 mb-4">Alamat</h3>

                <form action="{{ route('alamat.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm mb-1">Label Alamat</label>
                        <input type="text" name="label" class="w-full border border-gray-300 rounded-md px-3 py-2"
                            placeholder="Label Alamat">
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Alamat Lengkap</label>
                        <input type="text" name="desa" class="w-full border border-gray-300 rounded-md px-3 py-2"
                            placeholder="Alamat Lengkap">
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Kecamatan</label>
                        <input type="text" name="kecamatan" class="w-full border border-gray-300 rounded-md px-3 py-2"
                            placeholder="Kecamatan">
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Kota</label>
                        <input type="text" name="kota" class="w-full border border-gray-300 rounded-md px-3 py-2"
                            placeholder="Kota">
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Provinsi</label>
                        <input type="text" name="provinsi" class="w-full border border-gray-300 rounded-md px-3 py-2"
                            placeholder="Provinsi">
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Detail Alamat</label>
                        <input type="text" name="detail" class="w-full border border-gray-300 rounded-md px-3 py-2"
                            placeholder="Detail lainnya (Cth: Blok/Unit)">
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Kode Pos</label>
                        <input type="text" name="kode_pos" class="w-full border border-gray-300 rounded-md px-3 py-2"
                            placeholder="Kode Pos">
                    </div>

                    <!-- Tombol Simpan -->
                    <div class="flex justify-center pt-4">
                        <button class="bg-orange-500 hover:bg-orange-600  text-white px-6 py-2 rounded-md">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('non-user.profile.modal-kategori.modal1')
    @include('non-user.profile.modal-kategori.modal2')

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            console.log("JS siap! Listener aktif.");

            // ===============================
            // STATUS PELAMAR (Trigger Modal 1)
            // ===============================
            const statusSelect = document.getElementById('statusSelect');
            const kategoriInput = document.getElementById('kategoriPelamar');

            if (statusSelect) {
                statusSelect.addEventListener('change', function() {

                    let selected = this.value;
                    let kategori = kategoriInput ? kategoriInput.value : null;

                    console.log("Selected:", selected);
                    console.log("Kategori:", kategori);

                    if (selected === 'Bekerja' && kategori === 'kandidat aktif') {
                        document.getElementById('modalPeringatan').classList.remove('hidden');
                    }
                });
            }

            // ===============================
            // MODAL PERINGATAN
            // ===============================
            const yaPeringatan = document.getElementById('yaPeringatan');
            const tidakPeringatan = document.getElementById('tidakPeringatan');

            if (yaPeringatan) {
                yaPeringatan.onclick = function() {
                    document.getElementById('modalPeringatan').classList.add('hidden');
                    document.getElementById('modalNonaktif').classList.remove('hidden');
                };
            }

            if (tidakPeringatan) {
                tidakPeringatan.onclick = function() {
                    document.getElementById('modalPeringatan').classList.add('hidden');
                    statusSelect.value = ""; // Kembali kosong
                };
            }

            // ===============================
            // MODAL NONAKTIF
            // ===============================
            const yaNonaktif = document.getElementById('yaNonaktif');
            const tidakNonaktif = document.getElementById('tidakNonaktif');

            if (yaNonaktif) {
                yaNonaktif.onclick = function() {

                    fetch("/pelamar/update-kategori/{{ $pelamar->id }}", {
                            method: "PUT",
                            headers: {
                                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                "Accept": "application/json",
                                "Content-Type": "application/json",
                            },
                            body: JSON.stringify({
                                kategori: "kandidat nonaktif"
                            }),
                        })
                        .then(res => res.json())
                        .then(data => {
                            location.reload();
                        });

                };
            }

            if (tidakNonaktif) {
                tidakNonaktif.onclick = function() {
                    document.getElementById('modalNonaktif').classList.add('hidden');
                    statusSelect.value = "";
                };
            }

        });
    </script>
    @include('layouts.footer')
@endsection
