<x-app-layout>
    <div class="max-w-7xl mx-auto bg-white shadow-md rounded-lg p-6 my-2">
        <h2 class="text-2xl font-bold text-[#401457]">Edit Hero Banner</h2>
        <form action="{{ route('faq.update', $faq->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PATCH')
            @component('admin.components.alert')
            @endcomponent

            <div class="w-full grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="p-0 space-y-4">
                    <h1 class="text-[20px] font-[600] text-[#401457] uppercase">English</h1>
                    <div>
                        <label for="question_en" class="block text-sm font-medium text-[#401457]">Question</label>
                        <input value="{{ old('question.en', $faq->question['en'] ?? '') }}" type="text" name="question[en]"
                            id="question_en" class="mt-1 block w-full p-2 border rounded-md text-[#401457] text-sm">
                        <x-input-error class="mt-2" :messages="$errors->get('question.en')" />
                    </div>
                    <div>
                        <label for="answer_en" class="block text-sm font-medium text-[#401457]">Answer</label>
                        <textarea name="answer[en]" id="answer_en" rows="6"
                            class="mt-1 block w-full p-2 border rounded-md text-[#401457] text-[12px]">{{ old('answer.en', $faq->answer['en'] ?? '') }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('answer.en')" />
                    </div>
                </div>

                <div class="p-0 space-y-4">
                    <h1 class="text-[20px] font-[600] text-[#401457] uppercase">Khmer</h1>
                    <div>
                        <label for="question_kh" class="block text-sm font-medium text-[#401457]">Question</label>
                        <input value="{{ old('question.kh', $faq->question['kh'] ?? '') }}" type="text" name="question[kh]"
                            id="question_kh" class="mt-1 block w-full p-2 border rounded-md text-[#401457] text-sm">
                        <x-input-error class="mt-2" :messages="$errors->get('question.kh')" />
                    </div>
                    <div>
                        <label for="answer_kh" class="block text-sm font-medium text-[#401457]">Answer</label>
                        <textarea name="answer[kh]" id="answer_kh" rows="6"
                            class="mt-1 block w-full p-2 border rounded-md text-[#401457] text-[12px]">{{ old('answer.kh', $faq->answer['kh'] ?? '') }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('answer.kh')" />
                    </div>
                </div>

                <div class="p-0 space-y-4">
                    <h1 class="text-[20px] font-[600] text-[#401457] uppercase">Chinese</h1>
                    <div>
                        <label for="question_ch" class="block text-sm font-medium text-[#401457]">Question</label>
                        <input value="{{ old('question.ch', $faq->question['ch'] ?? '') }}" type="text" name="question[ch]"
                            id="question_ch" class="mt-1 block w-full p-2 border rounded-md text-[#401457] text-sm">
                        <x-input-error class="mt-2" :messages="$errors->get('question.ch')" />
                    </div>
                    <div>
                        <label for="answer_ch" class="block text-sm font-medium text-[#401457]">Answer</label>
                        <textarea name="answer[ch]" id="answer_ch" rows="6"
                            class="mt-1 block w-full p-2 border rounded-md text-[#401457] text-[12px]">{{ old('answer.ch', $faq->answer['ch'] ?? '') }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('answer.ch')" />
                    </div>
                </div>
            </div>

            <div class="flex justify-between">
                <a href="{{ route('faq.index') }}"
                    class="border border-[#401457] hover:!bg-[#401457] hover:!text-[#ffffff] px-4 py-1 md:px-6 rounded-[5px] text-[#401457]">
                    Back
                </a>

                <button type="submit" class="bg-[#401457] text-white px-4 py-1 md:px-6 rounded-[5px]">Submit</button>
            </div>
        </form>
    </div>

    <script>
        ClassicEditor
            .create(document.querySelector('#answer_en')).catch(console.error);
        ClassicEditor
            .create(document.querySelector('#answer_kh')).catch(console.error);
        ClassicEditor
            .create(document.querySelector('#answer_ch')).catch(console.error);
    </script>
</x-app-layout>
