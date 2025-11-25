@extends('layouts.index')
@section('content')
    {{-- <form action="{{ route('profile.update', Auth::user()->pelamar->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') --}}
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
                            @endif
                            <button class="absolute bottom-11 right-14 bg-orange-500 text-white rounded-full p-1 text-xs">
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


                {{-- content --}}
                <div class="my-10">
                    <h2 class="text-lg font-bold text-gray-800 border-b-2 border-orange-500 pb-2 mb-4">Alamat</h2>
                    <div class="block lg:flex md:flex justify-between">
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach (Auth::user()->pelamar->alamat_pelamar as $almt)
                                <div class="w-full p-5 bg-orange-500 text-white rounded-lg mb-5">
                                    <h1 class="text-2xl">{{ $almt->label }}</h1>
                                    <p class="my-4">{{ $almt->desa }} {{ $almt->kecamatan }} {{ $almt->kota }}
                                        {{ $almt->provinsi }}
                                        {{ $almt->kode_pos }}</p>
                                    <p class="mb-10">{{ $almt->detail }}</p>
                                    <a class="w-fit px-6 py-2 bg-white rounded-lg text-orange-500 font-semibold hover:bg-orange-100 transition duration-300"
                                        href="{{ route('alamat.edit', $almt->id) }}">
                                        Edit Alamat</a>
                                    {{-- Hapus --}}
                                    <form action="{{ route('alamat.destroy', $almt->id) }}"method="POST"
                                        onsubmit="return confirm('Yakin hapus organisasi ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="w-fit px-6 py-2 bg-white rounded-lg text-orange-500 font-semibold mt-4 hover:bg-orange-100 transition duration-300">Hapus
                                            Alamat</button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                        <a href="{{ route('form_alamat') }}">
                            <span
                                class="w-14 h-14 flex justify-center items-center rounded-lg bg-orange-500 text-white text-5xl ml-4"><i
                                    class="ph ph-plus"></i></span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    {{-- </form> --}}

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
