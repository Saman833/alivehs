<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Details</title>
    <script src="https://cdn.tailwindcss.com"></script> <!-- Include Tailwind CSS -->
</head>
<body class="bg-gray-100">

<!-- Header Section -->
<header class="bg-blue-500 text-white py-4">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold">Event Details</h1>
    </div>
</header>

<!-- Main Content Section -->
<main class="container mx-auto py-8 px-4">
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden">

        <!-- Event Image -->
        <img
            src="{{ $event->image ?? 'https://via.placeholder.com/800x400' }}"
            alt="{{ $event->name }}"
            class="w-full h-64 object-cover"
        />

        <!-- Event Content -->
        <div class="p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ $event->name }}</h2>
            <p class="text-gray-600 mb-4">{{ $event->description }}</p>

            <!-- Event Date -->
            <p class="text-gray-500 text-sm mb-4">
                <strong>Date:</strong> {{ \Carbon\Carbon::parse($event->happening_time)->format('F j, Y g:i A') }}
            </p>

            <!-- Action Buttons -->
            <div class="flex space-x-4 mt-6">
                <!-- Back Button -->
                <a
                    href="{{ route('events.index') }}"
                    class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition"
                >
                    Back to Events
                </a>

                <!-- Edit Button -->
                <a
                    href="{{ route('events.edit', $event->id) }}"
                    class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition"
                >
                    Edit Event
                </a>

                <!-- Delete Button -->
                <form
                    action="{{ route('events.destroy', $event->id) }}"
                    method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this event?')"
                    class="inline-block"
                >
                    @csrf
                    @method('DELETE')
                    <button
                        type="submit"
                        class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition"
                    >
                        Delete Event
                    </button>
                </form>
            </div>
        </div>
    </div>
</main>
</body>
</html>
