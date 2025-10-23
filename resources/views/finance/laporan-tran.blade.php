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
                <div x-data="{ open: false }" class="relative inline-block text-left">
                    <button @click="open = !open"
                        class="bg-orange-500 text-white font-semibold px-3 py-1.5 rounded-t-md w-40 flex items-center justify-between">
                        {{-- Tampilkan nama bulan yang dipilih --}}
                        <span>
                            {{ $bulanList[$bulan] ?? 'Periode' }}
                        </span>

                        {{-- Panah atas/bawah --}}
                        <span>
                            <template x-if="!open">▼</template>
                            <template x-if="open">▲</template>
                        </span>
                    </button>

                    {{-- Dropdown --}}
                    <div x-show="open" @click.outside="open = false"
                        class="absolute left-0 mt-1 w-40 bg-white shadow-lg rounded-b-md overflow-hidden z-10">
                        @foreach ($bulanList as $key => $nama)
                            <a href="{{ route('finance.laporan', ['bulan' => $key]) }}"
                                class="block px-4 py-2 text-gray-900 hover:bg-orange-500 hover:text-white 
                {{ $bulan == $key ? 'bg-orange-500 text-white' : '' }}">
                                {{ $nama }}
                            </a>
                        @endforeach
                    </div>
                </div>


            </div>

            {{-- Tabel --}}
            <div class="rounded-2xl overflow-hidden border">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-orange-500 text-white">
                            <th class="px-4 py-2 text-center font-semibold">Tanggal</th>
                            {{-- <th class="px-4 py-2 text-center font-semibold">Jenis Transaksi</th> --}}
                            <th class="px-4 py-2 text-center font-semibold">Penghasilan</th>
                            <th class="px-4 py-2 text-center font-semibold">Koin</th>
                            <th class="px-4 py-2 text-center font-semibold">Total Transaksi</th>
                            <th class="px-4 py-2 text-center font-semibold">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($laporan as $l)
                            <tr class="text-center border-b font-medium">
                                <td class="px-4 py-2">{{ \Carbon\Carbon::parse($l->tanggal)->translatedFormat('d F Y') }}
                                </td>
                                {{-- <td class="px-4 py-2">{{ ucfirst($transaksi->jenis) }}</td> --}}
                                <td class="px-4 py-2">Rp{{ number_format($l->total_penghasilan, 0, ',', '.') }}</td>
                                <td class="px-4 py-2">{{ $l->total_koin }}</td>
                                <td class="px-4 py-2">{{ $l->total_transaksi }}</td>
                                <td class="px-4 py-2">
                                    <a href="{{ route('finance.laporan.detail', ['tanggal' => $l->tanggal]) }}"
                                        class="text-orange-500 hover:underline"><i class="text-lg ph ph-file"></i></a>
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