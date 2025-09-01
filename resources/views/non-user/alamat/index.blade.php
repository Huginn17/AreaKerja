@extends('layouts.index')
@section('content')
    <div class=" flex justify-center py-8">
        <div class="w-full max-w-4xl bg-white  p-6">
            <!-- Header Profil -->
            <h2 class="text-lg font-semibold mb-4">Profil Akun</h2>
            <div
                class="border border-orange-400 rounded-lg p-4 flex flex-col md:flex-row md:items-center md:justify-between">
                <!-- Foto + Upload -->
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <img src="{{ asset('images/cwe.png') }}" alt="Profile" class="w-24 h-24 rounded-full object-cover">
                        <button class="absolute bottom-11 right-14 bg-orange-500 text-white rounded-full p-1 text-xs">
                            ✎
                        </button>
                        <select class="border border-orange-500 rounded-md px-3 py-2 text-sm text-orange-500 mt-4">
                            <option class="hover:bg-gray-100">Pelamar Aktif</option>
                            <option>Perusahaan</option>
                        </select>
                    </div>
                    <div class="flex flex-col space-y-2">
                        <div class="flex space-x-2">
                            <button
                                class="px-4 py-2 border border-orange-300 hover:bg-gray-100 text-orange-500 rounded-md flex items-center space-x-2">
                                <span>📤</span> <span>Upload</span>
                            </button>
                            <button class="px-4 py-2 border border-gray-300 hover:bg-gray-100 text-gray-500 rounded-md">🗑
                                Remove</button>
                        </div>
                    </div>
                </div>

                <!-- Tombol kanan -->
                <div class="flex space-x-2 mt-4 md:mt-0">
                    <button class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-md">Unduh CV</button>
                    <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md">Simpan</button>
                </div>
            </div>


            {{-- content --}}
            <div class="my-10">
                <h2 class="text-lg font-bold text-gray-800 border-b-2 border-orange-500 pb-2 mb-4">Alamat</h2>
                <div class="block lg:flex md:flex justify-between">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach (Auth::user()->pelamar->alamat_pelamar as $almt)
                            <div class="w-full p-5 bg-orange-500 text-white rounded-lg mb-5">
                                <h1 class="text-2xl">{{ $almt->label }}</h1>
                                <p class="my-4">{{ $almt->desa }} {{ $almt->kecamatan }} {{ $almt->kota }}
                                    {{ $almt->provinsi }}
                                    {{ $almt->kode_pos }}</p>
                                <p class="mb-10">{{ $almt->detail }}</p>
                                <a class="w-fit px-6 py-2 bg-white rounded-lg text-orange-500 font-semibold"
                                    href="{{ route('alamat.edit', $almt->id) }}">Edit
                                    Alamat</a>
                                {{-- Hapus --}}
                                <form action="{{ route('alamat.destroy', $almt->id) }}"method="POST"
                                    onsubmit="return confirm('Yakin hapus organisasi ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="w-fit px-6 py-2 bg-white rounded-lg text-orange-500 font-semibold">Hapus
                                        Alamat</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                    <a href="{{ route('form_alamat') }}">
                        <span
                            class="w-14 h-14 flex justify-center items-center rounded-lg bg-orange-500 text-white text-5xl"><i
                                class="ph ph-plus"></i></span>
                    </a>
                </div>
            </div>

        </div>
    </div>
@endsection
