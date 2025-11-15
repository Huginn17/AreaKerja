@extends('super_admin.sidebar.index')
@section('sidebarsuperadmin')
    <main class="flex-1 p-6 sm:ml-64 bg-white overflow-y-auto" x-data="{ openNotif: false, openAllNotif: false }">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-medium">Akun Freeze</h1>
            <div class="flex items-center gap-3">
                {{-- Tombol Notifikasi --}}
                <button @click="openNotif = true" class="relative">
                    <!-- Icon Lonceng -->
                    <svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_722_7956)">
                            <path
                                d="M23.076 14.9431L22.6747 12.7383L21.1101 13.0055L21.5756 15.5633C21.6168 15.7894 21.7387 15.9922 21.9146 16.127L24.4524 18.0732L24.6985 19.4255L7.4876 22.3654L7.24147 21.0131L8.93911 18.3434C9.05673 18.1585 9.09972 17.9276 9.05861 17.7015L8.43786 14.2911C8.21777 13.0934 8.29153 11.8668 8.65169 10.7352C9.01186 9.60353 9.64569 8.60691 10.4892 7.84595C11.3326 7.08499 12.3559 6.58665 13.4555 6.40126C14.5552 6.21586 15.6924 6.34997 16.7522 6.79004L16.4051 4.88278C15.595 4.65063 14.7612 4.55689 13.9346 4.605L13.6165 2.85717L12.0518 3.12444L12.37 4.87227C10.4802 5.41568 8.87215 6.70676 7.85685 8.49588C6.84155 10.285 6.49109 12.445 6.87324 14.5583L7.42973 17.6158L5.7321 20.2855C5.61447 20.4704 5.57149 20.7013 5.6126 20.9274L6.07815 23.4852C6.11931 23.7114 6.24121 23.9141 6.41702 24.049C6.59284 24.1838 6.80817 24.2396 7.01565 24.2042L12.4919 23.2688L12.647 24.1214C12.8528 25.252 13.4623 26.2659 14.3414 26.9401C15.2205 27.6142 16.2971 27.8934 17.3345 27.7162C18.3719 27.539 19.2851 26.9199 19.8732 25.9951C20.4612 25.0704 20.676 23.9157 20.4702 22.785L20.315 21.9324L25.7912 20.997C25.9987 20.9616 26.1813 20.8378 26.2989 20.6528C26.4165 20.4679 26.4595 20.2369 26.4183 20.0108L25.9528 17.453C25.9116 17.2269 25.7896 17.0241 25.6138 16.8894L23.076 14.9431ZM18.9055 23.0523C19.029 23.7307 18.9002 24.4235 18.5473 24.9784C18.1945 25.5332 17.6466 25.9047 17.0242 26.011C16.4017 26.1173 15.7557 25.9498 15.2283 25.5453C14.7008 25.1408 14.3351 24.5325 14.2117 23.8541L14.0565 23.0015L18.7504 22.1997L18.9055 23.0523Z"
                                fill="black" />
                            {{-- <path
                                d="M22.3629 11.0329C24.0912 10.7376 25.2143 8.97144 24.8714 7.08792C24.5286 5.20441 22.8497 3.91684 21.1214 4.21205C19.3932 4.50727 18.2701 6.27347 18.6129 8.15698C18.9558 10.0405 20.6347 11.3281 22.3629 11.0329Z"
                                fill="black" /> --}}
                        </g>
                    </svg>


                    <!-- Badge jumlah notif belum dibaca -->
                    @if ($global_notifikasi_unread > 0)
                        <span id="notif-badge"
                            class="absolute -top-1 -right-1 bg-red-600 text-white text-xs font-bold px-1.5 py-0.5 rounded-full">
                            {{ $global_notifikasi_unread }}
                        </span>
                    @endif
                </button>


                <div
                    class="flex items-center justify-between w-65 h-14 bg-white border border-orange-500 shadow-md rounded-2xl px-3 py-2">
                    <!-- Logo + Info -->
                    <div class="flex items-center gap-2 mr-2">
                        <a href="{{ route('superadmin.profile') }}">
                            @if (Auth::user()->role == 'super_admin')
                                @if (Auth::user()->superadmin?->img_profile)
                                    <img id="pu" class="w-10 h-10 object-cover rounded-full profile-img"
                                        src="{{ asset('storage/' . Auth::user()->superadmin->img_profile) }}"
                                        alt="Profile">
                                @else
                                    <img id="pu" class="w-10 h-10 rounded-full"
                                        src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                                        alt="">
                                @endif
                            @else
                                <img class="w-10 h-10 rounded-full"
                                    src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                                    alt="">
                            @endif

                        </a>
                        <div class="text-sm">
                            <span class="font-semibold">{{ Auth::user()->username }}</span>
                            <p class="text-gray-500 text-sm">{{ Auth::user()->email }}</p>
                        </div>
                    </div>

                    <!-- Dropdown -->
                    <select class="appearance-none text-gray-600 text-xs px-8 focus:outline-none cursor-pointer">
                        <option>Text 1</option>
                        <option>Text 2</option>
                        <option>Text 3</option>
                    </select>
                </div>

            </div>
        </div>


        <div class="max-w-4xl mx-auto bg-white border border-gray-600 rounded-lg shadow-md overflow-hidden">
            <!-- Header dengan foto dan tombol -->
            <div class="flex items-center  p-6 border-b border-gray-600 rounded-lg shadow-lg">
                @if ($data->pelamar)
                    @if ($data->pelamar->img_profile)
                        <img id="pu" class="w-40 h-40  object-cover rounded-full profile-img"
                            src="{{ asset('storage/' . $data->pelamar->img_profile) }}" alt="Profile">
                    @else
                        <img id="pu" class="w-40 h-40 rounded-full"
                            src="https://ui-avatars.com/api/?name={{ urlencode($data->username) }}&background=random&color=fff&size=128"
                            alt="">
                    @endif
                @elseif ($data->perusahaan)
                    @if ($data->perusahaan->img_profile)
                        <img id="pu" class="w-40 h-40  object-cover rounded-full profile-img"
                            src="{{ asset('storage/' . $data->perusahaan->img_profile) }}" alt="Profile">
                    @else
                        <img id="pu" class="w-40 h-40 rounded-full"
                            src="https://ui-avatars.com/api/?name={{ urlencode($data->username) }}&background=random&color=fff&size=128"
                            alt="">
                    @endif
                @elseif ($data->finance)
                    @if ($data->finance->img_profile)
                        <img id="pu" class="w-40 h-40  object-cover rounded-full profile-img"
                            src="{{ asset('storage/' . $data->finance->img_profile) }}" alt="Profile">
                    @else
                        <img id="pu" class="w-40 h-40 rounded-full"
                            src="https://ui-avatars.com/api/?name={{ urlencode($data->username) }}&background=random&color=fff&size=128"
                            alt="">
                    @endif
                @elseif ($data->admin)
                    @if ($data->admin->img_profile)
                        <img id="pu" class="w-40 h-40  object-cover rounded-full profile-img"
                            src="{{ asset('storage/' . $data->admin->img_profile) }}" alt="Profile">
                    @else
                        <img id="pu" class="w-40 h-40 rounded-full"
                            src="https://ui-avatars.com/api/?name={{ urlencode($data->username) }}&background=random&color=fff&size=128"
                            alt="">
                    @endif
                @elseif ($data->super_admin)
                    @if ($data->super_admin->img_profile)
                        <img id="pu" class="w-40 h-40  object-cover rounded-full profile-img"
                            src="{{ asset('storage/' . $data->super_admin->img_profile) }}" alt="Profile">
                    @else
                        <img id="pu" class="w-40 h-40 rounded-full"
                            src="https://ui-avatars.com/api/?name={{ urlencode($data->username) }}&background=random&color=fff&size=128"
                            alt="">
                    @endif
                @endif
                <form id="hapus" action="{{ route('superadmin.delete.akun', $data->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                </form>

                <form id="unban" action="{{ route('superadmin.unban.freeze', $data->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="number" name="status" value="0" class="hidden">
                </form>

                <form id="ban" action="{{ route('superadmin.ban.freeze', $data->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="number" name="status" value="1" class="hidden">
                </form>


                <!-- Foto Profil -->

                <div class="bg-white  shadow-m p-6 flex items-center space-x-6">
                    <!-- <img src={{ asset('images/gambar1.jpg') }} alt="User"
                                class="w-24 h-24 rounded-full object-cover border border-gray-200" /> -->

                    @if ($data->status == 0)
                        <button type="submit" form="ban"
                            class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded-xl shadow">
                            banned
                        </button>
                    @else
                        <button type="submit" form="unban"
                            class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-xl shadow">
                            Unbanned
                        </button>
                    @endif
                    <button form="hapus" type="submit"
                        class="bg-red-600 hover:bg-red-500 text-white px-6 py-2 rounded-xl shadow">
                        Hapus Akun
                    </button>
                </div>
            </div>

            <!-- Body -->
            <div class="p-6 space-y-3">
                <div class="bg-gray-300 text-center t font-semibold ext-sm border-gray-300 shadow rounded-md border py-2">
                    {{ $data->username }}
                </div>
                <div class="flex gap-3">
                    <div
                        class="flex-1 bg-gray-300 text-center font-semibold text-sm border shadow border-gray-300 rounded-md py-2">
                        {{ $data->email }}
                    </div>
                    <div
                        class="flex-1 bg-gray-300 text-center font-semibold text-sm border shadow border-gray-300 rounded-md py-2">
                        @if ($data->role == 'pelamar')
                            {{ $data->pelamar->telepon_pelamar ?? '-' }}
                        @elseif ($data->role == 'perusahaan')
                            {{ $data->perusahaan->telepon_perusahaan ?? '-' }}
                        @elseif ($data->role == 'finance')
                            -
                        @elseif ($data->role == 'admin')
                            -
                        @elseif ($data->role == 'super_admin')
                            -
                        @endif
                    </div>
                </div>
                <div class="bg-gray-300 text-center font-semibold text-sm border border-gray-300 shadow rounded-md py-2">
                    @php
                        $provinsi = '-';

                        if ($data->role == 'pelamar') {
                            $alamat = $data->pelamar()->latest()->first()?->alamat_pelamar()->latest()->first();
                            $provinsi = is_object($alamat?->provinsi)
                                ? $alamat->provinsi->nama
                                : $alamat?->provinsi ?? '-';
                        } elseif ($data->role == 'perusahaan') {
                            $alamat = $data->perusahaan()->latest()->first()?->alamat_perusahaan()->latest()->first();
                            $provinsi = is_object($alamat?->provinsi)
                                ? $alamat->provinsi->nama
                                : $alamat?->provinsi ?? '-';
                        } elseif ($data->role == 'finance') {
                            $provinsi = is_object($data->finance?->provinsi)
                                ? $data->finance->provinsi->nama
                                : $data->finance?->provinsi ?? '-';
                        } elseif ($data->role == 'admin') {
                            $provinsi = is_object($data->admin?->provinsi)
                                ? $data->admin->provinsi->nama
                                : $data->admin?->provinsi ?? '-';
                        } elseif ($data->role == 'super_admin') {
                            $provinsi = is_object($data->super_admin?->provinsi)
                                ? $data->super_admin->provinsi->nama
                                : $data->super_admin?->provinsi ?? '-';
                        }
                    @endphp

                    {{ $provinsi }}
                </div>
                <div class="bg-gray-300 h-32 rounded-md"></div>
            </div>
        </div>

        @include('super_admin.notif.modal_notif')
        @include('super_admin.notif.modal_semua')
    </main>
    <script>
        document.getElementById('fileinputsuperadmin').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    document.getElementById('pu').setAttribute('src', event.target.result);
                    document.getElementById('pa').setAttribute('src', event.target.result);
                }
                reader.readAsDataURL(file);
            }
        });
    </script>

    {{-- notif --}}
    <script>
        // Tandai dibaca
        async function markAsRead(url, el) {
            try {
                let res = await fetch(url, {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                        "Accept": "application/json"
                    }
                });

                let data = await res.json();

                if (data.success) {

                    // Ubah warna bg
                    el.classList.remove("bg-white");
                    el.classList.add("bg-gray-200");

                    // Kurangi badge
                    const badge = document.getElementById("notif-badge");
                    if (badge) {
                        let count = parseInt(badge.textContent);
                        if (count > 1) {
                            badge.textContent = count - 1;
                        } else {
                            badge.remove();
                        }
                    }
                }

            } catch (error) {
                console.error("markAsRead error:", error);
            }
        }

        // AlpineJS init
        document.addEventListener('alpine:init', () => {
            Alpine.data('notifHandler', () => ({

                // Hapus satu notifikasi
                async hapus(id) {
                    if (!confirm("Hapus notifikasi ini?")) return;

                    let url = "{{ route('notifikasi.hapus', ':id') }}".replace(':id', id);

                    let res = await fetch(url, {
                        method: "DELETE",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "Accept": "application/json"
                        }
                    });

                    let data = await res.json();

                    if (data.success) {
                        document.querySelector(`.notif-item[data-id="${id}"]`)?.remove();
                    }
                },

                // Hapus semua
                async hapusSemua() {
                    if (!confirm("Hapus semua notifikasi?")) return;

                    let res = await fetch("{{ route('notifikasi.hapusSemua') }}", {
                        method: "DELETE",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "Accept": "application/json"
                        }
                    });

                    let data = await res.json();

                    if (data.success) {
                        document.querySelectorAll('.notif-item').forEach(e => e.remove());
                    }
                },

                // Hapus semua yang sudah dibaca
                async hapusSemuaBaca() {
                    if (!confirm("Hapus semua notifikasi yang sudah dibaca?")) return;

                    let res = await fetch("{{ route('notifikasi.hapusSemuaBaca') }}", {
                        method: "DELETE",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "Accept": "application/json"
                        }
                    });

                    let data = await res.json();

                    if (data.success) {
                        document.querySelectorAll('.notif-item.bg-gray-200')
                            .forEach(e => e.remove());
                    }
                }

            }));
        });
    </script>

    <script>
        document.querySelector('form[target="hiddenFrame"]').addEventListener('submit', () => {
            document.querySelectorAll('.notif-item').forEach(item => {
                item.classList.remove('bg-white');
                item.classList.add('bg-gray-200');
            });
            const badge = document.querySelector('.absolute .bg-red-500');
            if (badge) badge.remove();
        });
    </script>
@endsection
