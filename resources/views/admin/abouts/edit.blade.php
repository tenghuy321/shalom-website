<x-app-layout>
    <div class="max-w-7xl mx-auto bg-white shadow-md rounded-lg p-6 my-2">
        <h2 class="text-2xl font-bold text-[#401457]">Edit About Us</h2>
        <form action="{{ route('aboutlist.update', $about->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-4">
            @csrf
            @method('PATCH')
            @component('admin.components.alert')
            @endcomponent

            <div class="w-full grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="p-0 space-y-4">
                    <h1 class="text-[20px] font-[600] text-[#401457] uppercase">English</h1>
                    <div>
                        <label for="title_en" class="block text-sm font-medium text-gray-700">Title</label>
                        <input value="{{ old('title.en', $about->title['en'] ?? '') }}" type="text"
                            name="title[en]" id="title_en"
                            class="mt-1 block w-full p-2 border rounded-md text-[#401457] text-sm">
                        <x-input-error class="mt-2" :messages="$errors->get('title.en')" />
                    </div>
                    <div>
                        <label for="content_en" class="block text-sm font-medium text-gray-700">Content</label>
                        <textarea name="content[en]" id="content_en" rows="6"
                            class="mt-1 block w-full p-2 border rounded-md text-[#401457] text-[12px]">{{ old('content.en', $about->content['en'] ?? '') }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('content.en')" />
                    </div>
                </div>

                <div class="p-0 space-y-4">
                    <h1 class="text-[20px] font-[600] text-[#401457] uppercase">Khmer</h1>
                    <div>
                        <label for="title_kh" class="block text-sm font-medium text-gray-700">Title</label>
                        <input value="{{ old('title.kh', $about->title['kh'] ?? '') }}" type="text"
                            name="title[kh]" id="title_kh"
                            class="mt-1 block w-full p-2 border rounded-md text-[#401457] text-sm">
                        <x-input-error class="mt-2" :messages="$errors->get('title.kh')" />
                    </div>
                    <div>
                        <label for="content_kh" class="block text-sm font-medium text-gray-700">Content</label>
                        <textarea name="content[kh]" id="content_kh" rows="6"
                            class="mt-1 block w-full p-2 border rounded-md text-[#401457] text-[12px]">{{ old('content.kh', $about->content['kh'] ?? '') }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('content.kh')" />
                    </div>
                </div>

                <div class="p-0 space-y-4">
                    <h1 class="text-[20px] font-[600] text-[#401457] uppercase">Chinese</h1>
                    <div>
                        <label for="title_ch" class="block text-sm font-medium text-gray-700">Title</label>
                        <input value="{{ old('title.ch', $about->title['ch'] ?? '') }}" type="text"
                            name="title[ch]" id="title_ch"
                            class="mt-1 block w-full p-2 border rounded-md text-[#401457] text-sm">
                        <x-input-error class="mt-2" :messages="$errors->get('title.ch')" />
                    </div>
                    <div>
                        <label for="content_ch" class="block text-sm font-medium text-gray-700">Content</label>
                        <textarea name="content[ch]" id="content_ch" rows="6"
                            class="mt-1 block w-full p-2 border rounded-md text-[#401457] text-[12px]">{{ old('content.ch', $about->content['ch'] ?? '') }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('content.ch')" />
                    </div>
                </div>
            </div>

            <!-- Icon Upload -->
            <div>
                <h1>Icon</h1>
                <label for="dropzone-icon{{ $about->id }}" id="drop-area-icon"
                    class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50">
                    <div id="icon-preview" style="background-image: url({{ asset($about->icon) }})"
                        class="flex flex-col items-center justify-center pt-5 pb-6 w-full h-full bg-contain bg-center bg-no-repeat rounded-md text-center">
                        <p class="mb-2 text-[12px] sm:text-[14px] text-[#000]">
                            <span class="font-semibold">Click to upload</span> or drag and drop
                        </p>
                        <p class="text-xs text-[#000]">SVG, PNG, JPG or GIF (MAX. 5MB)</p>
                    </div>
                    <input id="dropzone-icon{{ $about->id }}" type="file" class="hidden" name="icon"
                        accept="image/*" onchange="uploadIcon(event)" />
                </label>
                <x-input-error class="mt-2" :messages="$errors->get('icon')" />
            </div>

            <div class="flex justify-between">
                <a href="{{ route('aboutlist.index') }}"
                    class="border border-[#401457] hover:!bg-[#401457] hover:!text-[#ffffff] px-4 py-1 md:px-6 rounded-[5px] text-[#401457]">
                    Back
                </a>

                <button type="submit" class="bg-[#401457] text-white px-4 py-1 md:px-6 rounded-[5px]">Submit</button>
            </div>
        </form>
    </div>

    <script>
        ClassicEditor
            .create(document.querySelector('#content_en')).catch(console.error);
        ClassicEditor
            .create(document.querySelector('#content_kh')).catch(console.error);
        ClassicEditor
            .create(document.querySelector('#content_ch')).catch(console.error);

        const dropArea = document.getElementById('drop-area');
        const imageFile = document.getElementById('dropzone-file');
        const imagePreview = document.getElementById('img-preview');


        function uploadIcon(event) {
            const file = event.target.files[0];
            if (file) {
                const imgLink = URL.createObjectURL(file);
                const preview = document.getElementById('icon-preview');
                preview.style.backgroundImage = `url(${imgLink})`;
                preview.style.backgroundSize = "contain";
                preview.style.backgroundPosition = "center";
                preview.innerHTML = "";
            }
        }

        // Drag-and-drop functionality
        dropArea.addEventListener('dragover', (event) => {
            event.preventDefault();
            dropArea.classList.add('border-blue-500');
        });

        dropArea.addEventListener('dragleave', () => {
            dropArea.classList.remove('border-blue-500');
        });

        dropArea.addEventListener('drop', (event) => {
            event.preventDefault();
            dropArea.classList.remove('border-blue-500');
            const file = event.dataTransfer.files[0];
            if (file) {
                const imgLink = URL.createObjectURL(file);
                imagePreview.style.backgroundImage = `url(${imgLink})`;
                imagePreview.style.backgroundSize = "contain";
                imagePreview.style.backgroundPosition = "center";
                imagePreview.innerHTML = ""; // Clear the default content inside preview
                imageFile.files = event.dataTransfer.files; // Attach the dropped file to input
            }
        });
    </script>
</x-app-layout>
