<!-- Main modal -->
<div id="create_skillmodal" tabindex="-1" aria-hidden="true"
    class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm overflow-y-auto">

    <div class="relative w-full max-w-md px-4 py-6 md:p-4">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-md dark:bg-gray-700">

            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b border-gray-200 dark:border-gray-600">
                <h3 class="text-lg font-semibold">Tambah Pengalaman Kerja</h3>
                <button type="button"
                    class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg w-8 h-8 flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="create_skillmodal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>

            <!-- Modal body -->
            <div class="p-5 md:p-6">
                <form action="{{ route('skill.store') }}" method="POST">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium mb-1">Skill</label>
                        <input type="text" name="skill"
                            class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-400 mb-3"
                            required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Experience Level</label>
                        <input type="text" name="experience_level"
                            class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-400 mb-3"
                            required>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-orange-500 hover:bg-orange-600 text-white px-5 py-2 rounded-lg text-sm shadow">
                            Simpan
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>
