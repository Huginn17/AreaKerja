@extends('admin.sidebar.index')
@section('sidebaradmin')
    <div x-data="{
        openKoinModal: false,
        detailKoin: {
            id: '',
            referensi: '',
            user: '',
            dari: '',
            sumber: '',
            total: '',
            tanggal: ''
        }
    }" class="p-4 sm:ml-64" x-cloak>

        <!-- Header -->
        <header class="w-full flex items-center justify-between" x-cloak>
            <h1 class="text-2xl font-medium">Data Transaksi Koin</h1>
            <div class="flex items-center gap-3">
                <!-- Profil kanan atas -->
                <div class="flex items-center gap-2 bg-white px-3 py-2 border border-gray-500 shadow-md rounded-2xl">
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
            </div>
        </header>

        <div class="mt-8" x-cloak>
            <div class="flex items-center gap-4 mb-4">
                <!-- Toggle Buttons -->
                <a href="{{ url('/admin/finance') }}"
                    class="{{ request()->is('admin/finance') ? 'bg-gray-500 text-white border-gray-500' : 'bg-white text-gray-500 border-gray-500 hover:bg-gray-500 hover:text-white' }} px-8 py-2 text-md font-medium border-2 rounded-lg transition duration-300">
                    Koin</a>

                <a href="{{ url('/admin/finance/tunai') }}"
                    class="{{ request()->is('admin/finance/tunai') ? 'bg-gray-500 text-white border-gray-500' : 'bg-white text-gray-500 border-gray-500 hover:bg-gray-500 hover:text-white' }} px-8 py-2 text-md font-medium border-2 rounded-lg transition duration-300">
                    Tunai</a>

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

            <!-- Table -->
            <div id="table_koin" class="rounded-2xl border border-gray-400 overflow-hidden" x-cloak>
                <table class="w-full text-sm text-left">
                    <thead class="bg-white">
                        <tr class="text-center">
                            <th class="p-7 font-semibold">No</th>
                            <th class="p-7 font-semibold">No.Referensi</th>
                            <th class="p-7 font-semibold">Jenis</th>
                            <th class="p-7 font-semibold">Dari</th>
                            <th class="p-7 font-semibold">Sumber Dana</th>
                            <th class="p-7 font-semibold">Transaksi Koin</th>
                            <th class="p-7 font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($koin as $index => $item)
                            <tr class="border-b-[2px] border-gray-300 text-center">
                                <td class="px-4 py-2">{{ $index + 1 }}</td>
                                <td class="px-4 py-2">{{ $item->no_referensi ?? '-' }}</td>
                                <td class="px-4 py-2">{{ $item->pesanan ?? '-' }}</td>
                                <td class="px-4 py-2">{{ $item->dari ?? '-' }}</td>
                                <td class="px-4 py-2">{{ $item->sumber_dana ?? '-' }}</td>
                                <td class="px-4 py-2">{{ number_format($item->total, 0, ',', '.') }} Koin</td>
                                <td class="px-4 py-2 text-center">
                                    <button type="button" class="text-blue-600 hover:underline"
                                        @click="
                                            detailKoin = {
                                                id: '{{ $item->id }}',
                                                referensi: '{{ $item->no_referensi ?? '-' }}',
                                                user: '{{ $item->user->username ?? '-' }}',
                                                dari: '{{ $item->dari ?? '-' }}',
                                                sumber: '{{ $item->sumber_dana ?? '-' }}',
                                                total: '{{ number_format($item->total ?? 0, 0, ',', '.') }}',
                                                tanggal: '{{ $item->created_at->format('d M Y H:i') }}'
                                            };
                                            openKoinModal = true;
                                        ">
                                        <i class="ph ph-file-arrow-up text-3xl"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach

                        @if ($koin->isEmpty())
                            <tr>
                                <td colspan="7" class="py-6 text-center text-gray-500">
                                    Belum ada data transaksi koin.
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        {{-- ====================== MODAL DETAIL KOIN ====================== --}}
        <div x-show="openKoinModal" x-cloak
            class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50" x-transition>
            <div class="bg-white rounded-2xl shadow-lg w-[400px] p-6 relative">
                <h2 class="text-xl font-semibold text-center mb-6">Detail Transaksi Koin</h2>

                <div class="text-sm space-y-2">
                    <div class="flex justify-between"><span class="font-semibold">ID Transaksi:</span><span
                            x-text="detailKoin.id"></span></div>
                    <div class="flex justify-between"><span class="font-semibold">No. Referensi:</span><span
                            x-text="detailKoin.referensi"></span></div>
                    <div class="flex justify-between"><span class="font-semibold">Nama Pengguna:</span><span
                            x-text="detailKoin.user"></span></div>
                    <div class="flex justify-between"><span class="font-semibold">Dari:</span><span
                            x-text="detailKoin.dari"></span></div>
                    <div class="flex justify-between"><span class="font-semibold">Sumber Dana:</span><span
                            x-text="detailKoin.sumber"></span></div>
                    <div class="flex justify-between"><span class="font-semibold">Total Koin:</span><span
                            x-text="detailKoin.total + ' Koin'"></span></div>
                    <div class="flex justify-between"><span class="font-semibold">Tanggal:</span><span
                            x-text="detailKoin.tanggal"></span></div>
                </div>

                <div class="flex justify-center mt-8">
                    <img src="{{ asset('images/logoarea.png') }}" alt="Logo" class="w-16">
                </div>

                <div class="mt-6 flex justify-end">
                    <button @click="openKoinModal = false"
                        class="bg-gray-200 px-4 py-2 rounded-lg hover:bg-gray-300">Tutup</button>
                </div>
            </div>
        </div>

        <!-- Alpine.js -->
        <script src="//unpkg.com/alpinejs" defer></script>
    </div>
@endsection
