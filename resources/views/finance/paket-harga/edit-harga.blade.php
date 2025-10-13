@extends('finance.sidebar.index')
@section('sidebar')
    <div class="p-4 sm:ml-64">
        {{-- Paket Harga Pembayaran --}}
        <div class="mb-10">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold text-gray-700">Paket Harga Pembayaran</h2>
            </div>

            <form action="{{ route('finance.paket-harga.update-pembayaran') }}" method="post">
                @csrf
                @method('PUT')

                <div class="overflow-hidden border-2 border-gray-400 rounded-2xl shadow-sm">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="bg-orange-500 text-white">
                                <th class="px-6 py-3 text-left font-semibold text-lg">Nama</th>
                                <th class="px-6 py-3 text-right font-semibold text-lg">Harga</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-400">
                            @foreach ($pembayaran as $p)
                                <tr class="hover:bg-gray-50">
                                    <td class="py-3 px-6 text-gray-700">{{ $p->nama }}</td>
                                    <td class="py-3 px-6 text-right">
                                        <div
                                            class="inline-flex items-center bg-gray-100 px-3 py-1 rounded-lg border border-gray-300">
                                            <input type="hidden" name="id[]" value="{{ $p->id }}">
                                            <span class="mr-2 text-sm text-gray-600">Rp</span>
                                            <input type="number" name="harga[]"
                                                class="bg-transparent w-28 text-center outline-none text-gray-800 font-medium"
                                                value="{{ $p->harga }}">
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-6 flex justify-center">
                    <button type="submit"
                        class="bg-orange-500 hover:bg-orange-600 transition px-10 py-2 rounded-lg text-white font-semibold shadow-md">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
