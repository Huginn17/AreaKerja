@extends('layouts.index')
@section('content')
    <meta property="og:title" content="{{ $data->nama }}">
    <meta property="og:site_name" content="Area Kerja">
    <meta property="og:description" content="{{ strip_tags(Str::limit($data->deskripsi, 150)) }}">
    <meta property="og:url" content="{{ route('detail.lowongan.non.user', $data->slug) }}">
    <meta property="og:type" content="article">

    <meta property="og:image" content="{{ asset($data->gambar ?? 'default.jpg') }}">
    <meta property="og:image:alt" content="{{ $data->nama }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $data->nama }}">
    <meta name="twitter:description" content="{{ strip_tags(Str::limit($data->deskripsi, 150)) }}">
    <meta name="twitter:image" content="{{ asset($data->gambar ?? 'default.jpg') }}">


    <div class="bg-gray-50 font-sans" x-data="{
        showConfirm: false,
        showSuccess: false,
        showConfirmTerima: false,
        showConfirmTolak: false,
        showAlasan: false
    }">

        <div class="max-w-7xl mx-auto py-8 px-4 md:px-8 grid md:grid-cols-3 gap-6">

            <!-- KIRI: DETAIL LOWONGAN -->
            <div class="md:col-span-2 space-y-6">
                <div class="bg-white rounded-lg shadow p-6 space-y-4">
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('storage/' . $data->perusahaan->img_profile) }}" alt="logo"
                            class="w-20 h-20 rounded-full">
                        <div>
                            <h1 class="text-xl font-semibold">{{ $data->nama }}</h1>
                            <p class="text-gray-600">{{ $data->perusahaan->nama_perusahaan }}</p>
                            <p class="text-gray-500 text-sm">{{ $data->alamat }}</p>
                        </div>
                    </div>

                    <p class="text-orange-600 font-medium">
                        Rp {{ number_format($data->gaji_awal) }} - Rp {{ number_format($data->gaji_akhir) }} /bulan
                    </p>

                    <!-- Tombol Aksi -->
                    <div class="flex items-center gap-3">
                        @php
                            $disabled =
                                isset($tawaran) &&
                                in_array(strtolower($tawaran->status ?? ''), ['diterima', 'ditolak']);
                        @endphp

                        @auth
                            @php
                                $kategori = Auth::user()->pelamar->kategori ?? null;
                            @endphp

                            @if ($kategori === 'pelamar' || $kategori === 'calon kandidat' || ($kategori === 'kandidat aktif' && !$tawaran))
                                <button @click="showConfirm = true"
                                    class="bg-orange-500 hover:bg-orange-600 text-white px-5 py-2 rounded-lg transition">
                                    Lamar Cepat
                                </button>

                                {{-- simpan --}}
                                <div x-data="saveLowongan({{ $data->id }}, {{ $isSaved ? 'true' : 'false' }})">
                                    <button @click="toggleSave" class="px-4 py-2 rounded-lg border"
                                        :class="saved
                                            ?
                                            'bg-red-100 border-red-500 text-red-600' :
                                            'bg-gray-100 border-gray-400 text-gray-700'">

                                        <!-- Love Putih (Belum disimpan) -->
                                        <i x-show="!saved" class="ph ph-heart text-gray-600"></i>

                                        <!-- Love Merah (Sudah disimpan) -->
                                        <i x-show="saved" class="ph ph-heart-fill text-red-600"></i>

                                    </button>


                                </div>
                            @endif

                            {{-- Jika kandidat aktif dan ADA tawaran --}}
                            @if ($kategori === 'kandidat aktif' && $tawaran)
                                <button @click="if(!{{ $disabled ? 'true' : 'false' }}) showConfirmTerima=true"
                                    :disabled="{{ $disabled ? 'true' : 'false' }}"
                                    class="px-5 py-2 rounded-md text-white transition"
                                    :class="{{ $disabled ? "'bg-green-300 cursor-not-allowed'" : "'bg-green-500 hover:bg-green-600'" }}">
                                    Terima
                                </button>

                                <button @click="if(!{{ $disabled ? 'true' : 'false' }}) showConfirmTolak=true"
                                    :disabled="{{ $disabled ? 'true' : 'false' }}"
                                    class="px-5 py-2 rounded-md text-white transition"
                                    :class="{{ $disabled ? "'bg-red-300 cursor-not-allowed'" : "'bg-red-500 hover:bg-red-600'" }}">
                                    Tolak
                                </button>

                                {{-- Tombol Love --}}
                                @auth
                                    @php
                                        $lowongan = $tawaran ? $tawaran->lowonganPerusahaan : $data; // fallback ke $data kalau gak ada tawaran
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
                                                <button type="submit"
                                                    class="p-2 rounded-md bg-gray-200 hover:bg-gray-300 transition"
                                                    title="Simpan Lowongan">
                                                    <i class="ph ph-heart text-2xl text-gray-600"></i>
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('simpan-lowongan.destroy', $lowongan->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="p-2 rounded-md bg-pink-100 hover:bg-gray-200 transition"
                                                    title="Hapus dari Simpan">
                                                    <i class="ph-fill ph-heart text-2xl text-pink-500"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                @endauth
                            @endif
                        @endauth
                    </div>
                </div>

                <!-- DETAIL LOWONGAN -->
                <div class="bg-white rounded-lg shadow p-6 space-y-6">
                    <div>
                        <h2 class="font-semibold text-lg mb-2">Detail Lowongan</h2>
                        <p class="text-semibold text-gray-500">Berikut merupakan deskripsi lengkap terkait perusahaan yang anda tuju</p>
                        <div class="flex items-start gap-3 mt-4">

                            <!-- ICON -->
                            <svg width="23" height="19" viewBox="0 0 23 19" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M17.2198 5.39322H18.9611V3.65201H17.2198V5.39322ZM17.2198 9.91583H18.9611V8.17462H17.2198V9.91583ZM17.2198 14.4384H18.9611V12.6972H17.2198V14.4384ZM0 18.0905V8.4799L6.78392 3.65201L13.5678 8.4799V18.0905H8.8711V12.3501H4.69673V18.0905H0ZM15.8291 18.0905V7.34925L9.48053 2.79271V0H22.6131V18.0905H15.8291Z"
                                    fill="black" fill-opacity="0.6" />
                            </svg>

                            <div>
                                <h3 class="font-semibold text-lg">Jenis Lowongan</h3>

                                <span
                                    class="inline-block mt-2 px-4 py-1 bg-gray-300 rounded-md font-semibold text-gray-700 text-sm">
                                    {{ $data->jenis }}
                                </span>
                            </div>
                        </div>
                        <hr class="mt-[40px]">
                        <div class="mt-8">
                            <h3 class="font-semibold text-lg mb-2">Lokasi</h3>
                            <p class="text-gray-600"><i class="ph ph-map-pin text-2xl ml-5"></i><span
                                    class="ml-3">{{ $data->alamat }}</span></p>
                        </div>
                    </div>
<hr>
                    <div>
                        <h2 class="font-semibold text-lg mb-2">Requirements</h2>
                        <p class="text-gray-700">
                            @foreach (explode("\n", $data->syarat_pekerjaan) as $req)
                                <li>{{ $req }}</li>
                            @endforeach
                        </p>
                    </div>

                    <div>
                        <h2 class="font-semibold text-lg mb-2">Responsibilities</h2>
                        <p class="text-gray-700">
                            @foreach (preg_split("/\r\n|\n|\r/", $data->tanggung_jawab) as $res)
                                @if (trim($res) !== '')
                                    <li>{{ $res }}</li>
                                @endif
                            @endforeach
                        </p>
                    </div>
                </div>
            </div>

            <!-- KANAN: LOWONGAN LAIN -->
            <div class="space-y-4">
                <div class="flex justify-between items-center">
                    <h2 class="font-semibold">Lowongan Lainnya di {{ $data->perusahaan->nama_perusahaan }}</h2>
                </div>

                <div class="bg-white rounded-lg shadow p-4 space-y-4">
                    @forelse ($lowonganLain as $item)
                        <a href="{{ route('detail.lowongan.non.user', $item->id) }}"
                            class="block border-b pb-4 hover:bg-gray-50 transition rounded-md p-2">
                            <div class="flex items-start gap-3">
                                <img src="{{ asset('storage/' . $data->perusahaan->img_profile) }}" alt="logo"
                                    class="w-14 h-14 rounded-full">
                                <div>
                                    <h3 class="font-medium">{{ $item->nama }}</h3>
                                    <p class="text-gray-500 text-sm">{{ $item->alamat }}</p>
                                    <p class="text-sm text-gray-700">
                                        Rp {{ number_format($item->gaji_awal) }} - Rp
                                        {{ number_format($item->gaji_akhir) }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    @empty
                        <p class="text-sm text-gray-500">Tidak ada lowongan lain.</p>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- ===================== MODAL ===================== --}}

        {{-- Lamar Cepat --}}
        <div x-show="showConfirm" x-cloak
            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white rounded-lg p-6 text-center w-96">
                <h2 class="text-lg font-semibold mb-4">Konfirmasi</h2>
                <p class="mb-6">
                    CV anda akan dikirim ke <b>{{ $data->perusahaan->nama_perusahaan }}</b>
                </p>
                <div class="flex justify-center gap-4">
                    <button @click="showConfirm = false" class="px-4 py-2 bg-gray-300 rounded-lg">Batal</button>
                    <button
                        @click.prevent="
                        fetch('{{ route('lamar.cepat', $data->id) }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').getAttribute('content')
                            },
                            body: JSON.stringify({})
                        })
                        .then(res => res.json())
                        .then(data => {
                            if (data.success) {
                                showConfirm = false;
                                showSuccess = true;
                            } else if (data.redirect) {
                                window.location.href = data.redirect;
                            } else {
                                alert(data.message ?? 'Gagal mengirim lamaran.');
                            }
                        })
                    "
                        class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600">
                        Kirim
                    </button>
                </div>
            </div>
        </div>

        {{-- Modal Sukses --}}
        <div x-show="showSuccess" x-cloak
            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white rounded-lg p-6 text-center w-96">
                <h2 class="text-lg font-semibold mb-4">Lamaran anda telah terkirim</h2>
                <p class="mb-6">Silahkan menunggu informasi selanjutnya melalui sistem kami.</p>
                <button @click="showSuccess = false"
                    class="px-6 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600">
                    Selesai
                </button>
            </div>
        </div>

        {{-- Modal Terima --}}
        <div x-show="showConfirmTerima" x-cloak
            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white rounded-lg p-6 text-center w-96">
                <h2 class="text-lg font-semibold mb-4">Konfirmasi</h2>
                <p class="mb-6">Yakin ingin menerima tawaran dari <b>{{ $data->perusahaan->nama_perusahaan }}</b>?</p>
                <div class="flex justify-center gap-4">
                    <button @click="showConfirmTerima = false" class="px-4 py-2 bg-gray-300 rounded-lg">Batal</button>
                    <button
                        @click="
                        fetch('{{ route('kandidat.updateStatus', $tawaran->id ?? 0) }}', {
                            method: 'POST',
                            headers: { 
                                'Content-Type': 'application/json', 
                                'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content 
                            },
                            body: JSON.stringify({ status: 'diterima' })
                        }).then(res => res.json())
                        .then(data => { if (data.status === 'success') showConfirmTerima = false; showSuccess = true; })
                    "
                        class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">
                        Ya, Terima
                    </button>
                </div>
            </div>
        </div>

        {{-- Modal Tolak --}}
        <div x-show="showConfirmTolak" x-cloak
            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white rounded-lg p-6 text-center w-96">
                <h2 class="text-lg font-semibold mb-4">Konfirmasi Penolakan</h2>
                <p class="mb-6">Yakin ingin menolak tawaran dari <b>{{ $data->perusahaan->nama_perusahaan }}</b>?</p>
                <div class="flex justify-center gap-4">
                    <button @click="showConfirmTolak = false" class="px-4 py-2 bg-gray-300 rounded-lg">Batal</button>
                    <button @click="showConfirmTolak = false; showAlasan = true"
                        class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">Lanjut</button>
                </div>
            </div>
        </div>

        {{-- Modal Alasan --}}
        <div x-show="showAlasan" x-cloak
            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white rounded-lg p-6 w-[380px]">
                <h2 class="text-lg font-semibold mb-4">Pilih Alasan Penolakan</h2>
                <form id="form-penolakan" class="space-y-3">
                    @foreach (config('alasan_penolakan') as $alasan)
                        <label class="flex items-center gap-2">
                            <input type="radio" name="alasan_penolakan" value="{{ $alasan }}">
                            <span>{{ $alasan }}</span>
                        </label>
                    @endforeach
                    <textarea name="alasan_penolakan_custom" rows="3" placeholder="Lainnya..."
                        class="w-full border rounded px-3 py-2"></textarea>
                </form>
                <div class="flex justify-end gap-3 mt-4">
                    <button @click="showAlasan = false"
                        class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Batal</button>
                    <button
                        @click="
                        const form = document.getElementById('form-penolakan');
                        const data = new FormData(form);
                        const alasan = data.get('alasan_penolakan_custom') || data.get('alasan_penolakan');
                        fetch('{{ route('kandidat.updateStatus', $tawaran->id ?? 0) }}', {
                            method: 'POST',
                            headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content },
                            body: new URLSearchParams({ status: 'ditolak', alasan_penolakan: alasan })
                        }).then(res => res.json())
                        .then(data => { if (data.status === 'success') location.reload(); });
                    "
                        class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Kirim</button>
                </div>
            </div>
        </div>

        @include('layouts.footer')
    </div>


    {{-- SIMPAN LOWONGAN --}}
    <script>
        function saveLowongan(lowonganId, initialState) {

            return {
                saved: initialState,

                toggleSave() {
                    if (!this.saved) {
                        // SIMPAN
                        fetch("{{ route('simpan-lowongan.store') }}", {
                                method: "POST",
                                headers: {
                                    "Content-Type": "application/json",
                                    "Accept": "application/json",
                                    "X-CSRF-TOKEN": document.querySelector('meta[name=csrf-token]').content
                                },
                                body: JSON.stringify({
                                    lowongan_id: lowonganId
                                })
                            })
                            .then(r => r.ok && (this.saved = true))
                            .catch(() => alert("Gagal menyimpan."))
                    } else {
                        // HAPUS
                        fetch(`/pelamar/simpan-lowongan/${lowonganId}`, {
                                method: "DELETE",
                                headers: {
                                    "Accept": "application/json",
                                    "X-CSRF-TOKEN": document.querySelector('meta[name=csrf-token]').content
                                }
                            })
                            .then(r => {
                                if (r.ok) {
                                    this.saved = false;
                                    location.reload();
                                }
                            })
                            .catch(() => alert("Gagal menghapus."));

                    }
                }
            }
        }
    </script>
@endsection
