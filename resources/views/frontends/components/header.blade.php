<style>
    [x-cloak] {
        display: none !important;
    }
</style>
<header class="">
    <div
        class="w-full h-[3rem] sm:h-[4rem] xl:h-[5rem] px-4 sm:px-6 xl:px-12 flex items-center justify-between bg-[#401457] text-[#fff] font-[400] text-[12px] xl:text-[14px] z-[100]">
        <h1 class="hidden lg:flex">{{ __('messages.contact_header') }} :</h1>

        <div class="hidden lg:flex items-center gap-10">
            <div class="flex items-center gap-10">
                <a href="{{ $contacts->phone_number }}">{{ __('messages.tel_header') }} {{ $contacts->phone_number }}</a>
                <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $contacts->email }}">{{ __('messages.email_header') }} {{ $contacts->email }}</a>
            </div>

            <div class="relative" x-data="{ open: false }">
                @php
                    $locale = session('locale', app()->getLocale());
                    $languages = [
                        'en' => ['label' => 'English', 'flag' => 'en_flag.jpg'],
                        'kh' => ['label' => 'Khmer', 'flag' => 'kh_flag.png'],
                        'ch' => ['label' => 'Chinese', 'flag' => 'ch_flag.png'],
                    ];
                @endphp

                <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none cursor-pointer">
                    <img src="{{ asset('assets/images/flag/' . $languages[$locale]['flag']) }}"
                        alt="{{ $languages[$locale]['label'] }}" class="w-8 h-5">
                    <span class="text-[12px] xl:text-[14px] ">{{ $languages[$locale]['label'] }}</span>

                    <svg :class="{ 'rotate-180': open, 'rotate-0': !open }"
                        class="w-4 h-4 text-[#fff] transition-transform duration-200" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <!-- Dropdown Menu -->
                <div x-show="open" @click.away="open = false" x-transition x-cloak
                    class="absolute mt-2 bg-white rounded shadow-md z-50 w-32 text-[#000]">
                    @foreach ($languages as $code => $lang)
                        @if ($code !== $locale)
                            <a href="{{ route('lang.switch', $code) }}"
                                class="flex items-center px-3 py-2 hover:bg-gray-300">
                                <img src="{{ asset('assets/images/flag/' . $lang['flag']) }}" alt="{{ $lang['label'] }}"
                                    class="w-6 h-4 mr-2">
                                <span class="text-[12px] xl:text-[14px] ">{{ $lang['label'] }}</span>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>


        {{-- mobile device --}}
        <div class="flex lg:hidden">
            <img src="{{ asset('assets/images/logo-white.png') }}" alt="" class="w-9 sm:w-12 h-auto">
        </div>

        <div x-data="{
            isopen: false,
            navigateAfterClose(url) {
                this.isopen = false;
                setTimeout(() => {
                    window.location.href = url;
                }, 300);
            }
        }" x-init="$watch('isopen', value => document.body.classList.toggle('overflow-hidden', value))" class ="flex lg:hidden">
            <button @click="isopen = !isopen" x-cloak class="w-10 h-10 flex items-center justify-center">
                <!-- Hamburger Icon -->
                <span :class="isopen ? 'opacity-0 scale-0' : 'opacity-100 scale-100'"
                    class="absolute transition duration-150 ease-in-out">
                    <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="#fff"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <line x1="3" y1="12" x2="21" y2="12" />
                        <line x1="3" y1="6" x2="21" y2="6" />
                        <line x1="3" y1="18" x2="21" y2="18" />
                    </svg>
                </span>

                <!-- Close Icon -->
                <span :class="isopen ? 'opacity-100 scale-100' : 'opacity-0 scale-0'"
                    class="absolute transition duration-150 ease-in-out">
                    <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="#fff"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                    </svg>
                </span>
            </button>

            {{-- <div x-show="isopen" x-cloak @click="isopen = false"
                class="fixed inset-0 bg-black bg-opacity-50 z-40 transition-opacity duration-150">
            </div> --}}


            <div x-show="isopen" x-cloak x-transition:enter="transition transform duration-150"
                x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
                x-transition:leave="transition transform duration-150 ease-in-out" x-transition:leave-start="translate-x-0"
                x-transition:leave-end="translate-x-full"
                class="fixed top-0 right-0 w-72 sm:w-96 h-[calc(100%-3rem)] sm:h-[calc(100%-4rem)] flex flex-col justify-between bg-[#401457] shadow z-50 p-4 sm:p-6 mt-[3rem] sm:mt-[4rem]">
                <ul class="space-y-2">
                    <li>
                        <button @click="navigateAfterClose('{{ route('home') }}')"
                            class="block w-full text-left px-2 py-2 text-[12px] uppercase rounded
                            {{ Route::is('home') ? 'text-[#401457] font-[700] bg-[#fff]' : 'text-[#fff] font-[400]' }}">
                            {{ __('messages.home') }}
                        </button>
                    </li>
                    <hr>
                    <li>
                        <button @click="navigateAfterClose('{{ route('about-us') }}')"
                            class="block w-full text-left px-2 py-2 text-[12px] uppercase rounded
                            {{ Route::is('about-us') ? 'text-[#401457] font-[700] bg-[#fff]' : 'text-[#fff] font-[400]' }}">
                            {{ __('messages.about') }}
                        </button>
                    </li>
                    <hr>
                    <li>
                        <button @click="navigateAfterClose('{{ route('service') }}')"
                            class="block w-full text-left px-2 py-2 text-[12px] uppercase rounded
                            {{ Route::is('service') ? 'text-[#401457] font-[700] bg-[#fff]' : 'text-[#fff] font-[400]' }}">
                            {{ __('messages.services') }}
                        </button>
                    </li>
                    <hr>
                    <li>
                        <button @click="navigateAfterClose('{{ route('our-partners') }}')"
                            class="block w-full text-left px-2 py-2 text-[12px] uppercase rounded
                            {{ Route::is('our-partners') ? 'text-[#401457] font-[700] bg-[#fff]' : 'text-[#fff] font-[400]' }}">
                            {{ __('messages.partners') }}
                        </button>
                    </li>
                    <hr>
                    <li>
                        <button @click="navigateAfterClose('{{ route('client') }}')"
                            class="block w-full text-left px-2 py-2 text-[12px] uppercase rounded
                            {{ Route::is('client') ? 'text-[#401457] font-[700] bg-[#fff]' : 'text-[#fff] font-[400]' }}">
                            {{ __('messages.clients') }}
                        </button>
                    </li>
                    <hr>
                    <li>
                        <button @click="navigateAfterClose('{{ route('industry') }}')"
                            class="block w-full text-left px-2 py-2 text-[12px] uppercase rounded
                            {{ Route::is('industry') ? 'text-[#401457] font-[700] bg-[#fff]' : 'text-[#fff] font-[400]' }}">
                            {{ __('messages.industries') }}
                        </button>
                    </li>
                    <hr>
                    <li>
                        <button @click="navigateAfterClose('{{ route('event') }}')"
                            class="block w-full text-left px-2 py-2 text-[12px] uppercase rounded
                            {{ Route::is('event') ? 'text-[#401457] font-[700] bg-[#fff]' : 'text-[#fff] font-[400]' }}">
                            {{ __('messages.event') }}
                        </button>
                    </li>
                    <hr>
                    <li>
                        <button @click="navigateAfterClose('{{ route('contact') }}')"
                            class="block w-full text-left px-2 py-2 text-[12px] uppercase rounded
                            {{ Route::is('contact') ? 'text-[#401457] font-[700] bg-[#fff]' : 'text-[#fff] font-[400]' }}">
                            {{ __('messages.contact') }}
                        </button>
                    </li>
                </ul>

                <div class="flex flex-col items-start gap-4">
                    <div>
                        @php
                            $locale = session('locale', app()->getLocale());
                            $languages = [
                                'en' => ['label' => 'ENG', 'flag' => 'en_flag.jpg'],
                                'kh' => ['label' => 'KH', 'flag' => 'kh_flag.png'],
                                'ch' => ['label' => 'CH', 'flag' => 'ch_flag.png'],
                            ];
                        @endphp

                        <h1 class="text-[14px] uppercase">Language</h1>
                        <div class="flex items-center space-x-1 focus:outline-none cursor-pointer pt-2">
                            @foreach ($languages as $code => $lang)
                                <button @click="navigateAfterClose('{{ route('lang.switch', $code) }}')"
                                    class="flex items-center px-3 py-2 hover:bg-gray-300 {{ $locale == $code ? 'bg-[#fff] text-[#000]' : 'text-[#fff]' }}">
                                    <img src="{{ asset('assets/images/flag/' . $lang['flag']) }}"
                                        alt="{{ $lang['label'] }}" class="w-6 h-4 mr-2">
                                    <span class="text-[12px] xl:text-[14px] ">{{ $lang['label'] }}</span>
                                </button>
                            @endforeach
                        </div>
                    </div>
                    <a href="{{ $contacts->phone_number }}">Tel: {{ $contacts->phone_number }}</a>
                    <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $contacts->email }}">Email: {{ $contacts->email }}</a>
                </div>

            </div>
        </div>
    </div>
</header>
