@extends('layouts.index-perusahaan')
@section('content')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <div class="bg-white p-6 font-medium mt-24">

        <!-- Header -->
        <div class="flex items-start space-x-4 flex-col sm:flex-row">

            <!-- Logo -->
            @if (Auth::user()->perusahaan->img_profile)
                <img id="pp" class="w-20 h-20 object-contain mb-3 profile-img"
                    src="{{ asset('storage/' . Auth::user()->perusahaan->img_profile) }}" alt="Profile">
            @else
                <img id="pp" class="w-20 h-20 object-contain mb-3"
                    src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                    alt="">
            @endif
            <!-- Info Perusahaan -->
            <div>
                <span
                    class="text-lg font-semibold ">{{ Auth::user()->perusahaan->nama_perusahaan ?? Auth::user()->username }}</span>
                <p class="text-sm font-semibold mb-1">{{ Auth::user()->perusahaan->jenis_perusahaan }}</p>
                <p class="text-xs text-gray-400 mb-4">{{ Auth::user()->perusahaan->alamatUtama->kota->nama ?? '-' }},
                    {{ Auth::user()->perusahaan->alamatUtama->provinsi->nama ?? '-' }},
                    {{ Auth::user()->perusahaan->alamatUtama->kecamatan->nama ?? '-' }}</p>
                <a href="{{ route('profile.edit.perusahaan') }}"
                    class="px-4 py-1 rounded-md border border-orange-400 text-orange-500 text-sm">
                    Edit Profile
                </a>
            </div>
        </div>

        <!-- Deskripsi -->
        @if (Auth::user()->perusahaan->deskripsi)
            <div class="mt-6">
                <div class="flex flex-col sm:flex-row items-start">

                    <label class="w-32 text-sm mt-2 mb-1">Deskripsi</label>
                    <textarea name="deskripsi" readonly
                        class="auto-grow flex-1 border border-orange-400 rounded-md p-2 focus:outline-none resize-none overflow-hidden text-gray-800 text-sm">{{ Auth::user()->perusahaan->deskripsi }}</textarea>
                </div>
            </div>
        @else
            <div class="mt-6">
                <div class="flex flex-col sm:flex-row items-start">

                    <label class="w-32 text-sm mt-2 mb-1">Deskripsi</label>
                    <textarea name="deskripsi"
                        class="auto-grow flex-1 border border-orange-400 rounded-md p-2 focus:outline-none resize-none overflow-hidden text-gray-800 text-sm"></textarea>
                </div>
            </div>
        @endif

        <!-- Grid Form & Kontak -->
        <div class="mt-6 grid grid-cols-1 lg:grid-cols-3 gap-6">


            <!-- Kolom Kiri (span 2 kolom) -->
            <div class="col-span-2 space-y-4">
                <!-- Badan Usaha -->
                <div class="flex flex-col sm:flex-row items-start mt-4">
                    <label class="text-sm mb-1 sm:mb-0 sm:w-32">Badan Usaha</label>
                    <input type="text" name="jenis_perusahaan" readonly
                        value="{{ Auth::user()->perusahaan->jenis_perusahaan }}"
                        class="w-full sm:flex-1 border border-orange-400 rounded-md px-4 py-4 focus:outline-none text-gray-800 text-sm">
                </div>


                <!-- Visi -->
                <div class="flex flex-col sm:flex-row items-start mt-4">
                    <label class="text-sm mb-1 sm:mb-0 sm:w-32">Visi</label>
                    <textarea name="visi" readonly
                        class="auto-grow w-full sm:flex-1 border border-orange-400 rounded-md p-2 focus:outline-none resize-none text-gray-800 text-sm">{{ Auth::user()->perusahaan->visi }}</textarea>
                </div>


                <!-- Misi -->
                <div class="flex flex-col sm:flex-row items-start mt-4">
                    <label class="text-sm mb-1 sm:mb-0 sm:w-32">Misi</label>
                    <textarea name="misi" readonly
                        class="auto-grow w-full sm:flex-1 border border-orange-400 rounded-md p-2 focus:outline-none resize-none text-gray-800 text-sm">{{ Auth::user()->perusahaan->misi }}</textarea>
                </div>

            </div>


            <!-- Kolom Kanan (Kontak) -->
            <div class="border border-orange-400 rounded-xl p-5 bg-white shadow-sm self-start min-h-[250px]">
                <h2 class="font-semibold text-lg mb-4 flex items-center gap-2 text-orange-600">
                    Kontak
                </h2>

                <ul class="space-y-3 text-sm">

                    <!-- Website -->
                    <li class="flex flex-col sm:flex-row">

                        <span class="font-medium w-24 text-gray-700">Website</span>
                        <span class="text-gray-800">
                            :
                            <a href="{{ Auth::user()->perusahaan->website_perusahaan }}"
                                class="text-blue-600 hover:underline break-all">
                                {{ Auth::user()->perusahaan->website_perusahaan }}
                            </a>
                        </span>
                    </li>

                    <!-- Telepon -->
                    <li class="flex flex-col sm:flex-row">

                        <span class="font-medium w-24 text-gray-700">Telepon</span>
                        <span class="text-gray-800">: {{ Auth::user()->perusahaan->telepon_perusahaan }}</span>
                    </li>

                    <!-- Whatsapp -->
                    <li class="flex flex-col sm:flex-row">

                        <span class="font-medium w-24 text-gray-700">Whatsapp</span>
                        <span class="text-gray-800">: {{ Auth::user()->perusahaan->whatsapp }}</span>
                    </li>

                    <!-- Email -->
                    <li class="flex flex-col sm:flex-row">

                        <span class="font-medium w-24 text-gray-700">Email</span>
                        <span class="text-gray-800 break-all">: {{ Auth::user()->email }}</span>
                    </li>

                </ul>
            </div>

        </div>

        <!-- Separator -->
        <div class="my-6 border-t"></div>

        <!-- Tombol Lowongan -->
        <div class="flex justify-center">
            <div class="flex flex-col items-center space-y-3">
                <div class="w-28 h-28 border border-orange-400 rounded-md flex items-center justify-center">
                    <a href="{{ route('lowongan.saya.perusahaan') }}">
                        <svg width="45" height="45" viewBox="0 0 45 45" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M42.1875 19.6875H25.3125V2.8125C25.3125 2.06658 25.0162 1.35121 24.4887 0.823763C23.9613 0.296317 23.2459 0 22.5 0C21.7541 0 21.0387 0.296317 20.5113 0.823763C19.9838 1.35121 19.6875 2.06658 19.6875 2.8125V19.6875H2.8125C2.06658 19.6875 1.35121 19.9838 0.823763 20.5113C0.296317 21.0387 0 21.7541 0 22.5C0 23.2459 0.296317 23.9613 0.823763 24.4887C1.35121 25.0162 2.06658 25.3125 2.8125 25.3125H19.6875V42.1875C19.6875 42.9334 19.9838 43.6488 20.5113 44.1762C21.0387 44.7037 21.7541 45 22.5 45C23.2459 45 23.9613 44.7037 24.4887 44.1762C25.0162 43.6488 25.3125 42.9334 25.3125 42.1875V25.3125H42.1875C42.9334 25.3125 43.6488 25.0162 44.1762 24.4887C44.7037 23.9613 45 23.2459 45 22.5C45 21.7541 44.7037 21.0387 44.1762 20.5113C43.6488 19.9838 42.9334 19.6875 42.1875 19.6875Z"
                                fill="#FA6601" />
                        </svg>
                    </a>
                </div>
                <a href="{{ route('lowongan.saya.perusahaan') }}"
                    class="mt-2 px-4 py-1 bg-orange-500 text-white text-sm rounded-md">Lowongan</a>
            </div>
        </div>

    </div>


    <script>
        function autoGrow(el) {
            el.style.height = "auto";
            el.style.height = el.scrollHeight + "px";
        }

        document.addEventListener("DOMContentLoaded", () => {
            document.querySelectorAll(".auto-grow").forEach((el) => {
                autoGrow(el);
                el.addEventListener("input", () => autoGrow(el));
            });
        });
    </script>

    @include('layouts.footer')
@endsection
