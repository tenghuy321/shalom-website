@extends('frontends.layouts.master')
@section('content')

    @include('frontends.components.loading')
    @include('frontends.components.scroll-top-button')


    <section class="w-full bg-[#f8efff] relative">
        <div class="w-full max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 items-center pt-10 lg:px-10">
            <div class="px-2 lg:px-10 text-[#401457]" data-aos="fade-right" data-aos-duration="1000">
                <h2 class="text-[22px] xl:text-[30px]">what we do</h2>
                <hr class="bg-[#401457] border-[#401457] border-b-0 mb-10">
                <h1 class="text-[30px] md:text-[50px] uppercase lg:leading-[55px]">{{ $hero->title[app()->getLocale()] }}</h1>

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

    <section class="w-full max-w-7xl mx-auto px-4 sm:px-10 pt-4 text-[#401457]">
        <div class="w-full flex flex-wrap items-stretch justify-center gap-4 py-10" >
            @foreach ($services as $index => $service)
                <div class="w-full md:w-[calc(50%-1rem)] lg:w-[calc(33.333333%-1rem)] border border-[#401457] p-2" data-aos="fade-up" data-aos-duration="1000">
                    <div class="w-full h-full border border-dashed border-[#401457]">
                        <div
                            class="w-full h-full border border-dashed p-2 text-center text-[#401457] text-[13px] xl:text-[15px] flex flex-col justify-between">

                            <div class="flex-1">
                                <h1 class="font-[600]">{{ $service->title[app()->getLocale()] }}</h1>

                                <div class="flex items-center gap-2 text-justify py-2">
                                    <img src="{{ asset($service->icon) }}" alt="" class="w-20 xl:w-28 h-auto">
                                    @if (!empty($service->content_display))
                                        <div class="px-2 prose">
                                            {!! $service->content_display[app()->getLocale()] !!}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <a class="py-2 w-full block border-2 border-[#401457] rounded-md hover:bg-[#401457] hover:text-[#fff]"
                                href="{{ route('service-details', ['slug' => $service->slug]) }}">
                                More Detail
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
