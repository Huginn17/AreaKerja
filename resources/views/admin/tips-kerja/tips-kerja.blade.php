@extends('admin.sidebar.index')
@section('sidebaradmin')
    <div class="p-4 sm:ml-64">
        <main class="flex-1 p-6 bg-white overflow-y-auto">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-medium">Tips Kerja</h1>
                <div class="flex items-center gap-3">
                    <svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_722_7956)">
                            <path
                                d="M23.076 14.9431L22.6747 12.7383L21.1101 13.0055L21.5756 15.5633C21.6168 15.7894 21.7387 15.9922 21.9146 16.127L24.4524 18.0732L24.6985 19.4255L7.4876 22.3654L7.24147 21.0131L8.93911 18.3434C9.05673 18.1585 9.09972 17.9276 9.05861 17.7015L8.43786 14.2911C8.21777 13.0934 8.29153 11.8668 8.65169 10.7352C9.01186 9.60353 9.64569 8.60691 10.4892 7.84595C11.3326 7.08499 12.3559 6.58665 13.4555 6.40126C14.5552 6.21586 15.6924 6.34997 16.7522 6.79004L16.4051 4.88278C15.595 4.65063 14.7612 4.55689 13.9346 4.605L13.6165 2.85717L12.0518 3.12444L12.37 4.87227C10.4802 5.41568 8.87215 6.70676 7.85685 8.49588C6.84155 10.285 6.49109 12.445 6.87324 14.5583L7.42973 17.6158L5.7321 20.2855C5.61447 20.4704 5.57149 20.7013 5.6126 20.9274L6.07815 23.4852C6.11931 23.7114 6.24121 23.9141 6.41702 24.049C6.59284 24.1838 6.80817 24.2396 7.01565 24.2042L12.4919 23.2688L12.647 24.1214C12.8528 25.252 13.4623 26.2659 14.3414 26.9401C15.2205 27.6142 16.2971 27.8934 17.3345 27.7162C18.3719 27.539 19.2851 26.9199 19.8732 25.9951C20.4612 25.0704 20.676 23.9157 20.4702 22.785L20.315 21.9324L25.7912 20.997C25.9987 20.9616 26.1813 20.8378 26.2989 20.6528C26.4165 20.4679 26.4595 20.2369 26.4183 20.0108L25.9528 17.453C25.9116 17.2269 25.7896 17.0241 25.6138 16.8894L23.076 14.9431ZM18.9055 23.0523C19.029 23.7307 18.9002 24.4235 18.5473 24.9784C18.1945 25.5332 17.6466 25.9047 17.0242 26.011C16.4017 26.1173 15.7557 25.9498 15.2283 25.5453C14.7008 25.1408 14.3351 24.5325 14.2117 23.8541L14.0565 23.0015L18.7504 22.1997L18.9055 23.0523Z"
                                fill="black" />
                            <path
                                d="M22.3629 11.0329C24.0912 10.7376 25.2143 8.97144 24.8714 7.08792C24.5286 5.20441 22.8497 3.91684 21.1214 4.21205C19.3932 4.50727 18.2701 6.27347 18.6129 8.15698C18.9558 10.0405 20.6347 11.3281 22.3629 11.0329Z"
                                fill="black" />
                            <ellipse cx="21.3472" cy="5.13034" rx="6.35506" ry="6.15646" fill="#E46054" />
                        </g>
                        <path d="M22.8299 3.49956L20.917 8H19.8345L21.7696 3.61819H19.3452V2.72106H22.8299V3.49956Z"
                            fill="white" />
                        <defs>
                            <clipPath id="clip0_722_7956">
                                <rect width="25.3967" height="27.7315" fill="white"
                                    transform="matrix(0.985722 -0.168378 0.179073 0.983836 0.164062 4.27612)" />
                            </clipPath>
                        </defs>
                    </svg>

                    <div class="flex items-center gap-2 bg-white px-3 py-2 border border-gray-500 shadow-md rounded-2xl">
                        <a href="#">
                            @if (Auth::user()->role == 'admin')
                                @if (Auth::user()->admin->img_profile)
                                    <img id="pu" class="w-10 h-10  object-cover rounded-full profile-img"
                                        src="{{ asset('storage/' . Auth::user()->admin->img_profile) }}" alt="Profile">
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

                        <select class="appearance-none px-8 py-2 bg-transparent text-gray-600 text-sm focus:outline-none">
                            <option>Text 1</option>
                            <option>Text 2</option>
                            <option>Text 3</option>
                        </select>
                    </div>
                </div>
            </div>

            {{-- content --}}
            <div class="flex justify-center py-3">

                <div class="w-full">
                    {{-- filter atas --}}

                    <div class="flex justify-between items-center">
                        <div class="text-sm space-x-1">
                            <span class="font-medium">Semua ({{ $all }})</span> |
                            <span id="btn_terbit" class="text-blue-600">Telah Terbit <span
                                    class="text-gray-800">({{ $terbit }})</span></span> |
                            <span id="btn_blmterbit" class="text-blue-600">Draf <span
                                    class="text-gray-800">({{ $noterbit }})</span></span>
                        </div>

                        <a href="{{ route('admin.tips-kerja.createForm') }}"
                            class="bg-blue-400 text-white px-4 py-2 rounded-lg mb-3">Buat Post</a>
                    </div>

                    {{-- filter bawah --}}
                    <div class="flex justify-between items-center mb-4">
                        <div class="flex space-x-4">
                            <select id="filter_select" onchange="searchTable()"
                                class="border-2 border-gray-400 rounded-lg px-8 py-2 text-sm">
                                <option value="title">Judul</option>
                                <option value="penulis">Penulis</option>
                                <option value="created_at">Tanggal</option>
                            </select>
                            <button type="button" onclick="setAction('update')"
                                class="bg-gray-700 px-8 py-1 rounded-lg text-white">Terapkan</button>
                            <button type="button" onclick="setAction('delete')"
                                class="bg-red-600 text-white px-6 py-1 rounded-lg">Hapus</button>
                        </div>

                        <div class="flex space-x-4">
                            <input id="search_input" type="text" placeholder="nama/tanggal..."
                                class="border-2 border-gray-400 rounded-lg px-2 py-1 text-sm">
                            <button type="button" onclick="searchTable()"
                                class="bg-gray-700 text-white px-9 py-2 rounded-lg">Cari</button>
                        </div>
                    </div>
                    {{-- table --}}
                    <form id="bulkAction" method="POST">
                        @csrf
                        <input type="hidden" name="_method" id="formMethod">
                        <input type="hidden" name="status" id="statusField">

                        <div id="sudah_terbit" class="rounded-lg overflow-hidden hidden">
                            <table class="w-full text-sm text-left">
                                <thead class="bg-gray-600 text-white">
                                    <tr>
                                        <th class="px-4 py-3 w-10"><input id="checkAllTerbit" type="checkbox"></th>
                                        <th class="px-4 py-3 font-semibold">Judul</th>
                                        <th class="px-4 py-3 font-semibold">Penulis</th>
                                        <th class="px-4 py-3 font-semibold">Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sudah_terbit as $s)
                                        <tr class="bg-gray-200">
                                            <td class="px-4 py-4"><input name="ids[]" value="{{ $s->id }}"
                                                    type="checkbox"></td>
                                            <td class="px-4 py-4 text-blue-600 font-medium">
                                                {{ $s->title }}
                                            </td>
                                            <td class="px-4 py-4 font-semibold">{{ $s->penulis }}</td>
                                            <td class="px-4 py-4 font-semibold">{{ $s->created_at->format('d M Y') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{-- belum terbit --}}
                        <div id="belum_terbit" class="rounded-lg overflow-hidden">
                            <table class="w-full text-sm text-left">
                                <thead class="bg-gray-600 text-white">
                                    <tr>
                                        <th class="px-4 py-3 w-10"><input id="checkAllBelum" type="checkbox"></th>
                                        <th class="px-4 py-3 font-semibold">Judul</th>
                                        <th class="px-4 py-3 font-semibold">Penulis</th>
                                        <th class="px-4 py-3 font-semibold">Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($belum_terbit as $s)
                                        <tr class="bg-gray-200">
                                            <td class="px-4 py-4"><input name="ids[]" value="{{ $s->id }}"
                                                    type="checkbox"></td>
                                            <td class="px-4 py-4 text-blue-600 font-medium">
                                                {{ $s->title }}
                                            </td>
                                            <td class="px-4 py-4 font-semibold">{{ $s->penulis }}</td>
                                            <td class="px-4 py-4 font-semibold">{{ $s->created_at->format('d M Y') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
                <script>
                    let btn_terbit = document.getElementById("btn_terbit");
                    let btn_blmterbit = document.getElementById("btn_blmterbit");

                    let belum_terbit = document.getElementById('belum_terbit');
                    let sudah_terbit = document.getElementById('sudah_terbit');

                    // default tabel aktif (pakai id div)
                    let activeTableId = 'belum_terbit';

                    btn_blmterbit.addEventListener("click", () => {
                        sudah_terbit.classList.add('hidden');
                        belum_terbit.classList.remove('hidden');
                        activeTableId = 'belum_terbit'; // update
                    });

                    btn_terbit.addEventListener("click", () => {
                        belum_terbit.classList.add('hidden');
                        sudah_terbit.classList.remove('hidden');
                        activeTableId = 'sudah_terbit'; // update
                    });

                    function setAction(action) {
                        let form = document.getElementById('bulkAction');

                        if (action === 'update') {
                            form.action = "{{ route('admin.tips-kerja.update.status') }}";
                            document.getElementById('formMethod').value = "PUT";
                            document.getElementById('statusField').value = "terbit";
                        } else if (action === 'delete') {
                            form.action = "{{ route('admin.tips-kerja.destroy') }}";
                            document.getElementById('formMethod').value = "DELETE";
                        }

                        form.submit();
                    }

                    document.getElementById("checkAllTerbit").addEventListener("change", function() {
                        document.querySelectorAll("#sudah_terbit input[name='ids[]']").forEach(cb => cb.checked = this.checked);
                    });

                    document.getElementById("checkAllBelum").addEventListener("change", function() {
                        document.querySelectorAll("#belum_terbit input[name='ids[]']").forEach(cb => cb.checked = this.checked);
                    });

                    function searchTable() {
                        let input = document.getElementById("search_input").value.toLowerCase();
                        let filterBy = document.getElementById("filter_select").value;

                        const colIndex = {
                            "title": 1,
                            "penulis": 2,
                            "created_at": 3
                        };

                        let table = document.querySelector(`#${activeTableId} table`);
                        if (!table) return; // kalau table tidak ada, stop

                        let rows = table.getElementsByTagName("tr");

                        for (let i = 1; i < rows.length; i++) {
                            let colText = rows[i].cells[colIndex[filterBy]]?.innerText.toLowerCase() || "";
                            rows[i].style.display = colText.includes(input) ? "" : "none";
                        }
                    }
                </script>


            </div>
        </main>
    </div>
@endsection
