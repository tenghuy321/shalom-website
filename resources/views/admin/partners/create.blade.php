<x-app-layout>
    <div class="max-w-7xl mx-auto bg-white shadow-md rounded-lg p-6 my-2">
        <h2 class="text-2xl font-bold text-[#401457]">Add New Partner</h2>
        <form action="{{ route('partner.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @component('admin.components.alert')
            @endcomponent
            <div class="w-full grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="p-0 space-y-4">
                    <h1 class="text-[20px] font-[600] text-[#401457] uppercase">English</h1>
                    <div>
                        <label for="title_en" class="block text-sm font-medium text-[#401457]">Title</label>
                        <input value="{{ old('title.en') }}" type="text" name="title[en]" id="title_en"
                            class="mt-1 block w-full p-2 border rounded-md focus:ring-[#401457] focus:border-[#401457] text-[#401457] text-sm">
                        <x-input-error class="mt-2" :messages="$errors->get('title.en')" />
                    </div>
                    <div>
                        <label for="date_en" class="block text-sm font-medium text-[#401457]">Date</label>
                        <input value="{{ old('date.en') }}" type="text" name="date[en]"
                            id="date_en"
                            class="mt-1 block w-full p-2 border rounded-md focus:ring-[#401457] focus:border-[#401457] text-[#401457] text-sm">
                        <x-input-error class="mt-2" :messages="$errors->get('date.en')" />
                    </div>
                    <div>
                        <label for="content_en" class="block text-sm font-medium text-[#401457]">Content</label>
                        <textarea name="content[en]" id="content_en" rows="4"
                            class="mt-1 block w-full p-2 border rounded-md text-[#401457] text-sm">{{ old('content.en') }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('content.en')" />
                    </div>
                </div>

                <div class="p-0 space-y-4">
                    <h1 class="text-[20px] font-[600] text-[#401457] uppercase">Khmer</h1>
                    <div>
                        <label for="title_kh" class="block text-sm font-medium text-[#401457]">Title</label>
                        <input value="{{ old('title.kh') }}" type="text" name="title[kh]" id="title_kh"
                            class="mt-1 block w-full p-2 border rounded-md focus:ring-[#401457] focus:border-[#401457] text-[#401457] text-sm">
                        <x-input-error class="mt-2" :messages="$errors->get('title.kh')" />
                    </div>
                    <div>
                        <label for="date_kh" class="block text-sm font-medium text-[#401457]">Date</label>
                        <input value="{{ old('date.kh') }}" type="text" name="date[kh]"
                            id="date_kh"
                            class="mt-1 block w-full p-2 border rounded-md focus:ring-[#401457] focus:border-[#401457] text-[#401457] text-sm">
                        <x-input-error class="mt-2" :messages="$errors->get('date.kh')" />
                    </div>
                    <div>
                        <label for="content_kh" class="block text-sm font-medium text-[#401457]">Content</label>
                        <textarea name="content[kh]" id="content_kh" rows="4"
                            class="mt-1 block w-full p-2 border rounded-md focus:ring-[#401457] focus:border-[#401457] text-[#401457] text-sm">{{ old('content.kh') }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('content.kh')" />
                    </div>
                </div>

                <div class="p-0 space-y-4">
                    <h1 class="text-[20px] font-[600] text-[#401457] uppercase">Chinese</h1>
                    <div>
                        <label for="title_ch" class="block text-sm font-medium text-[#401457]">Title</label>
                        <input value="{{ old('title.ch') }}" type="text" name="title[ch]" id="title_ch"
                            class="mt-1 block w-full p-2 border rounded-md focus:ring-[#401457] focus:border-[#401457] text-[#401457] text-sm">
                        <x-input-error class="mt-2" :messages="$errors->get('title.ch')" />
                    </div>
                    <div>
                        <label for="date_ch" class="block text-sm font-medium text-[#401457]">Date</label>
                        <input value="{{ old('date.ch') }}" type="text" name="date[ch]"
                            id="date_ch"
                            class="mt-1 block w-full p-2 border rounded-md focus:ring-[#401457] focus:border-[#401457] text-[#401457] text-sm">
                        <x-input-error class="mt-2" :messages="$errors->get('date.ch')" />
                    </div>
                    <div>
                        <label for="content_ch" class="block text-sm font-medium text-[#401457]">Content</label>
                        <textarea name="content[ch]" id="content_ch" rows="4"
                            class="mt-1 block w-full p-2 border rounded-md focus:ring-[#401457] focus:border-[#401457] text-[#401457] text-sm">{{ old('content.ch') }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('content.ch')" />
                    </div>
                </div>
            </div>

            <!-- Dropzone for Image -->
            <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <h1 class="text-[#401457]">Our Logo</h1>
                    <label for="dropzone-our_logo" id="drop-area-our_logo"
                        class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50">
                        <div id="our_logo-preview"
                            class="flex flex-col items-center justify-center pt-5 pb-6 w-full h-full bg-contain bg-center bg-no-repeat rounded-md text-center">
                            <p class="mb-2 text-[12px] sm:text-[14px] text-[#000]">
                                <span class="font-semibold">Click to upload</span> or drag and drop
                            </p>
                            <p class="text-xs text-[#000]">SVG, PNG, JPG or GIF (MAX. 5MB)</p>
                        </div>
                        <input id="dropzone-our_logo" type="file" class="hidden" name="our_logo"
                            accept="image/*" onchange="uploadOurLogo(event)" />
                    </label>
                    <x-input-error class="mt-2" :messages="$errors->get('our_logo')" />
                </div>
                <div>
                    <h1 class="text-[#401457]">Partner Logo</h1>
                    <label for="dropzone-partner_logo" id="drop-area-partner_logo"
                        class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50">
                        <div id="partner_logo-preview"
                            class="flex flex-col items-center justify-center pt-5 pb-6 w-full h-full bg-contain bg-center bg-no-repeat rounded-md text-center">
                            <p class="mb-2 text-[12px] sm:text-[14px] text-[#000]">
                                <span class="font-semibold">Click to upload</span> or drag and drop
                            </p>
                            <p class="text-xs text-[#000]">SVG, PNG, JPG or GIF (MAX. 5MB)</p>
                        </div>
                        <input id="dropzone-partner_logo" type="file" class="hidden" name="partner_logo"
                            accept="image/*" onchange="uploadPartnerLogo(event)" />
                    </label>
                    <x-input-error class="mt-2" :messages="$errors->get('partner_logo')" />
                </div>

                <!-- Image Upload -->
                <div>
                    <h1 class="text-[#401457]">Image</h1>
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

            </div>

            <div class="flex justify-between w-full">
                <a href="{{ route('partner.index') }}"
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

        function uploadOurLogo(event) {
            const file = event.target.files[0];
            if (file) {
                const imgLink = URL.createObjectURL(file);
                const preview = document.getElementById('our_logo-preview');
                preview.style.backgroundImage = `url(${imgLink})`;
                preview.style.backgroundSize = "contain";
                preview.style.backgroundPosition = "center";
                preview.innerHTML = "";
            }
        }

        function uploadPartnerLogo(event) {
            const file = event.target.files[0];
            if (file) {
                const imgLink = URL.createObjectURL(file);
                const preview = document.getElementById('partner_logo-preview');
                preview.style.backgroundImage = `url(${imgLink})`;
                preview.style.backgroundSize = "contain";
                preview.style.backgroundPosition = "center";
                preview.innerHTML = "";
            }
        }

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
