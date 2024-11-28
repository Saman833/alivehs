<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
    <script src="https://cdn.tailwindcss.com"></script> <!-- Include Tailwind CSS -->
</head>
<body class="bg-gray-100">

<!-- Header Section -->
<header class="bg-blue-500 text-white py-4">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold">Edit Event</h1>
    </div>
</header>

<!-- Main Content Section -->
<main class="container mx-auto py-8 px-4">
    <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-lg p-6">
        <!-- Form Header -->
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Update Event Details</h2>

        <!-- Event Form -->
        <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <!-- Event Name -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-2">Event Name</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', $event->name) }}"
                    class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-300"
                    placeholder="Enter the event name"
                    required
                >
            </div>

            <!-- Event Description -->
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
                <textarea
                    id="description"
                    name="description"
                    class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-300"
                    rows="4"
                    placeholder="Write a brief description of the event"
                    required
                >{{ old('description', $event->description) }}</textarea>
            </div>

            <!-- Event Date -->
            <div class="mb-4">
                <label for="happening_time" class="block text-gray-700 font-medium mb-2">Event Date & Time</label>
                <input
                    type="datetime-local"
                    id="happening_time"
                    name="happening_time"
                    value="{{ old('happening_time', \Carbon\Carbon::parse($event->happening_time)->format('Y-m-d\TH:i')) }}"
                    class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-300"
                    required
                >
            </div>

            <!-- Current Image -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Current Event Image</label>
                @if ($event->image)
                    <img src="{{ asset($event->image) }}" alt="Event Image" class="w-48 h-32 object-cover rounded-md mb-2">
                @else
                    <p class="text-gray-500">No image uploaded for this event.</p>
                @endif
            </div>

            <!-- Upload New Image -->
            <div class="mb-4">
                <label for="image" class="block text-gray-700 font-medium mb-2">Upload New Image</label>
                <input
                    type="file"
                    id="image"
                    name="image"
                    class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-300"
                >
                <p class="text-sm text-gray-500 mt-1">Leave empty if you don't want to change the image.</p>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button
                    type="submit"
                    class="px-6 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition"
                >
                    Update Event
                </button>
            </div>
        </form>
    </div>
</main>
</body>
</html>
