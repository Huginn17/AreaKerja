@extends('super_admin.sidebar.index')
@section('sidebarsuperadmin')
    <main class="flex-1 p-6 bg-white overflow-y-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-medium">Kelola Akun</h1>
            <div class="flex items-center gap-3">
                <!-- Icon -->
                <svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <!-- isi icon -->
                </svg>

                <!-- User box -->
                <div class="flex items-center gap-2 bg-white px-3 py-2 border border-orange-600 shadow-md rounded-2xl">
                    <a href="#">
                        <img src="{{ asset('images/seven.png') }}" class="w-12 h-12 rounded-full" alt="User">
                    </a>
                    <div class="text-md">
                        <div class="font-semibold">Seven Inc</div>
                        <div class="text-gray-500">Seveninc@gmail.com</div>
                    </div>

                    <select class="appearance-none px-8 py-2 bg-transparent text-gray-600 text-md focus:outline-none">
                        <option>Text 1</option>
                        <option>Text 2</option>
                        <option>Text 3</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Tombol Tambah User -->
        <div class="flex justify-start mb-3">
            <a href="{{ route('superadmin.add.user.createForm') }}"
                class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-md flex items-center gap-2">
                <span>Tambah User</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
            </a>
        </div>

        
        <div x-data="{ openModal: false, deleteUrl: '' }">
            <!-- Table -->
            <div class="overflow-x-auto border border-orange-500 rounded-md shadow-md">
                <table class="min-w-full text-sm">
                    <thead class="bg-orange-500 text-white text-center">
                        <tr>
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">User</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Username</th>
                            <th class="px-4 py-2">Region</th>
                            <th class="px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr class="text-center font-semibold">
                                <td class="px-4 py-2">{{ $user->id }}</td>
                                <td class="px-4 py-2 capitalize">{{ $user->role }}</td>
                                <td class="px-4 py-2">{{ $user->email }}</td>
                                <td class="px-4 py-2">{{ $user->username }}</td>
                                <td class="px-4 py-2">
                                    @if ($user->role === 'admin' && $user->admin)
                                        {{ $user->admin->provinsi }}
                                    @elseif ($user->role === 'finance' && $user->finance)
                                        {{ $user->finance->provinsi }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="px-4 py-2 flex gap-2 justify-center">
                                    <!-- Tombol delete -->
                                    <button
                                        @click="openModal = true; deleteUrl = '{{ route('superadmin.destroy.user', $user->id) }}'"
                                        type="button"
                                        class="bg-orange-500 hover:bg-orange-600 text-white w-10 h-10 flex items-center justify-center rounded-md">
                                        <i class="ph ph-trash text-lg"></i>
                                    </button>

                                    <!-- Tombol detail -->
                                    <a href="{{ route('superadmin.detail.user', $user->id) }}"
                                        class="bg-orange-500 hover:bg-orange-600 text-white w-10 h-10 flex items-center justify-center rounded-md">
                                        <i class="ph ph-eye text-lg"></i>
                                    </a>

                                    <!-- Tombol edit -->
                                    <a href="{{ route('superadmin.edit.user', $user->id) }}"
                                        class="bg-orange-500 hover:bg-orange-600 text-white w-10 h-10 flex items-center justify-center rounded-md">
                                        <i class="ph ph-pencil-simple text-lg"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr class="text-center">
                                <td colspan="6" class="py-4">Belum ada user</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Success Modal --}}
            <div x-data="{ open: {{ session('success') ? 'true' : 'false' }} }" x-show="open"
                class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50" x-transition x-cloak>
                <div class="bg-white rounded-lg shadow-lg w-[400px] h-[300px] p-6 text-center relative">
                    <!-- Tombol close -->
                    <button @click="open = false" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
                        ✕
                    </button>

                    <!-- Icon -->
                    <div class="flex justify-center mb-4">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mt-14">
                            <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" stroke-width="3"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                    </div>

                    <!-- Pesan -->
                    <p class="text-lg font-medium text-gray-800">
                        {{ session('success') }}
                    </p>
                </div>
            </div>

            {{-- Modal Delete --}}
            <div x-show="openModal" x-transition x-cloak
                class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                <div class="bg-white rounded-lg shadow-lg w-[400px] p-6 text-center relative">
                    <!-- Icon -->
                    <div class="flex justify-center mb-4">
                        <svg class="w-16 h-16 text-gray-600" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3m-4 0h14" />
                        </svg>
                    </div>

                    <p class="text-lg font-medium text-gray-800 mb-6">
                        Yakin akan hapus data?
                    </p>

                    <div class="flex justify-center gap-4">
                        <!-- Form Hapus -->
                        <form :action="deleteUrl" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-md">
                                Hapus
                            </button>
                        </form>
                        <!-- Tombol Batal -->
                        <button @click="openModal = false"
                            class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-md">
                            Batal
                        </button>
                    </div>
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
