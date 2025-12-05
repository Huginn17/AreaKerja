<!-- Main modal -->
<div id="show-skill" tabindex="-1" aria-hidden="true"
    class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm overflow-y-auto">

    <div class="relative w-full max-w-md mx-auto px-4 py-6">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-md dark:bg-gray-700">

            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b border-gray-200 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Skill
                </h3>
                <button type="button"
                    class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg w-8 h-8 flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="show-skill">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="p-4 md:p-5">
                @if (Auth::user()->role === 'pelamar')
                    @foreach (Auth::user()->pelamar->skill as $skill)
                        <div class="mb-5 border-b pb-4 last:border-none">

                            <div class="flex items-start justify-between">
                                <div>
                                    <h3 class="font-semibold text-gray-800 text-base">
                                        {{ $skill->skill }}
                                    </h3>
                                    <p class="text-gray-600 text-sm mt-1">
                                        {{ $skill->experience_level }}
                                    </p>
                                </div>

                                <a href="{{ route('skill.edit', $skill->id) }}" class="p-2 mt-1">
                                    <svg width="18" height="18" viewBox="0 0 10 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.83752 2.24357C10.0542 2.02693 10.0542 1.66587 9.83752 1.46034L8.5377 0.160524C8.33218 -0.0561123 7.97112 -0.0561123 7.75448 0.160524L6.7324 1.17705L8.81544 3.26009M0 7.915V9.99805H2.08304L8.22664 3.8489L6.14359 1.76586L0 7.915Z"
                                            fill="#FA6601" />
                                    </svg>
                                </a>
                            </div>

                            <form action="{{ route('skill.destroy', $skill->id) }}" method="POST"
                                onsubmit="return confirm('Yakin Pengalaman Kerja ini?')" class="mt-3">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded-lg text-sm">
                                    Hapus
                                </button>
                            </form>

                        </div>
                    @endforeach
                @endif

                <!-- Button Tambah -->
                <div class="flex justify-end mt-2">
                    <button data-modal-target="create_skillmodal" data-modal-toggle="create_skillmodal"
                        data-modal-hide="show-skill"
                        class="text-white bg-orange-500 hover:bg-orange-600 font-medium rounded-lg text-sm px-3 py-2"
                        type="button">
                        <svg width="14" height="14" viewBox="0 0 45 45" fill="none"
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
