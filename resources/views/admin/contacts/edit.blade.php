<x-app-layout>
    <div class="max-w-7xl mx-auto bg-white shadow-md rounded-lg p-6 my-2">
        <h2 class="text-2xl font-bold text-[#401457]">Edit Hero Banner</h2>
        <form action="{{ route('contact-us.update', $contact->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-4">
            @csrf
            @method('PATCH')
            @component('admin.components.alert')
            @endcomponent

            <div class="w-full grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="p-0 space-y-4">
                    <h1 class="text-[20px] font-[600] text-[#401457] uppercase">English</h1>
                    <div>
                        <label for="hours_of_operation_en" class="block text-sm font-medium text-[#401457]">Hours Of
                            Operations</label>
                        <input value="{{ old('hours_of_operation.en', $contact->hours_of_operation['en'] ?? '') }}"
                            type="text" name="hours_of_operation[en]" id="hours_of_operation_en"
                            class="mt-1 block w-full p-2 border rounded-md focus:ring-[#401457] focus:border-[#401457] text-[#401457] text-sm">
                        <x-input-error class="mt-2" :messages="$errors->get('hours_of_operation.en')" />
                    </div>
                    <div>
                        <label for="address_en" class="block text-sm font-medium text-[#401457]">Address</label>
                        <textarea name="address[en]" id="address_en" rows="4"
                            class="mt-1 block w-full p-2 border rounded-md text-[#401457] text-sm">{{ old('address.en', $contact->address['en'] ?? '') }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('address.en')" />
                    </div>
                </div>

                <div class="p-0 space-y-4">
                    <h1 class="text-[20px] font-[600] text-[#401457] uppercase">Khmer</h1>
                    <div>
                        <label for="hours_of_operation_kh" class="block text-sm font-medium text-[#401457]">Hours Of
                            Operations</label>
                        <input value="{{ old('hours_of_operation.kh', $contact->hours_of_operation['kh'] ?? '') }}"
                            type="text" name="hours_of_operation[kh]" id="hours_of_operation_kh"
                            class="mt-1 block w-full p-2 border rounded-md focus:ring-[#401457] focus:border-[#401457] text-[#401457] text-sm">
                        <x-input-error class="mt-2" :messages="$errors->get('hours_of_operation.kh')" />
                    </div>
                    <div>
                        <label for="address_kh" class="block text-sm font-medium text-[#401457]">Address</label>
                        <textarea name="address[kh]" id="address_kh" rows="4"
                            class="mt-1 block w-full p-2 border rounded-md focus:ring-[#401457] focus:border-[#401457] text-[#401457] text-sm">{{ old('address.kh', $contact->address['kh'] ?? '') }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('address.kh')" />
                    </div>
                </div>

                <div class="p-0 space-y-4">
                    <h1 class="text-[20px] font-[600] text-[#401457] uppercase">Chinese</h1>
                    <div>
                        <label for="hours_of_operation_ch" class="block text-sm font-medium text-[#401457]">Hours Of
                            Operations</label>
                        <input value="{{ old('hours_of_operation.ch', $contact->hours_of_operation['ch'] ?? '') }}"
                            type="text" name="hours_of_operation[ch]" id="hours_of_operation_ch"
                            class="mt-1 block w-full p-2 border rounded-md focus:ring-[#401457] focus:border-[#401457] text-[#401457] text-sm">
                        <x-input-error class="mt-2" :messages="$errors->get('hours_of_operation.ch')" />
                    </div>
                    <div>
                        <label for="address_ch" class="block text-sm font-medium text-[#401457]">Address</label>
                        <textarea name="address[ch]" id="address_ch" rows="4"
                            class="mt-1 block w-full p-2 border rounded-md focus:ring-[#401457] focus:border-[#401457] text-[#401457] text-sm">{{ old('address.ch', $contact->address['ch'] ?? '') }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('address.ch')" />
                    </div>
                </div>
            </div>

            <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="email" class="block text-sm font-medium text-[#401457]">Email</label>
                    <input value="{{ old('email', $contact->email) }}" type="text" name="email"id="email"
                        class="mt-1 block w-full p-2 border rounded-md focus:ring-[#401457] focus:border-[#401457] text-[#401457] text-sm">
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
                </div>
                <div>
                    <label for="phone_number" class="block text-sm font-medium text-[#401457]">Phone Number</label>
                    <input value="{{ old('phone_number', $contact->phone_number) }}" type="text" name="phone_number"
                        id="phone_number"
                        class="mt-1 block w-full p-2 border rounded-md focus:ring-[#401457] focus:border-[#401457] text-[#401457] text-sm">
                    <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
                </div>
                <div>
                    <label for="facebook_link" class="block text-sm font-medium text-[#401457]">Facebook</label>
                    <input value="{{ old('facebook_link', $contact->facebook_link) }}" type="text"
                        name="facebook_link" id="facebook_link"
                        class="mt-1 block w-full p-2 border rounded-md focus:ring-[#401457] focus:border-[#401457] text-[#401457] text-sm">
                    <x-input-error class="mt-2" :messages="$errors->get('facebook_link')" />
                </div>
                <div>
                    <label for="ig_link" class="block text-sm font-medium text-[#401457]">Instagram</label>
                    <input value="{{ old('ig_link', $contact->ig_link) }}" type="text" name="ig_link" id="ig_link"
                        class="mt-1 block w-full p-2 border rounded-md focus:ring-[#401457] focus:border-[#401457] text-[#401457] text-sm">
                    <x-input-error class="mt-2" :messages="$errors->get('ig_link')" />
                </div>
                <div>
                    <label for="tiktok_link" class="block text-sm font-medium text-[#401457]">Tiktok</label>
                    <input value="{{ old('tiktok_link', $contact->tiktok_link) }}" type="text" name="tiktok_link"
                        id="tiktok_link"
                        class="mt-1 block w-full p-2 border rounded-md focus:ring-[#401457] focus:border-[#401457] text-[#401457] text-sm">
                    <x-input-error class="mt-2" :messages="$errors->get('tiktok_link')" />
                </div>
                <div>
                    <label for="telegram_link" class="block text-sm font-medium text-[#401457]">Telegram</label>
                    <input value="{{ old('telegram_link', $contact->telegram_link) }}" type="text"
                        name="telegram_link" id="telegram_link"
                        class="mt-1 block w-full p-2 border rounded-md focus:ring-[#401457] focus:border-[#401457] text-[#401457] text-sm">
                    <x-input-error class="mt-2" :messages="$errors->get('telegram_link')" />
                </div>
                <div>
                    <label for="linkedin_link" class="block text-sm font-medium text-[#401457]">LinkedIn</label>
                    <input value="{{ old('linkedin_link', $contact->linkedin_link) }}" type="text"
                        name="linkedin_link" id="linkedin_link"
                        class="mt-1 block w-full p-2 border rounded-md focus:ring-[#401457] focus:border-[#401457] text-[#401457] text-sm">
                    <x-input-error class="mt-2" :messages="$errors->get('linkedin_link')" />
                </div>
            </div>

            <div>
                <h1 class="text-[#401457]">Icon</h1>
                <label for="dropzone-icon{{ $contact->id }}" id="drop-area-icon"
                    class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50">
                    <div id="icon-preview" style="background-image: url({{ asset($contact->icon) }})"
                        class="flex flex-col items-center justify-center pt-5 pb-6 w-full h-full bg-contain bg-center bg-no-repeat rounded-md text-center">
                        <p class="mb-2 text-[12px] sm:text-[14px] text-[#000]">
                            <span class="font-semibold">Click to upload</span> or drag and drop
                        </p>
                        <p class="text-xs text-[#000]">SVG, PNG, JPG or GIF (MAX. 5MB)</p>
                    </div>
                    <input id="dropzone-icon{{ $contact->id }}" type="file" class="hidden" name="icon"
                        accept="image/*" onchange="uploadIcon(event)" />
                </label>
                <x-input-error class="mt-2" :messages="$errors->get('icon')" />
            </div>

            <div class="flex justify-between">
                <a href="{{ route('contact-us.index') }}"
                    class="border border-[#401457] hover:!bg-[#401457] hover:!text-[#ffffff] px-4 py-1 md:px-6 rounded-[5px] text-[#401457]">
                    Back
                </a>

                <button type="submit" class="bg-[#401457] text-white px-4 py-1 md:px-6 rounded-[5px]">Submit</button>
            </div>
        </form>
    </div>

    <script>
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
