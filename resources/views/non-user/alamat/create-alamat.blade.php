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
                        <img src="{{ asset('images/cwe.png') }}" alt="Profile"
                            class="w-24 h-24 rounded-full object-cover">
                         <button class="absolute bottom-11 right-14 bg-orange-500 text-white rounded-full p-1 text-xs">
                            ✎
                        </button>
                        <select class="border border-orange-500 rounded-md px-8 py-2 pl-2 text-sm text-orange-500 mt-4">
                            <option class="hover:bg-gray-100">Pelamar Aktif</option>
                            <option>Perusahaan</option>
                        </select>
                    </div>
                    <div class="flex flex-col space-y-2">
                        <div class="flex space-x-2">
                            <button
                                 class="flex items-center gap-1 border border-orange-400 text-orange-500 px-3 py-2 rounded-md text-sm font-medium hover:bg-orange-50">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5-5m0 0l5 5m-5-5v12" />
                                </svg>  
                                Upload
                            </button>
                            <button  class="px-3 py-2 flex items-center gap-1 border border-gray-400 rounded text-sm text-gray-600 hover:bg-gray-100">
                                   <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.7946 2.44649H9.4233V1.97744C9.4233 1.60425 9.27341 1.24634 9.00659 0.982451C8.73977 0.718563 8.37788 0.570313 8.00054 0.570312H5.15501C4.77767 0.570313 4.41579 0.718563 4.14896 0.982451C3.88214 1.24634 3.73225 1.60425 3.73225 1.97744V2.44649H1.36097C1.23519 2.44649 1.11456 2.4959 1.02562 2.58386C0.936685 2.67183 0.886719 2.79113 0.886719 2.91553C0.886719 3.03993 0.936685 3.15923 1.02562 3.24719C1.11456 3.33515 1.23519 3.38457 1.36097 3.38457H1.83523V11.8273C1.83523 12.0761 1.93516 12.3147 2.11304 12.4907C2.29092 12.6666 2.53218 12.7654 2.78374 12.7654H10.3718C10.6234 12.7654 10.8646 12.6666 11.0425 12.4907C11.2204 12.3147 11.3203 12.0761 11.3203 11.8273V3.38457H11.7946C11.9204 3.38457 12.041 3.33515 12.1299 3.24719C12.2189 3.15923 12.2688 3.03993 12.2688 2.91553C12.2688 2.79113 12.2189 2.67183 12.1299 2.58386C12.041 2.4959 11.9204 2.44649 11.7946 2.44649ZM4.68076 1.97744C4.68076 1.85304 4.73072 1.73374 4.81966 1.64578C4.9086 1.55782 5.02923 1.5084 5.15501 1.5084H8.00054C8.12632 1.5084 8.24695 1.55782 8.33589 1.64578C8.42483 1.73374 8.47479 1.85304 8.47479 1.97744V2.44649H4.68076V1.97744ZM10.3718 11.8273H2.78374V3.38457H10.3718V11.8273ZM5.62927 5.72979V9.48213C5.62927 9.60653 5.5793 9.72583 5.49036 9.8138C5.40142 9.90176 5.28079 9.95118 5.15501 9.95118C5.02923 9.95118 4.9086 9.90176 4.81966 9.8138C4.73072 9.72583 4.68076 9.60653 4.68076 9.48213V5.72979C4.68076 5.60539 4.73072 5.48609 4.81966 5.39812C4.9086 5.31016 5.02923 5.26074 5.15501 5.26074C5.28079 5.26074 5.40142 5.31016 5.49036 5.39812C5.5793 5.48609 5.62927 5.60539 5.62927 5.72979ZM8.47479 5.72979V9.48213C8.47479 9.60653 8.42483 9.72583 8.33589 9.8138C8.24695 9.90176 8.12632 9.95118 8.00054 9.95118C7.87476 9.95118 7.75413 9.90176 7.66519 9.8138C7.57625 9.72583 7.52629 9.60653 7.52629 9.48213V5.72979C7.52629 5.60539 7.57625 5.48609 7.66519 5.39812C7.75413 5.31016 7.87476 5.26074 8.00054 5.26074C8.12632 5.26074 8.24695 5.31016 8.33589 5.39812C8.42483 5.48609 8.47479 5.60539 8.47479 5.72979Z"
                                        fill="#606060" />
                                </svg>
                                 Remove
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Tombol kanan -->
                <div class="flex space-x-2 mt-4 md:mt-0">
                    <button class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-md">Unduh CV</button>
                    <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md">Simpan</button>
                </div>
            </div>

            <!-- Form Alamat -->
            <div class="mt-8">
                <h3 class="text-base font-semibold hover:gray-100 border-b border-orange-500 pb-2 mb-4">Alamat</h3>

                <form action="{{ route('alamat.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm mb-1">Label Alamat</label>
                        <input type="text" name="label" class="w-full border border-gray-300 rounded-md px-3 py-2"
                            placeholder="Label Alamat">
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Alamat Lengkap</label>
                        <input type="text" name="desa" class="w-full border border-gray-300 rounded-md px-3 py-2"
                            placeholder="Alamat Lengkap">
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Kecamatan</label>
                        <input type="text" name="kecamatan" class="w-full border border-gray-300 rounded-md px-3 py-2"
                            placeholder="Kecamatan">
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Kota</label>
                        <input type="text" name="kota" class="w-full border border-gray-300 rounded-md px-3 py-2" placeholder="Kota">
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Provinsi</label>
                        <input type="text" name="provinsi" class="w-full border border-gray-300 rounded-md px-3 py-2"
                            placeholder="Provinsi">
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Detail Alamat</label>
                        <input type="text" name="detail" class="w-full border border-gray-300 rounded-md px-3 py-2"
                            placeholder="Detail lainnya (Cth: Blok/Unit)">
                    </div>
                    <div>
                        <label class="block text-sm mb-1">Kode Pos</label>
                        <input type="text" name="kode_pos" class="w-full border border-gray-300 rounded-md px-3 py-2"
                            placeholder="Kode Pos">
                    </div>

                    <!-- Tombol Simpan -->
                    <div class="flex justify-center pt-4">
                        <button class="bg-orange-500 hover:bg-orange-600  text-white px-6 py-2 rounded-md">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

   @include('layouts.footer')
@endsection
