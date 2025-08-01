@extends('frontends.layouts.master')
@section('content')
    @include('frontends.components.loading')
    @include('frontends.components.scroll-top-button')


    <section class="w-full bg-[#f8efff] relative">
        <div class="w-full max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 items-center py-10 lg:px-10">
            <div class="flex items-end justify-center order-2 md:order-none pt-6 md:mt-0" data-aos="fade-up" data-aos-duration="1000">
                <img src="{{ asset($hero->icon) }}" alt="" class="w-[50%]" loading="lazy">
            </div>

            <div class="px-4 text-[#401457] order-1 md:order-none" data-aos="fade-left" data-aos-duration="1000">
                <h1 class="text-[30px] md:text-[50px] uppercase lg:leading-[55px]">{{ $hero->title[app()->getLocale()] }}</h1>
                <div class="prose my-4">
                    {!! $hero->content[app()->getLocale()] !!}
                </div>

                <a href="https://docs.google.com/forms/d/e/1FAIpQLScVamkswJpHoulIwjaWxB1_QL_RkVIg3Xd8gfrGkCyWESmzGQ/viewform?usp=header"
                    class="inline-flex items-center gap-4 px-4 py-2 mt-2 uppercase bg-[#401457] rounded-full">
                    <span class="font-[600] text-[#fff]">{{ __('messages.book_now') }}</span>
                    <span class="bg-[#fff] w-8 h-8 rounded-full flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                            stroke="#401457" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M7 7l5 5l-5 5" />
                            <path d="M13 7l5 5l-5 5" />
                        </svg>
                    </span>
                </a>
            </div>
        </div>
    </section>

    <hr class="bg-[#401457] border-[#401457] border-b-0 my-10 max-w-7xl mx-auto">

    <div class="py-20">
        @foreach ($client as $item)
            @php
                $images = is_array($item->image) ? $item->image : json_decode($item->image, true) ?? [];
            @endphp

            <section class="w-full max-w-7xl mx-auto mb-6" x-data="{ showAll: false, loading: false }">
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 items-center justify-center gap-10 px-2">
                    @foreach ($images as $index => $img)
                        <div x-show="showAll || {{ $index }} < 10" class="relative w-full flex items-center justify-center transition-all duration-200" data-aos="fade-up" data-aos-duration="1000">
                            <img src="{{ asset($img) }}" alt="Client Image"
                                class="w-32 h-32 object-contain rounded shadow" loading="lazy">
                        </div>
                    @endforeach
                </div>

                @if (count($images) > 10)
                    <div class="text-center mt-10">
                        <template x-if="!loading">
                            <button @click="loading = true; setTimeout(() => { showAll = !showAll; loading = false }, 500)"
                                class="px-4 py-2 bg-[#401457] text-white rounded hover:bg-[#572469] transition">
                                <span x-show="!showAll">Many More</span>
                                <span x-show="showAll">Show Less</span>
                            </button>
                        </template>

                        <template x-if="loading">
                            <div class="flex justify-center items-center gap-2 text-[#401457] font-medium">
                                <svg class="animate-spin w-5 h-5 text-[#401457]" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8v4l3-3-3-3v4a8 8 0 00-8 8h4z"></path>
                                </svg>
                                Loading...
                            </div>
                        </template>
                    </div>
                @endif
            </section>
        @endforeach
    </div>
@endsection
