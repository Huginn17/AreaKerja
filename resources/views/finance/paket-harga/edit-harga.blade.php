@extends('finance.sidebar.index')
@section('sidebar')
    <div class="p-2 md:p-4 sm:ml-64">

        {{-- Paket Harga Pembayaran --}}
        <div class="mb-6 md:mb-10">
            <div class="flex justify-between items-center mb-3 md:mb-4">
                <h2 class="text-base md:text-xl font-semibold text-gray-700">Paket Harga Pembayaran</h2>
            </div>

            <form action="{{ route('finance.paket-harga.update-pembayaran') }}" method="post">
                @csrf
                @method('PUT')

                <!-- Tabel responsif -->
                <div class="border-2 border-gray-400 rounded-xl shadow-sm overflow-x-auto">
                    <table class="min-w-full border-collapse text-xs md:text-base">
                        <thead>
                            <tr class="bg-orange-500 text-white">
                                <th class="px-2 md:px-6 py-2 md:py-3 text-left font-semibold text-sm md:text-lg">
                                    Nama
                                </th>
                                <th class="px-2 md:px-6 py-2 md:py-3 text-right font-semibold text-sm md:text-lg">
                                    Harga
                                </th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-400">
                            @foreach ($pembayaran as $p)
                                <tr class="hover:bg-gray-50">
                                    <td class="py-2 md:py-3 px-2 md:px-6 text-gray-700 text-xs md:text-base">
                                        {{ $p->nama }}
                                    </td>

                                    <td class="py-2 md:py-3 px-2 md:px-6 text-right">
                                        <div
                                            class="inline-flex items-center bg-gray-100 px-2 py-1 md:px-3 rounded-lg border border-gray-300">

                                            <input type="hidden" name="id[]" value="{{ $p->id }}">

                                            <span class="mr-1 md:mr-2 text-[10px] md:text-sm text-gray-600">
                                                Rp
                                            </span>

                                            <input type="number" name="harga[]"
                                                class="bg-transparent w-16 md:w-28 text-center outline-none text-gray-800 font-medium text-xs md:text-base"
                                                value="{{ $p->harga }}">
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-4 md:mt-6 flex justify-center">
                    <button type="submit"
                        class="bg-orange-500 hover:bg-orange-600 transition px-6 md:px-10 py-1.5 md:py-2 rounded-lg text-white font-semibold shadow-md text-xs md:text-base">
                        Simpan
                    </button>
                </div>

            </form>
        </div>

    </div>
@endsection
