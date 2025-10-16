<!-- Modal Alamat -->
<div id="modalAlamat" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-40">
    <div class="bg-white rounded-2xl p-6 w-[450px] relative">
        <!-- Tombol X -->
        <button type="button" onclick="closeModal('modalAlamat')"
            class="absolute top-3 right-3 text-gray-500 hover:text-gray-700 text-2xl font-bold">
            &times;
        </button>

        <h2 class="text-lg font-bold mb-4">Tambah Alamat</h2>

        <form onsubmit="event.preventDefault(); closeModal('modalAlamat');">
            <div class="mb-3">
                <label class="block text-sm font-medium mb-1">Label</label>
                <input type="text" name="label" class="w-full border rounded-lg p-2"
                    placeholder="Masukkan Provinsi">
            </div>
            <div class="mb-3">
                <label class="block text-sm font-medium mb-1">Desa</label>
                <input type="text" name="desa" class="w-full border rounded-lg p-2"
                    placeholder="Masukkan Provinsi">
            </div>
            <div class="mb-3">
                <label class="block text-sm font-medium mb-1">Provinsi</label>
                <input type="text" name="provinsi" class="w-full border rounded-lg p-2"
                    placeholder="Masukkan Provinsi">
            </div>
            <div class="mb-3">
                <label class="block text-sm font-medium mb-1">Kota</label>
                <input type="text" name="kota" class="w-full border rounded-lg p-2" placeholder="Masukkan Kota">
            </div>
            <div class="mb-3">
                <label class="block text-sm font-medium mb-1">Kecamatan</label>
                <input type="text" name="kecamatan" class="w-full border rounded-lg p-2"
                    placeholder="Masukkan Kecamatan">
            </div>
            <div class="mb-3">
                <label class="block text-sm font-medium mb-1">Kode Pos</label>
                <input type="text" name="kode_pos" class="w-full border rounded-lg p-2"
                    placeholder="Masukkan Kelurahan">
            </div>
            <div class="mb-3">
                <label class="block text-sm font-medium mb-1">Alamat Lengkap</label>
                <textarea name="detail" class="w-full border rounded-lg p-2" rows="3"
                    placeholder="Masukkan Alamat Lengkap"></textarea>
            </div>

            <div class="flex justify-end mt-4">
                <button type="button" onclick="closeModal('modalAlamat')"
                    class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400 mr-2">
                    Batal
                </button>
                <button type="submit" class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
