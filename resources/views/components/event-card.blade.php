<div class="border rounded-lg shadow-md overflow-hidden bg-white">
    <img src="{{ $image }}" alt="Event Image" class="w-full h-48 object-cover">
    <div class="p-4">
        <h3 class="text-xl font-semibold mb-2">{{ $name }}</h3>
        <p class="text-gray-600 mb-2">{{ $description }}</p>
        <p class="text-sm text-gray-500">Date: {{ $happeningTime }}</p>

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
