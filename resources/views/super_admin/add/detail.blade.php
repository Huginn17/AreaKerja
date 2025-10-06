@extends('super_admin.sidebar.index')

@section('sidebarsuperadmin')
    <main class="flex-1 p-6 bg-white overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen">
            <div class="w-full max-w-4xl p-6 rounded-lg border border-gray-400 shadow-sm bg-white">
                <h2 class="text-center text-xl font-semibold mb-6">View Profile</h2>

                {{-- Foto Profil --}}
                <div class="flex justify-center mb-6">
                    @php
                        $img = null;
                        if ($user->role === 'admin') {
                            $img = $user->admin?->img_profile;
                        } elseif ($user->role === 'finance') {
                            $img = $user->finance?->img_profile;
                        } elseif ($user->role === 'perusahaan') {
                            $img = $user->perusahaan?->img_profile;
                        } elseif ($user->role === 'pelamar') {
                            $img = $user->pelamar?->img_profile;
                        }
                    @endphp

                    @if ($img)
                        <img src="{{ asset('storage/' . $img) }}" class="w-32 h-32 rounded-full object-cover">
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($user->username) }}&background=random&color=fff&size=128"
                            class="w-32 h-32 rounded-full object-cover">
                    @endif
                </div>

                {{-- Data Profil --}}
                <form class="space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium mb-1">ID User</label>
                            <input type="text" class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-100"
                                value="{{ $user->id }}" disabled>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Email</label>
                            <input type="text" class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-100"
                                value="{{ $user->email }}" disabled>
                        </div>
                    </div>

                    {{-- Nama / Nama Perusahaan --}}
                    <div>
                        <label class="block text-sm font-medium mb-1">Nama Lengkap / Perusahaan</label>
                        <input type="text" class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-100"
                            value="@switch($user->role)
                            @case('admin') {{ $user->admin?->nama_lengkap }} @break
                            @case('finance') {{ $user->finance?->nama_lengkap }} @break
                            @case('perusahaan') {{ $user->perusahaan?->nama_perusahaan }} @break
                            @case('pelamar') {{ $user->pelamar?->nama_pelamar }} @break
                        @endswitch"
                            disabled>
                    </div>

                    {{-- Role --}}
                    <div>
                        <label class="block text-sm font-medium mb-1">Role</label>
                        <input type="text"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-100 capitalize"
                            value="{{ $user->role }}" disabled>
                    </div>

                    {{-- Alamat --}}
                    @if (in_array($user->role, ['admin', 'finance', 'pelamar']))
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium mb-1">Provinsi</label>
                                <input type="text" class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-100"
                                    value="{{ $user->{$user->role}?->provinsi }}" disabled>
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Kota</label>
                                <input type="text" class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-100"
                                    value="{{ $user->{$user->role}?->kota }}" disabled>
                            </div>
                        </div>
                    @endif

                    {{-- Detail Perusahaan --}}
                    @if ($user->role === 'perusahaan')
                        <div>
                            <label class="block text-sm font-medium mb-1">Jenis Perusahaan</label>
                            <input type="text" class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-100"
                                value="{{ $user->perusahaan?->jenis_perusahaan }}" disabled>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Website</label>
                            <input type="text" class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-100"
                                value="{{ $user->perusahaan?->website_perusahaan }}" disabled>
                        </div>
                    @endif

                    {{-- Tombol --}}
                    <div class="flex justify-center gap-4 pt-4">
                        <a href="{{ route('superadmin.edit.user', $user->id) }}"
                            class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-2 rounded-full">Edit</a>
                        <a href="{{ route('superadmin.add.user') }}"
                            class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-2 rounded-full">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
