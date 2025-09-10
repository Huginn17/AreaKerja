@extends('finance.sidebar.index')
@section('sidebar')
    <div class="p-4 sm:ml-64">
        <!-- Header -->
        <header class="w-full flex items-center justify-between px-6 py-3">
            <p class="font-bold animate-pulse text-2xl"> Catatan Transaksi </p>
            <div class="flex items-center gap-3">
                <!-- Notifikasi -->
                <button class="relative">
                    <span class="absolute top-0 right-0 block w-2 h-2 bg-red-500 rounded-full"></span>
                    <svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_680_18579)">
                            <path
                                d="M23.076 14.9416L22.6747 12.7368L21.1101 13.0041L21.5756 15.5619C21.6168 15.788 21.7387 15.9907 21.9146 16.1255L24.4524 18.0718L24.6985 19.424L7.4876 22.3639L7.24147 21.0117L8.93911 18.3419C9.05673 18.157 9.09972 17.9261 9.05861 17.7L8.43786 14.2896C8.21777 13.0919 8.29153 11.8654 8.65169 10.7337C9.01186 9.60207 9.64569 8.60544 10.4892 7.84449C11.3326 7.08353 12.3559 6.58519 13.4555 6.39979C14.5552 6.21439 15.6924 6.3485 16.7522 6.78858L16.4051 4.88131C15.595 4.64916 14.7612 4.55542 13.9346 4.60354L13.6165 2.85571L12.0518 3.12297L12.37 4.8708C10.4802 5.41421 8.87215 6.7053 7.85685 8.49441C6.84155 10.2835 6.49109 12.4436 6.87324 14.5569L7.42973 17.6143L5.7321 20.284C5.61447 20.4689 5.57149 20.6999 5.6126 20.926L6.07815 23.4838C6.11931 23.7099 6.24121 23.9127 6.41702 24.0475C6.59284 24.1823 6.80817 24.2382 7.01565 24.2027L12.4919 23.2673L12.647 24.1199C12.8528 25.2505 13.4623 26.2644 14.3414 26.9386C15.2205 27.6128 16.2971 27.892 17.3345 27.7147C18.3719 27.5375 19.2851 26.9185 19.8732 25.9937C20.4612 25.0689 20.676 23.9142 20.4702 22.7836L20.315 21.931L25.7912 20.9956C25.9987 20.9601 26.1813 20.8363 26.2989 20.6513C26.4165 20.4664 26.4595 20.2354 26.4183 20.0093L25.9528 17.4515C25.9116 17.2254 25.7896 17.0227 25.6138 16.8879L23.076 14.9416ZM18.9055 23.0508C19.029 23.7292 18.9002 24.422 18.5473 24.9769C18.1945 25.5318 17.6466 25.9032 17.0242 26.0095C16.4017 26.1159 15.7557 25.9484 15.2283 25.5439C14.7008 25.1394 14.3351 24.531 14.2117 23.8526L14.0565 23L18.7504 22.1982L18.9055 23.0508Z"
                                fill="black" />
                            <path
                                d="M22.3629 11.0324C24.0912 10.7372 25.2143 8.97095 24.8714 7.08743C24.5286 5.20392 22.8497 3.91635 21.1214 4.21156C19.3932 4.50678 18.2701 6.27298 18.6129 8.15649C18.9558 10.04 20.6347 11.3276 22.3629 11.0324Z"
                                fill="black" />
                            <ellipse cx="21.3453" cy="5.12912" rx="6.35506" ry="6.15646" fill="#E46054" />
                        </g>
                        <path d="M22.8299 3.49956L20.917 8H19.8345L21.7696 3.61819H19.3452V2.72106H22.8299V3.49956Z"
                            fill="white" />
                        <defs>
                            <clipPath id="clip0_680_18579">
                                <rect width="25.3967" height="27.7315" fill="white"
                                    transform="matrix(0.985722 -0.168378 0.179073 0.983836 0.162109 4.27539)" />
                            </clipPath>
                        </defs>
                    </svg>

                </button>
                <!-- Profil -->
                <div class="flex items-center border-orange-500  border rounded-lg shadow px-3 scroll-py-5">
                    <img src="{{ asset('images/seven.png') }}" alt="Logo" class="w-12 h-12   rounded-full" />
                    <div class="text-sm">
                        <p class="font-semibold">Seven Inc</p>
                        <p class="text-xs text-gray-500">financeseven@gmail.com</p>
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
                        <span><svg width="29" height="28" viewBox="0 0 29 28" fill="none"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <mask id="mask0_680_18808" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0"
                                    width="29" height="28">
                                    <rect x="0.890625" y="0.15625" width="27.3438" height="27.3438"
                                        fill="url(#pattern0_680_18808)" />
                                </mask>
                                <g mask="url(#mask0_680_18808)">
                                    <rect x="-3.96875" y="-1.66992" width="35.2431" height="31.5972" fill="#FA6601" />
                                </g>
                                <defs>
                                    <pattern id="pattern0_680_18808" patternContentUnits="objectBoundingBox" width="1"
                                        height="1">
                                        <use xlink:href="#image0_680_18808" transform="scale(0.0078125)" />
                                    </pattern>
                                    <image id="image0_680_18808" width="128" height="128" preserveAspectRatio="none"
                                        xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIAAAACACAYAAADDPmHLAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAACxQAAAsUBidZ/7wAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAJ2SURBVHic7d1NaiphEEbh6iwpa8nsbiqZZa8JJINLQxDE/vmq6rPPOdAzpbXfR8WBuASrn423W1IfxUS9dD8A600A8AQATwDwBABPAPAEAE8A8AQATwDwBABPAPAEAE8A8AQATwDwBABPAPAEAE8A8AQATwDwBABPAPAEAE8A8AQATwDwBABPAPAEAE8A8AQATwDwBABPAPAEAE8A8AQATwDwBABPAPAEAE8A8AQATwDwBABPAPAEAE8A8AQATwDwBABPAPAEAE8A8AQATwDwBABPAPAEAG8GAK8B+rfuPy3x/7mje4uIr4j4jBoEPxuP7JaI+IiI74j4V3C+KVvHXy96BYIZAKzjr+dCIrgdvwpBN4Db8ZEI7o1fgaATwL3xUQgejZ+NoAvAo/ERCLaOn4mgA8DW8S+N4DX2jb8eHzEWQTWAveOvx1dc7CviEhHvsf9CjH4nqARwdPzMj8DWZkBQBcDx79SNoAKA4z+oE0E2AMffWBeCTACOv7MOBFkAHP9g1QgyADj+ySoRjAbg+IOqQjASgOMPrgLBKACOn1Q2ghEAHD+5TARnATh+UVkIzgBw/OIyEBwF4PhNjUZwBIDjNzcSwV4Ajj9JoxDsAeD4kzUCwdbbO/6knRlmz/3OnMPxkzvzTpB5+MovbDYEjt/QLAgcv7FuBI4/QV0IHH+iqhE4/oRVIXD8ictG4PhPUBYCx3+iRiNw/CdsFALHf+LOInD8C3QUgeNfqL0IHP+CbUXg+BfuEQLHB3QPgeODukXg+MBWBI4PbgnHNzMzMzMzMzMzQutPpg3aDH8caY0JAJ4A4AkAngDgCQCeAOAJAJ4A4P0COZz3WnwdFnYAAAAASUVORK5CYII=" />
                                </defs>
                            </svg>
                        </span>
                    </div><br>
                    <p class="pr-[103px]">Username : <span class="font-medium">Finance</span></p>
                    <p>Email : finance.group@gmail.com</p>
                    <p class="pr-[70px]">No.Telp : 0816342825322</p>
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
                                <th class="py-2 px-3">Perusahaan</th>
                                <th class="py-2 px-3">Jenis Transaksi</th>
                                <th class="py-2 px-3">Sumber Dana</th>
                                <th class="py-2 px-3">Nominal IDR</th>
                                <th class="py-2 px-3">Transaksi Koin</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-t">
                                <td class="px-3 py-2">691174849221</td>
                                <td class="px-3 py-2">Applecorp.</td>
                                <td class="px-3 py-2">Pasang Lowongan</td>
                                <td class="px-3 py-2">BCA</td>
                                <td class="px-3 py-2">Rp. 1.000.000</td>
                                <td class="px-3 py-2 text-center">-</td>
                            </tr>
                            <tr class="border-t">
                                <td class="px-3 py-2">691174849221</td>
                                <td class="px-3 py-2">Applecorp.</td>
                                <td class="px-3 py-2">Pasang Lowongan</td>
                                <td class="px-3 py-2">BCA</td>
                                <td class="px-3 py-2">Rp. 1.000.000</td>
                                <td class="px-3 py-2 text-center">-</td>
                            </tr>
                            <tr class="border-t">
                                <td class="px-3 py-2">691174849221</td>
                                <td class="px-3 py-2">Applecorp.</td>
                                <td class="px-3 py-2">Pasang Lowongan</td>
                                <td class="px-3 py-2">BCA</td>
                                <td class="px-3 py-2">Rp. 1.000.000</td>
                                <td class="px-3 py-2 text-center">-</td>
                            </tr>
                            <tr class="border-t">
                                <td class="px-3 py-2">691174849221</td>
                                <td class="px-3 py-2">Applecorp.</td>
                                <td class="px-3 py-2">Pasang Lowongan</td>
                                <td class="px-3 py-2">BCA</td>
                                <td class="px-3 py-2">Rp. 1.000.000</td>
                                <td class="px-3 py-2 text-center">-</td>
                            </tr>
                            <tr class="border-t">
                                <td class="px-3 py-2">691174849221</td>
                                <td class="px-3 py-2">Applecorp.</td>
                                <td class="px-3 py-2">Pasang Lowongan</td>
                                <td class="px-3 py-2">Koin</td>
                                <td class="px-3 py-2">-</td>
                                <td class="px-3 py-2 text-center">30</td>
                            </tr>
                            <tr class="border-t">
                                <td class="px-3 py-2">691174849221</td>
                                <td class="px-3 py-2">Applecorp.</td>
                                <td class="px-3 py-2">Pasang Lowongan</td>
                                <td class="px-3 py-2">Koin</td>
                                <td class="px-3 py-2">-</td>
                                <td class="px-3 py-2 text-center">30</td>
                            </tr>
                            <tr class="border-t">
                                <td class="px-3 py-2">691174849221</td>
                                <td class="px-3 py-2">Applecorp.</td>
                                <td class="px-3 py-2">Pasang Lowongan</td>
                                <td class="px-3 py-2">Koin</td>
                                <td class="px-3 py-2">-</td>
                                <td class="px-3 py-2 text-center">30</td>
                            </tr>
                            <tr class="border-t">
                                <td class="px-3 py-2">691174849221</td>
                                <td class="px-3 py-2">Applecorp.</td>
                                <td class="px-3 py-2">Pasang Lowongan</td>
                                <td class="px-3 py-2">Koin</td>
                                <td class="px-3 py-2">-</td>
                                <td class="px-3 py-2 text-center">30</td>
                            </tr>
                            <tr class="border-t">
                                <td class="px-3 py-2">691174849221</td>
                                <td class="px-3 py-2">Applecorp.</td>
                                <td class="px-3 py-2">Pasang Lowongan</td>
                                <td class="px-3 py-2">Koin</td>
                                <td class="px-3 py-2">-</td>
                                <td class="px-3 py-2 text-center">30</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- footer --}}
            <div class="mt-4 text-sm text-gray-800 font-semibold">
                <p>Total Tunai <span class="ml-14">: RP. 1.000.000</span></p>
                <p>Total Koin <span class="ml-[65px]">: 150 Koin</span></p>
            </div>
        </div>
    </div>
@endsection
