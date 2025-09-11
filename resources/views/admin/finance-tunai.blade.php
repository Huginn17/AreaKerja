@extends('admin.sidebar.index')
@section('sidebaradmin')
    <div class="p-4 sm:ml-64">

        <!-- Header -->
        <header class="w-full flex items-center justify-between px-6 py-2 border-bshadow-sm">
            <h1 class="text-2xl font-semibold">Data Transaksi Tunai</h1>
            <div class="flex items-center gap-2">
              <svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_702_17759)">
<path d="M23.0799 14.9436L22.6786 12.7388L21.114 13.006L21.5795 15.5638C21.6207 15.7899 21.7427 15.9927 21.9185 16.1275L24.4563 18.0737L24.7024 19.4259L7.4915 22.3659L7.24538 21.0136L8.94301 18.3439C9.06064 18.159 9.10362 17.9281 9.06251 17.702L8.44177 14.2916C8.22167 13.0939 8.29543 11.8673 8.6556 10.7357C9.01577 9.60402 9.64959 8.6074 10.4931 7.84644C11.3365 7.08548 12.3598 6.58714 13.4594 6.40174C14.5591 6.21635 15.6963 6.35046 16.7561 6.79053L16.409 4.88327C15.5989 4.65112 14.7651 4.55737 13.9385 4.60549L13.6204 2.85766L12.0557 3.12493L12.3739 4.87276C10.4841 5.41616 8.87605 6.70725 7.86075 8.49636C6.84545 10.2855 6.49499 12.4455 6.87714 14.5588L7.43364 17.6162L5.736 20.286C5.61838 20.4709 5.57539 20.7018 5.6165 20.9279L6.08206 23.4857C6.12322 23.7118 6.24511 23.9146 6.42093 24.0495C6.59674 24.1843 6.81208 24.2401 7.01956 24.2047L12.4958 23.2693L12.6509 24.1219C12.8567 25.2525 13.4662 26.2664 14.3453 26.9406C15.2244 27.6147 16.301 27.8939 17.3384 27.7167C18.3759 27.5395 19.289 26.9204 19.8771 25.9956C20.4651 25.0709 20.6799 23.9162 20.4741 22.7855L20.3189 21.9329L25.7951 20.9975C26.0026 20.9621 26.1852 20.8382 26.3028 20.6533C26.4204 20.4683 26.4634 20.2374 26.4222 20.0113L25.9567 17.4535C25.9155 17.2274 25.7935 17.0246 25.6177 16.8898L23.0799 14.9436ZM18.9095 23.0528C19.0329 23.7312 18.9041 24.424 18.5513 24.9789C18.1984 25.5337 17.6505 25.9052 17.0281 26.0115C16.4056 26.1178 15.7596 25.9503 15.2322 25.5458C14.7047 25.1413 14.339 24.533 14.2156 23.8546L14.0604 23.002L18.7543 22.2002L18.9095 23.0528Z" fill="black"/>
<path d="M22.3629 11.0333C24.0912 10.7381 25.2143 8.97192 24.8714 7.08841C24.5286 5.2049 22.8497 3.91733 21.1214 4.21254C19.3932 4.50775 18.2701 6.27396 18.6129 8.15747C18.9558 10.041 20.6347 11.3286 22.3629 11.0333Z" fill="black"/>
<ellipse cx="21.3472" cy="5.1301" rx="6.35506" ry="6.15646" fill="#E46054"/>
</g>
<path d="M22.8299 3.49956L20.917 8H19.8345L21.7696 3.61819H19.3452V2.72106H22.8299V3.49956Z" fill="white"/>
<defs>
<clipPath id="clip0_702_17759">
<rect width="25.3967" height="27.7315" fill="white" transform="matrix(0.985722 -0.168378 0.179073 0.983836 0.164062 4.27637)"/>
</clipPath>
</defs>
</svg>


                <div class="flex items-center gap-2 bg-white px-2 py-2 border border-gray-500 shadow-md rounded-2xl">
                    <a href="#">
                        <img src="{{ asset('images/logoarea.png') }}" class="w-8 h-8 rounded-full" alt="User">
                    </a>
                    <div class="text-sm">
                        <div class="font-semibold">Steve jobs</div>
                        <div class="text-gray-500">stevejobs@gmail.com</div>
                    </div>

                    <select class="appearance-none px-8 py-2 bg-transparent text-gray-600 text-sm focus:outline-none">
                        <option>Text 1</option>
                        <option>Text 2</option>
                        <option>Text 2</option>
                    </select>
                </div>
            </div>
        </header>

        <div class="p-6">
            <div class="flex items-center gap-4 mb-4">
                <!-- Toggle Buttons -->

                <a href="{{ url('/admin/finance') }}"
                    class="{{ request()->is('admin/finance') ? 'bg-white text-white border-gray-500' : 'bg-white text-gray-500 border-gray-200 hover:bg-gray-200 hover:text-gray-500' }} px-8 py-1 text-md font-medium border-2 rounded-lg transition duration-200">
                    Koin</a>
                <a href="{{ url('/admin/finance/tunai') }}"
                    class="{{ request()->is('admin/finance/tunai') ? 'bg-gray-500 hover:bg-gray-600 text-white border-gray-500' : 'bg-white text-gray-500 border-gray-500 hover:bg-gray-600 hover:text-white' }} px-8 py-1 text-md font-medium border-2 rounded-lg transition duration-200">
                    Tunai</a>

                <!-- Input dengan Dropdown -->
            <div class="flex items-center ml-[350px] border-2 overflow-hidden rounded-lg border-gray-400">
  
                    <!-- Dropdown -->
                    <button class="flex items-center gap-1 px-2 py-1 border-r-2 border-gray-400">
                        <span class="text-gray-600 text-sm">No. Ref</span>
                        <svg xmlns="http://www.w2.org/2000/svg" class="w-4 h-4 hover:bg-gray-200 text-gray-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Input Ref -->
                    <input type="text" value="991772492621"
                        class="px-2 py-2 text-center text-sm text-black  focus:outline-none " />
                </div>

                <!-- Tombol Cari -->
                <button class="px-8 py-1 rounded-lg border border-gray-600 text-white bg-gray-500 hover:bg-gray-600">Cari</button>
            </div>

            <!-- Table -->
            <div id="table_koin" class="rounded-2xl border-2 border-gray-200 overflow-hidden">
                <table class="w-full text-sm text-left">
                    <thead class="bg-white">
                        <tr class="text-center">
                            <th class="p-7 font-semibold">No</th>
                            <th class="p-7 font-semibold">No.Refrensi</th>
                            <th class="p-7 font-semibold">Jenis</th>
                            <th class="p-7 font-semibold">Dari</th>
                            <th class="p-7 font-semibold">Sumber Dana</th>
                            <th class="p-7 font-semibold">Transaksi Koin</th>
                            <th class="p-7 font-semibold">Status</th>
                            <th class="p-7 font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Baris -->
                        <tr class="border-2 text-center">
                            <td class="px-4 py-2">1</td>
                            <td class="px-4 py-2">991772492621</td>
                            <td class="px-4 py-2">Open CV</td>
                            <td class="px-4 py-2">AppleCorp.</td>
                            <td class="px-4 py-2">VA BCA</td>
                            <td class="px-4 py-2">1.000 Koin</td>
                            <td class="px-4 py-2 text-red-600 font-medium">Pending</td>
                            <td class="px-4 py-2 text-blue-600 flex justify-center"><svg width="24" height="24"
                                    viewBox="0 0 26 26" fill="none" xmlns="http://www.w2.org/2000/svg">
                                    <path
                                        d="M10.7077 25H4.22587C2.44874 25 0.999988 22.6568 1 22L1.00012 2.99999C1.00014 2.24214 2.44889 1 4.22601 1H18.7979C20.585 1 22.0228 2.24215 22.0228 4.00001V12.25M15.562 20.7501L18.5282 22.5001L25 17.4998M6.66221 7.00002H16.271M6.66221 11.5H16.271M6.66221 16H11.5171"
                                        stroke="#0F0BFD" stroke-width="1.78861" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            <td>
                        </tr>
                        <tr class="border-2 text-center">
                            <td class="px-4 py-2">2</td>
                            <td class="px-4 py-2">991772492621</td>
                            <td class="px-4 py-2">Open CV</td>
                            <td class="px-4 py-2">AppleCorp.</td>
                            <td class="px-4 py-2">VA BCA</td>
                            <td class="px-4 py-2">1.000 Koin</td>
                            <td class="px-4 py-2 text-green-600 font-medium">Success</td>
                            <td class="px-4 py-2 text-blue-600 flex justify-center">
                            <a href="{{ url('/admin/bukti/tunai') }}">
                                <svg width="24" height="24"
                                    viewBox="0 0 26 26" fill="none" xmlns="http://www.w2.org/2000/svg">
                                    <path
                                        d="M10.7077 25H4.22587C2.44874 25 0.999988 22.6568 1 22L1.00012 2.99999C1.00014 2.24214 2.44889 1 4.22601 1H18.7979C20.585 1 22.0228 2.24215 22.0228 4.00001V12.25M15.562 20.7501L18.5282 22.5001L25 17.4998M6.66221 7.00002H16.271M6.66221 11.5H16.271M6.66221 16H11.5171"
                                        stroke="#0F0BFD" stroke-width="1.78861" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </a>
                            <td>
                        </tr>

                              <tr class="border-2 text-center">
                            <td class="px-4 py-2">2</td>
                            <td class="px-4 py-2">991772492621</td>
                            <td class="px-4 py-2">Open CV</td>
                            <td class="px-4 py-2">AppleCorp.</td>
                            <td class="px-4 py-2">VA BCA</td>
                            <td class="px-4 py-2">1.000 Koin</td>
                            <td class="px-4 py-2 text-green-600 font-medium">Success</td>
                            <td class="px-4 py-2 text-blue-600 flex justify-center">
                            <a href="{{ url('/admin/bukti/tunai') }}">
                                <svg width="24" height="24"
                                    viewBox="0 0 26 26" fill="none" xmlns="http://www.w2.org/2000/svg">
                                    <path
                                        d="M10.7077 25H4.22587C2.44874 25 0.999988 22.6568 1 22L1.00012 2.99999C1.00014 2.24214 2.44889 1 4.22601 1H18.7979C20.585 1 22.0228 2.24215 22.0228 4.00001V12.25M15.562 20.7501L18.5282 22.5001L25 17.4998M6.66221 7.00002H16.271M6.66221 11.5H16.271M6.66221 16H11.5171"
                                        stroke="#0F0BFD" stroke-width="1.78861" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </a>
                            <td>
                        </tr>

                            <tr class="border-2 text-center">
                            <td class="px-4 py-2">2</td>
                            <td class="px-4 py-2">991772492621</td>
                            <td class="px-4 py-2">Open CV</td>
                            <td class="px-4 py-2">AppleCorp.</td>
                            <td class="px-4 py-2">VA BCA</td>
                            <td class="px-4 py-2">1.000 Koin</td>
                            <td class="px-4 py-2 text-green-600 font-medium">Success</td>
                            <td class="px-4 py-2 text-blue-600 flex justify-center">
                            <a href="{{ url('/admin/bukti/tunai') }}">
                                <svg width="24" height="24"
                                    viewBox="0 0 26 26" fill="none" xmlns="http://www.w2.org/2000/svg">
                                    <path
                                        d="M10.7077 25H4.22587C2.44874 25 0.999988 22.6568 1 22L1.00012 2.99999C1.00014 2.24214 2.44889 1 4.22601 1H18.7979C20.585 1 22.0228 2.24215 22.0228 4.00001V12.25M15.562 20.7501L18.5282 22.5001L25 17.4998M6.66221 7.00002H16.271M6.66221 11.5H16.271M6.66221 16H11.5171"
                                        stroke="#0F0BFD" stroke-width="1.78861" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </a>
                            <td>
                        </tr>

                    </tbody>
                </table>
            </div>

            {{-- End table koin --}}


        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/a076d05299.js" crossorigin="anonymous"></script>
    </div>
    </div>
    </div>
@endsection
