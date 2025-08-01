@extends('frontends.layouts.master')
@section('css')
    <style>
        .swiper {
            width: 90%;
            height: 400px;
        }

        .swiper-slide {
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .swiper-pagination .swiper-pagination-bullet {
            background-color: #401457;
            width: 4px;
            height: 4px;
            border-radius: 50%;
            margin: 0 5px;
        }

        .swiper-pagination .swiper-pagination-bullet-active {
            width: 10px;
            height: 4px;
            border-radius: 10px;
            background-color: #401457;
        }

        @media (min-width: 1024px) and (max-width: 1279px) {
            .swiper {
                width: 90%;
                height: 340px;
            }
        }

        @media (min-width: 640px) and (max-width: 1023px) {
            .swiper {
                width: 60%;
                height: 340px;
            }
        }

        @media (max-width: 639px) {
            .swiper {
                width: 90%;
                height: 250px;
            }
        }
    </style>
@endsection
@section('content')
    @include('frontends.components.loading')
    @include('frontends.components.scroll-top-button')


    <section class="w-full bg-[#f8efff] relative">
        <div class="w-full max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 items-center py-10 lg:px-10 overflow-hidden">
            <div class="px-4 text-[#401457] order-1 md:order-none" data-aos="fade-right" data-aos-duration="1000">
                <h1 class="text-[30px] md:text-[50px] uppercase lg:leading-[55px]">{{ $hero->title[app()->getLocale()] }}
                </h1>

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

            <div class="flex items-end justify-center order-2 md:order-none pt-6 md:mt-0" data-aos="fade-up"
                data-aos-duration="1000">
                <img src="{{ asset($hero->icon) }}" alt="" class="w-[50%] lg:w-[60%]">
            </div>
        </div>
    </section>

    <hr class="bg-[#401457] border-[#401457] border-b-0 my-10 max-w-7xl mx-auto">

    <section class="w-full max-w-7xl mx-auto px-2 md:px-0">

        @foreach ($events as $index => $event)
            @php
                $images = is_array($event->image) ? $event->image : json_decode($event->image, true) ?? [];
            @endphp
            @if ($index + (1 % 2) === 1)
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 md:gap-6 items-center py-3 md:py-6">
                    <div class="bg-white p-2 md:p-6">
                        <h2 class="text-[22px] xl:text-[30px] text-[#401457] font-semibold mb-4">
                            {{ $event->title[app()->getLocale()] ?? '' }}
                        </h2>

                        <div class="prose text-[13px] xl:text-[15px] text-[#401457] mb-4 max-w-none text-justify">
                            {!! $event->content[app()->getLocale()] ?? '' !!}
                        </div>
                    </div>
                    <div class="swiper mySwiper">
                        @if (!empty($images))
                            <div class="swiper-wrapper">
                                @foreach ($images as $img)
                                    <div class="swiper-slide">
                                        <img src="{{ asset($img) }}" alt="Event image"
                                            class="w-full h-full object-contain rounded-md">
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                <hr class="bg-[#401457] border-[#401457] border-b-0 my-5 md:my-10 max-w-7xl mx-auto">
            @else
                <div class="grid grid-cols-1 lg:grid-cols-2 items-center gap-4 md:gap-6 py-3 md:py-6">
                    <div class="swiper mySwiper order-2 lg:order-none">
                        @if (!empty($images))
                            <div class="swiper-wrapper">
                                @foreach ($images as $img)
                                    <div class="swiper-slide">
                                        <img src="{{ asset($img) }}" alt="Event image"
                                            class="w-full h-full object-contain rounded-md">
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        <div class="swiper-pagination"></div>
                    </div>
                    <div class="bg-white p-2 md:p-6 order-1 lg:order-none">
                        <h2 class="text-[22px] xl:text-[30px] text-[#401457] font-semibold mb-4">
                            {{ $event->title[app()->getLocale()] ?? '' }}
                        </h2>

                        <div class="prose text-[13px] xl:text-[15px] text-[#401457] mb-4 max-w-none text-justify">
                            {!! $event->content[app()->getLocale()] ?? '' !!}
                        </div>
                    </div>
                </div>
                <hr class="bg-[#401457] border-[#401457] border-b-0 my-5 md:my-10 max-w-7xl mx-auto">
            @endif
        @endforeach

    </section>
@endsection
