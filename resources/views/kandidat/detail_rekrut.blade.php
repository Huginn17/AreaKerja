@extends('layouts.index')

@section('content')
    <div class="bg-gray-50 mt-10">
        <div class="max-w-7xl mx-auto py-8 px-4 md:px-8 grid md:grid-cols-3 gap-6">

            <!-- Kiri: Detail Utama -->
            <div class="md:col-span-2 space-y-6" x-data="{
                showConfirmTerima: false,
                showConfirmTolak: false,
                showAlasan: false,
                showSuccess: false
            }">

                <div class="bg-white rounded-lg shadow p-6 space-y-4">
                    <!-- Header Info -->
                    <div class="flex items-center gap-3">
                        @if ($tawaran->lowonganPerusahaan->perusahaan->img_profile)
                            <img src="{{ asset('storage/' . $tawaran->lowonganPerusahaan->perusahaan->img_profile) }}"
                                alt="Logo Perusahaan" class="w-12 h-12 rounded">
                        @else
                            <img src="{{ asset('images/logo.png') }}" alt="Logo Perusahaan" class="w-12 h-12 rounded">
                        @endif

                        <div>
                            <h1 class="text-xl font-semibold">{{ $tawaran->lowonganPerusahaan->nama }}</h1>
                            <p class="text-gray-600">{{ $tawaran->lowonganPerusahaan->perusahaan->nama_perusahaan }}</p>
                            <p class="text-gray-500 text-sm">{{ $tawaran->lowonganPerusahaan->alamat }}</p>
                        </div>
                    </div>

                    <p class="text-orange-600 font-medium">
                        Rp. {{ number_format($tawaran->lowonganPerusahaan->gaji_awal, 0, ',', '.') }} -
                        Rp. {{ number_format($tawaran->lowonganPerusahaan->gaji_akhir, 0, ',', '.') }} per bulan
                    </p>

                    {{-- Tombol Terima / Tolak --}}
                    @php
                        $disabled = in_array(strtolower($tawaran->status), ['diterima', 'ditolak']);
                    @endphp

                    <div class="flex items-center gap-3">
                        <!-- Tombol Terima -->
                        <button @click="if (!{{ $disabled ? 'true' : 'false' }}) showConfirmTerima = true"
                            :disabled="{{ $disabled ? 'true' : 'false' }}"
                            class="px-5 py-2 rounded-md text-white transition"
                            :class="{{ $disabled ? "'bg-green-300 cursor-not-allowed'" : "'bg-green-500 hover:bg-green-600'" }}">
                            Terima
                        </button>

                        <!-- Tombol Tolak -->
                        <button @click="if (!{{ $disabled ? 'true' : 'false' }}) showConfirmTolak = true"
                            :disabled="{{ $disabled ? 'true' : 'false' }}"
                            class="px-5 py-2 rounded-md text-white transition"
                            :class="{{ $disabled ? "'bg-red-300 cursor-not-allowed'" : "'bg-red-500 hover:bg-red-600'" }}">
                            Tolak
                        </button>

                        {{-- Tombol Love --}}
                        @auth
                            @php
                                $lowongan = $tawaran->lowonganPerusahaan;
                                $sudahSimpan = Auth::user()->pelamar
                                    ? Auth::user()
                                        ->pelamar->simpanLowongans()
                                        ->where('lowongan_id', $lowongan->id)
                                        ->exists()
                                    : false;
                            @endphp

                            <div>
                                @if (!$sudahSimpan)
                                    <form action="{{ route('simpan-lowongan.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="lowongan_id" value="{{ $lowongan->id }}">
                                        <button type="submit" class="p-2 rounded-md bg-gray-200 hover:bg-gray-300 transition"
                                            title="Simpan Lowongan">
                                            <i class="ph ph-heart text-2xl text-gray-600"></i>
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('simpan-lowongan.destroy', $lowongan->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 rounded-md bg-pink-100 hover:bg-gray-200 transition"
                                            title="Hapus dari Simpan">
                                            <i class="ph-fill ph-heart text-2xl text-pink-500"></i>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        @endauth
                    </div>
                </div>

                <!-- Detail Lowongan (dipindah ke bawah) -->
                <div class="bg-white rounded-lg shadow p-6 space-y-6">
                    <div>
                        <h2 class="font-semibold text-lg mb-2">Detail Lowongan</h2>
                        <div class="flex items-center gap-2 text-gray-700 mb-2">
                            <i class="ph ph-briefcase text-lg"></i>
                            <span>Jenis Lowongan:
                                <b>{{ ucfirst($tawaran->lowonganPerusahaan->jenis ?? 'Fulltime') }}</b></span>
                        </div>
                        <div class="flex items-center gap-2 text-gray-700">
                            <i class="ph ph-map-pin text-lg"></i>
                            <span>Lokasi: <b>{{ $tawaran->lowonganPerusahaan->alamat }}</b></span>
                        </div>
                    </div>

                    <div>
                        <h2 class="font-semibold text-lg mb-2">Deskripsi Lowongan</h2>
                        <p class="text-gray-700 mb-4">{{ $tawaran->lowonganPerusahaan->deskripsi ?? '-' }}</p>
                        <p class="text-gray-700 mb-4"><b>Requirements</b></p>
                        <ul class="list-disc pl-6 text-gray-600 space-y-2">
                            <li>{{ $tawaran->lowonganPerusahaan->syarat_pekerjaan ?? '-' }}</li>
                        </ul>
                    </div>

                    <div>
                        <p class="text-gray-700 mb-4"><b>Responsibilities</b></p>
                        <ul class="list-disc pl-6 text-gray-600 space-y-2">
                            <li>{{ $tawaran->lowonganPerusahaan->tanggung_jawab ?? '-' }}</li>
                        </ul>
                    </div>
                </div>

                <!-- === MODALS === -->
                <!-- Modal Konfirmasi Terima -->
                <div x-show="showConfirmTerima" x-cloak
                    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                    <div class="bg-white rounded-xl p-6 w-[360px] text-center">
                        <h2 class="text-lg font-semibold mb-3">Konfirmasi</h2>
                        <p class="text-gray-600 mb-6">
                            Yakin ingin menerima rekrutan dari
                            <b>{{ $tawaran->lowonganPerusahaan->perusahaan->nama_perusahaan }}</b>?
                        </p>
                        <div class="flex justify-center gap-4">
                            <button @click="showConfirmTerima = false"
                                class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300">
                                Batal
                            </button>
                            <button
                                @click="
                                fetch('{{ route('kandidat.updateStatus', $tawaran->id) }}', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'Accept': 'application/json',
                                        'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                                    },
                                    body: JSON.stringify({ status: 'diterima' })
                                })
                                .then(res => res.json())
                                .then(data => {
                                    if (data.status === 'success') {
                                        showConfirmTerima = false;
                                        showSuccess = true;
                                    }
                                })
                            "
                                class="bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-600">
                                Ya, Terima
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Modal Konfirmasi Tolak -->
                <div x-show="showConfirmTolak" x-cloak
                    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                    <div class="bg-white rounded-xl p-6 w-[360px] text-center">
                        <h2 class="text-lg font-semibold mb-3">Konfirmasi Penolakan</h2>
                        <p class="text-gray-600 mb-6">
                            Yakin ingin menolak tawaran dari
                            <b>{{ $tawaran->lowonganPerusahaan->perusahaan->nama_perusahaan }}</b>?
                        </p>
                        <div class="flex justify-center gap-4">
                            <button @click="showConfirmTolak = false"
                                class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300">
                                Batal
                            </button>
                            <button @click="showConfirmTolak = false; showAlasan = true"
                                class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
                                Lanjut
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Modal Alasan Penolakan -->
                <div x-show="showAlasan" x-cloak
                    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                    <div class="bg-white rounded-xl p-6 w-[380px]">
                        <h2 class="text-lg font-semibold mb-4">Pilih Alasan Penolakan</h2>
                        <form id="form-penolakan" class="space-y-3">
                            @foreach (config('alasan_penolakan') as $alasan)
                                <label class="flex items-center gap-2">
                                    <input type="radio" name="alasan_penolakan" value="{{ $alasan }}">
                                    <span>{{ $alasan }}</span>
                                </label>
                            @endforeach
                            <div>
                                <label class="block text-sm text-gray-600">Lainnya</label>
                                <textarea name="alasan_penolakan_custom" rows="3" class="w-full border rounded px-3 py-2"></textarea>
                            </div>
                        </form>
                        <div class="flex justify-end gap-3 mt-4">
                            <button @click="showAlasan = false"
                                class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Batal</button>
                            <button
                                @click="
                                const form = document.getElementById('form-penolakan');
                                const formData = new FormData(form);
                                const alasanDipilih = formData.get('alasan_penolakan_custom') || formData.get('alasan_penolakan');
                                showAlasan = false;
                                fetch('{{ route('kandidat.updateStatus', $tawaran->id) }}', {
                                    method: 'POST',
                                    headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content },
                                    body: new URLSearchParams({ status: 'ditolak', alasan_penolakan: alasanDipilih })
                                })
                                .then(res => res.json())
                                .then(data => { if (data.status === 'success') window.location.reload(); });
                            "
                                class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                                Kirim
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Modal Sukses Terima -->
                <div x-show="showSuccess" x-cloak
                    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                    <div class="bg-white rounded-xl p-6 w-[380px] text-center relative">
                        <button @click="showSuccess = false"
                            class="absolute top-3 right-3 text-gray-400 hover:text-gray-600 text-xl">&times;</button>
                        <h2 class="text-lg font-semibold mb-3">
                            Selamat! Anda telah menjadi bagian dari <br>
                            <b>{{ $tawaran->lowonganPerusahaan->perusahaan->nama_perusahaan }}</b>
                        </h2>
                        <img src="{{ asset('images/orang.png') }}" alt="Success"
                            class="mx-auto my-4 w-40 h-40 object-contain">
                        <p class="text-gray-600">
                            Silakan tunggu <b>{{ $tawaran->lowonganPerusahaan->perusahaan->nama_perusahaan }}</b>
                            menghubungi Anda.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Kanan: Lowongan Lain -->
            <div class="space-y-4">
                <div class="flex justify-between items-center">
                    <h2 class="font-semibold">
                        Lowongan {{ $tawaran->lowonganPerusahaan->perusahaan->nama_perusahaan }} Lainnya
                    </h2>
                    {{-- <a href="#" class="text-orange-600 text-sm font-medium">Lihat semua</a> --}}
                </div>

                <div class="bg-white rounded-lg shadow p-4 space-y-4">
                    @foreach ($lowonganLain as $row)
                        @php $low = $row->lowonganPerusahaan; @endphp
                        <a href="{{ route('kandidat.detailTawaran', $row->id) }}"
                            class="flex items-start gap-3 border-b pb-4 hover:bg-gray-50 transition">
                            <img src="{{ asset('storage/' . ($low->perusahaan->img_profile ?? 'images/logo.png')) }}"
                                alt="Logo" class="w-10 h-10 rounded">
                            <div>
                                <h3 class="font-medium">{{ $low->nama }}</h3>
                                <p class="text-gray-500 text-sm">{{ $low->alamat }}</p>
                                <p class="text-sm text-gray-700">
                                    Rp. {{ number_format($low->gaji_awal, 0, ',', '.') }} -
                                    Rp. {{ number_format($low->gaji_akhir, 0, ',', '.') }} / bulan
                                </p>
                                <span class="text-xs text-gray-400"><span class="text-xs text-gray-400">
                                        Aktif {{ optional($low->published_at)->diffForHumans() ?? 'Belum Terpublicasikan' }}
                                    </span>
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
@endsection
