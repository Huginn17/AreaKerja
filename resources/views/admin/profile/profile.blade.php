@extends('admin.sidebar.index')
@section('sidebaradmin')
    <div class="p-4 sm:ml-64" x-data="{ openNotif: false, openAllNotif: false }">
        <!-- Header -->
        <header class="w-full flex flex-col sm:flex-row sm:items-center sm:justify-between px-4 sm:px-6 py-3 gap-3">

            <!-- Judul -->
            <h1 class="text-lg sm:text-xl font-semibold">Profile</h1>

            <!-- Right Section -->
            <div class="flex items-center gap-3 sm:gap-4">

                {{-- Tombol Notifikasi --}}
                <button @click="openNotif = true" class="relative">
                    <!-- Icon Lonceng -->
                    <svg class="w-7 h-7 sm:w-[31px] sm:h-[32px]" viewBox="0 0 31 32" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_722_7956)">
                            <path
                                d="M23.076 14.9431L22.6747 12.7383L21.1101 13.0055L21.5756 15.5633C21.6168 15.7894 21.7387 15.9922 21.9146 16.127L24.4524 18.0732L24.6985 19.4255L7.4876 22.3654L7.24147 21.0131L8.93911 18.3434C9.05673 18.1585 9.09972 17.9276 9.05861 17.7015L8.43786 14.2911C8.21777 13.0934 8.29153 11.8668 8.65169 10.7352C9.01186 9.60353 9.64569 8.60691 10.4892 7.84595C11.3326 7.08499 12.3559 6.58665 13.4555 6.40126C14.5552 6.21586 15.6924 6.34997 16.7522 6.79004L16.4051 4.88278C15.595 4.65063 14.7612 4.55689 13.9346 4.605L13.6165 2.85717L12.0518 3.12444L12.37 4.87227C10.4802 5.41568 8.87215 6.70676 7.85685 8.49588C6.84155 10.285 6.49109 12.445 6.87324 14.5583L7.42973 17.6158L5.7321 20.2855C5.61447 20.4704 5.57149 20.7013 5.6126 20.9274L6.07815 23.4852C6.11931 23.7114 6.24121 23.9141 6.41702 24.049C6.59284 24.1838 6.80817 24.2396 7.01565 24.2042L12.4919 23.2688L12.647 24.1214C12.8528 25.252 13.4623 26.2659 14.3414 26.9401C15.2205 27.6142 16.2971 27.8934 17.3345 27.7162C18.3719 27.539 19.2851 26.9199 19.8732 25.9951C20.4612 25.0704 20.676 23.9157 20.4702 22.785L20.315 21.9324L25.7912 20.997C25.9987 20.9616 26.1813 20.8378 26.2989 20.6528C26.4165 20.4679 26.4595 20.2369 26.4183 20.0108L25.9528 17.453C25.9116 17.2269 25.7896 17.0241 25.6138 16.8894L23.076 14.9431ZM18.9055 23.0523C19.029 23.7307 18.9002 24.4235 18.5473 24.9784C18.1945 25.5332 17.6466 25.9047 17.0242 26.011C16.4017 26.1173 15.7557 25.9498 15.2283 25.5453C14.7008 25.1408 14.3351 24.5325 14.2117 23.8541L14.0565 23.0015L18.7504 22.1997L18.9055 23.0523Z"
                                fill="black" />
                        </g>
                    </svg>

                    @if ($global_notifikasi_unread > 0)
                        <span id="notif-badge"
                            class="absolute -top-1 -right-1 bg-red-600 text-white text-[10px] sm:text-xs font-bold px-1.5 py-0.5 rounded-full">
                            {{ $global_notifikasi_unread }}
                        </span>
                    @endif
                </button>

                <!-- Profile Box -->
                <div class="flex items-center gap-2 bg-white px-2 py-2 border border-gray-500 shadow-md rounded-2xl">

                    <a href="#">
                        @if (Auth::user()->role == 'admin')
                            @if (Auth::user()->admin->img_profile)
                                <img id="pu" class="w-9 h-9 sm:w-10 sm:h-10 object-cover rounded-full profile-img"
                                    src="{{ asset('storage/' . Auth::user()->admin->img_profile) }}" alt="Profile">
                            @else
                                <img id="pu" class="w-9 h-9 sm:w-10 sm:h-10 rounded-full"
                                    src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                                    alt="">
                            @endif
                        @else
                            <img class="w-9 h-9 sm:w-10 sm:h-10 rounded-full"
                                src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                                alt="">
                        @endif
                    </a>

                    <div class="text-xs sm:text-sm mr-2 sm:mr-14 leading-tight">
                        <span class="font-semibold block truncate max-w-[100px] sm:max-w-none">
                            {{ Auth::user()->username }}
                        </span>
                        <p class="text-gray-500 text-[11px] sm:text-sm truncate max-w-[100px] sm:max-w-none">
                            {{ Auth::user()->email }}
                        </p>
                    </div>

                </div>
            </div>

        </header>



        <div class="pt-2 px-4 pb-4">

            <div class="p-4 sm:p-6 rounded-lg border border-gray-400 shadow">
                {{-- header --}}
                {{-- <h2 class="text-base sm:text-lg font-semibold mb-4 sm:mb-6">Edit Profile</h2> --}}

                {{-- profile --}}
                <div class="flex flex-col sm:flex-row items-center sm:items-start gap-3 sm:gap-4 mb-6 sm:mb-8">
                    @if (Auth::user()->admin->img_profile)
                        <img id="pu" class="w-16 h-16 sm:w-24 sm:h-24 object-cover rounded-full"
                            src="{{ asset('storage/' . Auth::user()->admin->img_profile) }}" alt="Profile">
                    @else
                        <img id="pu" class="w-16 h-16 sm:w-24 sm:h-24 object-cover rounded-full"
                            src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                            alt="Profile">
                    @endif

                    <div class="text-center sm:text-left">
                        <h3 class="font-semibold text-sm sm:text-base">{{ Auth::user()->username }}</h3>
                        <p class="text-xs sm:text-sm text-gray-500">{{ Auth::user()->email }}</p>
                    </div>
                </div>

                {{-- form --}}
                <form action="#" method="POST" class="space-y-3 sm:space-y-4">

                    {{-- email + username --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                        <div>
                            <label class="block mb-1 text-xs sm:text-sm font-medium">Email</label>
                            <input type="email" value="{{ Auth::user()->email }}" disabled
                                class="w-full border border-gray-400 shadow rounded-md px-2 py-1.5 text-xs sm:text-sm text-gray-500">
                        </div>

                        <div>
                            <label class="block mb-1 text-xs sm:text-sm font-medium">Username</label>
                            <input type="text" name="username" disabled value="{{ Auth::user()->username }}"
                                class="w-full border border-gray-400 shadow rounded-md px-2 py-1.5 text-xs sm:text-sm text-gray-500">
                        </div>
                    </div>

                    {{-- nama lengkap --}}
                    <div>
                        <label class="block mb-1 text-xs sm:text-sm font-medium">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" disabled value="{{ Auth::user()->admin->nama_lengkap }}"
                            class="w-full border border-gray-400 shadow rounded-md px-2 py-1.5 text-xs sm:text-sm text-gray-500">
                    </div>

                    {{-- provinsi, kota, kecamatan --}}
                    <div class="flex flex-col md:flex-row gap-3 sm:gap-4">
                        <div class="w-full md:w-48">
                            <label class="block mb-1 text-xs sm:text-sm font-medium">Provinsi</label>
                            <select disabled
                                class="w-full border border-gray-400 rounded-md shadow px-2 py-1.5 text-xs sm:text-sm text-gray-500">
                                @if (Auth::user()->admin->provinsi)
                                    <option selected>{{ Auth::user()->admin->provinsi->nama }}</option>
                                @else
                                    <option selected>Data Belum Dilengkapi</option>
                                @endif
                            </select>
                        </div>

                        <div class="w-full md:w-48">
                            <label class="block mb-1 text-xs sm:text-sm font-medium">Kota/Kabupaten</label>
                            <select disabled
                                class="w-full border border-gray-400 rounded-md shadow px-2 py-1.5 text-xs sm:text-sm text-gray-500">
                                @if (Auth::user()->admin->kota)
                                    <option selected>{{ Auth::user()->admin->kota->nama }}</option>
                                @else
                                    <option selected>Data Belum Dilengkapi</option>
                                @endif
                            </select>
                        </div>

                        <div class="w-full md:w-48">
                            <label class="block mb-1 text-xs sm:text-sm font-medium">Kecamatan</label>
                            <select disabled
                                class="w-full border border-gray-400 rounded-md shadow px-2 py-1.5 text-xs sm:text-sm text-gray-500">
                                @if (Auth::user()->admin->kecamatan)
                                    <option selected>{{ Auth::user()->admin->kecamatan->nama }}</option>
                                @else
                                    <option selected>Data Belum Dilengkapi</option>
                                @endif
                            </select>
                        </div>
                    </div>

                    {{-- desa & kode pos --}}
                    <div class="flex flex-col md:flex-row gap-3 sm:gap-4">
                        <div class="w-full md:w-48">
                            <label class="block mb-1 text-xs sm:text-sm font-medium">Desa</label>
                            <input type="text" name="desa" disabled value="{{ Auth::user()->admin->desa }}"
                                class="w-full border border-gray-400 shadow rounded-md px-2 py-1.5 text-xs sm:text-sm text-gray-500">
                        </div>

                        <div class="w-full md:w-48">
                            <label class="block mb-1 text-xs sm:text-sm font-medium">Kode Pos</label>
                            <input type="text" name="kode_pos" disabled value="{{ Auth::user()->admin->kode_pos }}"
                                class="w-full border border-gray-400 shadow rounded-md px-2 py-1.5 text-xs sm:text-sm text-gray-500">
                        </div>
                    </div>

                    {{-- detail --}}
                    <div>
                        <label class="block mb-1 text-xs sm:text-sm font-medium">Detail Lainnya</label>
                        <input type="text" name="detail_alamat" disabled
                            value="{{ Auth::user()->admin->detail_alamat }}"
                            class="w-full border border-gray-400 shadow rounded-md px-2 py-1.5 text-xs sm:text-sm text-gray-500">
                    </div>

                    {{-- button --}}
                    <div class="flex justify-center mt-1 sm:mt-3 mb-3">
                        <a href="{{ url('/admin/edit/profile') }}"
                            class="bg-gray-600 hover:bg-gray-700 text-white px-10 py-2 rounded-lg text-sm">Edit</a>
                    </div>

                </form>
            </div>

        </div>



        @include('admin.notif.modal_notif')
        @include('admin.notif.modal_semua')
    </div>


    </div>
@endsection
