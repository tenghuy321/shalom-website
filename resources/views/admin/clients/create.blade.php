<x-app-layout>
    <div class="max-w-7xl mx-auto bg-white shadow-md rounded-lg p-6 my-2">
        <h2 class="text-2xl font-bold text-[#401457]">Add New Client Image</h2>

        <form action="{{ route('client-backend.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @component('admin.components.alert')
            @endcomponent

            <!-- Dropzone for Images -->
            <div>
                <label for="dropzone-file" id="drop-area"
                       class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50">

                    <div class="flex flex-col items-center justify-center pointer-events-none">
                        <svg class="w-8 h-8 text-gray-400 mb-2" fill="none" stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M7 16v-4a4 4 0 018 0v4m-4 4v-4m0 4l-4-4m4 4l4-4"/>
                        </svg>
                        <p class="text-sm text-gray-500">Drag & drop or click to upload images</p>
                    </div>

                    <input id="dropzone-file" type="file" class="hidden" name="image[]" accept="image/*" multiple onchange="uploadImages(event)" />
                </label>
                <x-input-error class="mt-2" :messages="$errors->get('image')" />
            </div>

            <!-- Image Preview -->
            <div id="img-preview"
                 class="flex flex-wrap gap-2 justify-center items-center w-full bg-gray-50 rounded-md overflow-y-auto p-4">
                <p class="text-gray-400 text-sm">No images selected.</p>
            </div>

            <!-- Buttons -->
            <div class="flex justify-between w-full">
                <a href="{{ route('client-backend.index') }}"
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
        const dropArea = document.getElementById('drop-area');
        const imageFileInput = document.getElementById('dropzone-file');
        const imagePreview = document.getElementById('img-preview');
        let selectedFiles = [];

        function uploadImages(event) {
            const files = Array.from(event.target.files);
            selectedFiles.push(...files);
            renderImagePreviews();
            syncInputFiles();
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
                img.className = 'w-24 h-24 object-contain rounded border p-1';

                const info = document.createElement('p');
                info.className = 'text-[10px] text-gray-500 text-center truncate max-w-[96px]';
                info.textContent = `${file.name}`;

                const removeBtn = document.createElement('button');
                removeBtn.textContent = '✕';
                removeBtn.className =
                    'absolute top-0 right-0 bg-red-600 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs';
                removeBtn.type = 'button';
                removeBtn.onclick = () => {
                    selectedFiles.splice(index, 1);
                    renderImagePreviews();
                    syncInputFiles();
                };

                wrapper.appendChild(img);
                wrapper.appendChild(info);
                wrapper.appendChild(removeBtn);
                imagePreview.appendChild(wrapper);
            });

            initSortable();
        }

        function syncInputFiles() {
            const dataTransfer = new DataTransfer();
            selectedFiles.forEach(file => dataTransfer.items.add(file));
            imageFileInput.files = dataTransfer.files;
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
            selectedFiles.push(...files);
            renderImagePreviews();
            syncInputFiles();
        });

        imageFileInput.addEventListener('click', () => {
            imageFileInput.value = null;
        });

        function initSortable() {
            Sortable.create(imagePreview, {
                animation: 150,
                onEnd: function (evt) {
                    const newOrder = [];
                    const items = Array.from(imagePreview.children);
                    items.forEach(el => {
                        const index = parseInt(el.dataset.index);
                        newOrder.push(selectedFiles[index]);
                    });
                    selectedFiles = newOrder;
                    syncInputFiles();
                    renderImagePreviews(); // Re-render to re-assign remove buttons correctly
                }
            });
        }
    </script>
</x-app-layout>
