@extends('super_admin.sidebar.index')
@section('sidebarsuperadmin')
    <div class="p-4 sm:ml-64">
        <div class="bg-white">
            <div class="w-full max-w-4xl mx-auto mt-10 px-6 overflow-y-auto translate-x-30">

                <!-- HEADER -->
                <div class="flex justify-between items-center pb-4 mb-8">
                    <h1 class="text-xl font-bold text-gray-800">Edit Talent Hunter</h1>
                </div>

                <div
                    class="w-full max-w-4xl mx-auto mt-10 p-6 bg-white shadow-md rounded-lg border border-gray-400 overflow-y-auto">
                    <div class="mb-6 border-gray-900 pb-5">
                        <h1 class="text-xl font-bold text-gray-800">Edit Data Talent Hunter</h1>
                    </div>

                    <form action="{{ route('superadmin.talent-hunter.update', $talentHunter->id) }}" method="POST"
                        class="space-y-5">
                        @csrf
                        @method('PUT')

                        <!-- Nama Perusahaan (disable) -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700">Nama Perusahaan</label>
                            <input type="text" value="{{ $perusahaan->nama_perusahaan }}" disabled
                                class="w-full border border-gray-400 rounded-md px-3 py-2 mt-1 bg-gray-100 text-gray-600" />
                        </div>

                        <!-- Email (disable) -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" value="{{ $user->email }}" disabled
                                class="w-full border border-gray-400 rounded-md px-3 py-2 mt-1 bg-gray-100 text-gray-600" />
                        </div>

                        <!-- No Telepon (disable) -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">No. Telepon</label>
                            <input type="text" value="{{ $perusahaan->telepon_perusahaan }}" disabled
                                class="w-full border border-gray-400 rounded-md px-3 py-2 mt-1 bg-gray-100 text-gray-600" />
                        </div>

                        <!-- Deskripsi Perusahaan (disable) -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Deskripsi Perusahaan</label>
                            <textarea disabled class="w-full border border-gray-400 rounded-md px-3 py-2 mt-1 bg-gray-100 text-gray-600"
                                rows="3">{{ $perusahaan->deskripsi }}</textarea>
                        </div>

                        <hr class="my-6 border-gray-300">

                        <!-- Alamat (editable) -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Alamat</label>
                            <input type="text" name="alamat" value="{{ old('alamat', $talentHunter->alamat) }}"
                                class="w-full border border-gray-400 rounded-md px-3 py-2 mt-1" />
                        </div>

                        <!-- Posisi -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Posisi yang Dibutuhkan</label>
                            <input type="text" name="posisi" value="{{ old('posisi', $talentHunter->posisi) }}"
                                class="w-full border border-gray-400 rounded-md px-3 py-2 mt-1" />
                        </div>

                        <!-- Pengalaman Kerja -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Pengalaman Kerja</label>
                            <input type="text" name="pengalaman_kerja"
                                value="{{ old('pengalaman_kerja', $talentHunter->pengalaman_kerja) }}"
                                class="w-full border border-gray-400 rounded-md px-3 py-2 mt-1" />
                        </div>

                        <!-- Gender -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Gender</label>
                            <div class="flex space-x-4">
                                <label class="flex items-center space-x-2">
                                    <input type="radio" name="gender" value="Laki-laki" 
                                        {{ $talentHunter->gender == 'Laki-laki' ? 'checked' : '' }}
                                        class="h-4 w-4 text-orange-500 border-2 border-orange-400 focus:ring-orange-500" />
                                    <span class="text-sm font-semibold text-gray-700">Laki-laki</span>
                                </label>

                                <label class="flex items-center space-x-2">
                                    <input type="radio" name="gender" value="Perempuan"
                                        {{ $talentHunter->gender == 'Perempuan' ? 'checked' : '' }}
                                        class="h-4 w-4 text-orange-500 border-2 border-orange-400 focus:ring-orange-500" />
                                    <span class="text-sm font-semibold text-gray-700">Perempuan</span>
                                </label>
                            </div>
                        </div>

                        <!-- Gaji -->
                        <div class="mb-4">
                            <label class="block font-semibold text-gray-800 text-sm mb-1">Gaji</label>
                            <div class="flex items-center space-x-2">
                                <input type="number" name="gaji_awal"
                                    value="{{ old('gaji_awal', $talentHunter->gaji_awal) }}"
                                    class="w-40 border border-gray-400 rounded-md px-3 py-2 focus:outline-none"
                                    placeholder="Min" />
                                <span class="text-gray-500">-</span>
                                <input type="number" name="gaji_akhir"
                                    value="{{ old('gaji_akhir', $talentHunter->gaji_akhir) }}"
                                    class="w-40 border border-gray-400 rounded-md px-3 py-2 focus:outline-none"
                                    placeholder="Max" />
                            </div>
                        </div>

                        <!-- Deskripsi Talent Hunter -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Deskripsi Talent Hunter</label>
                            <textarea name="deskripsi" class="w-full border border-gray-300 rounded-md px-3 py-2 mt-1" rows="3">{{ old('deskripsi', $talentHunter->deskripsi) }}</textarea>
                        </div>

                        <!-- Tombol -->
                        <div class="flex justify-center space-x-4 mt-6">
                            <button type="submit"
                                class="bg-orange-500 hover:bg-orange-600 text-white font-medium text-sm px-8 py-2 rounded-md shadow-sm transition duration-150">
                                Simpan
                            </button>

                            <a href="{{ route('superadmin.talent-hunter.detail', $talentHunter->id) }}"
                                class="border border-orange-500 text-orange-500 hover:bg-gray-100 font-medium text-sm px-9 py-2 rounded-md transition duration-150">
                                Batal
                            </a>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
