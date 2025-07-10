<x-app-layout>
    <div class="max-w-7xl mx-auto bg-white shadow-md rounded-lg p-6 my-2">
        <h2 class="text-2xl font-bold text-[#401457]">Add New Team</h2>
        <form action="{{ route('team.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @component('admin.components.alert')
            @endcomponent
            <div class="w-full grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="p-0 space-y-4">
                    <h1 class="text-[20px] font-[600] text-[#401457] uppercase">English</h1>
                    <div>
                        <label for="name_en" class="block text-sm font-medium text-gray-700">Name</label>
                        <input value="{{ old('name.en') }}" type="text" name="name[en]" id="name_en"
                            class="mt-1 block w-full p-2 border rounded-md focus:ring-[#401457] focus:border-[#401457] text-[#401457] text-sm">
                        <x-input-error class="mt-2" :messages="$errors->get('name.en')" />
                    </div>
                    <div>
                        <label for="position_en" class="block text-sm font-medium text-gray-700">Position</label>
                        <input value="{{ old('position.en') }}" type="text" name="position[en]" id="position_en"
                            class="mt-1 block w-full p-2 border rounded-md focus:ring-[#401457] focus:border-[#401457] text-[#401457] text-sm">
                        <x-input-error class="mt-2" :messages="$errors->get('position.en')" />
                    </div>
                    <div>
                        <label for="content_en" class="block text-sm font-medium text-gray-700">Content</label>
                        <textarea name="content[en]" id="content_en" rows="4"
                            class="mt-1 block w-full p-2 border rounded-md text-[#401457] text-sm">{{ old('content.en') }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('content.en')" />
                    </div>

                </div>

                <div class="p-0 space-y-4">
                    <h1 class="text-[20px] font-[600] text-[#401457] uppercase">Khmer</h1>
                    <div>
                        <label for="name_kh" class="block text-sm font-medium text-gray-700">Name</label>
                        <input value="{{ old('name.kh') }}" type="text" name="name[kh]" id="name_kh"
                            class="mt-1 block w-full p-2 border rounded-md focus:ring-[#401457] focus:border-[#401457] text-[#401457] text-sm">
                        <x-input-error class="mt-2" :messages="$errors->get('name.kh')" />
                    </div>
                    <div>
                        <label for="position_kh" class="block text-sm font-medium text-gray-700">Position</label>
                        <input value="{{ old('position.kh') }}" type="text" name="position[kh]" id="position_kh"
                            class="mt-1 block w-full p-2 border rounded-md focus:ring-[#401457] focus:border-[#401457] text-[#401457] text-sm">
                        <x-input-error class="mt-2" :messages="$errors->get('position.kh')" />
                    </div>
                    <div>
                        <label for="content_kh" class="block text-sm font-medium text-gray-700">Content</label>
                        <textarea style="color: #401457 !important" name="content[kh]" id="content_kh" rows="4"
                            class="mt-1 block w-full p-2 border rounded-md focus:ring-[#401457] focus:border-[#401457] !text-[#401457] text-sm">{{ old('content.kh') }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('content.kh')" />
                    </div>
                </div>

                <div class="p-0 space-y-4">
                    <h1 class="text-[20px] font-[600] text-[#401457] uppercase">Chinese</h1>
                    <div>
                        <label for="name_ch" class="block text-sm font-medium text-gray-700">Name</label>
                        <input value="{{ old('name.ch') }}" type="text" name="name[ch]" id="name_ch"
                            class="mt-1 block w-full p-2 border rounded-md focus:ring-[#401457] focus:border-[#401457] text-[#401457] text-sm">
                        <x-input-error class="mt-2" :messages="$errors->get('name.ch')" />
                    </div>
                    <div>
                        <label for="position_ch" class="block text-sm font-medium text-gray-700">Position</label>
                        <input value="{{ old('position.ch') }}" type="text" name="position[ch]" id="position_ch"
                            class="mt-1 block w-full p-2 border rounded-md focus:ring-[#401457] focus:border-[#401457] text-[#401457] text-sm">
                        <x-input-error class="mt-2" :messages="$errors->get('position.ch')" />
                    </div>
                    <div>
                        <label for="content_ch" class="block text-sm font-medium text-gray-700">Content</label>
                        <textarea name="content[ch]" id="content_ch" rows="4"
                            class="mt-1 block w-full p-2 border rounded-md focus:ring-[#401457] focus:border-[#401457] text-[#401457] text-sm">{{ old('content.ch') }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('content.ch')" />
                    </div>
                </div>
            </div>

            <div>
                <label for="link" class="block text-sm font-medium text-gray-700">Linkedin</label>
                <input value="{{ old('link') }}" type="text" name="link" id="link"
                    class="mt-1 block w-full p-2 border rounded-md focus:ring-[#401457] focus:border-[#401457] text-[#401457] text-sm">
                <x-input-error class="mt-2" :messages="$errors->get('link')" />
            </div>

            <!-- Image Upload -->
            <div>
                <h1>Image</h1>
                <label for="dropzone-image" id="drop-area-image"
                    class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50">
                    <div id="image-preview"
                        class="flex flex-col items-center justify-center pt-5 pb-6 w-full h-full bg-contain bg-center bg-no-repeat rounded-md text-center">
                        <p class="mb-2 text-[12px] sm:text-[14px] text-[#000]">
                            <span class="font-semibold">Click to upload</span> or drag and drop
                        </p>
                        <p class="text-xs text-[#000]">SVG, PNG, JPG or GIF (MAX. 5MB)</p>
                    </div>
                    <input id="dropzone-image" type="file" class="hidden" name="image" accept="image/*"
                        onchange="uploadImage(event)" />
                </label>
                <x-input-error class="mt-2" :messages="$errors->get('image')" />
            </div>

            <div class="flex justify-between w-full">
                <a href="{{ route('team.index') }}"
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

        function uploadImage(event) {
            const file = event.target.files[0];
            if (file) {
                const imgLink = URL.createObjectURL(file);
                const preview = document.getElementById('image-preview');
                preview.style.backgroundImage = `url(${imgLink})`;
                preview.style.backgroundSize = "contain";
                preview.style.backgroundPosition = "center";
                preview.innerHTML = "";
            }
        }

        // Drag and drop for icon
        const iconDropArea = document.getElementById('drop-area-icon');
        const iconInput = document.getElementById('dropzone-icon');
        const iconPreview = document.getElementById('icon-preview');

        iconDropArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            iconDropArea.classList.add('border-blue-500');
        });
        iconDropArea.addEventListener('dragleave', () => {
            iconDropArea.classList.remove('border-blue-500');
        });
        iconDropArea.addEventListener('drop', (e) => {
            e.preventDefault();
            iconDropArea.classList.remove('border-blue-500');
            const file = e.dataTransfer.files[0];
            if (file) {
                iconInput.files = e.dataTransfer.files;
                uploadIcon({
                    target: {
                        files: [file]
                    }
                });
            }
        });

        // Drag and drop for image
        const imageDropArea = document.getElementById('drop-area-image');
        const imageInput = document.getElementById('dropzone-image');
        const imagePreview = document.getElementById('image-preview');

        imageDropArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            imageDropArea.classList.add('border-blue-500');
        });
        imageDropArea.addEventListener('dragleave', () => {
            imageDropArea.classList.remove('border-blue-500');
        });
        imageDropArea.addEventListener('drop', (e) => {
            e.preventDefault();
            imageDropArea.classList.remove('border-blue-500');
            const file = e.dataTransfer.files[0];
            if (file) {
                imageInput.files = e.dataTransfer.files;
                uploadImage({
                    target: {
                        files: [file]
                    }
                });
            }
        });
    </script>

</x-app-layout>
