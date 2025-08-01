@extends('frontends.layouts.master')
@section('content')
    @include('frontends.components.loading')
    @include('frontends.components.scroll-top-button')

    {{-- hero --}}
    <section class="w-full bg-[#f8efff] relative py-10">
        <div class="w-full max-w-7xl mx-auto px-4" data-aos="fade-right" data-aos-duration="1000">
            <h1 class="text-[30px] md:text-[50px] text-center uppercase leading-[30px] lg:leading-[55px] text-[#401457]">
                {{ $hero->title[app()->getlocale()] }}</h1>
            <div class="flex items-center justify-center md:justify-end">
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

    {{-- mission & vision --}}
    <section class="w-full max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-20 py-4 md:py-10 px-4 lg:px-10 overflow-hidden">
            <div class="flex flex-col items-start gap-4 text-[13px] xl:text-[15px] text-[#401457]" data-aos="fade-right" data-aos-duration="1000">
                <h1 class="text-[22px] xl:text-[30px] uppercase leading-[30px]">{{ $mission->title[app()->getLocale()] }}
                </h1>

                <div class="pt-4 flex items-center gap-4 text-justify">
                    <img src="{{ asset($mission->icon) }}" alt="" class="w-20 h-auto" loading="lazy">
                    <div class="prose">
                        {!! $mission->content[app()->getLocale()] !!}
                    </div>
                </div>
            </div>
            <div class="flex flex-col items-start gap-4 text-[13px] xl:text-[15px] text-[#401457]" data-aos="fade-left" data-aos-duration="1000">
                <h1 class="text-[22px] xl:text-[30px] uppercase leading-[30px]">{{ $vision->title[app()->getLocale()] }}
                </h1>

                <div class="pt-4 flex items-center gap-4 text-justify">
                    <img src="{{ asset($vision->icon) }}" alt="" class="w-20 h-auto" loading="lazy">
                    <div class="prose">
                        {!! $vision->content[app()->getLocale()] !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Core values --}}
    <section class="w-full bg-[#401457] py-10 text-[#fff] px-4 md:px-10 overflow-hidden">
        <div class="w-full max-w-7xl mx-auto" data-aos="fade-right" data-aos-duration="1000">
            <h1 class="text-[22px] xl:text-[30px] uppercase leading-[30px]">{{ $core->title[app()->getLocale()] }}</h1>

            <div class="flex flex-col md:flex-row items-center gap-10 text-[14px] xl:text-[16px] py-5">
                <div class="text-[14px] xl:text-[16px] text-justify">
                    {!! $core->content[app()->getLocale()] !!}
                </div>

                <img src="{{ asset($core->icon) }}" alt="" class="w-40 h-auto order-1 md:order-none" loading="lazy">
            </div>
        </div>

    </section>

    {{-- team --}}
    <section class="w-full py-10 text-[#401457] px-4 md:px-10">
        <div class="w-full max-w-7xl mx-auto">
            @foreach ($team as $item)
                <div class="grid grid-cols-1 lg:grid-cols-3 items-start justify-center my-2 md:my-5 xl:my-10 bg-[#f8efff] overflow-hidden">
                    <div class="flex items-end justify-center w-full h-full" data-aos="fade-up" data-aos-duration="1000">
                        <img src="{{ asset($item->image) }}" alt="" class="w-[80%] h-auto">
                    </div>

                    <div class="col-span-2 text-[13px] xl:text-[15px] p-4 text-justify" data-aos="fade-left" data-aos-duration="1000">
                        <h1 class="text-[22px] xl:text-[30px]">{{ $item->position[app()->getLocale()] }}</h1>
                        <div class="prose pt-4">{!! $item->content[app()->getLocale()] !!}</div>
                        <div class="pt-4 flex items-center gap-4">
                            <p class="py-2 px-4 bg-[#401457] text-[#fff] inline-flex rounded-md">
                                {{ $item->name[app()->getLocale()] }}</p>
                            @if (!empty($item->link))
                                <a href="{{ $item->link }}">
                                    <svg class="w-10 h-10" viewBox="0 0 200 200" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <rect width="200" height="200" fill="url(#pattern0_58_89)" />
                                        <defs>
                                            <pattern id="pattern0_58_89" patternContentUnits="objectBoundingBox"
                                                width="1" height="1">
                                                <use xlink:href="#image0_58_89" transform="scale(0.005)" />
                                            </pattern>
                                            <image id="image0_58_89" width="200" height="200"
                                                preserveAspectRatio="none"
                                                xlink:href="data:image/png;base64,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" />
                                        </defs>
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="flex flex-col items-center py-10 gap-10" data-aos="fade-up" data-aos-duration="1000">
                <img src="{{ asset('assets/images/home/image-1.png') }}" alt="" class="w-full md:w-[50%] h-auto">
                <p class="text-[22px] xl:text-[30px] uppercase text-center bg-[#f8efff] px-6 py-4 rounded-md">“{{ __('messages.WE SUPPORT PROFESSIONALLY') }}”</p>
            </div>
        </div>
    </section>

    {{-- certifical --}}
    <section class="w-full py-10 text-[#401457] px-4 md:px-10">
        <div class="w-full flex items-center justify-center max-w-4xl mx-auto" data-aos="fade-right" data-aos-duration="1000">
            @foreach ($certificates as $certificate)
                <img src="{{ asset($certificate->image) }}" alt="" class="w-[50%] h-auto" loading="lazy">
            @endforeach
        </div>
    </section>
@endsection
