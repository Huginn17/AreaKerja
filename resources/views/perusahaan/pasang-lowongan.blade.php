@extends('layouts.index-perusahaan')

@section('content')
    <section class="py-16">
        <div class="max-w-6xl mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-center gap-6 flex-wrap">

                @foreach ($pakets as $paket)
                    <div class="w-72">
                        <div class="bg-white border border-gray-400 rounded-xl shadow-md overflow-hidden flex flex-col hover:scale-105">
                            <!-- Warna header sesuai nama paket -->
                            <div
                                class="py-3 text-center 
                            @if ($paket->nama == 'GOLD') bg-yellow-500 
                            @elseif($paket->nama == 'SILVER') bg-gray-500 
                            @elseif($paket->nama == 'BRONZE') bg-amber-700 
                            @else bg-orange-500 @endif">
                                <h3 class="text-xl font-bold text-white uppercase">{{ $paket->nama }}</h3>
                            </div>
                            <div class="p-6 flex-1 flex flex-col">
                                <h4 class="text-base font-semibold mb-1 text-center">Lebih Banyak Benefit</h4>
                                <p class="text-sm text-gray-700 mb-2 text-center">
                                    {{ $paket->deskripsi }}
                                </p>
                                <hr class="my-3 border-gray-300">

                                <!-- List benefit bisa disimpan di tabel atau hardcode -->
                                <ul class="text-sm text-gray-700 space-y-2 mb-6 flex-1">
                                    <li class="flex items-start"><span class="mr-2">✔</span> Website & Aplikasi</li>
                                    <li class="flex items-start"><span class="mr-2">✔</span> Instagram Post & Story</li>
                                    <li class="flex items-start"><span class="mr-2">✔</span> Highlight Story Favorit</li>
                                    <li class="flex items-start"><span class="mr-2">✔</span> Google Jobs & Bisnis</li>
                                    <li class="flex items-start"><span class="mr-2">✔</span> Facebook Post & Story</li>
                                    <li class="flex items-start"><span class="mr-2">✔</span> Twitter</li>
                                    <li class="flex items-start"><span class="mr-2">✔</span> LinkedIn</li>
                                    <li class="flex items-start"><span class="mr-2">✔</span> Telegram</li>
                                </ul>

                                <!-- Tombol pasang lowongan -->
                                <button type="button"
                                    onclick="openModal({{ $paket->id }}, '{{ $paket->nama }}', {{ $paket->harga }})"
                                    class="@if ($paket->nama == 'GOLD') bg-yellow-500 
                                       @elseif($paket->nama == 'SILVER') bg-gray-500 
                                       @elseif($paket->nama == 'BRONZE') bg-amber-700 
                                       @else bg-orange-500 @endif
                                       text-white font-semibold py-2 rounded-md hover:opacity-90 w-full">
                                    Pasang Lowongan
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <!-- Modal -->
    <div id="paketModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-lg w-96 p-6">
            <h2 class="text-lg font-semibold mb-4">Konfirmasi Pembelian Paket</h2>
            <form action="{{ route('paket.beli') }}" method="POST">
                @csrf
                <input type="hidden" name="paket_id" id="modal_paket_id">

                <p class="text-sm mb-2">Paket: <span id="modal_paket_name" class="font-semibold"></span></p>
                <p class="text-sm mb-2">Harga: <span id="modal_paket_price" class="font-semibold text-orange-600"></span>
                    koin</p>
                <p class="text-sm mb-2">Koin Anda:
                    <span class="font-semibold text-green-600">{{ $perusahaan->koin_perusahaan ?? 0 }}</span>
                </p>

                <label class="block mb-2 text-sm">Pilih Lowongan</label>
                <select name="lowongan_id" required class="w-full border-2 border-gray-400 rounded-md px-2 py-1 mb-4">
                    <option value="">-- Pilih Lowongan --</option>
                    @foreach ($perusahaan->pasanglowongan as $lowongan)
                        <option value="{{ $lowongan->id }}">{{ $lowongan->nama }}</option>
                    @endforeach
                </select>

                <div class="flex justify-end gap-2">
                    <button type="button" onclick="closeModal()"
                        class="px-4 py-2 bg-gray-400 hover:bg-gray-500 text-white rounded-lg">Batal</button>
                    <button type="submit"
                        class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600">Konfirmasi</button>
                </div>
            </form>
        </div>
    </div>

    {{-- MODAL TIDAK CUKUP KOIN --}}
    <div x-data="{ open: {{ session('koin_kurang') ? 'true' : 'false' }} }" x-show="open" x-cloak
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div x-transition class="bg-white p-8 rounded-2xl shadow-lg w-[400px] text-center">

            <h2 class="text-xl font-semibold mb-4 italic">Upss!!</h2>

            <p class="mb-6 text-gray-700">
                Koin anda kurang silahkan Top Up terlebih dahulu.
            </p>

            <a href="{{ route('perusahaan.dashboard') }}"
                class="px-6 py-2 bg-orange-500 text-white rounded-full hover:bg-orange-600 transition">
                Top Up
            </a>
        </div>
    </div>




    <script>
        function openModal(paketId, paketName, paketPrice) {
            document.getElementById('modal_paket_id').value = paketId;
            document.getElementById('modal_paket_name').textContent = paketName;
            document.getElementById('modal_paket_price').textContent = paketPrice.toLocaleString();
            document.getElementById('paketModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('paketModal').classList.add('hidden');
        }
    </script>
@endsection
