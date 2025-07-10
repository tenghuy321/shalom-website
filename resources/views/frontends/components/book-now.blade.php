<!-- ✅ Toast Notification -->
<div x-show="showToast" x-transition
    x-text="toastMessage"
    :class="toastType === 'success' ? 'bg-green-500' : 'bg-red-500'"
    class="fixed top-6 right-6 px-4 py-2 rounded text-white shadow-xl z-[999]">
</div>

<!-- ✅ Modal Form -->
<div x-show="showForm" x-cloak x-transition
    class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 p-4"
    @click.self="showForm = false">

    <!-- Responsive Modal Container -->
    <div class="bg-white w-full max-w-4xl max-h-[95vh] overflow-y-auto p-4 sm:p-6 rounded-xl shadow-xl relative">
        <!-- Close Button -->
        <button @click="showForm = false" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                <path d="M18 6L6 18M6 6l12 12" />
            </svg>
        </button>

        <!-- Title -->
        <h2 class="text-xl font-semibold mb-4 text-[#401457]">Booking Form</h2>

        <!-- Booking Form -->
        <form @submit.prevent="submitBooking" id="bookingForm" action="{{ route('book.now') }}" method="POST"
            class="space-y-6">
            @csrf

            <!-- Names & Email -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-[#401457]">First Name</label>
                    <input type="text" name="first_name" required
                        class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring-1 focus:ring-[#401457]">
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#401457]">Last Name</label>
                    <input type="text" name="last_name" required
                        class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring-1 focus:ring-[#401457]">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-[#401457]">E-mail</label>
                    <input type="email" name="email" required
                        class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring-1 focus:ring-[#401457]">
                </div>
            </div>

            <!-- Date & Time -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-[#401457]">Date</label>
                    <input type="date" name="date" required
                        class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring-1 focus:ring-[#401457]">
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#401457]">Time</label>
                    <input type="time" name="time" required
                        class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring-1 focus:ring-[#401457]">
                </div>
            </div>

            <!-- Service Dropdown -->
            <div>
                <label class="block text-sm font-medium text-[#401457] mb-2">Which service are you interested in?</label>
                <select name="service_type" required
                    class="w-full border border-gray-300 rounded px-3 py-2 text-[#401457] bg-white focus:ring-2 focus:ring-[#401457]">
                    <option value="">Please choose one</option>
                    @foreach ($services as $item)
                        <option value="{{ $item->slug }}">{{ $item->title[app()->getLocale()] }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Requests -->
            <div>
                <label class="block text-sm font-medium text-[#401457]">Requests</label>
                <textarea name="requests" rows="4"
                    class="w-full border border-gray-300 rounded px-3 py-2 text-sm resize-none focus:ring-2 focus:ring-[#401457]"></textarea>
            </div>

            <!-- Submit Button -->
            <div class="text-right">
                <button type="submit" :disabled="loading"
                    class="bg-[#401457] text-white px-6 py-2 rounded hover:bg-[#5b1c7a] disabled:opacity-50">
                    <span x-show="!loading">Submit Booking</span>
                    <span x-show="loading">Sending...</span>
                </button>
            </div>
        </form>
    </div>
</div>
