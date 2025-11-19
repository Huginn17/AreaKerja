@extends('layouts.index-perusahaan')
@section('content')
    <div class="max-w-6xl mt-24 mx-auto p-7 rounded-lg">
        <!-- Header -->
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold">Kandidat Saya</h2>
            @php
                // Ambil semua skill unik dari seluruh pelamar yang ada di data recruitments
                $skillList = collect($recruitments)->pluck('pelamar.skill')->flatten()->unique('skill')->values();
            @endphp

            <div class="flex gap-10">
                <form action="" method="get">
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="nama kandidat/username ..." class="border rounded-full px-10 py-2 text-sm w-64">

                    <select name="skill" class="border rounded-full px-10 py-2 text-sm">
                        <option value="">Skill</option>
                        @foreach ($skillList as $skill)
                            <option value="{{ $skill->skill }}" {{ request('skill') == $skill->skill ? 'selected' : '' }}>
                                {{ $skill->skill }}
                            </option>
                        @endforeach
                    </select>

                    <button type="submit" class="bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-600">
                        Cari
                    </button>
                </form>
            </div>

        </div>

        <!-- Table -->
        <div class="overflow-x-auto border border-gray-300 rounded-2xl mb-16">
            <table class="w-full border-collapse bg-white">
                <thead>
                    <tr>
                        <th class="p-7 text-center font-semibold">Nama</th>
                        <th class="p-7 text-center font-semibold">Skill</th>
                        <th class="p-7 text-center font-semibold">CV</th>
                        <th class="p-7 text-center font-semibold">Hapus</th>
                        <th class="p-7 text-center font-semibold">Lowongan</th>
                        <th class="p-7 text-center font-semibold">Ekspektasi Range Gaji</th>
                        <th class="p-7 text-center font-semibold">Status</th>
                        <th class="p-7 text-center font-semibold">Sumber</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($recruitments as $r)
                        @php
                            $pelamar = $r->pelamar;
                            $skillUtama = $pelamar->skill->first()->skill ?? '-';

                            $sumber = isset($r->lowonganPerusahaan) ? 'Lowongan' : 'Pembelian';
                        @endphp
                        <tr class="border-b">
                            <!-- Nama -->
                            <td class="p-3 flex items-center gap-3">
                                <img src="{{ asset('storage/' . $pelamar->img_profile) }}"
                                    class="w-10 h-10 rounded-full object-cover">
                                <span>{{ $pelamar->nama_pelamar }}</span>
                            </td>
                            <!-- Skill -->
                            <td class="p-3 text-center">{{ $skillUtama }}</td>
                            <!-- CV -->
                            <td class="p-3">
                                <div class="flex flex-col items-center text-orange-500">
                                    <button onclick="openConfirmModal({{ $pelamar->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="#fb923c">
                                            <rect x="4" y="19" width="16" height="3" />
                                            <rect x="10" y="3" width="4" height="11" />
                                            <path d="M7 13l5 5 5-5z" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                            <!-- Hapus -->
                            <td class="p-3">
                                <form action="{{ route('perusahaan.destroy.kandidat', $r->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus kandidat ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <div class="flex flex-col items-center text-orange-500">
                                        <button type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="#F78D2E" viewBox="0 0 24 24">
                                                <path
                                                    d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1
                                                                                                             1H5v2h14V4z" />
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                            </td>
                            <!-- Gaji -->
                            <td class="p-3 text-center">{{ $r->lowonganPerusahaan->nama ?? $r->lowongan_perusahaan->nama }}
                            </td>
                            <td class="p-3 text-center">Rp. {{ number_format($pelamar->gaji_maksimal, 0, ',', '.') }}</td>
                            <!-- Status -->
                            <td class="p-3 text-center text-green-500 font-medium">{{ $r->status }}</td>
                            <td class="p-3 text-center text-green-500 font-medium">
                                @if ($r->lowongan_perusahaan)
                                    <span class="text-blue-600 font-semibold">Melamar Lowongan</span>
                                @elseif ($r->lowonganPerusahaan)
                                    <span class="text-purple-600 font-semibold">Pembelian Kandidat</span>
                                @else
                                    <span class="text-red-600 font-semibold">Sumber Tidak Diketahui</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr class="border-b">
                            <td colspan="6" class="p-3 text-center">Tidak ada kandidat</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>



    {{-- MODAL CV --}}
    <div id="confirmModal" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-40">
        <div class="bg-white p-6 rounded-lg text-center max-w-sm w-full">
            <div class="flex justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-orange-500 mb-4" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path d="M12 16l4-5h-3V4h-2v7H8l4 5zM4 20h16v2H4z" />
                </svg>
            </div>
            <p class="mb-4 font-medium">Yakin akan mengunduh CV pelamar?</p>
            <div class="flex justify-center gap-4">
                <button onclick="downloadCV()" class="px-4 py-2 bg-orange-500 text-white rounded">Unduh</button>
                <button onclick="closeConfirmModal()" class="px-4 py-2 bg-gray-300 text-black rounded">Batal</button>
            </div>
        </div>
    </div>

    <!-- Modal 2: Sukses -->
    <div id="successModal" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-40">
        <div class="bg-white p-6 rounded-lg text-center max-w-sm w-full">
            <div class="flex justify-center">
                <div class="bg-orange-100 p-4 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-orange-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
            </div>
            <p class="mt-4 font-semibold">CV Berhasil diunduh</p>
            <button onclick="closeSuccessModal()" class="mt-4 px-4 py-2 bg-orange-500 text-white rounded">Tutup</button>
        </div>
    </div>

    @include('layouts.footer')

    {{-- CV --}}
    <script>
        let selectedId = null;

        function openConfirmModal(id) {
            selectedId = id;
            document.getElementById('confirmModal').classList.remove('hidden');
        }

        function closeConfirmModal() {
            document.getElementById('confirmModal').classList.add('hidden');
        }

        function downloadCV() {
            if (!selectedId) return;
            closeConfirmModal();
            document.getElementById('successModal').classList.remove('hidden');
            setTimeout(() => {
                let url = "{{ route('cv.download', ':id') }}";
                url = url.replace(':id', selectedId);
                window.location.href = url;
            }, 500);
        }

        function closeSuccessModal() {
            document.getElementById('successModal').classList.add('hidden');
        }
    </script>
@endsection
