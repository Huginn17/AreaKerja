@extends('super_admin.sidebar.index')
@section('sidebarsuperadmin')
    <main class="flex-1 p-6 sm:ml-64 bg-white overflow-x-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-medium">Tambah Kandidat</h1>
        </div>

        <div class="max-w-6xl mx-auto p-6 bg-white border-2 border-gray-400 rounded-2xl shadow-md">
            <h2 class="text-lg font-semibold mb-10">Form Tambah Kandidat</h2>

            <form action="{{ route('superadmin.pelamar.store') }}" method="POST" enctype="multipart/form-data"
                class="space-y-4">
                @csrf

                {{-- ========== Data Akun User ========== --}}
                <div>
                    <label class="block text-md font-medium mb-1">Username <span class="text-red-500">*</span></label>
                    <input type="text" name="username"
                        class="w-full border-2 border-gray-400 shadow rounded-lg px-3 py-2" required>
                </div>

                <div>
                    <label class="block text-md font-medium mb-1">Email <span class="text-red-500">*</span></label>
                    <input type="email" name="email" class="w-full border-2 border-gray-400 shadow rounded-lg px-3 py-2"
                        required>
                </div>

                <div>
                    <label class="block text-md font-medium mb-1">Password <span class="text-red-500">*</span></label>
                    <input type="password" name="password"
                        class="w-full border-2 border-gray-400 shadow rounded-lg px-3 py-2" required>
                </div>

                {{-- ========== Data Pelamar ========== --}}
                <div>
                    <label class="block text-md font-medium mb-1">Nama Lengkap</label>
                    <input type="text" name="nama_pelamar"
                        class="w-full border-2 border-gray-400 shadow rounded-lg px-3 py-2">
                </div>

                <div>
                    <label class="block text-md font-medium mb-1">Deskripsi Diri</label>
                    <textarea name="deskripsi_diri" class="w-full border-2 border-gray-400 shadow rounded-lg px-3 py-2"></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-md font-medium mb-1">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir"
                            class="w-full border-2 border-gray-400 shadow rounded-lg px-3 py-2">
                    </div>

                    <div>
                        <label class="block text-md font-medium mb-1">Gender</label>
                        <select name="gender" class="w-full border-2 border-gray-400 shadow rounded-lg px-3 py-2">
                            <option value="">-- Pilih --</option>
                            <option value="laki-laki">Laki-Laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-md font-medium mb-1">Telepon</label>
                        <input type="text" name="telepon_pelamar"
                            class="w-full border-2 border-gray-400 shadow rounded-lg px-3 py-2">
                    </div>
                </div>

                <div>
                    <label class="block text-md font-medium mb-1">Divisi</label>
                    <select name="divisi" class="w-full border-2 border-gray-400 shadow rounded-lg px-3 py-2">
                        <option value="">-- Pilih Divisi --</option>
                        @foreach ($divisis as $divisi)
                            <option value="{{ $divisi->divisi }}">{{ $divisi->divisi }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-md font-medium mb-1">Gaji Minimal</label>
                        <input type="text" name="gaji_minimal"
                            class="w-full border-2 border-gray-400 shadow rounded-lg px-3 py-2">
                    </div>
                    <div>
                        <label class="block text-md font-medium mb-1">Gaji Maksimal</label>
                        <input type="text" name="gaji_maksimal"
                            class="w-full border-2 border-gray-400 shadow rounded-lg px-3 py-2">
                    </div>
                </div>

                <div>
                    <label class="block text-md font-medium mb-1">Kategori</label>
                    <select name="kategori" class="w-full border-2 border-gray-400 shadow rounded-lg px-3 py-2">
                        <option value="">-- Pilih Kategori --</option>
                        <option value="pelamar">Pelamar</option>
                        <option value="calon kandidat">Calon Kandidat</option>
                        <option value="kandidat aktif">Kandidat Aktif</option>
                        <option value="kandidat nonaktif">Kandidat Nonaktif</option>
                    </select>
                </div>

                {{-- ========== Modal Buttons ========== --}}
                <!-- Social Media -->
                <div>
                    <label class="block text-lg font-medium mb-5">Social Media</label>

                    <label class="block text-md font-medium">Instagram</label>
                    <input type="text" name="social_media[instagram]"
                        class="w-full mt-1 mb-5 border-2 border-gray-400 shadow rounded-lg px-3 py-2"
                        placeholder="Instagram" />

                    <label class="block text-md font-medium">LinkedIn</label>
                    <input type="text" name="social_media[linkedin]"
                        class="w-full mt-1 mb-5 border-2 border-gray-400 shadow rounded-lg px-3 py-2"
                        placeholder="LinkedIn" />

                    <label class="block text-md font-medium">Website</label>
                    <input type="text" name="social_media[website]"
                        class="w-full mt-1 mb-5 border-2 border-gray-400 shadow rounded-lg px-3 py-2"
                        placeholder="Website" />

                    <label class="block text-md font-medium">Twitter</label>
                    <input type="text" name="social_media[twitter]"
                        class="w-full mt-1 mb-5 border-2 border-gray-400 shadow rounded-lg px-3 py-2"
                        placeholder="Twitter" />
                </div>


                <div class="flex justify-end mt-6">
                    <button type="submit" class="bg-black text-white px-6 py-2 rounded-lg">Simpan</button>
                </div>
            </form>
        </div>

        {{-- ========================== MODAL AREA ========================== --}}
        @include('super_admin.pelamar.modal.alamat')
        @include('super_admin.pelamar.modal.pendidikan')
        @include('super_admin.pelamar.modal.organisasi')
        @include('super_admin.pelamar.modal.pengalaman')
        @include('super_admin.pelamar.modal.skill')

        <script>
            function openModal(id) {
                document.getElementById(id).classList.remove('hidden');
            }

            function closeModal(id) {
                document.getElementById(id).classList.add('hidden');
            }
        </script>
    </main>
@endsection
