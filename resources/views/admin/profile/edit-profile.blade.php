@extends('admin.sidebar.index')
@section('sidebaradmin')
    <div class="p-4 sm:ml-64" x-data="{ openNotif: false, openAllNotif: false }">


        <!-- Header -->
        <header class="w-full flex items-center justify-between px-6 py-3">
            <h1 class="text-xl font-semibold">Profile</h1>
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

                <div class="flex items-center gap-2 bg-white px-3 py-2 border border-gray-500 shadow-md rounded-2xl">
                    <a href="#">
                        @if (Auth::user()->admin->img_profile)
                            <img id="pa" class="w-10 h-10 object-cover rounded-full"
                                src="{{ asset('storage/' . Auth::user()->admin->img_profile) }}" alt="Profile">
                        @else
                            <img id="pa" class="w-10 h-10 object-cover rounded-full"
                                src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                                alt="Profile">
                        @endif
                    </a>
                    <div class="text-sm mr-14">
                        <span class="font-semibold">{{ Auth::user()->username }}<span>
                                <p class="text-gray-500 text-sm">{{ Auth::user()->email }}</p>
                    </div>
                </div>
            </div>
        </header>


        <div class="p-4">

            <div class="p-6 rounded-lg border-2 border-gray-400 shadow">
                {{-- header --}}
                <h2 class="text-lg font-semibold mb-6">Edit Profile</h2>

                {{-- form --}}
                <form action="{{ route('admin.update.profile', Auth::user()->admin->id) }}" method="POST" class="space-y-4"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    {{-- profiile --}}
                    <div class="flex items-center gap-4 mb-8">
                        @if (Auth::user()->admin->img_profile)
                            <img id="pu" class="w-24 h-24 object-cover rounded-full"
                                src="{{ asset('storage/' . Auth::user()->admin->img_profile) }}" alt="Profile">
                        @else
                            <img id="pu" class="w-24 h-24 object-cover rounded-full"
                                src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&background=random&color=fff&size=128"
                                alt="Profile">
                        @endif
                        <div>
                            <h3 class="font-semibold">{{ Auth::user()->username }}</h3>
                            <p class="text-sm text-gray-500">{{ Auth::user()->email }}</p>
                        </div>
                        <div class="flex flex-col gap-3 scale-90">
                            <input type="file" name="img_profile" id="fileinputadmin" accept="image/*" class="hidden">
                            <button type="button" onclick="document.getElementById('fileinputadmin').click();"
                                class="flex items-center gap-2 px-4 py-2 text-sm border-2 border-gray-400 bg-green-600 hover:bg-green-700 text-white rounded-md">
                                <!-- Icon upload -->
                                <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4.70151 4.04985L6.00476 2.64706V8.49608C6.00476 8.65783 6.06472 8.81297 6.17145 8.92735C6.27818 9.04173 6.42293 9.10598 6.57387 9.10598C6.72481 9.10598 6.86956 9.04173 6.97629 8.92735C7.08302 8.81297 7.14297 8.65783 7.14297 8.49608V2.64706L8.44623 4.04985C8.49913 4.10701 8.56208 4.15239 8.63143 4.18335C8.70078 4.21431 8.77516 4.23026 8.85029 4.23026C8.92542 4.23026 8.99981 4.21431 9.06916 4.18335C9.13851 4.15239 9.20145 4.10701 9.25436 4.04985C9.3077 3.99315 9.35004 3.92569 9.37893 3.85137C9.40782 3.77705 9.4227 3.69733 9.4227 3.61681C9.4227 3.5363 9.40782 3.45658 9.37893 3.38226C9.35004 3.30793 9.3077 3.24048 9.25436 3.18378L6.97793 0.744145C6.92381 0.688618 6.85999 0.645092 6.79013 0.616064C6.65157 0.555062 6.49616 0.555062 6.35761 0.616064C6.28775 0.645092 6.22393 0.688618 6.1698 0.744145L3.89338 3.18378C3.84032 3.24064 3.79823 3.30815 3.76951 3.38246C3.74079 3.45676 3.72601 3.53639 3.72601 3.61681C3.72601 3.69723 3.74079 3.77687 3.76951 3.85117C3.79823 3.92547 3.84032 3.99298 3.89338 4.04985C3.94644 4.10671 4.00944 4.15182 4.07877 4.1826C4.1481 4.21338 4.2224 4.22922 4.29745 4.22922C4.37249 4.22922 4.4468 4.21338 4.51613 4.1826C4.58545 4.15182 4.64845 4.10671 4.70151 4.04985ZM11.6958 6.66635C11.5449 6.66635 11.4001 6.73061 11.2934 6.84499C11.1867 6.95937 11.1267 7.1145 11.1267 7.27626V10.9357C11.1267 11.0975 11.0668 11.2526 10.96 11.367C10.8533 11.4814 10.7085 11.5456 10.5576 11.5456H2.59013C2.43919 11.5456 2.29444 11.4814 2.18771 11.367C2.08098 11.2526 2.02102 11.0975 2.02102 10.9357V7.27626C2.02102 7.1145 1.96106 6.95937 1.85434 6.84499C1.74761 6.73061 1.60285 6.66635 1.45192 6.66635C1.30098 6.66635 1.15623 6.73061 1.0495 6.84499C0.942772 6.95937 0.882813 7.1145 0.882812 7.27626V10.9357C0.882813 11.421 1.06269 11.8864 1.38287 12.2295C1.70306 12.5727 2.13732 12.7654 2.59013 12.7654H10.5576C11.0104 12.7654 11.4447 12.5727 11.7649 12.2295C12.085 11.8864 12.2649 11.421 12.2649 10.9357V7.27626C12.2649 7.1145 12.205 6.95937 12.0982 6.84499C11.9915 6.73061 11.8468 6.66635 11.6958 6.66635Z"
                                        fill="currentColor" />
                                </svg>
                                Upload
                            </button>
                            <button type="button"
                                onclick="event.preventDefault(); document.getElementById('removeadminForm').submit();"
                                class="flex items-center gap-2 px-4 py-2 mt-1 text-sm border-2 border-gray-400 text-white rounded-md bg-red-500 hover:bg-red-600">
                                <!-- Icon trash -->
                                <svg width="13" height="14" viewBox="0 0 13 14" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.7907 2.77852H9.4194V2.30947C9.4194 1.93628 9.2695 1.57837 9.00268 1.31448C8.73586 1.05059 8.37397 0.902344 7.99663 0.902344H5.1511C4.77376 0.902344 4.41188 1.05059 4.14506 1.31448C3.87824 1.57837 3.72834 1.93628 3.72834 2.30947V2.77852H1.35707C1.23129 2.77852 1.11066 2.82793 1.02172 2.9159C0.932779 3.00386 0.882813 3.12316 0.882812 3.24756C0.882813 3.37196 0.932779 3.49126 1.02172 3.57922C1.11066 3.66719 1.23129 3.7166 1.35707 3.7166H1.83132V12.1594C1.83132 12.4082 1.93125 12.6468 2.10913 12.8227C2.28701 12.9986 2.52827 13.0975 2.77983 13.0975H10.3679C10.6195 13.0975 10.8607 12.9986 11.0386 12.8227C11.2165 12.6468 11.3164 12.4082 11.3164 12.1594V3.7166H11.7907C11.9165 3.7166 12.0371 3.66719 12.126 3.57922C12.215 3.49126 12.2649 3.37196 12.2649 3.24756C12.2649 3.12316 12.215 3.00386 12.126 2.9159C12.0371 2.82793 11.9165 2.77852 11.7907 2.77852ZM4.67685 2.30947C4.67685 2.18508 4.72682 2.06577 4.81576 1.97781C4.9047 1.88985 5.02532 1.84043 5.1511 1.84043H7.99663C8.12241 1.84043 8.24304 1.88985 8.33198 1.97781C8.42092 2.06577 8.47089 2.18508 8.47089 2.30947V2.77852H4.67685V2.30947ZM10.3679 12.1594H2.77983V3.7166H10.3679V12.1594ZM5.62536 6.06182V9.81416C5.62536 9.93856 5.57539 10.0579 5.48645 10.1458C5.39751 10.2338 5.27689 10.2832 5.1511 10.2832C5.02532 10.2832 4.9047 10.2338 4.81576 10.1458C4.72682 10.0579 4.67685 9.93856 4.67685 9.81416V6.06182C4.67685 5.93742 4.72682 5.81812 4.81576 5.73015C4.9047 5.64219 5.02532 5.59278 5.1511 5.59278C5.27689 5.59278 5.39751 5.64219 5.48645 5.73015C5.57539 5.81812 5.62536 5.93742 5.62536 6.06182ZM8.47089 6.06182V9.81416C8.47089 9.93856 8.42092 10.0579 8.33198 10.1458C8.24304 10.2338 8.12241 10.2832 7.99663 10.2832C7.87085 10.2832 7.75022 10.2338 7.66128 10.1458C7.57234 10.0579 7.52238 9.93856 7.52238 9.81416V6.06182C7.52238 5.93742 7.57234 5.81812 7.66128 5.73015C7.75022 5.64219 7.87085 5.59278 7.99663 5.59278C8.12241 5.59278 8.24304 5.64219 8.33198 5.73015C8.42092 5.81812 8.47089 5.93742 8.47089 6.06182Z"
                                        fill="currentColor" />
                                </svg>
                                Remove
                            </button>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        {{-- email --}}
                        <div>
                            <label class="block mb-1 text-sm font-medium" for="">Email</label>
                            <input type="email" name="email" value="{{ Auth::user()->email }}" readonly
                                class="w-full p-2 border-2 border-gray-400 shadow rounded-md text-sm " placeholder="Email">
                        </div>
                        {{-- username --}}
                        <div>
                            <label for="" class="block mb-1 text-sm font-medium">Username</label>
                            <input type="text" name="username" value="{{ Auth::user()->username }}"
                                class="w-full p-2 border-2 border-gray-400 shadow rounded-md text-sm"
                                placeholder="Username">
                        </div>
                    </div>

                    {{-- nama lengkap --}}
                    <div>
                        <label for="" class="block mb-1 text-sm font-medium">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" value="{{ Auth::user()->admin->nama_lengkap }}"
                            class="w-[455px] p-2 border-2 border-gray-400 shadow rounded-md text-sm"
                            placeholder="Nama Lengkap">
                    </div>

                    {{-- provinsi,kota,kec --}}
                    <div class="flex">
                        <div class="mr-[25px]">
                            <label for="" class="block mb-1 text-sm font-medium">Provinsi</label>
                            <select id="provinsiSelect" name="provinsi_id"
                                class="w-full border-2 border-gray-400 rounded-md px-3 py-2 outline-none focus:ring-1 focus:ring-gray-500">
                                <option value="">Pilih Provinsi</option>
                                @foreach ($provinsis as $prov)
                                    <option value="{{ $prov->id }}"
                                        {{ $data->provinsi_id == $prov->id ? 'selected' : '' }}>
                                        {{ $prov->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mr-[25px]">
                            <label for="" class="block mb-1 mr-10 text-sm font-medium">Kota/Kabupaten</label>
                            <select id="kotaSelect" name="kota_id"
                                class="w-full border-2 border-gray-400 rounded-md px-3 py-2 outline-none focus:ring-1 focus:ring-gray-500">
                                <option value="">Pilih Kota</option>
                                @if ($data->kota)
                                    <option value="{{ $data->kota_id }}" selected>{{ $data->kota->nama }}</option>
                                @endif
                            </select>
                        </div>

                        <div>
                            <label for="" class="block mb-1 mr-10 text-sm font-medium">Kecamatan</label>
                            <select id="kecamatanSelect" name="kecamatan_id"
                                class="w-full border-2 border-gray-400 rounded-md px-3 py-2 outline-none focus:ring-1 focus:ring-gray-500">
                                <option value="">Pilih Kecamatan</option>
                                @if ($data->kecamatan)
                                    <option value="{{ $data->kecamatan_id }}" selected>{{ $data->kecamatan->nama }}
                                    </option>
                                @endif
                            </select>
                        </div>
                    </div>

                    {{-- desa dan kode pos --}}
                    <div class="flex">
                        <div class="mr-2">
                            <label class="block mb-1 text-sm font-medium">Desa</label>
                            <input type="text" name="desa" value="{{ Auth::user()->admin->desa }}"
                                class="w-48 p-2 shadow border-2 border-gray-400 rounded-md text-sm" placeholder="-">
                        </div>
                        <div class="ml-5">
                            <label class="block mb-1 text-sm font-medium">Kode Pos</label>
                            <input type="text" name="kode_pos" value="{{ Auth::user()->admin->kode_pos }}"
                                class="w-48 border-2 border-gray-400 shadow p-2 border rounded-lg text-sm" />
                        </div>
                    </div>

                    {{-- detail --}}
                    <div>
                        <label for="" class="block mb-1 text-sm font-medium">Detail Lainnya</label>
                        <input type="text" name="detail_alamat" value="{{ Auth::user()->admin->detail_alamat }}"
                            class="w-full p-2 shadow border-2 border-gray-400 rounded-md text-sm"
                            placeholder="Detail Lainnya">
                    </div>

                    <!-- Button -->
                    <div class="md:col-span-2 flex justify-center items-center gap-4">
                        <a href="{{ route('admin.profile') }}"
                            class="bg-red-600 text-white font-medium px-12 py-1 rounded-md hover:bg-red-700 border border-red-500 transition">Batal
                        </a>
                        <button type="submit"
                            class="bg-green-600 text-white font-medium px-10 py-1 rounded-md hover:bg-green-700 border border-green-500 transition">Simpan
                        </button>
                    </div>
            </div>


            </form>
        </div>

        <form id="removeadminForm" action="{{ route('admin.destroy.profile', Auth::user()->admin->id) }}" method="POST"
            class="hidden">
            @csrf
            @method('DELETE')
        </form>
        @include('admin.notif.modal_notif')
        @include('admin.notif.modal_semua')
    </div>

    </div>


    {{-- Script AJAX Dinamis --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const provinsiSelect = document.getElementById('provinsiSelect');
            const kotaSelect = document.getElementById('kotaSelect');
            const kecamatanSelect = document.getElementById('kecamatanSelect');

            // Saat provinsi berubah
            provinsiSelect.addEventListener('change', function() {
                const provinsiId = this.value;
                kotaSelect.innerHTML = '<option>Memuat...</option>';
                kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';

                fetch(`{{ route('admin.get.kota', '') }}/${provinsiId}`)
                    .then(res => res.json())
                    .then(data => {
                        kotaSelect.innerHTML = '<option value="">Pilih Kota</option>';
                        const options = data.map(k => `<option value="${k.id}">${k.nama}</option>`);
                        kotaSelect.insertAdjacentHTML('beforeend', options.join(''));
                    });
            });

            // Saat kota berubah
            kotaSelect.addEventListener('change', function() {
                const kotaId = this.value;
                kecamatanSelect.innerHTML = '<option>Memuat...</option>';

                fetch(`{{ route('admin.get.kecamatan', '') }}/${kotaId}`)
                    .then(res => res.json())
                    .then(data => {
                        kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
                        const options = data.map(k => `<option value="${k.id}">${k.nama}</option>`);
                        kecamatanSelect.insertAdjacentHTML('beforeend', options.join(''));
                    });
            });
        });
    </script>
@endsection
