@extends('finance.sidebar.index')
@section('sidebar')
    <div class="p-4 sm:ml-64">

        <!-- Header -->
        <header class="w-full flex items-center justify-between px-6 py-3">
            <p class="font-semibold text-2xl">Catatan Transaksi</p>
        </header>

        <!-- Deskripsi -->
        <div class="ml-[24px] mb-6">
            <h4 class="font-semibold text-lg">Laporan Transaksi Penghasilan</h4>
            <p class="text-sm mt-3">
                Hanya catatan transaksi dalam 12 bulan terakhir akan dipertahankan. Silahkan download
                salinan PDF anda
            </p>
        </div>

        {{-- Filter Periode --}}
        <div class="p-4">
            <div class="flex justify-end mb-3">
                <form method="GET" action="{{ route('finance.laporan') }}">
                    <select name="periode"
                        class="border border-orange-500 rounded-lg px-2 py-2 text-sm text-orange-500 hover:bg-orange-500 hover:text-white"
                        onchange="this.form.submit()">
                        <option value="">Pilih Periode</option>
                        <option value="1" {{ request('periode') == '1' ? 'selected' : '' }}>1 Bulan Terakhir</option>
                        <option value="3" {{ request('periode') == '3' ? 'selected' : '' }}>3 Bulan Terakhir</option>
                        <option value="12" {{ request('periode') == '12' ? 'selected' : '' }}>12 Bulan Terakhir</option>
                    </select>
                </form>
            </div>

            {{-- Tabel --}}
            <div class="rounded-2xl overflow-hidden border">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-orange-500 text-white">
                            <th class="px-4 py-2 text-center font-semibold">Tanggal</th>
                            <th class="px-4 py-2 text-center font-semibold">Jenis Transaksi</th>
                            <th class="px-4 py-2 text-center font-semibold">Nominal</th>
                            <th class="px-4 py-2 text-center font-semibold">Koin</th>
                            <th class="px-4 py-2 text-center font-semibold">Status</th>
                            <th class="px-4 py-2 text-center font-semibold">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transaksis as $transaksi)
                            <tr class="text-center border-b font-medium">
                                <td class="px-4 py-2">{{ $transaksi->created_at->format('d M Y') }}</td>
                                <td class="px-4 py-2">{{ ucfirst($transaksi->jenis) }}</td>
                                <td class="px-4 py-2">Rp. {{ number_format($transaksi->nominal, 0, ',', '.') }}</td>
                                <td class="px-4 py-2">{{ $transaksi->hargaPembayaran->jumlah_koin ?? '-' }}</td>
                                <td class="px-4 py-2">
                                    @if ($transaksi->status == 'menunggu_verifikasi')
                                        <span class="px-3 py-1 text-xs rounded bg-yellow-100 text-yellow-700">
                                            Menunggu Verifikasi
                                        </span>
                                    @elseif ($transaksi->status == 'diterima')
                                        <span class="px-3 py-1 text-xs rounded bg-green-100 text-green-700">
                                            Diterima
                                        </span>
                                    @elseif ($transaksi->status == 'ditolak')
                                        <span class="px-3 py-1 text-xs rounded bg-red-100 text-red-700">
                                            Ditolak
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-2">
                                    <a href="{{ route('finance.transaksi.show', $transaksi->id) }}"
                                        class="text-orange-500 hover:underline">Lihat</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-gray-500">
                                    Tidak ada transaksi
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
