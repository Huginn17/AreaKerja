@extends('super_admin.sidebar.index')
@section('sidebarsuperadmin')
    <div class="p-2 sm:ml-64 bg-white h-screen font-sans translate-x-24 overflow-y-auto" x-data="{ openNotif: false, openAllNotif: false }">
        <!-- Header -->
        <!-- Konten utama -->
        <main class="flex-1 p-20 bg-white font-sans text-gray-900 ">
            <!-- Header -->
            <!-- Header atas form -->
            <div class="flex items-center justify-between mb-4">
                <!-- Kiri: Judul -->
                <h1 class="text-2xl font-semibold text-gray-700 ">Edit Lowongan</h1>

                <!-- Kanan: Notifikasi + Profil -->
                <div class="flex items-center space-x-1">
                    <!-- Ikon Notifikasi -->
                    <div class="relative">
                        {{-- Tombol Notifikasi --}}
                        <button @click="openNotif = true" class="relative">
                            <!-- Icon Lonceng -->
                            <svg width="31" height="32" viewBox="0 0 31 32" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
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

                    </div>

                    <!-- Profil -->
                    <div class="flex items-center bg-white px-3 py-2 rounded-lg shadow text-sm">
                        <a href="{{ route('superadmin.profile') }}">
                            @if (Auth::user()->role == 'super_admin')
                                @if (Auth::user()->superadmin?->img_profile)
                                    <img id="pu" class="w-10 h-10 object-cover rounded-full profile-img"
                                        src="{{ asset('storage/' . Auth::user()->superadmin->img_profile) }}"
                                        alt="Profile">
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
                        <svg class="w-4 h-4 ml-2 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>
            </div><br>


            <!-- Card Container -->
            <div class="border border-gray-500 rounded-xl p-16 max-w-3xl mx-auto">

                <h2 class="font-bold mb-6 text-gray-600 text-lg px-6 py-2 ">Tambah Data Lowongan</h2>

                <!-- Form -->
                <form action="{{ route('superadmin.lowongan.update', $lowongan->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Baris 1: Judul & Alamat -->
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label for="judul" class="block text-sm font-bold mb-1">Judul <span
                                    class="text-red-600">*</span></label>
                            <input type="text" id="judul" name="nama" required
                                value="{{ old('nama', $lowongan->nama) }}"
                                class=" w-full border border-gray-400 rounded px-3 py-2 focus:outline-none" />
                        </div>

                        <div>
                            <label for="alamat" class="block text-sm font-bold mb-1">
                                Alamat <span class="text-red-600">*</span>
                            </label>

                            <select id="alamat" name="alamat"
                                class="w-full border border-gray-400 rounded px-3 py-2 focus:outline-none">
                                <option disabled value="">Pilih Alamat</option>
                                <option value="jakarta"
                                    {{ old('alamat', $lowongan->alamat) == 'jakarta' ? 'selected' : '' }}>Jakarta</option>
                                <option value="bandung"
                                    {{ old('alamat', $lowongan->alamat) == 'bandung' ? 'selected' : '' }}>Bandung</option>
                                <option value="ciamis"
                                    {{ old('alamat', $lowongan->alamat) == 'ciamis' ? 'selected' : '' }}>
                                    Ciamis</option>
                                <option value="yogyakarta"
                                    {{ old('alamat', $lowongan->alamat) == 'yogyakarta' ? 'selected' : '' }}>Yogyakarta
                                </option>
                                <option value="solo" {{ old('alamat', $lowongan->alamat) == 'solo' ? 'selected' : '' }}>
                                    Solo</option>
                                <option value="semarang"
                                    {{ old('alamat', $lowongan->alamat) == 'semarang' ? 'selected' : '' }}>Semarang
                                </option>
                                <option value="surabaya"
                                    {{ old('alamat', $lowongan->alamat) == 'surabaya' ? 'selected' : '' }}>Surabaya
                                </option>
                            </select>
                        </div>

                    </div>

                    <!-- Baris 2: Jenis Lowongan & Gaji -->
                    <div class="grid grid-cols-5 gap-4 items-end">
                        <div class="col-span-2">
                            <label for="jenis" class="block text-sm font-bold mb-1">
                                Jenis Lowongan <span class="text-red-600">*</span>
                            </label>

                            <select id="jenis" name="jenis"
                                class="w-full border border-gray-400 rounded px-3 py-2 focus:outline-none">
                                <option disabled value="">Pilih Jenis</option>
                                <option value="full_time"
                                    {{ old('jenis', $lowongan->jenis) == 'full_time' ? 'selected' : '' }}>Full Time
                                </option>
                                <option value="part_time"
                                    {{ old('jenis', $lowongan->jenis) == 'part_time' ? 'selected' : '' }}>Part Time
                                </option>
                                <option value="middle_time"
                                    {{ old('jenis', $lowongan->jenis) == 'middle_time' ? 'selected' : '' }}>Middle Time
                                </option>
                                <option value="freelance"
                                    {{ old('jenis', $lowongan->jenis) == 'freelance' ? 'selected' : '' }}>Freelance
                                </option>
                            </select>
                        </div>


                        <div class="col-span-1">
                            <label for="gaji_awal" class="block text-sm font-bold mb-1">Gaji <span
                                    class="text-red-600">*</span></label>
                            <input type="number" id="gaji_awal" name="gaji_awal"
                                value="{{ old('gaji_awal', $lowongan->gaji_awal) }}" placeholder="Min"
                                class="w-full border border-gray-400 rounded px-3 py-2 focus:outline-none" />
                        </div>

                        <div class="col-span-1">
                            <label for="gaji_akhir" class="block mb-1 invisible">Max</label>
                            <input type="number" id="gaji_akhir" name="gaji_akhir"
                                value="{{ old('gaji_akhir', $lowongan->gaji_akhir) }}" placeholder="Max"
                                class="w-full border border-gray-400 rounded px-3 py-2 focus:outline-none" />
                        </div>

                        <div>
                            <label class="block font-medium mb-1">Kategori</label>
                            <input type="text" name="kategori" value="{{ old('kategori', $lowongan->kategori) }}"
                                class="w-full border border-gray-400 rounded px-3 py-2 focus:outline-none" />
                        </div>
                        {{-- <div class="col-span-1">
                            <label for="periode" class="block text-sm font-bold mb-1">Bulan</label>
                            <select id="periode" name="periode"
                                class="w-full border border-gray-400 rounded px-3 py-2 focus:outline-none">
                                <option value="">Pilih Bulan</option>
                                <option>1 Bulan</option>
                                <option>3 Bulan</option>
                                <option>6 Bulan</option>
                                <option>8 Bulan</option>
                            </select>
                        </div> --}}
                    </div>

                    <!-- Deskripsi -->
                    <div>
                        <label for="deskripsi" class="block text-sm font-bold mb-1">Deskripsi <span
                                class="text-red-600">*</span></label>
                        <textarea id="deskripsi" name="deskripsi" rows="5" required
                            class="w-full border border-gray-400 rounded px-3 py-2 focus:outline-none">{{ old('deskripsi', $lowongan->deskripsi) }}</textarea>
                    </div>

                    <!-- Syarat Pekerjaan -->
                    <div>
                        <p class="text-sm font-semibold mb-2">Syarat Pekerjaan</p>

                        <!-- Pendidikan -->
                        <div class="mb-4 flex items-start">
                            <label class="w-32 text-sm font-medium pt-1">
                                Pendidikan <span class="text-red-600">*</span>
                            </label>

                            <div class="col-span-2">
                                <div class="grid grid-cols-4 gap-x-4 gap-y-2 ml-12">
                                    @foreach (['SD', 'SMP', 'SMA', 'SMK', 'S1', 'S2', 'S3'] as $pend)
                                        <label class="flex items-center gap-2 text-sm">
                                            <input class="border border-orange-500" type="radio"
                                                name="syarat_pekerjaan" value="{{ $pend }}"
                                                {{ old('syarat_pekerjaan', $lowongan->syarat_pekerjaan) == $pend ? 'checked' : '' }}>
                                            <span>{{ $pend }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>


                        {{-- <!-- Jurusan -->
                        <div class="mb-4 flex items-center">
                            <!-- Label -->
                            <label for="jurusan" class="w-32 text-sm font-medium">Jurusan</label>

                            <!-- Input -->
                            <input type="text" id="jurusan" name="jurusan"
                                class="flex-1 border border-gray-400 rounded px-2 py-1 focus:outline-none" />
                        </div> --}}


                        <!-- Gender -->
                        {{-- <div class="mb-4 flex items-start">
                            <!-- Label -->
                            <label class="w-32 text-sm font-medium pt-1">Gender <span
                                    class="text-red-600">*</span></label>

                            <!-- Radio Group -->
                            <fieldset class="flex gap-6 text-sm">
                                <label class="flex items-center gap-2 font-semibold">
                                    <input type="radio" name="gender" value="Laki-laki"
                                        class="h-4 w-4 rounded-full border border-orange-500 text-orange-500 focus:ring-1 focus:ring-orange-500 font-semibold" />

                                    Laki-Laki
                                </label>
                                <label class="flex items-center gap-2 font-semibold">
                                    <input type="radio" name="gender" value="Perempuan"
                                        class="h-4 w-4 rounded-full border border-orange-500 text-orange-500 focus:ring-1 focus:ring-orange-500 font-semibold" />

                                    Perempuan
                                </label>
                            </fieldset>
                        </div> --}}


                        <!-- Umur -->
                        {{-- <div class="mb-4 flex items-center">
                            <!-- Label -->
                            <label for="umur-min" class="w-32 text-sm font-medium">Umur <span
                                    class="text-red-600">*</span></label>

                            <!-- Input Min - Max -->
                            <div class="flex items-center gap-2">
                                <!-- Input Min -->
                                <input type="number" id="umur-min" name="umur-min" required placeholder=""
                                    class="w-11 h-10 border border-gray-400 rounded-md text-center text-sm focus:outline-none" />

                                <!-- Strip -->
                                <span class="text-gray-500 font-semibold">-</span>

                                <!-- Input Max -->
                                <input type="number" id="umur-max" name="umur-max" placeholder=""
                                    class="w-11 h-10 border border-gray-400 rounded-md text-center text-sm focus:outline-none" />
                            </div>
                        </div> --}}

                        <!-- Batas Waktu -->
                        <div class="mb-4 flex items-center">
                            <!-- Label -->
                            <label for="batas_lamaran" class="w-32 text-sm font-medium">
                                Batas Waktu <span class="text-red-600">*</span>
                            </label>

                            <!-- Input Date -->
                            <input type="date" name="batas_lamaran"
                                value="{{ old('batas_lamaran', $lowongan->batas_lamaran) }}"
                                class="w-30 border border-gray-400 rounded px-3 py-2 focus:outline-none  text-sm" />
                        </div><br>


                        <!-- Tombol -->
                        <div class="flex justify-center gap-3">
                            <button type="submit"
                                class="bg-orange-500 text-white text-sm px-7 py-1 rounded-lg hover:bg-orange-600 transition">Simpan</button>
                            <button type="reset"
                                class="border border-orange-600 text-orange-600 text-sm px-7 py-1 rounded-lg hover:bg-gray-100 transition">Batal</button>
                        </div>

                </form>

            </div>

            @include('super_admin.notif.modal_notif')
            @include('super_admin.notif.modal_semua')
        </main>
    </div>

    <script>
        // Tandai dibaca
        async function markAsRead(url, el) {
            try {
                let res = await fetch(url, {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                        "Accept": "application/json"
                    }
                });

                let data = await res.json();

                if (data.success) {

                    // Ubah warna bg
                    el.classList.remove("bg-white");
                    el.classList.add("bg-gray-200");

                    // Kurangi badge
                    const badge = document.getElementById("notif-badge");
                    if (badge) {
                        let count = parseInt(badge.textContent);
                        if (count > 1) {
                            badge.textContent = count - 1;
                        } else {
                            badge.remove();
                        }
                    }
                }

            } catch (error) {
                console.error("markAsRead error:", error);
            }
        }

        // AlpineJS init
        document.addEventListener('alpine:init', () => {
            Alpine.data('notifHandler', () => ({

                // Hapus satu notifikasi
                async hapus(id) {
                    if (!confirm("Hapus notifikasi ini?")) return;

                    let url = "{{ route('notifikasi.hapus', ':id') }}".replace(':id', id);

                    let res = await fetch(url, {
                        method: "DELETE",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "Accept": "application/json"
                        }
                    });

                    let data = await res.json();

                    if (data.success) {
                        document.querySelector(`.notif-item[data-id="${id}"]`)?.remove();
                    }
                },

                // Hapus semua
                async hapusSemua() {
                    if (!confirm("Hapus semua notifikasi?")) return;

                    let res = await fetch("{{ route('notifikasi.hapusSemua') }}", {
                        method: "DELETE",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "Accept": "application/json"
                        }
                    });

                    let data = await res.json();

                    if (data.success) {
                        document.querySelectorAll('.notif-item').forEach(e => e.remove());
                    }
                },

                // Hapus semua yang sudah dibaca
                async hapusSemuaBaca() {
                    if (!confirm("Hapus semua notifikasi yang sudah dibaca?")) return;

                    let res = await fetch("{{ route('notifikasi.hapusSemuaBaca') }}", {
                        method: "DELETE",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "Accept": "application/json"
                        }
                    });

                    let data = await res.json();

                    if (data.success) {
                        document.querySelectorAll('.notif-item.bg-gray-200')
                            .forEach(e => e.remove());
                    }
                }

            }));
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

@endsection
