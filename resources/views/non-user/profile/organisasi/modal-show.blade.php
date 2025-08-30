<!-- Main modal -->
<div id="show-org" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <!-- Modal header -->
            <div
                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Organisasai
                </h3>
                <button type="button"
                    class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="show-org">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            @if (Auth::user()->role === 'pelamar')
                @foreach (Auth::user()->pelamar->pengalaman_organisasi as $org)
                    <div class="mb-6">
                        <h3 class="font-semibold text-gray-800 text-lg">
                            {{ $org->jabatan }} - {{ $org->nama_organisasi }}
                            ({{ $org->tahun_awal }} - {{ $org->tahun_akhir }})
                        </h3>
                        <div class="flex gap-2 mt-2">
                            <!-- Tombol Hapus -->
                            <form action="{{ route('organisasi.destroy',$org->id) }}" method="POST"
                                onsubmit="return confirm('Yakin hapus organisasi ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-3 py-1 bg-red-500 text-white rounded text-sm">Hapus</button>
                            </form>
                        </div>
                        <div>
                            <a href="{{ route('organisasi.edit', $org->id) }}" class="ph-fill ph-pencil-simple text-orange-500"></a>
                        </div>
                    </div>
                @endforeach
            @endif
            <button data-modal-target="create_organisasimodal" data-modal-toggle="create_organisasimodal"
                data-modal-hide="show-org"
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                <div class="flex justify-between items-center text-orange-500">
                    <span>Tambahkan Organisasi</span>
                    <span class="text-2xl font-bold">+</span>
                </div>
            </button>
        </div>
    </div>
</div>