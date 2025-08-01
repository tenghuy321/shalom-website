@extends('frontends.layouts.master')
@section('content')
    @include('frontends.components.loading')
    @include('frontends.components.scroll-top-button')
    {{-- hero --}}
    <section class="w-full bg-[#f8efff] relative">
        <div class="w-full max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 pt-10 lg:px-10">
            <div class="px-4 sm:px-20 lg:px-10 xl:px-20 lg:col-span-8 text-[#401457]" data-aos="fade-right"
                data-aos-duration="1000">
                <h1
                    class="text-[30px] md:text-[50px] text-center uppercase leading-[30px] sm:leading-[45px] lg:leading-[55px]">
                    {{ $hero->title[app()->getLocale()] }}</h1>

                <div
                    class="flex flex-col md:flex-row items-center lg:items-start pt-6 gap-4 lg:gap-10 text-[13px] xl:text-[15px]">
                    <img src="{{ asset($hero->icon) }}" alt="" class="w-40 h-auto">
                    <div class="pt-2 lg:pt-4 pb-4">
                        <div class="prose">
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
                        {{-- <div x-data="bookingFormHandler()">
                            <!-- Book Now Button -->
                            <a href="#" @click.prevent="showForm = true"
                                class="inline-flex items-center gap-4 px-4 py-2 mt-2 uppercase bg-[#401457] rounded-full">
                                <span class="font-[600] text-[#fff]">Book Now</span>
                                <span class="bg-[#fff] w-8 h-8 rounded-full flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24"
                                        fill="none" stroke="#401457" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M7 7l5 5l-5 5" />
                                        <path d="M13 7l5 5l-5 5" />
                                    </svg>
                                </span>
                            </a>

                            <!-- Include modal (has access to showForm now) -->
                            @include('frontends.components.book-now', ['services' => $services])
                        </div> --}}
                    </div>
                </div>
            </div>

            <div class="flex items-end justify-center lg:col-span-4 pt-4 lg:pt-0" data-aos="fade-up"
                data-aos-duration="1000">
                <img src="{{ asset($hero->image) }}" alt="" class="w-[90%] sm:w-[70%] lg:w-full">
            </div>
        </div>
    </section>

    {{-- service --}}
    <section class="w-full max-w-7xl mx-auto px-4 sm:px-10 pt-4 text-[#401457]">
        <h1 class="text-[16px] xl:text-[20px]" data-aos="fade-right" data-aos-duration="1000">{{ __('messages.what_we_do') }}</h1>
        <hr class="my-2 border border-b-[#401457]" data-aos="fade-right" data-aos-duration="1000">
        <h1 class="text-[22px] xl:text-[30px]" data-aos="fade-right" data-aos-duration="1000">{{ $heroes->title[app()->getLocale()] }}</h1>

        <div class="w-full flex flex-wrap items-stretch justify-center gap-4 py-10">

            @foreach ($services as $index => $service)
                <div class="w-full md:w-[calc(50%-1rem)] lg:w-[calc(33.333333%-1rem)] border border-[#401457] p-2"
                    data-aos="fade-up" data-aos-duration="1000">
                    <div class="w-full h-full border border-dashed border-[#401457]">
                        <div
                            class="w-full h-full border border-dashed p-2 text-center text-[#401457] text-[13px] xl:text-[15px] flex flex-col justify-between">

                            <div class="flex-1">
                                <h1 class="font-[600]">{{ $service->title[app()->getLocale()] }}</h1>

                                <div class="flex items-center gap-2 text-justify py-2">
                                    <img src="{{ asset($service->icon) }}" alt="" class="w-20 xl:w-28 h-auto"
                                        loading="lazy">
                                    @if (!empty($service->content_display))
                                        <div class="px-2 prose">
                                            {!! $service->content_display[app()->getLocale()] !!}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <a class="py-2 w-full block border-2 border-[#401457] rounded-md hover:bg-[#401457] hover:text-[#fff]"
                                href="{{ route('service-details', ['slug' => $service->slug]) }}">
                                {{ __('messages.more_details') }}
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- trust --}}
    <section class="w-full bg-[#401457] py-10">
        <div class="w-full max-w-7xl mx-auto px-2 text-[#fff] font-[600]" data-aos="fade-right" data-aos-duration="1000">
            <h1 class="text-[16px] xl:text-[20px]">{{ __('messages.trusted_by_clients') }}</h1>

            <div
                class="flex flex-col sm:flex-row items-start sm:items-center pt-6 gap-6 md:gap-10 text-[13px] xl:text-[15px]">
                <img src="{{ asset('assets/images/home/icon-3.png') }}" alt="" class="w-20 h-auto" loading="lazy">
                <p>{{ __('messages.trusted_by_clients_details') }}</p>
            </div>
        </div>
    </section>

    {{-- team --}}
    <section class="w-full py-10">
        <div class="w-full max-w-7xl mx-auto px-2 text-[#401457]">
            <h1 class="text-[16px] xl:text-[20px]" data-aos="fade-right" data-aos-duration="1000">{{ __('messages.meet_our_team') }}</h1>
            <div class="flex flex-col items-center pt-6 gap-10" data-aos="fade-up" data-aos-duration="1000">
                <img src="{{ asset('assets/images/home/image-1.png') }}" alt="" class="w-full md:w-[50%] h-auto"
                    loading="lazy">
                <p class="text-[22px] xl:text-[30px] uppercase text-center bg-[#f8efff] px-6 py-4 rounded-md">“{{ __('messages.WE SUPPORT PROFESSIONALLY') }}”</p>
            </div>
        </div>
    </section>

    {{-- get start --}}
    <section class="bg-[#401457] py-10 px-4 relative overflow-visible">
        <div class="max-w-4xl mx-auto relative">
            <div class="text-center text-white mb-4" data-aos="fade-up">
                <h2 class="text-[22px] xl:text-[30px] font-semibold">{{ __('messages.Getting Started is Easy.') }}</h2>
                <a href="https://docs.google.com/forms/d/e/1FAIpQLScVamkswJpHoulIwjaWxB1_QL_RkVIg3Xd8gfrGkCyWESmzGQ/viewform?usp=header"
                    class="inline-flex items-center gap-4 px-4 py-2 mt-2 uppercase bg-[#fff] rounded-full">
                    <span class="font-[600] text-[#401457]">{{ __('messages.book_now') }}</span>
                    <span class="bg-[#401457] w-8 h-8 rounded-full flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                            stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M7 7l5 5l-5 5" />
                            <path d="M13 7l5 5l-5 5" />
                        </svg>
                    </span>
                </a>
            </div>

            <div
                class="bg-[#fff] pt-4 px-2 lg:pt-0 rounded-lg flex flex-col md:flex-row items-center relative overflow-visible">
                <!-- Text Section -->
                <div class="text-[#401457] text-center w-full h-full flex flex-col items-center justify-center"
                    data-aos="fade-right">
                    <p class="text-[16px] xl:text-[20px] font-medium">{{ __('messages.Don’t know where to start?') }}</p>
                    <h1 class="text-[22px] xl:text-[30px] font-bold mb-2">{{ __('messages.Book a free consultation today.') }}</h1>
                    <p class="text-[13px] xl:text-[15px] max-w-sm mx-auto">
                        {{ __('messages.get_start_details') }}
                    </p>
                </div>

                <!-- Image (floats outside on large screens) -->
                <div class="relative mt-6 md:-mt-[4rem] md:ml-auto" data-aos="fade-up">
                    <img src="{{ asset('assets/images/home/image-2.png') }}" alt="Consulting Person"
                        class="w-40 sm:w-52 md:w-60 xl:w-72 " />
                </div>
            </div>
        </div>
    </section>

    {{-- faqs and Get in Touch! --}}
    <section class="w-full max-w-7xl mx-auto px-2 py-10 text-[#401457] overflow-hidden">
        <h1 class="text-[25px] xl:text-[30px] font-[700]" data-aos="fade-right">{{ $faq->title[app()->getLocale()] }}</h1>
        <div class="w-full max-w-5xl py-2" data-aos="fade-right" x-data="{ open: null }">
            {{-- @foreach ($faqs as $faq)
                <div class="collapse collapse-arrow text-[13px] lg:text-[16px] xl:text-[18px]">
                    <input type="radio" name="my-accordion-2" {{ $faq->id==1 ? 'checked' : '' }} />
                    <div class="collapse-title font-semibold">Q: {{ $faq->question[app()->getLocale()] }}</div>
                    <div class="collapse-content flex items-start gap-2"><span class="font-semibold">A:</span> {!! $faq->answer[app()->getLocale()] !!}</div>
                </div>
            @endforeach --}}
            @foreach ($faqs as $faq)
                <div class="mb-2 border rounded shadow-sm text-[13px] lg:text-[16px] xl:text-[18px]">
                    <button @click="open === {{ $faq->id }} ? open = null : open = {{ $faq->id }}"
                        class="w-full flex justify-between text-start items-start md:items-center p-4 font-medium">
                        <span>{{ __('messages.Q') }}: {{ $faq->question[app()->getLocale()] }}</span>
                        <div>
                            <svg x-show="open === {{ $faq->id }}" class="w-5 h-5 transform rotate-180"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 15l7-7 7 7" />
                            </svg>
                            <svg x-show="open !== {{ $faq->id }}" class="w-5 h-5" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </button>
                    <div x-show="open === {{ $faq->id }}" x-collapse class="flex items-start gap-2 p-4 text-[13px] lg:text-[16px] xl:text-[18px]">
                        <span class="font-semibold ">{{ __('messages.A') }}:</span> {!! $faq->answer[app()->getLocale()] !!}
                    </div>
                </div>
            @endforeach

        </div>
        <h1 class="text-[25px] xl:text-[30px] font-[700]" data-aos="fade-right">{{ $get->title[app()->getLocale()] }}</h1>
        <ul class="ml-4 list-disc py-2 text-[13px] xl:text-[15px]" data-aos="fade-right">
            <li>{{ __('messages.email') }}: <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $contacts->email }}"
                    class="">{{ $contacts->email }}</a></li>
            <li>{{ __('messages.phone') }}: <a href="tel:{{ $contacts->phone_number }}"
                    class="">{{ $contacts->phone_number }}</a>
            </li>
            <li>{{ __('messages.hour') }}: {{ __('messages.hour_detail') }}</li>
            <li>{{ __('messages.address') }}: {{ $contacts->address[app()->getLocale()] }}</li>
        </ul>


        {{-- map --}}
        <div class="w-full flex items-center justify-center pt-10" data-aos="fade-up">
            <iframe class="w-[500px] h-[300px] border border-[#401457] rounded-md"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3908.699809070842!2d104.8924538!3d11.5733645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31095100657a342d%3A0xaaf5c8d71d6e29ae!2sShalom%20Solution%20Co.%2C%20Ltd.!5e0!3m2!1sen!2skh!4v1752025323324!5m2!1sen!2skh"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

    </section>
@endsection
