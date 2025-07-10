<x-app-layout>
    <div class="max-w-7xl mx-auto bg-white shadow-md rounded-lg p-6 my-2">
        <h2 class="text-2xl font-bold text-[#401457]">Edit Client Images</h2>

        <form action="{{ route('client-backend.update', $client->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-4">
            @csrf
            @method('PATCH')
            @component('admin.components.alert')
            @endcomponent

            <!-- Dropzone for New Images -->
            <div>
                <label for="dropzone-file{{ $client->id }}" id="drop-area"
                    class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50">
                    <p class="text-sm text-gray-500">Click or drag images here to upload</p>
                    <input id="dropzone-file{{ $client->id }}" type="file" class="hidden" name="image[]" multiple
                        accept="image/*" onchange="uploadImages(event)" />
                </label>
                <x-input-error class="mt-2" :messages="$errors->get('image')" />
            </div>

            <!-- Preview Section -->
            <div id="img-preview"
                class="flex flex-wrap gap-2 justify-center items-center w-full bg-gray-50 rounded-md overflow-y-auto p-4">
            </div>

            <!-- Hidden Inputs -->
            <input type="hidden" name="removed_images" id="removed_images" />
            <input type="hidden" name="image_order" id="image_order" />

            <!-- Form Buttons -->
            <div class="flex justify-between">
                <a href="{{ route('client-backend.index') }}"
                    class="border border-[#401457] hover:bg-[#401457] hover:text-white px-4 py-1 md:px-6 rounded-[5px] text-[#401457]">
                    Back
                </a>

                <button type="submit"
                    class="bg-[#401457] text-white px-4 py-1 md:px-6 rounded-[5px]">
                    Submit
                </button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>

    @php
        $images = $client->image;
        if (!is_array($images)) {
            $decoded = json_decode($client->image, true);
            $images = is_array($decoded) ? $decoded : [];
        }
    @endphp

    <script>
        let selectedImages = [];
        let removedImages = [];

        const previewContainer = document.getElementById("img-preview");
        const removedImagesInput = document.getElementById("removed_images");
        const imageOrderInput = document.getElementById("image_order");

        const existingImages = @json($images);

        function renderPreview() {
            previewContainer.innerHTML = "";

            // Render existing images
            existingImages.forEach((img) => {
                if (!removedImages.includes(img)) {
                    const wrapper = document.createElement("div");
                    wrapper.className = "relative group";
                    wrapper.dataset.image = img;

                    const imageEl = document.createElement("img");
                    imageEl.src = "{{ asset('') }}" + img;
                    imageEl.className = "w-20 h-20 object-cover rounded border";

                    const btn = document.createElement("button");
                    btn.type = "button";
                    btn.className =
                        "absolute -top-2 -right-2 bg-[#FF3217] text-white flex items-center justify-center rounded-full w-6 h-6";
                    btn.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>`;
                    btn.onclick = () => {
                        removedImages.push(img);
                        renderPreview();
                        updateImageOrder();
                    };

                    wrapper.appendChild(imageEl);
                    wrapper.appendChild(btn);
                    previewContainer.appendChild(wrapper);
                }
            });

            // Render newly selected images
            selectedImages.forEach((file, index) => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const wrapper = document.createElement("div");
                    wrapper.className = "relative group";

                    const img = document.createElement("img");
                    img.src = e.target.result;
                    img.className = "w-20 h-20 object-cover rounded border";

                    const btn = document.createElement("button");
                    btn.type = "button";
                    btn.className =
                        "absolute -top-2 -right-2 bg-[#FF3217] text-white flex items-center justify-center rounded-full w-6 h-6";
                    btn.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>`;
                    btn.onclick = () => {
                        selectedImages.splice(index, 1);
                        renderPreview();
                    };

                    wrapper.appendChild(img);
                    wrapper.appendChild(btn);
                    previewContainer.appendChild(wrapper);
                };
                reader.readAsDataURL(file);
            });

            removedImagesInput.value = JSON.stringify(removedImages);
            updateImageOrder();
        }

        function uploadImages(event) {
            const files = Array.from(event.target.files);
            selectedImages.push(...files);
            renderPreview();
        }

        function updateImageOrder() {
            const ordered = [];
            const items = previewContainer.querySelectorAll("div[data-image]");
            items.forEach((el) => {
                const val = el.dataset.image;
                if (val && !val.startsWith("new-")) {
                    ordered.push(val);
                }
            });
            imageOrderInput.value = JSON.stringify(ordered);
        }

        new Sortable(previewContainer, {
            animation: 150,
            onEnd: function() {
                updateImageOrder();
            }
        });

        renderPreview();
    </script>

</x-app-layout>
