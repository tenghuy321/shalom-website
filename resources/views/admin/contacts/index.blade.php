@extends('admin.layouts.app')
@section('header')
    Contact Us
@endsection
@section('content')
    <div class="">
        {{-- <div class="my-4 px-2 md:px-4 text-end">
            <a href="{{ route('contact-us.create') }}"
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
                            <th class="text-left py-3 px-4 text-xs w-[100px] border-r border-[#fff]">Icon</th>
                            <th class="text-left py-3 px-4 text-xs w-[200px] border-r border-[#fff]">Email</th>
                            <th class="text-left py-3 px-4 text-xs w-[200px] border-r border-[#fff]">Phone Number</th>
                            <th class="text-left py-3 px-4 text-xs w-[200px] border-r border-[#fff]">Working Hours</th>
                            <th class="text-left py-3 px-4 text-xs w-[200px] border-r border-[#fff]">Address</th>
                            <th class="text-left py-3 px-4 text-xs w-[200px] border-r border-[#fff]">Media</th>
                            <th class="text-left py-3 px-4 text-xs w-[50px]">Actions</th>
                        </tr>
                    </thead>
                    <tbody x-ref="tableBody" class="text-gray-700">
                        @foreach ($contacts as $index => $contact)
                            <tr class="border border-[#401457]">
                                <td class="py-1 px-4 text-xs max-w-[200px] border-r border-[#401457]">{{ $index + 1 }}
                                </td>
                                <td class="py-1 px-4 text-xs max-w-[200px] border-r border-[#401457]">
                                    <div class="flex flex-col xl:flex-row items-center gap-2">
                                        <img src="{{ asset($contact->icon) }}" alt="" class="w-12 h-12">
                                    </div>
                                </td>
                                <td class="py-1 px-4 text-xs max-w-[200px] border-r border-[#401457]">
                                    <p>{{ $contact->email }}</p>
                                </td>
                                <td class="py-1 px-4 text-xs max-w-[200px] border-r border-[#401457]">
                                    <p>{{ $contact->phone_number }}</p>
                                </td>
                                <td class="py-1 px-4 text-xs max-w-[200px] border-r border-[#401457]">
                                    <div class="flex flex-col truncate">
                                        <p>{{ $contact->hours_of_operation['en'] ?? '' }}</p>
                                        <p>{{ $contact->hours_of_operation['kh'] ?? '' }}</p>
                                        <p>{{ $contact->hours_of_operation['ch'] ?? '' }}</p>
                                    </div>
                                </td>
                                <td class="py-1 px-4 text-xs max-w-[200px] border-r border-[#401457]">
                                    <div class="flex flex-col truncate">
                                        <p>{{ $contact->address['en'] ?? '' }}</p>
                                        <p>{{ $contact->address['kh'] ?? '' }}</p>
                                        <p>{{ $contact->address['ch'] ?? '' }}</p>
                                    </div>
                                </td>
                                <td class="py-1 px-4 text-xs max-w-[200px] border-r border-[#401457]">
                                    <div class="flex flex-col truncate">
                                        <p>{{ $contact->facebook_link }}</p>
                                        <p>{{ $contact->ig_link }}</p>
                                        <p>{{ $contact->tiktok_link }}</p>
                                        <p>{{ $contact->telegram_link }}</p>
                                        <p>{{ $contact->linkedin_link }}</p>
                                    </div>
                                </td>
                                <td class="py-1 px-4 text-xs">
                                    <div class="flex items-center space-x-2">
                                        <a href="{{ route('contact-us.edit', $contact->id) }}" title="Edit">
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

                                let response = await fetch("{{ route('servicelist.reorder') }}", {
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
