@extends('super_admin.sidebar.index')
@section('sidebarsuperadmin')
    <!-- Main Content -->
    <main class="flex-1 p-6 sm:ml-64 min-h-screen overflow-y-auto pb-20">
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
                        <img src="{{ asset('images/seven.png') }}" class="w-8 h-8 rounded-full" alt="User">
                    </a>
                    <div class="text-sm">
                        <div class="font-semibold">Seven Inc</div>
                        <div class="text-gray-500">seveninc@gmail.com</div>
                    </div>

                    <select class="appearance-none px-8 py-2 bg-transparent text-gray-600 text-sm focus:outline-none">
                        <option>Text 1</option>
                        <option>Text 2</option>
                        <option>Text 3</option>
                    </select>
                </div>
            </div>
        </div>

        @if (session('success'))
            <div class="p-3 mb-4 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="p-3 mb-4 bg-red-100 text-red-700 rounded">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="p-3 mb-4 bg-red-100 text-red-700 rounded">
                <ul>
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        {{-- pengaturan --}}
        <div class="w-full flex items-start justify-start p-10">
            <div class="w-full max-w-2xl space-y-6">
                <!-- Tombol Ganti Password -->
                <button onclick="document.getElementById('passwordFormSuper').classList.toggle('hidden')"
                    class="w-full bg-orange-500 hover:bg-orange-600 text-white font-medium py-3 rounded-lg text-left pl-4">
                    Ganti Password
                </button>

                <!-- Form Ganti Password (hidden default) -->
                <form id="passwordFormSuper" action="{{ route('superadmin.password.update') }}" method="POST"
                    class="hidden mt-4 space-y-4 border-2 border-gray-600 bg-white p-6 rounded-lg shadow">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium">Kata Sandi Lama</label>
                        <input type="password" name="old_password" required
                            class="mt-1 w-full border-2 border-gray-400 px-3 py-2 rounded">
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Kata Sandi Baru</label>
                        <input type="password" name="new_password" required
                            class="mt-1 w-full border-2 border-gray-400 px-3 py-2 rounded">
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Konfirmasi Kata Sandi Baru</label>
                        <input type="password" name="new_password_confirmation" required
                            class="mt-1 w-full border-2 border-gray-400 px-3 py-2 rounded">
                    </div>

                    <button type="submit"
                        class="w-full bg-orange-600 hover:bg-orange-700 text-white py-2 rounded-lg font-medium">
                        Simpan Password
                    </button>
                </form>

                <!-- Ganti Email -->
                <a href="{{ route('email.ubah') }}"
                    class="block w-full bg-orange-600 hover:bg-orange-700 text-white py-3 rounded-lg text-left pl-5">
                    Ganti Email
                </a>
            </div>
        </div>
    </main>
@endsection
