@extends('super_admin.sidebar.index')
@section('sidebarsuperadmin')
    <div class="flex-1 p-6 sm:ml-64 bg-white overflow-y-auto">
        <div class="bg-gray-50 p-6 rounded-xl">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-semibold text-gray-700">
                    Daftar Pelamar Diterima - {{ $perusahaan->user->name ?? $perusahaan->nama_perusahaan }}
                </h2>

                <a href="{{ route('superadmin.panggilan') }}"
                    class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition-all">
                    ← Kembali
                </a>
            </div>
  
            <div class="flex justify-end mb-4">
                <form method="GET" action="{{ route('superadmin.panggilan.list', $perusahaan->id) }}" class="flex gap-2">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama pelamar..."
                        class="border border-gray-300 rounded-lg px-4 py-2 w-72 text-sm focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-orange-400 transition-all">

                    <button type="submit"
                        class="bg-orange-500 hover:bg-orange-600 text-white font-medium px-6 py-2 rounded-lg text-sm transition-all">
                        Cari
                    </button>
                </form>
            </div>


            <div class="overflow-x-auto bg-white rounded-lg shadow">
                <table class="min-w-full border border-gray-200">
                    <thead class="bg-orange-500">
                        <tr class="text-left text-white text-sm font-semibold">
                            <th class="px-4 py-2 border-b">No</th>
                            <th class="px-4 py-2 border-b">Nama Pelamar</th>
                            <th class="px-4 py-2 border-b">Email</th>
                            <th class="px-4 py-2 border-b">Lowongan</th>
                            <th class="px-4 py-2 border-b">Tanggal Diterima</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pelamarDiterima as $i => $p)
                            <tr class="text-sm border-b hover:bg-gray-50">
                                <td class="px-4 py-2">{{ $i + 1 }}</td>
                                <td class="px-4 py-2">{{ $p['nama'] }}</td>
                                <td class="px-4 py-2">{{ $p['email'] }}</td>
                                <td class="px-4 py-2">{{ $p['lowongan'] }}</td>
                                <td class="px-4 py-2">{{ $p['tanggal_diterima'] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-3 text-gray-500">Belum ada pekerja diterima</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
