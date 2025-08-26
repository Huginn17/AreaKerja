@extends('admin.sidebar.index')
@section('sidebaradmin')
    <div class="p-4 sm:ml-64">


        <!-- Header -->
        <header class="w-full flex items-center justify-between px-6 py-3 border-b shadow-sm">
            <h1 class="text-xl font-semibold">Buat Post Baru</h1>
            <div class="flex items-center gap-3">
                <!-- Notifikasi -->
                <button class="relative">
                    <span class="absolute top-0 right-0 block w-2 h-2 bg-red-500 rounded-full"></span>
                    🔔
                </button>
                <!-- Profil -->
                <div class="flex items-center border-gray-800  border rounded-lg shadow px-3 scroll-py-5">
                    <img src="{{ asset('images/ohim.jpg') }}" alt="Logo" class="w-15 h-12 pr-2   rounded-full" />
                    <div class="text-sm">
                        <p class="font-semibold">Dj Ohim </p>
                        <p class="text-xs text-gray-500">ohim@gmail.com</p>
                    </div>
                </div>
            </div>
        </header>



        <div class="mx-auto p-6">

            <div class="mb-4">
                <input type="text" name="title" placeholder="Judul artikel..."
                    class="w-full border border-gray-300 rounded-lg px-3 py-2">
            </div>

            <div class="mb-3">
                <button type="button"
                    class="px-4 py-2 bg-gray-100 border rounded-lg shadow hover:bg-gray-200 text-sm font-medium">
                    Tambahkan Media
                </button>
            </div>

            <div class="">
                <input id="x" type="hidden" name="content">
                <trix-editor input="x" class="trix-content"></trix-editor>
            </div>

            <div class="flex justify-end gap-3 mt-4">
                <button class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg shadow">
                    Simpan
                </button>
                <button class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-lg shadow">
                    Batal
                </button>
            </div>

        </div>
    </div>
@endsection
