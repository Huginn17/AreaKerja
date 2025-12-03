@if ($d->published_at && (!$d->expired_at || $d->expired_at > now()))
    <div x-data="{ open: false, showConfirm: false, showSuccess: false }"
        class="border-2 border-gray-400 p-6 rounded-lg shadow-sm hover:shadow-md transition bg-white relative overflow-visible self-start">


        {{-- Header --}}
        <div class="flex justify-between items-start">
            {{-- 🔹 Label Direkomendasikan --}}
            <div>
                @if ($d->rekomendasi !== null)
                    <p class="bg-[#fdedf4] w-fit px-3 py-1 text-blue-500 font-semibold rounded-md text-xs">
                        Direkomendasikan
                    </p>
                @endif
                @if ($d->urgent ?? true)
                    <p class="bg-[#fdedf4] w-fit px-3 py-1 text-[#9d2b6b] font-semibold rounded-md text-xs mt-3">
                        Dibutuhkan segera
                    </p>
                @endif
                @if (now()->greaterThan(\Carbon\Carbon::parse($d->batas_lamaran)))
                    <p class="bg-red-100 w-fit px-3 py-1 text-red-600 font-semibold rounded-md text-xs mt-3">
                        Batas lamaran berakhir
                    </p>
                @endif


                <h1 class="font-bold text-lg my-3">
                    {{ $d->nama }} - {{ $d->jenis }}
                </h1>
            </div>
            <div>
                <div x-data="{ showMenu: false }" class="relative">

                    <!-- Tombol titik tiga -->
                    <button @click="showMenu = !showMenu"
                        class="text-2xl text-gray-500 hover:text-gray-700 p-1 rounded-lg">
                        <i class="ph ph-dots-three-vertical"></i>
                    </button>

                    <!-- Popup -->
                    <div x-show="showMenu" @click.outside="showMenu = false" x-transition x-cloak
                        class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-gray-200 z-100 py-2">

                        <!-- LinkedIn -->
                        <a href="{{ route('lowongan.share', [
                            'platform' => 'linkedin',
                            'companySlug' => $d->perusahaan->slug,
                            'jobSlug' => $d->slug,
                        ]) }}"
                            class="flex items-center gap-3 px-4 py-3 hover:bg-gray-100">
                            <svg width="24" height="24" viewBox="2 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M19 3C19.5304 3 20.0391 3.21071 20.4142 3.58579C20.7893 3.96086 21 4.46957 21 5V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V5C3 4.46957 3.21071 3.96086 3.58579 3.58579C3.96086 3.21071 4.46957 3 5 3H19ZM18.5 18.5V13.2C18.5 12.3354 18.1565 11.5062 17.5452 10.8948C16.9338 10.2835 16.1046 9.94 15.24 9.94C14.39 9.94 13.4 10.46 12.92 11.24V10.13H10.13V18.5H12.92V13.57C12.92 12.8 13.54 12.17 14.31 12.17C14.6813 12.17 15.0374 12.3175 15.2999 12.5801C15.5625 12.8426 15.71 13.1987 15.71 13.57V18.5H18.5ZM6.88 8.56C7.32556 8.56 7.75288 8.383 8.06794 8.06794C8.383 7.75288 8.56 7.32556 8.56 6.88C8.56 5.95 7.81 5.19 6.88 5.19C6.43178 5.19 6.00193 5.36805 5.68499 5.68499C5.36805 6.00193 5.19 6.43178 5.19 6.88C5.19 7.81 5.95 8.56 6.88 8.56ZM8.27 18.5V10.13H5.5V18.5H8.27Z"
                                    fill="black" />
                            </svg>

                            <span class="text-sm font-bold">LinkedIn</span>
                        </a>

                        <!-- Gmail -->
                        <a href="{{ route('lowongan.share', [
                            'platform' => 'email',
                            'companySlug' => $d->perusahaan->slug,
                            'jobSlug' => $d->slug,
                        ]) }}"
                            class="flex items-center gap-4 px-4 py-3 hover:bg-gray-100">
                            <svg width="20" height="16" viewBox="0 0 20 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M20 2C20 0.9 19.1 0 18 0H2C0.9 0 0 0.9 0 2V14C0 15.1 0.9 16 2 16H18C19.1 16 20 15.1 20 14V2ZM18 2L10 7L2 2H18ZM18 14H2V4L10 9L18 4V14Z"
                                    fill="black" />
                            </svg>

                            <span class="text-sm font-bold">Gmail</span>
                        </a>

                        <!-- Website -->
                        <a href="{{ route('lowongan.share', [
                            'platform' => 'website',
                            'companySlug' => $d->perusahaan->slug,
                            'jobSlug' => $d->slug,
                        ]) }}"
                            class="flex items-center gap-4 px-4 py-3 hover:bg-gray-100">
                            <svg width="18" height="10" viewBox="0 0 18 10" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13.5 0H10.8C10.305 0 9.9 0.45 9.9 1C9.9 1.55 10.305 2 10.8 2H13.5C14.985 2 16.2 3.35 16.2 5C16.2 6.65 14.985 8 13.5 8H10.8C10.305 8 9.9 8.45 9.9 9C9.9 9.55 10.305 10 10.8 10H13.5C15.984 10 18 7.76 18 5C18 2.24 15.984 0 13.5 0ZM5.4 5C5.4 5.55 5.805 6 6.3 6H11.7C12.195 6 12.6 5.55 12.6 5C12.6 4.45 12.195 4 11.7 4H6.3C5.805 4 5.4 4.45 5.4 5ZM7.2 8H4.5C3.015 8 1.8 6.65 1.8 5C1.8 3.35 3.015 2 4.5 2H7.2C7.695 2 8.1 1.55 8.1 1C8.1 0.45 7.695 0 7.2 0H4.5C2.016 0 0 2.24 0 5C0 7.76 2.016 10 4.5 10H7.2C7.695 10 8.1 9.55 8.1 9C8.1 8.45 7.695 8 7.2 8Z"
                                    fill="black" />
                            </svg>

                            <span class="text-sm font-bold">Website</span>
                        </a>

                        <!-- WhatsApp -->
                        <a href="{{ route('lowongan.share', [
                            'platform' => 'whatsapp',
                            'companySlug' => $d->perusahaan->slug,
                            'jobSlug' => $d->slug,
                        ]) }}"
                            class="flex items-center gap-3 px-4 py-3 hover:bg-gray-100">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M17 2.91005C16.0831 1.98416 14.991 1.25002 13.7875 0.750416C12.584 0.250812 11.2931 -0.00426317 9.99 5.38951e-05C4.53 5.38951e-05 0.0800002 4.45005 0.0800002 9.91005C0.0800002 11.6601 0.54 13.3601 1.4 14.8601L0 20.0001L5.25 18.6201C6.7 19.4101 8.33 19.8301 9.99 19.8301C15.45 19.8301 19.9 15.3801 19.9 9.92005C19.9 7.27005 18.87 4.78005 17 2.91005ZM9.99 18.1501C8.51 18.1501 7.06 17.7501 5.79 17.0001L5.49 16.8201L2.37 17.6401L3.2 14.6001L3 14.2901C2.17755 12.9771 1.74092 11.4593 1.74 9.91005C1.74 5.37005 5.44 1.67005 9.98 1.67005C12.18 1.67005 14.25 2.53005 15.8 4.09005C16.5676 4.85392 17.1759 5.7626 17.5896 6.76338C18.0033 7.76417 18.2142 8.83714 18.21 9.92005C18.23 14.4601 14.53 18.1501 9.99 18.1501ZM14.51 11.9901C14.26 11.8701 13.04 11.2701 12.82 11.1801C12.59 11.1001 12.43 11.0601 12.26 11.3001C12.09 11.5501 11.62 12.1101 11.48 12.2701C11.34 12.4401 11.19 12.4601 10.94 12.3301C10.69 12.2101 9.89 11.9401 8.95 11.1001C8.21 10.4401 7.72 9.63005 7.57 9.38005C7.43 9.13005 7.55 9.00005 7.68 8.87005C7.79 8.76005 7.93 8.58005 8.05 8.44005C8.17 8.30005 8.22 8.19005 8.3 8.03005C8.38 7.86005 8.34 7.72005 8.28 7.60005C8.22 7.48005 7.72 6.26005 7.52 5.76005C7.32 5.28005 7.11 5.34005 6.96 5.33005H6.48C6.31 5.33005 6.05 5.39005 5.82 5.64005C5.6 5.89005 4.96 6.49005 4.96 7.71005C4.96 8.93005 5.85 10.1101 5.97 10.2701C6.09 10.4401 7.72 12.9401 10.2 14.0101C10.79 14.2701 11.25 14.4201 11.61 14.5301C12.2 14.7201 12.74 14.6901 13.17 14.6301C13.65 14.5601 14.64 14.0301 14.84 13.4501C15.05 12.8701 15.05 12.3801 14.98 12.2701C14.91 12.1601 14.76 12.1101 14.51 11.9901Z"
                                    fill="black" />
                            </svg>

                            <span class="text-sm font-bold">WhatsApp</span>
                        </a>

                    </div>
                </div>
            </div>
        </div>

        {{-- Perusahaan & Lokasi --}}
        <p class="text-gray-500 font-semibold">{{ $d->perusahaan->nama_perusahaan }}</p>
        <p class="text-gray-500 font-semibold">{{ $d->alamat }}</p>

        {{-- Rentang Gaji --}}
        <p class="bg-[#d7d6d6] w-fit my-3 px-3 py-1 text-[#565656] font-semibold rounded-md text-sm">
            Rp. {{ number_format($d->gaji_awal, 0, ',', '.') }} – Rp.
            {{ number_format($d->gaji_akhir, 0, ',', '.') }} / bulan
        </p>

        {{-- Ringkasan --}}
        <div x-show="!open" class="mt-3">
            <div class="flex items-center justify-between my-4 text-gray-600">
                <div class="flex items-center gap-2">
                    <i class="ph-fill ph-paper-plane-right text-blue-600 text-xl"></i>
                    <span class="font-medium">Lamar Dengan Cepat</span>
                </div>


                {{-- Tombol Simpan Lowongan --}}
                @auth
                    @php
                        $sudahSimpan = Auth::user()->pelamar
                            ? Auth::user()->pelamar->simpanLowongans()->where('lowongan_id', $d->id)->exists()
                            : false;
                    @endphp

                    @if (!$sudahSimpan)
                        <form action="{{ route('simpan-lowongan.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="lowongan_id" value="{{ $d->id }}">
                            <button type="submit" class="text-gray-400 hover:text-blue-600" title="Simpan Lowongan">
                                <i class="ph ph-bookmark-simple text-2xl"></i>
                            </button>
                        </form>
                    @else
                        <form action="{{ route('simpan-lowongan.destroy', $d->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-blue-600 hover:text-red-500" title="Hapus dari Simpan">
                                <i class="ph-fill ph-bookmark-simple text-2xl"></i>
                            </button>
                        </form>
                    @endif
                @endauth
            </div>

            <ul class="ps-5 mt-2 space-y-1 list-disc list-inside mb-5 text-sm text-gray-600">
                <li>Gaji – Rp{{ $d->gaji_awal }} – Rp{{ $d->gaji_akhir }} per bulan tergantung
                    pengalaman.
                </li>
                <li>Harus menyelesaikan penilaian pra-wawancara singkat sebelum diwawancara.</li>
                <li>Diminta mengirimkan video perkenalan singkat (detail diberikan nanti).</li>
            </ul>

            <div class="flex items-center justify-between mt-3 text-[#565656]">
                <span class="text-xs text-gray-400">
                    Aktif {{ $d->published_at->diffForHumans() }}
                </span>

                <p id="countdown-{{ $d->id }}" class="text-red-500 font-medium text-right text-xs"></p>
            </div>

        </div>

        {{-- Detail --}}
        <div x-show="open" x-collapse class="mt-6">
            @php
                $expired = $d->batas_lamaran && now()->greaterThan($d->batas_lamaran);
            @endphp

            <div class="space-y-6">

                {{-- Tombol Lamar Cepat + kondisi expired --}}
                <button @if (!$expired) @click.stop="showConfirm = true" @endif
                    class="inline-block px-4 py-2 rounded-lg text-sm font-semibold transition
               {{ $expired ? 'bg-gray-300 text-gray-600 cursor-not-allowed' : 'bg-orange-500 text-white hover:bg-orange-600' }}">
                    {{ $expired ? 'Lamaran Ditutup' : 'Lamar Cepat' }}
                </button>

                <hr>

                <div>
                    <h3 class="font-semibold text-lg mb-2">Detail Lowongan</h3>

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
                                {{ $d->jenis }}
                            </span>
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="font-semibold text-lg mb-2">Lokasi</h3>
                    <p class="text-gray-600">
                        <i class="ph ph-map-pin text-2xl ml-5"></i>
                        <span class="ml-3">{{ $d->alamat }}</span>
                    </p>
                </div>

                <hr>

                <div>
                    <h3 class="font-semibold text-lg mb-2">Deskripsi Lowongan</h3>
                    <p class="text-gray-700 leading-relaxed">{{ $d->deskripsi }}</p>
                </div>

                <div>
                    <h3 class="font-semibold text-lg mb-2">Requirements</h3>
                    <ul class="list-disc list-inside text-gray-700 space-y-1">
                        @foreach (explode("\n", $d->syarat_pekerjaan) as $req)
                            <li>{{ $req }}</li>
                        @endforeach
                    </ul>
                </div>

                <div>
                    <h3 class="font-semibold text-lg mb-2">Responsibilities</h3>
                    <ul class="list-disc list-inside text-gray-700 space-y-1 leading-relaxed">
                        @foreach (preg_split("/\r\n|\n|\r/", $d->tanggung_jawab) as $res)
                            @php
                                $trim = trim($res);
                                $isNumbered = preg_match('/^\d+[\.\-\)]\s*/', $trim);
                            @endphp

                            @if ($trim !== '')
                                @if ($isNumbered)
                                    <li style="list-style-type: none;">{{ $trim }}</li>
                                @else
                                    <li>{{ $trim }}</li>
                                @endif
                            @endif
                        @endforeach
                    </ul>
                </div>

            </div>

        </div>

        {{-- Tombol toggle detail --}}
        <div class="mt-4">
            <button @click="open = !open" class="text-sm text-blue-600 hover:underline">
                <span x-show="!open">Lihat Detail</span>
                <span x-show="open">Tutup Detail</span>
            </button>
        </div>

        {{-- Modal Konfirmasi --}}
        <div x-show="showConfirm" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
            x-cloak>
            <div class="bg-white rounded-lg p-6 text-center w-96">
                <h2 class="text-lg font-semibold mb-4">Konfirmasi</h2>
                <p class="mb-6">CV akan dikirimkan ke
                    <b>{{ $d->perusahaan->nama_perusahaan }}</b>
                </p>
                <div class="flex justify-center gap-4">
                    <button @click="showConfirm = false"
                        class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded-lg">Batal</button>

                    <button
                        @click.prevent="
        fetch('{{ route('lamar.cepat', $d->id) }}', {
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

            // 🔥 UNAUTHENTICATED → SweetAlert
            if (data.unauthenticated) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Login Diperlukan',
                    text: data.message,
                    confirmButtonText: 'Login Sekarang',
                    confirmButtonColor: '#f97316',
                }).then(() => {
                    window.location.href = data.redirect;
                });
                return;
            }

            // 🔥 SUKSES → Tampilkan modal sukses kamu (showSuccess)
            if (data.success) {
                showConfirm = false;
                showSuccess = true;
                return;
            }

            // 🔥 ERROR LAIN → SweetAlert
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: data.message ?? 'Terjadi kesalahan.',
            });
        })
        .catch(err => {
            console.error(err);
            Swal.fire({
                icon: 'error',
                title: 'Kesalahan Koneksi',
                text: 'Harap periksa koneksi internet Anda.',
            });
        })
    "
                        class="px-4 py-2 bg-orange-500 hover:bg-orange-600 text-white rounded-lg">
                        Kirim
                    </button>


                </div>
            </div>
        </div>



        {{-- Modal Sukses --}}
        <div x-show="showSuccess" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
            x-cloak>
            <div class="bg-white rounded-lg p-6 text-center w-96">
                <h2 class="text-lg font-semibold mb-4">Lamaran anda telah terkirim</h2>
                <p class="mb-6">Silahkan menunggu informasi selanjutnya melalui sistem kami</p>
                <button @click="showSuccess = false"
                    class="px-6 py-2 bg-orange-500 text-white rounded-lg">Selesai</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const countdownEl = document.getElementById('countdown-{{ $d->id }}');

            // batas lamaran pakai 23:59:59 agar pas sehari penuh
            const batasLamaran = new Date(
                "{{ \Carbon\Carbon::parse($d->batas_lamaran)->format('Y-m-d') }} 23:59:59").getTime();

            if (countdownEl) {
                const interval = setInterval(function() {
                    const now = new Date().getTime();
                    const distance = batasLamaran - now;

                    if (distance < 0) {
                        clearInterval(interval);
                        countdownEl.innerHTML = "Batas lamaran telah berakhir";
                    } else {
                        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));

                        countdownEl.innerHTML = `${days}h ${hours}j ${minutes}m lagi`;
                    }
                }, 1000);
            }
        });
    </script>

@endif
