<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club Details</title>
    <script src="https://cdn.tailwindcss.com"></script> <!-- Tailwind CSS for styling -->
</head>
<body class="bg-gray-100">
<div class="container mx-auto py-8 px-6">
    <!-- Header Section -->
    <header class="mb-8">
        <h1 class="text-4xl font-bold text-center text-gray-800">{{ $club->name }}</h1>
        <p class="text-center text-gray-600 mt-2">A vibrant club with {{ $club->number_of_members }} members.</p>
    </header>

    <!-- Main Content -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Club Image -->
        <div class="col-span-1">
            <img src="{{ $club->image ?? 'https://via.placeholder.com/800x400' }}" alt="{{ $club->name }}"
                 class="rounded-lg shadow-md object-cover w-full h-64">
        </div>

        <!-- Club Details -->
        <div class="col-span-2 bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold mb-4">About the Club</h2>
            <p class="text-gray-700 leading-relaxed mb-4">
                {{ $club->description }}
            </p>

            <!-- Club Statistics -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div class="bg-gray-100 p-4 rounded-lg shadow-sm">
                    <h3 class="text-lg font-semibold text-gray-800">Number of Members</h3>
                    <p class="text-3xl font-bold text-teal-500">{{ $club->number_of_members }}</p>
                </div>
                <div class="bg-gray-100 p-4 rounded-lg shadow-sm">
                    <h3 class="text-lg font-semibold text-gray-800">Owner ID</h3>
                    <p class="text-3xl font-bold text-blue-500">{{ $club->owner_id }}</p>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-between">
                <a href="{{ route('clubs.edit', $club->id) }}"
                   class="px-4 py-2 bg-yellow-500 text-white rounded-lg shadow hover:bg-yellow-600 transition">
                    Edit Club
                </a>
                <form action="{{ route('clubs.destroy', $club->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="px-4 py-2 bg-red-500 text-white rounded-lg shadow hover:bg-red-600 transition">
                        Delete Club
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Back Button -->
    <div class="mt-8 text-center">
        <a href="{{ route('clubs.index') }}" class="px-6 py-2 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600 transition">
            Back to All Clubs
        </a>
    </div>
</div>
</body>
</html>
