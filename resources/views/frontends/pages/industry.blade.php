@extends('frontends.layouts.master')
@section('content')

    @include('frontends.components.loading')
    @include('frontends.components.scroll-top-button')


    <section class="w-full bg-[#f8efff] relative">
        <div class="w-full max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 items-center py-10 lg:px-10 overflow-hidden">
            <div class="flex items-end justify-center order-2 md:order-none pt-6 md:mt-0" data-aos="fade-up" data-aos-duration="1000">
                <img src="{{ asset($hero->icon) }}" alt="" class="w-[50%]" loading="lazy">
            </div>

            <div class="px-4 text-[#401457] order-1 md:order-none" data-aos="fade-left" data-aos-duration="1000">
                <h1 class="text-[30px] md:text-[50px] uppercase lg:leading-[55px]">{{ $hero->title[app()->getLocale()] }}</h1>
                <div class="my-4">
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

    <section class="w-full relative pb-10">
        <div class="w-full max-w-7xl mx-auto text-[#401457] px-2">
            <h1 class="text-[30px] md:text-[50px] uppercase lg:leading-[55px]" data-aos="fade-right" data-aos-duration="1000">INDUSTRIES</h1>
            <div class="w-full flex flex-wrap items-stretch justify-center gap-4 py-10">
                @foreach ($industries as $item)
                    <div class="w-full md:w-[calc(50%-1rem)] lg:w-[calc(33.333333%-1rem)] border border-[#401457] p-2" data-aos="fade-up" data-aos-duration="1000">
                        <div class="w-full h-full border border-dashed border-[#401457]">
                            <div
                                class="w-full h-full border border-dashed p-4 text-center text-[#401457] flex flex-row items-center justify-between gap-4">
                                <img src="{{ asset($item->icon) }}" alt="" class="w-20 xl:w-28 h-auto" loading="lazy">
                                <h1 class="text-[16px] xl:text-[20px] font-semibold">
                                    {{ $item->title[app()->getLocale()] }}
                                </h1>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
@endsection
