@extends('super_admin.sidebar.index')

@section('sidebarsuperadmin')
    <main class="flex-1 p-6 bg-gray-50 overflow-y-auto min-h-screen">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-semibold text-gray-800">Kelola Akun</h1>

            <!-- Profil Admin -->
            <div class="flex items-center gap-3 bg-white px-4 py-2 border border-orange-500 shadow-md rounded-2xl">
                <img src="{{ asset('images/seven.png') }}" class="w-12 h-12 rounded-full" alt="User">
                <div class="text-sm">
                    <div class="font-semibold text-gray-800">Seven Inc</div>
                    <div class="text-gray-500 text-sm">Seveninc@gmail.com</div>
                </div>
                <select
                    class="appearance-none px-3 py-2 bg-transparent text-gray-600 text-sm focus:outline-none cursor-pointer">
                    <option>Text 1</option>
                    <option>Text 2</option>
                    <option>Text 3</option>
                </select>
            </div>
        </div>

        <!-- Tombol Tambah User -->
        <div class="flex justify-start mb-5">
            <a href="{{ route('superadmin.add.user.createForm') }}"
                class="bg-orange-500 hover:bg-orange-600 text-white px-5 py-2.5 rounded-lg flex items-center gap-2 font-medium shadow-md transition-all">
                <span>Tambah User</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
            </a>
        </div>

        <!-- Tabs -->
        <div x-data="{ tab: 'adminFinance' }" class="mt-6">
            <!-- Tabs Header -->
            <div class="flex justify-center mb-6 border-b border-gray-200">
                <button @click="tab = 'adminFinance'"
                    :class="tab === 'adminFinance'
                        ?
                        'text-orange-600 border-b-4 border-orange-500 bg-orange-50' :
                        'text-gray-500 hover:text-orange-500 hover:bg-orange-50'"
                    class="px-6 py-3 font-semibold rounded-t-lg transition-all duration-200 focus:outline-none">
                    Admin & Finance
                </button>

                <button @click="tab = 'perusahaanPelamar'"
                    :class="tab === 'perusahaanPelamar'
                        ?
                        'text-orange-600 border-b-4 border-orange-500 bg-orange-50' :
                        'text-gray-500 hover:text-orange-500 hover:bg-orange-50'"
                    class="px-6 py-3 font-semibold rounded-t-lg transition-all duration-200 focus:outline-none">
                    Perusahaan & Pelamar
                </button>
            </div>

            <!-- Tab: Admin & Finance -->
            <div x-transition x-show="tab === 'adminFinance'" class="space-y-4">
                <div class="overflow-x-auto border border-gray-200 rounded-xl shadow-md bg-white">
                    <table class="min-w-full text-sm">
                        <thead class="bg-orange-500 text-white text-center">
                            <tr>
                                <th class="px-4 py-3">User</th>
                                <th class="px-4 py-3">Email</th>
                                <th class="px-4 py-3">Username</th>
                                <th class="px-4 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($usersAdminFinance as $user)
                                <tr class="text-center font-medium border-b hover:bg-orange-50 transition">
                                    <td class="px-4 py-3 capitalize">{{ $user->role }}</td>
                                    <td class="px-4 py-3">{{ $user->email }}</td>
                                    <td class="px-4 py-3">{{ $user->username }}</td>
                                    <td class="px-4 py-3 flex gap-2 justify-center">
                                        <form action="{{ route('superadmin.delete.akun', $user->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus user ini? Data tidak bisa dikembalikan!')">
                                            @csrf @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-500 hover:bg-red-600 text-white w-9 h-9 flex items-center justify-center rounded-md transition">
                                                <i class="ph ph-trash text-lg"></i>
                                            </button>
                                        </form>

                                        <a href="{{ route('superadmin.detail.user', $user->id) }}"
                                            class="bg-blue-500 hover:bg-blue-600 text-white w-9 h-9 flex items-center justify-center rounded-md transition">
                                            <i class="ph ph-eye text-lg"></i>
                                        </a>
                                        <a href="{{ route('superadmin.edit.user', $user->id) }}"
                                            class="bg-green-500 hover:bg-green-600 text-white w-9 h-9 flex items-center justify-center rounded-md transition">
                                            <i class="ph ph-pencil-simple text-lg"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="6" class="py-4 text-gray-500">Belum ada user</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Tab: Perusahaan & Pelamar -->
            <div x-transition x-show="tab === 'perusahaanPelamar'" class="space-y-4">
                <div class="overflow-x-auto border border-gray-200 rounded-xl shadow-md bg-white">
                    <table class="min-w-full text-sm">
                        <thead class="bg-orange-500 text-white text-center">
                            <tr>
                                <th class="px-4 py-3">User</th>
                                <th class="px-4 py-3">Nama / Perusahaan</th>
                                <th class="px-4 py-3">Email</th>
                                <th class="px-4 py-3">Telepon</th>
                                <th class="px-4 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($usersPerusahaanPelamar as $user)
                                <tr class="text-center font-medium border-b hover:bg-orange-50 transition">
                                    <td class="px-4 py-3 capitalize">{{ $user->role }}</td>
                                    <td class="px-4 py-3">
                                        @if ($user->role === 'perusahaan' && $user->perusahaan)
                                            {{ $user->perusahaan->nama_perusahaan ?? $user->username }}
                                        @elseif ($user->role === 'pelamar' && $user->pelamar)
                                            {{ $user->pelamar->nama_pelamar ?? $user->username }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="px-4 py-3">{{ $user->email }}</td>
                                    <td class="px-4 py-3">
                                        @if ($user->role === 'perusahaan' && $user->perusahaan)
                                            {{ $user->perusahaan->telepon_perusahaan }}
                                        @elseif ($user->role === 'pelamar' && $user->pelamar)
                                            {{ $user->pelamar->telepon_pelamar }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 flex gap-2 justify-center">
                                        <form action="{{ route('superadmin.delete.akun', $user->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus user ini? Data tidak bisa dikembalikan!')">
                                            @csrf @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-500 hover:bg-red-600 text-white w-9 h-9 flex items-center justify-center rounded-md transition">
                                                <i class="ph ph-trash text-lg"></i>
                                            </button>
                                        </form>

                                        <a href="{{ route('superadmin.detail.user', $user->id) }}"
                                            class="bg-blue-500 hover:bg-blue-600 text-white w-9 h-9 flex items-center justify-center rounded-md transition">
                                            <i class="ph ph-eye text-lg"></i>
                                        </a>
                                        <a href="{{ route('superadmin.edit.user', $user->id) }}"
                                            class="bg-green-500 hover:bg-green-600 text-white w-9 h-9 flex items-center justify-center rounded-md transition">
                                            <i class="ph ph-pencil-simple text-lg"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="7" class="py-4 text-gray-500">Belum ada perusahaan atau pelamar</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>
    </main>
@endsection
    