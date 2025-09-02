@extends('layouts.index')
@section('content')
    <form id="hapus-profile" method="POST"  action="{{ route('profile.destroy', Auth::user()->pelamar->id) }}">
        @csrf
        @method('PUT')
    </form>

    <form action="{{ route('profile.update', Auth::user()->pelamar->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h2 class="text-xl font-semibold mb-6 mt-10 ml-12">Profil Akun</h2>
        <div class="bg-white  mx-12">
            <!-- Header: Avatar + Tombol -->
            <div class="border border-orange-300">
                <div class=" border-orange-500 border-rounded-lg p-8 flex items-center justify-between">

                    <!-- Kiri: Foto + Upload/Remove -->

                    <div class="flex items-center gap-8">
                        <!-- Avatar + Select -->
                        <div class="flex flex-col items-center">
                            <div class="relative">
                                @if (Auth::user()->pelamar->img_profile)
                                    <img id="pp" class="w-40 h-40 sm:w-40 object-cover rounded-full mb-3 profile-img"
                                        src="{{ asset('storage/' . Auth::user()->pelamar->img_profile) }}" alt="Profile">
                                @else
                                    <img id="pp" class="w-40 h-40 sm:w-40 object-cover rounded-full mb-3"
                                        src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                                        alt="">
                                @endif
                                </span>
                            </div>

                            <!-- Select Box -->
                            <div class="relative inline-block mt-2 w-32">
                                <select
                                    class="w-full border-2 border-orange-500 text-orange-500 font-semibold rounded-md px-2 py-1 text-xs cursor-pointer appearance-none bg-white">
                                    <option selected>Pelamar Aktif</option>
                                    <option>Pelamar Nonaktif</option>
                                    <option>Menunggu Review</option>
                                </select>

                            </div>
                        </div>

                        <!-- Tombol Upload & Remove -->
                        <div class="flex items-center gap-2">
                            <label
                                class="flex items-center gap-1 border border-orange-400 text-orange-500 px-3 py-1.5 rounded-md text-sm font-medium hover:bg-orange-50">
                                <input type="file" name="img_profile" id="fileinput" accept="image/*" class="hidden">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5-5m0 0l5 5m-5-5v12" />
                                </svg>
                                Upload
                            </label>

                            <button form="hapus-profile" type="submit"
                                class="flex items-center gap-1 border px-3 py-1.5 rounded-md text-sm font-medium text-gray-600 hover:bg-gray-100">
                                <i class="ph ph-trash text-2xl"></i>
                                <span>Remove</span>
                            </button>
                        </div>
                    </div>

                    <!-- Bagian Kanan (Tombol CV & Simpan) -->
                    <div class="flex items-center gap-2">
                        <button
                            class="bg-orange-500 text-white text-sm font-semibold px-4 py-2 rounded hover:bg-orange-600">
                            Unduh CV
                        </button>
                        <button type="submit"
                            class="bg-green-600 text-white text-sm font-semibold px-4 py-2 rounded hover:bg-green-700">
                            Simpan
                        </button>
                    </div>
                </div>

            </div><br>



            <div style="display: flex; justify-content: space-between; width: 800px; margin: 20px 0;">
                <div style="font-weight: bold; border-bottom: 3px solid orange; padding-bottom: 5px; width: 40%;">
                    Data Diri
                </div>
                <div style="font-weight: bold; border-bottom: 3px solid orange; padding-bottom: 5px; width: 40%;">
                    Informasi Akun

                </div>
            </div>



            <!-- Grid: Dua Kolom -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Kolom Kiri -->
                <div class="flex flex-col gap-4">
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
                                        {{ Auth::user()->pelamar->gender === 'laki-Laki' ? 'checked' : '' }}>
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
                                        class="w-4 h-4 text-orange-500 border-2 border-orange-500"
                                    Laki - Laki
                                </label>
                                <label class="flex items-center gap-2">
                                    <input type="radio" name="gender"
                                        value="perempuan"
                                        class="w-4 h-4 text-orange-500 border-2 border-orange-500"
                                    Perempuan
                                </label>
                            </div>
                        </div>
                    @endif

                    @if (Auth::user()->pelamar->tanggal_lahir)
                        <div>
                            <label class="text-sm font-medium">Tanggal Lahir <span class="text-red-500">*</span></label>
                            <input type="Date" name="tanggal_lahir" class="w-full mt-1 border rounded-md px-3 py-2 text-sm text-gray-500 " name="tempat_lahir"
                                value="{{ Auth::user()->pelamar->tanggal_lahir }}">
                        </div>
                    @else
                        <div>
                            <label class="text-sm font-medium">Tanggal Lahir <span class="text-red-500">*</span></label>
                            <input type="Date" name="tanggal_lahir" class="w-full mt-1 border rounded-md px-3 py-2 text-sm text-gray-500 ">
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
                            <textarea placeholder="Deskripsikan diri anda secara singkat" name="deskripsi_diri" class="w-full mt-1 border rounded-md px-3 py-2 text-sm">{{ Auth::user()->pelamar->deskripsi_diri }}</textarea>
                        </div>
                    @else
                        <div>
                            <label class="text-sm font-medium">Deskripsi Diri <span class="text-red-500">*</span></label>
                            <textarea placeholder="Deskripsikan diri anda secara singkat" name="deskripsi_diri" class="w-full mt-1 border rounded-md px-3 py-2 text-sm"></textarea>
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



                    <!-- Bagian Organisasi -->
                    {{-- Jika user punya data organisasi --}}
                    @if (Auth::user()->pelamar->pengalaman_organisasi->count() > 0)
                        <label class="text-sm font-medium">Organisasi</label>
                        <div class="p-4 bg-gray-100 rounded-lg">
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
                            <button data-modal-target="show-org" data-modal-toggle="show-org" type="button"
                                class="ph-fill ph-pencil-simple text-orange-500">
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
                        <div class="p-4 bg-gray-100 rounded-lg">
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
                            <button data-modal-target="show-kerja" data-modal-toggle="show-kerja" type="button"
                                class="ph-fill ph-pencil-simple text-orange-500">
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
                        <div class="p-4 bg-gray-100 rounded-lg">
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
                            <button data-modal-target="show-skill" data-modal-toggle="show-skill" type="button"
                                class="ph-fill ph-pencil-simple text-orange-500">
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
                        <input type="text" name="instagram" placeholder="Instagram" class="w-full border rounded-md px-3 py-2 text-sm"
                            value="{{ Auth::user()->pelamar->sosmed()->latest()->first()->instagram ?? '' }}">
                        <label class="text-sm font-medium">Linkedin<span class="text-red-500"></span></label>
                        <input type="text" name="linkedin" placeholder="LinkedIn" class="w-full border rounded-md px-3 py-2 text-sm"
                            value="{{ Auth::user()->pelamar->sosmed()->latest()->first()->linkedin ?? '' }}">
                        <label class="text-sm font-medium">Website<span class="text-red-500"></span></label>
                        <input type="text" name="website" placeholder="Website" class="w-full border rounded-md px-3 py-2 text-sm"
                            value="{{ Auth::user()->pelamar->sosmed()->latest()->first()->website ?? '' }}">
                        <label class="text-sm font-medium">Twitter<span class="text-red-500">*</span></label>
                        <input type="text" name="twitter" placeholder="Twitter" class="w-full border rounded-md px-3 py-2 text-sm"
                            value="{{ Auth::user()->pelamar->sosmed()->latest()->first()->twitter ?? '' }}">
                    </div><br>
                </div>

                <!-- Kolom Kanan -->
                <div class="flex flex-col gap-4">
                    <div>
                        <label class="text-sm font-medium">ID Pengguna</label>
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
                        <div class="w-30 h-1 bg-orange-500 mt-1"></div><br>
                        <div class="flex items-center gap-2 mt-1">
                            <input type="number" placeholder="Rp. -" name="gaji_minimal" value="{{ Auth::user()->pelamar->gaji_minimal ?? '' }}"
                                class="border border-black rounded-md px-4 py-2 text-gray-500 w-29">
                            <span>—</span>
                            <input type="text" placeholder="Rp. -" name="gaji_maksimal" value="{{ Auth::user()->pelamar->gaji_maksimal ?? '' }}"
                                class="border border-black rounded-md px-4 py-2 text-sm w-29">
                        </div>
                        <input type="range" class="w-full mt-4 accent-gray-700 ">
                    </div>

                    <!-- Catatan -->
                    <div class="text-orange-500 text-sm space-y-2 mt-2">
                        <p>✓ Setelah menjadi kandidat AreaKerja, CV anda akan otomatis terunggah ke etalase perusahaan</p>
                        <p>✓ Range gaji akan tampil pada profil anda di etalase perusahaan</p>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </form>
    @include('non-user.profile.kerja.modal-createkerja')
    @include('non-user.profile.skill.modal-create')
    @include('non-user.profile.organisasi.modal-createorganisasi')
    
    @include('non-user.profile.organisasi.modal-show')
    @include('non-user.profile.skill.modal-show')
    @include('non-user.profile.kerja.modal-show')
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
    @include('layouts.footer')
@endsection
