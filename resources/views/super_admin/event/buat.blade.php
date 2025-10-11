@extends('super_admin.sidebar.index')
@section('sidebarsuperadmin')
    <main class="flex-1 p-6 bg-white overflow-y-auto" x-data="{ openModal: false }">
        <div class="flex justify-between items-center mb-10">
            <h1 class="text-2xl font-medium">Buat Event Baru</h1>
            <!-- Profil Admin -->
            <div class="flex items-center gap-3">
                <svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <ellipse cx="21.3472" cy="5.13034" rx="6.35506" ry="6.15646" fill="#E46054" />
                </svg>
                <div
                    class="flex items-center justify-between w-96 h-14 bg-white border border-orange-500 shadow-md rounded-2xl px-3 py-2">
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
            <form action="{{ route('superadmin.event.store') }}" method="post" enctype="multipart/form-data">
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
                    <input id="x" type="hidden" name="content" value="{{ old('content', $event->content ?? '') }}">
                    <trix-editor input="x" class="border-2 border-gray-400 trix-content"></trix-editor>
                </div>

                <div class="space-y-4 mt-4">
                    <!-- Waktu Acara -->
                    <div>
                        <label class="block font-medium mb-1">Waktu Acara</label>
                        <div class="flex items-center gap-2">
                            <input type="date" name="tgl_mulai" id="tgl_mulai"
                                class="bg-gray-200 border-2 border-gray-400 rounded-md px-3 py-2 text-sm w-40" value="{{ old('tgl_mulai') }}">
                            <input type="date" name="tgl_akhir" id="tgl_akhir"
                                class="bg-gray-200 border-2 border-gray-400 rounded-md px-3 py-2 text-sm w-40" value="{{ old('tgl_akhir') }}">
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
                        <input type="number" name="kuota" class="bg-gray-200 border-2 border-gray-400 rounded-md px-3 py-2 text-sm w-24"
                            placeholder="000">
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
                                        class="w-full border rounded-md px-3 py-2 bg-gray-100">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Kegiatan</label>
                                    <input type="text" id="modal-kegiatan"
                                        class="w-full border rounded-md px-3 py-2 bg-gray-100"
                                        placeholder="Nama kegiatan">
                                </div>
                            </div>
                            <div class="mt-6 flex justify-end gap-3">
                                <button type="button" @click="openModal = false"
                                    class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded-md">
                                    Batal
                                </button>
                                <button type="button" onclick="tambahKegiatan(); openModal=false"
                                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md">
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="flex gap-4 mt-6">
                        <button type="submit"
                            class="bg-green-600 text-white px-14 py-2 text-lg rounded-md shadow hover:bg-green-700">Simpan</button>
                        <a href="/super_admin/event"
                            class="bg-red-600 hover:bg-red-700 text-white px-16 py-2 text-lg rounded-md shadow">Batal</a>
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


    </main>
@endsection
