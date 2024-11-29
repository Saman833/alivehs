<div class="border rounded-lg shadow-md overflow-hidden bg-white">
    <!-- Club Image -->
    <img src="{{ $image ?? 'https://via.placeholder.com/800x400' }}" alt="{{ $name }}" class="w-full h-48 object-cover">

    <div class="p-4">
        <!-- Club Name -->
        <h3 class="text-xl font-semibold mb-2">{{ $name }}</h3>

        <!-- Club Description -->
        <p class="text-gray-600 mb-2">{{ $description }}</p>

        <!-- Club Members -->
        <p class="text-sm text-gray-500">Members: {{ $numberOfMembers }}</p>

        <!-- Action Buttons -->
        <div class="mt-4 flex justify-end gap-2">
            @if ($isMember)
                <!-- Member Badge -->
                <button class="px-3 py-1 bg-green-500 text-white rounded-md" disabled>
                    Member
                </button>
            @else
                <!-- Join Club Button -->
                <form action="{{ route('clubs.join', $clubId) }}" method="POST">
                    @method("PUT")
                    @csrf
                    <button type="submit" class="px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
                        Join Club
                    </button>
                </form>
            @endif

            <!-- View Button -->
            <a href="{{ route('clubs.show', $clubId) }}"
               class="px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
                View
            </a>

            <!-- Edit Button -->
            <a href="{{ route('clubs.edit', $clubId) }}"
               class="px-3 py-1 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition">
                Edit
            </a>

            <!-- Delete Button -->
            <form action="{{ route('clubs.destroy', $clubId) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600 transition">
                    Delete
                </button>
            </form>
        </div>
    </div>
</div>
