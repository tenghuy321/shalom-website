@extends('frontends.layouts.master')

@section('content')
    @include('frontends.components.loading')
    @include('frontends.components.scroll-top-button')

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <section class="w-full bg-[#f8efff] relative">
        <div class="w-full max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 items-center pt-10 lg:px-10 overflow-hidden">
            <div class="px-4 lg:px-10 text-[#401457]" data-aos="fade-right" data-aos-duration="1000">
                <h2 class="text-[22px] xl:text-[30px]">what we do</h2>
                <h1 class="text-[30px] md:text-[50px] uppercase lg:leading-[55px]">
                    {{ $hero->title[app()->getLocale()] }}
                </h1>

                <a href="https://docs.google.com/forms/d/e/1FAIpQLScVamkswJpHoulIwjaWxB1_QL_RkVIg3Xd8gfrGkCyWESmzGQ/viewform?usp=header"
                    class="inline-flex items-center gap-4 px-4 py-2 mt-2 uppercase bg-[#401457] rounded-full">
                    <span class="font-[600] text-[#fff]">Book Now</span>
                    <span class="bg-[#fff] w-8 h-8 rounded-full flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                            stroke="#401457" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M7 7l5 5l-5 5" />
                            <path d="M13 7l5 5l-5 5" />
                        </svg>
                    </span>
                </a>
            </div>

            <div class="flex items-end justify-center pt-4 lg:pt-0" data-aos="fade-up" data-aos-duration="1000">
                <img src="{{ asset('assets/images/people-2.png') }}" alt="" class="w-[90%] sm:w-[70%] lg:w-[80%]">
            </div>
        </div>
    </section>

    <hr class="bg-[#401457] border-[#401457] border-b-0 my-10 max-w-7xl mx-auto">

    <div class="mt-6 px-2 sm:px-5 md:px-10 pt-10" data-aos="fade-right" data-aos-duration="1000">
        <a href="{{ route('service') }}"
            class="text-[#401457] border border-[#401457] px-4 py-2 rounded-md hover:bg-[#401457] hover:text-[#fff] duration-300">
            ← Back to Services
        </a>
    </div>

    <div class="py-10 md:py-20 px-2 sm:px-5 md:px-10" x-data="{ selected: '{{ $service->id }}' }">
        <div class="mb-6 p-0 md:p-4 rounded-md shadow-sm lg:col-span-1 overflow-hidden">
            <h1 class="text-[22px] xl:text-[30px] text-[#401457] mb-4">All Services</h1>
            <ul class="flex flex-nowrap lg:flex-wrap gap-4 overflow-x-auto lg:overflow-visible lg:justify-center"
                data-aos="fade-up" data-aos-duration="1000">
                @foreach ($services as $item)
                    <li class="text-[13px] xl:text-[15px] shrink-0 lg:shrink">
                        <button @click="selected = '{{ $item->id }}'"
                            class="block w-full px-4 py-2 rounded-md transition-all duration-300"
                            :class="selected == '{{ $item->id }}'
                                ? 'font-[600] text-[#fff] bg-[#401457]'
                                : 'text-[#401457] hover:bg-[#401457] hover:text-[#fff]'">
                            {{ $item->full_title[app()->getLocale()] }}
                        </button>
                    </li>
                @endforeach
            </ul>
        </div>

        @foreach ($services as $item)
            <div x-show="selected == '{{ $item->id }}'" x-cloak x-transition
                class="p-0 grid lg:grid-cols-2 gap-4 overflow-hidden mt-10">
                <div class="mb-4" data-aos="fade-right" data-aos-duration="1000">
                    <img src="{{ asset($item->image) }}" alt=""
                        class="w-[90%] mx-auto md:w-[600px] md:h-auto rounded-md shadow-md">
                </div>

                <div data-aos="fade-left" data-aos-duration="1000">
                    <h1 class="text-[22px] xl:text-[30px] font-[600] text-[#401457] mb-4">
                        {{ $item->full_title[app()->getLocale()] }}
                    </h1>
                    <div class="prose max-w-none text-[#401457]">
                        {!! $item->content[app()->getLocale()] !!}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
