@extends('admin.layouts.app')
@section('header')
    Team Member
@endsection
@section('content')
    <div class="" x-data="reorderTable()" x-init="initSortable()">
        <div class="my-4 px-2 md:px-4 text-end">
            <a href="{{ route('team.create') }}"
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
                            <th class="text-left py-3 px-4 text-xs w-[100px] border-r border-[#fff]">#</th>
                            <th class="text-left py-3 px-4 text-xs w-[150px] border-r border-[#fff]">Image</th>
                            <th class="text-left py-3 px-4 text-xs w-[200px] border-r border-[#fff]">Name</th>
                            <th class="text-left py-3 px-4 text-xs w-[200px] border-r border-[#fff]">Position</th>
                            <th class="text-left py-3 px-4 text-xs w-[250px] border-r border-[#fff]">Link</th>
                            <th class="text-left py-3 px-4 text-xs w-[300px] border-r border-[#fff]">Content</th>
                            <th class="text-left py-3 px-4 text-xs w-[200px]">Actions</th>
                        </tr>
                    </thead>
                    <tbody x-ref="tableBody" class="text-gray-700">
                        @foreach ($teams as $index => $team)
                            <tr class="border border-[#401457] cursor-move" draggable="true"
                                x-bind:data-id="{{ $team->id }}" @dragstart="dragStart($event, {{ $team->id }})"
                                @dragover.prevent @drop="drop($event, {{ $team->id }})">
                                <td class="py-1 px-4 text-xs max-w-[200px] border-r border-[#401457]">{{ $index + 1 }}
                                </td>
                                <td class="py-1 px-4 text-xs max-w-[200px] border-r border-[#401457]">
                                    <img src="{{ asset($team->image) }}" alt="" class="w-16 xl:w-20 h-16 xl:h-20">
                                </td>
                                <td class="py-1 px-4 text-xs max-w-[200px] border-r border-[#401457]">
                                    <div class="flex flex-col truncate">
                                        <p>{{ $team->name['en'] ?? '' }}</p>
                                        <p>{{ $team->name['kh'] ?? '' }}</p>
                                        <p>{{ $team->name['ch'] ?? '' }}</p>
                                    </div>
                                </td>
                                <td class="py-1 px-4 text-xs max-w-[200px] border-r border-[#401457]">
                                    <div class="flex flex-col truncate">
                                        <p>{{ $team->position['en'] ?? '' }}</p>
                                        <p>{{ $team->position['kh'] ?? '' }}</p>
                                        <p>{{ $team->position['ch'] ?? '' }}</p>
                                    </div>
                                </td>
                                <td class="py-1 px-4 text-xs max-w-[250px] border-r border-[#401457]">
                                    <p>{{ $team->link }}</p>
                                </td>
                                <td class="py-1 px-4 text-xs max-w-[200px] border-r border-[#401457]">
                                    <div class="flex flex-col">
                                        <div class="line-clamp-1">
                                            {!! $team->content['en'] ?? '' !!}
                                        </div>
                                        <div class="line-clamp-1">
                                            {!! $team->content['kh'] ?? '' !!}
                                        </div>
                                        <div class="line-clamp-1">
                                            {!! $team->content['ch'] ?? '' !!}
                                        </div>
                                    </div>
                                </td>
                                <td class="py-1 px-4 text-xs">
                                    <div class="flex items-center">
                                        <a href="{{ route('team.edit', $team->id) }}" title="Edit">
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
certificates
