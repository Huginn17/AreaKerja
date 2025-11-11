@extends('super_admin.sidebar.index')
@section('sidebarsuperadmin')
    <div class="p-4 sm:ml-64">
        <div class="shadow-md rounded-xl p-6">
            {{-- header --}}
            <div class="flex justify-between items-start">
                {{-- logo alamat --}}
                <div class="font-semibold">
                    <div class="flex items-center space-x-2">
                        <img src="{{ asset('images/logoarea.png') }}" class="w-12 h-12" alt="">
                        <span class="text-orange-500 font-bold text-xl">areakerja.com</span>
                    </div>
                    <p class="text-sm text-gray-600 mt-1 leading-snug">
                        Jl. Laksda Adisucipto No.80, Ambarrukmo, Caturtunggal, Kec.<br>
                        Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281
                    </p>
                </div>
                {{-- info user --}}
                <div class="text-sm text-gray-700 text-right font-semibold">
                    <div class="flex justify-end space-x-3 mt-2 text-orange-500 text-lg">
                        <span><svg width="28" height="28" viewBox="0 0 28 28" fill="none"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <mask id="mask0_680_18811" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0"
                                    width="28" height="28">
                                    <rect x="0.367188" y="0.15625" width="27.3438" height="27.3438"
                                        fill="url(#pattern0_680_18811)" />
                                </mask>
                                <g mask="url(#mask0_680_18811)">
                                    <rect x="-6.92188" y="-4.0957" width="39.4965" height="34.0278" fill="#FA6601" />
                                </g>
                                <defs>
                                    <pattern id="pattern0_680_18811" patternContentUnits="objectBoundingBox" width="1"
                                        height="1">
                                        <use xlink:href="#image0_680_18811" transform="scale(0.0078125)" />
                                    </pattern>
                                    <image id="image0_680_18811" width="128" height="128" preserveAspectRatio="none"
                                        xlink:href="data:image/png;base64,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" />
                                </defs>
                            </svg>
                        </span>
                        <span>
                            <a href="{{ route('superadmin.laporan.unduh', ['tanggal' => $tanggal]) }}"> 
                                <svg width="29" height="28" viewBox="0 0 29 28" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <mask id="mask0_680_18808" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0"
                                        y="0" width="29" height="28">
                                        <rect x="0.890625" y="0.15625" width="27.3438" height="27.3438"
                                            fill="url(#pattern0_680_18808)" />
                                    </mask>
                                    <g mask="url(#mask0_680_18808)">
                                        <rect x="-3.96875" y="-1.66992" width="35.2431" height="31.5972" fill="#FA6601" />
                                    </g>
                                    <defs>
                                        <pattern id="pattern0_680_18808" patternContentUnits="objectBoundingBox"
                                            width="1" height="1">
                                            <use xlink:href="#image0_680_18808" transform="scale(0.0078125)" />
                                        </pattern>
                                        <image id="image0_680_18808" width="128" height="128"
                                            preserveAspectRatio="none"
                                            xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIAAAACACAYAAADDPmHLAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAACxQAAAsUBidZ/7wAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAJ2SURBVHic7d1NaiphEEbh6iwpa8nsbiqZZa8JJINLQxDE/vmq6rPPOdAzpbXfR8WBuASrn423W1IfxUS9dD8A600A8AQATwDwBABPAPAEAE8A8AQATwDwBABPAPAEAE8A8AQATwDwBABPAPAEAE8A8AQATwDwBABPAPAEAE8A8AQATwDwBABPAPAEAE8A8AQATwDwBABPAPAEAE8A8AQATwDwBABPAPAEAE8A8AQATwDwBABPAPAEAE8A8AQATwDwBABPAPAEAE8A8AQATwDwBABPAPAEAG8GAK8B+rfuPy3x/7mje4uIr4j4jBoEPxuP7JaI+IiI74j4V3C+KVvHXy96BYIZAKzjr+dCIrgdvwpBN4Db8ZEI7o1fgaATwL3xUQgejZ+NoAvAo/ERCLaOn4mgA8DW8S+N4DX2jb8eHzEWQTWAveOvx1dc7CviEhHvsf9CjH4nqARwdPzMj8DWZkBQBcDx79SNoAKA4z+oE0E2AMffWBeCTACOv7MOBFkAHP9g1QgyADj+ySoRjAbg+IOqQjASgOMPrgLBKACOn1Q2ghEAHD+5TARnATh+UVkIzgBw/OIyEBwF4PhNjUZwBIDjNzcSwV4Ajj9JoxDsAeD4kzUCwdbbO/6knRlmz/3OnMPxkzvzTpB5+MovbDYEjt/QLAgcv7FuBI4/QV0IHH+iqhE4/oRVIXD8ictG4PhPUBYCx3+iRiNw/CdsFALHf+LOInD8C3QUgeNfqL0IHP+CbUXg+BfuEQLHB3QPgeODukXg+MBWBI4PbgnHNzMzMzMzMzMzQutPpg3aDH8caY0JAJ4A4AkAngDgCQCeAOAJAJ4A4P0COZz3WnwdFnYAAAAASUVORK5CYII=" />
                                    </defs>
                                </svg>
                            </a>
                        </span>
                    </div><br>
                    <div class="text-sm leading-relaxed space-y-1">
                        <p>
                            <span class="font-semibold">Username :</span>
                            <span class="font-medium">{{ Auth::user()->username ?? '-' }}</span>
                        </p>
                        <p>
                            <span class="font-semibold">Email :</span>
                            <span>{{ Auth::user()->email ?? '-' }}</span>
                        </p>
                        <p>
                            <span class="font-semibold">No. Telp :</span>
                            <span>0816-3428-25322</span>
                        </p>
                    </div>

                </div>
            </div>


            {{-- riwayat transaksi --}}
            <div class="mt-10">
                <div class="flex justify-between items-center mb-3">
                    <h2 class="font-semibold text-lg ">Laporan Transaksi Penghasilan</h2>
                </div> 
                <!-- Table -->
                <div class="overflow-hidden border border-gray-200 rounded-xl">
                    <table class="w-full text-sm border-collapse">
                        <thead>
                            <tr class="bg-orange-500 text-white text-left">
                                <th class="py-2 px-3">Transaksi</th>
                                <th class="py-2 px-3">Dari</th>
                                <th class="py-2 px-3">Jenis Transaksi</th>
                                <th class="py-2 px-3">Sumber Dana</th>
                                <th class="py-2 px-3">Nominal IDR</th>
                                <th class="py-2 px-3">Transaksi Koin</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-t">
                                @forelse ($transaksi as $t)
                                    <td class="px-3 py-2">{{ $t->no_referensi ?? '-' }}</td>
                                    <td class="px-3 py-2">{{ $t->dari ?? '-' }}</td>
                                    <td class="px-3 py-2">{{ $t->pesanan ?? '-' }}</td>
                                    <td class="px-3 py-2">{{ $t->sumber_dana ?? ($t->sumberDana ?? '-') }}</td>
                                    <td class="px-3 py-2">
                                        @if ($t->tipe == 'cash')
                                            Rp{{ number_format($t->total, 0, ',', '.') }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="px-3 py-2 text-center">
                                        @if ($t->tipe == 'koin')
                                            {{ $t->total_koin }} Koin
                                        @else
                                            -
                                        @endif
                                    </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-gray-500">
                                    Tidak ada transaksi pada tanggal ini
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- footer --}}
            <div class="mt-4 text-sm text-gray-800 font-semibold">
                <p>Total Tunai <span class="ml-14">: Rp{{ number_format($totalCash, 0, ',', '.') }}</span></p>
                <p>Total Koin <span class="ml-[65px]">: {{ $totalKoin }} Koin</span></p>
            </div>
        </div>
    </div>
@endsection
