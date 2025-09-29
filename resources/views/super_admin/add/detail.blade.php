@extends('super_admin.sidebar.index')

@section('sidebarsuperadmin')
    <main class="flex-1 p-6 bg-white overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen">
            <div class="w-full max-w-4xl p-6 rounded-lg border border-gray-400 shadow-sm bg-white">
                {{-- Judul --}}
                <h2 class="text-center text-xl font-semibold mb-6">View Profile</h2>

                {{-- Foto Profil --}}
                <div class="flex justify-center mb-6">
                    @if ($user->role === 'admin' && $user->admin?->img_profile)
                        <img src="{{ asset('storage/' . $user->admin->img_profile) }}"
                            class="w-32 h-32 rounded-full object-cover">
                    @elseif($user->role === 'finance' && $user->finance?->img_profile)
                        <img src="{{ asset('storage/' . $user->finance->img_profile) }}"
                            class="w-32 h-32 rounded-full object-cover">
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($user->username) }}&background=random&color=fff&size=128"
                            class="w-32 h-32 rounded-full object-cover">
                    @endif
                </div>


                {{-- Form disabled --}}
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

                    <div>
                        <label class="block text-sm font-medium mb-1">Nama Lengkap</label>
                        <input type="text" class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-100"
                            value="{{ $user->role === 'admin' ? $user->admin?->nama_lengkap : $user->finance?->nama_lengkap }}"
                            disabled>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium mb-1">User</label>
                            <input type="text"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-100 capitalize"
                                value="{{ $user->role }}" disabled>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Desa</label>
                            <input type="text" class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-100"
                                value="{{ $user->role === 'admin' ? $user->admin?->desa : $user->finance?->desa }}"
                                disabled>
                        </div>
                    </div>

                    <div class="grid grid-cols-4 gap-4">
                        <div>
                            <label class="block text-sm font-medium mb-1">Provinsi</label>
                            <input type="text" class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-100"
                                value="{{ $user->role === 'admin' ? $user->admin?->provinsi : $user->finance?->provinsi }}"
                                disabled>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Kota/Kabupaten</label>
                            <input type="text" class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-100"
                                value="{{ $user->role === 'admin' ? $user->admin?->kota : $user->finance?->kota }}"
                                disabled>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Kecamatan</label>
                            <input type="text" class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-100"
                                value="{{ $user->role === 'admin' ? $user->admin?->kecamatan : $user->finance?->kecamatan }}"
                                disabled>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Kode Pos</label>
                            <input type="text" class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-100"
                                value="{{ $user->role === 'admin' ? $user->admin?->kode_pos : $user->finance?->kode_pos }}"
                                disabled>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Alamat Lengkap</label>
                        <input type="text" class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-100"
                            value="{{ $user->role === 'admin' ? $user->admin?->detail_alamat : $user->finance?->detail_alamat }}"
                            disabled>
                    </div>

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
