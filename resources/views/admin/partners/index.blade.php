@extends('admin.layouts.app')
@section('header')
    Partner List
@endsection
@section('content')
    <div class="" x-data="reorderTable()" x-init="initSortable()">
        <div class="my-4 px-2 md:px-4 text-end">
            <a href="{{ route('partner.create') }}"
                class="hover:!bg-[#401457] hover:!text-[#ffffff] text-[#401457] px-4 py-2 my-3 rounded-[5px] border-2 border-[#401457] text-[12px] sm:text-[14px]">
                <span class="">Add new</span>
            </a>
        </div>

        @component('admin.components.alert')
        @endcomponent

        <div class="overflow-x-auto px-0 sm:px-2 md:px-4">
            <div class="border border-[#fff] max-h-[80vh] overflow-y-auto">
                <table class="min-w-full table-fixed">
                    <thead class="text-[#fff] sticky top-0 z-10 bg-[#401457] border border-[#401457]">
                        <tr>
                            <th class="text-left py-3 px-4 text-xs w-[50px] border-r border-[#fff]">#</th>
                            <th class="text-left py-3 px-4 text-xs w-[200px] border-r border-[#fff]">Logo</th>
                            <th class="text-left py-3 px-4 text-xs w-[100px] border-r border-[#fff]">Image</th>
                            <th class="text-left py-3 px-4 text-xs w-[200px] border-r border-[#fff]">Title</th>
                            <th class="text-left py-3 px-4 text-xs w-[200px] border-r border-[#fff]">Date</th>
                            <th class="text-left py-3 px-4 text-xs w-[200px] border-r border-[#fff]">Content</th>
                            <th class="text-left py-3 px-4 text-xs w-[50px]">Actions</th>
                        </tr>
                    </thead>
                    <tbody x-ref="tableBody" class="text-gray-700">
                        @foreach ($partners as $index => $partner)
                            <tr class="border border-[#401457] cursor-move" draggable="true"
                                x-bind:data-id="{{ $partner->id }}" @dragstart="dragStart($event, {{ $partner->id }})"
                                @dragover.prevent @drop="drop($event, {{ $partner->id }})">
                                <td class="py-1 px-4 text-xs max-w-[200px] border-r border-[#401457]">{{ $partner->order }}
                                </td>
                                <td class="py-1 px-4 text-xs max-w-[200px] border-r border-[#401457]">
                                    <div class="flex flex-col xl:flex-row items-center gap-2">
                                        <img src="{{ asset($partner->our_logo) }}" alt="" class="w-12 h-12">
                                        <img src="{{ asset($partner->partner_logo) }}" alt="" class="w-12 h-12">
                                    </div>
                                </td>
                                <td class="py-1 px-4 text-xs max-w-[200px] border-r border-[#401457]">
                                    <div class="flex">
                                        <img src="{{ asset($partner->image) }}" alt="" class="w-16 h-16">
                                    </div>
                                </td>
                                <td class="py-1 px-4 text-xs max-w-[200px] border-r border-[#401457]">
                                    <div class="flex flex-col truncate">
                                        <p>{{ $partner->title['en'] ?? '' }}</p>
                                        <p>{{ $partner->title['kh'] ?? '' }}</p>
                                        <p>{{ $partner->title['ch'] ?? '' }}</p>
                                    </div>
                                </td>
                                <td class="py-1 px-4 text-xs max-w-[200px] border-r border-[#401457]">
                                    <div class="flex flex-col truncate">
                                        <p>{{ $partner->date['en'] ?? '' }}</p>
                                        <p>{{ $partner->date['kh'] ?? '' }}</p>
                                        <p>{{ $partner->date['ch'] ?? '' }}</p>
                                    </div>
                                </td>
                                <td class="py-1 px-4 text-xs max-w-[200px] border-r border-[#401457]">
                                    <div class="flex flex-col">
                                        <div class="line-clamp-1">
                                            {!! $partner->content['en'] ?? '' !!}
                                        </div>
                                        <div class="line-clamp-1">
                                            {!! $partner->content['kh'] ?? '' !!}
                                        </div>
                                        <div class="line-clamp-1">
                                            {!! $partner->content['ch'] ?? '' !!}
                                        </div>
                                    </div>
                                </td>
                                <td class="py-1 px-4 text-xs">
                                    <div class="flex items-center space-x-2">
                                        <a href="{{ route('partner.delete', $partner->id) }}" title="Delete"
                                            onclick="event.preventDefault(); deleteRecord('{{ route('partner.delete', $partner->id) }}')">
                                            <svg class="w-6 h-6 text-red-500" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="1.5"
                                                    d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                            </svg>
                                        </a>
                                        <a href="{{ route('partner.edit', $partner->id) }}" title="Edit">
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

                                let response = await fetch("{{ route('partner.reorder') }}", {
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
