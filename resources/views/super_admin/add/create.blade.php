@extends('super_admin.sidebar.index')
@section('sidebarsuperadmin')
    <main class="flex-1 p-6 bg-white overflow-y-auto">
        <div class="max-w-3xl mx-auto border rounded-lg p-6 shadow-sm">
            <h2 class="text-center text-xl font-semibold mb-6">Tambah User</h2>


            <!-- Form Create -->
            <form action="{{ route('superadmin.add.user.store') }}" method="POST" enctype="multipart/form-data"
                class="space-y-4">
                @csrf
                <!-- Foto Profil -->
                <div class="flex justify-center mb-6">
                    <div class="relative">
                        <label for="fileinputrole" class="cursor-pointer">
                            <img id="pa" class="w-40 h-40 object-cover rounded-full"
                                src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                                alt="Profile">
                        </label>
                        <input id="fileinputrole" type="file" name="img_profile" class="hidden" accept="image/*">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-medium mb-1">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="w-full border rounded-md px-3 py-2" required />
                    </div>

                    <!-- Username -->
                    <div>
                        <label class="block text-sm font-medium mb-1">Username</label>
                        <input type="text" name="username" value="{{ old('username') }}"
                            class="w-full border rounded-md px-3 py-2" required />
                    </div>
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm font-medium mb-1">Password</label>
                    <input type="password" name="password" class="w-full border rounded-md px-3 py-2" required />
                </div>

                <!-- Nama Lengkap -->
                <div>
                    <label class="block text-sm font-medium mb-1">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}"
                        class="w-full border rounded-md px-3 py-2" required />
                </div>

                <div class="grid grid-cols-3 gap-4">
                    <!-- Role -->
                    <div>
                        <label class="block text-sm font-medium mb-1">Role</label>
                        <select name="role" class="w-full border rounded-md px-3 py-2" required>
                            <option value="">-- Pilih Role --</option>
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="finance" {{ old('role') == 'finance' ? 'selected' : '' }}>Finance</option>
                        </select>
                    </div>

                    <!-- Provinsi -->
                    <div>
                        <label class="block text-sm font-medium mb-1">Provinsi</label>
                        <select name="provinsi" class="w-full border rounded-md px-3 py-2">
                            <option value="">-- Pilih Provinsi --</option>
                            <option value="Yogyakarta" {{ old('provinsi') == 'Yogyakarta' ? 'selected' : '' }}>Yogyakarta
                            </option>
                            <option value="Jakarta" {{ old('provinsi') == 'Jakarta' ? 'selected' : '' }}>Jakarta</option>
                            <option value="Jawa Barat" {{ old('provinsi') == 'Jawa Barat' ? 'selected' : '' }}>Jawa Barat
                            </option>
                        </select>
                    </div>

                    <!-- Kota -->
                    <div>
                        <label class="block text-sm font-medium mb-1">Kota/Kabupaten</label>
                        <input type="text" name="kota" value="{{ old('kota') }}"
                            class="w-full border rounded-md px-3 py-2" />
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <!-- Kecamatan -->
                    <div>
                        <label class="block text-sm font-medium mb-1">Kecamatan</label>
                        <input type="text" name="kecamatan" value="{{ old('kecamatan') }}"
                            class="w-full border rounded-md px-3 py-2" />
                    </div>

                    <!-- Kode Pos -->
                    <div>
                        <label class="block text-sm font-medium mb-1">Kode Pos</label>
                        <input type="text" name="kode_pos" value="{{ old('kode_pos') }}"
                            class="w-full border rounded-md px-3 py-2" />
                    </div>
                </div>

                <!-- Alamat Lengkap -->
                <div>
                    <label class="block text-sm font-medium mb-1">Alamat Lengkap</label>
                    <textarea name="detail_alamat" class="w-full border rounded-md px-3 py-2" rows="2">{{ old('detail_alamat') }}</textarea>
                </div>

                <!-- Tombol -->
                <div class="flex justify-center gap-4 mt-6">
                    <button type="submit"
                        class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-md">Simpan</button>
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
            const roleSelect = document.querySelector("select[name='role']");
            const profileImg = document.getElementById("pa");
            const fileInput = document.getElementById("fileinputrole");

            // Mapping role ke gambar default
            const roleImages = {
                "admin": "{{ asset('images/admin-default.png') }}",
                "finance": "{{ asset('images/finance-default.png') }}"
            };

            // Ganti gambar sesuai role
            roleSelect.addEventListener("change", function() {
                const selectedRole = this.value;

                // Kalau ada file ter-upload, jangan timpa preview-nya
                if (fileInput.files.length === 0) {
                    if (roleImages[selectedRole]) {
                        profileImg.src = roleImages[selectedRole];
                    } else {
                        profileImg.src =
                            "https://ui-avatars.com/api/?name=Default&background=random&color=fff&size=128";
                    }
                }
            });

            // Preview saat upload file manual
            fileInput.addEventListener("change", function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        profileImg.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endpush
