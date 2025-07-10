@extends('admin.layouts.app')

@section('header')
    Event List
@endsection

@section('content')
    <div class="" x-data="reorderTable()" x-init="initSortable()">
        <div class="my-2 px-2 md:px-4 flex items-center justify-between">
            <a href="{{ route('event-backend.create') }}"
                class="hover:bg-[#401457] hover:text-white text-[#401457] px-4 py-2 my-3 rounded-[5px] border-2 border-[#401457] text-[12px] sm:text-[14px]">
                Add New
            </a>
            <a href="{{ route('aboutlist.index') }}"
                class="hover:!bg-[#401457] hover:!text-[#ffffff] text-[#401457] px-4 py-2 my-3 rounded-[5px] border-2 border-[#401457] text-[12px] sm:text-[14px]">
                <span class="">Back</span>
            </a>
        </div>

        @component('admin.components.alert')
        @endcomponent

        <div class="overflow-x-auto px-0 sm:px-2 md:px-4">
            <div class="border border-[#401457] max-h-[80vh] overflow-y-auto">
                <table class="min-w-full table-fixed">
                    <thead class="text-white sticky top-0 z-10 bg-[#401457] border border-[#401457]">
                        <tr>
                            <th class="text-left py-3 px-4 text-xs border-r border-[#401457] w-8">#</th>
                            <th class="text-left py-3 px-4 text-xs border-r border-[#401457] w-[200px]">Image</th>
                            <th class="text-left py-3 px-4 text-xs border-r border-[#401457] w-[200px]">Title</th>
                            <th class="text-left py-3 px-4 text-xs border-r border-[#401457] w-[200px]">Content</th>
                            <th class="text-left py-3 px-4 text-xs border-r border-[#401457] w-[50px]">Action</th>
                        </tr>
                    </thead>
                    <tbody x-ref="tableBody" class="text-gray-700">
                        @foreach ($events as $index => $event)
                            <tr class="border-t border-[#401457] cursor-move" draggable="true"
                                x-bind:data-id="{{ $event->id }}" @dragstart="dragStart($event, {{ $event->id }})"
                                @dragover.prevent @drop="drop($event, {{ $event->id }})">
                                <td class="py-3 px-4 text-xs border-r border-[#401457]">
                                    {{ $index + 1 }}
                                </td>
                                <td class="py-3 px-4 text-xs border-r border-[#401457]">
                                    @php
                                        $images = $event->image;
                                        if (!is_array($images)) {
                                            $decoded = json_decode($event->image, true);
                                            $images = is_array($decoded) ? $decoded : [];
                                        }
                                    @endphp

                                    @if (count($images))
                                        <div class="flex flex-wrap gap-2 sortable-images"
                                            data-event-id="{{ $event->id }}">
                                            @foreach ($images as $img)
                                                <div class="sortable-item" data-img="{{ $img }}">
                                                    <img src="{{ asset($img) }}" alt="Event Image"
                                                        class="w-20 h-12 object-contain object-center rounded border" />
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <p class="text-gray-400 italic text-xs">No images available</p>
                                    @endif
                                </td>

                                <td class="py-1 px-4 text-xs max-w-[200px] border-r border-[#401457]">
                                    <div class="flex flex-col truncate">
                                        <p>{{ $event->title['en'] ?? '' }}</p>
                                        <p>{{ $event->title['kh'] ?? '' }}</p>
                                        <p>{{ $event->title['ch'] ?? '' }}</p>
                                    </div>
                                </td>

                                <td class="py-1 px-4 text-xs max-w-[200px] border-r border-[#401457]">
                                    <div class="flex flex-col">
                                        <div class="line-clamp-1">
                                            {!! $event->content['en'] ?? '' !!}
                                        </div>
                                        <div class="line-clamp-1">
                                            {!! $event->content['kh'] ?? '' !!}
                                        </div>
                                        <div class="line-clamp-1">
                                            {!! $event->content['ch'] ?? '' !!}
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3 px-4 text-xs border-r border-[#401457]">
                                    <div class="flex items-center space-x-2">
                                        <a href="{{ route('event-backend.delete', $event->id) }}" title="Delete"
                                            onclick="event.preventDefault(); deleteRecord('{{ route('event-backend.delete', $event->id) }}')">
                                            <svg class="w-6 h-6 text-red-500" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="1.5"
                                                    d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                            </svg>
                                        </a>
                                        <a href="{{ route('event-backend.edit', $event->id) }}" title="Edit"
                                            class="text-green-500 hover:text-green-700 transition">
                                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
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
@section('js')
    <script>
        function reorderTable() {
            return {
                initSortable() {
                    this.$nextTick(() => {
                        let tableBody = this.$refs.tableBody;
                        new Sortable(tableBody, {
                            animation: 150,
                            ghostClass: "bg-gray-100",
                            onEnd: async (event) => {
                                let newOrder = [...tableBody.children].map((row, index) => ({
                                    id: row.getAttribute("data-id"),
                                    order: index + 1
                                }));

                                let response = await fetch("{{ route('event-backend.reorder') }}", {
                                    method: "POST",
                                    headers: {
                                        "Content-Type": "application/json",
                                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                                    },
                                    body: JSON.stringify({
                                        newOrder
                                    })
                                });

                                if (response.ok) {
                                    location.reload();
                                } else {
                                    console.error("Failed to reorder.");
                                }
                            }
                        });
                    });
                }
            };
        }
    </script>
@endsection
