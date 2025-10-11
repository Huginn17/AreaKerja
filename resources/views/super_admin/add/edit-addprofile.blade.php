@extends('super_admin.sidebar.index')
@section('sidebarsuperadmin')
    <main class="flex-1 p-6 bg-white overflow-y-auto">
        <div class="max-w-4xl mx-auto border rounded-lg p-6 shadow-sm">
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
                            class="w-full border rounded-md px-3 py-2" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Username</label>
                        <input type="text" name="username" value="{{ old('username', $user->username) }}"
                            class="w-full border rounded-md px-3 py-2" required>
                    </div>
                </div>

                <!-- Role -->
                <div>
                    <label class="block text-sm font-medium mb-1">Role</label>
                    <select name="role" id="roleSelect" class="w-full border rounded-md px-3 py-2" required>
                        <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="finance" {{ old('role', $user->role) == 'finance' ? 'selected' : '' }}>Finance
                        </option>
                        <option value="perusahaan" {{ old('role', $user->role) == 'perusahaan' ? 'selected' : '' }}>
                            Perusahaan</option>
                        <option value="pelamar" {{ old('role', $user->role) == 'pelamar' ? 'selected' : '' }}>Pelamar
                        </option>
                    </select>
                </div>

                <!-- ================= FORM ADMIN / FINANCE / PELAMAR ================= -->
                <div id="form-alamat" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap"
                            value="{{ old('nama_lengkap', $detail->nama_lengkap ?? '') }}"
                            class="w-full border rounded-md px-3 py-2">
                    </div>

                    <div class="grid grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-medium mb-1">Provinsi</label>
                            <select name="provinsi" class="w-full border rounded-md px-3 py-2">
                                <option value="">-- Pilih Provinsi --</option>
                                <option value="Yogyakarta"
                                    {{ old('provinsi', $detail->provinsi ?? '') == 'Yogyakarta' ? 'selected' : '' }}>
                                    Yogyakarta</option>
                                <option value="Jakarta"
                                    {{ old('provinsi', $detail->provinsi ?? '') == 'Jakarta' ? 'selected' : '' }}>Jakarta
                                </option>
                                <option value="Jawa Barat"
                                    {{ old('provinsi', $detail->provinsi ?? '') == 'Jawa Barat' ? 'selected' : '' }}>Jawa
                                    Barat</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Kota/Kabupaten</label>
                            <input type="text" name="kota" value="{{ old('kota', $detail->kota ?? '') }}"
                                class="w-full border rounded-md px-3 py-2">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Kecamatan</label>
                            <input type="text" name="kecamatan" value="{{ old('kecamatan', $detail->kecamatan ?? '') }}"
                                class="w-full border rounded-md px-3 py-2">
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-1">Desa</label>
                            <input type="text" name="desa" value="{{ old('desa', $detail->desa ?? '') }}"
                                class="w-full border rounded-md px-3 py-2">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium mb-1">Kode Pos</label>
                            <input type="text" name="kode_pos" value="{{ old('kode_pos', $detail->kode_pos ?? '') }}"
                                class="w-full border rounded-md px-3 py-2">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Alamat Lengkap</label>
                            <textarea name="detail_alamat" class="w-full border rounded-md px-3 py-2" rows="2">{{ old('detail_alamat', $detail->detail_alamat ?? '') }}</textarea>
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
                            class="w-full border rounded-md px-3 py-2">
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Jenis Perusahaan</label>
                        <input type="text" name="jenis_perusahaan"
                            value="{{ old('jenis_perusahaan', $detail->jenis_perusahaan ?? '') }}"
                            class="w-full border rounded-md px-3 py-2">
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Legalitas</label>
                        <input type="text" name="legalitas" value="{{ old('legalitas', $detail->legalitas ?? '') }}"
                            class="w-full border rounded-md px-3 py-2">
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Website</label>
                        <input type="text" name="website_perusahaan"
                            value="{{ old('website_perusahaan', $detail->website_perusahaan ?? '') }}"
                            class="w-full border rounded-md px-3 py-2">
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Deskripsi</label>
                        <textarea name="deskripsi" class="w-full border rounded-md px-3 py-2" rows="2">{{ old('deskripsi', $detail->deskripsi ?? '') }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Visi</label>
                        <textarea name="visi" class="w-full border rounded-md px-3 py-2" rows="2">{{ old('visi', $detail->visi ?? '') }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Misi</label>
                        <textarea name="misi" class="w-full border rounded-md px-3 py-2" rows="2">{{ old('misi', $detail->misi ?? '') }}</textarea>
                    </div>

                    <h3 class="font-semibold text-gray-700 mt-4">Kontak</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium mb-1">No. Telepon Perusahaan</label>
                            <input type="text" name="telepon_perusahaan"
                                value="{{ old('telepon_perusahaan', $detail->telepon_perusahaan ?? '') }}"
                                class="w-full border rounded-md px-3 py-2">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">No. Whatsapp</label>
                            <input type="text" name="whatsapp" value="{{ old('whatsapp', $detail->whatsapp ?? '') }}"
                                class="w-full border rounded-md px-3 py-2">
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
@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const roleSelect = document.getElementById("roleSelect");
            const profileImg = document.getElementById("pa");
            const fileInput = document.getElementById("fileinputrole");
            const formAlamat = document.getElementById("form-alamat");
            const formPerusahaan = document.getElementById("form-perusahaan");

            // Pastikan semua elemen ditemukan sebelum lanjut
            if (!roleSelect || !profileImg || !fileInput || !formAlamat || !formPerusahaan) {
                console.warn("⚠️ Beberapa elemen form tidak ditemukan di halaman edit user.");
                return; // hentikan script agar tidak error
            }

            const roleImages = {
                "admin": "{{ asset('images/admin-default.png') }}",
                "finance": "{{ asset('images/finance-default.png') }}",
                "perusahaan": "{{ asset('images/company-default.png') }}",
                "pelamar": "{{ asset('images/user-default.png') }}"
            };

            function toggleForms(role) {
                if (role === "perusahaan") {
                    formPerusahaan.classList.remove("hidden");
                    formAlamat.classList.add("hidden");
                } else {
                    formPerusahaan.classList.add("hidden");
                    formAlamat.classList.remove("hidden");
                }
            }

            // Jalankan pertama kali
            toggleForms(roleSelect.value);

            // Event: ubah form sesuai role
            roleSelect.addEventListener("change", function() {
                const selectedRole = this.value;
                toggleForms(selectedRole);

                if (fileInput.files.length === 0) {
                    profileImg.src = roleImages[selectedRole] ||
                        "https://ui-avatars.com/api/?name=Default&background=random&color=fff&size=128";
                }
            });

            // Event: preview foto profil baru
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
