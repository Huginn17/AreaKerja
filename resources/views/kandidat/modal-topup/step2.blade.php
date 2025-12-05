<!-- ================= MODAL STEP 2 ================= -->
<div id="modalStep2" class="fixed inset-0 hidden bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white w-full sm:max-w-md rounded-2xl shadow-xl relative p-4 sm:p-6 max-h-[90vh] overflow-y-auto">
        <button onclick="closeAllModal()" class="absolute top-3 right-3 text-gray-400 hover:text-black text-xl">✕</button>

        <h2 class="text-lg font-semibold mb-4">Metode Pembayaran</h2>

        <!-- Dropdown Transfer Bank -->
        <details class="border rounded-xl overflow-hidden">
            <summary class="flex items-center justify-between px-4 py-3 cursor-pointer">
                <span class="flex items-center gap-2 font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-orange-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 9V7a5 5 0 00-10 0v2H5v12h14V9h-2z" />
                    </svg>
                    Transfer Bank
                </span>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </summary>
            <div class="divide-y">
                @foreach ($daftarBank as $bank)
                    @if (strtolower($bank->nama_bank) !== 'qris')
                        <label
                            class="pembayaranWrapper flex justify-between items-center px-4 py-3 cursor-pointer hover:bg-gray-50 transition">
                            <div class="flex items-center gap-3">
                                <img src="{{ asset($bank->logo_image ?? 'default-bank.png') }}" class="w-8 h-8">
                                <span class="font-medium">{{ $bank->nama_bank }}</span>
                            </div>
                            <input type="radio" name="bank" value="{{ $bank->id }}"
                                data-bank="{{ $bank->nama_bank }}" class="hidden peer metodePembayaran">
                            <span
                                class="w-5 h-5 border-2 border-orange-500 rounded-full flex items-center justify-center peer-checked:bg-orange-500">
                                <span class="hidden peer-checked:block w-2.5 h-2.5 bg-white rounded-full"></span>
                            </span>
                        </label>
                    @endif
                @endforeach
            </div>
        </details>

        <!-- QRIS (pisah dari dropdown) -->
        @foreach ($daftarBank as $bank)
            @if (strtolower($bank->nama_bank) === 'qris')
                <label
                    class="pembayaranWrapper mt-3 flex justify-between items-center px-4 py-3 border rounded-xl cursor-pointer hover:bg-gray-50 transition">
                    <div class="flex items-center gap-3">
                        <img src="{{ asset($bank->logo_image ?? 'default-bank.png') }}" class="w-8 h-8">
                        <span class="font-medium">{{ $bank->nama_bank }}</span>
                    </div>
                    <input type="radio" name="bank" value="{{ $bank->id }}" data-bank="{{ $bank->nama_bank }}"
                        class="hidden peer metodePembayaran">
                    <span
                        class="w-5 h-5 border-2 border-orange-500 rounded-full flex items-center justify-center peer-checked:bg-orange-500">
                        <span class="hidden peer-checked:block w-2.5 h-2.5 bg-white rounded-full"></span>
                    </span>
                </label>
            @endif
        @endforeach

        <!-- Tombol navigasi -->
        <div class="flex flex-col sm:flex-row justify-between mt-6 gap-3 sm:gap-0">
            <button onclick="goToStep(1)" class="text-orange-500 w-full sm:w-auto">Kembali</button>
            <button onclick="goToStep(3)" class="text-orange-500 font-semibold w-full sm:w-auto">Selanjutnya</button>
        </div>
    </div>
</div>
