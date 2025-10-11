@extends('admin.sidebar.index')
@section('sidebaradmin')
    <div class="p-4 sm:ml-64">
        <div class="flex-1 p-6 bg-white overflow-y-auto" x-data="{ openModal: false }">
            <div class="flex justify-between items-center mb-10">
                <h1 class="text-2xl font-medium">Buat Event Baru</h1>
                <!-- Profil Admin -->
                <div class="flex items-center gap-3">
                   <svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_680_17357)">
<path d="M23.076 14.9416L22.6747 12.7368L21.1101 13.0041L21.5756 15.5619C21.6168 15.788 21.7387 15.9907 21.9146 16.1255L24.4524 18.0718L24.6985 19.424L7.4876 22.3639L7.24147 21.0117L8.93911 18.3419C9.05673 18.157 9.09972 17.9261 9.05861 17.7L8.43786 14.2896C8.21777 13.0919 8.29153 11.8654 8.65169 10.7337C9.01186 9.60207 9.64569 8.60544 10.4892 7.84449C11.3326 7.08353 12.3559 6.58519 13.4555 6.39979C14.5552 6.21439 15.6924 6.3485 16.7522 6.78858L16.4051 4.88131C15.595 4.64916 14.7612 4.55542 13.9346 4.60354L13.6165 2.85571L12.0518 3.12297L12.37 4.8708C10.4802 5.41421 8.87215 6.7053 7.85685 8.49441C6.84155 10.2835 6.49109 12.4436 6.87324 14.5569L7.42973 17.6143L5.7321 20.284C5.61447 20.4689 5.57149 20.6999 5.6126 20.926L6.07815 23.4838C6.11931 23.7099 6.24121 23.9127 6.41702 24.0475C6.59284 24.1823 6.80817 24.2382 7.01565 24.2027L12.4919 23.2673L12.647 24.1199C12.8528 25.2505 13.4623 26.2644 14.3414 26.9386C15.2205 27.6128 16.2971 27.892 17.3345 27.7147C18.3719 27.5375 19.2851 26.9185 19.8732 25.9937C20.4612 25.0689 20.676 23.9142 20.4702 22.7836L20.315 21.931L25.7912 20.9956C25.9987 20.9601 26.1813 20.8363 26.2989 20.6513C26.4165 20.4664 26.4595 20.2354 26.4183 20.0093L25.9528 17.4515C25.9116 17.2254 25.7896 17.0227 25.6138 16.8879L23.076 14.9416ZM18.9055 23.0508C19.029 23.7292 18.9002 24.422 18.5473 24.9769C18.1945 25.5318 17.6466 25.9032 17.0242 26.0095C16.4017 26.1159 15.7557 25.9484 15.2283 25.5439C14.7008 25.1394 14.3351 24.531 14.2117 23.8526L14.0565 23L18.7504 22.1982L18.9055 23.0508Z" fill="black"/>
<path d="M22.3629 11.0324C24.0912 10.7372 25.2143 8.97095 24.8714 7.08743C24.5286 5.20392 22.8497 3.91635 21.1214 4.21156C19.3932 4.50678 18.2701 6.27298 18.6129 8.15649C18.9558 10.04 20.6347 11.3276 22.3629 11.0324Z" fill="black"/>
<ellipse cx="21.3453" cy="5.12912" rx="6.35506" ry="6.15646" fill="#E46054"/>
</g>
<path d="M22.8299 3.49956L20.917 8H19.8345L21.7696 3.61819H19.3452V2.72106H22.8299V3.49956Z" fill="white"/>
<defs>
<clipPath id="clip0_680_17357">
<rect width="25.3967" height="27.7315" fill="white" transform="matrix(0.985722 -0.168378 0.179073 0.983836 0.162109 4.27539)"/>
</clipPath>
</defs>
</svg>

                    <div
                        class="flex items-center justify-between w-96 h-14 bg-white border border-gray-400 shadow-md rounded-2xl px-3 py-2">
                        <div class="flex items-center gap-2 mr-2">
                            <a href="#">
                                @if (Auth::user()->role == 'super_admin')
                                    @if (Auth::user()->superadmin->img_profile)
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
                        </div>
                        <select class="appearance-none text-gray-600 text-xs px-8 focus:outline-none cursor-pointer">
                            <option>Text 1</option>
                            <option>Text 2</option>
                            <option>Text 3</option>
                        </select>
                    </div>
                </div>
            </div>

            {{-- content --}}
            <div class="w-full bg-white">
                <form action="{{ route('admin.event.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <!-- Judul -->
                    <input type="text" placeholder="Masukkan judul artikel" name="title"
                        class="w-full bg-gray-200 border-2 border-gray-400 rounded-md px-4 py-2 mb-8"><br>

                    <!-- Upload Media -->
                    <div class="mb-4">
                        <label for="uploadMedia"
                            class="cursor-pointer px-4 py-2 bg-gray-100 border-2 border-gray-400 rounded-lg shadow hover:bg-gray-200 text-sm font-medium">
                            Tambahkan Media
                        </label><br>
                        <input id="uploadMedia" type="file" name="image" accept="image/*" hidden><br>
                        <!-- Preview Gambar -->
                        <div class="mt-3 w-64 h-40 border-2 border-gray-400 rounded-md overflow-hidden">
                            <img id="previewImage"
                                src="{{ isset($event) && $event->image ? asset('storage/' . $event->image) : asset('images/no images.jpg') }}"
                                class="w-full h-full object-contain">
                        </div>

                    </div>

                    <!-- Editor -->
                    <div class="rounded-md overflow-hidden mt-4">
                        <input id="x" type="hidden" name="content"
                            value="{{ old('content', $event->content ?? '') }}">
                        <trix-editor input="x" class="border-2 order-gray-400 trix-content"></trix-editor>
                    </div>

                    <div class="space-y-4 mt-4">
                        <!-- Waktu Acara -->
                        <div>
                            <label class="block font-medium mb-1">Waktu Acara</label>
                            <div class="flex items-center gap-2">
                                <input type="date" name="tgl_mulai" id="tgl_mulai"
                                    class="bg-gray-200 border-2 border-gray-400 rounded-md px-3 py-2 text-sm w-40"
                                    value="{{ old('tgl_mulai') }}">
                                <input type="date" name="tgl_akhir" id="tgl_akhir"
                                    class="bg-gray-200 border-2 border-gray-400 rounded-md px-3 py-2 text-sm w-40"
                                    value="{{ old('tgl_akhir') }}">
                                <input type="time" name="jam_mulai"
                                    class="bg-gray-200 border-2 border-gray-400 rounded-md px-3 py-2 text-sm w-24">
                                <span>Sampai</span>
                                <input type="time" name="jam_akhir"
                                    class="bg-gray-200 border-2 border-gray-400 rounded-md px-3 py-2 text-sm w-24">
                            </div>
                        </div>

                        <!-- Penutupan Pendaftaran -->
                        <div>
                            <label class="block font-medium mb-1">Penutupan Pendaftaran</label>
                            <input type="date" name="penutupan_pendaftaran" id="penutupan_pendaftaran"
                                class="bg-gray-200 border-2 border-gray-400 rounded-md px-3 py-2 text-sm w-40"
                                value="{{ old('penutupan_pendaftaran') }}">
                        </div>

                        <!-- Kuota -->
                        <div>
                            <label class="block font-medium mb-1">Kuota Partisipasi</label>
                            <input type="number" name="kuota"
                                class="bg-gray-200 border-2 border-gray-400 rounded-md px-3 py-2 text-sm w-24" placeholder="000">
                        </div>

                        <!-- Lokasi -->
                        <div>
                            <label class="block font-medium mb-1">Lokasi</label>
                            <textarea name="lokasi" class="w-96 bg-gray-200 border-2 border-gray-400 rounded-md px-3 py-2 text-sm h-32 max-h-64"
                                placeholder="Isi Detail Alamat Acara"></textarea>
                        </div>

                        <!-- Daftar Kegiatan -->
                        <div>
                            <label class="block font-medium mb-2">Daftar Kegiatan</label>
                            <div id="kegiatan-list" class="space-y-2">
                                {{-- <div class="flex items-center gap-2 kegiatan-item bg-gray-100 p-2 rounded-md cursor-move">
                                    <input type="time" name="kegiatan_waktu[]" value="{{ $k->waktu }}"
                                        class="bg-gray-200 border rounded-md px-3 py-2 text-sm w-24">
                                    <input type="text" name="kegiatan_nama[]" value="{{ $k->kegiatan }}"
                                        class="bg-gray-200 border rounded-md px-3 py-2 text-sm w-80"
                                        placeholder="Isi Kegiatan">
                                    <button type="button" onclick="hapusKegiatan(this)"
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md text-sm">
                                        Hapus
                                    </button>
                                </div> --}}
                            </div>
                        </div>

                        <!-- Tombol Tambah Acara -->
                        <div>
                            <button type="button" @click="openModal = true"
                                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md shadow">Tambah Acara</button>
                        </div>

                        <!-- Modal -->
                        <div x-show="openModal"
                            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50" x-cloak>
                            <div class="bg-white rounded-lg shadow-lg w-96 p-6">
                                <h2 class="text-lg font-semibold mb-4">Tambah Kegiatan</h2>
                                <div class="space-y-3">
                                    <div>
                                        <label class="block text-sm font-medium">Waktu</label>
                                        <input type="time" id="modal-waktu"
                                            class="w-full border-2 border-gray-400 rounded-md px-3 py-2 bg-gray-100">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium">Kegiatan</label>
                                        <input type="text" id="modal-kegiatan"
                                            class="w-full border-2 border-gray-400 rounded-md px-3 py-2 bg-gray-100"
                                            placeholder="Nama kegiatan">
                                    </div>
                                </div>
                                <div class="mt-6 flex justify-end gap-3">
                                    <button type="button" @click="openModal = false"
                                        class="bg-red-600 hover:bg-red-500 text-white px-4 py-2 rounded-md">
                                        Batal
                                    </button>
                                    <button type="button" onclick="tambahKegiatan(); openModal=false"
                                        class="bg-green-600 hover:bg-green-500 text-white px-4 py-2 rounded-md">
                                        Simpan
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="flex gap-4 mt-6">
                            <button type="submit"
                                class="bg-green-600 text-white px-14 py-2 text-lg rounded-md shadow hover:bg-green-500">Simpan</button>
                            <a href="/super_admin/event"
                                class="bg-red-600 hover:bg-red-500 text-white px-16 py-2 text-lg rounded-md shadow">Batal</a>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Script -->
            <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
            <script>
                new Sortable(document.getElementById("kegiatan-list"), {
                    animation: 150,
                    handle: ".kegiatan-item",
                    ghostClass: "bg-yellow-100"
                });

                function tambahKegiatan() {
                    let waktu = document.getElementById("modal-waktu").value;
                    let kegiatan = document.getElementById("modal-kegiatan").value;

                    if (waktu && kegiatan) {
                        let container = document.getElementById("kegiatan-list");
                        let div = document.createElement("div");
                        div.classList.add("flex", "items-center", "gap-2", "kegiatan-item", "bg-gray-100", "p-2", "rounded-md",
                            "cursor-move");

                        div.innerHTML = `
                <input type="time" name="kegiatan_waktu[]" value="${waktu}"
                    class="bg-gray-200 border rounded-md px-3 py-2 text-sm w-24">
                <input type="text" name="kegiatan_nama[]" value="${kegiatan}"
                    class="bg-gray-200 border rounded-md px-3 py-2 text-sm w-80">
                <button type="button" onclick="hapusKegiatan(this)"
                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md text-sm">
                    Hapus
                </button>
            `;

                        container.appendChild(div);
                        document.getElementById("modal-waktu").value = "";
                        document.getElementById("modal-kegiatan").value = "";
                    }
                }

                function hapusKegiatan(button) {
                    button.closest(".kegiatan-item").remove();
                }

                // Upload gambar 
                document.getElementById("uploadMedia").addEventListener("change", function(e) {
                    let file = e.target.files[0];
                    if (file) {
                        let reader = new FileReader();
                        reader.onload = function(event) {
                            document.getElementById("previewImage").src = event.target.result;
                        };
                        reader.readAsDataURL(file);
                    }
                });

                // Sinkronisasi tanggal mulai, akhir, dan penutupan
                document.getElementById("tgl_mulai").addEventListener("change", function() {
                    let tglMulai = this.value;
                    let tglAkhir = document.getElementById("tgl_akhir");
                    let pendaftaran = document.getElementById("penutupan_pendaftaran");

                    if (tglMulai) {
                        // batasi pendaftaran <= tgl_mulai
                        pendaftaran.setAttribute("max", tglMulai);
                        if (pendaftaran.value && pendaftaran.value > tglMulai) {
                            pendaftaran.value = tglMulai;
                        }

                        // batasi tgl_akhir >= tgl_mulai
                        tglAkhir.setAttribute("min", tglMulai);
                        if (tglAkhir.value && tglAkhir.value < tglMulai) {
                            tglAkhir.value = tglMulai;
                        }
                    } else {
                        pendaftaran.removeAttribute("max");
                        tglAkhir.removeAttribute("min");
                    }
                });

                // Validasi jam (jam_mulai < jam_akhir)
                document.getElementById("jam_mulai").addEventListener("change", validateJam);
                document.getElementById("jam_akhir").addEventListener("change", validateJam);

                function validateJam() {
                    let jamMulai = document.getElementById("jam_mulai").value;
                    let jamAkhir = document.getElementById("jam_akhir").value;

                    if (jamMulai && jamAkhir && jamAkhir <= jamMulai) {
                        alert("Jam akhir harus lebih besar dari jam mulai!");
                        document.getElementById("jam_akhir").value = "";
                    }
                }
            </script>


        </div>
    </div>
@endsection
