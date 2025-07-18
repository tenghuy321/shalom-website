<nav class="hidden w-full h-[8rem] lg:flex items-start justify-between bg-[#f8efff]">
    <div class="bg-[#fff] px-2 xl:px-10 w-24 xl:w-48 h-full flex items-center">
        <img src="{{ asset('assets/images/logo.png') }}" alt="" class="w-24 h-auto">
    </div>

    <ul class="flex items-center justify-end gap-2 bg-[#fff] w-full uppercase px-4 xl:px-10 my-3">
        <li class="py-2 px-3 xl:px-6 text-[13px] xl:text-[15px] 2xl:text-[16px] text-[#401457] {{ Route::is('home') ? 'bg-[#401457] text-[#fff] rounded-full font-[700]' : 'font-[400]' }}">
            <a href="{{ route('home') }}">Home</a>
        </li>
        <li>|</li>
        <li class="py-2 px-3 xl:px-6 text-[13px] xl:text-[15px] 2xl:text-[16px] text-[#401457] {{ Route::is('about-us') ? 'bg-[#401457] text-[#fff] rounded-full font-[700]' : 'font-[400]' }}">
            <a href="{{ route('about-us') }}">About Us</a>
        </li>
        <li>|</li>
        <li class="py-2 px-3 xl:px-6 text-[13px] xl:text-[15px] 2xl:text-[16px] text-[#401457] {{ Route::is('service') ? 'bg-[#401457] text-[#fff] rounded-full font-[700]' : 'font-[400]' }}">
            <a href="{{ route('service') }}">Our Services</a>
        </li>
        <li>|</li>
        <li class="py-2 px-3 xl:px-6 text-[13px] xl:text-[15px] 2xl:text-[16px] text-[#401457] {{ Route::is('our-partners') ? 'bg-[#401457] text-[#fff] rounded-full font-[700]' : 'font-[400]' }}">
            <a href="{{ route('our-partners') }}">Partners</a>
        </li>
        <li>|</li>
        <li class="py-2 px-3 xl:px-6 text-[13px] xl:text-[15px] 2xl:text-[16px] text-[#401457] {{ Route::is('client') ? 'bg-[#401457] text-[#fff] rounded-full font-[700]' : 'font-[400]' }}">
            <a href="{{ route('client') }}">Clients</a>
        </li>
        <li>|</li>
        <li class="py-2 px-3 xl:px-6 text-[13px] xl:text-[15px] 2xl:text-[16px] text-[#401457] {{ Route::is('industry') ? 'bg-[#401457] text-[#fff] rounded-full font-[700]' : 'font-[400]' }}">
            <a href="{{ route('industry') }}">Industries</a>
        </li>
        <li>|</li>
        <li class="py-2 px-3 xl:px-6 text-[13px] xl:text-[15px] 2xl:text-[16px] text-[#401457] {{ Route::is('event') ? 'bg-[#401457] text-[#fff] rounded-full font-[700]' : 'font-[400]' }}">
            <a href="{{ route('event') }}">Events</a>
        </li>
        <li>|</li>
        <li class="py-2 px-3 xl:px-6 text-[13px] xl:text-[15px] 2xl:text-[16px] text-[#401457] {{ Route::is('contact') ? 'bg-[#401457] text-[#fff] rounded-full font-[700]' : 'font-[400]' }}">
            <a href="{{ route('contact') }}">Contact Us</a>
        </li>
    </ul>
</nav>
