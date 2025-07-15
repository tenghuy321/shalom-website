@extends('admin.layouts.app')
@section('header')
    About List
@endsection
@section('content')
    <div class="">
        {{-- <div class="my-4 px-2 md:px-4 text-end">
            <a href="{{ route('aboutlist.create') }}"
                class="hover:!bg-[#401457] hover:!text-[#ffffff] text-[#401457] px-4 py-2 my-3 rounded-[5px] border-2 border-[#401457] text-[12px] sm:text-[14px]">
                <span class="">Add new</span>
            </a>
        </div> --}}

        @component('admin.components.alert')
        @endcomponent

        <div class="overflow-x-auto px-0 sm:px-2 md:px-4">
            <div class="border border-[#fff] max-h-[80vh] overflow-y-auto">
                <table class="min-w-full table-fixed">
                    <thead class="text-[#fff] sticky top-0 z-10 bg-[#401457] border border-[#401457]">
                        <tr>
                            <th class="text-left py-3 px-4 text-xs w-[50px] border-r border-[#fff]">#</th>
                            <th class="text-left py-3 px-4 text-xs w-[200px] border-r border-[#fff]">Icon</th>
                            <th class="text-left py-3 px-4 text-xs w-[200px] border-r border-[#fff]">Title</th>
                            <th class="text-left py-3 px-4 text-xs w-[200px] border-r border-[#fff]">Content</th>
                            <th class="text-left py-3 px-4 text-xs w-[50px]">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($abouts as $index => $about)
                            <tr class="border border-[#401457]">
                                <td class="py-1 px-4 text-xs max-w-[200px] border-r border-[#401457]">{{ $index + 1 }}
                                </td>
                                <td class="py-1 px-4 text-xs max-w-[200px] border-r border-[#401457]">
                                    @if (!empty($about->icon))
                                        <img src="{{ asset($about->icon) }}" alt="" class="w-12 h-12">
                                    @endif
                                </td>
                                <td class="py-1 px-4 text-xs max-w-[200px] border-r border-[#401457]">
                                    <div class="flex flex-col truncate">
                                        <p>{{ $about->title['en'] ?? '' }}</p>
                                        <p>{{ $about->title['kh'] ?? '' }}</p>
                                        <p>{{ $about->title['ch'] ?? '' }}</p>
                                    </div>
                                </td>

                                <td class="py-1 px-4 text-xs max-w-[200px] border-r border-[#401457]">
                                    <div class="flex flex-col">
                                        <div class="line-clamp-1">
                                            {!! $about->content['en'] ?? '' !!}
                                        </div>
                                        <div class="line-clamp-1">
                                            {!! $about->content['kh'] ?? '' !!}
                                        </div>
                                        <div class="line-clamp-1">
                                            {!! $about->content['ch'] ?? '' !!}
                                        </div>
                                    </div>
                                </td>
                                <td class="py-1 px-4 text-xs">
                                    <div class="flex items-center space-x-2">
                                        @if ($about->id == 4)
                                            <a href={{ route('faq.index') }}>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                                    stroke="#401457" stroke-linecap="round" stroke-linejoin="round"
                                                    width="24" height="24" stroke-width="1.5">
                                                    <path d="M9 6h11"></path>
                                                    <path d="M12 12h8"></path>
                                                    <path d="M15 18h5"></path>
                                                    <path d="M5 6v.01"></path>
                                                    <path d="M8 12v.01"></path>
                                                    <path d="M11 18v.01"></path>
                                                </svg>
                                            </a>
                                        @endif
                                        @if ($about->id == 5)
                                            <a href={{ route('certificate.index') }}>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                                    stroke="#401457" stroke-linecap="round" stroke-linejoin="round"
                                                    width="24" height="24" stroke-width="1.5">
                                                    <path d="M9 6h11"></path>
                                                    <path d="M12 12h8"></path>
                                                    <path d="M15 18h5"></path>
                                                    <path d="M5 6v.01"></path>
                                                    <path d="M8 12v.01"></path>
                                                    <path d="M11 18v.01"></path>
                                                </svg>
                                            </a>
                                        @endif
                                        @if ($about->id == 6)
                                            <a href={{ route('event-backend.index') }}>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                                    stroke="#401457" stroke-linecap="round" stroke-linejoin="round"
                                                    width="24" height="24" stroke-width="1.5">
                                                    <path d="M9 6h11"></path>
                                                    <path d="M12 12h8"></path>
                                                    <path d="M15 18h5"></path>
                                                    <path d="M5 6v.01"></path>
                                                    <path d="M8 12v.01"></path>
                                                    <path d="M11 18v.01"></path>
                                                </svg>
                                            </a>
                                        @endif
                                        <a href="{{ route('aboutlist.edit', $about->id) }}" title="Edit">
                                            <svg class="w-6 h-6 text-green-500 hover:text-green-700 transition"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="1.5"
                                                    d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
