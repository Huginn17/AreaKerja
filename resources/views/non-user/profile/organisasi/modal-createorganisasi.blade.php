<!-- Main modal -->
<div id="create_organisasimodal" tabindex="-1" aria-hidden="true"
    class="hidden inset-0 bg-black/50 backdrop-blur-sm overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 flex justify-center items-center p-3">

    <div class="relative w-full max-w-sm md:max-w-md">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-lg dark:bg-gray-700">

            <!-- Modal header -->
            <div class="flex items-center justify-between p-3 md:p-5 border-b border-gray-200 dark:border-gray-600">
                <h3 class="text-base md:text-lg font-semibold">Tambah Pengalaman Organisasi</h3>

                <button type="button"
                    class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg w-8 h-8 flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="create_organisasimodal">
                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>

            <!-- Modal body -->
            <div class="p-4 md:p-6">
                <form action="{{ route('organisasi.store') }}" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-1">Nama Organisasi</label>
                        <input type="text" name="nama_organisasi"
                            class="w-full border rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-orange-400 focus:border-orange-400"
                            required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-1">Jabatan</label>
                        <input type="text" name="jabatan"
                            class="w-full border rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-orange-400 focus:border-orange-400"
                            required>
                    </div>

                    <!-- Grid responsif -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-1">Tahun Awal</label>
                            <input type="number" name="tahun_awal"
                                class="w-full border rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-orange-400 focus:border-orange-400"
                                required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-1">Tahun Akhir</label>
                            <input type="number" name="tahun_akhir"
                                class="w-full border rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-orange-400 focus:border-orange-400">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-1">Deskripsi</label>
                        <textarea name="deskripsi" rows="3"
                            class="w-full border rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-orange-400 focus:border-orange-400"></textarea>
                    </div>

                    <!-- Tombol -->
                    <div class="flex justify-end md:justify-end">
                        <button type="submit"
                            class="w-full md:w-auto bg-orange-500 font-medium hover:bg-orange-600 text-white px-5 py-2 rounded-lg shadow-md transition">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
