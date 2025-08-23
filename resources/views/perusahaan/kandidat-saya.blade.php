@extends('layouts.index-perusahaan')
@section('content')
    <div class="max-w-6xl mx-auto p-7 rounded-lg">
        <!-- Header -->
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold">Kandidat Saya</h2>
            <div class="flex gap-7">
                <input type="text" placeholder="nama kandidat/username ..."
                    class="border rounded-lg px-3 py-2 text-sm w-64">
                <select class="border rounded-lg px-3 py-2 text-sm">
                    <option>Skill</option>
                    <option>Videographer</option>
                    <option>Designer</option>
                    <option>Editor</option>
                </select>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto border border-gray-300 rounded-[4%]">
            <table class="w-full border-collapse bg-white">
                <thead class="bg-gray-0">
                    <tr>
                        <th class="p-7 text-center font-semibold">Nama</th>
                        <th class="p-7 text-center font-semibold">Skill</th>
                        <th class="p-7 text-center font-semibold">CV</th>
                        <th class="p-7 text-center font-semibold">Hapus</th>
                        <th class="p-7 text-center font-semibold">Ekspektasi Range Gaji</th>
                        <th class="p-7 text-center font-semibold">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < 8; $i++)
                        <tr class="border-b">
                            <!-- Nama -->
                            <td class="p-3 flex items-center gap-3">
                                <img src="{{ asset('images/bambang.jpg') }}" class="w-10 h-10 rounded-full">
                                <span>Bambang Kurnia</span>
                            </td>
                            <!-- Skill -->
                            <td class="p-3 text-center">Videographer</td>
                            <!-- CV -->
                            <td class="p-3 text-center text-orange-500 cursor-pointer">📥</td>
                            <!-- Hapus -->
                            <td class="p-3 text-center text-orange-500 cursor-pointer">🗑️</td>
                            <!-- Gaji -->
                            <td class="p-3 text-center">Rp. 5.500.000</td>
                            <!-- Status -->
                            <td class="p-3 text-center text-green-500 font-medium">Diterima</td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>

    </div>

    @include('layouts.footer')
@endsection
