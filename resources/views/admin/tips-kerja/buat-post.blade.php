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

                <div class="mb-3">
                    <label for="uploadMedia"
                        class="cursor-pointer px-4 py-2 bg-gray-100 border rounded-lg shadow hover:bg-gray-200 text-sm font-medium">
                        Tambahkan Media
                    </label>
                    <input id="uploadMedia" type="file" name="image" hidden>
                </div>

                <div class="">
                    <input id="x" type="hidden" name="content">
                    <trix-editor input="x" class="trix-content"></trix-editor>
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
    {{-- Script inject gambar ke Trix --}}
    <script>
        document.getElementById("uploadMedia").addEventListener("change", function(e) {
            let file = e.target.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    const trixEditor = document.querySelector("trix-editor");
                    trixEditor.editor.insertHTML(`<img src="${event.target.result}" class="my-3">`);
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
