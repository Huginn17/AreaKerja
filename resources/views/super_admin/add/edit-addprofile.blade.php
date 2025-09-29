@extends('super_admin.sidebar.index')
@section('sidebarsuperadmin')
    <main class="flex-1 p-6 bg-white overflow-y-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-medium">Kelola Akun</h1>
        </div>

        <div class="flex items-center justify-center min-h-screen">
            <div class="w-full max-w-4xl p-6 rounded-lg border border-gray-400 shadow-sm">
                {{-- judul --}}
                <h2 class="text-center text-lg font-semibold mb-4">Edit Profile</h2>

                @php
                    if ($user->role === 'admin') {
                        $detail = $user->admin;
                    } elseif ($user->role === 'finance') {
                        $detail = $user->finance;
                    } else {
                        $detail = null;
                    }
                @endphp



                {{-- form --}}
                <form action="{{ route('superadmin.update.user', $user->id) }}" method="POST" enctype="multipart/form-data"
                    class="space-y-4">
                    @csrf
                    @method('PUT')
                    {{-- foto profil --}}
                    <div class="flex justify-center mb-8">
                        <div class="relative">
                            <label for="fileinputrole" class="cursor-pointer">
                                <img id="pa" class="w-40 h-40 object-cover rounded-full"
                                    src="{{ $detail && $detail->img_profile ? asset('storage/' . $detail->img_profile) : asset('images/default.png') }}"
                                    alt="Profile">
                            </label>
                            <input id="fileinputrole" type="file" name="img_profile" class="hidden" accept="image/*">
                        </div>
                    </div>


                    <div class="grid grid-cols-2 gap-4">
                        {{-- ID User --}}
                        <div>
                            <label class="block text-sm font-medium mb-1">ID User</label>
                            <input type="text" value="{{ $user->id }}" disabled
                                class="w-full border border-gray-300 shadow rounded-md px-3 py-2 bg-gray-100">
                        </div>

                        {{-- Email --}}
                        <div>
                            <label class="block text-sm font-medium mb-1">Email <span class="text-red-500">*</span></label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}"
                                class="w-full border border-gray-300 shadow rounded-md px-3 py-2 focus:outline-none"
                                required>
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-4">
                        {{-- Nama Lengkap --}}
                        <div>
                            <label class="block text-sm font-medium mb-1">Nama Lengkap <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="nama_lengkap"
                                value="{{ old('nama_lengkap', $detail->nama_lengkap ?? '') }}"
                                class="w-full border border-gray-300 shadow rounded-md px-3 py-2 focus:outline-none"
                                required>
                        </div>

                        {{-- Role + Provinsi --}}
                        {{-- <div class="grid grid-cols-3 gap-2"> --}}
                            <div>
                                <label class="block text-sm font-medium mb-1">Role <span
                                        class="text-red-500">*</span></label>
                                <select name="role"
                                    class="w-full border border-gray-300 shadow rounded-md px-3 py-2 focus:outline-none"
                                    required>
                                    <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin
                                    </option>
                                    <option value="finance" {{ old('role', $user->role) == 'finance' ? 'selected' : '' }}>
                                        Finance</option>
                                </select>
                            </div>
                            <div>
                                <div>
                                    <label class="block text-sm font-medium mb-1">Desa</label>
                                    <input type="text" name="desa" value="{{ old('desa', $detail->desa ?? '') }}"
                                        class="w-full border border-gray-300 shadow rounded-md px-3 py-2">
                                </div>
                            </div>
                        {{-- </div> --}}
                    </div>

                    {{-- Kota - Kecamatan - Kode Pos --}}
                    <div class="grid grid-cols-4 gap-4">
                        <div>
                            <label class="block text-sm font-medium mb-1">Provinsi</label>
                            <select name="provinsi"
                                class="w-full border border-gray-300 shadow rounded-md px-3 py-2 focus:outline-none">
                                <option value="Jakarta"
                                    {{ old('provinsi', $detail->provinsi ?? '') == 'Jakarta' ? 'selected' : '' }}>
                                    Jakarta</option>
                                <option value="Yogyakarta"
                                    {{ old('provinsi', $detail->provinsi ?? '') == 'Yogyakarta' ? 'selected' : '' }}>
                                    Yogyakarta</option>
                                <option value="Jawa Barat"
                                    {{ old('provinsi', $detail->provinsi ?? '') == 'Jawa Barat' ? 'selected' : '' }}>
                                    Jawa Barat</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Kota/Kabupaten</label>
                            <input type="text" name="kota" value="{{ old('kota', $detail->kota ?? '') }}"
                                class="w-full border border-gray-300 shadow rounded-md px-3 py-2">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Kecamatan</label>
                            <input type="text" name="kecamatan" value="{{ old('kecamatan', $detail->kecamatan ?? '') }}"
                                class="w-full border border-gray-300 shadow rounded-md px-3 py-2">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Kode Pos</label>
                            <input type="text" name="kode_pos" value="{{ old('kode_pos', $detail->kode_pos ?? '') }}"
                                class="w-full border border-gray-300 shadow rounded-md px-3 py-2">
                        </div>
                    </div>

                    {{-- Alamat --}}
                    <div>
                        <label class="block text-sm font-medium mb-1">Alamat Lengkap</label>
                        <textarea name="detail_alamat" rows="2" class="w-full border border-gray-300 shadow rounded-md px-3 py-2">{{ old('detail_alamat', $detail->detail_alamat ?? '') }}</textarea>
                    </div>

                    {{-- Tombol --}}
                    <div class="flex justify-center gap-4 pt-4">
                        <button type="submit"
                            class="bg-green-600 hover:bg-green-700 text-white px-8 py-2 rounded-full">Simpan</button>
                        <a href="{{ route('superadmin.add.user') }}"
                            class="bg-red-600 hover:bg-red-700 text-white px-8 py-2 rounded-full">Batal</a>
                    </div>
                </form>
            </div>
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
