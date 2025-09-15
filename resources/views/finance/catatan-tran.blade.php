@extends('finance.sidebar.index')
@section('sidebar')
    <div class="p-4 sm:ml-64" x-data="{ openModal: false, detail: {} }" x-cloak>
        <!-- Header -->
        <header class="w-full flex items-center justify-between px-6 py-3">
            <p class="font-semibold text-2xl">Catatan Transaksi</p>
        </header>

        <!-- Riwayat Tunai -->
        <div class="p-4">
            <div class="mb-8">
                <h2 class="text-lg font-semibold mb-2">Riwayat Tunai</h2>
                <div class="rounded-2xl overflow-hidden border">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-orange-500 text-white">
                                <th class="px-4 py-2 text-left">No</th>
                                <th class="px-4 py-2 text-left">No. Refrensi</th>
                                <th class="px-4 py-2 text-left">Jenis</th>
                                <th class="px-4 py-2 text-left">Dari</th>
                                <th class="px-4 py-2 text-left">Sumber Dana</th>
                                <th class="px-4 py-2 text-left">Total Koin</th>
                                <th class="px-4 py-2 text-center">Detail</th>
                                <th class="px-4 py-2 text-left">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksi as $item)
                                <tr class="border-t">
                                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-2">{{ $item->no_referensi }}</td>
                                    <td class="px-4 py-2">{{ $item->pesanan ?? '-' }}</td>
                                    <td class="px-4 py-2">{{ $item->user->username ?? '-' }}</td>
                                    <td class="px-4 py-2">{{ $item->sumberDana ?? 'Koin AreaKerja' }}</td>
                                    <td class="px-4 py-2">{{ $item->hargaPembayaran->jumlah_koin ?? 0 }} Koin</td>
                                    <td class="px-4 py-2 text-center">
                                        <button class="text-orange-600 hover:underline"
                                            @click="
                                        detail = {
                                            id: {{ $item->id }},
                                            user: '{{ $item->user->name ?? '-' }}',
                                            email: '{{ $item->user->email ?? '-' }}',
                                            bank: '{{ $item->bank->nama_bank ?? '-' }}',
                                            rekening: '{{ $item->bank->nomor_rekening ?? '-' }}',
                                            harga: '{{ number_format($item->hargaPembayaran->harga ?? 0, 0, ',', '.') }}',
                                            koin: '{{ $item->hargaPembayaran->jumlah_koin ?? 0 }}',
                                            status: '{{ ucfirst($item->status) }}',
                                            tanggal: '{{ $item->created_at->format('d M Y H:i') }}'
                                        };
                                        openModal = true;
                                    ">
                                            Detail
                                        </button>
                                    </td>
                                    <td
                                        class="px-4 py-2 {{ $item->status == 'diterima' ? 'text-green-600' : 'text-red-500' }} font-semibold">
                                        {{ ucfirst($item->status) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Modal Detail -->
                <div x-show="openModal" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50"
                    x-transition>
                    <div class="bg-white rounded-2xl shadow-lg w-1/3 p-6">
                        <h2 class="text-lg font-semibold mb-4">Detail Transaksi</h2>
                        <div class="space-y-2 text-sm">
                            <p><span class="font-semibold">User:</span> <span x-text="detail.user"></span></p>
                            <p><span class="font-semibold">Email:</span> <span x-text="detail.email"></span></p>
                            <p><span class="font-semibold">Bank:</span> <span x-text="detail.bank"></span></p>
                            <p><span class="font-semibold">No Rekening:</span> <span x-text="detail.rekening"></span></p>
                            <p><span class="font-semibold">Harga:</span> Rp <span x-text="detail.harga"></span></p>
                            <p><span class="font-semibold">Jumlah Koin:</span> <span x-text="detail.koin"></span></p>
                            <p><span class="font-semibold">Status:</span> <span x-text="detail.status"></span></p>
                            <p><span class="font-semibold">Tanggal:</span> <span x-text="detail.tanggal"></span></p>
                        </div>

                        <div class="mt-6 flex justify-end gap-2">
                            <!-- Form Terima -->
                            <form method="POST" :action="`{{ route('finance.verifikasi', '') }}/${detail.id}`">
                                @csrf
                                <input type="hidden" name="action" value="terima">
                                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg">Terima</button>
                            </form>

                            <!-- Form Tolak -->
                            <form method="POST" :action="`{{ route('finance.verifikasi', '') }}/${detail.id}`">
                                @csrf
                                <input type="hidden" name="action" value="tolak">
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg">Tolak</button>
                            </form>

                            <button @click="openModal = false" class="bg-gray-300 px-4 py-2 rounded-lg">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Alpine.js -->
    <script src="//unpkg.com/alpinejs" defer></script>
@endsection
