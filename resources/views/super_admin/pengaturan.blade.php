@extends('super_admin.sidebar.index')
@section('sidebarsuperadmin')
    <!-- Main Content -->
    <main class="flex-1 p-6 h-screen overflow-hidden"> <!-- tambahkan h-screen + overflow-hidden -->
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-medium">Pengaturan</h1>
            <div class="flex items-center gap-3">
                <!-- icon -->
                <svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <!-- isi svg mu -->
                </svg>

                <div class="flex items-center gap-2 bg-white px-3 py-2 border border-gray-500 shadow-md rounded-2xl">
                    <a href="/super_admin/profile">
                        <img src="{{ asset('images/ohim.jpg') }}" class="w-8 h-8 rounded-full" alt="User">
                    </a>
                    <div class="text-sm">
                        <div class="font-semibold">Dj Ohim</div>
                        <div class="text-gray-500">Lutung123@gmail.com</div>
                    </div>

                    <select class="appearance-none px-8 py-2 bg-transparent text-gray-600 text-sm focus:outline-none">
                        <option>Text 1</option>
                        <option>Text 2</option>
                        <option>Text 3</option>
                    </select>
                </div>
            </div>
        </div>

        {{-- pengaturan --}}
        <div class="w-full h-full flex items-start justify-start p-10 mt-12">
            <div class="w-full max-w-2xl space-y-6">
                <!-- Tombol Ganti Password -->
                <button class="w-full bg-orange-600 text-white font-medium py-4 rounded-lg text-left pl-4">
                    Ganti Password
                </button>

                <!-- Form -->
                <div class="space-y-4">
                    <div class="flex items-center gap-6">
                        <label class="w-72 text-gray-800">Kata Sandi Lama</label>
                        <input type="password"
                            class="flex-1 border border-gray-300 shadow rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-400" />
                    </div>
                    <div class="flex items-center gap-6">
                        <label class="w-72 text-gray-800">Kata Sandi Baru</label>
                        <input type="password"
                            class="flex-1 border border-gray-300 shadow rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-400" />
                    </div>
                    <div class="flex items-center gap-6">
                        <label class="w-72 text-gray-800">Masukkan Kembali Kata Sandi Baru</label>
                        <input type="password"
                            class="flex-1 border border-gray-300 shadow rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-400" />
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="flex gap-4">
                    <button class="flex-1 bg-orange-600 text-white font-medium py-3 rounded-lg">
                        Simpan
                    </button>
                    <button class="flex-1 text-orange-500 border border-orange-500 font-medium py-3 rounded-lg">
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </main>
@endsection
