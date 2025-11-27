@extends('finance.sidebar.index')
@section('sidebar')
    <div class="p-4 sm:ml-64" x-data="{ openBukti: false, detail: {} }" x-cloak>
        <header class="w-full flex items-center justify-between px-6 py-3">
            <p class="font-semibold text-2xl">Catatan Transaksi</p>
            <div class="flex items-center gap-3">
                {{-- ✅ Komponen Notifikasi --}}
                @php
                    use App\Models\CatatanCash;
                    $notifCount = CatatanCash::where('status', 'menunggu_verifikasi')->count();
                    $notifikasiCash = CatatanCash::where('status', 'menunggu_verifikasi')->latest()->take(5)->get();
                @endphp

                <div x-data="{ open: false }" class="relative">
                    <!-- Tombol Notifikasi -->
                    <button @click="open = !open" class="relative group focus:outline-none">
                        <!-- Icon Lonceng -->
                        <svg width="31" height="32" viewBox="0 0 31 32" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_722_7956)">
                                <path
                                    d="M23.076 14.9431L22.6747 12.7383L21.1101 13.0055L21.5756 15.5633C21.6168 15.7894 21.7387 15.9922 21.9146 16.127L24.4524 18.0732L24.6985 19.4255L7.4876 22.3654L7.24147 21.0131L8.93911 18.3434C9.05673 18.1585 9.09972 17.9276 9.05861 17.7015L8.43786 14.2911C8.21777 13.0934 8.29153 11.8668 8.65169 10.7352C9.01186 9.60353 9.64569 8.60691 10.4892 7.84595C11.3326 7.08499 12.3559 6.58665 13.4555 6.40126C14.5552 6.21586 15.6924 6.34997 16.7522 6.79004L16.4051 4.88278C15.595 4.65063 14.7612 4.55689 13.9346 4.605L13.6165 2.85717L12.0518 3.12444L12.37 4.87227C10.4802 5.41568 8.87215 6.70676 7.85685 8.49588C6.84155 10.285 6.49109 12.445 6.87324 14.5583L7.42973 17.6158L5.7321 20.2855C5.61447 20.4704 5.57149 20.7013 5.6126 20.9274L6.07815 23.4852C6.11931 23.7114 6.24121 23.9141 6.41702 24.049C6.59284 24.1838 6.80817 24.2396 7.01565 24.2042L12.4919 23.2688L12.647 24.1214C12.8528 25.252 13.4623 26.2659 14.3414 26.9401C15.2205 27.6142 16.2971 27.8934 17.3345 27.7162C18.3719 27.539 19.2851 26.9199 19.8732 25.9951C20.4612 25.0704 20.676 23.9157 20.4702 22.785L20.315 21.9324L25.7912 20.997C25.9987 20.9616 26.1813 20.8378 26.2989 20.6528C26.4165 20.4679 26.4595 20.2369 26.4183 20.0108L25.9528 17.453C25.9116 17.2269 25.7896 17.0241 25.6138 16.8894L23.076 14.9431ZM18.9055 23.0523C19.029 23.7307 18.9002 24.4235 18.5473 24.9784C18.1945 25.5332 17.6466 25.9047 17.0242 26.011C16.4017 26.1173 15.7557 25.9498 15.2283 25.5453C14.7008 25.1408 14.3351 24.5325 14.2117 23.8541L14.0565 23.0015L18.7504 22.1997L18.9055 23.0523Z"
                                    fill="black" />
                                {{-- <path
                                d="M22.3629 11.0329C24.0912 10.7376 25.2143 8.97144 24.8714 7.08792C24.5286 5.20441 22.8497 3.91684 21.1214 4.21205C19.3932 4.50727 18.2701 6.27347 18.6129 8.15698C18.9558 10.0405 20.6347 11.3281 22.3629 11.0329Z"
                                fill="black" /> --}}
                            </g>
                        </svg>
                        {{-- 🔴 Badge notifikasi --}}
                        @if ($notifCount > 0)
                            <span
                                class="absolute -top-1 -right-1 bg-red-500 text-white text-[10px] font-bold px-1.5 py-0.5 rounded-full animate-pulse">
                                {{ $notifCount }}
                            </span>
                        @endif
                    </button>

                    {{-- 🔸 Dropdown notifikasi --}}
                    <div x-show="open" x-transition.opacity.duration.200ms @click.outside="open = false"
                        class="absolute right-0 mt-2 w-72 bg-white shadow-lg rounded-lg border border-gray-200 overflow-hidden z-[9999]">
                        <div class="p-3 border-b bg-orange-50">
                            <p class="font-semibold text-gray-700 text-sm">Notifikasi Finance</p>
                        </div>

                        <div class="max-h-60 overflow-y-auto">
                            @forelse ($notifikasiCash as $notif)
                                <div class="p-3 border-b hover:bg-gray-50">
                                    <p class="text-sm text-gray-800 font-medium">
                                        Transaksi dari <span
                                            class="text-orange-600">{{ $notif->dari ?? 'Tidak diketahui' }}</span>
                                    </p>
                                    <p class="text-xs text-gray-500">
                                        Menunggu verifikasi (Rp {{ number_format($notif->total, 0, ',', '.') }})
                                    </p>
                                </div>
                            @empty
                                <div class="p-3 text-sm text-gray-500 text-center">
                                    Tidak ada notifikasi.
                                </div>
                            @endforelse
                        </div>

                        <div class="p-2 text-center bg-gray-100">
                            <a href="{{ route('finance.catatan') }}"
                                class="text-orange-600 text-sm hover:underline font-semibold">
                                Lihat Lebih Detail
                            </a>
                        </div>
                    </div>
                </div>

                <div
                    class="flex items-center justify-between w-90 h-14 bg-white border border-orange-500 shadow-md rounded-2xl px-3 py-2">
                    <!-- Logo + Info -->
                    <div class="flex items-center gap-2 mr-2">
                        <a href="#">
                            @if (Auth::user()->role == 'finance')
                                @if (Auth::user()->finance->img_profile)
                                    <img id="pi" class="w-10 h-10  object-cover rounded-full profile-img"
                                        src="{{ asset('storage/' . Auth::user()->finance->img_profile) }}" alt="Profile">
                                @else
                                    <img id="pi" class="w-10 h-10 rounded-full"
                                        src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                                        alt="">
                                @endif
                            @else
                                <img class="w-10 h-10 rounded-full"
                                    src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                                    alt="">
                            @endif
                        </a>
                        <div class="text-sm">
                            <span class="font-semibold">{{ Auth::user()->username }}</spam>
                                <p class="text-gray-500 text-sm">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                </div>
        </header>

        <div class="p-6">
            {{-- ======================= --}}
            {{-- TABEL RIWAYAT TUNAI --}}
            {{-- ======================= --}}
            <div class="mb-12">
                <h2 class="text-lg font-semibold mb-2">Riwayat Tunai</h2>
                <div class="rounded-2xl overflow-hidden border shadow-md">
                    <table class="w-full text-sm">
                        <thead>

                            <tr class="bg-orange-500 text-white">

                                <th class="px-4 py-2 text-left">No</th>
                                <th class="px-4 py-2 text-left">No. Referensi</th>
                                <th class="px-4 py-2 text-left">Jenis</th>
                                <th class="px-4 py-2 text-left">Dari</th>
                                <th class="px-4 py-2 text-left">Sumber Dana</th>
                                <th class="px-4 py-2 text-left">Total Koin</th>
                                <th class="px-4 py-2 text-center">Bukti</th>
                                <th class="px-4 py-2 text-center">Detail</th>
                                <th class="px-4 py-2 text-left">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($catatanCash as $item)
                                <tr class="border-b-[2px] border-gray-300">
                                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-2">{{ $item->no_referensi }}</td>
                                    <td class="px-4 py-2">{{ $item->pesanan ?? '-' }}</td>
                                    <td class="px-4 py-2">{{ $item->user->pelamar->nama_pelamar ?? $item->user->username }}
                                    </td>
                                    <td class="px-4 py-2">{{ $item->sumberDana ?? 'Koin AreaKerja' }}</td>
                                    <td class="px-4 py-2">
                                        @if ($item->hargaPembayaran && $item->hargaPembayaran->jumlah_koin > 0)
                                            {{ $item->hargaPembayaran->jumlah_koin }} Koin
                                        @else
                                            Rp. {{ number_format($item->hargaPembayaran->harga ?? 0, 0, ',', '.') }}
                                        @endif
                                    </td>
                                    <td class="px-4 py-2 text-center">
                                        @if ($item->bukti)
                                            <button class="text-orange-600 hover:underline"
                                                @click="detail = { bukti: '{{ asset('storage/' . $item->bukti) }}', id: {{ $item->id }} }; openBukti = true;">
                                                <i class="ph ph-images-square text-4xl"></i>
                                            </button>
                                        @else
                                            <span class="text-gray-400">-</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-2 text-center">
                                        <a href="{{ route('finance.detail.catatan.koin') }}"
                                            class="text-orange-600 hover:underline">
                                            <i class="ph ph-file-arrow-up text-4xl"></i>
                                        </a>
                                    </td>
                                    <td
                                        class="px-4 py-2 font-semibold {{ $item->status == 'diterima' ? 'text-green-600' : 'text-red-500' }}">
                                        {{ ucfirst($item->status) }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-4 py-4 text-center text-gray-500">Tidak ada catatan tunai.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- ======================= --}}
            {{-- TABEL RIWAYAT KOIN --}}
            {{-- ======================= --}}
            <div class="mb-8">
                <h2 class="text-lg font-semibold mb-2">Riwayat Koin</h2>
                <div class="rounded-2xl overflow-hidden border shadow-md">
                    <table class="w-full text-sm">
                        <thead>

                            <tr class="bg-orange-500 text-white">
                                <th class="px-4 py-2 text-left">No</th>
                                <th class="px-4 py-2 text-left">No. Referensi</th>
                                <th class="px-4 py-2 text-left">Pesanan</th>
                                <th class="px-4 py-2 text-left">Dari</th>
                                <th class="px-4 py-2 text-left">Sumber Dana</th>
                                <th class="px-4 py-2 text-left">Total</th>
                                <th class="px-4 py-2 text-left">Tanggal</th>
                                <th class="px-4 py-2 text-center">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($catatanKoin as $item)
                                <tr class="border-b border-gray-300">
                                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-2">{{ $item->no_referensi ?? '-' }}</td>
                                    <td class="px-4 py-2">{{ $item->pesanan ?? '-' }}</td>
                                    <td class="px-4 py-2">{{ $item->user->pelamar->nama_pelamar ?? $item->user->username }}
                                    </td>
                                    <td class="px-4 py-2">{{ $item->sumber_dana ?? '-' }}</td>
                                    <td class="px-4 py-2">{{ $item->total ?? 0 }} Koin</td>
                                    <td class="px-4 py-2">{{ $item->created_at->format('d M Y H:i') }}</td>
                                    <td class="px-4 py-2 text-center">
                                        <a href="{{ route('finance.detail.catatan.koin') }}"
                                            class="text-orange-600 hover:underline">
                                            <i class="ph ph-file-arrow-up text-4xl"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-4 py-4 text-center text-gray-500">Tidak ada catatan koin.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Modal Bukti tetap sama --}}
            <div x-show="openBukti" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
                x-transition>
                <div class="bg-white rounded-2xl shadow-lg p-6 w-1/2">
                    <h2 class="text-lg font-semibold mb-4">Bukti Pembayaran</h2>
                    <div class="flex justify-center">
                        <img :src="detail.bukti" alt="Bukti Pembayaran" class="rounded-lg max-h-[500px]">
                    </div>
                    <div class="mt-6 flex justify-between items-center">
                        <form :action="`{{ url('finance/verifikasi') }}/${detail.id}`" method="POST" class="flex gap-3">
                            @csrf
                            <button type="submit" name="action" value="terima"
                                class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg">
                                Terima
                            </button>
                            <button type="submit" name="action" value="tolak"
                                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg">
                                Tolak
                            </button>
                        </form>
                        <button @click="openBukti = false" class="bg-gray-300 px-4 py-2 rounded-lg">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="//unpkg.com/alpinejs" defer></script>
@endsection
