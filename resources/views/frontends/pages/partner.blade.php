@extends('frontends.layouts.master')
@section('content')

    @include('frontends.components.loading')
    @include('frontends.components.scroll-top-button')


    <section class="w-full bg-[#f8efff] relative">
        <div class="w-full max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 items-center py-10 lg:px-10 overflow-hidden">
            <div class="flex items-end justify-center order-2 md:order-none pt-6 md:mt-0" data-aos="fade-up" data-aos-duration="1000">
                <img src="{{ asset($hero->image) }}" alt="" class="w-[70%] lg:w-[80%]" loading="lazy">
            </div>

            <div class="px-4 text-[#401457] order-1 md:order-none" data-aos="fade-left" data-aos-duration="1000">
                <h1 class="text-[30px] md:text-[50px] uppercase lg:leading-[55px]">{{ $hero->title[app()->getLocale()] }}</h1>

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


    <section class="w-full ">
        @foreach ($partner as $item)
            @if ($item->order % 2 === 1)
                <div class="w-full max-w-7xl mx-auto">
                    <div class="flex items-center justify-center py-6 md:py-10 gap-4 md:gap-20 overflow-hidden" data-aos="fade-up" data-aos-duration="1000">
                        <img src="{{ asset($item->our_logo) }}" alt="" class="w-12 h-auto md:w-20 md:h-auto" loading="lazy">
                        <p class="text-[13px] xl:text-[15px] font-[600]">and</p>
                        <img src="{{ asset($item->partner_logo) }}" alt="" class="w-12 h-auto md:w-20 md:h-auto" loading="lazy">
                    </div>
                </div>

                <div class="w-full bg-[#401457] my-5">
                    <div
                        class="w-full max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 items-start gap-4 md:gap-10 py-6 md:py-10 px-2 text-[#fff] overflow-hidden">
                        <div data-aos="fade-right" data-aos-duration="1000">
                            <h1 class="text-[16px] xl:text-[20px] font-[600]">{{ $item->title[app()->getLocale()] }}</h1>
                            <div class="prose pt-6 md:pt-10 text-justify">
                                {!! $item->content[app()->getLocale()] !!}
                            </div>
                        </div>

                        <div class="flex flex-col items-center" data-aos="fade-left" data-aos-duration="1000">
                            <img src="{{ asset($item->image) }}" alt="" class="w-full h-auto" loading="lazy">
                            <p class="text-[13px] xl:text-[15px] text-[#fff] italic pt-2 font-[600]">
                                {{ $item->date[app()->getLocale()] }}</p>
                        </div>
                    </div>
                </div>
            @else
                <div class="w-full max-w-7xl mx-auto">
                    <div class="flex items-center justify-center py-6 md:py-10 gap-4 md:gap-20 overflow-hidden" data-aos="fade-up" data-aos-duration="1000">
                        <img src="{{ asset($item->our_logo) }}" alt="" class="w-12 h-auto md:w-20 md:h-auto">
                        <p class="text-[13px] xl:text-[15px] font-[600]">and</p>
                        <img src="{{ asset($item->partner_logo) }}" alt="" class="w-12 h-auto md:w-20 md:h-auto">
                    </div>
                </div>

                <div class="w-full bg-[#401457] my-5">
                    <div
                        class="w-full max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 items-start gap-4 md:gap-10 py-6 md:py-10 px-2 text-[#fff] overflow-hidden">
                        <div class="flex flex-col items-center" data-aos="fade-right" data-aos-duration="1000">
                            <img src="{{ asset($item->image) }}" alt="" class="w-full h-auto" loading="lazy">
                            <p class="text-[13px] xl:text-[15px] text-[#fff] italic pt-2 font-[600]">
                                {{ $item->date[app()->getLocale()] }}</p>
                        </div>

                        <div data-aos="fade-left" data-aos-duration="1000">
                            <h1 class="text-[16px] xl:text-[20px] font-[600]">{{ $item->title[app()->getLocale()] }}</h1>
                            <div class="prose pt-6 md:pt-10 text-justify">
                                {!! $item->content[app()->getLocale()] !!}
                            </div>
                        </div>

                    </div>
                </div>
            @endif
        @endforeach
    </section>
@endsection
