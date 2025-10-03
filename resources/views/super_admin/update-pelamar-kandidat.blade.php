@extends('super_admin.sidebar.index')
@section('sidebarsuperadmin')
    <div class=" flex-items-center bg-white w-full h-screen">

        <!-- Header -->
        <div class="flex justify-between items-center px-12 pt-6 pb-4">
            <h1 class="text-xl font-semibold text-black">Data Kandidat</h1>

            <div class="flex items-center space-x-3">
                <!-- Notification Icon -->
                <div class="relative">
                    <span class="absolute top-0 right-0 h-2 w-2 rounded-full"></span>
                    <svg width="33" height="33" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_732_13870)">
                            <path
                                d="M23.076 14.9416L22.6747 12.7368L21.1101 13.0041L21.5756 15.5619C21.6168 15.788 21.7387 15.9907 21.9146 16.1255L24.4524 18.0718L24.6985 19.424L7.4876 22.3639L7.24147 21.0117L8.93911 18.3419C9.05673 18.157 9.09972 17.9261 9.05861 17.7L8.43786 14.2896C8.21777 13.0919 8.29153 11.8654 8.65169 10.7337C9.01186 9.60207 9.64569 8.60544 10.4892 7.84449C11.3326 7.08353 12.3559 6.58519 13.4555 6.39979C14.5552 6.21439 15.6924 6.3485 16.7522 6.78858L16.4051 4.88131C15.595 4.64916 14.7612 4.55542 13.9346 4.60354L13.6165 2.85571L12.0518 3.12297L12.37 4.8708C10.4802 5.41421 8.87215 6.7053 7.85685 8.49441C6.84155 10.2835 6.49109 12.4436 6.87324 14.5569L7.42973 17.6143L5.7321 20.284C5.61447 20.4689 5.57149 20.6999 5.6126 20.926L6.07815 23.4838C6.11931 23.7099 6.24121 23.9127 6.41702 24.0475C6.59284 24.1823 6.80817 24.2382 7.01565 24.2027L12.4919 23.2673L12.647 24.1199C12.8528 25.2505 13.4623 26.2644 14.3414 26.9386C15.2205 27.6128 16.2971 27.892 17.3345 27.7147C18.3719 27.5375 19.2851 26.9185 19.8732 25.9937C20.4612 25.0689 20.676 23.9142 20.4702 22.7836L20.315 21.931L25.7912 20.9956C25.9987 20.9601 26.1813 20.8363 26.2989 20.6513C26.4165 20.4664 26.4595 20.2354 26.4183 20.0093L25.9528 17.4515C25.9116 17.2254 25.7896 17.0227 25.6138 16.8879L23.076 14.9416ZM18.9055 23.0508C19.029 23.7292 18.9002 24.422 18.5473 24.9769C18.1945 25.5318 17.6466 25.9032 17.0242 26.0095C16.4017 26.1159 15.7557 25.9484 15.2283 25.5439C14.7008 25.1394 14.3351 24.531 14.2117 23.8526L14.0565 23L18.7504 22.1982L18.9055 23.0508Z"
                                fill="black" />
                            <path
                                d="M22.3629 11.0324C24.0912 10.7372 25.2143 8.97095 24.8714 7.08743C24.5286 5.20392 22.8497 3.91635 21.1214 4.21156C19.3932 4.50678 18.2701 6.27298 18.6129 8.15649C18.9558 10.04 20.6347 11.3276 22.3629 11.0324Z"
                                fill="black" />
                            <ellipse cx="21.3472" cy="5.12912" rx="6.35506" ry="6.15646" fill="#E46054" />
                        </g>
                        <path d="M22.8299 3.49956L20.917 8H19.8345L21.7696 3.61819H19.3452V2.72106H22.8299V3.49956Z"
                            fill="white" />
                        <defs>
                            <clipPath id="clip0_732_13870">
                                <rect width="25.3967" height="27.7315" fill="white"
                                    transform="matrix(0.985722 -0.168378 0.179073 0.983836 0.164062 4.27539)" />
                            </clipPath>
                        </defs>
                    </svg>

                </div>

                <!-- User Info -->
                <div class="flex items-center space-x-2 bg-white px-4 py-2 rounded-full shadow-md">
                    <img src="https://i.pravatar.cc/40" alt="Avatar" class="w-8 h-8 rounded-full" />
                    <div class="text-sm leading-tight">
                        <div class="font-semibold text-black">Steve Jobs</div>
                        <div class="text-gray-500 text-xs">stevejobs@gmail.com</div>
                    </div>
                    <select class="appearance-none px-8 py-2 bg-transparent text-gray-600 text-sm focus:outline-none">
                        <option value=""></option>
                        <option>Text 1</option>
                        <option>Text 2</option>
                        <option>Text 3</option>

                    </select>
                </div>
            </div>
        </div>

        <!-- Form Container -->
        <div class="max-w-5xl mx-auto mt-4 bg-[#FA5C0D] rounded-xl p-10 pb-20 shadow-xl text-white">
            <div class="flex flex-col md:flex-row items-center md:space-x-6 space-y-4 md:space-y-0">
                <!-- Upload Icon -->
                <div
                    class="w-28 h-28 bg-white rounded-full flex items-center justify-center  focus:ring-gray-500  ring-1 ring-gray-700">
                    <svg width="47" height="47" viewBox="0 0 47 47" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M16.1743 22.5792C17.2194 21.7102 18.2737 21.7102 19.3439 22.6044L19.5909 22.8285L30.9933 34.2309L31.2083 34.4207C31.6483 34.7618 32.1977 34.9306 32.7533 34.8955C33.3089 34.8605 33.8327 34.624 34.2264 34.2303C34.62 33.8366 34.8566 33.3128 34.8916 32.7572C34.9267 32.2016 34.7579 31.6522 34.4168 31.2122L34.227 30.9972L31.2723 28.0403L31.9401 27.3702L32.1825 27.153C33.2276 26.284 34.2819 26.2839 35.3521 27.1781L35.5991 27.4022L46.288 38.0934C46.0715 40.2712 45.0814 42.2991 43.4974 43.8092C41.9135 45.3194 39.8406 46.2116 37.655 46.3239L37.1839 46.3354H9.74129C7.47249 46.3352 5.2847 45.492 3.60274 43.9693C1.92077 42.4467 0.864666 40.3533 0.639488 38.0957L15.9319 22.7964L16.1743 22.5792ZM37.1839 0.597656C39.5308 0.597654 41.7879 1.49968 43.4884 3.11717C45.1889 4.73466 46.2027 6.94386 46.32 9.28782L46.3315 9.7452V31.665L38.8007 24.1366L38.4577 23.8233C35.5854 21.3191 31.9401 21.3145 29.0906 23.7844L28.7384 24.1045L28.0364 24.8043L22.7925 19.5628L22.4495 19.2495C19.5772 16.7454 15.9319 16.7408 13.0824 19.2106L12.7302 19.5308L0.59375 31.665V9.7452C0.593748 7.3983 1.49578 5.14117 3.11327 3.44068C4.73075 1.74019 6.93995 0.726436 9.28391 0.609091L9.74129 0.597656H37.1839ZM30.3461 12.0321L30.0557 12.0481C29.4999 12.1142 28.9876 12.3819 28.6159 12.8004C28.2442 13.2189 28.0389 13.7592 28.0389 14.319C28.0389 14.8787 28.2442 15.419 28.6159 15.8375C28.9876 16.2561 29.4999 16.5237 30.0557 16.5898L30.3233 16.6059L30.6137 16.5898C31.1695 16.5237 31.6818 16.2561 32.0535 15.8375C32.4252 15.419 32.6305 14.8787 32.6305 14.319C32.6305 13.7592 32.4252 13.2189 32.0535 12.8004C31.6818 12.3819 31.1695 12.1142 30.6137 12.0481L30.3461 12.0321Z"
                            fill="#606060" fill-opacity="0.8" />
                    </svg><br>

                </div>

                <!-- Input Nama -->

                <input type="text" placeholder="Masukkan Nama"
                    class="flex-1 px-4 py-3 rounded-md bg-white text-gray-800 placeholder-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-700 text-sm ring-1 ring-gray-700" />
            </div>

            <!-- Form Fields -->
            <div class="max-w-xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-16 mt-6">

                <!-- Divisi di sebelah kiri -->
                <div class="text-left">
                    <label class="block mb-1 text-sm font-semibold text-white">Divisi</label>
                    <select
                        class="w-full px-4 py-3 bg-white text-gray-800 rounded-lg focus:outline-none focus:ring-none text-sm ring-1 ring-gray-700">
                        <option>Pilih</option>
                        <option>Programmer</option>
                        <option>UI UX Designer</option>
                        <option>Videographer</option>
                        <option>Sosial Media</option>
                        <option>Photographer</option>
                        <option>Animasi</option>


                    </select>
                </div>

                <div>
                    <label class="block mb-1 text-sm font-semibold text-white">Mulai Pelatihan</label>
                    <input type="date"
                        class="w-full px-4 py-3 bg-white text-gray-800 rounded-md focus:outline-none focus:ring-none focus:ring-gray-700 text-sm ring-1 ring-gray-700" />
                </div>

                <div>
                    <label class="block mb-1 text-sm font-semibold text-white">Selesai Pelatihan</label>
                    <input type="date"
                        class="w-full px-4 py-3 bg-white text-gray-800 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-700 text-sm ring-1 ring-gray-700" />
                </div>
            </div>
        </div><br>

        <!-- Tombol Simpan & Kembali -->
        <div class="flex flex-col items-center space-y-6 mt-6">
            <!-- Tombol Simpan -->
            <button
                class="bg-green-600 text-white font-semibold px-52 py-3 rounded-lg shadow-md hover:bg-green-700 transition duration-200">
                Simpan
            </button>


            <!-- Tombol Kembali -->
            <button
                class="bg-red-600 text-white font-semibold px-52 py-3 rounded-lg shadow-md hover:bg-red-700 transition duration-200">
                Kembali
            </button>
        </div>

    </div>
@endsection
