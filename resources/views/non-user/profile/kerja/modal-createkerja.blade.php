<!-- Main modal -->
<div id="create_kerjamodal" tabindex="-1" aria-hidden="true"
    class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm overflow-y-auto flex justify-center items-center z-50">

    <div class="relative w-full max-w-xs md:max-w-sm p-2 md:p-4">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-lg dark:bg-gray-700">

            <!-- Modal header -->
            <div class="flex items-center justify-between p-2 md:p-4 border-b border-gray-200 dark:border-gray-600">
                <h3 class="text-sm md:text-base font-semibold">Tambah Pengalaman Kerja</h3>

                <button type="button"
                    class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg w-7 h-7 flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="create_kerjamodal">
                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>

            <!-- Modal body -->
            <div class="p-3 md:p-5">
                <form id="formkerja" action="{{ route('kerja.store') }}" method="POST">
                    @csrf

                    <div>
                        <label class="block text-xs font-medium text-gray-900 mb-1">Nama Perusahaan</label>
                        <input type="text" name="nama_perusahaan"
                            class="w-full border rounded-lg px-2 py-1.5 focus:ring-2 focus:ring-orange-400 mb-2"
                            required>
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-900 mb-1">Jabatan Pekerjaan</label>
                        <input type="text" name="jabatan_pekerjaan"
                            class="w-full border rounded-lg px-2 py-1.5 focus:ring-2 focus:ring-orange-400 mb-2"
                            required>
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-900 mb-1">Posisi Pekerjaan</label>
                        <input type="text" name="posisi_pekerjaan"
                            class="w-full border rounded-lg px-2 py-1.5 focus:ring-2 focus:ring-orange-400 mb-2"
                            required>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <div>
                            <label class="block text-xs font-medium text-gray-900 mb-1">Tahun Awal</label>
                            <input type="number" name="tahun_awal"
                                class="w-full border rounded-lg px-2 py-1.5 focus:ring-2 focus:ring-orange-400 mb-2"
                                required>
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-gray-900 mb-1">Tahun Akhir</label>
                            <input type="number" name="tahun_akhir"
                                class="w-full border rounded-lg px-2 py-1.5 focus:ring-2 focus:ring-orange-400 mb-2">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-900 mb-1">Deskripsi</label>
                        <textarea name="deskripsi" rows="3"
                            class="w-full border rounded-lg px-2 py-1.5 focus:ring-2 focus:ring-orange-400 mb-3"></textarea>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                            class="w-full md:w-auto bg-orange-500 hover:bg-orange-600 text-white px-4 py-1.5 rounded-lg text-sm shadow-md transition">
                            Simpan
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>

</div>
