@extends('layouts.index-perusahaan')
@section('content')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <div class="bg-white p-6 font-medium">

        <!-- Header -->
        <div class="flex items-start space-x-4">
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
                <span class="text-lg font-semibold mb-1">{{ Auth::user()->perusahaan->nama_perusahaan }}</span>
                <span class="text-lg font-semibold mb-1">{{ Auth::user()->perusahaan->jenis_perusahaan }}</span>
                <p class="text-xs text-gray-400 mb-4">Alamat default</p>
                <a href="{{ route('profile.edit.perusahaan') }}"
                    class="px-4 py-1 rounded-md border border-orange-400 text-orange-500 text-sm">
                    Edit Profile
                </a>
            </div>
        </div>

        <!-- Deskripsi -->
        <div class="mt-6">
            <div class="flex items-start">
                <label class="w-32 text-sm">Deskripsi</label>
                <textarea class="flex-1 border border-orange-400 rounded-md h-24 p-2 focus:outline-none"></textarea>
            </div>
        </div>

        <!-- Grid Form & Kontak -->
        <div class="mt-6 grid grid-cols-3 gap-6">

            <!-- Kolom Kiri (span 2 kolom) -->
            <div class="col-span-2 space-y-4">
                <!-- Badan Usaha -->
                <div class="flex items-center">
                    <label class="w-1 text-sm">Badan Usaha</label>
                    <select
                        class="flex-1 border border-orange-400 rounded-md p-2 focus:outline-none mx-32 text-gray-400 text-sm">
                        <option class="text-sm ">Pilih Badan Usaha</option>
                        <option class="text-sm text-black font-semibold ">Perusahaan Perseorang</option>
                        <option class="text-sm text-black font-semibold ">CV (Persekutuan Komanditer)</option>
                        <option class="text-sm text-black font-semibold ">PT (Persekutuan Terbatas)</option>
                        <option class="text-sm text-black font-semibold ">Perseroan (Perseroan Terbatas Negara)</option>
                    </select>
                </div>

                <!-- Visi -->
                <div class="flex items-center">
                    <label class="w-32 text-sm">Visi</label>
                    <input type="text" class="flex-1 border border-orange-400 rounded-md p-2 focus:outline-none h-20" />
                </div>

                <!-- Misi -->
                <div class="flex items-center">
                    <label class="w-32 text-sm">Misi</label>
                    <input type="text" class="flex-1 border border-orange-400 rounded-md p-2 focus:outline-none h-20" />
                </div>
            </div>

            <!-- Kolom Kanan (Kontak) -->
            <div class="border border-orange-400 rounded-md p-4 flex flex-col">
                <h2 class="font-semibold mb-2 ml-4">Kontak</h2>
                <ul class="list-disc ml-5 text-sm space-y-2 flex-1">
                    <li class="py-2">Website<span class="pl-6"><a href="http://seven.inc"">: http://seven.inc</span></a>
                    </li>
                    <li class="py-2">Telepon<span class="pl-6">: +62 81363729803</span></li>
                    <li class="py-2">Whatsapp<span class="pl-3">: +62 81363729803</span></li>
                    <li class="py-2">Email<span class="pl-10">: seveninc@gmail.com</span></li>
                </ul>
            </div>
        </div>

        <!-- Separator -->
        <div class="my-6 border-t"></div>

        <!-- Tombol Lowongan -->
        <div class="flex justify-center">
            <div class="flex flex-col items-center space-y-3">
                <div class="w-28 h-28 border border-orange-400 rounded-md flex items-center justify-center">
                    <svg width="45" height="45" viewBox="0 0 45 45" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M42.1875 19.6875H25.3125V2.8125C25.3125 2.06658 25.0162 1.35121 24.4887 0.823763C23.9613 0.296317 23.2459 0 22.5 0C21.7541 0 21.0387 0.296317 20.5113 0.823763C19.9838 1.35121 19.6875 2.06658 19.6875 2.8125V19.6875H2.8125C2.06658 19.6875 1.35121 19.9838 0.823763 20.5113C0.296317 21.0387 0 21.7541 0 22.5C0 23.2459 0.296317 23.9613 0.823763 24.4887C1.35121 25.0162 2.06658 25.3125 2.8125 25.3125H19.6875V42.1875C19.6875 42.9334 19.9838 43.6488 20.5113 44.1762C21.0387 44.7037 21.7541 45 22.5 45C23.2459 45 23.9613 44.7037 24.4887 44.1762C25.0162 43.6488 25.3125 42.9334 25.3125 42.1875V25.3125H42.1875C42.9334 25.3125 43.6488 25.0162 44.1762 24.4887C44.7037 23.9613 45 23.2459 45 22.5C45 21.7541 44.7037 21.0387 44.1762 20.5113C43.6488 19.9838 42.9334 19.6875 42.1875 19.6875Z"
                            fill="#FA6601" />
                    </svg>
                </div>
                <button class="mt-2 px-4 py-1 bg-orange-500 text-white text-sm rounded-md">Lowongan</button>
            </div>
        </div>

    </div>


    @include('layouts.footer')
@endsection
