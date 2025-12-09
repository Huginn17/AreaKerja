<!-- Main modal -->
<div id="gantipwmodal" tabindex="-1" aria-hidden="true"
    class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm overflow-y-auto flex justify-center items-center z-50">

    <div class="relative w-full max-w-xs md:max-w-sm p-2 md:p-4">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-lg">

            <!-- Modal header -->
            <div class="flex items-center justify-between p-2 md:p-4 border-b border-gray-200">
                <h3 class="text-sm md:text-base font-semibold">Ganti Password</h3>

                <button type="button"
                    class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg w-7 h-7 flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="gantipwmodal">
                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>

            
            <!-- Pesan sukses / error -->
            @if (session('success'))
                <div class="p-3 mb-4 bg-green-100 text-green-600 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="p-3 mb-4 bg-red-100 text-red-600 rounded">
                    {{ session('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="p-3 mb-4 bg-red-100 text-red-600 rounded">
                    <ul>
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Modal body -->
            <div class="p-3 md:p-5">

                <div class="mt-2 space-y-8">

                    <!-- Form Ganti Password LANGSUNG MUNCUL -->
                    <form id="passwordForm" action="{{ route('pelamar.password.update') }}" method="POST"
                        class="mt-4 space-y-4 bg-gray-50 p-6 border-2 border-gray-400 rounded-lg shadow">
                        @csrf

                        <div>
                            <label class="block text-sm font-medium">Kata Sandi Lama</label>
                            <input type="password" name="old_password" required
                                class="mt-1 w-full border px-3 py-2 rounded focus:ring-2 focus:ring-orange-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium">Kata Sandi Baru</label>
                            <input type="password" name="new_password" required
                                class="mt-1 w-full border px-3 py-2 rounded focus:ring-2 focus:ring-orange-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium">Konfirmasi Kata Sandi Baru</label>
                            <input type="password" name="new_password_confirmation" required
                                class="mt-1 w-full border px-3 py-2 rounded focus:ring-2 focus:ring-orange-500">
                        </div>

                        <button type="submit"
                            class="w-full bg-orange-600 hover:bg-orange-700 text-white py-2 rounded-lg font-medium">
                            Simpan Password
                        </button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
