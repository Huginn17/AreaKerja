@extends('layouts.index-perusahaan')
@section('content')
    <div class="max-w-6xl mx-auto p-7 rounded-lg">
        <!-- Header -->
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold">Kandidat Saya</h2>
            <div class="flex gap-7">
                <input type="text" placeholder="nama kandidat/username ..."
                    class="border rounded-full px-10 py-2 text-sm w-64">
                <select class="border rounded-lg px-10 py-2 text-sm">
                    <option>Skill</option>
                    <option>Videographer</option>
                    <option>Designer</option>
                    <option>Editor</option>
                </select>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto border border-gray-300 rounded-2xl">
            <table class="w-full border-collapse bg-white">
                <thead>
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
                            <td class="p-3">
                                <div class="flex flex-col items-center text-orange-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="#fb923c">
                                        <rect x="4" y="19" width="16" height="3" />
                                        <rect x="10" y="3" width="4" height="11" />
                                        <path d="M7 13l5 5 5-5z" />
                                    </svg>

                                </div>
                            </td>
                            <!-- Hapus -->
                            <td class="p-3">
                                <div class="flex flex-col items-center text-orange-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#F78D2E"
                                        viewBox="0 0 24 24">
                                        <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1
                                                     1H5v2h14V4z" />
                                    </svg>
                                </div>
                            </td>
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
