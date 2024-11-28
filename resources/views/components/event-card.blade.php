<div class="border rounded-lg shadow-md overflow-hidden bg-white">
    <!-- Event Image -->
    <img src="{{ $image ?? 'https://via.placeholder.com/800x400' }}" alt="{{ $name }}" class="w-full h-48 object-cover">

    <div class="p-4">
        <!-- Event Name -->
        <h3 class="text-xl font-semibold mb-2">{{ $name }}</h3>

        <!-- Event Description -->
        <p class="text-gray-600 mb-2">{{ $description }}</p>

        <!-- Event Date -->
        <p class="text-sm text-gray-500">Date: {{ \Carbon\Carbon::parse($happeningTime)->format('F j, Y g:i A') }}</p>

        <!-- Participants -->
        <p class="text-sm text-gray-700 mt-4">
            <strong>Participants:</strong>
        @if ($participants> 0)
            <ul class="list-disc ml-5 mt-2">
                {{ $participants}}
            </ul>
        @else
            <span>No participants yet.</span>
            @endif
            </p>

            <!-- Enrollment Status -->
            <div class="mt-4 flex justify-end gap-2">
                @if ($isEnrolled)
                    <!-- Enrolled Badge -->
                    <button class="px-3 py-1 bg-green-500 text-white rounded-md" disabled>
                        Enrolled
                    </button>
                @else
                    <!-- Join Event Button -->
                    <form action="{{ route('events.join', $eventId) }}" method="POST">
                        @method("PUT")
                        @csrf
                        <button type="submit" class="px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
                            Join Event
                        </button>
                    </form>
                @endif
            </div>

            <!-- Action Buttons -->
            <div class="mt-4 flex justify-end gap-2">
                <!-- View Button -->
                <a href="{{ route('events.show', $eventId) }}"
                   class="px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
                    View
                </a>

                <!-- Edit Button -->
                <a href="{{ route('events.edit', $eventId) }}"
                   class="px-3 py-1 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition">
                    Edit
                </a>

                <!-- Delete Button -->
                <form action="{{ route('events.destroy', $eventId) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600 transition">
                        Delete
                    </button>
                </form>
            </div>
    </div>
</div>
