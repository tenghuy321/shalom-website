<x-app-layout>
    <div class="max-w-7xl mx-auto bg-white shadow-md rounded-lg p-6 my-2">
        <h2 class="text-2xl font-bold text-[#401457]">Add New Event</h2>

        <form action="{{ route('event-backend.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @component('admin.components.alert')
            @endcomponent

            <div class="w-full grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="p-0 space-y-4">
                    <h1 class="text-[20px] font-[600] text-[#401457] uppercase">English</h1>
                    <div>
                        <label for="title_en" class="block text-sm font-medium text-gray-700">Title</label>
                        <input value="{{ old('title.en') }}" type="text" name="title[en]" id="title_en"
                            class="mt-1 block w-full p-2 border rounded-md focus:ring-[#401457] focus:border-[#401457] text-[#401457] text-sm">
                        <x-input-error class="mt-2" :messages="$errors->get('title.en')" />
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
                        <label for="title_kh" class="block text-sm font-medium text-gray-700">Title</label>
                        <input value="{{ old('title.kh') }}" type="text" name="title[kh]" id="title_kh"
                            class="mt-1 block w-full p-2 border rounded-md focus:ring-[#401457] focus:border-[#401457] text-[#401457] text-sm">
                        <x-input-error class="mt-2" :messages="$errors->get('title.kh')" />
                    </div>
                    <div>
                        <label for="content_kh" class="block text-sm font-medium text-gray-700">Content</label>
                        <textarea name="content[kh]" id="content_kh" rows="4"
                            class="mt-1 block w-full p-2 border rounded-md focus:ring-[#401457] focus:border-[#401457] text-[#401457] text-sm">{{ old('content.kh') }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('content.kh')" />
                    </div>
                </div>

                <div class="p-0 space-y-4">
                    <h1 class="text-[20px] font-[600] text-[#401457] uppercase">Chinese</h1>
                    <div>
                        <label for="title_ch" class="block text-sm font-medium text-gray-700">Title</label>
                        <input value="{{ old('title.ch') }}" type="text" name="title[ch]" id="title_ch"
                            class="mt-1 block w-full p-2 border rounded-md focus:ring-[#401457] focus:border-[#401457] text-[#401457] text-sm">
                        <x-input-error class="mt-2" :messages="$errors->get('title.ch')" />
                    </div>
                    <div>
                        <label for="content_ch" class="block text-sm font-medium text-gray-700">Content</label>
                        <textarea name="content[ch]" id="content_ch" rows="4"
                            class="mt-1 block w-full p-2 border rounded-md focus:ring-[#401457] focus:border-[#401457] text-[#401457] text-sm">{{ old('content.ch') }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('content.ch')" />
                    </div>
                </div>
            </div>

            <!-- Dropzone for Images -->
            <div>
                <label for="dropzone-file" id="drop-area"
                    class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50">

                    <div class="flex flex-col items-center justify-center pointer-events-none">
                        <svg class="w-8 h-8 text-gray-400 mb-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16v-4a4 4 0 018 0v4m-4 4v-4m0 4l-4-4m4 4l4-4" />
                        </svg>
                        <p class="text-sm text-gray-500">Drag & drop or click to upload images</p>
                    </div>

                    <input id="dropzone-file" type="file" class="hidden" name="image[]" accept="image/*" multiple
                        onchange="uploadImages(event)" />
                    <input type="hidden" name="image_order" id="image_order">
                </label>
                @error('images.*')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Image Preview -->
            <div id="img-preview"
                class="flex flex-wrap gap-2 justify-center items-center w-full bg-gray-50 rounded-md overflow-y-auto p-4">
                <p class="text-gray-400 text-sm">No images selected.</p>
            </div>

            <!-- Buttons -->
            <div class="flex justify-between w-full">
                <a href="{{ route('event-backend.index') }}"
                    class="border border-[#401457] hover:!bg-[#401457] hover:!text-white px-4 py-1 md:px-6 rounded-[5px] text-[#401457]">
                    Back
                </a>

                <button type="submit"
                    class="bg-[#401457] text-white px-4 py-1 md:px-6 rounded-[5px]">
                    Submit
                </button>
            </div>
        </form>
    </div>

    <!-- Sortable.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#content_en')).catch(console.error);
        ClassicEditor
            .create(document.querySelector('#content_kh')).catch(console.error);
        ClassicEditor
            .create(document.querySelector('#content_ch')).catch(console.error);

        const dropArea = document.getElementById('drop-area');
        const imageFileInput = document.getElementById('dropzone-file');
        const imagePreview = document.getElementById('img-preview');
        const imageOrderInput = document.getElementById('image_order');

        let selectedFiles = [];

        function uploadImages(event) {
            const files = Array.from(event.target.files);
            selectedFiles = files;
            renderImagePreviews();
            setImageOrder();
        }

        function renderImagePreviews() {
            imagePreview.innerHTML = '';

            if (selectedFiles.length === 0) {
                imagePreview.innerHTML = '<p class="text-gray-400 text-sm">No images selected.</p>';
                return;
            }

            selectedFiles.forEach((file, index) => {
                const imgLink = URL.createObjectURL(file);
                const wrapper = document.createElement('div');
                wrapper.className = 'relative draggable';
                wrapper.dataset.index = index;

                const img = document.createElement('img');
                img.src = imgLink;
                img.className = 'w-24 h-24 object-cover rounded border p-1';

                const name = document.createElement('p');
                name.className = 'text-xs text-gray-600 truncate text-center max-w-[96px]';
                name.textContent = file.name;

                wrapper.appendChild(img);
                wrapper.appendChild(name);
                imagePreview.appendChild(wrapper);
            });

            initSortable();
        }

        function setImageOrder() {
            const order = selectedFiles.map(file => file.name);
            imageOrderInput.value = JSON.stringify(order);
        }

        function initSortable() {
            Sortable.create(imagePreview, {
                animation: 150,
                onEnd: function(evt) {
                    const newOrder = [];
                    const items = Array.from(imagePreview.children);
                    items.forEach(el => {
                        const index = parseInt(el.dataset.index);
                        newOrder.push(selectedFiles[index]);
                    });
                    selectedFiles = newOrder;
                    renderImagePreviews();
                    setImageOrder();
                }
            });
        }

        dropArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropArea.classList.add('border-blue-500');
        });

        dropArea.addEventListener('dragleave', () => {
            dropArea.classList.remove('border-blue-500');
        });

        dropArea.addEventListener('drop', (e) => {
            e.preventDefault();
            dropArea.classList.remove('border-blue-500');

            const files = Array.from(e.dataTransfer.files);
            imageFileInput.files = e.dataTransfer.files; // update input
            uploadImages({
                target: {
                    files: files
                }
            });
        });
    </script>

</x-app-layout>
