@extends('admin.sidebar.index')
@section('sidebaradmin')
    <div class="p-4 sm:ml-64">


        <!-- Header -->
        <header class="w-full flex items-center justify-between px-6 py-3 border-b shadow-sm">
            <h1 class="text-xl font-semibold">Profile</h1>
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


        <div class="flex justify-center py-10">

            <div class="w-[850px]">
                {{-- filter atas --}}

                <div class="flex justify-between items-center mb-4">
                    <div class="text-sm space-x-2">
                        <span class="font-semibold">Semua (6)</span> |
                        <span class="text-blue-600">Telah Terbit (5)</span> |
                        <span class="text-blue-600">Draf (1)</span>
                    </div>

                    <a href="{{ url('/admin/buatpost') }}" class="bg-blue-600 text-white px-4 py-1 rounde">Buat Post</a>
                </div>

                {{-- filter bawah --}}
                <div class="flex justify-between items-center mb-4">
                    <div class="flex space-x-2">
                        <select name="" id="" class="border border-gray-300 rounded px-2 py-1 text-sm">
                            <option value="">Tanggal</option>
                        </select>
                        <button class="bg-gray-200 px-3 py-1 rounded">Terapkan</button>
                        <button class="bg-red-600 text-white px-3 py-1 rounded">Hapus</button>
                    </div>

                    <div class="flex space-x-2">
                        <input type="text" placeholder="nama/tanggal..."
                            class="border border-gray-300 rounded px-2 py-1 text-sm">
                        <button class="bg-gray-700 text-white px-4 py-1 rounded">Cari</button>
                    </div>
                </div>
                {{-- table --}}
                <div class="rounded-lg border border-gray-300 overflow-hidden">
                    <table class="w-full text-sm text-left">
                        <thead class="bg-gray-700 text-white">
                            <tr>
                                <th class="px-4 py-2 w-10"><input type="checkbox"></th>
                                <th class="px-4 py-2">Judul</th>
                                <th class="px-4 py-2">Penulis</th>
                                <th class="px-4 py-2">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Row -->
                            <tr class="bg-gray-100">
                                <td class="px-4 py-2"><input type="checkbox"></td>
                                <td class="px-4 py-2 text-blue-600">Tips Bekerja Yang Tidak Membuatmu Stress</td>
                                <td class="px-4 py-2">Zharif</td>
                                <td class="px-4 py-2 font-bold">4/6/2004</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2"><input type="checkbox"></td>
                                <td class="px-4 py-2 text-blue-600">Tips Bekerja Yang Tidak Membuatmu Stress</td>
                                <td class="px-4 py-2">Zharif</td>
                                <td class="px-4 py-2 font-bold">4/6/2004</td>
                            </tr>
                            <tr class="bg-gray-100">
                                <td class="px-4 py-2"><input type="checkbox"></td>
                                <td class="px-4 py-2 text-blue-600">Tips Bekerja Yang Tidak Membuatmu Stress</td>
                                <td class="px-4 py-2">Zharif</td>
                                <td class="px-4 py-2 font-bold">4/6/2004</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2"><input type="checkbox"></td>
                                <td class="px-4 py-2 text-blue-600">Tips Bekerja Yang Tidak Membuatmu Stress</td>
                                <td class="px-4 py-2">Zharif</td>
                                <td class="px-4 py-2 font-bold">4/6/2004</td>
                            </tr>
                            <tr class="bg-gray-100">
                                <td class="px-4 py-2"><input type="checkbox"></td>
                                <td class="px-4 py-2 text-blue-600">Tips Bekerja Yang Tidak Membuatmu Stress</td>
                                <td class="px-4 py-2">Zharif</td>
                                <td class="px-4 py-2 font-bold">4/6/2004</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2"><input type="checkbox"></td>
                                <td class="px-4 py-2 text-blue-600">Tips Bekerja Yang Tidak Membuatmu Stress</td>
                                <td class="px-4 py-2">Zharif</td>
                                <td class="px-4 py-2 font-bold">4/6/2004</td>
                            </tr>
                            <tr class="bg-gray-100">
                                <td class="px-4 py-2"><input type="checkbox"></td>
                                <td class="px-4 py-2 text-blue-600">Tips Bekerja Yang Tidak Membuatmu Stress</td>
                                <td class="px-4 py-2">Zharif</td>
                                <td class="px-4 py-2 font-bold">4/6/2004</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2"><input type="checkbox"></td>
                                <td class="px-4 py-2 text-blue-600">Tips Bekerja Yang Tidak Membuatmu Stress</td>
                                <td class="px-4 py-2">Zharif</td>
                                <td class="px-4 py-2 font-bold">4/6/2004</td>
                            </tr>
                            <tr class="bg-gray-100">
                                <td class="px-4 py-2"><input type="checkbox"></td>
                                <td class="px-4 py-2 text-blue-600">Tips Bekerja Yang Tidak Membuatmu Stress</td>
                                <td class="px-4 py-2">Zharif</td>
                                <td class="px-4 py-2 font-bold">4/6/2004</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2"><input type="checkbox"></td>
                                <td class="px-4 py-2 text-blue-600">Tips Bekerja Yang Tidak Membuatmu Stress</td>
                                <td class="px-4 py-2">Zharif</td>
                                <td class="px-4 py-2 font-bold">4/6/2004</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
