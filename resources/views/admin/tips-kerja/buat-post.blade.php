@extends('admin.sidebar.index')
@section('sidebaradmin')
    <div class="p-4 sm:ml-64">
        <div class="mx-auto p-6">
            <form action="{{ route('admin.tips-kerja.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <input type="text" name="title" placeholder="Judul artikel..."
                        class="w-full border border-gray-300 rounded-lg px-3 py-2">
                </div>

                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium">Cover Image</label>
                    <input type="file" name="image" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                </div>

                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium">Isi Artikel</label>
                    <input id="x" type="hidden" name="content">
                    <trix-editor input="x" class="trix-content border rounded-lg p-2"></trix-editor>
                </div>

                <div class="flex justify-end gap-3 mt-4">
                    <button class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg shadow">
                        Simpan
                    </button>
                    <button class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-lg shadow">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
