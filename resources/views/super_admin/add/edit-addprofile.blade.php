@extends('super_admin.sidebar.index')
@section('sidebarsuperadmin')
    <main class="flex-1 p-6 sm:ml-64 bg-white overflow-y-auto">
        <div class="max-w-4xl mx-auto border-2 border-gray-400 rounded-lg p-6 shadow-sm">
            <h2 class="text-center text-xl font-semibold mb-6">Edit User</h2>

            @php
                if ($user->role === 'admin') {
                    $detail = $user->admin;
                } elseif ($user->role === 'finance') {
                    $detail = $user->finance;
                } elseif ($user->role === 'perusahaan') {
                    $detail = $user->perusahaan;
                } elseif ($user->role === 'pelamar') {
                    $detail = $user->pelamar;
                } else {
                    $detail = null;     
                }
            @endphp

            <!-- Form Edit -->
            <form action="{{ route('superadmin.update.user', $user->id) }}" method="POST" enctype="multipart/form-data"
                class="space-y-4">
                @csrf
                @method('PUT')

                <!-- Foto Profil -->
                <div class="flex justify-center mb-6">
                    <div class="relative">
                        <label for="fileinputrole" class="cursor-pointer">
                            <img id="pa" class="w-40 h-40 object-cover rounded-full"
                                src="{{ $detail && $detail->img_profile ? asset('storage/' . $detail->img_profile) : 'https://ui-avatars.com/api/?name=' . urlencode($user->username ?? 'User') . '&background=random&color=fff&size=128' }}"
                                alt="Profile">
                        </label>
                        <input id="fileinputrole" type="file" name="img_profile" class="hidden" accept="image/*">
                    </div>
                </div>

                <!-- Email & Username -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Email</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}"
                            class="w-full border-2 border-gray-400 rounded-md px-3 py-2" readonly>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Username</label>
                        <input type="text" name="username" value="{{ old('username', $user->username) }}"
                            class="w-full border-2 border-gray-400 rounded-md px-3 py-2" readonly>
                    </div>
                </div>

                <!-- Role -->
                <div>
                    <label class="block text-sm font-medium mb-1">Role</label>
                    <select name="role" id="roleSelect" class="w-full border-2 border-gray-400 rounded-md px-3 py-2"
                        required>
                        <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="finance" {{ old('role', $user->role) == 'finance' ? 'selected' : '' }}>Finance
                        </option>
                        <option value="perusahaan" {{ old('role', $user->role) == 'perusahaan' ? 'selected' : '' }}>
                            Perusahaan</option> 
                        <option value="pelamar" {{ old('role', $user->role) == 'pelamar' ? 'selected' : '' }}>Pelamar
                        </option>
                    </select>
                </div>

                <!-- ================= FORM ADMIN / FINANCE /  ================= -->
                <div id="form-alamat" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap"
                            value="{{ old('nama_lengkap', $detail->nama_lengkap ?? '') }}"
                            class="w-full border-2 border-gray-400 rounded-md px-3 py-2">
                    </div>

                    <div class="grid grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-medium mb-1">Provinsi</label>
                            <select id="provinsiSelect" name="provinsi_id"
                                class="w-full border-2 border-gray-400 rounded-md px-3 py-2">
                                <option value="">Pilih Provinsi</option>
                                @foreach ($provinsis as $prov)
                                    <option value="{{ $prov->id }}"
                                        {{ $user->provinsi_id == $prov->id ? 'selected' : '' }}>
                                        {{ $prov->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Kota/Kabupaten</label>
                            <select id="kotaSelect" name="kota_id"
                                class="w-full border-2 border-gray-400 rounded-md px-3 py-2">
                                <option value="">Pilih Kota</option>
                                @if ($user->kota)
                                    <option value="{{ $user->kota_id }}" selected>{{ $user->kota->nama }}</option>
                                @endif
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Kecamatan</label>
                            <select id="kecamatanSelect" name="kecamatan_id"
                                class="w-full border-2 border-gray-400 rounded-md px-3 py-2">
                                <option value="">Pilih Kecamatan</option>
                                @if ($user->kecamatan)
                                    <option value="{{ $user->kecamatan_id }}" selected>{{ $user->kecamatan->nama }}
                                    </option>
                                @endif
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-1">Desa</label>
                            <input type="text" name="desa" value="{{ old('desa', $detail->desa ?? '') }}"
                                class="w-full border-2 border-gray-400 rounded-md px-3 py-2">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium mb-1">Kode Pos</label>
                            <input type="text" name="kode_pos" value="{{ old('kode_pos', $detail->kode_pos ?? '') }}"
                                class="w-full border-2 border-gray-400 rounded-md px-3 py-2">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Alamat Lengkap</label>
                            <textarea name="detail_alamat" class="w-full border-2 border-gray-400 rounded-md px-3 py-2" rows="2">{{ old('detail_alamat', $detail->detail_alamat ?? '') }}</textarea>
                        </div>
                    </div>
                </div>

                {{-- ----------------- FORM PELAMAR -------------------- --}}
                <div id="form-pelamar" class="{{ old('role', $user->role ?? '') == 'pelamar' ? '' : 'hidden' }} space-y-4">
                    <h3 class="font-semibold text-gray-700 mt-4">Data Pelamar</h3>

                    @if (old('role', $user->role ?? '') === 'pelamar')
                        <input type="hidden" name="kategori" value="pelamar">
                    @endif

                    {{-- Nama Pelamar --}}
                    <div>
                        <label class="block text-sm font-medium mb-1">Nama Pelamar</label>
                        <input type="text" name="nama_pelamar"
                            value="{{ old('nama_pelamar', $detail->nama_pelamar ?? '') }}"
                            class="w-full border rounded-md px-3 py-2" required>
                    </div>

                    {{-- Gender --}}
                    <div>
                        <label class="block text-md font-medium mb-1">Gender <span class="text-red-500">*</span></label>
                        <div class="flex gap-6 mt-1">
                            <label class="flex items-center gap-2">
                                <input type="radio" name="gender" value="laki-laki"
                                    class="accent-orange-500 border-2 border-orange-500"
                                    {{ old('gender', $detail->gender ?? '') == 'laki-laki' ? 'checked' : '' }}>
                                <span>Laki-Laki</span>
                            </label>
                            <label class="flex items-center gap-2">
                                <input type="radio" name="gender" value="perempuan"
                                    class="accent-orange-500 border-2 border-orange-500"
                                    {{ old('gender', $detail->gender ?? '') == 'perempuan' ? 'checked' : '' }}>
                                <span>Perempuan</span>
                            </label>
                        </div>
                    </div>

                    {{-- Tanggal Lahir --}}
                    <div>
                        <label class="block text-sm font-medium mb-1">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir"
                            value="{{ old('tanggal_lahir', $detail->tanggal_lahir ?? '') }}"
                            class="w-full border rounded-md px-3 py-2">
                    </div>

                    {{-- Deskripsi Diri --}}
                    <div>
                        <label class="block text-sm font-medium mb-1">Deskripsi Diri</label>
                        <textarea name="deskripsi_diri" class="w-full border rounded-md px-3 py-2" rows="2">{{ old('deskripsi_diri', $detail->deskripsi_diri ?? '') }}</textarea>
                    </div>

                    {{-- Kontak --}}
                    <h3 class="font-semibold text-gray-700 mt-4">Kontak</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium mb-1">No. Telepon Pelamar</label>
                            <input type="text" name="telepon_pelamar"
                                value="{{ old('telepon_pelamar', $detail->telepon_pelamar ?? '') }}"
                                class="w-full border rounded-md px-3 py-2">
                        </div>
                    </div>

                    {{-- Ekspektasi Gaji --}}
                    <div>
                        <label class="text-lg font-medium">Ekspektasi Gaji</label>
                        <div class="flex items-center gap-2 mt-1">
                            <div class="border border-black rounded-md px-4 py-2 text-orange-500 w-29">
                                <span class="text-orange-500">Rp.</span>
                                <input type="number" name="gaji_minimal"
                                    value="{{ old('gaji_minimal', $detail->gaji_minimal ?? '') }}"
                                    class="outline-none border-none w-24">
                            </div>
                            <span>-</span>
                            <div class="border border-black rounded-md px-4 py-2 w-29">
                                <span>Rp.</span>
                                <input type="number" name="gaji_maksimal"
                                    value="{{ old('gaji_maksimal', $detail->gaji_maksimal ?? '') }}"
                                    class="outline-none border-none w-24">
                            </div>
                        </div>
                    </div>
                </div>


                <!-- ================= FORM PERUSAHAAN ================= -->
                <div id="form-perusahaan" class="hidden space-y-4">
                    <h3 class="font-semibold text-gray-700 mt-4">Data Perusahaan</h3>

                    <div>
                        <label class="block text-sm font-medium mb-1">Nama Perusahaan</label>
                        <input type="text" name="nama_perusahaan"
                            value="{{ old('nama_perusahaan', $detail->nama_perusahaan ?? '') }}"
                            class="w-full border-2 border-gray-400 rounded-md px-3 py-2">
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Jenis Perusahaan</label>
                        <input type="text" name="jenis_perusahaan"
                            value="{{ old('jenis_perusahaan', $detail->jenis_perusahaan ?? '') }}"
                            class="w-full border-2 border-gray-400 rounded-md px-3 py-2">
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Legalitas</label>
                        <input type="text" name="legalitas" value="{{ old('legalitas', $detail->legalitas ?? '') }}"
                            class="w-full border-2 border-gray-400 rounded-md px-3 py-2">
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Website</label>
                        <input type="text" name="website_perusahaan"
                            value="{{ old('website_perusahaan', $detail->website_perusahaan ?? '') }}"
                            class="w-full border-2 border-gray-400 rounded-md px-3 py-2">
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Deskripsi</label>
                        <textarea name="deskripsi" class="w-full border-2 border-gray-400 rounded-md px-3 py-2" rows="2">{{ old('deskripsi', $detail->deskripsi ?? '') }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Visi</label>
                        <textarea name="visi" class="w-full border-2 border-gray-400 rounded-md px-3 py-2" rows="2">{{ old('visi', $detail->visi ?? '') }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Misi</label>
                        <textarea name="misi" class="w-full border-2 border-gray-400 rounded-md px-3 py-2" rows="2">{{ old('misi', $detail->misi ?? '') }}</textarea>
                    </div>

                    <h3 class="font-semibold text-gray-700 mt-4">Kontak</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium mb-1">No. Telepon Perusahaan</label>
                            <input type="text" name="telepon_perusahaan"
                                value="{{ old('telepon_perusahaan', $detail->telepon_perusahaan ?? '') }}"
                                class="w-full border-2 border-gray-400 rounded-md px-3 py-2">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">No. Whatsapp</label>
                            <input type="text" name="whatsapp" value="{{ old('whatsapp', $detail->whatsapp ?? '') }}"
                                class="w-full border-2 border-gray-400 rounded-md px-3 py-2">
                        </div>
                    </div>
                </div>

                <!-- Tombol -->
                <div class="flex justify-center gap-4 mt-6">
                    <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-md">Simpan</button>
                    <a href="{{ route('superadmin.add.user') }}"
                        class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-md">Batal</a>
                </div>
            </form>
        </div>
    </main>

    {{-- Script AJAX Dinamis --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const provinsiSelect = document.getElementById('provinsiSelect');
            const kotaSelect = document.getElementById('kotaSelect');
            const kecamatanSelect = document.getElementById('kecamatanSelect');

            // Saat provinsi berubah
            provinsiSelect.addEventListener('change', function() {
                const provinsiId = this.value;
                kotaSelect.innerHTML = '<option>Memuat...</option>';
                kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';

                fetch(`{{ route('superadmin.get.kota', '') }}/${provinsiId}`)
                    .then(res => res.json())
                    .then(data => {
                        kotaSelect.innerHTML = '<option value="">Pilih Kota</option>';
                        const options = data.map(k => `<option value="${k.id}">${k.nama}</option>`);
                        kotaSelect.insertAdjacentHTML('beforeend', options.join(''));
                    });
            });

            // Saat kota berubah
            kotaSelect.addEventListener('change', function() {
                const kotaId = this.value;
                kecamatanSelect.innerHTML = '<option>Memuat...</option>';

                fetch(`{{ route('superadmin.get.kecamatan', '') }}/${kotaId}`)
                    .then(res => res.json())
                    .then(data => {
                        kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
                        const options = data.map(k => `<option value="${k.id}">${k.nama}</option>`);
                        kecamatanSelect.insertAdjacentHTML('beforeend', options.join(''));
                    });
            });
        });
    </script>
@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const roleSelect = document.getElementById("roleSelect");
            const profileImg = document.getElementById("pa");
            const fileInput = document.getElementById("fileinputrole");
            const formAlamat = document.getElementById("form-alamat");
            const formPerusahaan = document.getElementById("form-perusahaan");
            const formPelamar = document.getElementById("form-pelamar");

            const roleImages = {
                "admin": "{{ asset('images/admin-default.png') }}",
                "finance": "{{ asset('images/finance-default.png') }}",
                "perusahaan": "{{ asset('images/company-default.png') }}",
                "pelamar": "{{ asset('images/pelamar-default.png') }}"
            };

            function toggleForms(role) {
                // ambil semua input dari setiap form
                const alamatInputs = formAlamat.querySelectorAll('input, textarea, select');
                const perusahaanInputs = formPerusahaan.querySelectorAll('input, textarea, select');
                const pelamarInputs = formPelamar.querySelectorAll('input, textarea, select');

                // sembunyikan semua form dulu
                formAlamat.classList.add("hidden");
                formPerusahaan.classList.add("hidden");
                formPelamar.classList.add("hidden");

                // hapus atribut required dari semua input (biar tidak error saat hidden)
                alamatInputs.forEach(input => input.removeAttribute('required'));
                perusahaanInputs.forEach(input => input.removeAttribute('required'));
                pelamarInputs.forEach(input => input.removeAttribute('required'));

                // tampilkan dan atur required sesuai role
                if (role === "perusahaan") {
                    formPerusahaan.classList.remove("hidden");
                    formPerusahaan.querySelector('[name="nama_perusahaan"]').setAttribute('required', true);
                } else if (role === "pelamar") {
                    formPelamar.classList.remove("hidden");
                    formPelamar.querySelector('[name="nama_pelamar"]').setAttribute('required', true);
                } else {
                    formAlamat.classList.remove("hidden");
                    const namaLengkap = formAlamat.querySelector('[name="nama_lengkap"]');
                    if (namaLengkap) {
                        namaLengkap.setAttribute('required', true);
                    }
                }
            }

            // Jalankan sekali saat halaman selesai dimuat
            toggleForms(roleSelect.value);

            // Ubah form & gambar profil ketika role berubah
            roleSelect.addEventListener("change", function() {
                const selectedRole = this.value;
                toggleForms(selectedRole);

                if (fileInput.files.length === 0) {
                    profileImg.src = roleImages[selectedRole] ||
                        "https://ui-avatars.com/api/?name=Default&background=random&color=fff&size=128";
                }
            });

            // Preview gambar upload
            fileInput.addEventListener("change", function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = e => profileImg.src = e.target.result;
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endpush
