<!-- Index Catatan Transaksi -->
@extends('finance.sidebar.index')
@section('sidebar')
    <div class="p-4 sm:ml-64" x-data="{ openBukti: false, detail: {} }" x-cloak>
        <header class="w-full flex items-center justify-between px-6 py-3">
            <p class="font-semibold text-2xl">Catatan Transaksi</p>
        </header>

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
                                <th class="px-4 py-2 text-center">Bukti</th>
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

                                    <!-- Tombol Bukti -->
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


                                    <!-- Tombol Detail: link ke halaman detail semua -->
                                    <td class="px-4 py-2 text-center">
                                        <a href="{{ route('finance.detail.catatan.koin') }}"
                                            class="text-orange-600 hover:underline">
                                            <i class="ph ph-file-arrow-up text-4xl"></i>
                                        </a>
                                    </td>

                                    <!-- Status -->
                                    <td
                                        class="px-4 py-2 {{ $item->status == 'diterima' ? 'text-green-600' : 'text-red-500' }} font-semibold">
                                        {{ ucfirst($item->status) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Modal Bukti -->
                <div x-show="openBukti" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
                    x-transition>
                    <div class="bg-white rounded-2xl shadow-lg p-6 w-1/2">
                        <h2 class="text-lg font-semibold mb-4">Bukti Pembayaran</h2>

                        <!-- Foto Bukti -->
                        <div class="flex justify-center">
                            <img :src="detail.bukti" alt="Bukti Pembayaran" class="rounded-lg max-h-[500px]">
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="mt-6 flex justify-between items-center">
                            <form :action="`{{ url('finance/verifikasi') }}/${detail.id}`" method="POST"
                                class="flex gap-3">
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
    </div>
    <script src="//unpkg.com/alpinejs" defer></script>
@endsection
