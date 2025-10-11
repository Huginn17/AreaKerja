@extends('layouts.index-perusahaan')
@section('content')
    @if (Auth::user()->perusahaan->alamat_perusahaan->count())
        <div class="bg-white min-h-screen p-8">
            <!-- Header -->
            <div class="flex items-center space-x-4">
                @if (Auth::user()->perusahaan->img_profile)
                    <img id="pp" class="w-20 h-20 object-contain mb-3 profile-img"
                        src="{{ asset('storage/' . Auth::user()->perusahaan->img_profile) }}" alt="Profile">
                @else
                    <img id="pp" class="w-20 h-20 object-contain mb-3"
                        src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                        alt="">
                @endif
                <div>
                    <span class="text-lg font-semibold mb-1">{{ Auth::user()->perusahaan->nama_perusahaan }}</span>
                    <p class="text-lg text-gray-600 m-2">Jasa TI dan Konsultan TI</p>
                    <p class="text-sm text-gray-400">Alamat default</p>
                </div>
            </div>

            <!-- Garis & Judul -->
            <div class="mt-6 ml-12">
                <h2 class="font-semibold text-gray-800">Alamat</h2>
                <hr class="border border-orange-500 mt-3 " />
            </div>

            <!-- Box Alamat -->
            @foreach (Auth::user()->perusahaan->alamat_perusahaan as $almtp)
                <div class="mt-6 ml-12 border border-orange-400 rounded-md p-6 w-[500px]">
                    <h3 class="font-semibold text-orange-500">{{ $almtp->label }}</h3>
                    <p class="text-orange-600 text-sm mt-1">
                        {{ $almtp->desa }}, {{ $almtp->kecamatan->nama }}, {{ $almtp->kota->nama }},
                        {{ $almtp->provinsi->nama }}, {{ $almtp->kode_pos }}
                    </p>
                    <p class="text-orange-500 text-sm mt-1 mb-5">
                        {{ $almtp->detail }}
                    </p>
                    <a href="{{ route('alamat.edit.perusahaan', $almtp->id) }}"
                        class="ml-72 bg-orange-500 text-white px-4 py-1 rounded-md text-sm hover:bg-orange-600">
                        Edit Alamat
                    </a>
                    {{-- Hapus --}}
                    <form action="{{ route('alamat.destroy.perusahaan', $almtp->id) }}"method="POST"
                        onsubmit="return confirm('Yakin hapus organisasi ini?')">
                        @csrf
                        @method('DELETE')
                        <button
                            class="ml-72 bg-orange-500 text-white px-4 py-1 rounded-md text-sm hover:bg-orange-600">Hapus
                            Alamat</button>
                    </form>
                    <a href="{{ route('form.alamat.perusahaan') }}">
                        <span class="ml-72 bg-orange-500 text-white px-4 py-1 rounded-md text-sm hover:bg-orange-600"><i
                                class="ph ph-plus"></i></span>
                    </a>
                </div>
            @endforeach
        </div>
    @else
        <div class="bg-white min-h-screen p-8">
            <!-- Header -->
            <div class="flex items-center space-x-4">
                <img src="{{ asset('images/seven.png') }}" alt="Logo" class="w-60 h-56 object-contain" />
                <div>
                    <h1 class="font-semibold text-lg text-gray-800 m-2">Seven_Inc</h1>
                    <p class="text-lg text-gray-600 m-2">Jasa TI dan Konsultan TI</p>
                    <p class="text-sm text-gray-400">Alamat default</p>
                </div>
            </div>

            <!-- Garis & Judul -->
            <div class="mt-6 ml-12">
                <h2 class="font-semibold text-gray-800">Alamat</h2>
                <hr class="border border-orange-500 mt-3 " />
            </div>

            <!-- Box Alamat -->
            <div class="mt-6 ml-12 border border-orange-400 rounded-md p-6 w-[500px]">
                <div class="flex items-center text-gray-400 space-x-2 mb-6">
                    <span class="font-medium">Alamat Kosong</span>
                    <!-- Icon dokumen -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 7h10M7 11h10M7 15h6M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h7l7 7v9a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <a href="{{ route('form.alamat.perusahaan') }}"
                    class="ml-72 bg-orange-500 text-white px-4 py-1 rounded-md text-sm hover:bg-orange-600">
                    Tambah Alamat
                </a>
            </div>
        </div>
    @endif
    @include('layouts.footer')
@endsection
