@extends('finance.sidebar.index')
@section('sidebar')
    <div class="p-4 sm:ml-64">
        <!-- Header -->
        <header class="w-full flex items-center justify-between px-6 py-3">
            <p class="font-bold animate-pulse text-2xl"> Catatan Transaksi </p>
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
                    class="flex items-center justify-between w-96 h-14 bg-white border border-orange-500 shadow-md rounded-2xl px-3 py-2">
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
                            <a href="{{ route('finance.laporan.unduh', ['tanggal' => $tanggal]) }}">
                                <svg width="29" height="28" viewBox="0 0 29 28" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <mask id="mask0_680_18808" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0"
                                        y="0" width="29" height="28">
                                        <rect x="0.890625" y="0.15625" width="27.3438" height="27.3438"
                                            fill="url(#pattern0_680_18808)" />
                                    </mask>
                                    <g mask="url(#mask0_680_18808)">
                                        <rect x="-3.96875" y="-1.66992" width="35.2431" height="31.5972"
                                            fill="#FA6601" />
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
