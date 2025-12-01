@extends('admin.sidebar.index')
@section('sidebaradmin')
    <div class="p-4 sm:ml-64">
        <div class="mx-auto p-6">
            <form action="{{ route('admin.tips-kerja.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="block mb-2 text-lg font-medium">Judul Artikel</label>
                    <input type="text" name="title" placeholder="Tulis judul artikel..."
                        class="w-full border-2 border-gray-400 rounded-lg px-3 py-2">
                </div>

                <div class="mb-4">
                    <label class="block mb-2 text-lg font-medium">Cover Image</label>
                    <input type="file" name="image" class="w-full border-2 border-gray-400 rounded-lg px-3">
                </div>

                <div class="mb-4">
                    <label class="block mb-2 text-lg font-medium">Isi Artikel</label>
                    <textarea id="editor" name="content" class="w-full h-48 border border-gray-400 rounded-lg"></textarea>
                </div>

                <!-- TinyMCE -->
                <script src="https://cdn.tiny.cloud/1/oqx873eo8a4800gwchmdyn357lbg0rvj9bxkryttzmw9uf7q/tinymce/8/tinymce.min.js"
                    referrerpolicy="origin"></script>

                <script>
                    tinymce.init({
                        selector: '#editor',
                        height: 500,
                        menubar: false,
                        plugins: 'lists link image media code fullscreen mentions',
                        toolbar: 'undo redo | bold italic underline | bullist numlist | link image media | code fullscreen',

                        setup: function(editor) {

                            editor.ui.registry.addAutocompleter("usermentions", {
                                trigger: '@',
                                minChars: 1,
                                fetch: async function(pattern, maxResults) {
                                    const res = await fetch("/tinymce-mention?q=" + pattern);
                                    const users = await res.json();

                                    return users.map(user => ({
                                        value: user.name,
                                        text: user.name
                                    }));
                                },
                                onAction: function(api, rng, value) {
                                    editor.selection.setRng(rng);
                                    editor.insertContent(`<span class="mention">@${value}</span>&nbsp;`);
                                    api.hide();
                                }
                            });

                        },

                        // FIX UPLOAD GAMBAR
                        images_upload_handler: function(blobInfo, progress) {
                            return new Promise(function(resolve, reject) {
                                const xhr = new XMLHttpRequest();
                                xhr.open('POST', '{{ route('tinymce.upload') }}');
                                xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');

                                xhr.upload.onprogress = function(e) {
                                    progress(e.loaded / e.total * 100);
                                };

                                xhr.onload = function() {
                                    if (xhr.status === 200) {
                                        const json = JSON.parse(xhr.responseText);
                                        resolve(json.location);
                                    } else {
                                        reject('HTTP Error: ' + xhr.status);
                                    }
                                };

                                const formData = new FormData();
                                formData.append('file', blobInfo.blob());
                                xhr.send(formData);
                            });
                        }
                    });
                </script>




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
