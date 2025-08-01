<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Shalom Solutions</title>

    {{-- <link rel="icon" href="/favicon.ico" sizes="any"> --}}
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo-white.png') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/ckeditor.css') }}"> --}}


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    {{--  --}}
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,100..900;1,9..144,100..900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- In <head> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />


    @vite('resources/css/app.css')
    <style>
        [x-cloak] {
            display: none !important;
        }

        .prose h1 {
            font-size: 16px;
            font-weight: bold;
        }

        .prose ul {
            list-style-type: disc;
            padding-left: 1.25rem;
            font-size: 14px;
        }

        .prose ul li::marker {}

        .prose ol {
            list-style-type: decimal;
            padding-left: 1.25rem;
            font-size: 14px;
        }

        .prose h2 {
            font-size: 20px;
            font-weight: bold;
        }

        .prose p {
            font-size: 14px;
        }

        .prose a {
            color: #401457;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
        }

        .prose a:hover {
            color: #401457;
            text-decoration: underline;
            font-size: 14px;
        }

        @media (max-width: 639px) {
            .prose p {
                font-size: 12px;
            }

            .prose a {
                color: #401457 font-size: 12px;
            }

            .prose h1 {
                font-size: 14px;
                font-weight: bold;
            }

            .prose h2 {
                font-size: 16px;
                font-weight: bold;
            }

            .prose ul {
                list-style-type: disc;
                padding-left: 1.25rem;
                font-size: 12px;
            }
        }
    </style>
    @yield('css')
</head>
@php
    $lang = app()->getLocale(); // or however you set the language
@endphp
<body class="min-h-screen" style='font-family: {{ $lang === "kh" ? '"Kantumruy Pro", sans-serif' : '"Fraunces", serif' }};'>
    @include('frontends.components.header', ['contacts' => $contacts])
    @include('frontends.components.navbar')
    @yield('content')

    @include('frontends.components.footer', ['contacts' => $contacts])

    @yield('js')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-JlPaB8C6GzJH+o4v2QWUKrNuGzCk4sR2CBtM3Z6TxL0=" crossorigin="anonymous"></script>
    <!-- Before </body> -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        AOS.init();
    </script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 30,
            centeredSlides: true,
            loop: true,
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    </script>
    {{-- <script>
        function bookingFormHandler() {
            return {
                showForm: false,
                loading: false,
                showToast: false,
                toastMessage: '',
                toastType: 'success',

                async submitBooking() {
                    this.loading = true;
                    const form = document.getElementById('bookingForm');
                    const formData = new FormData(form);

                    try {
                        const response = await fetch(form.action, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                            },
                            body: formData
                        });

                        const result = await response.json();

                        if (response.ok) {
                            this.toastMessage = result.message || "Booking submitted successfully!";
                            this.toastType = 'success';
                            form.reset();
                            this.showForm = false; // Optional: close modal
                        } else {
                            this.toastMessage = result.message || "Something went wrong.";
                            this.toastType = 'error';
                        }
                    } catch (error) {
                        this.toastMessage = "Error submitting form.";
                        this.toastType = 'error';
                    } finally {
                        this.loading = false;
                        this.showToast = true;
                        setTimeout(() => this.showToast = false, 3000);
                    }
                }
            }
        }
    </script> --}}
</body>

</html>
