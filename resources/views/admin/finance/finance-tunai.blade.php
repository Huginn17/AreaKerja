@extends('admin.sidebar.index')
@section('sidebaradmin')
    <div class="p-4 sm:ml-64" x-data="{
        showDetail: false,
        selected: null
    }">
        <!-- Header -->
        <header class="w-full flex items-center justify-between">
            <h1 class="text-2xl font-medium">Data Transaksi Tunai</h1>
            <div class="flex items-center gap-2">
                <a href="#">
                    @if (Auth::user()->role == 'admin')
                        @if (Auth::user()->admin->img_profile)
                            <img id="pu" class="w-10 h-10  object-cover rounded-full profile-img"
                                src="{{ asset('storage/' . Auth::user()->admin->img_profile) }}" alt="Profile">
                        @else
                            <img id="pu" class="w-10 h-10 rounded-full"
                                src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                                alt="">
                        @endif
                    @else
                        <img class="w-10 h-10 rounded-full"
                            src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                            alt="">
                    @endif
                </a>
                <div class="text-sm mr-14">
                    <span class="font-semibold">{{ Auth::user()->username }}</span>
                    <p class="text-gray-500 text-sm">{{ Auth::user()->email }}</p>
                </div>
            </div>
        </header>

        <!-- Filter dan tombol -->
        <div class="mt-8">
            <div class="flex items-center gap-4 mb-4">
                <a href="{{ url('/admin/finance') }}"
                    class="px-8 py-2 rounded-lg border-2 {{ request()->is('admin/finance') ? 'bg-white text-gray-500 border-gray-500' : 'bg-white text-gray-500 border-gray-300 hover:bg-gray-100' }}">Koin</a>

                <a href="{{ url('/admin/finance/tunai') }}"
                    class="px-8 py-2 rounded-lg border-2 {{ request()->is('admin/finance/tunai') ? 'bg-gray-500 text-white border-gray-500' : 'bg-white text-gray-500 border-gray-500 hover:bg-gray-600 hover:text-white' }}">Tunai</a>

                <!-- Filter No Referensi -->
                <form method="GET" class="flex items-center gap-3 ml-auto" x-cloak>
                    <div class="flex items-center border-2 overflow-hidden rounded-lg border-gray-400">
                        <select name="no_referensi" class="px-8 py-2 text-sm focus:outline-none">
                            <option value="">Semua No. Referensi</option>
                            @foreach ($noReferensiList as $ref)
                                <option value="{{ $ref }}" {{ $selectedRef == $ref ? 'selected' : '' }}>
                                    {{ $ref }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit"
                        class="px-6 py-2 rounded-lg border border-gray-600 text-white bg-gray-500 hover:bg-gray-600">
                        Cari
                    </button>
                </form>
            </div>

            <!-- Tabel -->
            <div id="table_cash" class="rounded-2xl border-2 border-gray-400 overflow-hidden">
                <table class="w-full text-sm text-left">
                    <thead class="bg-white">
                        <tr class="text-center">
                            <th class="p-7 font-semibold">No</th>
                            <th class="p-7 font-semibold">No. Referensi</th>
                            <th class="p-7 font-semibold">Pesanan</th>
                            <th class="p-7 font-semibold">Dari</th>
                            <th class="p-7 font-semibold">Sumber Dana</th>
                            <th class="p-7 font-semibold">Total</th>
                            <th class="p-7 font-semibold">Status</th>
                            <th class="p-7 font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cash as $index => $item)
                            <tr class="border-b-[2px] border-gray-300 text-center">
                                <td class="py-2">{{ $index + 1 }}</td>
                                <td class="py-2">{{ $item->no_referensi ?? '-' }}</td>
                                <td class="py-2">{{ $item->pesanan ?? '-' }}</td>
                                <td class="py-2">{{ $item->dari ?? '-' }}</td>
                                <td class="py-2">{{ $item->sumberDana ?? '-' }}</td>
                                <td class="py-2">{{ number_format($item->total, 0, ',', '.') }}</td>
                                <td
                                    class="py-2 font-medium 
                                    @if ($item->status === 'pending') text-yellow-500
                                    @elseif($item->status === 'diterima') text-green-600
                                    @elseif($item->status === 'ditolak') text-red-600
                                    @else text-gray-600 @endif">
                                    {{ ucfirst($item->status) }}
                                </td>
                                <td class="py-2">
                                    <button @click="selected = {{ Js::from($item) }}; showDetail = true"
                                        class="text-blue-600 hover:text-blue-800">
                                        <i class="ph ph-file-arrow-up text-2xl"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- ====================== MODAL DETAIL CASH ====================== -->
            <div x-show="showDetail" x-cloak
                class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50" x-transition>
                <div class="bg-white rounded-2xl shadow-lg w-[400px] p-6 relative">
                    <!-- Judul -->
                    <h2 class="text-xl font-semibold text-center mb-6"
                        x-text="
                            selected?.status?.toLowerCase() === 'diterima' 
                                ? 'Top Up Berhasil' 
                                : (selected?.status?.toLowerCase() === 'ditolak' 
                                    ? 'Top Up Ditolak' 
                                    : 'Menunggu Verifikasi')
                        ">
                    </h2>

                    <!-- Icon -->
                    <div class="flex justify-center mb-6">
                        <template x-if="selected?.status?.toLowerCase() === 'diterima'">
                            <div class="w-16 h-16 rounded-full bg-orange-100 flex items-center justify-center">
                                <svg class="w-8 h-8 text-orange-500" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                        </template>

                        <template x-if="selected?.status?.toLowerCase() === 'ditolak'">
                            <div class="w-16 h-16 rounded-full bg-red-100 flex items-center justify-center">
                                <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </div>
                        </template>

                        <template x-if="selected?.status?.toLowerCase() === 'pending'">
                            <div class="w-16 h-16 rounded-full bg-gray-100 flex items-center justify-center">
                                <svg class="w-8 h-8 text-gray-500 animate-spin" fill="none" stroke="currentColor"
                                    stroke-width="2" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z">
                                    </path>
                                </svg>
                            </div>
                        </template>
                    </div>

                    <!-- Detail Transaksi -->
                    <div class="text-sm space-y-2">
                        <div class="flex justify-between">
                            <span class="font-semibold">No. Transaksi</span>
                            <span x-text="selected?.id"></span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="font-semibold">Status</span>
                            <span
                                :class="selected?.status?.toLowerCase() === 'diterima' ? 'bg-orange-500' :
                                    (selected?.status?.toLowerCase() === 'ditolak' ? 'bg-red-500' : 'bg-gray-500')"
                                class="text-white text-xs px-3 py-1 rounded-full" x-text="selected?.status"></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="font-semibold">Nama Pengirim</span>
                            <span x-text="selected?.user?.username ?? '-'"></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="font-semibold">Nama Penerima</span>
                            <span>Area Kerja</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="font-semibold">Metode Pembayaran</span>
                            <span x-text="selected?.sumberDana ?? '-'"></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="font-semibold">Tgl/Waktu</span>
                            <span x-text="new Date(selected?.created_at).toLocaleString('id-ID')"></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="font-semibold">Nominal</span>
                            <span>Rp <span x-text="Number(selected?.total).toLocaleString('id-ID')"></span></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="font-semibold">Biaya Admin</span>
                            <span>Rp 2.500</span>
                        </div>

                        <div class="border-t border-dashed my-2"></div>

                        <div class="flex justify-between font-semibold">
                            <span>Total Pembayaran</span>
                            <span>Rp <span
                                    x-text="(Number(selected?.total ?? 0) + 2500).toLocaleString('id-ID')"></span></span>
                        </div>
                    </div>

                    <div class="flex justify-center mt-8">
                        <img src="{{ asset('images/logoarea.png') }}" alt="Logo" class="w-16">
                    </div>

                    <div class="mt-6 flex justify-end">
                        <button @click="showDetail = false"
                            class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-lg">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    </div>
@endsection
