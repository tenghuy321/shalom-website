@extends('admin.layouts.app')

@section('header')
    Client Image
@endsection

@section('content')
    <div class="">
        {{-- <div class="my-2 px-2 md:px-4 flex items-center justify-between">
            <a href="{{ route('client-backend.create') }}"
                class="hover:bg-[#401457] hover:text-white text-[#401457] px-4 py-2 my-3 rounded-[5px] border-2 border-[#401457] text-[12px] sm:text-[14px]">
                Add New
            </a>
        </div> --}}

        @component('admin.components.alert')
        @endcomponent

        <div class="overflow-x-auto px-0 sm:px-2 md:px-4">
            <div class="border border-[#401457] max-h-[80vh] overflow-y-auto">
                <table class="min-w-full table-fixed">
                    <thead class="text-white sticky top-0 z-10 bg-[#401457] border border-[#401457]">
                        <tr>
                            <th class="text-left py-3 px-4 text-xs border-r border-[#401457] w-8">#</th>
                            <th class="text-left py-3 px-4 text-xs border-r border-[#401457] w-[200px]">Image</th>
                            <th class="text-left py-3 px-4 text-xs border-r border-[#401457] w-[50px]">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($clients as $index => $client)
                            <tr class="border-t border-[#401457]">
                                <td class="py-3 px-4 text-xs border-r border-[#401457]">
                                    {{ $index + 1 }}
                                </td>
                                <td class="py-3 px-4 text-xs border-r border-[#401457]">
                                    @php
                                        $images = $client->image;
                                        if (!is_array($images)) {
                                            $decoded = json_decode($client->image, true);
                                            $images = is_array($decoded) ? $decoded : [];
                                        }
                                    @endphp

                                    @if (count($images))
                                        <div class="flex flex-wrap gap-2 sortable-images"
                                            data-client-id="{{ $client->id }}">
                                            @foreach ($images as $img)
                                                <div class="sortable-item" data-img="{{ $img }}">
                                                    <img src="{{ asset($img) }}" alt="Client Image"
                                                        class="w-20 h-12 object-contain object-center rounded border" />
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <p class="text-gray-400 italic text-xs">No images available</p>
                                    @endif
                                </td>
                                <td class="py-3 px-4 text-xs border-r border-[#401457]">
                                    <a href="{{ route('client-backend.edit', $client->id) }}" title="Edit"
                                        class="text-green-500 hover:text-green-700 transition">
                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

