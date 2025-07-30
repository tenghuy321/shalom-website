@extends('frontends.layouts.master')
@section('content')
    @include('frontends.components.loading')
    @include('frontends.components.scroll-top-button')


    <section class="w-full bg-[#f8efff] relative">
        <div class="w-full max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 items-start py-10 lg:px-10 overflow-hidden">
            <div class="px-4 text-[#401457]" data-aos="fade-right" data-aos-duration="1000">
                <h1 class="text-[30px] md:text-[50px] uppercase lg:leading-[55px]">{{ $hero->title[app()->getLocale()] }}
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

            <div class="flex items-end justify-center pt-6 md:mt-0" data-aos="fade-up" data-aos-duration="1000">
                <img src="{{ asset($hero->image) }}" alt="" class="w-[50%] lg:w-[60%]">
            </div>
        </div>
    </section>

    <hr class="bg-[#401457] border-[#401457] border-b-0 my-10 max-w-7xl mx-auto">

    <section class="w-full bg-[#401457] py-10">
        <div class="w-full max-w-5xl mx-auto px-2 text-[#fff]">
            <h1 class="text-[13px] xl:text-[15px] font-[600] max-w-[600px] mx-auto text-center" data-aos="fade-up"
                data-aos-duration="1000">We're here to help. Whether
                you have questions about our services or need a ssistance with a tax-related issue, feel free to reach out
            </h1>

            <div class="grid grid-cols-1 lg:grid-cols-3 items-center justify-center gap-10 pt-10 overflow-hidden">
                <div class="flex items-center justify-center" data-aos="fade-right" data-aos-duration="1000">
                    <img src="{{ asset('assets/images/contact-1.png') }}" alt=""
                        class="w-20 sm:w-32 lg:w-1/2 h-auto">
                </div>

                <form action="{{ route('contact.send') }}" method="POST" class="space-y-6 lg:col-span-2 px-2 sm:px-4"
                    data-aos="fade-left" data-aos-duration="1000" id="contactForm">
                    @csrf
                    <div id="successMessage"
                        class="hidden relative bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        <span id="successText"></span>
                        <button type="button" onclick="document.getElementById('successMessage').classList.add('hidden')"
                            class="absolute top-3 right-2 text-green-700 hover:text-red-500 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none"
                                stroke="#000000" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 6l-12 12" />
                                <path d="M6 6l12 12" />
                            </svg>

                        </button>
                    </div>

                    <!-- Row 1: First name / Second name -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="first_name" class="block text-[13px] xl:text-[15px] font-medium text-[#fff]">First
                                name</label>
                            <input type="text" name="first_name" id="first_name" placeholder="Your First Name"
                                class="mt-1 w-full border border-gray-300 rounded-md px-4 py-2 text-[13px] xl:text-[15px] text-[#401257] hover:border-[#000] focus:ring-[#000] focus:border-[#000]">
                        </div>
                        <div>
                            <label for="second_name" class="block text-[13px] xl:text-[15px] font-medium text-[#fff]">Second
                                name</label>
                            <input type="text" name="second_name" id="second_name" placeholder="Your Second Name"
                                class="mt-1 w-full border border-gray-300 rounded-md px-4 py-2 text-[13px] xl:text-[15px] text-[#401257] hover:border-[#000] focus:ring-[#000] focus:border-[#000]">
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email"
                                class="block text-[13px] xl:text-[15px] font-medium text-[#fff]">Email</label>
                            <input type="email" name="email" id="email" placeholder="Your Email"
                                class="mt-1 w-full border border-gray-300 rounded-md px-4 py-2 text-[13px] xl:text-[15px] text-[#401257] hover:border-[#000] focus:ring-[#000] focus:border-[#000]">
                        </div>

                        <!-- Phone -->
                        <div>
                            <label for="phone"
                                class="block text-[13px] xl:text-[15px] font-medium text-[#fff]">Phone</label>
                            <input type="text" name="phone" id="phone" placeholder="Your Phone"
                                class="mt-1 w-full border border-gray-300 rounded-md px-4 py-2 text-[13px] xl:text-[15px] text-[#401257] hover:border-[#000] focus:ring-[#000] focus:border-[#000]">
                        </div>

                        <div>
                            <label for="company"
                                class="block text-[13px] xl:text-[15px] font-medium text-[#fff]">Company</label>
                            <input type="text" name="company" id="company" placeholder="Your Company"
                                class="mt-1 w-full border border-gray-300 rounded-md px-4 py-2 text-[13px] xl:text-[15px] text-[#401257] hover:border-[#000] focus:ring-[#000] focus:border-[#000]">
                        </div>
                        <div>
                            <label for="job_title" class="block text-[13px] xl:text-[15px] font-medium text-[#fff]">Job
                                Title</label>
                            <input type="text" name="job_title" id="job_title" placeholder="Your Job Title"
                                class="mt-1 w-full border border-gray-300 rounded-md px-4 py-2 text-[13px] xl:text-[15px] text-[#401257] hover:border-[#000] focus:ring-[#000] focus:border-[#000]">
                        </div>
                    </div>

                    <!-- Service Dropdown -->
                    <div>
                        <label class="block text-[13px] xl:text-[15px] font-medium text-[#fff] mb-2">Which service are you
                            interested in?</label>
                        <select name="service_type" required
                            class="w-full border border-gray-300 rounded px-3 py-2 text-[#401457] bg-white focus:ring-2 focus:ring-[#401457]">
                            <option value="">Please choose one</option>
                            @foreach ($services as $item)
                                <option value="{{ $item->slug }}">{{ $item->title[app()->getLocale()] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Message -->
                    <div>
                        <label for="message"
                            class="block text-[13px] xl:text-[15px] font-medium text-[#fff]">Message</label>
                        <textarea name="message" id="message" rows="5"
                            placeholder="To better assist you, please describe how we can help…"
                            class="mt-1 w-full border border-gray-300 rounded-md px-4 py-2 text-[13px] xl:text-[15px] text-[#401257] hover:border-[#000] focus:ring-[#000] focus:border-[#000]"></textarea>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" id="submitBtn"
                        class="bg-[#fff] text-black font-semibold px-6 py-2 rounded-md hover:bg-[#000] hover:text-[#fff] inline-flex items-center gap-2 transition">
                        <span id="submitText">Submit</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </button>

                </form>
            </div>
        </div>
    </section>

    <section class="w-full bg-[#f8efff] py-10 lg:py-20 max-w-4xl mx-auto px-2 text-[#401457]">
        <div class="flex flex-col md:flex-row items-center gap-10 lg:gap-20 overflow-hidden">
            <div class="text-[#401457] py-10 px-6 md:px-12" data-aos="fade-right" data-aos-duration="1000">
                <h2 class="text-[30px] md:text-[50px] uppercase mb-6">CONTACT US:</h2>

                <ul class="list-disc pl-5 space-y-2 prose leading-relaxed">
                    <li>
                        <strong>Email Address:</strong>
                        <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $contacts->email }}"
                            class="">{{ $contacts->email }}</a>
                    </li>

                    <li>
                        <strong>Phone Number:</strong>
                        <a href="tel:{{ $contacts->phone_number }}" class="">{{ $contacts->phone_number }}</a>
                    </li>

                    <li>
                        <strong>Hours of Operation:</strong>
                        {{ $contacts->hours_of_operation[app()->getLocale()] }}
                    </li>

                    <li>
                        <strong>Physical Address:</strong>
                        <ul class="list-[circle] pl-5 mt-1 space-y-1">
                            <li>Shalom Solution Co., Ltd.</li>
                            <li>{{ $contacts->address[app()->getLocale()] }}</li>
                        </ul>
                    </li>
                </ul>
            </div>


            <img src="{{ asset($contacts->icon) }}" alt="" class="w-32 md:w-40 h-auto"
                data-aos="fade-left" data-aos-duration="1000">
        </div>

        {{-- map --}}
        <div class="w-full flex items-center justify-center pt-10" data-aos="fade-up">
            <iframe class="w-[500px] h-[300px] border border-[#401457] rounded-md"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3908.699809070842!2d104.8924538!3d11.5733645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31095100657a342d%3A0xaaf5c8d71d6e29ae!2sShalom%20Solution%20Co.%2C%20Ltd.!5e0!3m2!1sen!2skh!4v1752025323324!5m2!1sen!2skh"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
@endsection
@section('js')
    <script>
        document.getElementById('contactForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const form = e.target;
            const formData = new FormData(form);
            const token = document.querySelector('input[name="_token"]').value;

            // Button elements
            const submitBtn = document.getElementById('submitBtn');
            const submitText = document.getElementById('submitText');

            // Disable and show "Sending..."
            submitBtn.disabled = true;
            submitText.textContent = 'Sending...';

            try {
                const response = await fetch("{{ route('contact.send') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': token
                    },
                    body: formData
                });

                const result = await response.json();

                if (response.ok) {
                    const successBox = document.getElementById('successMessage');
                    const successText = document.getElementById('successText');

                    successText.textContent = result.message;
                    successBox.classList.remove('hidden');
                    form.reset();

                    // Auto-close after 5 seconds
                    setTimeout(() => {
                        successBox.classList.add('hidden');
                    }, 5000);
                } else {
                    alert('Submission failed. Please try again.');
                }


            } catch (error) {
                console.error(error);
                alert('An error occurred. Please try again later.');
            } finally {
                // Re-enable and reset button text
                submitBtn.disabled = false;
                submitText.textContent = 'Submit';
            }
        });
    </script>
@endsection
