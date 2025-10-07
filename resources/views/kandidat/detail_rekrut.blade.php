@extends('layouts.index')
@section('content')
    <div class="bg-gray-50 font-sans">
        <div class="max-w-7xl mx-auto py-8 px-4 md:px-8 grid md:grid-cols-3 gap-6">
            <!-- Kiri: Detail Lowongan -->
            <div class="md:col-span-2 space-y-6">
                <div class="bg-white rounded-lg shadow p-6 space-y-4">
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

                    <div x-data="{ showConfirm: false, showSuccess: false, action: '' }" class="relative">
                        <div class="flex gap-4">
                            <!-- Tombol Terima -->
                            <button
                                @click="if (!{{ $disabled ? 'true' : 'false' }}) { action = 'Diterima'; showConfirm = true }"
                                class="px-5 py-2 rounded-md text-white transition"
                                :disabled="{{ $disabled ? 'true' : 'false' }}"
                                :class="{{ $disabled ? "'bg-green-300 cursor-not-allowed'" : "'bg-green-500 hover:bg-green-600'" }}">
                                Terima
                            </button>

                            <!-- Tombol Tolak -->
                            <button
                                @click="if (!{{ $disabled ? 'true' : 'false' }}) { action = 'Ditolak'; showConfirm = true }"
                                class="px-5 py-2 rounded-md text-white transition"
                                :disabled="{{ $disabled ? 'true' : 'false' }}"
                                :class="{{ $disabled ? "'bg-red-300 cursor-not-allowed'" : "'bg-red-500 hover:bg-red-600'" }}">
                                Tolak
                            </button>
                        </div>
                        
                        @if (!$disabled)
                            <!-- Modal Konfirmasi -->
                            <div x-show="showConfirm" x-cloak
                                class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                                <div class="bg-white rounded-xl p-6 w-[360px] text-center">
                                    <h2 class="text-lg font-semibold mb-3">Konfirmasi</h2>
                                    <p class="text-gray-600 mb-6">
                                        Yakin ingin
                                        <span x-text="action === 'Diterima' ? 'menerima' : 'menolak'"></span>
                                        rekrutan dari
                                        <b>{{ $tawaran->lowonganPerusahaan->perusahaan->nama_perusahaan }}</b>?
                                    </p>

                                    <div class="flex justify-center gap-4">
                                        <button @click="showConfirm = false"
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
                                body: JSON.stringify({ status: action })
                            })
                            .then(res => res.json())
                            .then(data => {
                                if (data.status === 'success') {
                                    showConfirm = false;
                                    if (action === 'Diterima') {
                                        showSuccess = true;
                                    } else {
                                        alert('Rekrutan ditolak.');
                                        window.location.reload();
                                    }
                                } else {
                                    alert(data.message ?? 'Gagal memperbarui status.');
                                }
                            })
                            .catch(err => {
                                console.error(err);
                                alert('Terjadi kesalahan koneksi.');
                            });
                        "
                                            class="bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-600">
                                            Ya, <span x-text="action === 'Diterima' ? 'Terima' : 'Tolak'"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Modal Sukses -->
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
                </div>

                <!-- Detail Lowongan -->
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

                    <!-- Deskripsi -->
                    <div>
                        <h2 class="font-semibold text-lg mb-2">Deskripsi Lowongan</h2>
                        <p class="text-gray-700 mb-4"><b>Requirements</b></p>
                        <ul class="list-disc pl-6 text-gray-600 space-y-2">
                            <li>{{ $tawaran->lowonganPerusahaan->syarat_pekerjaan ?? '-' }}</li>
                        </ul>
                    </div>

                    <!-- Responsibilities -->
                    <div>
                        <p class="text-gray-700 mb-4"><b>Responsibilities</b></p>
                        <ul class="list-disc pl-6 text-gray-600 space-y-2">
                            <li>{{ $tawaran->lowonganPerusahaan->tanggung_jawab ?? '-' }}</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Kanan: Lowongan Lain -->
            <div class="space-y-4">
                <div class="flex justify-between items-center">
                    <h2 class="font-semibold">Lowongan {{ $tawaran->lowonganPerusahaan->perusahaan->nama_perusahaan }}
                        Lainnya</h2>
                    <a href="#" class="text-orange-600 text-sm font-medium">Lihat semua</a>
                </div>

                <div class="bg-white rounded-lg shadow p-4 space-y-4">
                    @foreach ($lowonganLain as $low)
                        <a href="{{ route('kandidat.detailTawaran', $low->id) }}"
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
                                <span class="text-xs text-gray-400">
                                    Aktif {{ $low->published_at->diffForHumans() }}
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
