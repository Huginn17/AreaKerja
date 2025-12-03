@extends('super_admin.sidebar.index')
@section('sidebarsuperadmin')
    <main class="flex-1 p-6 sm:ml-64 bg-white overflow-x-auto" x-data="{ openNotif: false, openAllNotif: false }">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-medium">
                @if ($kategori === 'non_kandidat')
                    Tambahkan Non Kandidat
                @elseif ($kategori === 'calon_kandidat')
                    Tambahkan Calon Kandidat
                @elseif ($kategori === 'kandidat')
                    Tambahkan Kandidat
                @else
                    Tambahkan Data
                @endif
            </h1>
            <div class="flex items-center gap-3">
                {{-- Tombol Notifikasi --}}
                <button @click="openNotif = true" class="relative">
                    <!-- Icon Lonceng -->
                    <svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_722_7956)">
                            <path
                                d="M23.076 14.9431L22.6747 12.7383L21.1101 13.0055L21.5756 15.5633C21.6168 15.7894 21.7387 15.9922 21.9146 16.127L24.4524 18.0732L24.6985 19.4255L7.4876 22.3654L7.24147 21.0131L8.93911 18.3434C9.05673 18.1585 9.09972 17.9276 9.05861 17.7015L8.43786 14.2911C8.21777 13.0934 8.29153 11.8668 8.65169 10.7352C9.01186 9.60353 9.64569 8.60691 10.4892 7.84595C11.3326 7.08499 12.3559 6.58665 13.4555 6.40126C14.5552 6.21586 15.6924 6.34997 16.7522 6.79004L16.4051 4.88278C15.595 4.65063 14.7612 4.55689 13.9346 4.605L13.6165 2.85717L12.0518 3.12444L12.37 4.87227C10.4802 5.41568 8.87215 6.70676 7.85685 8.49588C6.84155 10.285 6.49109 12.445 6.87324 14.5583L7.42973 17.6158L5.7321 20.2855C5.61447 20.4704 5.57149 20.7013 5.6126 20.9274L6.07815 23.4852C6.11931 23.7114 6.24121 23.9141 6.41702 24.049C6.59284 24.1838 6.80817 24.2396 7.01565 24.2042L12.4919 23.2688L12.647 24.1214C12.8528 25.252 13.4623 26.2659 14.3414 26.9401C15.2205 27.6142 16.2971 27.8934 17.3345 27.7162C18.3719 27.539 19.2851 26.9199 19.8732 25.9951C20.4612 25.0704 20.676 23.9157 20.4702 22.785L20.315 21.9324L25.7912 20.997C25.9987 20.9616 26.1813 20.8378 26.2989 20.6528C26.4165 20.4679 26.4595 20.2369 26.4183 20.0108L25.9528 17.453C25.9116 17.2269 25.7896 17.0241 25.6138 16.8894L23.076 14.9431ZM18.9055 23.0523C19.029 23.7307 18.9002 24.4235 18.5473 24.9784C18.1945 25.5332 17.6466 25.9047 17.0242 26.011C16.4017 26.1173 15.7557 25.9498 15.2283 25.5453C14.7008 25.1408 14.3351 24.5325 14.2117 23.8541L14.0565 23.0015L18.7504 22.1997L18.9055 23.0523Z"
                                fill="black" />
                            {{-- <path
                                d="M22.3629 11.0329C24.0912 10.7376 25.2143 8.97144 24.8714 7.08792C24.5286 5.20441 22.8497 3.91684 21.1214 4.21205C19.3932 4.50727 18.2701 6.27347 18.6129 8.15698C18.9558 10.0405 20.6347 11.3281 22.3629 11.0329Z"
                                fill="black" /> --}}
                        </g>
                    </svg>

                    <!-- Badge jumlah notif belum dibaca -->
                    @if ($global_notifikasi_unread > 0)
                        <span id="notif-badge"
                            class="absolute -top-1 -right-1 bg-red-600 text-white text-xs font-bold px-1.5 py-0.5 rounded-full">
                            {{ $global_notifikasi_unread }}
                        </span>
                    @endif
                </button>

                <div class="flex items-center gap-2 bg-white px-3 py-2 border border-gray-500 shadow-md rounded-2xl">
                    <a href="{{ route('superadmin.profile') }}">
                        @if (Auth::user()->role == 'super_admin')
                            @if (Auth::user()->superadmin?->img_profile)
                                <img id="pu" class="w-10 h-10 object-cover rounded-full profile-img"
                                    src="{{ asset('storage/' . Auth::user()->superadmin->img_profile) }}" alt="Profile">
                            @else
                                <img id="pu" class="w-10 h-10 rounded-full"
                                    src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                                    alt="">
                            @endif
                        @else
                            <img class="w-10 h-10 rounded-full"
                                src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                                alt="">
                        @endif

                    </a>
                    <div class="text-sm">
                        <span class="font-semibold">{{ Auth::user()->username }}</span>
                        <p class="text-gray-500 text-sm">{{ Auth::user()->email }}</p>
                    </div>

                    {{-- <select class="appearance-none px-8 py-2 bg-transparent text-gray-600 text-md focus:outline-none">
                        <option>Text 1</option>
                        <option>Text 2</option>
                        <option>Text 3</option>
                    </select> --}}
                </div>
            </div>
        </div>

        <div class="max-w-6xl mx-auto p-6 bg-white border-2 border-gray-400 rounded-2xl shadow-md">
            <h2 class="text-lg font-semibold mb-10">
                @if ($kategori === 'non_kandidat')
                    Tambahkan Non Kandidat
                @elseif ($kategori === 'calon_kandidat')
                    Tambahkan Calon Kandidat
                @elseif ($kategori === 'kandidat')
                    Tambahkan Kandidat
                @else
                    Tambahkan Data
                @endif
            </h2>



            <!-- Form -->
            @if (!$pelamar)
                <div class="bg-yellow-100 text-yellow-800 p-3 rounded-lg mb-4">
                    ⚠️ Harap buat data pelamar terlebih dahulu sebelum mengisi Sosmed, Alamat, Pendidikan, Organisasi,
                    Pengalaman,
                    dan Skill.
                </div>
            @endif
            @if (session('error'))
                <div x-data="{ show: true }" x-show="show" class="bg-red-500 text-white px-4 py-2 rounded mb-4">
                    {{ session('error') }}
                    <button class="float-right" @click="show=false">✖</button>
                </div>
            @endif
            @if ($errors->any())
                <div class="bg-red-500 text-white px-4 py-2 rounded mb-4">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif



            <form action="{{ route('superadmin.pelamar.store') }}" method="POST" enctype="multipart/form-data"
                class="space-y-4">
                @csrf
                <!-- Header -->
                <div class="flex items-center justify-between mb-10">
                    <div class="flex items-center gap-2">
                        <div>
                            <div>
                                <img id="pp" class="w-40 h-40 object-cover rounded-full border border-gray-300"
                                    src="{{ $pelamar && $pelamar->img_profile
                                        ? asset('storage/' . $pelamar->img_profile)
                                        : 'https://ui-avatars.com/api/?name=' .
                                            urlencode($pelamar->nama_pelamar ?? 'Pelamar') .
                                            '&background=random&color=fff&size=128' }}"
                                    alt="Preview Foto">
                            </div>

                        </div>
                        <label
                            class="flex items-center gap-2 px-4 py-2 text-md border-2 border-orange-600 bg-orange-500 hover:bg-orange-600 text-white rounded-md cursor-pointer">
                            <input type="file" name="img_profile" id="fileinput" accept="image/*" class="hidden">
                            <svg width="11" height="12" viewBox="0 0 11 12" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3.54093 3.22643L4.74938 1.92568V7.34925C4.74938 7.49924 4.80498 7.64309 4.90394 7.74915C5.00291 7.85521 5.13713 7.91479 5.27709 7.91479C5.41705 7.91479 5.55127 7.85521 5.65024 7.74915C5.7492 7.64309 5.8048 7.49924 5.8048 7.34925V1.92568L7.01325 3.22643C7.06231 3.27944 7.12068 3.32151 7.18498 3.35023C7.24929 3.37894 7.31826 3.39372 7.38793 3.39372C7.45759 3.39372 7.52657 3.37894 7.59087 3.35023C7.65518 3.32151 7.71354 3.27944 7.7626 3.22643C7.81206 3.17386 7.85132 3.11131 7.87811 3.04239C7.9049 2.97348 7.9187 2.89956 7.9187 2.8249C7.9187 2.75024 7.9049 2.67632 7.87811 2.6074C7.85132 2.53849 7.81206 2.47594 7.7626 2.42336L5.65176 0.161188C5.60158 0.1097 5.5424 0.0693401 5.47762 0.0424234C5.34914 -0.0141411 5.20504 -0.0141411 5.07656 0.0424234C5.01178 0.0693401 4.9526 0.1097 4.90242 0.161188L2.79158 2.42336C2.74238 2.47609 2.70335 2.53869 2.67672 2.60759C2.65009 2.67648 2.63639 2.75033 2.63639 2.8249C2.63639 2.89947 2.65009 2.97331 2.67672 3.04221C2.70335 3.1111 2.74238 3.1737 2.79158 3.22643C2.84078 3.27916 2.8992 3.32099 2.96348 3.34953C3.02777 3.37807 3.09667 3.39276 3.16625 3.39276C3.23584 3.39276 3.30474 3.37807 3.36903 3.34953C3.43331 3.32099 3.49173 3.27916 3.54093 3.22643ZM10.0265 5.65262C9.88652 5.65262 9.75229 5.7122 9.65333 5.81826C9.55436 5.92432 9.49876 6.06817 9.49876 6.21816V9.61142C9.49876 9.76141 9.44317 9.90526 9.3442 10.0113C9.24524 10.1174 9.11101 10.177 8.97106 10.177H1.58313C1.44317 10.177 1.30895 10.1174 1.20998 10.0113C1.11102 9.90526 1.05542 9.76141 1.05542 9.61142V6.21816C1.05542 6.06817 0.999821 5.92432 0.900856 5.81826C0.801891 5.7122 0.667666 5.65262 0.527709 5.65262C0.387752 5.65262 0.253527 5.7122 0.154562 5.81826C0.0555977 5.92432 0 6.06817 0 6.21816V9.61142C0 10.0614 0.166793 10.4929 0.463687 10.8111C0.760581 11.1293 1.16326 11.3081 1.58313 11.3081H8.97106C9.39093 11.3081 9.7936 11.1293 10.0905 10.8111C10.3874 10.4929 10.5542 10.0614 10.5542 9.61142V6.21816C10.5542 6.06817 10.4986 5.92432 10.3996 5.81826C10.3007 5.7122 10.1664 5.65262 10.0265 5.65262Z"
                                    fill="white" />
                            </svg>

                            Upload
                        </label>
                        <button type="button" id="removeButton"
                            class="flex items-center gap-2 px-4 py-2 text-md border-2 border-orange-600 text-orange-600 rounded-md hover:bg-gray-100">
                            <svg width="11" height="12" viewBox="0 0 11 12" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10.1144 1.7397H7.91564V1.30478C7.91564 0.958727 7.77664 0.626853 7.52923 0.38216C7.28182 0.137467 6.94626 0 6.59636 0H3.95782C3.60793 0 3.27236 0.137467 3.02495 0.38216C2.77754 0.626853 2.63855 0.958727 2.63855 1.30478V1.7397H0.439758C0.323127 1.7397 0.211273 1.78552 0.128802 1.86709C0.0463316 1.94865 0 2.05928 0 2.17463C0 2.28997 0.0463316 2.4006 0.128802 2.48216C0.211273 2.56373 0.323127 2.60955 0.439758 2.60955H0.879515V10.4382C0.879515 10.6689 0.972178 10.8902 1.13712 11.0533C1.30206 11.2164 1.52577 11.3081 1.75903 11.3081H8.79515C9.02841 11.3081 9.25212 11.2164 9.41706 11.0533C9.582 10.8902 9.67467 10.6689 9.67467 10.4382V2.60955H10.1144C10.2311 2.60955 10.3429 2.56373 10.4254 2.48216C10.5079 2.4006 10.5542 2.28997 10.5542 2.17463C10.5542 2.05928 10.5079 1.94865 10.4254 1.86709C10.3429 1.78552 10.2311 1.7397 10.1144 1.7397ZM3.51806 1.30478C3.51806 1.18943 3.56439 1.0788 3.64686 0.997237C3.72933 0.915673 3.84119 0.86985 3.95782 0.86985H6.59636C6.713 0.86985 6.82485 0.915673 6.90732 0.997237C6.98979 1.0788 7.03612 1.18943 7.03612 1.30478V1.7397H3.51806V1.30478ZM8.79515 10.4382H1.75903V2.60955H8.79515V10.4382ZM4.39758 4.78418V8.26358C4.39758 8.37893 4.35124 8.48955 4.26877 8.57112C4.1863 8.65268 4.07445 8.6985 3.95782 8.6985C3.84119 8.6985 3.72933 8.65268 3.64686 8.57112C3.56439 8.48955 3.51806 8.37893 3.51806 8.26358V4.78418C3.51806 4.66883 3.56439 4.5582 3.64686 4.47664C3.72933 4.39507 3.84119 4.34925 3.95782 4.34925C4.07445 4.34925 4.1863 4.39507 4.26877 4.47664C4.35124 4.5582 4.39758 4.66883 4.39758 4.78418ZM7.03612 4.78418V8.26358C7.03612 8.37893 6.98979 8.48955 6.90732 8.57112C6.82485 8.65268 6.713 8.6985 6.59636 8.6985C6.47973 8.6985 6.36788 8.65268 6.28541 8.57112C6.20294 8.48955 6.15661 8.37893 6.15661 8.26358V4.78418C6.15661 4.66883 6.20294 4.5582 6.28541 4.47664C6.36788 4.39507 6.47973 4.34925 6.59636 4.34925C6.713 4.34925 6.82485 4.39507 6.90732 4.47664C6.98979 4.5582 7.03612 4.66883 7.03612 4.78418Z"
                                    fill="#FA6601" />
                            </svg>

                            Remove
                        </button>
                    </div>
                </div>
                <!-- User Info -->
                {{-- <div> 
                    <label class="block text-md font-medium mb-1">User ID <span class="text-red-500">*</span></label>
                    <input type="text" class="w-full mt-1 border-2 border-gray-400 shadow rounded-lg px-3 py-2" placeholder="User ID" />
                </div> --}}
                <div>
                    <label class="block text-md font-medium mb-1">Username <span class="text-red-500">*</span></label>
                    <input type="text" name="username" value="{{ $pelamar?->user?->username }}"
                        class="w-full mt-1 border-2 border-gray-400 shadow rounded-lg px-3 py-2" placeholder="Username" />
                </div>

                <div>
                    <label class="block text-md font-medium mb-1">Email <span class="text-red-500">*</span></label>
                    <input type="email" name="email" value="{{ $pelamar?->user?->email }}"
                        class="w-full mt-1 border-2 border-gray-400 shadow rounded-lg px-3 py-2" placeholder="Email" />
                </div>

                <div>
                    <label class="block text-md font-medium mb-1">Kata Sandi <span class="text-red-500">*</span></label>
                    <input type="password" name="password" value="{{ $pelamar?->user?->password }}"
                        class="w-full mt-1 border-2 border-gray-400 shadow rounded-lg px-3 py-2" placeholder="Kata Sandi" />
                </div>

                <div>
                    <label class="block text-md font-medium mb-1">Nama Lengkap <span class="text-red-500">*</span></label>
                    <input type="text" name="nama_pelamar"
                        class="w-full mt-1 border-2 border-gray-400 shadow rounded-lg px-3 py-2" placeholder="Nama Lengkap"
                        value="{{ $pelamar->nama_pelamar ?? '' }}" />
                </div>

                <!-- No. Telepon -->
                <div>
                    <label class="block text-md font-medium mb-1">No. Telepon <span class="text-red-500">*</span></label>
                    <input type="text" name="telepon_pelamar" value="{{ $pelamar->telepon_pelamar ?? '' }}"
                        class="w-full mt-1 border-2 border-gray-400 shadow rounded-lg px-3 py-2"
                        placeholder="No Telepon" />
                </div>

                <!-- Gender -->
                <div>
                    <div class="mt-2">
                        <label class="block text-md font-medium mb-1">Gender <span class="text-red-500">*</span></label>
                        <div class="flex gap-6 mt-1">
                            <label class="flex items-center gap-2">
                                <input type="radio" name="gender" value="laki-laki"
                                    class="accent-orange-500 border-2 border-orange-500"
                                    {{ old('gender', $pelamar->gender ?? '') == 'laki-laki' ? 'checked' : '' }}>
                                <span>Laki-Laki</span>
                            </label>
                            <label class="flex items-center gap-2">
                                <input type="radio" name="gender" value="perempuan"
                                    class="accent-orange-500 border-2 border-orange-500"
                                    {{ old('gender', $pelamar->gender ?? '') == 'perempuan' ? 'checked' : '' }}>
                                <span>Perempuan</span>
                            </label>
                        </div>

                    </div>

                </div>



                @php
                    $kategori = $kategori ?? request()->route('kategori'); // misalnya dikirim dari controller
                @endphp
                <!-- Hidden input kategori -->
                <input type="hidden" name="kategori"
                    value="@switch($kategori)
        @case('non_kandidat') pelamar @break
        @case('calon_kandidat') calon kandidat @break
        @case('kandidat') kandidat aktif @break
        @default pelamar
    @endswitch">

                @php
                    // Pastikan $pelamar->divisi berupa array (JSON decode)
                    $selectedDivisi = is_array($pelamar?->divisi)
                        ? $pelamar?->divisi
                        : json_decode($pelamar?->divisi, true);

                    // Jika old() ada, gunakan old()
                    $selectedDivisi = old('divisi', $selectedDivisi ?? []);
                @endphp

                {{-- Bidang yang Diminati --}}
                <div id="divisi-wrapper"
                    class="mt-4 {{ in_array($kategori, ['calon_kandidat', 'kandidat']) ? '' : 'hidden' }}">
                    <label class="block text-md font-medium mb-1">Bidang yang Diminati <span
                            class="text-red-500">*</span></label>
                    <select id="divisi" name="divisi[]" multiple
                        class="w-full border-2 border-gray-400 shadow rounded-lg px-3 py-2">
                        @foreach ($divisis as $divisi)
                            <option value="{{ $divisi->divisi }}"
                                {{ in_array($divisi->divisi, $selectedDivisi) ? 'selected' : '' }}>
                                {{ $divisi->divisi }}
                            </option>
                        @endforeach
                    </select>
                </div>
                

                <!-- Alamat -->

                @if (isset($pelamar) && $pelamar->alamat_pelamar->count() > 0)
                    <label class="text-sm font-medium">Alamat</label>
                    <div class="flex justify-between">
                        <div class="p-4 w-full bg-gray-100 rounded-lg">
                            @foreach ($pelamar->alamat_pelamar ?? [] as $almt)
                                <div class="mb-6 border-b border-gray-200 pb-3">
                                    <h3 class="font-semibold text-gray-800 text-lg">
                                        {{ $almt->label }}
                                    </h3>

                                    <p class="text-gray-600 text-sm">
                                        Desa {{ $almt->desa }}, Kecamatan {{ $almt->kecamatan }},
                                        {{ $almt->kota }}, {{ $almt->provinsi }} - {{ $almt->kode_pos }}
                                    </p>

                                    <p class="text-gray-600 text-sm leading-relaxed">
                                        {{ $almt->detail }}
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
                    @php
                        $pelamarSudahAda = isset($pelamar) && $pelamar->id;
                    @endphp
                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-800 mb-1">Alamat</label>
                        <button type="button"
                            class="w-full flex justify-between items-center bg-orange-500 text-white px-4 py-2 rounded-lg"
                            @if (!$pelamarSudahAda) onclick="alert('Harap buat data pelamar terlebih dahulu sebelum menambahkan Alamat.')"
        @else
            data-modal-target="create_alamatmodal" 
            data-modal-toggle="create_alamatmodal" @endif>
                            <span>Alamat</span>
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 11.2789H20.5578M11.2789 2V20.5578" stroke="white" stroke-width="2.65112"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                @endif



                <!-- Pendidikan -->
                @if (isset($pelamar) && $pelamar->riwayat_pendidikan->count() > 0)
                    <label class="text-sm font-medium">Pendidikan</label>
                    <div class="flex justify-between">
                        <div class="p-4 w-full bg-gray-100 rounded-lg">
                            @foreach ($pelamar->riwayat_pendidikan ?? [] as $pend)
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
                        <button data-modal-target="show-pendidikan" data-modal-toggle="show-pendidikan" type="button"
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
                    @php
                        $pelamarSudahAda = isset($pelamar) && $pelamar->id;
                    @endphp
                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-800 mb-1">Pendidikan</label>
                        <button type="button"
                            class="w-full flex justify-between items-center bg-orange-500 text-white px-4 py-2 rounded-lg"
                            @if (!$pelamarSudahAda) onclick="alert('Harap buat data pelamar terlebih dahulu sebelum menambahkan pendidikan.')"
        @else
            data-modal-target="create_pendidikanmodal" 
            data-modal-toggle="create_pendidikanmodal" @endif>
                            <span>Tambahkan Pendidikan</span>
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 11.2789H20.5578M11.2789 2V20.5578" stroke="white" stroke-width="2.65112"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                @endif



                <!-- Organisasi -->
                @if (isset($pelamar) && $pelamar->pengalaman_organisasi->count() > 0)
                    <label class="text-sm font-medium">Organisasi</label>
                    <div class="flex justify-between">
                        <div class="p-4 w-full bg-gray-100 rounded-lg">
                            @foreach ($pelamar->pengalaman_organisasi ?? [] as $org)
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
                    @php
                        $pelamarSudahAda = isset($pelamar) && $pelamar->id;
                    @endphp
                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-800 mb-1">Organisasi</label>
                        <button type="button"
                            class="w-full flex justify-between items-center bg-orange-500 text-white px-4 py-2 rounded-lg"
                            @if (!$pelamarSudahAda) onclick="alert('Harap buat data pelamar terlebih dahulu sebelum menambahkan Organisasi.')"
        @else
            data-modal-target="create_organisasimodal" 
            data-modal-toggle="create_organisasimodal" @endif>
                            <span>Tambahkan Organisasi</span>
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 11.2789H20.5578M11.2789 2V20.5578" stroke="white" stroke-width="2.65112"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                @endif


                <!-- Pengalaman -->
                @if (isset($pelamar) && $pelamar->pengalaman_kerja->count() > 0)
                    <label class="text-sm font-medium">Pengalaman Kerja <span class="text-red-500"></span></label>
                    <div class="flex justify-between">
                        <div class="p-4 w-full bg-gray-100 rounded-lg">
                            @foreach ($pelamar->pengalaman_kerja ?? [] as $kerja)
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
                    @php
                        $pelamarSudahAda = isset($pelamar) && $pelamar->id;
                    @endphp
                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-800 mb-1">Pengalaman</label>
                        <button type="button"
                            class="w-full flex justify-between items-center bg-orange-500 text-white px-4 py-2 rounded-lg"
                            @if (!$pelamarSudahAda) onclick="alert('Harap buat data pelamar terlebih dahulu sebelum menambahkan PEngalaman Kerja.')"
        @else
            data-modal-target="create_kerjamodal" 
            data-modal-toggle="create_kerjamodal" @endif>
                            <span>Tambahkan Pengalaman</span>
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 11.2789H20.5578M11.2789 2V20.5578" stroke="white" stroke-width="2.65112"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                @endif



                <!-- Skill -->
                @if (isset($pelamar) && $pelamar->skill->count() > 0)
                    <label class="text-sm font-medium">Skill</label>
                    <div class="flex justify-between">
                        <div class="p-4 w-full bg-gray-100 rounded-lg">
                            @foreach ($pelamar->skill as $sk)
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
                    @php
                        $pelamarSudahAda = isset($pelamar) && $pelamar->id;
                    @endphp
                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-800 mb-1">Skill</label>
                        <button type="button"
                            class="w-full flex justify-between items-center bg-orange-500 text-white px-4 py-2 rounded-lg"
                            @if (!$pelamarSudahAda) onclick="alert('Harap buat data pelamar terlebih dahulu sebelum menambahkan Skill.')"
        @else
            data-modal-target="create_skillmodal" 
            data-modal-toggle="create_skillmodal" @endif>
                            <span>Tambahkan Skill</span>
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 11.2789H20.5578M11.2789 2V20.5578" stroke="white" stroke-width="2.65112"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                @endif


                <!-- Social Media -->
                @php
                    $disabled = !session('pelamar_terakhir_id') ? 'disabled' : '';
                @endphp

                <div>
                    <label class="block text-lg font-medium mb-5">Social Media</label>

                    <label class="block text-md font-medium">Instagram</label>
                    <input type="text" name="social_media[instagram]" value="{{ $pelamar?->sosmed?->instagram }}"
                        class="w-full mt-1 mb-5 border-2 border-gray-400 shadow rounded-lg px-3 py-2"
                        placeholder="Instagram" {{ $disabled }} />

                    <label class="block text-md font-medium">LinkedIn</label>
                    <input type="text" name="social_media[linkedin]" value="{{ $pelamar?->sosmed?->linkedin }}"
                        class="w-full mt-1 mb-5 border-2 border-gray-400 shadow rounded-lg px-3 py-2"
                        placeholder="LinkedIn" {{ $disabled }} />

                    <label class="block text-md font-medium">Website</label>
                    <input type="text" name="social_media[website]" value="{{ $pelamar?->sosmed?->website }}"
                        class="w-full mt-1 mb-5 border-2 border-gray-400 shadow rounded-lg px-3 py-2"
                        placeholder="Website" {{ $disabled }} />

                    <label class="block text-md font-medium">Twitter</label>
                    <input type="text" name="social_media[twitter]" value="{{ $pelamar?->sosmed?->twitter }}"
                        class="w-full mt-1 mb-5 border-2 border-gray-400 shadow rounded-lg px-3 py-2"
                        placeholder="Twitter" {{ $disabled }} />
                </div>


                <!-- Buttons -->
                <div class="md:col-span-2 flex justify-center items-center gap-4 mt-4">
                    <button type="submit"
                        class="bg-orange-600 text-white font-medium px-10 py-2 rounded-md hover:bg-orange-500 border border-orange-600 transition">Upload
                    </button>
                    <a href={{ route('superadmin.pelamar') }}
                        class="bg-white text-orange-600 font-medium px-12 py-2 rounded-md hover:bg-gray-100 border border-orange-600 transition">Kembali
                    </a>
                </div>
            </form>
        </div>

        <!-- Modal Notifikasi -->
        <div x-data="notifHandler()" x-cloak x-show="openNotif"
            class="fixed inset-0 z-50 flex items-start justify-end p-4" @click.self="openNotif = false">

            <div class="bg-white w-[380px] rounded-xl shadow-lg overflow-hidden">

                <!-- Header -->
                <div class="flex items-center justify-between px-4 py-3 border-b">
                    <h2 class="font-semibold text-lg">Notifikasi</h2>
                    <button @click="openNotif=false; openAllNotif=true" class="text-sm text-orange-500">
                        Lihat semua
                    </button>
                </div>
                <!-- List Notifikasi -->
                <div class="max-h-[400px] overflow-y-auto">
                    @forelse($global_notifikasis as $notif)
                        <div data-id="{{ $notif->id }}"
                            onclick="markAsRead('{{ route('notifikasi.baca', $notif->id) }}', this)"
                            class="notif-item cursor-pointer flex items-start gap-3 p-3 border-b {{ $notif->is_read ? 'bg-gray-200' : 'bg-white' }}">

                            <!-- Logo perusahaan -->
                            <div class="w-10 h-10 flex-shrink-0">
                                <img
                                    src="{{ $notif->perusahaan && $notif->perusahaan->img_profile
                                        ? asset('storage/' . $notif->perusahaan->img_profile)
                                        : asset('images/logo.png') }}">
                            </div>

                            <!-- Pesan -->
                            <div class="flex-1">
                                <p class="text-sm leading-snug">{!! $notif->pesan !!}</p>
                                <p class="text-xs text-gray-400 mt-1">{{ $notif->created_at->diffForHumans() }}</p>

                                <!-- Tombol Hapus -->
                                <button @click.stop="hapus({{ $notif->id }})"
                                    class="text-red-500 text-xs hover:underline mt-1">
                                    Hapus
                                </button>

                            </div>
                        </div>
                    @empty
                        <p class="p-3 text-gray-500 text-sm text-center">Tidak ada notifikasi</p>
                    @endforelse
                </div>

                <!-- Footer -->
                <iframe name="hiddenFrame" style="display:none;"></iframe>
                <div class="p-3 border-t flex justify-between items-center">

                    <!-- Hapus Semua -->
                    <button @click="hapusSemua()" class="text-sm text-red-600 hover:underline">
                        Hapus Semua
                    </button>

                    <!-- Tandai Semua Dibaca -->
                    <form action="{{ route('notifikasi.bacaSemua') }}" method="POST" target="hiddenFrame">
                        @csrf
                        <button type="submit" class="text-sm text-blue-600 hover:underline">
                            Tandai Baca
                        </button>
                    </form>
                </div>
            </div>
        </div>


        <!-- Modal Semua Notifikasi -->
        <div x-data="notifHandler()" x-cloak x-show="openAllNotif"
            class="fixed inset-0 z-50 flex items-start justify-center p-4 bg-black/30" @click.self="openAllNotif = false">


            <div class="bg-white w-full max-w-lg rounded-xl shadow-lg overflow-hidden">

                <!-- Header -->
                <div class="flex items-center justify-between px-4 py-3 border-b">
                    <h2 class="font-semibold text-lg">Semua Notifikasi</h2>
                    <button @click="openAllNotif=false" class="text-gray-500">Tutup</button>
                </div>

                <!-- Semua Notifikasi -->
                <div class="max-h-[500px] overflow-y-auto">
                    @foreach (\App\Models\Notifikasi::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get() as $notif)
                        <div data-id="{{ $notif->id }}"
                            onclick="markAsRead('{{ route('notifikasi.baca', $notif->id) }}', this)"
                            class="notif-item cursor-pointer flex items-start gap-3 p-3 border-b {{ $notif->is_read ? 'bg-gray-200' : 'bg-white' }}">

                            <div class="w-10 h-10 flex-shrink-0">
                                <img src="{{ $notif->perusahaan && $notif->perusahaan->img_profile
                                    ? asset('storage/' . $notif->perusahaan->img_profile)
                                    : asset('images/logo.png') }}"
                                    class="w-10 h-10 object-contain rounded" alt="logo">
                            </div>

                            <div class="flex-1">
                                <p class="text-sm leading-snug">{!! $notif->pesan !!}</p>
                                <p class="text-xs text-gray-400 mt-1">{{ $notif->created_at->diffForHumans() }}</p>
                            </div>

                        </div>
                    @endforeach
                </div>

                <!-- Footer -->
                <div class="p-3 border-t flex justify-between items-center">

                    <!-- Hapus Semua Dibaca -->
                    <button @click="hapusSemuaBaca()" class="text-sm text-orange-600 hover:underline">
                        Hapus Semua Dibaca
                    </button>

                    <!-- Tandai Semua Dibaca -->
                    <form action="{{ route('notifikasi.bacaSemua') }}" method="POST" target="hiddenFrameAll">
                        @csrf
                        <button type="submit" class="text-sm text-blue-600 hover:underline">
                            Tandai Semua Dibaca
                        </button>
                    </form>
                </div>

                <iframe name="hiddenFrameAll" style="display:none;"></iframe>
            </div>
        </div>


        @include('super_admin.pelamar.modal.alamat')
        @include('super_admin.pelamar.modal.pendidikan')
        @include('super_admin.pelamar.modal.organisasi')
        @include('super_admin.pelamar.modal.pengalaman')
        @include('super_admin.pelamar.modal.skill')

        {{-- detail --}}
        @include('super_admin.pelamar.modal.detail_pendidikan')
        @include('super_admin.pelamar.modal.detail_organisasi')
        @include('super_admin.pelamar.modal.detail_pengalaman')
        @include('super_admin.pelamar.modal.detail_skill')

        {{-- Tom Select CSS --}}
        <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">

        {{-- Tom Select JS --}}
        <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>



        <script>
            document.getElementById('fileinput').addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        document.getElementById('pp').setAttribute('src', event.target.result);
                    }
                    reader.readAsDataURL(file);
                }
            });

            document.getElementById('removeButton').addEventListener('click', function() {
                const img = document.getElementById('pp');
                const fileInput = document.getElementById('fileinput');

                // Reset ke avatar default
                img.setAttribute('src',
                    'https://ui-avatars.com/api/?name=Pelamar&background=random&color=fff&size=128');
                fileInput.value = ''; // Reset input file
            });
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Inisialisasi TomSelect untuk "Divisi"
                const divisiSelect = new TomSelect("#divisi", {
                    plugins: ['remove_button'],
                    persist: false,
                    create: false,
                    hideSelected: true,
                    maxItems: 5,
                    placeholder: "Pilih Divisi",
                    render: {
                        option: function(data, escape) {
                            return `
                        <div class="flex items-center justify-between">
                            <span>${escape(data.text)}</span>
                            <input type="checkbox" class="ml-2 accent-orange-500 pointer-events-none">
                        </div>
                    `;
                        },
                        item: function(data, escape) {
                            return `<div class="py-1 px-2 bg-orange-100 text-orange-700 rounded-lg">${escape(data.text)}</div>`;
                        }
                    }
                });

                // Ambil kategori dari PHP ke JS
                const kategori = "{{ $kategori }}";

                // Kalau bukan calon_kandidat atau kandidat → sembunyikan dan kosongkan pilihan
                if (kategori !== 'calon_kandidat' && kategori !== 'kandidat') {
                    document.getElementById('divisi-wrapper').classList.add('hidden');
                    divisiSelect.clear();
                }
            });
        </script>


        {{-- NOtif --}}
        <script>
            function markAsRead(url, el) {
                fetch(url, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Accept': 'application/json',
                        },
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            el.classList.add('bg-gray-200');
                            el.classList.remove('bg-white');

                            // Kurangi badge notifikasi
                            const badge = document.getElementById('notif-badge');
                            if (badge) {
                                let count = parseInt(badge.textContent);
                                if (count > 1) {
                                    badge.textContent = count - 1;
                                } else {
                                    badge.remove();
                                }
                            }
                        }
                    })
                    .catch(err => console.error('Error markAsRead:', err));
            }

            // Saat klik "Tandai Semua Dibaca"
            document.addEventListener('DOMContentLoaded', function() {
                const markAllForms = document.querySelectorAll('form[action*="notifikasi.bacaSemua"]');
                markAllForms.forEach(form => {
                    form.addEventListener('submit', () => {
                        document.querySelectorAll('.notif-item').forEach(item => {
                            item.classList.add('bg-gray-200');
                            item.classList.remove('bg-white');
                        });
                        const badge = document.getElementById('notif-badge');
                        if (badge) badge.remove();
                    });
                });
            });
        </script>


        <script>
            document.querySelector('form[target="hiddenFrame"]').addEventListener('submit', () => {
                document.querySelectorAll('.notif-item').forEach(item => {
                    item.classList.remove('bg-white');
                    item.classList.add('bg-gray-200');
                });
                const badge = document.querySelector('.absolute .bg-red-500');
                if (badge) badge.remove();
            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    </main>
@endsection
