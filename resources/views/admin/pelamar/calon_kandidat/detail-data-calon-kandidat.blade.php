@extends('admin.sidebar.index')
@section('sidebaradmin')
    <div class="ml-60 p-10 bg-white min-h-screen font-[Poppins]">

        <!-- Header -->
        <h1 class="text-xl font-semibold mb-8">Detail Calon Kandidat</h1>

        <!-- Kartu Kandidat -->
        <div class="max-w-4xl mx-auto bg-gray-700 rounded-xl shadow-lg text-white p-10">
            <div class="flex items-center mb-8">
                @if ($pelamar->img_profile)
                    <img id="pu" class="w-24 h-24 object-cover rounded-full"
                        src="{{ asset('storage/' . $pelamar->img_profile) }}" alt="Profile">
                @else
                    <img id="pu" class="w-24 h-24 object-cover rounded-full"
                        src="https://ui-avatars.com/api/?name={{ urlencode($pelamar->nama_pelamar) }}&background=random&color=fff&size=128"
                        alt="Profile">
                @endif

                <h3 class="text-2xl font-semibold">{{ $pelamar->nama_pelamar }}</h3>
            </div>

            <!-- Form Input Tanggal -->
            <form method="POST" action="{{ route('calon.update', $pelamar->id) }}"
                class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @csrf
                <div>
                    <label class="block text-sm text-gray-300 mb-1">Divisi</label>
                    <p class="text-white">{{ $pelamar->divisi }}</p>
                </div>

                <div>
                    <label class="block text-sm text-gray-300 mb-1">Mulai Pelatihan</label>
                    <input type="date" name="mulai_pelatihan" value="{{ $pelamar->mulai_pelatihan }}"
                        class="w-full px-3 py-2 rounded-lg text-black border border-gray-300 focus:ring focus:ring-blue-400">
                </div>

                <div>
                    <label class="block text-sm text-gray-300 mb-1">Selesai Pelatihan</label>
                    <input type="date" name="selesai_pelatihan" value="{{ $pelamar->selesai_pelatihan }}"
                        class="w-full px-3 py-2 rounded-lg text-black border border-gray-300 focus:ring focus:ring-blue-400">
                </div>

                <div class="col-span-3 flex justify-end mt-4">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-2 rounded-lg shadow">
                        Simpan Tanggal
                    </button>
                </div>
            </form>
        </div>

        <!-- Tombol Aksi -->
        <div class="mt-8 flex flex-col items-center gap-4">
            <form action="{{ route('calon.lulus', $pelamar->id) }}" method="POST">
                @csrf
                <button class="bg-green-600 hover:bg-green-700 text-white px-32 py-3 rounded-lg font-bold shadow">
                    Lulus
                </button>
            </form>

            <form action="{{ route('calon.gugur', $pelamar->id) }}" method="POST">
                @csrf
                <button class="bg-red-600 hover:bg-red-700 text-white px-32 py-3 rounded-lg font-bold shadow">
                    Gugur
                </button>
            </form>
        </div>

    </div>
@endsection
