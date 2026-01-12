<h1 class="text-xl font-bold mb-4 text-center">
    Laporan Email Subscriber
</h1>

<p class="mb-4">
    Tanggal Cetak: <strong>{{ $tanggal }}</strong>
</p>

<table class="w-full border border-black border-collapse">
    <thead>
        <tr class="bg-orange-500 text-white">
            <th class="border border-black px-2 py-1">No</th>
            <th class="border border-black px-2 py-1">Email</th>
            <th class="border border-black px-2 py-1">Sumber</th>
            <th class="border border-black px-2 py-1">Nama</th>
            <th class="border border-black px-2 py-1">Tanggal Daftar</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($subscribers as $i => $sub)
            <tr>
                <td class="border border-black px-2 py-1 text-center">
                    {{ $i + 1 }}
                </td>

                <td class="border border-black px-2 py-1">
                    {{ $sub->email }}
                </td>

                <td class="border border-black px-2 py-1 text-center">
                    @if ($sub->pelamar_id)
                        Pelamar
                    @elseif ($sub->perusahaan_id)
                        Perusahaan
                    @else
                        Guest
                    @endif
                </td>

                <td class="border border-black px-2 py-1">
                    @if ($sub->pelamar)
                        {{ $sub->pelamar->nama_pelamar ?? '-' }}
                    @elseif ($sub->perusahaan)
                        {{ $sub->perusahaan->nama_perusahaan ?? '-' }}
                    @else
                        -
                    @endif
                </td>

                <td class="border border-black px-2 py-1 text-center">
                    {{ $sub->created_at->format('d-m-Y') }}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="border border-black px-2 py-3 text-center text-gray-500">
                    Tidak ada data subscriber
                </td>
            </tr>
        @endforelse

    </tbody>
</table>

<p class="mt-6 text-xs text-gray-600 text-right">
    Dicetak oleh sistem pada {{ now()->format('d-m-Y H:i') }}
</p>
