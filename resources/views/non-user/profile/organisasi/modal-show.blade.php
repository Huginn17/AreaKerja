<!-- Main modal -->
<div id="show-org" tabindex="-1" aria-hidden="true"
    class="hidden inset-0 bg-black/50 backdrop-blur-sm fixed top-0 left-0 z-50 flex justify-center items-center p-4">

    <div class="relative w-full max-w-sm md:max-w-md">
        <!-- Modal content -->
        <div class="bg-white rounded-lg shadow-sm dark:bg-gray-700 overflow-y-auto max-h-[90vh]">

            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b border-gray-200 dark:border-gray-600">
                <h3 class="text-base md:text-lg font-semibold text-gray-900 dark:text-white">
                    Organisasi
                </h3>
                <button type="button"
                    class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg w-8 h-8 flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="show-org">
                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>

            <!-- Modal body -->
            <div class="p-4">
                @if (Auth::user()->role === 'pelamar')
                    @foreach (Auth::user()->pelamar->pengalaman_organisasi as $org)
                        <div class="mb-5">
                            <div class="flex justify-between">
                                <h3 class="font-semibold text-gray-800 text-sm md:text-base leading-tight">
                                    {{ $org->jabatan }} - {{ $org->nama_organisasi }}
                                    ({{ $org->tahun_awal }} - {{ $org->tahun_akhir }})
                                </h3>
                                <a href="{{ route('organisasi.edit', $org->id) }}" class="ml-2">
                                    <svg width="14" height="14" viewBox="0 0 10 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.83752 2.24357C10.0542 2.02693 10.0542 1.66587 9.83752 1.46034L8.5377 0.160524C8.33218 -0.0561123 7.97112 -0.0561123 7.75448 0.160524L6.7324 1.17705L8.81544 3.26009M0 7.915V9.99805H2.08304L8.22664 3.8489L6.14359 1.76586L0 7.915Z"
                                            fill="#FA6601" />
                                    </svg>
                                </a>
                            </div>

                            <!-- Tombol Hapus -->
                            <form action="{{ route('organisasi.destroy', $org->id) }}" method="POST"
                                onsubmit="return confirm('Yakin hapus organisasi ini?')" class="mt-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-3 py-1 bg-red-500 text-white rounded-md text-xs md:text-sm hover:bg-red-600 font-medium">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    @endforeach
                @endif

                <!-- Tombol Tambah -->
                <div class="flex justify-end pt-2">
                    <button data-modal-target="create_organisasimodal" data-modal-toggle="create_organisasimodal"
                        data-modal-hide="show-org" type="button"
                        class="text-white bg-orange-500 hover:bg-orange-600 font-medium rounded-lg text-sm px-3 py-2">
                        <svg width="12" height="12" viewBox="0 0 45 45" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M42.1875 19.6875H25.3125V2.8125C25.3125 2.06658 25.0162 1.35121 24.4887 0.823763C23.9613 0.296317 23.2459 0 22.5 0C21.7541 0 21.0387 0.296317 20.5113 0.823763C19.9838 1.35121 19.6875 2.06658 19.6875 2.8125V19.6875H2.8125C2.06658 19.6875 1.35121 19.9838 0.823763 20.5113C0.296317 21.0387 0 21.7541 0 22.5C0 23.2459 0.296317 23.9613 0.823763 24.4887C1.35121 25.0162 2.06658 25.3125 2.8125 25.3125H19.6875V42.1875C19.6875 42.9334 19.9838 43.6488 20.5113 44.1762C21.0387 44.7037 21.7541 45 22.5 45C23.2459 45 23.9613 44.7037 24.4887 44.1762C25.0162 43.6488 25.3125 42.9334 25.3125 42.1875V25.3125H42.1875C42.9334 25.3125 43.6488 25.0162 44.1762 24.4887C44.7037 23.9613 45 23.2459 45 22.5C45 21.7541 44.7037 21.0387 44.1762 20.5113C43.6488 19.9838 42.9334 19.6875 42.1875 19.6875Z"
                                fill="white" />
                        </svg>
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>
