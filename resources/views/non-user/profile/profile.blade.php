@extends('layouts.index')
@section('content')


    <form action="{{ route('profile.update', Auth::user()->pelamar->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h2 class="text-xl font-semibold mb-6 mt-24 ml-12">Profil Akun</h2>
        <div class="bg-white  mx-12">
            <!-- Header: Avatar + Tombol -->
            <div class="border-2 border-orange-300 rounded-md">
                <div class=" border-orange-500 border-rounded-lg p-8 flex items-center justify-between">
                    <!-- Kiri: Foto + Upload/Remove -->
                    <div class="flex items-center gap-8">
                        <!-- Avatar + Select -->
                        <div class="flex flex-col items-center">
                            <div class="relative inline-block">
                                @if (Auth::user()->pelamar->img_profile)
                                    <img id="pp" class="w-40 h-40 object-cover rounded-full"
                                        src="{{ asset('storage/' . Auth::user()->pelamar->img_profile) }}" alt="Profile">
                                @else
                                    <img id="pp" class="w-40 h-40 object-cover rounded-full"
                                        src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                                        alt="Profile">
                                @endif

                                <!-- Tombol Edit -->
                                <div
                                    class="absolute bottom-2 right-2 bg-orange-600 rounded-full p-2 cursor-pointer shadow-md">
                                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.83752 2.24552C10.0542 2.02888 10.0542 1.66782 9.83752 1.4623L8.5377 0.162477C8.33218 -0.0541591 7.97112 -0.0541591 7.75448 0.162477L6.7324 1.179L8.81544 3.26205M0 7.91696V10H2.08304L8.22664 3.85085L6.14359 1.76781L0 7.91696Z"
                                            fill="white" />
                                    </svg>
                                </div>
                            </div>


                            <!-- Select Box -->
                            <div class="relative inline-block mt-4 w-[95%]">
                                @php
                                    $status = '';

                                    if ($pelamar->kategori === 'pelamar') {
                                        $status = 'Pelamar Aktif';
                                    } elseif (in_array($pelamar->kategori, ['calon kandidat', 'kandidat aktif'])) {
                                        $status = 'Belum Bekerja';
                                    } elseif ($pelamar->kategori === 'kandidat nonaktif') {
                                        $status = 'Bekerja';
                                    }
                                @endphp

                                <select id="statusSelect"
                                    class="w-full border border-orange-500 text-orange-500 font-semibold rounded-md px-2 py-1 text-xs cursor-pointer appearance-none bg-white">

                                    <option value="Pelamar Aktif" {{ $status == 'Pelamar Aktif' ? 'selected' : '' }}>
                                        Pelamar Aktif
                                    </option>

                                    <option value="Belum Bekerja" {{ $status == 'Belum Bekerja' ? 'selected' : '' }}>
                                        Belum Bekerja
                                    </option>

                                    <option value="Bekerja" {{ $status == 'Bekerja' ? 'selected' : '' }}>
                                        Bekerja
                                    </option>

                                </select>

                                <input type="hidden" id="kategoriPelamar" value="{{ $pelamar->kategori }}">

                            </div>
                        </div>

                        <!-- Tombol Upload & Remove -->
                        <div class="flex items-center gap-3">

                            <label
                                class="flex items-center gap-1 border border-orange-400 text-orange-500 px-3 py-2 rounded-md text-sm font-medium hover:bg-orange-50">
                                <input type="file" name="img_profile" id="fileinput" accept="image/*" class="hidden">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5-5m0 0l5 5m-5-5v12" />
                                </svg>
                                Upload
                            </label>

                            <button type="button"
                                onclick="event.preventDefault(); document.getElementById('removeForm').submit();"
                                class="px-3 py-2 flex items-center gap-1 border border-gray-400 rounded text-sm text-gray-600 hover:bg-gray-100">
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

                    <!-- Bagian Kanan (Tombol CV & Simpan) -->
                    <div class="flex items-center gap-2">
                        <a href="{{ route('cv.download', Auth::user()->pelamar->id) }}"
                            class="bg-orange-500 text-white text-sm font-semibold px-4 py-2 rounded hover:bg-orange-600">
                            Unduh CV
                        </a>
                        <button type="submit"
                            class="bg-green-600 text-white text-sm font-semibold px-4 py-2 rounded hover:bg-green-700">
                            Simpan
                        </button>
                    </div>
                </div>

            </div><br>


            <!-- <div class="flex justify-between w-[1025px] my-5">
                                                    <div class="w-2/5 border-b-4 border-orange-400 pb-1 font-semibold">
                                                        Data Diri
                                                    </div>
                                                    <div class="w-2/5 border-b-4 border-orange-400 pb-1 font-semibold">
                                                        Informasi Akun
                                                    </div>
                                                </div> -->


            <!-- Grid: Dua Kolom -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Kolom Kiri -->
                <div class="flex flex-col gap-4">
                    <label class="text-lg font-medium">Data Diri</label>
                    <div class="w-30 h-1 bg-orange-500 mt-1"></div><br>
                    @csrf
                    @method('PUT')

                    @if (Auth::user()->pelamar->nama_pelamar)
                        <div>
                            <label class="text-sm font-medium">Nama Lengkap <span class="text-red-500">*</span></label>
                            <input type="text" placeholder="Nama Lengkap" name="nama_pelamar"
                                value="{{ Auth::user()->pelamar->nama_pelamar }}"
                                class="w-full mt-1 border rounded-md px-3 py-2 text-sm">
                        </div>
                    @else
                        <div>
                            <label class="text-sm font-medium">Nama Lengkap <span class="text-red-500">*</span></label>
                            <input type="text" placeholder="Nama Lengkap" name="nama_pelamar"
                                class="w-full mt-1 border rounded-md px-3 py-2 text-sm">
                        </div>
                    @endif

                    @if (Auth::user()->pelamar && Auth::user()->pelamar->gender)
                        <div>
                            <label class="text-sm font-medium">Gender <span class="text-red-500">*</span></label>
                            <div class="flex gap-6 mt-2 text-sm">
                                <label class="flex items-center gap-2">
                                    <input type="radio" name="gender" value="laki-laki"
                                        class="w-4 h-4 text-orange-500 border-2 border-orange-500"
                                        {{ Auth::user()->pelamar->gender === 'laki-laki' ? 'checked' : '' }}>
                                    Laki - Laki
                                </label>
                                <label class="flex items-center gap-2">
                                    <input type="radio" name="gender" value="perempuan"
                                        class="w-4 h-4 text-orange-500 border-2 border-orange-500"
                                        {{ Auth::user()->pelamar->gender === 'perempuan' ? 'checked' : '' }}>
                                    Perempuan
                                </label>
                            </div>
                        </div>
                    @else
                        <div>
                            <label class="text-sm font-medium">Gender <span class="text-red-500">*</span></label>
                            <div class="flex gap-6 mt-2 text-sm">
                                <label class="flex items-center gap-2">
                                    <input type="radio" name="gender" value="laki-laki"
                                        class="w-4 h-4 text-orange-500 border-2 border-orange-500"> Laki - Laki </label>
                                <label class="flex items-center gap-2">
                                    <input type="radio" name="gender" value="perempuan"
                                        class="w-4 h-4 text-orange-500 border-2 border-orange-500"> Perempuan </label>
                            </div>
                        </div>
                    @endif

                    @if (Auth::user()->pelamar->tanggal_lahir)
                        <div>
                            <label class="text-sm font-medium">Tanggal Lahir <span class="text-red-500">*</span></label>
                            <input type="Date" name="tanggal_lahir"
                                class="w-full mt-1 border rounded-md px-3 py-2 text-sm text-gray-500 " name="tempat_lahir"
                                value="{{ Auth::user()->pelamar->tanggal_lahir }}">
                        </div>
                    @else
                        <div>
                            <label class="text-sm font-medium">Tanggal Lahir <span class="text-red-500">*</span></label>
                            <input type="Date" name="tanggal_lahir"
                                class="w-full mt-1 border rounded-md px-3 py-2 text-sm text-gray-500 ">
                        </div>
                    @endif

                    @if (Auth::user()->pelamar->telepon_pelamar)
                        <div>
                            <label class="text-sm font-medium">No. Tlp <span class="text-red-500">*</span></label>
                            <input type="text" placeholder="No. Tlp" name="telepon_pelamar"
                                class="w-full mt-1 border rounded-md px-3 py-2 text-sm"
                                value="{{ Auth::user()->pelamar->telepon_pelamar }}">
                        </div>
                    @else
                        <div>
                            <label class="text-sm font-medium">No. Tlp <span class="text-red-500">*</span></label>
                            <input type="text" placeholder="No. Tlp" name="telepon_pelamar"
                                class="w-full mt-1 border rounded-md px-3 py-2 text-sm">
                        </div>
                    @endif

                    @if (Auth::user()->pelamar->deskripsi_diri)
                        <div>
                            <label class="text-sm font-medium">Deskripsi Diri <span class="text-red-500">*</span></label>
                            <textarea placeholder="Deskripsikan diri anda secara singkat" name="deskripsi_diri"
                                class="auto-grow w-full mt-1 border rounded-md px-3 py-2 text-sm max-h-4">{{ Auth::user()->pelamar->deskripsi_diri }}</textarea>
                        </div>
                    @else
                        <div>
                            <label class="text-sm font-medium">Deskripsi Diri <span class="text-red-500">*</span></label>
                            <textarea placeholder="Deskripsikan diri anda secara singkat" name="deskripsi_diri"
                                class="auto-grow w-full mt-1 border rounded-md px-3 py-2 text-sm"></textarea>
                        </div>
                    @endif

                    <div>
                        @if (Auth::user()->pelamar->alamat_pelamar->count() >= 1)
                            <a href="{{ route('alamat') }}"
                                class="w-full flex justify-between items-center px-4 py-3 bg-orange-500 hover:bg-orange-600 
                              border border-orange-500 text-white rounded-md text-sm">
                                <label class="text-sm font-medium">Alamat <span class="text-red-500"></span></label>
                            </a>
                        @else
                            <a href="{{ route('form_alamat') }}"
                                class="w-full flex justify-between items-center px-4 py-3 bg-orange-500 hover:bg-orange-600 
                              border border-orange-500 text-white rounded-md text-sm">
                                <label class="text-sm font-medium">Alamat <span class="text-red-500"></span></label>
                            </a>
                        @endif
                    </div>

                    {{-- bagian pendidikan --}}
                    @if (Auth::user()->pelamar->riwayat_pendidikan->count() > 0)
                        <label class="text-sm font-medium">Pendidikan</label>
                        <div class="flex justify-between">
                            <div class="p-4 w-full bg-gray-100 rounded-lg">
                                @foreach (Auth::user()->pelamar->riwayat_pendidikan as $pend)
                                    <div class="mb-6">
                                        <h3 class="font-semibold text-gray-800 text-lg">
                                            {{ $pend->asal_pendidikan }} - {{ $pend->pendidikan }}
                                            ({{ $pend->tahun_awal }} - {{ $pend->tahun_akhir }})
                                        </h3>
                                        <p class="text-gray-600 text-sm leading-relaxed">
                                            {{ $pend->jurusan }}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                            <button data-modal-target="show-pendidikan" data-modal-toggle="show-pendidikan"
                                type="button" class="mb-20 ml-4">
                                <svg width="18" height="16" viewBox="0 0 10 11" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.83752 2.87443C10.0542 2.65779 10.0542 2.29673 9.83752 2.0912L8.5377 0.791384C8.33218 0.574747 7.97112 0.574747 7.75448 0.791384L6.7324 1.80791L8.81544 3.89095M0 8.54586V10.6289H2.08304L8.22664 4.47976L6.14359 2.39672L0 8.54586Z"
                                        fill="#FA6601" />
                                </svg>
                            </button>
                        </div>
                    @else
                        <div class="mb-4">
                            <label class="block text-sm font-semibold text-gray-800 mb-1">Pendidikan</label>
                            <button data-modal-target="create_pendidikanmodal" data-modal-toggle="create_pendidikanmodal"
                                type="button"
                                class="flex items-center justify-between border border-orange-500 rounded-md w-full px-4 py-3 text-orange-500 font-semibold">
                                <span>Tambahkan Pendidikan</span>
                                <span class="text-2xl font-bold">+</span>
                            </button>
                        </div>
                    @endif

                    <!-- Bagian Organisasi -->
                    {{-- Jika user punya data organisasi --}}
                    @if (Auth::user()->pelamar->pengalaman_organisasi->count() > 0)
                        <label class="text-sm font-medium">Organisasi</label>
                        <div class="flex justify-between">
                            <div class="p-4 w-full bg-gray-100 rounded-lg">
                                @foreach (Auth::user()->pelamar->pengalaman_organisasi as $org)
                                    <div class="mb-6">
                                        <h3 class="font-semibold text-gray-800 text-lg">
                                            {{ $org->jabatan }} - {{ $org->nama_organisasi }}
                                            ({{ $org->tahun_awal }} - {{ $org->tahun_akhir }})
                                        </h3>
                                        <p class="text-gray-600 text-sm leading-relaxed">
                                            {{ $org->deskripsi }}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                            <button data-modal-target="show-org" data-modal-toggle="show-org" type="button"
                                class="mb-20 ml-4">
                                <svg width="18" height="16" viewBox="0 0 10 11" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.83752 2.87443C10.0542 2.65779 10.0542 2.29673 9.83752 2.0912L8.5377 0.791384C8.33218 0.574747 7.97112 0.574747 7.75448 0.791384L6.7324 1.80791L8.81544 3.89095M0 8.54586V10.6289H2.08304L8.22664 4.47976L6.14359 2.39672L0 8.54586Z"
                                        fill="#FA6601" />
                                </svg>
                            </button>
                        </div>
                    @else
                        <div class="mb-4">
                            <label class="block text-sm font-semibold text-gray-800 mb-1">Organisasi</label>
                            <button data-modal-target="create_organisasimodal" data-modal-toggle="create_organisasimodal"
                                type="button"
                                class="flex items-center justify-between border border-orange-500 rounded-md w-full px-4 py-3 text-orange-500 font-semibold">
                                <span>Tambahkan Organisasi</span>
                                <span class="text-2xl font-bold">+</span>
                            </button>
                        </div>
                    @endif

                    {{-- Jika user punya data kerja --}}
                    @if (Auth::user()->pelamar->pengalaman_kerja->count() > 0)
                        <label class="text-sm font-medium">Pengalaman Kerja <span class="text-red-500"></span></label>
                        <div class="flex justify-between">
                            <div class="p-4 w-full bg-gray-100 rounded-lg">
                                @foreach (Auth::user()->pelamar->pengalaman_kerja as $kerja)
                                    <div class="mb-6">
                                        <h3 class="font-semibold text-gray-800 text-lg">
                                            {{ $kerja->posisi_pekerjaan }} - {{ $kerja->nama_perusahaan }}
                                            ({{ $kerja->tahun_awal }} - {{ $kerja->tahun_akhir }})
                                        </h3>
                                        <p class="text-gray-600 text-sm leading-relaxed">
                                            {{ $kerja->deskripsi }}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                            <button data-modal-target="show-kerja" data-modal-toggle="show-kerja" type="button"
                                class="mb-20 ml-4">
                                <svg width="18" height="16" viewBox="0 0 10 11" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.83752 2.87443C10.0542 2.65779 10.0542 2.29673 9.83752 2.0912L8.5377 0.791384C8.33218 0.574747 7.97112 0.574747 7.75448 0.791384L6.7324 1.80791L8.81544 3.89095M0 8.54586V10.6289H2.08304L8.22664 4.47976L6.14359 2.39672L0 8.54586Z"
                                        fill="#FA6601" />
                                </svg>
                            </button>
                        </div>
                    @else
                        {{-- Kalau belum ada data, tampil tombol --}}
                        <div class="mb-4">
                            <label class="block text-sm font-semibold text-gray-800 mb-1">Pengalaman Kerja</label>
                            <button data-modal-target="create_kerjamodal" data-modal-toggle="create_kerjamodal"
                                type="button"
                                class="flex items-center justify-between border border-orange-500 rounded-md w-full px-4 py-3 text-orange-500 font-semibold">
                                <span>Tambahkan Pengalaman Kerja</span>
                                <span class="text-2xl font-bold">+</span>
                            </button>
                        </div>
                    @endif


                    {{-- SKILL --}}
                    @if (Auth::user()->pelamar->skill->count() > 0)
                        <label class="text-sm font-medium">Skill</label>
                        <div class="flex justify-between">
                            <div class="p-4 w-full bg-gray-100 rounded-lg">
                                @foreach (Auth::user()->pelamar->skill as $sk)
                                    <div class="mb-6">
                                        <h3 class="font-semibold text-gray-800 text-lg">
                                            {{ $sk->skill }}
                                        </h3>
                                        <p class="text-gray-600 text-sm leading-relaxed">
                                            {{ $sk->experience_level }}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                            <button data-modal-target="show-skill" data-modal-toggle="show-skill" type="button"
                                class="mb-20 ml-4">
                                <svg width="18" height="16" viewBox="0 0 10 11" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.83752 2.87443C10.0542 2.65779 10.0542 2.29673 9.83752 2.0912L8.5377 0.791384C8.33218 0.574747 7.97112 0.574747 7.75448 0.791384L6.7324 1.80791L8.81544 3.89095M0 8.54586V10.6289H2.08304L8.22664 4.47976L6.14359 2.39672L0 8.54586Z"
                                        fill="#FA6601" />
                                </svg>
                            </button>
                        </div>
                    @else
                        <div class="mb-4">
                            <label class="block text-sm font-semibold text-gray-800 mb-1">Skill</label>
                            <button data-modal-target="create_skillmodal" data-modal-toggle="create_skillmodal"
                                type="button"
                                class="flex items-center justify-between border border-orange-500 rounded-md w-full px-4 py-3 text-orange-500 font-semibold">
                                <span>Tambahkan Skill</span>
                                <span class="text-2xl font-bold">+</span>
                            </button>
                        </div>
                    @endif

                    <!-- Sosial Media -->
                    <div class="flex flex-col gap-2">
                        <label class="text-lg font-medium">Sosial Media</label>
                        <div class="w-30 h-1 bg-orange-500 mt-1"></div><br>
                        <label class="text-sm font-medium">Instagram <span class="text-red-500"></span></label>
                        <input type="text" name="instagram" placeholder="Instagram"
                            class="w-full border rounded-md px-3 py-2 text-sm"
                            value="{{ Auth::user()->pelamar->sosmed()->latest()->first()->instagram ?? '' }}">
                        <label class="text-sm font-medium">Linkedin<span class="text-red-500"></span></label>
                        <input type="text" name="linkedin" placeholder="LinkedIn"
                            class="w-full border rounded-md px-3 py-2 text-sm"
                            value="{{ Auth::user()->pelamar->sosmed()->latest()->first()->linkedin ?? '' }}">
                        <label class="text-sm font-medium">Website<span class="text-red-500"></span></label>
                        <input type="text" name="website" placeholder="Website"
                            class="w-full border rounded-md px-3 py-2 text-sm"
                            value="{{ Auth::user()->pelamar->sosmed()->latest()->first()->website ?? '' }}">
                        <label class="text-sm font-medium">Twitter<span class="text-red-500">*</span></label>
                        <input type="text" name="twitter" placeholder="Twitter"
                            class="w-full border rounded-md px-3 py-2 text-sm"
                            value="{{ Auth::user()->pelamar->sosmed()->latest()->first()->twitter ?? '' }}">
                    </div><br>
                </div>

                <!-- Kolom Kanan -->
                <div class="flex flex-col gap-4">
                    <label class="text-lg font-medium">Informasi Akun</label>
                    <div class="w-30 h-1 bg-orange-500 mt-1"></div><br>
                    <div>
                        <label class="text-sm font-medium">ID Pengguna <span class="text-red-500">*</span></label>
                        <input type="text" placeholder="ID Pengguna" value="{{ Auth::user()->id }}"
                            class="w-full mt-1 border rounded-md px-3 py-2 text-sm">
                    </div>

                    <div>
                        <label class="text-sm font-medium">Nama Pengguna <span class="text-red-500">*</span></label>
                        <input type="text" placeholder="Nama Pengguna" value="{{ Auth::user()->username }}"
                            class="w-full mt-1 border rounded-md px-3 py-2 text-sm">
                    </div>

                    <div>
                        <label class="text-sm font-medium">Email <span class="text-red-500">*</span></label>
                        <div class="flex items-center gap-2">
                            <!-- Input -->
                            <input type="email" placeholder="Email" value="{{ Auth::user()->email }}"
                                class="w-full mt-1 border rounded-md px-3 py-2 text-sm focus:outline-none">


                            <!-- Icon di luar border -->
                            <a href="{{ route('email.ubah') }}" class="mt-1 text-orange-500 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5 h-5"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71
                                                                                                                                    7.04a1.003 1.003 0 0 0 0-1.42l-2.34-2.34a1.003
                                                                                                                                  1.003 0 0 0-1.42 0l-1.83 1.83 3.75
                                                                                                                                3.75 1.84-1.82z" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div>
                        <label class="text-sm font-medium">Kata Sandi <span class="text-red-500">*</span></label>
                        <div class="flex items-center gap-2">
                            <!-- Input -->
                            <input type="password" placeholder="Kata sandi" value=""
                                class="w-full mt-1 border rounded-md px-3 py-2 text-sm focus:outline-none">

                            <!-- Icon di luar border -->
                            <span class="mt-1 text-orange-500 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5 h-5"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71
                                                                                                                                                                                                                                                                                                                           7.04a1.003 1.003 0 0 0 0-1.42l-2.34-2.34a1.003
                                                                                                                                                                                                                                                                                                                           1.003 0 0 0-1.42 0l-1.83 1.83 3.75
                                                                                                                                                                                                                                                                                                                           3.75 1.84-1.82z" />
                                </svg>
                            </span>
                        </div>

                    </div>

                    <!-- Ekspektasi Gaji -->
                    <div>
                        <label class="text-lg font-medium">Ekspektasi Gaji</label>
                        <div class="w-30 h-1 bg-orange-500 mt-3"></div><br>
                        <div class="flex items-center gap-2 mt-1">
                            <div class="border border-black rounded-md px-4 py-2 text-orange-500 w-29">
                                <span class="text-orange-500">Rp.</span>
                                <input type="number" placeholder="" name="gaji_minimal"
                                    value="{{ Auth::user()->pelamar->gaji_minimal ?? '' }}">
                            </div>
                            <span>-</span>
                            <div class="border border-black rounded-md px-4 py-2 w-29">
                                <span>Rp.</span>
                                <input type="number" placeholder="" name="gaji_maksimal"
                                    value="{{ Auth::user()->pelamar->gaji_maksimal ?? '' }}">
                            </div>
                        </div>
                        <input type="range" class="w-full mt-4 accent-orange-600">
                    </div>

                    <!-- Catatan -->
                    <div class="text-orange-500 text-sm space-y-2 mt-2">
                        <p>✓ Setelah menjadi kandidat AreaKerja, CV anda akan otomatis terunggah ke etalase perusahaan
                        </p>
                        <p>✓ Range gaji akan tampil pada profil anda di etalase perusahaan</p>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </form>

    {{-- Form khusus remove (hidden, tidak kelihatan) --}}
    <form id="removeForm" action="{{ route('profile.destroy', Auth::user()->pelamar->id) }}" method="POST"
        class="hidden">
        @csrf
        @method('DELETE')
    </form>
    @include('non-user.profile.kerja.modal-createkerja')
    @include('non-user.profile.skill.modal-create')
    @include('non-user.profile.organisasi.modal-createorganisasi')
    @include('non-user.profile.pendidikan.modal-create')

    @include('non-user.profile.modal-kategori.modal1')
    @include('non-user.profile.modal-kategori.modal2')

    @include('non-user.profile.organisasi.modal-show')
    @include('non-user.profile.skill.modal-show')
    @include('non-user.profile.kerja.modal-show')
    @include('non-user.profile.pendidikan.modal-show')
    <script>
        document.getElementById('fileinput').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    document.getElementById('pp').setAttribute('src', event.target.result);
                    document.getElementById('pi').setAttribute('src', event.target.result);
                }
                reader.readAsDataURL(file);
            }
        });
    </script>


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


    <script>
        document.addEventListener("DOMContentLoaded", function() {

            console.log("JS siap! Listener aktif.");

            // ===============================
            // STATUS PELAMAR (Trigger Modal 1)
            // ===============================
            const statusSelect = document.getElementById('statusSelect');
            const kategoriInput = document.getElementById('kategoriPelamar');

            if (statusSelect) {
                statusSelect.addEventListener('change', function() {

                    let selected = this.value;
                    let kategori = kategoriInput ? kategoriInput.value : null;

                    console.log("Selected:", selected);
                    console.log("Kategori:", kategori);

                    if (selected === 'Bekerja' && kategori === 'kandidat aktif') {
                        document.getElementById('modalPeringatan').classList.remove('hidden');
                    }
                });
            }

            // ===============================
            // MODAL PERINGATAN
            // ===============================
            const yaPeringatan = document.getElementById('yaPeringatan');
            const tidakPeringatan = document.getElementById('tidakPeringatan');

            if (yaPeringatan) {
                yaPeringatan.onclick = function() {
                    document.getElementById('modalPeringatan').classList.add('hidden');
                    document.getElementById('modalNonaktif').classList.remove('hidden');
                };
            }

            if (tidakPeringatan) {
                tidakPeringatan.onclick = function() {
                    document.getElementById('modalPeringatan').classList.add('hidden');
                    statusSelect.value = ""; // Kembali kosong
                };
            }

            // ===============================
            // MODAL NONAKTIF
            // ===============================
            const yaNonaktif = document.getElementById('yaNonaktif');
            const tidakNonaktif = document.getElementById('tidakNonaktif');

            if (yaNonaktif) {
                yaNonaktif.onclick = function() {

                    fetch("/pelamar/update-kategori/{{ $pelamar->id }}", {
                            method: "PUT",
                            headers: {
                                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                "Accept": "application/json",
                                "Content-Type": "application/json",
                            },
                            body: JSON.stringify({
                                kategori: "kandidat nonaktif"
                            }),
                        })
                        .then(res => res.json())
                        .then(data => {
                            location.reload();
                        });

                };
            }

            if (tidakNonaktif) {
                tidakNonaktif.onclick = function() {
                    document.getElementById('modalNonaktif').classList.add('hidden');
                    statusSelect.value = "";
                };
            }

        });
    </script>



    @include('layouts.footer')
@endsection
